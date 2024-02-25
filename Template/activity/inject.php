<?php
$sub_str = '</small>';
$icon = 'eye-slash';

foreach ($events as $index => &$event) {
    if ($this->helper->projectRole->canRemoveTask($event['task'])) {
        if (isset($event['hidden'])) {
            $icon = 'eye';
        } else {
            $icon = 'eye-slash';
        }

        $insert_str = '<div class="pull-right">';

        $insert_str .= '<a class="btn PAM_toggleVisibility" data-event_id="' . $event['id'] . '" data-task_id="' . $event['task_id'] . '"><i class="fa fa-fw fa-' . $icon . '" style="pointer-events: none;"></i></a>';

        $insert_str .= $this->helper->modal->mediumButton(
            'trash',
            '',
            'ProjectActivityModificationController',
            'confirm',
            array(
                'plugin' => 'PAM',
                'event_id' => $event['id'],
                'task_id' => $event['task_id'],
            ),
        );

        $insert_str .= '</div>';

        $event['event_content'] = str_replace($sub_str, $sub_str . $insert_str, $event['event_content']);
    }
    else {
        if (isset($event['hidden'])) {
            unset($events[$index]);
        }
    }
}
