<?php 
require_once dirname(__FILE__).'/../config/DB.php';

class Grade{

public static function index(){

    $conn = new DB;
        
    $pdo = $conn->connect();

    $sql = "SELECT * FROM grades";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $grades= $stmt->fetchAll();

    array_shift($grades);
    array_filter($grades);

    return $grades;

}

public static function show($id){

    $conn = new DB;

    $pdo = $conn->connect();

    $sql = "SELECT * FROM grades WHERE id =:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();

    $gradesById= $stmt->fetch();

    if($gradesById == []){
        return [];
    }else{
    
    

    array_shift($gradesById);
    array_filter($gradesById);

    return $gradesById;
}

}

}

?>