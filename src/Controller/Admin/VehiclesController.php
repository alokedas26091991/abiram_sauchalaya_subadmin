<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Vehicles Controller
 *
 * @property \App\Model\Table\VehiclesTable $Vehicles
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VehiclesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $vehicle = $this->Vehicles->find()->where(['is_deleted' => 0]);
        $vehicles = $this->paginate($vehicle);
        $this->set(compact('vehicles'));
    }

    /**
     * View method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicle = $this->Vehicles->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('vehicle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicle = $this->Vehicles->newEmptyEntity();
        if ($this->request->is('post')) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->getData());
            $vehicle->is_active = $this->request->getData('is_active') ? 1 : 0;
            $vehicle->created_at = date('Y-m-d');
            $vehicle->updated_at = date('Y-m-d');
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
        }
        $this->set(compact('vehicle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicle = $this->Vehicles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->getData());
            $vehicle->is_active = $this->request->getData('is_active') ? 1 : 0;
            $vehicle->updated_at = date('Y-m-d');
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
        }
        $this->set(compact('vehicle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
       public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicle = $this->Vehicles->get($id);
        if ($vehicle) {
        $vehicle->is_deleted = (int)!$vehicle->is_deleted;
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been updated.'));
            } else {
                $this->Flash->error(__('The vehicle could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The vehicle does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
