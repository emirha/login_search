<?php include 'includes/header.php' ?>

<main>
    Welcome, <?php echo App::$protector->getUser()->getName() ?>
</main>

<?php include 'includes/footer.php' ?>
