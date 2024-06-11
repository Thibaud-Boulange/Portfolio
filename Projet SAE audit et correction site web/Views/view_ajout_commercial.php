<!-- Formulaire permettant d'ajouter un nouveau commercial  -->

<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">
    <div class="add-container">
        <div class="form-abs">
        <div class="center">
            <h1 class="resptitre">Ajout Commercial</h1>
            <form
                action="?controller=<?= $_GET['controller'] ?>&action=<?php if(isset($_GET['id'])): echo 'ajout_commercial_dans_composante&id-composante=' . $_GET['id']; else: echo 'ajout_commercial'; endif;?>"
                id="ajoutcommercial" method="post">
                
                <h2 class="textgen">Informations personnelles</h2>
                <div class="form-names" >
                    <!-- <input type="text" placeholder="Prénom" name="prenom" class="input-case">
                    <input type="text" placeholder="Nom" name="nom" class="input-case"> -->
                    <select name="name" class="composantecase">
                        <?php foreach($liste as $infos): ?>
                        <option value="<?= $infos['name']?>"><?= $infos['name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <!-- <input type="email" placeholder="Adresse email" name='email-commercial' id='mail-1' class="input-case"> -->
                <select placeholder="Adresse email" name="email-commercial" class="composantecase">
                    <?php foreach($liste as $infos): ?>
                    <option value="<?= $infos['email']?>"><?= $infos['email']?></option>
                    <?php endforeach ?>
                </select>
                </div>
                <div class="buttons" id="create">
                    <button type="submit">Créer</button>
                </div>
            </form>
        </div>
    </div>
    <script>

document.addEventListener("DOMContentLoaded", function() {
    let form = document.getElementById("ajoutcommercial"); 



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