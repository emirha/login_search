<?php $error = App::$display->get('error'); ?>

<form method="post" action="/index/login" id="login">
    <h1>Please login</h1>

    <?php if (!empty($error)) { ?>
        <div class="well">
            <?php echo App::$display->get('error') ?>
        </div>
    <?php } ?>

    <div>
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="" />
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="" />
    </div>

    <a href="/register">New user?</a>
    <input type="submit" value="Log In" />

</form>