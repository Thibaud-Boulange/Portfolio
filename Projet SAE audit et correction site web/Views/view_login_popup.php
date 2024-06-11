<!-- Vue qui s'affiche lorsqu'une personne a plusieurs rôle, elle peut choisir -->
<div class="background-blur">
    <div class="popup">
        <div class="container-popup">
            <div class="form-popup">
                <h1 class="popup-title">Il se trouve que vous ayez plusieurs rôles !</h1>
                    <div class="container-select-button">
                            <?php foreach ($data['response']['roles'] as $role) : ?>
                                <button type="submit" class="button-primary" onclick="window.location='?controller=login&action=role_choice&choice=<?= $role ?>'"><?= $role ?></button>
                            <?php endforeach; ?>
                    </div>
            </div>
        </div>
    </div>
</div>
