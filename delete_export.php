<?php
include_once "classes/EmailController.php";
$ec=new EmailController();
if(array_key_exists("checked",$_GET)) {
    if($_GET["btn"]=="0") {
        $ec->delete($_GET["checked"]);
    }
    else {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen('php://output', 'w');
        $emails=$ec->indexByIds($_GET["checked"]);
        fputcsv($output, array("Email","Date"));
        foreach ($emails as $email) {
            fputcsv($output, $email[0]);
        }
    }
}
else header("Location: email.php");