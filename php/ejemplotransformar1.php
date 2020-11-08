<?php
# XML
$xml = new DOMDocument();
$xml->load("../xml/Questions.xml");

#XSL
$xsl = new DOMDocument();
$xsl->load("../xml/ShowXmlQuestions.xsl");

#XSLT
$proc = new XSLTProcessor();

#EJECUCION
$proc->importStylesheet($xsl);
echo $proc->transformToXml($xml);
