<?php

if (isset($_REQUEST['Direccion_de_correo'])) {
    $regexMail = "/((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)/";
    $regexPreg = "/^.{10,}$/";


    if (preg_match($regexPreg, $_REQUEST['Pregunta'])) {
        include 'DbConfig.php';
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli) {
            die("Fallo al conectar a MySQL: " . mysqli_connect_error());
        }
        $email = $_REQUEST['Direccion_de_correo'];
        $enunciado = $_REQUEST['Pregunta'];
        $respuestac = $_REQUEST['Respuesta_correcta'];
        $respuestai1 = $_REQUEST['Respuesta_incorrecta_1'];
        $respuestai2 = $_REQUEST['Respuesta_incorrecta_2'];
        $respuestai3 = $_REQUEST['Respuesta_incorrecta_3'];
        $complejidad = $_REQUEST['complejidad'];
        $tema = $_REQUEST['tema'];
        $imagen = $_FILES['file']['tmp_name'];

        $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema) VALUES('$email', '$enunciado', '$respuestac', '$respuestai1', '$respuestai2', '$respuestai3', $complejidad, '$tema')";

        if (!mysqli_query($mysqli, $sql)) {
            die("Error: " . mysqli_error($mysqli));
        }
        $xml = simplexml_load_file('../xml/Questions.xml');
        if (!$xml) {
            die("Error: Fallo al entrar en la carpeta xml");
        }
        $assessmentItem = $xml->addChild('assessmentItem');
        $assessmentItem->addAttribute('subject', $tema);
        $assessmentItem->addAttribute('author', $email);
        $itemBody = $assessmentItem->addChild('itemBody');
        $itemBody->addChild('p', $enunciado);
        $correctResponse = $assessmentItem->addChild('correctResponse');
        $correctResponse->addChild('value', $respuestac);
        $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
        $incorrectResponses->addChild('value', $respuestai1);
        $incorrectResponses->addChild('value', $respuestai2);
        $incorrectResponses->addChild('value', $respuestai3);
        $xml->asXML();
        $xml->asXML('../xml/Questions.xml');
        echo "Registro añadido correctamente";
        mysqli_close($mysqli);
    } else {
        echo "El enunciado de la pregunta debe tener mas de 10 caracteres.<br>";
    }
}
?>