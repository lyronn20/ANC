<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANC/Connexion</title>
</head>
<body>
    <form class="form-control" action="" method="post">
        <p class="title">Se connecter</p>
        <div class="input-field">
            <input required="" class="input" type="text" name="email" />
            <label class="label" for="input">Entrer un Email</label>
        </div>
        <div class="input-field">
            <input required="" class="input" type="password" name="password" />
            <label class="label" for="input">Entre un mot de passe </label>
        </div>
        <button class="submit-btn" name="submit">Se connecter</button>
        <div class="create-account">
            <p>Je n'ai pas de compte ?</p>
            <a href="cree.php">Crée un compte </a>
        </div>
    </form>
</body>
</html>


<?php
    session_start();
    include 'connectionDB.php';


    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            if(password_verify($password, $user['password'])){
                $_SESSION['connecter'] = true;
                header("Location: index.php");
                exit;
            }else{
                echo "Mot de passe incorrect";
            }
        }else{
            echo "Aucun compte trouvé avec cet e-mail";
        }
        
    }

?>
