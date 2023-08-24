<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <?php # echo "<link rel='stylesheet'  href='/css/styles.css' />"; ?>
    <?php include_once DR."/templates/styles.php" ?>
</head>
<body>
    <header></header>
    <main>
        <?php
            if ( file_exists( DR."/templates/".$__template.'.php') ) {
                require_once DR."/templates/".$__template.'.php';
            // } else {
            //     echo "<noindex><b><i>template '$__template' not found</i></b></noindex>";
            }
        ?>
    </main>
    <footer></footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <?php include_once DR."/templates/js.php" ?>
</body>
</html>