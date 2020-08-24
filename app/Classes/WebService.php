<?php

namespace App\Classes;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Client;


class WebService
{
    public static function conection($verb, $url, $header, $body = null)
    {
        $client = new Client();
        $res = $client->request($verb, $url, [
            'headers' => $header,
            \GuzzleHttp\RequestOptions::JSON => $body
        ]);
        return $res;
    }

    public static function verificaToken($token)
    {
        $header = [
            'Content-Type'  => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '.$token,
        ];
       return self::conection('get', env('AUTENTICATION').'checktoken', $header)->getStatusCode();
    }

}