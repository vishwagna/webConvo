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
<?php
    session_start();
    if(!isset($_SESSION['unique_id']))
    {
        header("location:login.php");
    }
?>
<body>
    <div class="wrapper">
        <section class="users">
           <header>
            <?php
            include_once "php/config.php";
            $sql="SELECT * FROM users WHERE unique_id='{$_SESSION['unique_id']}'";
            $result=$conn->query($sql);
            if($result->num_rows>0)
            {
                $row=mysqli_fetch_assoc($result);
            }
            ?>
                <div class="content">
                    <img src="php/<?php echo $row['image']?>" alt="">
                    <div class="details">
                        <span>
                        <?php echo $row['fname']." ".$row['lname']?>
                        </span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>"class="logout">Logout</a>
           </header>
           <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
           </div> 
           <div class="users-list">
                
                
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>