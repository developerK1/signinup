<?php
    session_start();
    include_once "includes/header.php"; 
?>
<header>
    <?php 
        if (isset( $_SESSION['user_id'])){
            echo '
                <nav>
                <div id="logo">
                    <img src="imgs/lg.png" class="logo"/>
                </div>
                    <ul>
                        <li><a href="/" class="succes">HOME</a></li>
                        <li><a href="dashboard/" class="error">PROFILE</a></li>
                    </ul>
                </nav>
            ';
        }
    ?>
</header>
<section id="home-sec">
    <?php
        if (isset( $_SESSION['user_id'])){
          echo '  
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
            </div>';
        }else{
            echo '<section id="redirect">
                <div class="redirect centerfy-col">
                    <h2>YOU ARE NOT LOGGED IN</h2>
                    <p>Redirecting you in a moment <span>5</span></p>
                <div>
            </section>
            <script>
                let counterInterval;
                let counter = 5;
                const pSpan = document.querySelector("span");
    
                counterInterval = setInterval(()=>{
                    pSpan.textContent = counter;
                    
                    if(counter === 0){
                        counter = 0;
                        clearInterval(counterInterval);
                        window.location = "controllers/login.php";
                    }
    
                    counter--;
                }, 1000)
            </script>';
        }
    ?>
</section>

<?php include_once "includes/footer.php" ; ?>