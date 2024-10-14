<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="../CSS/style-contact.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="icon" type="image/x-icon" href="logo/anc-Photoroom.png">

    <div id="header">
        <?php include 'header.html'; ?>
    </div>
</head>
<body>
    <h2>Contactez-nous</h2>

    <form action="traitement.php" method="post">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>