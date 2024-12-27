<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Areas Controller
 *
 * @property \App\Model\Table\AreasTable $Areas
 * @method \App\Model\Entity\Area[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AreasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['States', 'Districts'],
            'conditions' => ['Areas.is_deleted' => 0],
        ];
        $areas = $this->paginate($this->Areas);
        
        $this->set(compact('areas'));
    }

    /**
     * View method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => ['States', 'Districts', 'PostOffices', 'Users'],
        ]);

        $this->set(compact('area'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $area = $this->Areas->newEmptyEntity();
        if ($this->request->is('post')) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            $area->is_active = $this->request->getData('is_active') ? 1 : 0;
            $area->created_at = date('Y-m-d');
            $area->updated_at = date('Y-m-d');
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The area could not be saved. Please, try again.'));
        }
        $states = $this->Areas->States->find('list', ['limit' => 200])->all();
        //$districts = $this->Areas->Districts->find('list', ['limit' => 200])->all();
        $this->set(compact('area', 'states'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            $area->is_active = $this->request->getData('is_active') ? 1 : 0;
            $area->updated_at = date('Y-m-d');
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The area could not be saved. Please, try again.'));
        }
        $states = $this->Areas->States->find('list', ['limit' => 200])->all();
        $districts = $this->Areas->Districts->find('list', ['limit' => 200])->all();
        $this->set(compact('area', 'states', 'districts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
      public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $area = $this->Areas->get($id);
        if ($area) {
        $area->is_deleted = (int)!$area->is_deleted;
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The area has been updated.'));
            } else {
                $this->Flash->error(__('The area could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The area does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
