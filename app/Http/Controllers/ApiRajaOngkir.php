<?php
namespace App\Http\Controllers;

class ApiRajaOngkir {
    // API PROVINSI
    public static function apiProvinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: d54612ec18f6217de0657bbbd8c60b31"
        ),
        ));
        $provincis = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
        echo "cURL Error #:" . $err;
        }
        return  json_decode($provincis, true);
    }
}