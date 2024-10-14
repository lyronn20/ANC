<?php
    session_start();
    include 'connectionDB.php';

    // Récupérer trois appartements
    $queryAppartements = "SELECT * FROM logements WHERE category_id = 1 ORDER BY RAND() LIMIT 3";
    $resultAppartements = mysqli_query($conn, $queryAppartements);
    $appartements = mysqli_fetch_all($resultAppartements, MYSQLI_ASSOC);

    // Récupérer deux maisons
    $queryMaisons = "SELECT * FROM logements WHERE category_id = 2 ORDER BY RAND() LIMIT 2";
    $resultMaisons = mysqli_query($conn, $queryMaisons);
    $maisons = mysqli_fetch_all($resultMaisons, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style-index.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <script src="../JS/script-index.js" defer></script>
    <link rel="icon" type="image/x-icon" href="logo/anc-Photoroom.png">
    <title>ANC</title>
</head>
<body>
    <div id="header">
        <?php include 'header.html'; ?>
    </div>
<div class="all">
    <div class="container">
        <h2>Nos Services</h2>
        <p>
            Bienvenue à Deauvillaise Conciergerie, votre partenaire de confiance pour la gestion de logements de location saisonnière à Deauville. 
            Nous offrons une gamme complète de services pour assurer que votre séjour soit confortable et sans souci. 
            Que vous soyez propriétaire cherchant à maximiser vos revenus locatifs ou un vacancier à la recherche d'un hébergement de qualité, 
            notre équipe dédiée est là pour répondre à tous vos besoins. Profitez de notre expertise locale et de notre engagement à fournir un service exceptionnel.
        </p>
        <a href="services.php"><p>Voir plus</p></a>
    </div>

    <div id="logement">
        <h2>Appartements</h2>
        <?php foreach ($appartements as $appartement): ?>
            <div class="logement">
                <h4><?= htmlspecialchars($appartement['title']) ?></h4>
                <div class="carousel">
                    <button class="btn prev">&#10096;</button>
                    <button class="btn next">&#10097;</button>
                    <?php
                        // Récupération et traitement des images
                        $images = $appartement['Image'];
                        $imageArray = explode(",", $images);
                    ?>
                    <ul class="image-slider">
                        <?php foreach ($imageArray as $index => $image): ?>
                            <li class="slide <?= $index === 0 ? 'active' : '' ?>">
                                <a href="logement.php?id=<?= htmlspecialchars($appartement['id']) ?>">
                                    <img src="<?= htmlspecialchars(trim($image)) ?>" alt="Image du produit">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <p><?= htmlspecialchars($appartement['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="logement">
        <h2>Maisons</h2>
        <?php foreach ($maisons as $maison): ?>
            <div class="logement">
                <h4><?= htmlspecialchars($maison['title']) ?></h4>
                <div class="carousel">
                    <button class="btn prev">&#10096;</button>
                    <button class="btn next">&#10097;</button>
                    <?php
                        // Récupération et traitement des images
                        $images = $maison['Image'];
                        $imageArray = explode(",", $images);
                    ?>
                    <ul class="image-slider">
                        <?php foreach ($imageArray as $index => $image): ?>
                            <li class="slide <?= $index === 0 ? 'active' : '' ?>">
                                <a href="logement.php?id=<?= htmlspecialchars($maison['id']) ?>">
                                    <img src="<?= htmlspecialchars(trim($image)) ?>" alt="Image du produit">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <p><?= htmlspecialchars($maison['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="footer">
        <p>Mentions légales</p>
        <p>© 2024 ANC Conciergerie</p>
    </div>
</div>
</body>
</html>