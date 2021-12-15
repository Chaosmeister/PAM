<div class="page-header">
    <h2><?= t('Delete event') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Do you really want to delete this event?') ?>
    </p>

    <?= $this->modal->confirmButtons(
        'ProjectActivityModificationController',
        'delete',
        array(
            'event_id' => $event_id,
            'plugin' => 'PAM')
        ); ?>
</div>
