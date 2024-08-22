<?php
    session_start();
    include 'connectionDB.php';

    $sql = "SELECT title, description, personnes, category_id, ville_id, image FROM logements WHERE category_id = 2";
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
    <link rel="stylesheet" href="../CSS/style-appartement.css">
    <title>Appartements</title>
</head>
<body>
    <?php
        include 'header.html';  
    ?> 
    <h1>Liste des Appartements</h1>
    <?php if (!empty($logements)): ?>
        <?php foreach ($logements as $logement): ?>
            <div class='logement'>
                <h2><?= htmlspecialchars($logement["title"]) ?></h2>
                <p>Description: <?= htmlspecialchars($logement["description"]) ?></p>
                <p>Personnes: <?= htmlspecialchars($logement["personnes"]) ?></p>
                <p>Category ID: <?= htmlspecialchars($logement["category_id"]) ?></p>
                <p>Ville ID: <?= htmlspecialchars($logement["ville_id"]) ?></p>
                
                <?php
                    // Récupération et affichage des images
                    $images = $logement["image"];
                    $imageArray = explode(",", $images);
                    foreach ($imageArray as $image) {
                        echo "<img src='" . htmlspecialchars(trim($image)) . "' alt='Image du produit'>";
                    }
                ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun logement trouvé avec category_id = 2.</p>
    <?php endif; ?>
</body>
</html>
