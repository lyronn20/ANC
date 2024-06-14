<?php
    session_start();
    include 'connectionDB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANC/Profil</title>
</head>
<body>
    <?php 
            $sql = "SELECT * FROM users"; 
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Affichez les informations de chaque utilisateur
                while($row = $result->fetch_assoc()) {
                    echo "Nom d'utilisateur: " . $row["username"] . "<br>";
                    echo "Email: " . $row["email"] . "<br>";
                    
                }
            }
    ?>
</body>
</html>

