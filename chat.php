<?php
    session_start();
    if(!isset($_SESSION['unique_id']))
    {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB CONVO</title>
    <script src="https://kit.fontawesome.com/4631c0acdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <section class="chat-area">
           <header>
           <?php
            include_once "php/config.php";
            $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);
            $sql="SELECT * FROM users WHERE unique_id='{$user_id}'";
            $result=$conn->query($sql);
            if($result->num_rows>0)
            {
                $row=mysqli_fetch_assoc($result);
            }
            ?>
            <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <img src="php/<?php echo $row['image']?>" alt="">
                    <div class="details">
                        <span>
                        <?php echo $row['fname']." ".$row['lname']?>
                        </span>
                        <p><?php echo $row['status']?></p>
                    </div>
            </header>
            <div class="chat-box">
                
                
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>"hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id;?>"hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="javascript/chat.js"></script>
</body>
</html>