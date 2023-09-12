
<?php
    session_start();
    include_once "config.php";
    $outgoing_id=$_SESSION['unique_id'];
    $output=" ";
    $sql="SELECT * FROM users EXCEPT SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}";
    $result=$conn->query($sql);
    if($result->num_rows==0){
        $output="no users are available to chat ";

    }
    elseif($result->num_rows>0)
    {
        while($row=mysqli_fetch_assoc($result)){
           $sql2="SELECT * FROM messages WHERE ((incoming_msg_id={$row['unique_id']} OR outgoing_msg_id={$row['unique_id']})AND (outgoing_msg_id='$outgoing_id'OR incoming_msg_id='$outgoing_id')) ORDER BY msg_id DESC LIMIT 1";
            if($row['status']=='offline now')
            {
                $offline='offline';
            }
            else{
                $offline='';
            }
            $query2 = mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($query2);
            if(mysqli_num_rows($query2)>0){
                $result1=$row2['msg'];
                if($row2['outgoing_msg_id']==$outgoing_id)
                {
                    $turn='you:';
                }
                else{
                    $turn='';
                }
            }
            else{
                $result1="No message  available";
            }
            (strlen($result1)>28)? $msg=substr($result1,0,28):$msg=$result1;
            $output = '<a href="chat.php?user_id='.$row['unique_id'].'">
            <div class="content">
                <img src="php/'.$row['image'].'" alt="">
                <div class="details">
                    <span>
                    '.$row['fname']." ".$row['lname'].'
                    </span>
                    <p>'.$turn.''.$msg.'</p>
                </div>
            </div>
            <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
        </a>';
        }
    }
    echo $output;
?>