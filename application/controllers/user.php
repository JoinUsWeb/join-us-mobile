<?php

/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 2016/10/17
 * Time: 21:04
 */
class User extends CI_Controller
{

    var $user_id = -1;

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if (isset($_SESSION['user_id'])) {
            $this->user_id = (int)$_SESSION['user_id'];
        } else {
            redirect('login');
        }
    }

    function load_header_view($tag_selected='info'){
        $header['title'] = "个人中心";
        $header['page_name'] = 'personal';
        $this->load->view('template/header', $header);
        $this->load->view('template/nav');

        $this->load->model('User_model');
        $user_data=$this->User_model->get_user_by_id($this->user_id);
        $user_data['tag']=$tag_selected;
        $this->load->view('template/personal_nav',$user_data);
    }

    public function info()
    {
        $this->load_header_view('info');
        $this->load->model('User_and_first_label_model');
        $data=array();
        $data['interests'] = $this->User_and_first_label_model->get_first_label_by_user_id($this->user_id);

        $this->load->view('person_related/personal_info', $data);
        $this->load->view('template/personal_sidebar');
        $this->load->view('template/footer');
    }


    public function edit()
    {
        $this->load_header_view('info');
        $this->load->model('Member_and_activity_model');
        $data['title'] = "个人中心";
        $data['page_name'] = 'edit';
        $data['user_info'] = $this->User_model->get_user_by_id($this->user_id);

        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        if (isset($_POST))
            $this->update_user_info();

        $this->load->view('person_related/personal_edit', $data);
        $this->load->view('template/personal_sidebar');
        $this->load->view('template/footer');

    }

    //参数model表示显示的活动类型是什么，创建的:0, 参加的:1，评价的：2
    public function activities($model=1)
    {
        $this->load_header_view('activities');
        $this->load->view('person_related/personal_activities_nav',array('model'=>$model));
        switch ($model){
            case 0:$this->created();break;
            case 1:$this->joined();break;
            case 2:$this->comments();break;
            default:$this->joined();
        }
    }


    public function joined()
    {
        $this->load->model('Member_and_activity_model');
        $row_activities_info = $this->Member_and_activity_model->get_activity_by_member_id($this->user_id);
        $current_date_time = date("Y-m-d h:i:sa");
        $data['activities_info']=array();
        foreach ($row_activities_info as $single_activity_info) {
            if ($single_activity_info == null) continue;
            $activity_date_time = date("Y-m-d h:i:sa",strtotime($single_activity_info['activity_start']));
            //status:活动状态，1为结束，0为未开始,2为已经创建小组了
            $single_activity_info['status']=strtotime($current_date_time) > strtotime($activity_date_time)?1:0;
            $data['activities_info'][] = $single_activity_info;
        }
        $this->load->view('person_related/personal_joined', $data);
        $this->load->view('template/personal_sidebar');
        $this->load->view('template/footer');
    }

    public function created()
    {
        $this->load->model('Activity_model');
        $row_activities_info = $this->Activity_model->get_activity_by_creator_id($this->user_id);
        $current_date_time = date("Y-m-d h:i:sa");
        $data['activities_info']=array();
        $this->load->model("Group_model");
        foreach ($row_activities_info as $single_activity_info) {
            $activity_date_time = date("Y-m-d h:i:sa",strtotime($single_activity_info['activity_start']));
            //status:活动状态，1为结束，0为未开始,2为已经创建小组了
            if(!empty($this->Group_model->get_group_by_activity_id($single_activity_info['id'])))
                $single_activity_info['status']=2;
            else
                $single_activity_info['status']=strtotime($current_date_time) > strtotime($activity_date_time)?1:0;
            $data['activities_info'][] = $single_activity_info;
        }
        $this->load->view('person_related/personal_created', $data);
        $this->load->view('template/personal_sidebar');
        $this->load->view('template/footer');
    }


    public function comments()
    {
        $this->load->model('Member_and_activity_model');
        $data['title'] = "个人中心";
        $data['page_name'] = "comments";

        $row_activities_info = $this->Member_and_activity_model
            ->get_activity_by_member_id($this->user_id);
        $current_date = date("Y-m-d");
        $data['activities_info'] = array();
        foreach ($row_activities_info as $single_activity_info) {
            $activity_date = substr($single_activity_info['activity_start'],0,10);
            // 查看活动是否已经结束 结束代表已经参加过
            if (strtotime($current_date) > strtotime($activity_date)) {
                $data['activities_info'][] = $single_activity_info;
            }
        }
        $this->load->view('person_related/personal_comments', $data);
        $this->load->view('template/personal_sidebar');
        $this->load->view('template/footer');
    }


    /* 功能被撤销
    public function favorites()
    {
        $this->load->model('Member_and_activity_model');
        $data['title'] = "个人中心";
        $data['page_name'] = "favorites";

        //需修改  没有判断是否是收藏了
        $data['activities_info'] = $this->Member_and_activity_model
            ->get_activity_by_member_id($this->user_id);

        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('person_related/personal_favorites', $data);
        $this->load->view('template/footer');
    }*/

    public function group()
    {
        $this->load_header_view('group');

        $this->load->model('Member_and_group_model');
        $this->load->model('Group_model');
        $this->load->model('First_label_model');
        /*也许会用上的创建的活动
        $data['created_groups']=array();
        $created_groups=$this->Group_model->get_group_by_creator_id($this->user_id);
        foreach ($created_groups as $created_group_item){
            $created_group_item['members']=$this->Member_and_group_model->get_members_by_group_id($created_group_item['id']);
            $data['created_groups'][]=$created_group_item;
        }*/
        $data['joined_groups']=array();
        $joined_groups=$this->Member_and_group_model->get_groups_by_user_id($this->user_id);
        $created_groups=$this->Group_model->get_groups_by_leader_id($this->user_id);
        if($created_groups!=null)
            $joined_groups=array_merge($joined_groups,$created_groups);
        foreach ($joined_groups as $joined_groups_item){
            if ($joined_groups_item == null) continue;
            $joined_groups_item['members']=$this->Member_and_group_model->get_members_by_group_id($joined_groups_item['id']);
            $joined_groups_item['leader']=$this->User_model->get_user_by_id($joined_groups_item['leader_id']);
            $joined_groups_item['first_label']=$this->First_label_model->get_first_label_by_id($joined_groups_item['first_label_id']);
            $data['joined_groups'][]=$joined_groups_item;
        }
        $this->load->view('person_related/personal_group', $data);
        $this->load->view('template/personal_sidebar');
        $this->load->view('template/footer');
    }

    public function group_detail($group_id)
    {
        $this->load_header_view('group_detail');

        $this->load->model('Group_model');
        $this->load->model('Member_and_group_model');
        $group=$this->Group_model->get_group_by_id($group_id);
        $invite_users=array();
        $group['invite_users']=array();
        if(!empty($group)){
            $group['members']=$this->Member_and_group_model->get_members_by_group_id($group_id);
            $group['leader']=$this->User_model->get_user_by_id($group['leader_id']);
            $joined_groups=$this->Member_and_group_model->get_groups_by_user_id($this->user_id);
            $created_groups=$this->Group_model->get_groups_by_leader_id($this->user_id);
            if($created_groups!=null)
                $joined_groups=array_merge($joined_groups,$created_groups);
            foreach ($joined_groups as $joined_groups_item){
                if($group_id!=$joined_groups_item['id']) {
                    $group_item_members=$this->Member_and_group_model->get_members_by_group_id($joined_groups_item['id']);
                    $group_item_members[] = $this->User_model->get_user_by_id($joined_groups_item['leader_id']);
                    $invite_users = array_merge($invite_users, $group_item_members);
                }
            }
            //删除不可邀请对象
            foreach ($invite_users as $invite_user_item)
                $group['invite_users'][(string)$invite_user_item['id']]=$invite_user_item;
            foreach ($group['members'] as $repeated_user)
                unset($group['invite_users'][(string)$repeated_user['id']]);
            unset($group['invite_users'][(string)$group['leader']['id']]);
            unset($group['invite_users'][(string)$this->user_id]);
        }
        $this->load->view('person_related/group_detail',array('group'=>$group));
        $this->load->view('template/personal_sidebar');
        $this->load->view('template/footer');

    }

    public function invite_users(){
        $group_id=$this->input->post('group_id');
        $invited_users=$this->input->post('invited_users');
        $this->load->model('Member_and_group_model');
        foreach ($invited_users as $invited_user_item){
            $this->Member_and_group_model->insert_new_member_to_group($invited_user_item,$group_id);
        }
        echo json_encode('success');
    }

    public function quit_group($group_id=0){
        $this->load->model('Member_and_group_model');
        $this->Member_and_group_model->remove_member_from_group_by_id($group_id,$this->user_id);
        $this->group();
    }

    public function create_group($activity_id=-1){
        if($activity_id<=0)
            show_404('无效的活动');
        $this->load->model('Group_model');
        $this->load->model('Activity_model');
        $activity=$this->Activity_model->get_activity_by_id($activity_id);
        $data['leader_id']=$this->user_id;
        $data['name']=$activity['name'];
        $data['activity_id']=$activity_id;
        $new_id=$this->Group_model->insert_new_group($data);
        if($new_id>0)
            $this->group_detail($new_id);
        else
            show_404('创建小组失败');
    }

    public function update_user_info()
    {
        $this->load->model('User_model');
        $user_info = array();
        if (!empty($_POST['_password'])) {
            $this->form_validation->set_rules('password', 'Password',
                'trim|htmlspecialchars|required');
            $this->form_validation->set_rules('password2', 'Password',
                'trim|htmlspecialchars|required|matches[_password]',
                array(
                    'required' => 'Please type your password again!',
                    'matches' => "Fail to match!"
                ));
            if ($this->form_validation->run() == false) {
                return;
            }
            $user_info['password'] = $_POST['password'];
        }
        if (!empty($_POST['nick_name'])) {
            if ($_POST['nick_name'] != $this->User_model->get_user_by_id($this->user_id, 'nick_name')) {
                $this->form_validation->set_rules('nick_name', 'Nickname',
                    'trim|htmlspecialchars|required|is_unique[user.nick_name]',
                    array(
                        'required' => 'Please provide your nickname!',
                        'is_unique' => '%s is used!'
                    ));
                if ($this->form_validation->run() == false) {
                    return;
                }
                $user_info['nick_name'] = $_POST['nick_name'];
            }
        }
        if (!empty($_POST['phone_number'])) {
            $this->form_validation->set_rules('phone_number', 'Phone number',
                'trim|htmlspecialchars|required|is_natural',
                array(
                    'required' => 'Please provide your phone number!',
                    'is_natural' => 'Invalid phone number!'
                ));
            if ($this->form_validation->run() == false) {
                return;
            }
            $user_info['phone_number'] = $_POST['phone_number'];
        }
        if ($this->User_model->update_user_info_by_id($this->user_id, $user_info) == true)
            redirect('user/info');
    }
}
