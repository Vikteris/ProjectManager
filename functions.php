<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "projectmanager";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Delete workers
function delete_worker() {
    global $conn;
    $sql = 'DELETE FROM darbuotojai WHERE `id`= '.$_POST['id'].';';
    mysqli_query($conn, $sql);
}
if(isset($_POST['delete_worker'])) {
    delete_worker();
    header('Location: workers.php');
}
//Delete  project
function delete_project() {
    global $conn;
    $sql = "DELETE FROM projektai WHERE project_name = "."'".$_POST['project_name']."'".";";
    mysqli_query($conn, $sql);
}
if(isset($_POST['delete_project'])) {
    delete_project();
    header('Location: projects.php');
}


// ADD new project
    function add_project() {
        global $conn;
        $sql = "INSERT INTO projektai (`project_id`, `project_name`)
        VALUES (NULL,"."'".$_POST['new_project']."'".");";
        mysqli_query($conn, $sql);
    }
    if(isset($_POST['add_projects'])) {
        add_project();
        header('Location: projects.php');
    }


// Project update
    function update_project() {
        global $conn;
        $sql = "UPDATE projektai SET `project_name` ="."'".$_POST['project_newname']."'"." WHERE `project_name`="."'".$_POST['project_old']."'".";";
        mysqli_query($conn, $sql);
    }
    if(isset($_POST['rename_submit'])) {
        update_project();
        header('Location: projects.php');
    }


// ADD new worker
    function add_workers() {
        global $conn;
        $sql = "INSERT INTO darbuotojai (`id`, `name`, `project`)
                VALUES (NULL,"."'".$_POST['new_workers']."'".",".$_POST['projektai'].");";
        mysqli_query($conn, $sql);
    }
    if(isset($_POST['add_worker'])) {
        add_workers();
        header('Location: workers.php');
    }
// Worker name update
    function update_name() {
        global $conn;
        $sql = "UPDATE darbuotojai SET `name` ="."'".$_POST['new_name']."'"." WHERE `id`=".$_POST['worker_id'].";";
        mysqli_query($conn, $sql);
    }
    if(isset($_POST['name_submit'])) {
        update_name();
        header('Location: workers.php');
    } 


    
?>
