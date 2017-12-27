<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{

    public function initialize()
    {
        parent::initialize();
		$this->loadComponent('Flash');
		$this->Auth->allow(['logout', 'add']);

    }
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Usuario o Contraseña Invalidos, Intente Nuevamente.'));
		}
	}
	
	public function logout(){
		$this->Flash->success('Se ha cerrado la sesión exitosamente');	
	return	$this->redirect($this->Auth->logout());
	}
	public function index()
	{
		$this->set('users',$this->Users->find('all'));		
	}
	public function view($id)
	{
		$user = $this->Users->get($id);
		$this->set('user',$user);
		
	}
	public function add()
	{
		$user = $this->Users->newEntity();
		if($this->request->is('post')) {
			$this->Users->patchEntity($user,$this->request->data);
			if($this->Users->save($user)){
            $this->Flash->success(__('La cuenta ha sido creada exitosamente.'));
            return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('No fue posible crear la cuenta solicitada.'));
		}
		$this->set('user',$user);
	}
	public function edit($id)
	{
		$user = $this->Users->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('Su perfil ha sido actualizado.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('No fue posible actualizar su perfil.'));
		}
	
		$this->set('user', $user);		
		
	}
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('El usuario ha sido eliminado exitosamente.', h($id)));
			return $this->redirect(['action' => 'index']);
		}		
		
	}	
}


?>