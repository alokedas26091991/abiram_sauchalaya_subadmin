<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * PostOffices Controller
 *
 * @property \App\Model\Table\PostOfficesTable $PostOffices
 * @method \App\Model\Entity\PostOffice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostOfficesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['States', 'Districts', 'Areas'],
            'conditions' => ['PostOffices.is_deleted' => 0],
        ];
        $postOffices = $this->paginate($this->PostOffices);

        $this->set(compact('postOffices'));
    }

    /**
     * View method
     *
     * @param string|null $id Post Office id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postOffice = $this->PostOffices->get($id, [
            'contain' => ['States', 'Districts', 'Areas', 'Users'],
        ]);

        $this->set(compact('postOffice'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postOffice = $this->PostOffices->newEmptyEntity();
        if ($this->request->is('post')) {
            $postOffice = $this->PostOffices->patchEntity($postOffice, $this->request->getData());
            $postOffice->is_active = $this->request->getData('is_active') ? 1 : 0;
            $postOffice->created_at = date('Y-m-d');
            $postOffice->updated_at = date('Y-m-d');
            if ($this->PostOffices->save($postOffice)) {
                $this->Flash->success(__('The post office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post office could not be saved. Please, try again.'));
        }
        $states = $this->PostOffices->States->find('list', ['limit' => 200])->all();
        $districts = $this->PostOffices->Districts->find('list', ['limit' => 200])->all();
        $areas = $this->PostOffices->Areas->find('list', ['limit' => 200])->all();
        $this->set(compact('postOffice', 'states', 'districts', 'areas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post Office id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postOffice = $this->PostOffices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postOffice = $this->PostOffices->patchEntity($postOffice, $this->request->getData());
            $postOffice->is_active = $this->request->getData('is_active') ? 1 : 0;
            $postOffice->updated_at = date('Y-m-d');
            if ($this->PostOffices->save($postOffice)) {
                $this->Flash->success(__('The post office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post office could not be saved. Please, try again.'));
        }
        $states = $this->PostOffices->States->find('list', ['limit' => 200])->all();
        $districts = $this->PostOffices->Districts->find('list', ['limit' => 200])->all();
        $areas = $this->PostOffices->Areas->find('list', ['limit' => 200])->all();
        $this->set(compact('postOffice', 'states', 'districts', 'areas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post Office id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
     public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postOffice = $this->PostOffices->get($id);
        if ($postOffice) {
        $postOffice->is_deleted = (int)!$postOffice->is_deleted;
            if ($this->PostOffices->save($postOffice)) {
                $this->Flash->success(__('The Post Office has been updated.'));
            } else {
                $this->Flash->error(__('The Post Office could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The Post Office does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
