<!-- Vue permettant de voir les informations d'une composante -->
 <?php
require 'view_begin.php';
require 'view_header.php';

?> 

<div class="wrapper">
    <div class="composante-container">
        <form action="?controller=<?= $_GET['controller'] ?>&action=maj_infos_composante&id=<?= $_GET['id'] ?>"
              id="modifcompo" method="post">
            <div class="infos-composante">
                <h2 class="textgen">Informations composante</h2>
                <div class="form-infos-composante">
                    <input type="text" value="<?= $infos['nom_composante'] ?>" placeholder="Nom composante" name='composante' id='cpt'
                           class="input-case">
                    <input type="text" value="<?= $infos['nom_client'] ?>" placeholder="Nom client" id='sté' name='client'
                           class="input-case">
                </div>
                <h4 class="textgen">Adresse</h4>
                <div class="form-names2">
                    <input type="number" value="<?= $infos['numero'] ?>" placeholder="Numéro" name="numero-voie"
                           class="input-case form-num-voie">
                    <input type="text" value="<?= $infos['libelle'] ?>" placeholder="Libellé" name="type-voie"
                           class="input-case form-type-voie">
                           </div><div class="form-address">
                    <input type="text" value="<?= $infos['nom_voie'] ?>" placeholder="Nom voie" name="nom-voie"
                           class="input-case form-nom-voie">
                </div>
                <div class="form-address">
                    <input type="number" value="<?= $infos['cp'] ?>" placeholder="Code postal" name="cp" class="input-case form-cp">
                    <input type="text" value="<?= $infos['ville'] ?>" placeholder="Ville" name="ville" class="input-case form-ville">
                </div>
                <div class="buttons" id="create">
                    <button type="submit">Enregistrer</button>
                </div>
            </div>
        </form>

        <div class="infos-container">
            <div class="infos__colonne bordered ">
                <h2 class="textgentabl">Interlocuteurs</h2>
                <a href="?controller=<?= $_GET['controller'] ?>&action=ajout_interlocuteur_form&id=<?= $_GET['id'] ?>" class="ajout"><i
                        class="fa fa-solid fa-user-plus"></i> &nbsp; Ajouter</a>
                <?php foreach ($interlocuteurs as $i): ?>
                    <a href="?controller=<?= $_SESSION['role'] ?>&action=infos_personne&id=<?= $i['id_personne'] ?>"
                        >
                        <h3 class="tableauxinterne"><?= $i['nom'] . ' ' . $i['prenom'] ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="infos__colonne bordered ">
                <h2 class="textgentabl">| Commerciaux</h2>
                <?php if (!str_contains($_GET['controller'], 'commercial')): ?>
                    <a href="<?= $cardLink ?>&action=ajout_commercial_form&id=<?= $_GET['id'] ?>" class="ajout"><i
                            class="fa fa-solid fa-user-plus"></i> &nbsp; Ajouter</a>
                <?php else: ?>
                    <a class="ajout"> &nbsp;</a>
                <?php endif; ?>
                <?php foreach ($commerciaux as $c): ?>
                    <a href="?controller=<?= $_GET['controller'] ?>&action=infos_personne&id=<?= $c['id'] ?>">
                    <h3 class="tableauxinterne"><?= $c['nom'] . ' ' . $c['prenom'] ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="infos__colonne bordered ">
                <h2 class="textgentabl">| Prestataires</h2>
                <?php if (!str_contains($_GET['controller'], 'commercial')): ?>

                    <a href="?controller=<?= $_GET['controller'] ?>&action=ajout_prestataire_form&id=<?= $_GET['id'] ?>" class="ajout"><i
                            class="fa fa-solid fa-user-plus"></i> &nbsp; Ajouter</a>
                <?php else: ?>
                    <a class="ajout"> &nbsp;</a>
                <?php endif; ?>
                <?php foreach ($prestataires as $p): ?>
                    <a href="?controller=<?= $_GET['controller'] ?>&action=infos_personne&id=<?= $p['id_personne'] ?>"  >
                        <h3 class="tableauxinterne"><?= $p['nom'] . ' ' . $p['prenom'] ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="infos__colonne bordered ">
                <h2 class="textgentabl">| Bons de livraison</h2>
                <a class="ajout"> &nbsp;</a>
                <?php foreach ($bdl as $b): ?>
                    <a href="?controller=<?= $_GET['controller'] ?>&action=consulter_bdl&id=<?= $b['id_bdl'] ?>"  >
                        <h3 class="tableauxinterne"><?= $b['nom'] . ' ' . $b['prenom'] ?></h3>
                        <p><?= $b['mois'] ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script>

document.addEventListener("DOMContentLoaded", function() {
    let form = document.getElementById("modifcompo"); 



    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du formulaire
        alert("Modifications prises en compte !"); 
        form.removeEventListener('submit', arguments.callee); // Supprime le gestionnaire d'événement
        form.submit(); // Soumet le formulaire
    });
});



</script>
<?php
require 'view_end.php';
?>
</div>