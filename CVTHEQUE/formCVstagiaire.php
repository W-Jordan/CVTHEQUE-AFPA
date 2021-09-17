<?php
    if(isset($_GET["mode"]) && $_GET["mode"] == "modifier"){
        echo'<form action=modifCVStagiaire.php method="post" enctype="multipart/form-data">';
        $json = file_get_contents("./cvtheque.json");
        $json = json_decode($json);
        echo '<select name="listeCV" id="listeCV">
        <option value = "0">--- CHOIX ---</option>';
        for ($i=0; $i < count($json->lesCV); $i++) { 
            echo '<option value =' . ($i+1) . '>' . $json->lesCV[$i]->prenom . " " . $json->lesCV[$i]->nom . '</option>';
        }
        echo '</select>';
    }else{
        echo'<form action=actionCVStagiaire.php method="post" enctype="multipart/form-data">';
    }
?>
    <div>
        <label>Nom</label>
        <input type="text" id="name" name="name" pattern="^[a-zA-ZÀ-ÖØ-öø-ÿ'\- ]*$" required >
    </div>
    <div>
        <label>Prenom</label>
        <input type="text" id="surname" name="surname" pattern="^[a-zA-ZÀ-ÖØ-öø-ÿ'\- ]*$" required >
    </div>
    <div>
        <label>Adresse mail</label>
        <input type="text" id="mail" name="mail" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$" required >
    </div>
    <div>
        <label>Métier</label>
        <input type="text" id="job" name="job" pattern="^[a-zA-Z0-9À-ÖØ-öø-ÿ'\- ]*$" required >
    </div>
    <div>
        <label>Description</label>
        <input type="text" id="description" name="description" required >
    </div>
    <div>
        <label>Téléphone</label>
        <input type="tel" id="phone" name="phone" pattern="^(0|\+33)[\d]{9}$" required >
    </div>
    <div>
        <label>curriculum_vitae.PDF</label>
        <input type="file" id="cvPDF" name="cvPDF" accept="application/pdf" <?php (!isset($_GET["mode"]))?'required':'';?>>
    </div>

    <input type="submit" value="Ajouter" >
</form>

<!-- <script src="verifForm.js"></script> -->
<?php
    if(isset($_GET["mode"]) && $_GET["mode"] == "modifier"){
        echo '<script src="modifForm.js"></script>';
    }