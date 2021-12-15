<?php

namespace Kanboard\Plugin\PAM;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->hook->on('template:layout:js', array('template' => 'plugins/PAM/Assets/js/pam.js'));

        $this->template->setTemplateOverride('activity/user', 'PAM:activity/user');
        $this->template->setTemplateOverride('activity/task', 'PAM:activity/task');
        $this->template->setTemplateOverride('activity/project', 'PAM:activity/project');
        $this->template->setTemplateOverride('project_overview/activity', 'PAM:activity/projectoverview');
    }

    public function getClasses()
    {
        return [
            'Plugin\PAM\Model' => [
                'ProjectActivityModificationModel',
            ]
        ];
    }

    public function getPluginName()
    {
        return "Project activity modifier";
    }

    public function getPluginAuthor()
    {
        return 'Tomas Dittmann';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginDescription()
    {
        return 'Add a button in activity streams to hide/show or delete sensitive information';
    }

    public function getPluginHomepage()
    {
        return "https://github.com/Chaosmeister/PAM";
    }
}
