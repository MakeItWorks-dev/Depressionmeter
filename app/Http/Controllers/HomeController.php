<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');  
    }

    public function getUserId($username)
    {
        $curl = curl_init();

        $bearerToken = env('TWITTER_BEARER_TOKEN');

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.twitter.com/2/users/by/username/$username",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $bearerToken"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            die("cURL Error: " . $err);
        }

        $data = json_decode($response, true);

        if (isset($data['data']['id'])) {
            return $data['data']['id'];
        } else {
            die("Error: Tidak dapat menemukan user ID. Response: " . json_encode($data));
        }
    }

    public function getTweetUser(Request $request)
    {
        $username = $request->username;
        $bearerToken = env('TWITTER_BEARER_TOKEN');

        $id = $this->getUserId($username);
        if (!$id) {
            die("Error: User ID tidak ditemukan.");
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.twitter.com/2/users/$id/tweets",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $bearerToken"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            die("cURL Error: " . $err);
        }

        $data = json_decode($response, true);
        if (isset($data['data'])) {
            $texts = array_map(function ($item) {
                return $item['text'];
            }, $data['data']);

            $prediksi = $this->prediksiDepresi($texts, 'twitter');
        } else {
            die("Error: Tidak ada tweet ditemukan. Response: " . json_encode($data));
        }
    }

    public function prediksiDepresi($data, $type)
    {
        if ($type == 'twitter') {
            $url = 'http://localhost:8000/predict-array/';
            $param = 'texts';
        } else if ($type == 'text') {
            $url = 'http://localhost:8000/predict-text/';
            $param = 'text';
        } else if ($type == 'file') {
            $url = 'http://localhost:8000/predict-file/';
            $param = 'file';
        } else {
            return response()->json(['error' => 'Tipe tidak valid'], 400);
        }

        $response = Http::post($url, [
            $param => $data,
        ]);

        return $response;

        // if ($response->successful()) {
        //     $hasil = $response->json();
        //     return $hasil;
        // } else {
        //     return response()->json(['error' => 'Gagal memanggil API prediksi'], 500);
        // }
    }
}