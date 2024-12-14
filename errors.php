<?php $errors = array(); ?>

<?php if (count($errors) > 0) { ?>
    <div>
        <?php foreach ($errors as $error) { ?>
            <h1><?php echo $error ?></h1>
        <?php } ?>
    </div>

<?php } ?>