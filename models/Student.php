<?php 
require_once dirname(__FILE__).'/../config/DB.php';


class Student
 {

    public static function index(){

        $conn = new DB;
        
        $pdo = $conn->connect();

        $sql = "SELECT * FROM students";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    
        $students= $stmt->fetchAll();
    
        echo json_encode($students);

    }

    public static function show($id){

        $conn = new DB;

        $pdo = $conn->connect();

        $sql = "SELECT * FROM students WHERE id =:id";
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    
        $studentById= $stmt->fetch();
        
        if($studentById == []){
            return [];
        }else{
        return $studentById;
        }


    }
    
}
?>