<!-- Formulaire permettant d'ajouter un nouveau prestataire  -->

<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">
    
    <div class="add-container">
        <div class="form-abs">
            <h1 class="textgen">Ajout Prestataire</h1>
            <form action="?controller=<?= $_GET['controller'] ?>&action=<?php if(isset($_GET['id'])): echo 'ajout_prestataire_dans_mission&id=' . $_GET['id']; else: echo 'ajout_prestataire'; endif;?>" id="ajoutprestataire" method="post">
                <h2 class="textgen">Informations personnelles</h2>
                <div class="form-names">

                    <?php if (!isset($_GET['id'])): ?>

                    <input type="text" placeholder="Prénom" name="prenom" class="input-case">
                    <input type="text" placeholder="Nom" name="nom" class="input-case">
                    </div>
                    <?php else: ?>
                    <select name="prenom" >
                        
                        <?php foreach ($liste as $cle => $value):?>
                            
                            <option value= "<?= $value['name']?>" > <?= $value['name']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <select name="email-prestataire" >
                        <option value=""> Email </option>
                        
                        <?php foreach ($liste as $cle => $value):?>
                            
                            <option value= "<?= e($value['email'])?>" > <?= $value['email']; ?> </option>
                        <?php endforeach; ?>
                </select>
                <?php endif; ?>
                
                <h2 class="textgen">Informations professionnelles</h2>
                <?php 
                // Condition vérifiant si l'identifiant du préstataire n'est pas défini dans l'URL
                if (!isset($_GET['id'])): ?>
                    <input type="text" placeholder="Société" name="client" id='sté' class="input-case">
                <?php else: ?>
                    <input type="text" value="<?= e($composante['nom_mission']); ?>" placeholder="Nom mission" name="mission" id='sté' class="input-case" readonly>
                <?php endif; ?>
                <div class="buttons" id="create">
                    <button type="submit"  >Créer</button>
                </div>
            </form>
        </div>
    </div>
    <script>

    document.addEventListener("DOMContentLoaded", function() {
        let form = document.getElementById("ajoutprestataire"); 



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