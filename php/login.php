<?php
    session_start();
    include_once "config.php";
    
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $pass= mysqli_real_escape_string($conn, $_POST['pass']);

    if( !empty($email) && !empty($pass))
    {
        $sql="SELECT * FROM users WHERE email ='$email' and pass='$pass'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            $row=mysqli_fetch_assoc($result);
            $_SESSION['unique_id']=$row['unique_id'];
            $id=$row['unique_id'];
            $sql1="UPDATE users SET status='Active Now' WHERE unique_id='$id'";
            $conn->query($sql1);
            echo "success";
        }
        else{
            echo "email or password is incoreect!!";
        }
    }
    else{
        echo "all input fields are required!!";
    }
?>