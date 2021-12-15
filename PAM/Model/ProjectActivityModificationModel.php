<?php
namespace Kanboard\Plugin\PAM\Model;

use Kanboard\Model\ProjectActivityModel;

class ProjectActivityModificationModel extends ProjectActivityModel
{
    public function toggleVisibility($event_id)
    {
        $event = $this->db->table(self::TABLE)->eq('id', $event_id)->findOne();
        
        if ($event) {
            $data = json_decode($event['data'], true);
            if (isset($data['hidden']))
            {
                unset($data['hidden']);
            }
            else
            {
                $data['hidden'] = '1';
            }

            $this->db->table(self::TABLE)->eq('id', $event['id'])->update(array('data' => json_encode($data)));

            return true;
        }

        return false;
    }

    public function delete($event_id)
    {
        $event = $this->db->table(self::TABLE)->eq('id', $event_id)->findOne();
        
        if ($event) {
               
            $this->db->table(self::TABLE)->eq('id', $event['id'])->remove();
            
            return true;
        }

        return false;
    }
}