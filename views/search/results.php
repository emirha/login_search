<?php
/* @var User[] $users */
$searchError = App::$display->get('searchError');
?>

<?php include 'includes/header.php' ?>

<main>
    <h1>Users matching criteria "<?php echo $_POST['search'] ?>"</h1>


    <?php if (!empty($searchError)) { ?>
        <p><?php echo $searchError ?></p>
    <?php }?>

    <?php if (empty($users)) { ?>
        <p>There are no search results to show</p>
    <?php } else { ?>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-mail</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user->getId() ?></td>
                    <td><?php echo $user->getName() ?></td>
                    <td><?php echo $user->getEmail() ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>

</main>

<?php include 'includes/footer.php' ?>
