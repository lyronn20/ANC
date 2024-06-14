<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANC/crée_un_compte</title>
</head>
<body>
    <form class="form-control" action="" method="post">
        <p class="title">Crée un compte</p>
        <div class="input-field">
            <input required="" class="input" type="text" name="username" />
            <label class="label" for="input">Entrer votre nom</label>
        </div>
        <div class="input-field">
            <input required="" class="input" type="text" name="email" />
            <label class="label" for="input">Entrer un email </label>
        </div>
        <div class="input-field">
            <input required="" class="input" type="password" name="password1" />
            <label class="label" for="input">Confirmer mon mot de passe </label>
        </div>
        <button class="submit-btn" name="signup">Crée un compte</button>
    </form>
    <p>Votre mot de passe doit contenir</p>
    <ul>
        <p>au moins 8 caractères</p>
        <p>au moins une lettre majuscule</p>
        <p>au moins une lettre minuscule</p>
        <p>au moins un chiffre</p>
        <p>au moins un caractère spécial</p>
    </ul>
</body>
</html>

<?php
    include 'connectionDB.php';
?>
<?php
    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = ($_POST['password']);

        // Validation du mot de passe
        if(strlen($password) < 8) {
            echo "Le mot de passe doit contenir au moins 8 caractères";
            return;
        }
        if(!preg_match('/[A-Z]/', $password)){
            echo "Le mot de passe doit contenir au moins une lettre majuscule";
            return;
        }
        if(!preg_match('/[a-z]/', $password)){
            echo "Le mot de passe doit contenir au moins une lettre minuscule";
            return;
        }
        if(!preg_match('/[0-9]/', $password)){
            echo "Le mot de passe doit contenir au moins un chiffre";
            return;
        }
        if(!preg_match('/[\W]/', $password)){
            echo "Le mot de passe doit contenir au moins un caractère spécial";
            return;
        }


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "L'adresse email '$email' est considérée comme invalide.";
            return;
        }
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|de|co\.uk|fr|it|nl|es|eu|pl|se)$/', $email)) {
            echo "L'adresse email '$email' ne respecte pas le format attendu.";
            return;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Compte crée avec succès";
        }else{
            echo "le compte n'a pas pu être crée";
        }

        header("Location: index.php");
        exit;
    }
?>