<?php 

namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
class TopicsController extends AppController
{

    public function initialize()
    {

        parent::initialize();

        $this->loadComponent('Flash');

				
    }
	public function isAuthorized($user)
	{
		$action = $this->request->params['action'];
		if (in_array($action, ['index', 'add','topics'])) {
		return true;
		}
		if (empty($this->request->params['pass'][0])) {
			return false;
		}		
		if (in_array($this->request->action, ['edit', 'delete'])) {
		$topicId = (int)$this->request->params['pass'][0];
		if ($this->Topics->isOwnedBy($topicId, $user['id'])) {
		return true;
		}
		}
		return parent::isAuthorized($user);


	}

    public function index()
    {
        $this->set('topics', $this->Topics->find('all'));
    }

    public function view($id)
    {
        $topic = $this->Topics->get($id);
        $this->set(compact('topic'));
    }

    public function add()
    {
        $topic = $this->Topics->newEntity();  
        if ($this->request->is('post')) { // 
            $topic = $this->Topics->patchEntity($topic, $this->request->data);
			$topic->user_id = $this->Auth->user('id');
            if ($this->Topics->save($topic)) {
                $this->Flash->success(__('El Topic ha sido agregado Satisfactoriamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No ha sido posible Agregar el nuevo Topic.'));
        }
        $this->set('topic', $topic);
    }
	public function edit($id = null)
	{
		$topic = $this->Topics->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Topics->patchEntity($topic, $this->request->data);
			if ($this->Topics->save($topic)) {
				$this->Flash->success(__('Su topic ha sido actualizado Satisfactoriamente.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('No se puede actualizar el topic.'));
		}
	
		$this->set('topic', $topic);
	}
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$topic = $this->Topics->get($id);
		if ($this->Topics->delete($topic)) {
			$this->Flash->success(__('El topic ha sido eliminado satisfactoriamente.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}
?>