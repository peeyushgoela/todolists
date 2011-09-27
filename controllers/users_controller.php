<?php
class UsersController extends AppController {

	public $name = 'Users';

	public function beforeFilter()
	{
		if(!$this->Session->check('User'))
		{
			if($this->action!='login'&&$this->action!='add')
					$this->redirect('login');				
		}
		else if($this->action!='logout'&&$this->action!='deleteacc')
		$this->redirect(array('controller'=>'work_lists','action'=>'index'));
	}
	
	public function login()
	{		
		if(!empty($this->data)) 
		{ 
			if(($user = $this->User->validateLogin($this->data['User']))) 
			{ 
				$user['password']='';
				$this->Session->write('User', $user); 
				$this->Session->write('UserId',$user['id']);
				$this->Session->setFlash('You\'ve successfully logged in.'); 
				$this->redirect(array('controller'=>'work_lists','action'=>'index')); 
			} 
			else 
			{ 
				$this->Session->setFlash('Sorry, the Login information you\'ve entered is incorrect.');
				$this->redirect(array('action','login'));
			} 
		} 
	}
	
	public function logout()
	{
		$this->Session->destroy('User'); 
		$this->Session->destroy('UserId');
		$this->Session->setFlash('Logout Successful!!!'); 
		$this->redirect('login');
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function deleteacc($id = null) {
		$this->User->id = $id;
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'logout'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
