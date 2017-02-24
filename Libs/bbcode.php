<?php  

global $parser;

$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
/**
	* Liste parser
*/
$parser->addBBCode("list" , '<ul>{param}</ul>');
$parser->addBBCode("*" , '<li>{param}</li>');

/**
	* Table parser
*/
$parser->addBBCode("table" , '<table>{param}</table>');
$parser->addBBCode("td" , '<td>{param}</td>');
$parser->addBBCode("tr" , '<tr>{param}</tr>');

/**
	* Html parser
*/
$parser->addBBCode("quote" , '<blockquote>{param}</blockquote>');
$parser->addBBCode("code" , '<pre>{param}</pre>');
$parser->addBBCode("center" , '<div style="text-align:center">{param}</div>');
$parser->addBBCode("left" , '<div style="text-align:left">{param}</div>');
$parser->addBBCode("video" , '<iframe width="560" height="315" src="https://www.youtube.com/embed/{param}" frameborder="0" allowfullscreen></iframe>');
?>