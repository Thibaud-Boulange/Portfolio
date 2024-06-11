<!-- Vue permettant de consulter son dashboard comportant les missions, prestataire assigné, composante et consulter son bon de livraison -->

<div class='dashboard__table'>
    <table>
        <thead>
            <tr>
                <?php foreach ($header as $title): ?>
                    <th><?= $title ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dashboard as $row): ?>
                <tr>
                    <?php foreach ($row as $cle => $value): ?>
                        
                        <?php if ($cle == 'prenom'): ?>
                            <td><?= $row['prenom'] . ' ' . $row['nom'] ?></td>
                        <?php elseif (!in_array($cle, ['nom', 'id_bdl', 'id_mission', 'id_prestataire'])): ?>
                            <td><?= $value ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td style="display: flex; justify-content: space-around;">
                        <div style="text-align: center;">
                            <a href="<?= $bdlLink ?><?php if(isset($row['id_prestataire'])): echo '&id-prestataire=' . $row['id_prestataire']; endif;  ?>&id=<?= $row['id_mission'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <p>Consulter</p>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
