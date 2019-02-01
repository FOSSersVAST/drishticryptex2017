<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_authentication extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('User');//model for facebook login
    }

    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('/user_authentication');
    }

    public function index(){
        $data['model_obj'] = $this->User;

        if (count($_POST) == 2) {
          $userData['email'] = $this->input->post('email');
          $userData['password'] = password_hash($this->input->post('password'));

          if ($this->User->authenticate($userData['email'], $userData['password'])) {
            // Insert or update user data
            $userID = $this->User->checkUser($userData);
            $userData['id'] = $userID;
            if(!empty($userID)){
              $data['level'] = $this->User->returnLevel($userID);
              $data['levelcheckintime'] = $this->User->returnLevelCheckInTime($userID);
              $data['collegename'] = $this->User->returnCollegeName($userID);
              $data['mobilenumber'] = $this->User->returnMobileNumber($userID);
            }
            if(!empty($userID)){
              $data['userData'] = $userData;
            } else {
              $data['userData'] = array();
            }

            $this->session->set_userdata('userData', $userData);
          } else {
            $data['msg'] = [
              'text' => 'Email/password wrong'
            ];
          }
        } else if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])) {
          // Preparing data for database insertion
          $userData['oauth_provider'] = '';
          $userData['oauth_uid'] = '';
          $userData['first_name'] = $this->input->post('first_name');
          $userData['last_name'] = $this->input->post('last_name');
          $userData['email'] = $this->input->post('email');
          $userData['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
          $userData['gender'] = $this->input->post('gender');
          $userData['locale'] = 'en';
          $userData['picture_url'] = 'https://www.gravatar.com/avatar/' . md5($userData['email']);

          if(is_null($userData['email'])) {
            redirect(emailrequired);
          } else {
            $checkEmailExist = $this->User->checkEmailExist($userData['email']);

            // Insert or update user data
            $userID = $this->User->checkUser($userData);
            $userData['id'] = $userID;
            if(!empty($userID)){
              $data['level'] = $this->User->returnLevel($userID);
              $data['levelcheckintime'] = $this->User->returnLevelCheckInTime($userID);
              $data['collegename'] = $this->User->returnCollegeName($userID);
              $data['mobilenumber'] = $this->User->returnMobileNumber($userID);
            }
            if(!empty($userID)){
              $data['userData'] = $userData;
            } else {
              $data['userData'] = array();
            }

            $this->session->set_userdata('userData',$userData);
          }
        } else if($this->session->userdata('userData')){
          $userData = $this->session->userdata('userData');

          $data['level'] = $this->User->returnLevel($userID);
          $data['levelcheckintime'] = $this->User->returnLevelCheckInTime($userID);
          $data['collegename'] = $this->User->returnCollegeName($userID);
          $data['mobilenumber'] = $this->User->returnMobileNumber($userID);
          $data['userData'] = $userData;
        }

        $this->load->view('templates/header');
        $this->load->view('menu2');
        $this->load->view('user_authentication/index', $data);
        $this->load->view('templates/footer');
    }
}
