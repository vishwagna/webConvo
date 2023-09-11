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
        <section class="form signup">
            <header>WEB CONVO</header>
            <div class="error-txt"> </div>
            <form action="#">
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" name="fname"  required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text"name="lname"  required>
                    </div>
                    <div class="field input">
                        <label for="">Email Address</label>
                        <input type="text" name="email"  required>
                    </div>
                   <div class="field input">
                        <label for="">Password</label>
                        <input type="password"name="pass" required>
                    </div>
                    <div class="field image">
                        <label for="">Add Profile image</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Start Chatting">
                    </div>
                </div>
            </form>
            <div class="link">Already Signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>
    <script src="javascript/signup.js"></script>
</body>
</html>