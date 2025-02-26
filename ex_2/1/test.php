<?php

require_once('../_helpers/strip.php');

// https://depthsecurity.com/blog/exploitation-xml-external-entity-xxe-injection

//libxml_disable_entity_loader (false);
libxml_disable_entity_loader (true);


$xml = strlen($_GET['xml']) > 0 ? $_GET['xml'] : '<root><content>No XML found</content></root>';

$document = new DOMDocument();
//$document->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
$document->loadXML($xml, LIBXML_NONET | LIBXML_NOERROR | LIBXML_NOWARNING);
$parsedDocument = simplexml_import_dom($document);

echo $parsedDocument->content;
