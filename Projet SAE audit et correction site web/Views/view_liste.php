<!-- Vue permettant de faire la liste d'un type de personne -->
<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">
    <div class='liste-prestataire-contrainer'>
        <h1 class="nomcategorie"><?= e($title) ?> </h1>
        <div class="element-recherche">
            <input type="text" id="recherche" name="recherche" placeholder="Rechercher un <?= e($title) ?>..." onkeyup="filterItems()">
            <?php 
            if (((str_contains($_GET['controller'], 'gestionnaire') || str_contains($_GET['controller'], 'administrateur')) && !isset($_GET['id']))
                || ((str_contains($_GET['controller'], 'prestataire') && isset($person[0]['id_bdl'])))): ?>
                <button type="submit" class="button-primary"
                        onclick="window.location='<?= e($buttonLink, ENT_QUOTES) ?>'">Ajouter
                </button>
            <?php endif; ?>
        </div>

        <div class="infos-container2">
            <table class="infos__colonne bordered">
                <thead>
                    <tr>
                        <th class="textgentitle">Nom</th>
                        <th class="textgentitle">Lien</th>
                    </tr>
                </thead>
                <tbody id="itemList">
                    <?php foreach ($person as $p): ?>
                        <tr>
                            <td>
                                <h2 class="item-title"><?php
                                    if (array_key_exists('id_bdl', $p)): echo e($p['nom_mission']); endif;
                                    if (array_key_exists('nom', $p)): echo e($p['nom']) . ' ' . e($p['prenom']); endif;
                                    if (array_key_exists('nom_client', $p) and array_key_exists('telephone_client', $p)): echo e($p['nom_client']); endif;
                                    if (array_key_exists('nom_composante', $p) and array_key_exists('nom_client', $p)): echo e($p['nom_composante']); endif;
                                    ?></h2>
                                <h3 class="item-details"><?php
                                    if (array_key_exists('id_bdl', $p)): echo e($p['mois']); endif;
                                    if (array_key_exists('interne', $p)): if ($p['interne']): echo 'Interne';
                                    else: echo 'Indépendant'; endif; endif;
                                    if (array_key_exists('nom_client', $p) and !array_key_exists('telephone_client', $p)): echo e($p['nom_client']); endif;
                                    if (array_key_exists('nom_composante', $p) and !array_key_exists('nom_client', $p)): echo e($p['nom_composante']); endif;
                                    if (array_key_exists('telephone_client', $p)): echo $p['telephone_client']; endif;
                                    ?></h3>
                            </td>
                            <td>
                                <a href='<?= e($cardLink) ?>&id=<?php if (isset($p['id_bdl'])): echo e($p['id_bdl']); elseif(isset($p['id_personne'])) : echo e($p['id_personne']); else: echo e($p['id']); endif; ?>' class="">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function filterItems() {
    var input = document.getElementById('recherche');
    var filter = input.value.toUpperCase();
    var list = document.getElementById("itemList");
    var rows = list.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var titles = rows[i].getElementsByClassName("item-title")[0];
        var details = rows[i].getElementsByClassName("item-details")[0];
        var titleText = titles.textContent || titles.innerText;
        var detailsText = details.textContent || details.innerText;

        if (titleText.toUpperCase().indexOf(filter) > -1 || detailsText.toUpperCase().indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}
</script>

<?php
require 'view_end.php';
?>


</div>