<!-- Vue permettant de voir les informations de son compte et de les changer si nécessaire -->
<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">   
     <div class="add-container">
        <div class="form-abs">
            <h1  class="textgen">Mon compte</h1>
            <form action="?controller=<?= $_GET['controller'] ?>&action=maj_infos" id="modifmdp" method="post">
                <h2 class="textgen">Informations personnelles</h2>
                <div class="form-names">
                    <input type="text" value="<?= e($_SESSION['prenom']) ?>" placeholder="prénom" name="prenom" class="input-case">
                    <input type="text" value="<?= e($_SESSION['nom']) ?>" placeholder="nom"  name="nom" class="input-case">
                </div>
                <input type="email" value="<?= e($_SESSION['email']) ?>" placeholder="email" name='email' id='mail-1' class="input-case">
                <h2 class="textgen">Mot de passe</h2>
                <input type="text" placeholder='Changer de mot de passe' name='mdp' id='sté' class="input-case" required>
                <div class="buttons" id="create">
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            let form = document.getElementById("modifmdp"); 



            form.addEventListener("submit", function(event) {
                event.preventDefault(); // Empêche le comportement par défaut du formulaire
                alert("Modification prise en compte !"); 
                form.removeEventListener('submit', arguments.callee); // Supprime le gestionnaire d'événement
                form.submit(); // Soumet le formulaire
            });
        });



</script>
<?php
require 'view_end.php';
?>

</div>
