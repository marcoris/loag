<?php Session::init(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
    <title>PHP-MVC</title>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index">Ländliche Ostbahnen AG</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if (Session::get('loggedIn')) : ?>
                    <li><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>
                    <li><a href="<?php echo URL; ?>useplan">Einsatzplan</a></li>
                    <?php if (Session::get('usergroup') > 1) : ?>
                        <li><a href="<?php echo URL; ?>user">Users</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo URL; ?>login/logout">Logout (<?php echo Session::get('login'); ?>)</a></li>
                <?php else : ?>
                    <li><a href="<?php echo URL; ?>schedule">Fahrplan</a></li>
                    <li><a href="about">Über uns</a></li>
                    <li><a href="contact">Kontakt</a></li>
                    <li><a href="<?php echo URL; ?>login">Login</a></li>
                <?php endif; ?>
            </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </div>
    <div class="content">