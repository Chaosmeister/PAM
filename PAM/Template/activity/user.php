<div class="page-header">
    <h2><?= t('My activity stream') ?></h2>
</div>
<?php require "inject.php" ?>
<?= $this->render('event/events', array('events' => $events)) ?>