<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT password FROM laborator WHERE username='$username'";

        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                   
                    echo '<script>window.location.href = "info_page.php";</script>';
                    echo '<script>showSuccessMessage();</script>';
                } else {
                    echo "Nume de utilizator sau parolă incorectă.";
                }
            } else {
                echo "Nume de utilizator sau parolă incorectă.";
            }
        } else {
            echo "Eroare MySQL: " . $conn->error;
        }
    } else {
        echo "Eroare: Unele date de logare lipsesc!";
    }

    $conn->close();
}
?>
