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
        $this->load->model('Activity_model');
    }

    public function search_activity($second_label_id, $city, $time, $order)
    {
        $order_name = array("","activity_start","");
        $query = array();
        $earlier_than = null;
        $activity = null;
        if ($second_label_id != 0)
            $query['first_label_id'] = $second_label_id;
        if ($city != 0)
            $query['city'] = $city;
        if ($time != 0) {
            if ($time == 1)
                $earlier_than = date('Y-m-d H:i:s', strtotime('+1 month'));
            else if ($time == 2)
                $earlier_than = date('Y-m-d H:i:s', strtotime('+2 month'));
            else if ($time == 3)
                $earlier_than = date('Y-m-d H:i:s', strtotime('+3 month'));
            $query['activity_start < '] = $earlier_than;
        }
        if (empty($query) && $order == 0)
            $activity = $this->Activity_model->get_activity();
        else {
            $query['isVerified'] = 1;
            if ($order != 0)
                $activity = $this->db
                    ->where($query)
                    ->order_by($order_name[$order - 1],"DESC")
                    ->get('activity')
                    ->result_array();
            else
                $activity = $this->Activity_model->get_activity_by_where_string($query);
        }

        return $activity;
    }
}