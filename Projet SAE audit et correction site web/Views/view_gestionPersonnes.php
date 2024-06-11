<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class="wrapper">

<table class="userTable" style="background-color: white">
    <thead>
        <tr class="userDescriptionHEAD">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Infos</th>
        </tr>
    </thead>
    <tbody id="userDescriptionBODY">
        <?php foreach ($personnes as $p) : ?>
            <tr>
                <td><?= $p["nom"] ?></td>
                <td><?= $p["prenom"] ?></td>
                <td><?= $p["email"] ?></td>
                <td>
                    <input type="image" class="image" alt="<?= $p["email"] ?>" src="Content/images/eye.png" />
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="popup" class="popup">
    <div class="popup-content">
        <span id="closePopup" class="close">&times;</span>
        <div id="popupMessage"></div>
    </div>
</div>

<?php
require 'view_end.php';
echo "end";
?>
</div>