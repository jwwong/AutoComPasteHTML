<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 8:20 PM
 * To change this template use File | Settings | File Templates.
 */

if (!isset($_COOKIE["user"])){
    $message = "Please use a username";
    header("Location: index.php?message=".$message);
    exit;
}
?>

<html>
<head>
    <title>AutoComPaste/XWindow Experiment</title>
</head>
<body>
<div>
    <p>
        End of Experiment! Well done~
    </p>

    <!-- <a href="generate2.php" target="_blank">Generate File</a> -->
</div>


</body>
</html>
