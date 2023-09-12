<?php
    session_start();
    if(isset($_SESSION['unique_id'])){

        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn,$_POST['message']);
       $output=" ";
        $sql1="SELECT * FROM users WHERE unique_id = '$incoming_id'";
        $result1 =$conn->query($sql1);
        $row1=mysqli_fetch_assoc($result1);

        $sql="SELECT * FROM messages WHERE (incoming_msg_id = {$incoming_id} AND outgoing_msg_id = {$outgoing_id}) OR (incoming_msg_id ={$outgoing_id} AND outgoing_msg_id = {$incoming_id})ORDER BY msg_id ASC";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {

            while($row= mysqli_fetch_assoc($result)){
                if($row['outgoing_msg_id']=== $outgoing_id){
                    
                    $output = '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                    
                }
                else{
                    $output = '<div class="chat incoming">
                                    <img src="php/'.$row1['image'].'" alt="">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                }
                echo $output;
            }
            
        }
        
    }   
    else{
        header("../login.php");
    }

?>