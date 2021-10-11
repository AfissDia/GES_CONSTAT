<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>
<! DOCTYPE HTML>
    <HTML>

    <head>
        <meta charset="utf-8">
        <title>Se connecter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style_login.css">
    </head>

    <body>
        <section class="side">
            <img src="./images/img.svg" alt="">
        </section>
        <section class="main">
            <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

                <p class="title">Bienvenue</p>
                <div class="separator"></div>
                <p class="welcome-message">S'il vous plait, fournissez vos identifiants de connexion pour faire votre constat!</p>
                <form method="post" action="../seConnecter.php" class="form">

                    <?php if (!empty($erreurLogin)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $erreurLogin ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <input type="text" name="login" placeholder="Numéro d'immatriculation" class="form-control" autocomplete="off" />
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="form-group">
                        <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" />
                        <i class="fas fa-lock"></i>
                    </div>

                    <button type="submit" class="btn">
                        <span class="glyphicon glyphicon-log-in"></span>
                        Se connecter
                    </button>
                    <p class="text-right">
                        <a href="InitialiserPwd.php">Mot de passe Oublié</a>

                        &nbsp &nbsp
                    </p>
                </form>
            </div>
            </div>
            </div>
        </section>
    </body>

    </HTML>