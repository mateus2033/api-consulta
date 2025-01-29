<?php

namespace App\Utils;

use Exception;
use Illuminate\Http\Response;

class Celular 
{
    /**
    * @param string $celular
    * @return string $celular
    */
    public static function execute(string $celular)
    {
        $phone = preg_replace('/[^0-9]/', '', $celular);
        $response = preg_match('/^([14689][0-9]|2[12478]|3([1-5]|[7-8])|5([13-5])|7[193-7])9[0-9]{8}$/', $phone);

        if($response) {
            return $celular;
        }

        throw new Exception("Número de telefone inválido", Response::HTTP_BAD_REQUEST);
    }
}