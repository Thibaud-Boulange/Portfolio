<!-- Vue permettant au commercial de voir ses missions -->

 <?php
require 'view_begin.php';
require 'view_header.php';

?> 

<div class="wrapper">

<div class='main-contrainer'>
    <div class="dashboard-container">
        <h1 class="missionnom">Missions</h1>
        <?php require_once 'view_dashboard.php'; ?>
    </div>
</div>

<?php
require 'view_end.php';
?>
</div>