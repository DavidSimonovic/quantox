<?php 

class CmsbController
{

public static function gradeCheck($grades,$data){



    // CHECKS IF MORE THEN 2 GRADES
    if(count($grades) >= 2){
    
    // CHECKS IF THE HIGHEST GRADE IS 8
        if(max($grades) > 8){

            // ADD TO ARRAY
            $results =[
                'highest' => max($grades),
                'result' => "PASS",
                ];

                $final = array_merge($data,$results);

                OutputController::toXml($final);
        }
        // GRADE IS LOWER THAN 8
        else{

            $results =[
                'highest' => max($grades),
                'result' => "Fail",
                ];

                $final = array_merge($data,$results);

                OutputController::toXml($final);
        }
        // !GRADE IS LOWER THAN 8

    }
    // !CHECKS IF MORE THEN 2 GRADES

    // FAIL IF NOT ENOUG GRADES
    else{
        $results =[
            'highest' => max($grades),
            'result' => "Fail",
            ];

            $final = array_merge($data,$results);

            OutputController::toXml($final);
        }
        // !FAIL IF NOT ENOUG GRADES
    }
    // !gradeChck

} 



