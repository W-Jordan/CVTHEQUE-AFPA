<?php

// Les informations du formulaire
$indexCV = ($_POST['listeCV']-1);
$nom = $_POST['name'];
$prenom = $_POST['surname'];
$metier = $_POST['job'];
$description = $_POST['description'];
// $city = $_POST['city'];
$mail = $_POST['mail'];
$telephone = $_POST['phone'];

// Si le file est vide ne rien faire
// Sinon le deplacer

// On déplace le fichier selectionner vers le repertoire voulu
if(move_uploaded_file($_FILES['cvPDF']['tmp_name'], "./CVPDF/cv-".$nom."-".$prenom.".pdf")){
    echo 'Upload effectué avec succès !';
}else{
    echo "Echec du téléchargement !";
    header("refresh:3;formCVstagiaire.php");
}

// Recupere le fichier JSON CVTHEQUE
$json = file_get_contents("./cvtheque.json");
// on le decode le json
$json = json_decode($json);

$array = (array)$json->lesCV;

// On modifie les informations du CV
$array[$indexCV]=['nom'=>$nom,'prenom'=>$prenom,'metier'=>$metier,'description'=>$description,"mail"=>$mail,"telephone"=>$telephone];

// On modifie le JSON
$json->lesCV = $array;
// var_dump($json);
file_put_contents('./cvtheque.json',json_encode($json));

// On rebascule sur le formulaire
header("location:./formCVstagiaire.php?mode=modifier");
