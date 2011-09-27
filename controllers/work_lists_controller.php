<?php
class WorkListsController extends AppController {

	public $name = 'WorkLists';
	
	var $paginate = array('limit' => 10,'order' => array('WorkList.Priority' => 'asc','WorkList.Created' => 'desc'));
	
	public function beforeFilter()
	{
		if(!$this->Session->check('User'))
		{
			$this->redirect(array('controller'=>'users','action'=>'login'));	
		}
	}
	
	public function index() {
		$this->WorkList->recursive = 0;
		$this->set('workLists', $this->paginate('WorkList',
							array('user_id ='=>$this->Session->read('UserId'))));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->WorkList->create();
			if ($this->WorkList->save($this->request->data)) {
				$this->Session->setFlash(__('The work list has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work list could not be saved. Please, try again.'));
			}
		}
		//$users = $this->WorkList->User->find('list');
		//$this->set(compact('users'));
		$this->set('user',$this->Session->read('UserId'));
	}

	public function edit($id = null) {
		$this->WorkList->id = $id;
		if (!$this->WorkList->exists()) {
			throw new NotFoundException(__('Invalid work list'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WorkList->save($this->request->data)) {
				$this->Session->setFlash(__('The work list has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work list could not be saved. Please, try again.'));
			}
		} else {
			$this->data = $this->WorkList->read(null, $id);
		}
		$users = $this->WorkList->User->find('list');
		$this->set(compact('users'));
	}

	public function delete($id = null) {
		$this->WorkList->id = $id;
		if ($this->WorkList->delete()) {
			$this->Session->setFlash(__('Work list deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Task could not be deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
