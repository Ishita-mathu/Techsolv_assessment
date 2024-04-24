<!DOCTYPE html>
<html>
    <head>
        <title>Contact us</title>
    </head>
    <body>
        <?php
        $name = isset($_GET["name"]) ? $_GET["name"] : '';
        $phone = isset($_GET["phone"]) ? $_GET["phone"] : '';
        $email = isset($_GET["email"]) ? $_GET["email"] : '';
        $subject = isset($_GET["subject"]) ? $_GET["subject"] : '';
        $message = isset($_GET["message"]) ? $_GET["message"] : '';
        $success_message = isset($_GET["success_message"]) ? $_GET["success_message"] : ''; 
        $error_message = isset($_GET["error_message"]) ? $_GET["error_message"] : ''; 
        //echo "success - $success_message";
        //echo "fail - $error_message";
            /*if($error_message !== ''){
                echo "<h2>" . $error_message . "</h2>";
            }

            else if($success_message !== ''){
                echo "<h2>" . $success_message . "</h2>";
            }*/
        ?>
        <form method="post" action="validation.php">
            <label>Full name : </label> <input type="text" name="name" value = "<?php echo $name; ?>"><br>
            <label>Phone number : </label> <input type="text" name="phone" value = "<?php echo $phone; ?>"><br>
            <label>Email : </label> <input type="email" name="email" value = "<?php echo $email; ?>"><br>
            <label>Subject : </label> <input type="text" name="subject" value = "<?php echo $subject; ?>"><br>
            <label>Message : </label> <textarea  name="message" value = "<?php echo $message; ?>"></textarea><br>
            <input type="submit">
        </form>
        <?php
        //echo "success - $success_message";
        //echo "fail - $error_message";
        if(!empty($success_message)){
            echo "<h2 style='color : green'> $success_message </h2>";
        }
        if(!empty($error_message)){
            echo "<h2 style='color : red'> $error_message </h2>";
        }

        ?>
    </body>
</html>