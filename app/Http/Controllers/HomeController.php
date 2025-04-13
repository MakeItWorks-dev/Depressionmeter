<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');  
    }

    public function callTwitterApiWithFallback($url)
    {
        $tokens = config('app.twitter_bearer_tokens');
        foreach ($tokens as $token) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer $token"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if (!$err) {
                return json_decode($response, true);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'API mencapai batas maksimum. Mohon coba lagi dalam 10 - 15 menit!',
            'data' => null,
        ]);
    }

    public function getUserId($username)
    {
        $url = "https://api.twitter.com/2/users/by/username/$username";
        $data = $this->callTwitterApiWithFallback($url);

        if (isset($data['data']['id'])) {
            return $data['data']['id'];
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Username tidak ditemukan!',
                'data' => null,
            ]);
        }
    }

    public function getTweetUser(Request $request)
    {
        $username = $request->username;
        $bearerToken = env('TWITTER_BEARER_TOKEN');

        $id = $this->getUserId($username);
        if (!$id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Username tidak ditemukan!',
                'data' => null,
            ]);
        }

        $url = "https://api.twitter.com/2/users/$id/tweets";
        $data = $this->callTwitterApiWithFallback($url);

        if (isset($data['data'])) {
            $texts = array_map(function ($item) {
                return $item['text'];
            }, $data['data']);

            $prediksi = Http::post('https://APIFREEXYZ-depressionmeters-api.hf.space/predict-array/', [
                'texts' => $texts,
            ]);

            if ($prediksi->successful()) {
                $hasil = $prediksi->json();

                $qty_positif = 0;
                $qty_negatif = 0;
                $qty_netral = 0;
                
                foreach ($hasil['results'] as $prediction) {
                    if ($prediction['label'] === 'Positif') {
                        $qty_positif++;
                    } elseif ($prediction['label'] === 'Negatif (Depresi)') {
                        $qty_negatif++;
                    } else {
                        $qty_netral++;
                    }
                }
                $persentase_depresi = (int) str_replace('%', '', $hasil['persentase_depresi']);

                $history = History::create([
                    'user_id' => auth()->user()->id,
                    'username' => $username,
                    'persentase_depresi' => $persentase_depresi,
                    'qty_positif' => $qty_positif,
                    'qty_negatif' => $qty_negatif,
                    'qty_netral' => $qty_netral,
                ]);

                return response()->json([
                    'status' => 'success',
                    'tweets' => $data['data'],
                    'prediksi' => $hasil,
                    'history' => $history,
                ]);
            } else {
                return response()->json(['error' => 'Gagal memanggil API prediksi'], 500);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'API mencapai batas maksimum. Mohon coba lagi dalam 10 - 15 menit!',
                'data' => null,
            ]);
        }
    }
}