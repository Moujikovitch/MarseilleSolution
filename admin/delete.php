<?php include("menuadminheader.php"); ?>

<?php
include '../db2.php';

$error = "";

if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder") {

$req = $mabase->prepare("INSERT INTO events(id, photo, titre, texte, dates) VALUES(:id, :photo, :titre, :texte, :dates)");
        $req->execute(array(
          "id" => "",
          "photo" => $_POST['photo'],
          "titre" => $_POST['titre'],
          "texte" => $_POST['texte'],
          "dates" => $_POST['dates'],
                    ));

        header('Location: create.php');
        exit();
    }
?>
<body>

</body>

</html>
