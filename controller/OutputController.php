<?php

class OutputController
{

// OVERKILL JSON GENERATOR

public static function toJson($data){

    echo json_encode($data);

}

// XML GENERATOR
public static function toXml($data){


    $grades = array_filter(Grade::show($data['grades_id']),'strlen');

    header('Content-Type: application/xml; charset=utf-8');

	$xmlex = new XMLWriter();
	$xmlex->openURI('php://output');
	$xmlex->startDocument('1.0','UTF-8');
	$xmlex->setIndent(4);
    $xmlex->startElement('students');
    $xmlex->startElement('student');
    $xmlex->writeElement('id',$data['id']);
    $xmlex->writeElement('name',$data['name']);
    $xmlex->writeElement('board', 'CMSB');
    $xmlex->startElement('grades');
    foreach($grades as $grade){
        $xmlex->writeElement('grades', $grade);
    }
    $xmlex->endElement();
    $xmlex->writeElement('highest_grade',$data['highest']);
    $xmlex->writeElement('result',$data['result'] );
    $xmlex->endElement();
    $xmlex->endElement();
    $xmlex->endDocument();
    $xmlex->flush();

    return $xmlex;
}


}