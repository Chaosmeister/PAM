<?php

namespace Kanboard\Plugin\PAM\Controller;

use Kanboard\Controller\BaseController;

class ProjectActivityModificationController extends BaseController
{
    public function confirm()
    {
        $event_id = $this->request->getIntegerParam('event_id');
        $task_id = $this->request->getIntegerParam('task_id');

        $this->response->html($this->template->render(
            'PAM:confirm',
            array(
                'event_id' => $event_id,
                'task_id' => $task_id,
            )
        ));
    }

    public function delete()
    {
        $task_id = $this->request->getIntegerParam('task_id');

        if ( $this->helper->projectRole->canRemoveTask( $this->getTask($task_id) ) ) {
            $event_id = $this->request->getIntegerParam('event_id');
            $this->projectActivityModificationModel->delete($event_id);
        }

        $this->response->redirect($this->helper->url->to('ActivityController', 'task', ['task_id' => $task_id]));
    }

    public function toggleVisibility()
    {
        $task_id = $this->request->getIntegerParam('task_id');

        if ( $this->helper->projectRole->canRemoveTask( $this->getTask($task_id) ) ) {
            $event_id = $this->request->getIntegerParam('event_id');

            $this->projectActivityModificationModel->toggleVisibility($event_id);
        }
    }
}
