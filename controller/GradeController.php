<?php
require_once dirname(__FILE__).'/../models/Student.php';
require_once dirname(__FILE__).'/../models/Grade.php';
require_once dirname(__FILE__).'/OutputController.php';
require_once dirname(__FILE__).'/CmsbController.php';
require_once dirname(__FILE__).'/CmsController.php';

// CLASS
class GradeController 
{


    // PASSCHECK FUNCTION 
    public static function passCheck($id){

        $student = Student::show($id);

        if($student !== [])
        {
        $gradesId = $student['grades_id'];
        }
        else
        {
            $gradesId ='';
        }
        // Checks grades and filters NULL values
        $grades = array_filter(Grade::show($gradesId),'strlen');
        
        
        // COMBAINE STUDENT WITH GRADE LIST IN ONE ARRAY
        $data = array_merge($student, $grades);

        // EMPTY ARRAY
        if($data == []){
            echo "Student does not exist with that ID";
        }else{

        // CSMB STUDENT GRADE CHECK

        if($data['school_board_id'] == 2){  
            CmsbController::gradeCheck($grades,$data);
        }
        // !CSMB STUDENT GRADE CHECK
        
        // CSM STUDENT GRADE CHECK 
        if($data['school_board_id'] == 1){
            $count = count($grades);
            $sum = array_sum($grades);
        
            $average = number_format((float)$sum / $count, 2, '.', '');
            CmsController::gradeCheck($data,$average);
       
        } 
         // !CSM STUDENT GRADE CHECK 
        
    }
    // !EMPTY CHECK
    }
    // !PASSCHECK FUNCTION 
}
// !CLASS
