<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 3:59 PM
 * To change this template use File | Settings | File Templates.
 */

if (!isset ($_COOKIE["interface"])) {
    if (!empty($_POST)) {
        $interface = $_POST["interface"];
        setcookie("interface", $interface, time()+(3600*3));
        //echo "hello";
    } else {
        header("Location: index.php");
        /* Make sure that code below does not get executed when we redirect. */
        exit;
    }
} else {
    $interface = $_COOKIE["interface"];
    if (strcmp($interface, "acp")==0) {
        $interface = "xwindow";
    } else {
        $interface = "acp";
    }
}

if (!isset($_COOKIE["user"])){
    $message = "Please use a username";
    header("Location: index.php?message=".$message);
    exit;
}

$user = $_COOKIE["user"];

require_once("external_files.php");

if (isset($_COOKIE["block"]) && isset($_COOKIE["max_blocks"])) {
    $block_num = floatval($_COOKIE["block"]);

    $block_num = $block_num+1;
    $modular_num = intval($block_num);
    $block_num = $block_num/2;
    $block_num = round($block_num, 0, PHP_ROUND_HALF_UP);

    $tasklist = $tasklist."_".$block_num;

    if (($modular_num%2)==1) {
        if (isset ($_COOKIE["interface"])) {
            $interface = $_COOKIE["interface"];
            if (strcmp($interface, "acp")==0) {
                $interface = "acp";
            } else {
                $interface = "xwindow";
            }
        }
    }
//    echo $_COOKIE["block"]."\n";
//    echo $_COOKIE["max_blocks"]."\n";
//    echo intval($_COOKIE["max_blocks"])."\n";
//    echo (intval($_COOKIE["max_blocks"])*2)." ";
//    echo $block_num;
}

if (strcmp($interface, "acp")==0) {
    $msg = "To copy-and-paste using AutoComPaste, type the prefix of the given text. A list of texts matching the prefix you entered will be displayed live as you type. Use cursor/arrow keys to select the text you wish to paste from the given list";
    $acpflag = "true";
} else {
    $msg = "To copy-and-paste using XWindow, highlight the text you wish to copy-and-paste using yout cursor. Use keyboard shortcuts Ctrl+C to copy and Ctrl+V to paste.";
    $acpflag = "false";
}
?>

<html>
<head>
    <title>AutoComPaste/XWindow Experiment</title>
</head>
<body>
<div>
    <p>
        How to use <?php echo $interface; ?>
    </p>
    <p>
       <?php echo $msg; ?>
    </p>
    <form action="interface1.php?user=<?php echo $user; ?>&acp=<?php echo $acpflag; ?>&data=<?php echo $data; ?>&jslist=<?php echo $jslist; ?>&tasklist=<?php echo $tasklist; ?>" method="post">

        <input id="submit" type="submit" value="start">
    </form>
</div>


</body>
</html>
