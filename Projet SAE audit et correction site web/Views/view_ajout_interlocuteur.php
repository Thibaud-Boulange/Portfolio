<!-- Formulaire permettant l'ajout de nouvel interlocuteur -->

<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">
    <div class="add-container">
        <div class="form-abs">
            <h1 class="resptitre">Ajout Interlocuteur Client</h1>
            <form id="ajoutinterlocuteur" action="?controller=<?= $_GET['controller'] ?>&action=ajout_interlocuteur_dans_composante<?php
            if (isset($_GET['id'])): echo '&id-composante=' . $_GET['id']; endif;
            if (isset($_GET['id-client'])): echo '&id-client=' . $_GET['id-client']; endif;
            ?>" method="post">
                <h2 class="textgen">Informations personnelles</h2>
                <div class="form-names">
                    <input type="text" placeholder="Prénom" name="prenom-interlocuteur" class="input-case" required>
                    <input type="text" placeholder="Nom" name="nom-interlocuteur" class="input-case" required>
                </div>
                <input type="email" placeholder="Adresse email" name='email-interlocuteur' id='mail-1' class="input-case" required>
                <div id="emailError" class="error-message"></div>    
                <?php 
                // Condition vérifiant si l'identifiant de la composante n'est pas défini dans l'URL
                if (!isset($_GET['id'])): ?>
                    <h2 class="textgen">Informations professionnelles</h2>
                    <div class="center">
                    <select name="composante" class="composantecase" required>
                        <option value=""> Composante </option>
                        
                        <?php foreach ($composante as $cle => $value):?>
                            
                            <option value= "<?= $value['nom_composante'] ?>" > <?= $value['nom_composante']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                <?php endif; ?>
                <div class="buttons" id="create">
                    <button type="submit">Créer</button>
                </div>
            </form>
        </div>
    </div>
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            let form = document.getElementById("ajoutinterlocuteur"); 



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