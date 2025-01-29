<?php

namespace App\Utils;

use Exception;
use Illuminate\Http\Response;

class CPF 
{
    /**
    * @param string $cpf
    * @return string $cpf
    */
    public static function execute(string $current_cpf)
    {   
        $cpf = preg_replace('/[^0-9]/is', '', $current_cpf);
        if (strlen($cpf) != 11) {
            throw new Exception("CPF inválido.", Response::HTTP_BAD_REQUEST);
        }
        
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new Exception("CPF inválido.", Response::HTTP_BAD_REQUEST);
        }

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new Exception("CPF inválido.", Response::HTTP_BAD_REQUEST);
            }
        }

        return $current_cpf;
    }
}