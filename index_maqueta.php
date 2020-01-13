<?php

// Complete the sockMerchant function below.
function sockMerchant() {
    
    $string = "UDDDUDUU";
    $array = str_split($string, 1);

    $valle = 0;
    $altura = 0;
    $contituidadAbajo = 0;
    $bandera = false;
    foreach ($array as $paso) {
        if ($paso == "D") {
            $altura--;
            $contituidadAbajo++;
        } else {
            $altura++;
            $contituidadAbajo = 0;
        }

        if ($contituidadAbajo > 1) {
            $bandera = true;
            
        }
        
        if ($bandera && $altura == 0) {
            $bandera = FALSE;
            $valle++;
        }
        
        
    }
   // echo $valle;
    return $valle;
}

echo  sockMerchant();


