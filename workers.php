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
        <?php require 'functions.php' ?>
        <?php
            $sql = "SELECT darbuotojai.id, darbuotojai.name, group_concat(projektai.project_name) as project
            from projektai RIGHT JOIN darbuotojai ON projektai.project_id = darbuotojai.project
            GROUP BY darbuotojai.id"; 
            $result = mysqli_query($conn, $sql);

            
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='jtabl'>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Project</th>
                    <th class='actio'>Action</th>
                </tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td>". $row["id"] ."</td>
                    <td>". $row["name"] ."</td>
                    <td>". $row['project'] ."</td>
                    <td class= 'actbtn'>
                        <form class='del' action='functions.php' method='post'>
                            <input type='submit' name='delete_worker' value='DELETE'>
                            <input type='hidden' name='id' value='".$row["id"]."'>
                        </form>
                        
                        <form class='upd'  method='post'>
                            <input type='submit' name='update_name' value='UPDATE'>
                            <input type='hidden' name='id' value='".$row["id"]."'>
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
            <div class="addworker">
                <h3>New worker:</h3>
                <form action="functions.php" method="post">
                    <input type="text" name="new_workers" placeholder="Name" required>
                    <label for="projektai"></label>
                    <select name="projektai" >
                        <?php
                            echo "<option value='NULL'>Empty</option>";
                                $sql = "SELECT project_id, project_ename FROM projektai;";
                                $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                echo "<option name='select_project' value='".$row['project_id']."'>".$row['project_name']."</option>";
                                    }
                                }
                        ?>
                    </select>
                    <input type="submit" name="add_worker" value="Add">
                </form>
            </div>
        <!--  workers rename logic -->
            <?php
            if(isset($_POST['update_name']))
            echo "<div class='wUpdate'>
                    <form action='functions.php' method='post'>
                        <label>Worker id: &nbsp; ".$_POST['id']." </label>
                        <input type='text' name='new_name' placeholder='Worker new name' required>
                        <input type='hidden' name='worker_id' value='".$_POST['id']."'>
                        <input type='submit' name='name_submit' value='Comfirm'>
                    </form>
                </div>";

        ?>
                               
    </main>
    <footer>

    </footer>
</body>
</html>