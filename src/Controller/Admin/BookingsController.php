<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes'],
        ];
        if ($this->Auth->user('id') != 1) {

            $bookings = $this->paginate($this->Bookings->find("all")->where(['user_id' => $this->Auth->user('id')]));
        } else {
            $bookings = $this->paginate($this->Bookings->find("all"));
        }


        $this->set(compact('bookings'));
    }


    public function scheduledlist()
    {
        $this->paginate = [
            'contain' => ['Users', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes'],
        ];
        $twoDaysAgo = date('Y-m-d H:i:s', strtotime('-2 days'));
        $query = $this->Bookings->find("all")->where(function ($exp, $q) use ($twoDaysAgo) {
            return $exp->gte('Bookings.entry_date', $twoDaysAgo);
        });
        if ($this->Auth->user('id') != 1) {
            $query = $query->where(['Bookings.user_id' => $this->Auth->user('id')]);
        }
        $bookings = $this->paginate($query);
        $this->set(compact('bookings'));
    }



    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Users', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes'],
        ]);

        $this->set(compact('booking'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function getDistrict()
    {
        $this->request->allowMethod(['ajax', 'get']); // Restrict to AJAX and GET requests

        $countryId = $this->request->getQuery('stateId');
        $districtsTable = $this->getTableLocator()->get('Districts');
        $chembers = $districtsTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
        ])->where(['state_id' => $countryId, 'is_active' => 1, 'is_deleted' => 0])->toArray();

        $this->set([
            'chembers' => $chembers,
            '_serialize' => ['chembers'],
        ]);
    }
    public function getArea()
    {
        $this->request->allowMethod(['ajax', 'get']); // Restrict to AJAX and GET requests

        $countryId = $this->request->getQuery('stateId');
        $districtsTable = $this->getTableLocator()->get('Areas');
        $chembers = $districtsTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
        ])->where(['district_id' => $countryId, 'is_active' => 1, 'is_deleted' => 0])->toArray();

        $this->set([
            'chembers' => $chembers,
            '_serialize' => ['chembers'],
        ]);
    }
    public function getPostoffice()
    {
        $this->request->allowMethod(['ajax', 'get']); // Restrict to AJAX and GET requests

        $countryId = $this->request->getQuery('stateId');
        $districtsTable = $this->getTableLocator()->get('PostOffices');
        $chembers = $districtsTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',

        ])->where(['area_id' => $countryId, 'is_active' => 1, 'is_deleted' => 0])->toArray();

        $this->set([
            'chembers' => $chembers,
            '_serialize' => ['chembers'],
        ]);
    }
    public function getPincode()
    {
        $this->request->allowMethod(['ajax', 'get']); // Restrict to AJAX and GET requests

        $countryId = $this->request->getQuery('stateId');
        $districtsTable = $this->getTableLocator()->get('PostOffices');
        $chembers = $districtsTable->find("all")->where(['id' => $countryId])->first();



        $this->set([
            'chembers' => $chembers ? $chembers->pincode : null,
            '_serialize' => ['chembers'] // Automatically serialize `chembers` to JSON
        ]);
    }

    public function getAmount()
    {
        $this->request->allowMethod(['ajax', 'get']); // Restrict to AJAX and GET requests

        $chamber_id = $this->request->getQuery('chamber_id');
        $tank_id = $this->request->getQuery('tank_id');
        $pipe_id = $this->request->getQuery('pipe_id');
        $chamberTable = $this->getTableLocator()->get('Chambers');
        $chember = $chamberTable->find("all")->where(['id' => $chamber_id])->first();

        $tankTable = $this->getTableLocator()->get('Tanks');
        $tank = $tankTable->find("all")->where(['id' => $tank_id])->first();

        $pipeTable = $this->getTableLocator()->get('Pipes');
        $pipe = $pipeTable->find("all")->where(['id' => $pipe_id])->first();

        $total = $chember->amount + $tank->amount + $pipe->amount;



        $this->set([
            'chembers' => $total ? $total : 0,
            '_serialize' => ['chembers'] // Automatically serialize `chembers` to JSON
        ]);
    }
    public function add()
    {
        $booking = $this->Bookings->newEmptyEntity();
        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            $booking->user_id = $this->Auth->user('id');
            $booking->status = 1;
            $booking->created_at = date('Y-m-d');
            $booking->updated_at = date('Y-m-d');
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $states = $this->Bookings->States->find('list', ['limit' => 200])->all();
        $chambers = $this->Bookings->Chambers->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $tanks = $this->Bookings->Tanks->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $pipes = $this->Bookings->Pipes->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $this->set(compact('booking', 'states', 'chambers', 'tanks', 'pipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            $booking->status = $this->request->getData('status');
            $booking->payment_receive_by_id = $this->Auth->user('id');
            $booking->work_date = $this->request->getData('work_date');
            $booking->work_time = $this->request->getData('work_time');
            $booking->vehicle_no = $this->request->getData('vehicle_no');
            $booking->driver = $this->request->getData('driver');
            $booking->helper1 = $this->request->getData('helper1');
            $booking->helper2 = $this->request->getData('helper2');
            $booking->remarks = $this->request->getData('remarks');
            $booking->payment_amount = $this->request->getData('payment_amount');
            $booking->payment_date = $this->request->getData('payment_date');
            $booking->payment_note = $this->request->getData('payment_note');
            $booking->payment_receive_by = $this->request->getData('payment_receive_by');
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', [
            'keyField' => 'id',       // The field to use as the keys
            'valueField' => 'name',   // The field to use as the values
            'limit' => 200
        ])->all();

        $states = $this->Bookings->States->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $districts = $this->Bookings->Districts->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $areas = $this->Bookings->Areas->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $postOffices = $this->Bookings->PostOffices->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $chambers = $this->Bookings->Chambers->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $tanks = $this->Bookings->Tanks->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $pipes = $this->Bookings->Pipes->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $vehicle = $this->Bookings->Vehicles->find('list', ['limit' => 200])->where(['is_active' => 1, 'is_deleted' => 0])->all();
        $driver = $this->Bookings->Users->find('list', [
            'keyField' => 'id',       // The field to use as the keys
            'valueField' => 'name',   // The field to use as the values
            'limit' => 200
        ])->where(['user_type' => 3])->all();
        $helper = $this->Bookings->Users->find('list', [
            'keyField' => 'id',       // The field to use as the keys
            'valueField' => 'name',   // The field to use as the values
            'limit' => 200
        ])->where(['user_type' => 4])->all();
        $this->set(compact('booking', 'users', 'states', 'districts', 'areas', 'postOffices', 'chambers', 'tanks', 'pipes', 'vehicle', 'driver', 'helper'));
    }

    public function scheduled($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            $booking->work_date = $this->request->getData('work_date');
            $booking->work_time = $this->request->getData('work_time');
            $booking->remarks = $this->request->getData('remarks');
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $this->set(compact('booking'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
