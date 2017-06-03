<?php
    include 'conf.php';
    
    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $birth_date = $_POST["birthDate"];
    $company = $_POST["insuranceCompany"];
    $type = $_POST["insuranceType"];
    $mail_id = $_POST["eMailID"];
    $user_password = $_POST["password"];
    
    
    
    $test = $conn->query("select * from user");
    if ($test->num_rows > 0) {
    // output data of each row
        while($row = $test->fetch_assoc()) {
            echo $row['firstName'];
        }
    } 
    else {
        echo "0 results";
    }
?>

