<?php 

require_once 'db_connect.php';

function addData($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `admin`(`Name`, `User Name`, `Email`, `Mobile`, `Address`, `Password`, `Shift`, `Gender`, `Date of Birth`, `Adminreq`)  VALUES (:name, :user_name, :email, :mobile, :address, :password, :shift, :gender, :dob, :adminreq)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':name' => $_POST['name'],
            ':user_name' => $_POST['user_name'],
            ':email' => $_POST['email'],
            ':mobile' => $_POST['mobile'],
            ':address' => $_POST['address'],
            ':password' => $data,
            ':shift' => $_POST['shift'],
            ':gender' => $_POST['gender'],
            ':dob' => $_POST['dob'],
            ':adminreq' => $_POST['adminreq']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePicture($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE `admin` set `Image` = ? where `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data, $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePassword($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE `admin` set `Password` = ? where `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data, $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showAllData(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `admin` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function updateData($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE `admin` set `Name` = ?, `User Name` = ?,`Email` = ?, `Mobile` = ?, `Address` = ?, `Shift` = ? where `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['user_name'], $data['email'], $data['mobile'], $data['address'], $data['shift'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteProduct($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `product_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function showData($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `admin` where ID = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data;
}

function searchData($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `admin` WHERE `User Name` = ?";
     try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$user_name]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}
?>