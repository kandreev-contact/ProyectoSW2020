<?php 
    if (isset($_REQUEST['logInMail'])) {
        $logInMail = $_REQUEST['logInMail'];
        $xml = simplexml_load_file("../xml/Questions.xml");
        $count = 0;
        $countTot = 0;
        foreach ($xml->children() as $assessmentItem){
            $atributos = $assessmentItem->attributes();
            if ($atributos['author'] == $logInMail){ $count = $count + 1;}
            $countTot = $countTot + 1;
        }
        echo $countTot." / ".$count;
    }
?>
