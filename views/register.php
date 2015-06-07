<?php
/* @var $user User */
$user = App::$display->get('user');
?>
<?php include 'includes/header.php' ?>

<main>
    <form method="post" action="/register/register" id="register">

        <?php if ($user->getValidationErrors()) { ?>
            <ul class="well">
                <?php foreach ($user->getValidationErrors() as $error) { ?>
                    <li><?php echo $error ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <div>
            <label for="email">E-mail (will be your username)</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $user->getEmail() ?>" />
        </div>

        <div>
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->getName() ?>" />
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" />
        </div>

        <div>
            <label for="password_confirm">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" />
        </div>

        <input type="submit" value="Register" />

    </form>
</main>

<?php include 'includes/footer.php' ?>
