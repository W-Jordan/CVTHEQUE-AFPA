<?php
      $json = file_get_contents("./cvtheque.json");
      $jsonDecode = json_decode($json);

    // Recupere le nom de la CVTHEQUE
    echo $jsonDecode->nom;
    
    // Boucle sur les CV
    foreach($jsonDecode->lesCV as $cv){
        // Premiere lettre prenom
        echo "laCLasse". strtolower(substr($cv->prenom,0,1));

        echo $cv->nom."\n";
        echo $cv->prenom."\n";
        echo $cv->job."\n";
        echo $cv->description."\n";
        // echo $cv->city."\n";
        echo $cv->mail."\n";
        echo $cv->telephone."\n\n";
    }