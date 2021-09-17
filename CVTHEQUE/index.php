<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/ce4feb7268.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="col"> 
    <header class="row">
        <nav class="bg1 flex ">
            <ul class="center padd0 flex col-basic">
            <li class="link-nav">
                    <a href="#">Item</a>
                </li>

                <li class="link-nav">
                    <a href="#">Item</a>
                </li>

                <li class="link-nav">
                    <a href="#">Item</a>
                </li>

                <li class="link-nav">
                    <a href="#">Item</a>
                </li>

                <li class="link-nav">
                    <a href="#">Item</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="titre mt-3 mb-2 center dblock">
        <h1 class="dblock">Cvthèque</h1>
    </div>

    <div class="col col-basic">
        <div class="card  bord2 my-auto">
            <?php
            $json = file_get_contents("./cvtheque.json");
            $jsonDecode = json_decode($json);
             foreach($jsonDecode->lesCV as $cv){ ?>
                <div class="row alcenter">
                    <div class="ml-1 ico bg1 txt-white noflex radius100"><?=strtolower(substr($cv->prenom,0,1))?></div>
                    <div class="cv-item col flex4">
                        <h4 class="marg0"><?= $cv->nom.' '.$cv->prenom ?></h4>
                        <div class="sous-titre mb-1"><?=  $cv->metier ?></div>
                        <div class="description mb-1"><?=  $cv->description ?></div>
                        <div class="locali"><a href="#" style="color:#333"><i class="fas fa-map-marker-alt"></i> Dunkerque</a></div>
                    </div>
                    <div class="btn3 col flex1">
                        <a href="tel:<?=$cv->telephone?>" target="_blank"><div class="btn1 radius1 btn-tel pd-1 bg1 center"><i class="fas fa-phone-alt"></i></div></a>
                        <a href="mailto:<?=$cv->mail?>" target="_blank"><div class="btn1 btn-mail  pd-1 bg1 center"><i class="fas fa-envelope"></i></div></a>
                        <a href="#" target="_blank"><div class="btn1 btn-pdf pd-1 bg1 center radius2"><i class="fas fa-file-pdf"></i></div></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


</body>
</html>