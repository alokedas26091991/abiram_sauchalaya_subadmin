<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function driverpayment()
    {
        $userObj = TableRegistry::getTableLocator()->get('Users');
        $program = $userObj->find()->where(['is_deleted' => 0, 'is_active' => 1, 'user_type' => 3]);


        $this->set(compact('program'));
    }
    public function add_driver_payment()
    {
        $bookingObj = TableRegistry::getTableLocator()->get('Bookings');
        foreach ($this->request->getData('pay') as $key => $pay) {
            echo $this->request->getData('id')[$key]; // Access the matching id by key
            echo $pay; // Access the current pay value
            if ($pay > 0) {
                $bookingdetailsObj = $bookingObj->find()->where(['id' => $this->request->getData('id')[$key]])->first();

                $payment = $this->Payments->find("all")->where(['user_id' => $bookingdetailsObj->driver, 'bookings_id' => $this->request->getData('id')[$key]])->first();
                if ($payment == 0) {

                    $payment = $this->Payments->newEmptyEntity();
                }

                $payment->bookings_id = $this->request->getData('id')[$key];
                $payment->user_id = $bookingdetailsObj->driver;
                $payment->paid_amount = $pay;
                $payment->payment_date = date('Y-m-d');
                $payment->created_at = date('Y-m-d');
                $payment->updated_at = date('Y-m-d');

                $this->Payments->save($payment);
            }
        }

        return $this->redirect(['action' => 'paymentlist']);

        $this->autoRender = false;
    }
    public function pending_driver_payment_list()
    {

        $bookingObj = TableRegistry::getTableLocator()->get('Bookings');



        $from_date = $this->request->getData('start_date');
        $to_date = $this->request->getData('end_date');
        $driver = $this->request->getData('driver');

        $query = $bookingObj->find()->contain(['Payments', 'Users', 'Drivers', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes'])
            ->where([
                'Bookings.entry_date >=' => $from_date,
                'Bookings.entry_date <=' => $to_date,
            ]);



        if ($driver !== null) {
            $query->andWhere(['Bookings.driver' => $driver]);
        }





        $bookings = $query;
        $this->set(compact('bookings'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function paymentlist()
    {
        $bookings = $this->Payments->find()->contain(['Bookings', 'Bookings.Users', 'Users', 'Bookings.States', 'Bookings.Districts', 'Bookings.Areas', 'Bookings.PostOffices', 'Bookings.Chambers', 'Bookings.Tanks', 'Bookings.Pipes'])
            ->where([
                'Payments.is_deleted ' => 0

            ])->order(['Payments.id' => 'DESC']);

        // echo '<pre>';
        // print_r($bookings->first());
        // echo '</pre>';
        // die;

        $this->set(compact('bookings'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $bookings = $this->Payments->Bookings->find('list', ['limit' => 200])->all();
        $users = $this->Payments->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('payment', 'bookings', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function paymentedit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'paymentlist']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $bookings = $this->Payments->Bookings->find('list', ['limit' => 200])->all();
        $users = $this->Payments->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('payment', 'bookings', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deletepayment($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'paymentlist']);
    }
}
