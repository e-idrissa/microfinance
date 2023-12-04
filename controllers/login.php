<?php
    session_start();

    //includes
    include "../config/config.php";

    if (isset($_POST['username']) AND isset($_POST['pwd'])) {
        // var_dump($_POST);
        //avoid SQL and XSS injections
        $username = htmlspecialchars($_POST['username']);
        $pwd = htmlspecialchars($_POST['pwd']);

        if ($username !== "" && $pwd !== "") {
            $req = $db->query("SELECT COUNT(*) AS entries FROM admins WHERE username = '".$username."' AND pwd = '".$pwd."'");
            $stat = $req->fetch();
            $count = $stat['entries'];
            echo $count;

            if ($count == 0) {
                $error = "Invalid Username or Password";
                // echo $error;
                header("location:../views/login.php"); //incorrect username or pwd
            } else {
                $_SESSION['user'] = $username; //valid parameters
                // echo "success";
                header("location:../views/dashboard.php");
            }
        } else {
            $error = "No Parameters... Please enter Your Parameters";
            // echo $error;
            header("location:../views/login.php"); //no entries
        }
    } else {
        echo "unset";
        // header("location:../views/login.php");
    }
?>