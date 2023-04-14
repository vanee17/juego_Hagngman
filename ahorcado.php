<?php

$possibleWords = ["computador", "ferrocarril", "servidor", "anestesia", "multiverso", "paracetamol", "marroquineria", "consultorio", "coronavirus", "noruega"];

function clear(){
    if (PHP_OS == "WINNT") {
        system("cls");
    }else{
        system("clear");
    }
}

define("INTENTOS", 6);

echo "¡Juego de Ahorcado!";
echo "\n\n";
//inicio del juego

$choosenWords = $possibleWords[rand(0,9)];
$lengthWords = strlen($choosenWords);
$discoveredLetter = str_pad("", $lengthWords, "_");
$attempts = 0;
do{
    echo "palabra con $lengthWords letras";
    echo "\n\n";
    echo $discoveredLetter;
    echo "\n";

//se le pide al usuario la letra

    $playerLetter = readline("introduzca una letra: ");
    $playerLetter = strtolower($playerLetter);

    if (str_contains($choosenWords, $playerLetter)) {
    
        $offset = 0;
        while (
            ($letterPosition = strpos($choosenWords, $playerLetter, $offset)) !== false
            ) {
            $discoveredLetter[$letterPosition] = $playerLetter;
            $offset = $letterPosition + 1;
        }
    }else{
        clear();
        $attempts++;
        echo "Letra incorrecta, te quedan " . (INTENTOS - $attempts) . " intentos";
        echo "\n";
        sleep(2);
    }
    clear();
}while($attempts < INTENTOS && $discoveredLetter != $choosenWords);

clear();

if ($attempts < INTENTOS ) {
    echo "felicitaciones!!!!";
}else{
    echo "suerte para la proxima";
}