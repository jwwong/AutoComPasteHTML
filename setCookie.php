<?php
// IMPLEMENT STRING COMP HERE

/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 8:10 PM
 * To change this template use File | Settings | File Templates.
 */

if (!empty($_POST)) {
    $value = $_POST["data"];
    $interface = $_POST["interface"];
    //setcookie($interface, $data, time()+(3600*3));
    //echo "hello";
} else {
    header("Location: index.php");
    /* Make sure that code below does not get executed when we redirect. */
    exit;
}
$File = $interface.".txt";

header("Content-Disposition: attachment; filename=\"" . basename($File) . "\"");
header("Content-Type: application/force-download");
header("Connection: close");

$realdata = "";

if (strcmp("acp", $interface)==0) {
    $data = json_decode($value, true);

    foreach ($data["data"] as $k => $v) {
        $text = "";
        $val = $v["data"];
        $stimuli = "";
        $compare_result = 2;
        foreach ($val as $x=> $y) {
            if (is_array($y)) {
                foreach ($y as $w) {
                    $text = $text.$w."; ";
                }
            } else {
                $y = trim($y);
                $word = str_replace("\n", "", str_replace("\r", "", $y));
                if (strcmp("stimuli", $x) == 0) {
                     $stimuli = $word;
                }
                if (strcmp("user_response", $x) == 0) {
                    if (strcmp($word, $stimuli) == 0) {
                        $compare_result = 1;
                    } else {
                        $compare_result = 0;
                    }
                }
                $text = $text.$word."; ";
            }
        }
        $realdata = $realdata.$text;
        $realdata = $realdata.strval($compare_result).";\n";
    }

} elseif (strcmp("xwindow", $interface)==0){
    $data = json_decode($value, true);
    $text = "";
    $stimuli = "";
    $compare_result = 2;
    foreach ($data["data"] as $k => $v) {
        $text = "";
        $val = $v["data"];
        foreach ($val as $x=> $y) {
            if (is_array($y)) {
                foreach ($y as $w) {
                    $text = $text.$w."; ";
                }
            } else {
                $y = trim($y);
                $word = str_replace("\n", "", str_replace("\r", "", $y));
                if (strcmp("stimuli", $x) == 0) {
                     $stimuli = $word;
                }
                if (strcmp("user_response", $x) == 0) {
                    if (strcmp($word, $stimuli) == 0) {
                        $compare_result = 1;
                    } else {
                        $compare_result = 0;
                    }
                }
                $text = $text.$word."; ";
            }
        }
        $realdata = $realdata.$text;
        $realdata = $realdata.strval($compare_result).";\n";
    }
}
echo $realdata;

$filename = "log/log.txt";
if(isset($_COOKIE["user"])) {
    $filename = "log/log_".$_COOKIE["user"].".txt";
}
file_put_contents($filename, $realdata, FILE_APPEND);