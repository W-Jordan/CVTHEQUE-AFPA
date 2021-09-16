<?php
// $mode = $_GET["mode"];
?>
<form action="actionCVStagiaire.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Nom</label>
        <input type="text" id="name" name="name" pattern="^[a-zA-ZÀ-ÖØ-öø-ÿ'-]*$" required >
    </div>
    <div>
        <label>Prenom</label>
        <input type="text" id="surname" name="surname" pattern="^[a-zA-ZÀ-ÖØ-öø-ÿ'-]*$" required >
    </div>
    <div>
        <label>Adresse mail</label>
        <input type="text" id="mail" name="mail" pattern="^[a-zA-Z][\w.-]+@[\w.-]+.[a-zA-Z]{2,3}$" required >
    </div>
    <div>
        <label>Métier</label>
        <input type="text" id="job" name="job" pattern="^[a-zA-Z0-9À-ÖØ-öø-ÿ'- ]*$" required >
    </div>
    <div>
        <label>Description</label>
        <input type="text" id="description" name="description" required >
    </div>
    <!-- <div>
        <label>Ville</label>
        <input type="text" id="city" name="city" pattern="^[a-zA-ZÀ-ÖØ-öø-ÿ'-]$" required >
    </div> -->
    <div>
        <label>Téléphone</label>
        <input type="tel" id="phone" name="phone" pattern="^(0|+33)[\d]{9}$" required >
    </div>
    <div>
        <label>curriculum_vitae.PDF</label>
        <input type="file" id="cvPDF" name="cvPDF" accept="application/pdf" required >
    </div>

    <input type="submit" value="Ajouter" >
</form>

<script src="test.js"></script>
