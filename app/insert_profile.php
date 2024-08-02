<?php
session_start();


include 'includes/_database.php';
include 'includes/_config.php';
include 'includes/_functions.php';
include 'includes/_templates.php';


/*Update Bio person*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = $_FILES['photo']['name'];
    $bio = $_POST['bio'];
    $locate = $_POST['locate'];
    $create_date = date("Y-m-d H:i:s");
    $id_role = 0;

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    $sql = "UPDATE `person` SET `photo`='IMG',`bio`='ma bio',`locate`='Caen',`create_date`=NOW(),`id_role`=0
    WHERE id_person = 13";

    if ($dbCo->query($sql) === TRUE) {
        echo "Nouveau profil créé avec succès";
    } else {
        echo 'erreur';
    }
}
