<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Districts Controller
 *
 * @property \App\Model\Table\DistrictsTable $Districts
 * @method \App\Model\Entity\District[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DistrictsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['States'],
            'conditions' => ['Districts.is_deleted' => 0],
        ];
        $districts = $this->paginate($this->Districts);

        $this->set(compact('districts'));
    }

    /**
     * View method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $district = $this->Districts->get($id, [
            'contain' => ['States', 'Areas', 'PostOffices'],
        ]);

        $this->set(compact('district'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $district = $this->Districts->newEmptyEntity();
        if ($this->request->is('post')) {
            $district = $this->Districts->patchEntity($district, $this->request->getData());
            $district->is_active = $this->request->getData('is_active') ? 1 : 0;
            $district->created_at = date('Y-m-d');
            $district->updated_at = date('Y-m-d');
            if ($this->Districts->save($district)) {
                $this->Flash->success(__('The district has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The district could not be saved. Please, try again.'));
        }
        $states = $this->Districts->States->find('list', ['limit' => 200])->all();
        $this->set(compact('district', 'states'));
    }

    /**
     * Edit method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $district = $this->Districts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $district = $this->Districts->patchEntity($district, $this->request->getData());
            $district->is_active = $this->request->getData('is_active') ? 1 : 0;
            $district->updated_at = date('Y-m-d');
            if ($this->Districts->save($district)) {
                $this->Flash->success(__('The district has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The district could not be saved. Please, try again.'));
        }
        $states = $this->Districts->States->find('list', ['limit' => 200])->all();
        $this->set(compact('district', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
       public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $district = $this->Districts->get($id);
        if ($district) {
        $district->is_deleted = (int)!$district->is_deleted;
            if ($this->Districts->save($district)) {
                $this->Flash->success(__('The district has been updated.'));
            } else {
                $this->Flash->error(__('The district could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The district does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
