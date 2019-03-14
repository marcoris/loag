<?php Session::init(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo URL; ?>public/bootstrap/css/bootstrap.min.css">
    <link rel='stylesheet' href='<?php echo URL; ?>public/fontawesome/css/all.css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
    <title>Ländliche Ostbahnen AG</title>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo URL; ?>index">LOAG</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                <ul class="navbar-nav mr-auto">
                    <?php if (Session::get('loggedIn')) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>dashboard">Dashboard</a></li>
                        <?php if (Session::get('usergroup') < 3) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>line">Linien</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>station">Stationen</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>rollmaterial">Rollmaterial</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>employee">Mitarbeiter</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>login/logout">Logout (<?php echo $_SESSION['login']; ?>)</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>schedule">Fahrplan</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>about">Über uns</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>contact">Kontakt</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>login">Login</a></li>
                    <?php endif; ?>
                </ul>
                </div>
        </nav>
    </div>

    