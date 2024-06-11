<!-- Formulaire permettant d'ajouter un bon de livraison -->
 <?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">
    <div class="add-container">
        <div class="form-abs">
            <h1 class="textgen">Ajout d'un Bon de livraison</h1>
            <form action="?controller=<?= $_GET['controller'] ?>&action=ajout_bdl" id="ajoutbdl" method="post">
                <h2>Informations</h2>
                <div class="form-names">
                    <!--<input type="text" placeholder="Mission" name="mission" id='mail-1' class="input-case">-->
                    <select name="mission" id='mail-1' class="input-case">
                        <option value=""> Mission </option>
                        
                        <?php foreach ($composantes as $cle => $value):?>
                            
                            <option value= "<?= e($value['nom_mission'])?>" > <?= $value['nom_mission']; ?> </option>
                        <?php endforeach; ?>
                </select>
                    <input type="month" placeholder="Mois" name="mois" class="input-case">
                </div>
                <!--<input type="text" placeholder="Composante" name="composante" id='mail-1' class="input-case">-->
                <select name="composante" id='mail-1' class="input-case">
                        <option value=""> Composante </option>
                        
                        <?php foreach ($composantes as $cle => $value):?>
                            
                            <option value= "<?= e($value['nom_composante'])?>" > <?= $value['nom_composante']; ?> </option>
                        <?php endforeach; ?>
                </select>
                <div class="buttons" id="create">
                    <button type="submit">Créer</button>
                </div>
            </form>
        </div>
    </div>
    <script>

document.addEventListener("DOMContentLoaded", function() {
    let form = document.getElementById("ajoutbdl"); 



    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du formulaire
        alert("Ajout réussi !"); 
        form.removeEventListener('submit', arguments.callee); // Supprime le gestionnaire d'événement
        form.submit(); // Soumet le formulaire
    });
});



</script>
<?php
require 'view_end.php';
?>
</div>