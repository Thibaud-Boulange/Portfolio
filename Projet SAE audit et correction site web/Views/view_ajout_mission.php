<!-- Forumulaire permettant de créer une nouvelle mission -->

<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">
    <div class="add-container">
        <div class="form-abs">
            <h1 class="textgen">Ajout Mission</h1>
            <form action="?controller=<?= $_GET['controller'] ?>&action=ajout_mission" method="post">
                <h2 class="textgen">Informations mission</h2>
                <input type="text" placeholder="Nom de la mission" name='mission' class="input-case">
                <input type="text" placeholder="Société" id='sté' name='client' class="input-case">
                <input type="text" placeholder="Composante" name='composante' id='cpt' class="input-case">
                <div class="form-names">
                    <select name="type-bdl" class="respsoluce">
                        <option selected>Type de bon de livraison </option>
                        <option value="journee">Journée </option>
                        <option value="demi-journee">Demi-journée </option>
                        <option value="heure">Heure </option>
                    </select>
                    <input type="date" placeholder="Date de début" name="date-mission" class="inputdate">
                </div>
                <div class="buttons" id="create">
                    <button type="submit">Créer</button>
                </div>
            </form>
        </div>
    </div>
<?php
require 'view_end.php';
?>
</div>