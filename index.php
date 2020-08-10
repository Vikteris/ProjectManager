<?php require 'functions.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjectManager</title>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
<header>
        <nav class="nav">
        <div>
        <a href="index.php"><p>Project manager</p></a>
        </div>
         
            <form class="workers" action="workers.php" method="POST">
                <button type="submit">Workers</button>
            </form>
            <form class="projects" action="projects.php" method="POST">
            <button type="submit">Projects</button>
            </form>
            
        </nav>
</header>
<main>
     <!-- php logika skaityti info-->

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "projectmanager";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
        
    ?>
    <h1>WELCOME TO PROJECT MANAGER</h1>
    
    
</main>
<footer>
    <!-- kažkas minimaliai prirašyta -->
</footer>

</body>
</html>