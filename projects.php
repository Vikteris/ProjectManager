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
        <?php require 'functions.php';?>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "mysql";
            $dbname = "projectmanager";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            
                    $sql = "SELECT projektai.project_id, projektai.project_name, group_concat(darbuotojai.name) as asign_workers
                    from projektai LEFT JOIN darbuotojai ON projektai.project_id = darbuotojai.project
                    GROUP BY projektai.project_id";
                    
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table class='jtabl'>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Assign workers</th>
                            <th class='actio'>Action</th>
                        </tr>";
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                            <td>". $row["project_id"] ."</td>
                            <td>". $row["project_name"] ."</td>
                            <td>". $row['asign_workers'] ."</td>
                            <td class= 'actbtn'>
                                <form class='del' action='functions.php' method='post'>
                                    <input type='submit' name='delete_project' value='DELETE'>
                                    <input type='hidden' name='project_name' value='".$row["project_name"]."'>
                                </form>
                                
                                <form class='upd' action='' method='post'>
                                    <input class='update' type='submit' name='' value='UPDATE'>
                                    <input type='hidden' name='download' value=' . '>
                                </form>
                            </td>
                            </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<tr>
                            </tr>";
                    }
                    
                    // mysqli_close($conn);
        ?>
        <div class="addproject">
            <h3>Create project:</h3>
            <form action="functions.php" method="post">
                <input type="text" name="new_project" placeholder="Project name" required>
                <input type="submit" name="add_projects" value="Add">
            </form>
        </div>
        
    </main>
    <footer>

    </footer>
</body>
</html>
   