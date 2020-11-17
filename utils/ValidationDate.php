<?php

class ValidationDate{

    public static function validationDateFormat($date){
        $regexDate = "/^(19|20)[0-9]{2}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
        $matches = [];
        $dateIsValide = preg_match($regexDate,$date, $matches);
        return $dateIsValide === 0;
    }
}

?>