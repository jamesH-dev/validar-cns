<?php

/**
 * Verifica se o CNS digitado pelo usuário é válido
 * @param $cns Informação digitada que será validada
 * @return boolean
 */

function valida_cns(string $cns): bool
{
    if ((substr(trim($cns), 0, 1) == 1) || (substr(trim($cns), 0, 1) == 2))
    {
        //valida se o valor digitado contém 15 caracteres, caso não possua, a função retornará falso
        if (strlen(trim($cns)) != 15)
        {
            return false;
        }
        else
        {
            $pis = substr($cns, 0, 11);
            $soma = ((intval(number_format(substr($pis, 0, 1 - 0)))) * 15) + 
                ((intval(number_format(substr($pis, 1, 2 - 1)))) * 14) + 
                ((intval(number_format(substr($pis, 2, 3 - 2)))) * 13) + 
                ((intval(number_format(substr($pis, 3, 4 - 3)))) * 12) + 
                ((intval(number_format(substr($pis, 4, 5 - 4)))) * 11) + 
                ((intval(number_format(substr($pis, 5, 6 - 5)))) * 10) + 
                ((intval(number_format(substr($pis, 6, 7 - 6)))) * 9) + 
                ((intval(number_format(substr($pis, 7, 8 - 7)))) * 8) + 
                ((intval(number_format(substr($pis, 8, 9 - 8)))) * 7) + 
                ((intval(number_format(substr($pis, 9, 10 - 9)))) * 6) + 
                ((intval(number_format(substr($pis, 10, 11 - 10)))) * 5); 

            $resto = $soma % 11;
            $dv = 11 - $resto;

            if ($dv == 11)
            {
                $dv = 0;
            }
            if ($dv == 10)
            {
                $soma = $soma + 2;
                $resto = $soma % 11;
                $dv = 11 - $resto;
        
                $result = $pis."001".$dv;
            }
            else
            {
                $result = $pis."000".$dv;
            }

            if ($result != $cns)
                return false;
            else
                return true;
        }
    }

    if ((substr(trim($cns), 0, 1) == 7) || (substr(trim($cns), 0, 1) == 8) || (substr(trim($cns), 0, 1) == 9))
    {
        $soma = ((intval(number_format(substr($cns, 0, 1 - 0)))) * 15) + 
            ((intval(number_format(substr($cns, 1, 2 - 1)))) * 14) + 
            ((intval(number_format(substr($cns, 2, 3 - 2)))) * 13) + 
            ((intval(number_format(substr($cns, 3, 4 - 3)))) * 12) + 
            ((intval(number_format(substr($cns, 4, 5 - 4)))) * 11) + 
            ((intval(number_format(substr($cns, 5, 6 - 5)))) * 10) + 
            ((intval(number_format(substr($cns, 6, 7 - 6)))) * 9) + 
            ((intval(number_format(substr($cns, 7, 8 - 7)))) * 8) + 
            ((intval(number_format(substr($cns, 8, 9 - 8)))) * 7) + 
            ((intval(number_format(substr($cns, 9, 10 - 9)))) * 6) + 
            ((intval(number_format(substr($cns, 10, 11 - 10)))) * 5) + 
            ((intval(number_format(substr($cns, 11, 12 - 11)))) * 4) + 
            ((intval(number_format(substr($cns, 12, 13 - 12)))) * 3) + 
            ((intval(number_format(substr($cns, 13, 14 - 13)))) * 2) + 
            ((intval(number_format(substr($cns, 14, 15 - 14)))) * 1);

        $resto = $soma % 11;
        
        if ($resto != 0)
            return false;
        else
            return true;
    }
    else
        return false;
}
