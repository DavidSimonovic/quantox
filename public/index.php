<?php 
require_once dirname(__FILE__).'/../models/Student.php';
require_once dirname(__FILE__).'/../controller/GradeController.php';

$url = $_SERVER['REQUEST_URI'];

$param = explode('/',$url);

$id = '';

if(isset($param[2])){
    $id = $param[2];
    }
    
    
    switch ($url) {
        case '/students' :
            Student::index(); // SHOWS ALL STUDENTS
            break;

        case '/student/'.$id :
            GradeController::passCheck($id); // SHOWS STUDENT BY ID
            break;
            
        
        default:
            header('Location: /students');
            break;

        }
?>