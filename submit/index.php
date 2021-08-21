<?php
    error_reporting(0);
    date_default_timezone_set('UTC');
    $outfile = $_SERVER['DOCUMENT_ROOT'] . '/../../incoming/comments.txt';

    if (file_exists($outfile) && filesize($outfile) > 10000) {
        header("Location: /sorry");
    }

    file_put_contents($outfile,
        $_POST["comment"]
        . "\n\n"
        . date(DATE_ATOM) . "   " . $_SERVER["REMOTE_ADDR"]
        . "\n---------------------------------------------\n",
        FILE_APPEND);
    header("Location: /thankyou");
?>