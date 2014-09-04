<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 1:02 PM
 * To change this template use File | Settings | File Templates.
 */

// Process your information here

if (!empty($_POST)) {
    $user = $_POST['user'];
    //echo "hello";
} else {
    header("Location: index.php");
    /* Make sure that code below does not get executed when we redirect. */
    exit;
}

// save $user as cookie as a carry on data for the next pages
setcookie("user", $user, time()+(3600*3)); // time of expiration is 3 hours

?>
<html>
<head>
    <title>AutoComPaste/XWindow Experiment</title>
</head>
<body>
<div>
    <p>Pre-Questionnaire</p>
</div>
<div>
    <p> Hello Participant <?php echo $user; ?>, please fill in the following form:</p>
    <form action="page2.php" method="post">
        <span>Name</span><input type="text" name="var1" /><br/>
        <span>Age</span><input type="number" name="var2" /><br/>
        <span>Gender</span><br/>
        <input type="radio" name="var3" value="1">Male<br/>
        <input type="radio" name="var3" value="2">Female<br/>
        <span>Occupation</span><input type="text" name="var4" /><br/>
        <span>Frequency of computer usage</span><br/>
        <input type="radio" name="var5" value="1">None<br/>
        <input type="radio" name="var5" value="2">Weekly<br/>
        <input type="radio" name="var5" value="3">Every few days<br/>
        <input type="radio" name="var5" value="4">Daily<br/>
        <span>Frequency of text editor usage</span><br/>
        <input type="radio" name="var6" value="1">None<br/>
        <input type="radio" name="var6" value="2">Weekly<br/>
        <input type="radio" name="var6" value="3">Every few days<br/>
        <input type="radio" name="var6" value="2">Daily<br/>
        <input id="submit" type="submit" value="submit">
    </form>
</div>

</body>
</html>