<?php
  require_once "db.php";

  if(isset($_SESSION['user_id'])!="") {
    header("Location: dashboard.php");
  }

    if (isset($_POST['signup'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
        if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $name_error = "Name must contain only alphabets and space";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }       
        if(strlen($mobile) < 10) {
            $mobile_error = "Mobile number must be minimum of 10 characters";
        }
        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
        }
        if (!$error) {
            if(mysqli_query($conn, "INSERT INTO tempuseres (name, email, mobile ,password) VALUES('" . $name . "', '" . $email . "', '" . $mobile . "', '" . md5($password) . "')")) {
             header("location: login.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="images/png" href="../imgs/favicon.png" />
    <title>Simple Registration Form in PHP with Validation | Tutsmake.com</title>
    <style>
        section {
            width : 100%;
            min-height : 100vh;
            padding: 1% 0%;
            display :flex;
            background : url("../imgs/flower.jpg") no-repeat;
            background-position: center;
            background-size: cover;
        }
        article {
            width: 400px;
            min-height: 300px;
            justify-content: space-around;
            display: flex;
            flex-direction: column;
            box-shadow: 10px 16px 18px #000000c9;
            margin: auto;
            border-radius: 11px;
            padding: 1%;
            background-color: #0000009e;
            color: #4fff00;
            text-shadow: 1px 1px 3px #b0a3a3;
            font-size: 130%;
        }
        .header{
            width : 100%;
            text-align: center;
        }
        .form {
            width: 100%;
            display: flex;
        }
        form {
            width : 100%;
        }
        .form-group {
            width : 100%;
            display : flex;
            padding : 0px 1%;
            margin : 15px 0px;
            justify-content: space-between;
        }
        
        form input {
            width : 58%;
        }
        form  label {
            width : 30%;
            text-align: right;
        }
        button {
            margin: 20px auto;
            width: 120px;
            height: 38px;
            cursor: pointer;
            transition: all 0.5s ease;
            outline: none;
            background-color: black;
            color: white;
            font-weight: 300;
            border-radius: 5px;
        }
        .line {
            height: 5px;
            background-color: #73cf09;
            border-radius: 3px;
            width : 94%;
            margin : 20px auto;
        }
         p {
            text-align: center;
         }
         a {
            color: #097dcf;
            text-shadow: none;
        }
         .error {
            color :red;
            font-weight: 900;
            font-style : italic;
            text-shadow: none;
         }
         .notice-modal {
            width : 100%;
            height: 100%;
            position: fixed;
            top:0px;
            left : 0px;
            display :flex;
         }
         #redirect {
            width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                display: flex;
                background: linear-gradient(74deg,#5eb70ca1, #000000c4 );
         }
        .redirect {
            width: 455px;
            height: 320px;
            margin: auto;
            text-align: center;
            background-color: #000000;
            border-radius: 12px;
            box-shadow: 2px 2px 20px 0px black;
            color: #eaeaea;
        }
        .redirect h2 {
            font-size : 32px;
            font-style : italic;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .redirect p {
            font-size : 20px;
            font-style : italic;
            font-family: Geneva, Verdana, sans-serif;
            font-weight: 300;
        }
        .redirect span {
            font-size :28px;
            font-style : italic;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 800;
            color : #73cf09;
        }


         /* HOVER STATE */
         button:hover {
            background-color: #097dcf;
            color: white;
            font-weight: 700;
            letter-spacing: 2px;
            border : 2px solid #73cf09;
        }
    </style>
</head>
<body>
    <section>
            <article>
                <aside class="header">
                <h2>PHP FORMS</h2>
                </aside>
                <p>Please fill all fields in the form</p>
                <div class="line"></div>
                <aside class="form">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="" maxlength="50" required="">  
                        </div>
                            <p class="error"><?php if (isset($name_error)) echo $name_error; ?></span>
                        <div class="form-group ">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="" maxlength="30" required="">      
                        </div>
                            <p class="error"><?php if (isset($email_error)) echo $email_error; ?></p>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="" maxlength="12" required=""> 
                        </div>
                            <p class="error"><?php if (isset($mobile_error)) echo $mobile_error; ?></p>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                        </div>  
                            <p class="error"><?php if (isset($password_error)) echo $password_error; ?></p>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
                        </div>
                            <p class="error"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></p>
                        <div class="line"></div>
                            <p class="error"><?php if (isset($error_message)) echo $error_message; ?></p>
                        <div class="form-group">
                            <button name="signup">Sign Up</button>
                        </div>
                        <p>Already have a account?<a href="login.php" class="btn btn-default">Login</a></p>
                    </form>
                </aside>
            </div> 
    </section>
    <div class="notice-modal">
        <div id="redirect">
            <div class="redirect centerfy-col">
                <h2>Your Credentials will be automatically deleted</h2>
                <h2> within 12 hours of day</h2>
                <p>Please Take NoT!!! <span>5</span></p>
            <div>
    </div>   
    </div>
<script>
    let counterInterval;
    let counter = 5;
    const pSpan = document.querySelector("span");

    counterInterval = setInterval(()=>{
        pSpan.textContent = counter;
        
        if(counter === 0){
            counter = 0;
            clearInterval(counterInterval);
            document.querySelector(".notice-modal").style.display = "none";
        }

        counter--;
    }, 1000)
</script>';
</body>
</html>
