<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Chambers Controller
 *
 * @property \App\Model\Table\ChambersTable $Chambers
 * @method \App\Model\Entity\Chamber[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChambersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $chamber = $this->Chambers->find()->where(['is_deleted' => 0]);
        $chambers = $this->paginate($chamber);
    
        $this->set(compact('chambers'));
    }

    /**
     * View method
     *
     * @param string|null $id Chamber id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chamber = $this->Chambers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('chamber'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chamber = $this->Chambers->newEmptyEntity();
        if ($this->request->is('post')) {
            $chamber = $this->Chambers->patchEntity($chamber, $this->request->getData());
            $chamber->is_active = $this->request->getData('is_active') ? 1 : 0;
            $chamber->created_at = date('Y-m-d');
            $chamber->updated_at = date('Y-m-d');
            if ($this->Chambers->save($chamber)) {
                $this->Flash->success(__('The chamber has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chamber could not be saved. Please, try again.'));
        }
        $this->set(compact('chamber'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chamber id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chamber = $this->Chambers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chamber = $this->Chambers->patchEntity($chamber, $this->request->getData());
            $chamber->is_active = $this->request->getData('is_active') ? 1 : 0;
            $chamber->updated_at = date('Y-m-d');
            if ($this->Chambers->save($chamber)) {
                $this->Flash->success(__('The chamber has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chamber could not be saved. Please, try again.'));
        }
        $this->set(compact('chamber'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chamber id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
       public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chamber = $this->Chambers->get($id);
        if ($chamber) {
        $chamber->is_deleted = (int)!$chamber->is_deleted;
            if ($this->Chambers->save($chamber)) {
                $this->Flash->success(__('The chamber has been updated.'));
            } else {
                $this->Flash->error(__('The chamber could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The chamber does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
