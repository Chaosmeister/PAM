<details class="accordion-section"  <?= empty($events) ? '' : 'open' ?>>
    <summary class="accordion-title"><?= t('Last activity') ?></summary>
    <div class="accordion-content">
        <?php require "Inject.php" ?>
        <?= $this->render('event/events', array('events' => $events)) ?>
    </div>
</details>