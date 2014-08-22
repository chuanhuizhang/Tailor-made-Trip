<?php

require_once APPLICATION_PATH.'/models/User.php';


class AdminController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function loginAction(){ 
    }

    public function logincheckAction(){
      $email = $this->getRequest()->getParam('email','');
      $password = $this->getRequest()->getParam('password','');

      $this->_redirect('/admin/management');
    }

    public function managementAction(){
      $this->view->admin= "Chuanhui Zhang";
    }
}

