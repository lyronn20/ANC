<?php
    session_start();
    include 'connectionDB.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-index.css">
    <title>ANC</title>
</head>
<body>
    <h1>ANC Conciergerie</h1>
    <div class="navbar">
        <ul>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
            </div>
    <?php if (isset($_SESSION['connecter']) && $_SESSION['connecter'] == true): ?>
            <a href='deconnexion.php' class='nav-link'>
                <button><span>Se deconnecter</span></button>
            </a>
            <a href="Profil.php" class="nav-link">
                <button class="cart">Mon profil</button>
            </a>
        <?php else: ?>
            <a href='connexion.php' class='nav-link'>
                <button><span>Se connecter</span></button>
            </a>
        <?php endif; ?>
    </div>
        </ul>
    </div>
    
</body>
</html>