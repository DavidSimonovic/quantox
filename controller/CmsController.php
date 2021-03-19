<?php 

class CmsController
{

public static function gradeCheck($data,$average){

    // IF THE AVERAGE SUM OF ALL THE GRADES IS LESS THEN 7
    if($average <= 6){

        $results =[
            'board' => 'CMS',
            'average' => $average,
            'result' => "Fail",
            ];

            $final = array_merge($data,$results);

            OutputController::toJson($final);
    }
    // !IF THE AVERAGE SUM OF ALL THE GRADES IS LESS THEN 7
    // SUM IS BIGGER THEN 6 OR EQUAL TO 7 
    else{

        $results =[
            'board' => 'CMS',
            'average' => $average,
            'result' => "PASS",
        ];

        $final = array_merge($data,$results);

        OutputController::toJson($final);
    }
    // !SUM IS BIGGER THEN 6 OR EQUAL TO 7 
}

} 


