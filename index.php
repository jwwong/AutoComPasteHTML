<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 11:32 AM
 * To change this template use File | Settings | File Templates.
 */

if (isset ($_COOKIE["interface"])) {
    unset($_COOKIE["interface"]);
    $res = setcookie("interface", '', time()-3600);
}

?>
<html>
<head>
    <title>AutoComPaste/XWindow Experiment</title>
</head>
<body>
    <div>
        <p>
            Welcome to the evaluation experiment for AutoComPaste/XWindow!
            In this experiment, you will be required to complete a series of copy-and-paste tasks using both interfaces AutoComPaste and XWindow.
            Each task will require you to:
            <ul>
                <li>copy-and-paste text in different levels of granularity - phrase, sentence, paragraph.</li>
                <li>copy-and-paste text with one or several reference windows in view</li>
            </ul> 
        </p>
        <p>
            First, please fill in your given participant ID:
        </p>
    </div>
    <div>
        <form action="page1.php" method="post">
            <span>Participant ID:</span><input type="text" name="user" />
            <input id="submit" type="submit" value="start">
        </form>
    </div>

</body>
</html>