<?php

$dom   = new DOMDocument( '1.0', 'utf-8' );
$dom   ->formatOutput = True;

$root  = $dom->createElement( 'products' );
$dom   ->appendChild( $root );

foreach($results as $row)
{
    $node = $dom->createElement( 'product' );
    $child = $dom->createElement('id');
    $child ->appendChild( $dom->createTextNode($row->id) );
        $node  ->appendChild( $child );
    $child = $dom->createElement('name');
    $child ->appendChild( $dom->createTextNode($row->name) );
        $node  ->appendChild( $child );
    $child = $dom->createElement('price');
    $child ->appendChild( $dom->createTextNode($row->price) );
        $node  ->appendChild( $child );
    $child = $dom->createElement('description');
    $child ->appendChild( $dom->createTextNode($row->description) );
        $node  ->appendChild( $child );
    $child = $dom->createElement('photo');
    $child ->appendChild( $dom->createTextNode($row->photo) );
        $node  ->appendChild( $child );
    $child = $dom->createElement('modified');
    $child ->appendChild( $dom->createTextNode($row->modified) );
        $node  ->appendChild( $child );
    $child = $dom->createElement('created');
    $child ->appendChild( $dom->createTextNode($row->created) );
        $node  ->appendChild( $child );
    $root->appendChild( $node );
}
header( 'Content-type: text/xml' );
echo $dom->saveXML();
$file_name = 'products.xml';
header("Content-disposition: attachment; filename=\"".$file_name."\""); 
exit;

?>