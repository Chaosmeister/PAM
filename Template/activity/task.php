<?= $this->render('task/details', array(
    'task' => $task,
    'tags' => $tags,
    'project' => $project,
    'editable' => false,
)) ?>

<div class="page-header">
    <h2><?= t('Activity stream') ?></h2>
</div>

<?php require "inject.php" ?>
<?= $this->render('event/events', array('events' => $events)) ?>
