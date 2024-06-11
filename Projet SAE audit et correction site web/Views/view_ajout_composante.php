<!-- Formulaire permettant d'ajouter une nouvelle composante  -->
<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">
    <div class="add-container">
        <div class="form-abs">
            <h1 class="resptitre">Ajout Composante</h1>
            <form action="?controller=<?= $_GET['controller'] ?>&action=ajout_composante" id="ajoutcomposante" method="post">
                <h2 class="textgen">Informations interlocuteur</h2>
                <div class="form-names">
                    <input type="text" placeholder="Prénom" name="prenom-interlocuteur" class="input-case">
                    <input type="text" placeholder="Nom" name="nom-interlocuteur" class="input-case">
                </div>
                <input type="email" placeholder="Adresse email" name='email-interlocuteur'
                       class="input-case">
                <h2 class="textgen">Informations commercial</h2>
                <div class="form-names">
                    <!-- <input type="text" placeholder="Prénom" name="prenom-name" class="input-case">
                    <input type="text" placeholder="Nom" name="nom" class="input-case"> -->
                    <select name="email-commercial" class="composantecase"require>
                        <?php foreach($ls_commerciaux as $personne): ?>
                        <option value="<?= $personne['email']?>"><?= $personne['nom'].' '.$personne['prenom'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <!-- <input type="email" placeholder="Adresse email" name='email-commercial' class="input-case"> -->

                <h2 class="textgen">Informations composante</h2>
                <div class="form-infos-composante2">
                    <input type="text" placeholder="Nom composante" name='composante'  class="input-case">
                    <select name="client" required>
                        <option value=""> Société </option>
                        
                        <?php foreach ($clients as $cle => $value):?>
                            
                            <option value= "<?= $value['nom_client'] ?>" > <?= $value['nom_client']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-infos-composante2">
                    <select name="type-bdl">
                        <option selected>Type de bon de livraison </option>
                        <option value="journee">Journée </option>
                        <option value="demi-journee">Demi-journée </option>
                        <option value="heure">Heure </option>
                    </select>
                    <input type="text" placeholder="Nom mission" name='mission' class="input-case">
                    <input type="date" placeholder="Date de début" name="date-mission" class="input-case">

                </div>

                <h4 class="textgen">Adresse</h4>
                <div class="form-address2">
                    <input type="number" placeholder="Numéro de voie" name="numero-voie"
                           class="input-case form-num-voie">
                    <select name="type-voie" required>
                        <option value=""> Type de voie </option>
                        
                        <?php foreach ($typeVoie as $cle => $value):?>
                            
                            <option value= "<?= $value['libelle'] ?>" > <?= $value['libelle']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    </div> <div class="form-address2">
                    <input type="text" placeholder="Nom de voie" name="nom-voie" class="input-case form-nom-voie">
                </div>
                <div class="form-address2">
                    <select name="cp" required>
                        <option value=""> Code postal </option>
                        
                        <?php foreach ($cp as $cle => $value):?>
                            
                            <option value= "<?= $value['cp'] ?>" > <?= $value['cp']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" placeholder="Ville" name="ville" class="input-case form-ville">
                </div>
                <div class="buttons" id="create">
                    <button type="submit">Créer</button>
                </div>
            </form>
        </div>
    </div>
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            let form = document.getElementById("ajoutcomposante"); 



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