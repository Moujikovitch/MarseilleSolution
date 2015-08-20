<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon panel administrateur</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   <script src="ckeditor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
include '../db2.php';

$error = "";

if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder") {
  
$req = $mabase->prepare("INSERT INTO medias(id, photo, titre, texte, dates) VALUES(:id, :photo, :titre, :texte, :dates)");
        $req->execute(array(
          "id" => "",
          "photo" => $_POST['photo'],
          "titre" => $_POST['titre'],
          "texte" => $_POST['texte'],
          "dates" => $_POST['dates'],
                    ));

        header('Location: media.php');
        exit();
    }
?>
<body>

</body>

</html>
