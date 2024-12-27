<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Tanks Controller
 *
 * @property \App\Model\Table\TanksTable $Tanks
 * @method \App\Model\Entity\Tank[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TanksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tank = $this->Tanks->find()->where(['is_deleted' => 0]);
        $tanks = $this->paginate($tank);
        $this->set(compact('tanks'));
    }

    /**
     * View method
     *
     * @param string|null $id Tank id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tank = $this->Tanks->get($id, [
            'contain' => ['Bookings'],
        ]);

        $this->set(compact('tank'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tank = $this->Tanks->newEmptyEntity();
        if ($this->request->is('post')) {
            $tank = $this->Tanks->patchEntity($tank, $this->request->getData());
            $tank->is_active = $this->request->getData('is_active') ? 1 : 0;
            $tank->created_at = date('Y-m-d');
            $tank->updated_at = date('Y-m-d');
            if ($this->Tanks->save($tank)) {
                $this->Flash->success(__('The tank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tank could not be saved. Please, try again.'));
        }
        $this->set(compact('tank'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tank id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tank = $this->Tanks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tank = $this->Tanks->patchEntity($tank, $this->request->getData());
            $tank->is_active = $this->request->getData('is_active') ? 1 : 0;
            $tank->updated_at = date('Y-m-d');
            if ($this->Tanks->save($tank)) {
                $this->Flash->success(__('The tank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tank could not be saved. Please, try again.'));
        }
        $this->set(compact('tank'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tank id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
       public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tank = $this->Tanks->get($id);
        if ($tank) {
        $tank->is_deleted = (int)!$tank->is_deleted;
            if ($this->Tanks->save($tank)) {
                $this->Flash->success(__('The tank has been updated.'));
            } else {
                $this->Flash->error(__('The tank could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The tank does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
