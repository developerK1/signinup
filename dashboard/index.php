<?php
    include_once "../controllers/db.php" ;
    session_start();

    if(isset($_SESSION['user_id']) =="") {
        header("Location: ../controllers/login.php");
    }
    if (isset($_POST['update'])) {
        $password = mysqli_real_escape_string($conn, $_POST['temppass']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['newpass']); 

        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }       
        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
        }

        $slq = "UPDATE tempuseres SET password = '".md5($password)."' WHERE id='".$_SESSION['user_id']."' ";

        mysqli_query($conn, $slq );

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="images/png" href="../imgs/favicon.png" />
    <title>Simple Log in | DevKekaone.co.za</title>
    <link href="admin.css" rel="stylesheet">
</head>

<!-- INCLUDING THE NAVBAR -->
<?php include_once "../includes/nav.php" ; ?>


<body>
<main>
<section id="admin-panel">
    <aside id="sidebar" class="centerfy-col">
        <div class="welcome-page">
            <div class="card-body">
            <h5 class="card-title">Name :- <?php echo $_SESSION['user_name']?></h5>
            <p class="card-text">Email :- <?php echo $_SESSION['user_email']?></p>
            <p class="card-text">Mobile :- <?php echo $_SESSION['user_mobile']?></p>
            </div>
        </div>
        <ul>
            <li onclick="changeCont('pass-modal')">Change Password</li>
            <li onclick="changeCont('addpost')">Add Posts</li>
            <li onclick="changeCont('posts')">Manage Post</li>
        </ul>
    </aside>
    <article id="main-section">
        <div class="child" id="pass-modal">
            <div class="pass-modal">
                <form action="" id="updatepass" class="centerfy-col" method="POST">
                <div class="centerfy-col">
                        
                        <input type="password" placeholder="enter new passwaord..." name="temppass"/>
                </div>
                <div class="centerfy-col">
                        
                        <input type="password" placeholder="enter new passwaord..." name="newpass"/>
                </div>
                <div class="centerfy">
                        <input type="checkbox" placeholder="enter new passwaord..." id="checkbox" class="pointer"/>
                </div>
                <div class="centerfy-col">
                        <button name="update">Update</button>
                </div>
                </form>
            </div> 
        </div>   
        <!-- SIBLING -->
        <div class="child" id="posts">
           <aside class="post">
                <div class="header"><span onclick="deleteItem(this)">Delete</span></div>
                <h4>Going To the Moon</h4>
                <div class="content">
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                </div>
           </aside>
           <aside class="post">
                <div class="header"><span onclick="deleteItem(this)">Delete</span></div>
                <h4>Plan Engine</h4>
                <div class="content">
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                </div>
           </aside>
           <aside class="post">
                <div class="header"><span onclick="deleteItem(this)">Delete</span></div>
                <h4>Power Of IA</h4>
                <div class="content">
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                </div>
           </aside>
           <aside class="post">
                <div class="header"><span onclick="deleteItem(this)">Delete</span></div>
                <h4>Robatic and Computer</h4>
                <div class="content">
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                </div>
           </aside>
           <aside class="post">
                <div class="header"><span onclick="deleteItem(this)">Delete</span></div>
                <h4>Civillian Image Processer</h4>
                <div class="content">
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                </div>
           </aside>
           <aside class="post">
                <div class="header"><span onclick="deleteItem(this)">Delete</span></div>
                <h4>Grey Post</h4>
                <div class="content">
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                    <p>Lorem aliquam libero nisi, imperdiet, tincidunt, gravida vehicula. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo.</p>
                </div>
           </aside>
        </div>
         <!-- SIBLING -->
         <div class="child" id="addpost">
            <div class="centerfy cont">
                <form class="centerfy-col">
                    <div class="centerfy-col">
                        <input type="text" placeholder="Add headding here ..."  id="textinput"/>
                    </div>
                    <div class="centerfy-col">
                        <textarea id="body"  rows="40" placeholder="article context here.."></textarea>    
                    </div>
                    <div class="centerfy-col">
                     <button>Add</button>
                    </div> 
                </form>
            </div>
        </div>
    </article>
</section>

<script src="admin.js"></script>
<?php  include_once "../includes/footer.php"; ?>
