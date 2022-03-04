<?php
include("logic/levelCode.php");

$config = loadConfig();

if (@$_POST["save"] == "true" && isset($_SESSION["level_data"])) {
    $success = true;
    $sendResult = "";
    if (@$_POST["name"] == "") {
        $success = false;
        $sendResult .= "<div class=\"alert alert-danger\">Please enter your name.</div>";
    }
    if (@$_POST["checkAgree"] != "on") {
        $success = false;
        $sendResult .= "<div class=\"alert alert-danger\">Please accept the conditions.</div>";
    }

    if ($success) {
        $subject = "Flowit level proposal";

        $text = "Email: " . $_POST["email"] . "\n \n" . getLevelCode($_POST["name"]);

        $Header = "MIME-Version: 1.0\n";
        $Header .= "Content-type: text/plain; charset=utf-8\n";
        $Header .= "From: ".$config->mail_from."\n";
        $Header .= "Reply-To: ".$_POST["name"]." <".$_POST["email"].">\n";

        $mailSuccess = mail($config->mail_to, $subject, $text, $Header);
        if ($mailSuccess) {
            $sendResult .= "<div class=\"alert alert-success\">Level was sent successfully. Thanks a lot!</div>";
            resetLevel();
        } else {
            $sendResult .= "<div class=\"alert alert-danger\">Internal error.</div>";
        }
    }
}
