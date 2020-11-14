<?php

if (isset($_REQUEST['DireccionCorreoElectronico'])) {
    $regexMail = "/((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)/";
    $regexPreg = "/^.{10,}$/";


    if (preg_match($regexPreg, $_REQUEST['EnunciadoPregunta'])) {
        include 'DbConfig.php';
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli) {
            die("Fallo al conectar a MySQL: " . mysqli_connect_error());
        }
        $email = $_REQUEST['DireccionCorreoElectronico'];
        $enunciado = $_REQUEST['EnunciadoPregunta'];
        $respuestac = $_REQUEST['RespuestaCorrecta'];
        $respuestai1 = $_REQUEST['RespuestaIncorrecta1'];
        $respuestai2 = $_REQUEST['RespuestaIncorrecta2'];
        $respuestai3 = $_REQUEST['RespuestaIncorrecta3'];
        $complejidad = $_REQUEST['Complejidad'];
        $tema = $_REQUEST['TemadelaPregunta'];

        $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema) VALUES('$email', '$enunciado', '$respuestac', '$respuestai1', '$respuestai2', '$respuestai3', $complejidad, '$tema')";

        if (!mysqli_query($mysqli, $sql)) {
            die("Error: " . mysqli_error($mysqli));
        }
        $xml = simplexml_load_file('../xml/Questions.xml');
        if (!$xml) {
            die("Error: Fallo al entrar en la carpeta xml");
        }
        $assessmentItem = $xml->addChild('assessmentItem');
        $assessmentItem->addAttribute('subject', $_REQUEST['TemadelaPregunta']);
        $assessmentItem->addAttribute('author', $_REQUEST['DireccionCorreoElectronico']);
        $itemBody = $assessmentItem->addChild('itemBody');
        $itemBody->addChild('p', $_REQUEST['EnunciadoPregunta']);
        $correctResponse = $assessmentItem->addChild('correctResponse');
        $correctResponse->addChild('value', $_REQUEST['RespuestaCorrecta']);
        $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
        $incorrectResponses->addChild('value', $_REQUEST['RespuestaIncorrecta1']);
        $incorrectResponses->addChild('value', $_REQUEST['RespuestaIncorrecta2']);
        $incorrectResponses->addChild('value', $_REQUEST['RespuestaIncorrecta3']);
        $xml->asXML();
        $xml->asXML('../xml/Questions.xml');
        echo "Registro añadido correctamente";
        mysqli_close($mysqli);
    } else {
        echo "El enunciado de la pregunta debe tener mas de 10 caracteres.<br>";
    }
}
