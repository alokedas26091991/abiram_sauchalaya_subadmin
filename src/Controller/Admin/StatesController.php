<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * States Controller
 *
 * @property \App\Model\Table\StatesTable $States
 * @method \App\Model\Entity\State[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $state = $this->States->find()->where(['is_deleted' => 0]);
        $states = $this->paginate($state);
        $this->set(compact('states'));
    }

    /**
     * View method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $state = $this->States->get($id, [
            'contain' => ['Areas', 'Districts', 'PostOffices', 'Users'],
        ]);

        $this->set(compact('state'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $state = $this->States->newEmptyEntity();
        if ($this->request->is('post')) {
            $state = $this->States->patchEntity($state, $this->request->getData());
            $state->is_active = $this->request->getData('is_active') ? 1 : 0;
            $state->created_at = date('Y-m-d');
            $state->updated_at = date('Y-m-d');
            if ($this->States->save($state)) {
                $this->Flash->success(__('The state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The state could not be saved. Please, try again.'));
        }
        $this->set(compact('state'));
    }

    /**
     * Edit method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $state = $this->States->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $state = $this->States->patchEntity($state, $this->request->getData());
            $state->is_active = $this->request->getData('is_active') ? 1 : 0;
            $state->updated_at = date('Y-m-d');
            if ($this->States->save($state)) {
                $this->Flash->success(__('The state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The state could not be saved. Please, try again.'));
        }
        $this->set(compact('state'));
    }

    /**
     * Delete method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
  
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $state = $this->States->get($id);
        if ($state) {
        $state->is_deleted = (int)!$state->is_deleted;
            if ($this->States->save($state)) {
                $this->Flash->success(__('The state has been updated.'));
            } else {
                $this->Flash->error(__('The state could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The state does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
