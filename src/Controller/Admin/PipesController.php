<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Pipes Controller
 *
 * @property \App\Model\Table\PipesTable $Pipes
 * @method \App\Model\Entity\Pipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PipesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $pipe = $this->Pipes->find()->where(['is_deleted' => 0]);
        $pipes = $this->paginate($pipe);
    
        $this->set(compact('pipes'));

    }

    /**
     * View method
     *
     * @param string|null $id Pipe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pipe = $this->Pipes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('pipe'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pipe = $this->Pipes->newEmptyEntity();
        if ($this->request->is('post')) {
            $pipe = $this->Pipes->patchEntity($pipe, $this->request->getData());
            $pipe->is_active = $this->request->getData('is_active') ? 1 : 0;
            $pipe->created_at = date('Y-m-d');
            $pipe->updated_at = date('Y-m-d');
            if ($this->Pipes->save($pipe)) {
                $this->Flash->success(__('The pipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pipe could not be saved. Please, try again.'));
        }
        $this->set(compact('pipe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pipe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pipe = $this->Pipes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pipe = $this->Pipes->patchEntity($pipe, $this->request->getData());
            $pipe->is_active = $this->request->getData('is_active') ? 1 : 0;
            $pipe->updated_at = date('Y-m-d');
            if ($this->Pipes->save($pipe)) {
                $this->Flash->success(__('The pipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pipe could not be saved. Please, try again.'));
        }
        $this->set(compact('pipe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pipe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
       public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pipe = $this->Pipes->get($id);
        if ($pipe) {
        $pipe->is_deleted = (int)!$pipe->is_deleted;
            if ($this->Pipes->save($pipe)) {
                $this->Flash->success(__('The pipe has been updated.'));
            } else {
                $this->Flash->error(__('The pipe could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The pipe does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
