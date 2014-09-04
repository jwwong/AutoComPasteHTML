<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 3:45 PM
 * To change this template use File | Settings | File Templates.
 */

// Process your information here

if (!empty($_POST)) {
    $demodata = $_POST;
    foreach ($_POST as $key => $value) {
        setcookie("demodata_".$key, $value, time()+(3600*3));
    }

    //echo "hello";
} else {
    header("Location: index.php");
    /* Make sure that code below does not get executed when we redirect. */
    exit;
}
// cookie null check
if (!isset($_COOKIE["user"])){
    $message = "Please use a username";
    header("Location: index.php?message=".$message);
    exit;
}

$user = $_COOKIE["user"];

// SET FOR BLOCKS HERE!!!

$max_blocks = 7;

setcookie("max_blocks", strval($max_blocks), time()+(3600*3));
setcookie("block", strval(0), time()+(3600*3));

?>

<html>
<head>
    <title>AutoComPaste/XWindow Experiment</title>
</head>
<body>
<div>
    <p>
        Select copy-and-paste interface to test first:
    </p>
</div>

<div>
<form action="page3.php" method="post">
    <span>Interface</span><br/>
    <input type="radio" name="interface" value="acp">ACP<br/>
    <input type="radio" name="interface" value="xwindow">XWindow<br/>
    <input id="submit" type="submit" value="submit">
</form>
</div>

</body>
</html>