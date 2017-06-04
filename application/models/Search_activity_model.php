<?php

/**
 * Created by PhpStorm.
 * User: huge
 * Date: 2016/10/22
 * Time: 18:09
 */
class Search_activity_model extends CI_Model
{
    public function __construct()
    {
        $this->load->model(array('Activity_model','Second_label_model','Second_label_model'));
    }

    public function search_activity($first_label = -1, $second_label = -1)
    {
        $data = null;
        if ($second_label == -1 && $first_label == -1) {
            // 查询所有一级标签的活动的数量 search.html
            $data = $this->db->select("first_label.id,first_label.name,COUNT(*) AS num")
                ->from('activity')
                ->join('first_label','first_label.id = activity.first_label_id')
                ->group_by('first_label_id')
                ->get()
                ->result_array();
        } else {
            // 给定一级标签，查询每个二级标签下活动 search_deep.htm
            $data['first_label_name'] = $this->First_label_model->get_first_label_by_id($first_label)['name'];
            $all_second_label = $this->Second_label_model->get_second_label_by_first_label_id($first_label);
            foreach ($all_second_label as $second_label_info){
                $data['activity_in_second_label'][$second_label_info['id']]['name'] =
                    $this->Second_label_model->get_second_label_by_id($second_label_info['id'])['name'];
                $data['activity_in_second_label'][$second_label_info['id']]['activity'] =
                    $this->Activity_model->get_activity_by_second_label_id($second_label_info['id']);
            }
        }
        return $data;
    }
}