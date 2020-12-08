<?php
        //Enter your code here, enjoy!

$arraytoxml = array( 
        array( "name" => "Peter Parker","email" => "peterparker@mail.com", ),
        array( "name" => "Clark Kent", "email" => "clarkkent@mail.com", ),
        array( "name" => "Harry Potter", "email" => "harrypotter@mail.com", ) 
        );
        
array_push($arraytoxml, array( "name" => "Bruce Wayne","email" => "bwayne@mail.com", ));
 
$xmlofarrays = new DOMDocument( );
$xml_emails = $xmlofarrays->createElement('Emails');

$altint = 0;

foreach ($arraytoxml as $innerarray){
    foreach ($innerarray as $value){
        
	print_r($value);
        print_r(' ');
	
	if ($altint < 1){
		$tempname = $value;
		$altint = 1;
	}else{
		$xml_element = $xmlofarrays->createElement(str_replace(' ', '', strval($tempname)), strval($value));
		$xml_emails->appendChild($xml_element);
		$altint = 0;
	}
	
	
	//$tempnode = DOMDocument::createTextNode ( strval($value) );
	//$xml_emails->appendChild($tempnode);
	
	}
}
$xmlofarrays->appendChild($xml_emails);
$xmlofarrays->save('xmlofarrays.xml');
