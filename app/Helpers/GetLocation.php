<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class GetLocation
{
    function getLocation($request)
    {
        // $userIp = $request->ip();
        $userIp = '103.47.182.58';
        // $userIp = '103.204.210.78';
        // Make a request to the ipinfo.io API
        $client = new Client();
        $response = $client->get("https://ipinfo.io/{$userIp}?token=f282bfb414741b");
        // Parse the JSON response
        $data = json_decode($response->getBody());

        return $data;
    }
}
