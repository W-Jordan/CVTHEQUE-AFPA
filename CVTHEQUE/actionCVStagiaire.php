<?php

// Les informations du formulaire
$nom = $_POST['name'];
$prenom = $_POST['surname'];
$metier = $_POST['job'];
$description = $_POST['description'];
// $city = $_POST['city'];
$mail = $_POST['mail'];
$telephone = $_POST['phone'];

// On déplace le fichier selectionner vers le repertoire voulu
if(move_uploaded_file($_FILES['cvPDF']['tmp_name'], "./CVPDF/cv-".$nom."-".$prenom.".pdf")){
    echo 'Upload effectué avec succès !';
}else{
    echo "Echec du téléchargement !";
    header("refresh:3;formCVstagiaire.php");
}

// Recupere le fichier JSON CVTHEQUE
$json = file_get_contents("./cvtheque.json");
// on encode le json
$json = json_decode($json);
// On ajoute les nouvelles info de CV
// array_push($json->lesCV, ['nom'=>$nom,'prenom'=>$prenom,'nom'=>$job,'prenom'=>$description,'nom'=>$city,"mail"=>$mail,"telephone"=>$telephone]);
array_push($json->lesCV, ['nom'=>$nom,'prenom'=>$prenom,'metier'=>$metier,'description'=>$description,"mail"=>$mail,"telephone"=>$telephone]);

// On modifie le JSON
file_put_contents('./cvtheque.json',json_encode($json));

// On rebascule sur le formulaire
header("location:./formCVstagiaire.php");