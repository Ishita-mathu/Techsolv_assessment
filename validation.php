<?php

$nameErr = $phoneErr = $emailErr = $msgErr = "";
$name = $email = $phone = $subject = $msg = "";

//checking if the form is submitted?
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //actual validations start here
    if(empty($_POST["name"])){
        $nameErr = "Name is required!!";
    }
    else{
        $name = $_POST["name"];
        // this reg exp checks if name should have any other characters other than letters and spaces
        if(!preg_match("/^[a-zA-Z ]*$/", $name)){
            $nameErr = "Name should have only letters and white spaces!!";
        } 
    }

    // validate phone number
    if(empty($_POST["phone"])){
        $phoneErr = "Phone Number is required!!";
    }
    else{
        $phone = $_POST["phone"];
        // this reg exp checks if name should have any other characters other than letters and spaces
        if(!preg_match("/^[0-9]*$/", $phone)){
            $phoneErr = "Only Numbers allowed in Phone Number";
        } 
    }

    // validate email ID
    if(empty($_POST["email"])){
        $emailErr = "Email ID is required!!";
    }
    else{
        $email = $_POST["email"];
        // this reg exp checks if name should have any other characters other than letters and spaces
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Email ID is not correct";
        } 
    }

    // validate subject and message
    if(empty($_POST["subject"]) || empty($_POST["message"])){
        $msgErr = "Subject and message is required!"
    }
    else{
        $subject = $_POST["subject"];
        $msg = $_POST["message"];

        //check if subject length is not more than 50 char and msg length is max 500 char.
        if(strlen($subject) > 50){
            $msgErr = "Subject length is max 50 characters!!";
        }
        else if(strlen($msg) > 500){
            $msgErr = "Message length is max 500 characters!!";
        }
    } 

    // if all validations are correct insert data in DB.
    if(empty($nameErr) && empty($phoneErr) && empty($emailErr) && empty($msgErr)){
        $server = "localhost";
        $username = "";
        $password = "";
        $dbname = "test";

        //getting ip address and current timestamp

        $ip = $_SERVER["REMOTE_ADDR"];
        $tmstmp = date("Y-m-d H:i:s");

        $conn = new mysqli($server,$username,$password,$dbname);
        $stmt = $conn->prepare("insert into contact_form(name,phone_number,email_id,subject,message,ip_address,time_stamp) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $name,$phone,$email,$subject,$msg,$ip,$tmstmp);

        $stmt->execute();
        $stmt->close();
        $conn->close();

        $success_msg = "SUCCESS";
    }
    else{
        $fail_msg = "FAILURE";
    }

}

?>