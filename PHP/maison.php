<?php
session_start();
include 'connectionDB.php';

$sql = "SELECT id, title, description, personnes, category_id, ville_id, image, liens FROM logements WHERE category_id = 2";
$result = $conn->query($sql);

$logements = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $logements[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/style-maison.css">
    <link rel="stylesheet" href="../CSS/style-carrousel.css">
    <script src="../JS/script-maison.js"></script>
    <link rel="icon" type="image/x-icon" href="logo/anc-Photoroom.png">
    <title>Maisons</title>
</head>
<body>
    <div id="header">
        <?php include 'header.html'; ?>
    </div>

    <h1>Liste des Maisons</h1>
    <div class="container">
        <?php if (!empty($logements)): ?>
            <?php foreach ($logements as $logement): ?>
                <div class='logement'>
                    <h2><?= htmlspecialchars($logement["title"]) ?></h2>
                    <p>Description: <?= htmlspecialchars($logement["description"]) ?></p>
                    <p>Personnes: <?= htmlspecialchars($logement["personnes"]) ?></p>

                    
                    <div class="carousel" data-current-index="0">
                        <button class="btn prev">&#10096;</button>
                        <button class="btn next">&#10097;</button>
                        <ul class="image-slider">
                            <?php
                            // Récupération et affichage des images
                            $images = $logement["image"];
                            $imageArray = explode(",", $images);
                            foreach ($imageArray as $index => $image): ?>
                                <li class="slide <?= $index === 0 ? 'active' : '' ?>">
                                    <img src='<?= htmlspecialchars(trim($image)) ?>' alt='Image du produit'>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="liens">
                        <?php
                        // Récupération et affichage des liens
                        $liens = $logement["liens"];
                        $lienArray = explode(",", $liens);
                        foreach ($lienArray as $lien): ?>
                            <a href='<?= htmlspecialchars(trim($lien)) ?>' target='_blank'>
                                <button>Visiter le lien</button>
                            </a><br>
                        <?php endforeach; ?>
                    </div>
                    <br>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune Maison trouvée</p>
        <?php endif; ?>
    </div>
</body>
</html>