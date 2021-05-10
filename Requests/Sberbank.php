<?php

namespace Requests;

use GuzzleHttp;

class Sberbank
{
    private const END_POINT = "https://api.aicloud.sbercloud.ru/public/v1/public_inference/gpt3/predict";

    private const BASE_METHOD = "POST";

    private const BASE_HEADERS = [
        "Content-Type" => "application/json",
        "Accept" => "application/json"
    ];

    private $client;

    public function __construct()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => self::END_POINT
        ]);
    }

    public function question($string)
    {
        if(strlen($string) === 0) {
            return '';
        }

        $request = $this->client->request(self::BASE_METHOD, "", [
            'headers' => self::BASE_HEADERS,
            'json' => ['text' => $string]
        ]);

        if($request->getStatusCode() === 200) {
            $content = json_decode($request->getBody()->getContents());

            if(!empty($content->predictions)) {
                return $content->predictions;
            }
        }

        return '';
    }
}
