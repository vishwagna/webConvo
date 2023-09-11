<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB CONVO</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    
</head>
<body>

    <div class="wrapper">
        <section class="form login">
            <header>WEB CONVO</header>
            <div class="error-txt">This is an error message</div>
            <form action="#">
                <div class="name-details">
                    <div class="field input">
                        <label for="">Email Address</label>
                        <input type="text"name="email" required >
                    </div>
                   <div class="field input">
                        <label for="">Password</label>
                        <input type="password"name="pass" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Login">
                    </div>
                </div>
            </form>
            <div class="link">Not yet Signed up? <a href="index.php">SignUp</a></div>
        </section>
    </div>
    <script src="javascript/login.js"type="text/javascript"></script>
</body>
</html>