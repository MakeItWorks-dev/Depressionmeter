<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');  
    }

    public static function getUserId($username)
    {
        $curl = curl_init();

        $bearerToken = 'AAAAAAAAAAAAAAAAAAAAAJJkzwEAAAAANYemPaEE6qz4g13HXdlqU8yZLaY%3DUPcAkCc5z4hUbEjFO3dzDjaCe9GIlhE1G3ciKfmzd7fI4cSFZ4';

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

        // return $response;

        // Cek apakah respons mengandung 'data'
        if (isset($data['data']['id'])) {
            return $data['data']['id'];
        } else {
            die("Error: Tidak dapat menemukan user ID. Response: " . json_encode($data));
        }
    }


    public static function getTweetUser(Request $request)
    {
        $username = $request->username;
        $bearerToken = 'AAAAAAAAAAAAAAAAAAAAAJJkzwEAAAAANYemPaEE6qz4g13HXdlqU8yZLaY%3DUPcAkCc5z4hUbEjFO3dzDjaCe9GIlhE1G3ciKfmzd7fI4cSFZ4';

        $id = self::getUserId($username);
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
            return $data['data'];
        } else {
            die("Error: Tidak ada tweet ditemukan. Response: " . json_encode($data));
        }
    }



}