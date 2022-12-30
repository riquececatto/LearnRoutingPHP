<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/css/styles.css">

    <title> <?php echo $title ?> </title>
</head>
<body>
    <?php require_once VIEW . 'partials/header/header.php'; ?>
    <?php require_once VIEW . $view;?>
</body>
</html>