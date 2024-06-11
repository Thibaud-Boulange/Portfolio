<header>
        <nav class="header-navbar">
            <div class="logo">Perform Vision</div>
            <div class="burger-menu" id="burger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <?php if (isset($menu)): ?>
                <ul class="menu-list" id="menu-list">
                    <?php foreach ($menu as $m): ?>
                        <li><a href="<?= $m['link'] ?>"><?= $m['name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <ul>
                <li>
                    <a class='right-elt' href="?controller=<?= $_GET['controller'] ?>&action=infos" id="username"><i class="fa fa-user-circle" aria-hidden="true"></i><?php if (isset($_SESSION)): echo '&nbsp;' . $_SESSION['nom']; endif; ?>
                    <br> <?php if (isset($_SESSION)): echo '&nbsp;' . $_SESSION['prenom']; endif; ?></a>
                </li>
                <li><a href="?controller=login" class='right-elt'><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
            </ul>
        </nav>
    </header>
    <script src="Content\js\menu.js"></script>