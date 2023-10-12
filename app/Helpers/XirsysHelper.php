<?php

use Illuminate\Support\Facades\Http;

function getXirsysIceConfig ($meeting_id)
{
    $apiPath = config('services.xirsys.api_path');
    $ident = config('services.xirsys.ident');
    $secret = config('services.xirsys.secret');
    $channel = config('services.xirsys.channel');

    $data = [
        "format" => "urls",
        "meeting_id" => $meeting_id,
    ];
    $data_json = json_encode($data);

    $response = Http::withBasicAuth($ident, $secret)
        ->withHeaders([
            "Content-Type" => "application/json",
            "Content-Length" => strlen($data_json),
        ])
        ->put("$apiPath/_turn/$channel", $data);

    if ($response->successful()) {
        $iceConfig = $response->json();
        // Assuming the meeting URL can be generated like so,
        // You can change this part as per your requirements.
        return $iceConfig;
    } else {
        return null;
    }
}
