<?php
include 'db_connection.php';

if(isset($_POST['newUsername']) && isset($_POST['email']) && isset($_POST['newPassword'])) {
    $newUsername = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO laborator (username, email, password) VALUES ('$newUsername', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {

        echo '<script>window.location.href = "info_page.php";</script>';
        echo '<script>showSuccessMessage();</script>';
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Eroare: Unele date de înregistrare lipsesc!";
}

$conn->close();
?>
