<?php
session_start();
include 'connectionDB.php';

// Récupérer l'ID du logement
$logement_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($logement_id > 0) {
    // Requête pour récupérer les informations du logement
    $query = "SELECT * FROM logements WHERE id = $logement_id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $title = htmlspecialchars($row['title']);
        $description = htmlspecialchars($row['description']);
        $images = htmlspecialchars($row['Image']);
        $liens = htmlspecialchars($row['liens']);
    } else {
        echo "Logement non trouvé.";
        exit;
    }
} else {
    echo "ID de logement invalide.";
    exit;
}

// Séparer les images et les liens en tableaux
$imageArray = explode(",", $images);
$lienArray = explode(",", $liens);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../CSS/style-logement.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="icon" type="image/x-icon" href="logo/anc-Photoroom.png">
</head>
<body>
    <div id="header">
        <?php include 'header.html'; ?>
    </div>
    <div class="logement">
        <h1><?php echo $title; ?></h1>
        <div class="carousel">
            <button class="btn prev">&#10096;</button>
            <button class="btn next">&#10097;</button>
            <ul class="image-slider">
                <?php foreach ($imageArray as $index => $image): ?>
                    <li class="slide <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo htmlspecialchars(trim($image)); ?>" alt="Image du produit">
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <p><?php echo $description; ?></p>
        
        <div class="liens">
            <?php foreach ($lienArray as $lien): ?>
                <a href="<?= htmlspecialchars(trim($lien)) ?>" target="_blank">
                    <button>Visiter le lien</button>
                </a><br>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="../JS/script-logement.js"></script>
</body>
</html>