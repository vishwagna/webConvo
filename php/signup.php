<?php
    session_start();
    include_once "config.php";
    $fname= mysqli_real_escape_string($conn, $_POST['fname']);
    $lname= mysqli_real_escape_string($conn, $_POST['lname']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $pass= mysqli_real_escape_string($conn, $_POST['pass']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass))
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $sql = "SELECT email FROM users WHERE email='$email'";
            $result= mysqli_query($conn,$sql);
            if($result->num_rows>0)
            {
                echo "$email - This email already exists!!";
            }
            else{
                if(isset($_FILES['image'])){
                    $img= $_FILES["image"]["name"];
                   
                    $tempimg= $_FILES["image"]["tmp_name"];
    

                    $img_explode = explode('.',$img);
                    $img_ext = end($img_explode);

                    $extensions=['png','jpeg','jpg'];
                    if(in_array($img_ext,$extensions)=== true){
                        $time=time();
                        $new_img = $time.$img;

                        if( move_uploaded_file($tempimg,"images/".$new_img )){
                            $folder="images/".$new_img;
                            $status ="Active now";
                            $random_id=rand(time(),10000000);
                            $sql2="INSERT INTO users(unique_id,fname,lname,email,pass,image,status)VALUES('$random_id','$fname','$lname','$email','$pass','$folder','$status')";
                            if($conn->query($sql2)){
                                
                                $sql3="SELECT * FROM users WHERE email='$email'";
                                $result=$conn->query($sql3);
                                if($result->num_rows>0)
                                {
                                    $row=mysqli_fetch_assoc($result);
                                    $_SESSION['unique_id']=$row['unique_id'];
                                    echo "success";
                                }
                            }
                           }
                    }
                    else{
                        echo "Please select an valid Image file!";
                    }
                   
                }
                else{
                    echo "Please select an Image file!";
                }
            }
        }
        else{
            echo "$email- this is not valid email!!";
        }
    }
    else{
        echo "all input fields are required!!";
    }
?>