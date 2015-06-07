<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Emir test for HelloFresh</title>

    <link href="/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />

</head>
<body>

<nav>
    <div>
        <div>
            <a class="navbar-brand" href="/">
                <img alt="Brand" src="/images/hellofresh-logo.png" width="36" height="36" />
            </a>

            <h1 class="navbar-text navbar-left">Hello Fresh Test Emir Hadzic</h1>

            <ul>
                <?php if (App::$protector->loggedIn()) { ?>
                    <li><a href="/index/logout">Logout</a></li>
                <?php } else { ?>
                    <li><a href="/register">Register</a></li>
                    <li><a href="/">Login</a></li>
                <?php } ?>

            </ul>

            <form method="post" class="form-inline" action="/search/search" >
                <div class="form-group">
                    <input type="text" class="form-control" name="search" value="<?php echo empty($_POST['search']) ? '' : htmlspecialchars($_POST['search']) ?>" />
                </div>
                <input type="submit" value="Search" />
            </form>
        </div>
    </div>
</nav>