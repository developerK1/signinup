<?php $logout = '<a href="../controllers/logout.php" class="error" >Logout</a>';?>

<header>
    <nav>
    <img src="../imgs/lg.png" class="logo"/>
        <ul>
            <li><a href="../" class="succes">HOME</a></li>
            <li><?php if (isset( $_SESSION['user_id'])) echo $logout ?></li>
        </ul>
    </nav>
</header>