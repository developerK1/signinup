<?php
session_start();

require_once "db.php";

if(isset($_SESSION['user_id'])!="") {
    header("Location: ../login.php");
}

if (isset($_POST['login'])) {
    //Snatizing the variables from form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Validating Email
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    //Validate password not more than 6 characters
    if(strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    }  

    //Fetching all emails
    $result = mysqli_query($conn, "SELECT * FROM tempuseres WHERE email = '" . $email. "' and password = '" . md5($password). "'");
   if(!empty($result)){

        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_mobile'] = $row['mobile'];
            echo "errsdo";
           header("Location: ../dashboard/");
        } 
        
        $error_message = "<p class='error'>Incorrect Email or Password!!!</p>";

    }else {
        echo "erro";
        $error_message = "<p class='error'>Incorrect Email or Password!!!</p>";
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="images/png" href="../imgs/favicon.png" />
    <title>Simple Log in | DevKekaone.co.za</title>
    <style>
        section {
            width : 100%;
            height : 100vh;
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
            min-height: 160px;
            display: flex;
        }
        form {
            width : 100%;
            height : 100%;
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
        <div class="line"></div>
        <p>Please fill all fields in the form</p>
        <aside class="form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group ">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                </div>
                    <p class="error"><?php if (isset($email_error)) echo $email_error; ?></p>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                </div>  
                    <p class="error"><?php if (isset($password_error)) echo $password_error; ?></p>
                <div class="line"></div>
                    <p class="error"><?php if (isset($error_message)) echo $error_message; ?></p>
                <div class="form-group">
                    <button type="submit"  name="login" >Submit</button>
                </div>
                
                <!-- <p class="error"><?php if (isset($no_acount)) echo $no_acount; ?></p> -->
                <p>You don't have account?<a href="registration.php" class="mt-3">Click Here</a></p>
            </form>
        </aside>
    </article>    
</section>
</main>
</body>
</html>
