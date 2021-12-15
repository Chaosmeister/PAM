<?php

namespace Kanboard\Plugin\PAM\Controller;

use Kanboard\Controller\BaseController;

class ProjectActivityModificationController extends BaseController
{
    public function confirm()
    {
        $event_id = $this->request->getIntegerParam('event_id');

        $this->response->html($this->template->render(
            'PAM:confirm',
            array(
                'event_id' => $event_id,
            )
        ));
    }
    
    public function delete()
    {
        if ($this->userSession->isAdmin()) {
            $event_id = $this->request->getIntegerParam('event_id');
            $this->projectActivityModificationModel->delete($event_id);
        }

        $this->response->redirect('/');
    }

    public function toggleVisibility()
    {
        if ($this->userSession->isAdmin()) {
            $event_id = $this->request->getIntegerParam('event_id');
            
            $this->projectActivityModificationModel->toggleVisibility($event_id);
            $this->response->redirect('');
        }
    }
}
