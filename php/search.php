<?php
include_once "config.php";
$output=" ";
$searchTerm = mysqli_real_escape_string($conn,$_POST['searchTerm']);
$sql="SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' or lname LIKE '%{$searchTerm}%'";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
        <div class="content">
            <img src="php/'.$row['image'].'" alt="">
            <div class="details">
                <span>
                '.$row['fname']." ".$row['lname'].'
                </span>
                <p>this is a text message</p>
            </div>
        </div>
        <div class="status-dot"><i class="fas fa-circle"></i></div>
    </a>';
    }
}
else{
    $output="no user found!";
}
echo $output;
?>