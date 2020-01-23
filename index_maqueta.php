<?php
 
echo  limpia_espacios("pantalon verde morado",'jpg');

function limpia_espacios($cadena, $extencion){
    $alatorio = rand(0, 10000);
	$cadena = trim(str_replace(' ', '_', $cadena)).$alatorio.'.'.$extencion;
	return $cadena;
}

?>