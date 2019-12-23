<?php
namespace Alaska_Controller;

class UserController
{

	public function inscription()
	{
        $nxView = new \Alaska_Model\View ('admin/inscription');
        $nxView->getView();
	}

	public function login()
	{	
        $nxView = new \Alaska_Model\View ('admin/login');
        $nxView->getView();
	}

	public function logout()
	{
        $nxView = new \Alaska_Model\View ('admin/logout');
        $nxView->getView();
	}


}
