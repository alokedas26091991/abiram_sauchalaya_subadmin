<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();
    }

    public function index() {}

    public function helperpaidpayment()
    {
        $userObj = TableRegistry::getTableLocator()->get('Users');
        $program = $userObj->find()->where(['is_deleted' => 0, 'is_active' => 1, 'user_type' => 4]);


        $this->set(compact('program'));
    }


    public function helperduepayment()
    {
        $userObj = TableRegistry::getTableLocator()->get('Users');
        $program = $userObj->find()->where(['is_deleted' => 0, 'is_active' => 1, 'user_type' => 4]);


        $this->set(compact('program'));
    }

    public function helperpaidpaymentreport()
    {
        $bookingObj = TableRegistry::getTableLocator()->get('Bookings');



        $from_date = $this->request->getData('start_date');
        $to_date = $this->request->getData('end_date');


        $driver = $this->request->getData('helper');

        $query = $bookingObj->find()->contain(['Helper2', 'Helper1', 'Payments', 'Users', 'Drivers', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes'])
            ->where([
                'Bookings.entry_date >=' => $from_date,
                'Bookings.entry_date <=' => $to_date,
            ]);



        $query->andWhere([
            'Bookings.is_deleted' => '0', // AND condition
            'OR' => [
                'Bookings.helper1' => $driver,
                'Bookings.helper2' => $driver
            ]
        ]);





        $bookings = $query;
        $this->set(compact('bookings', 'driver'));
    }

    public function helperduepaymentreport()
    {
        $bookingObj = TableRegistry::getTableLocator()->get('Bookings');



        $from_date = $this->request->getData('start_date');
        $to_date = $this->request->getData('end_date');


        $driver = $this->request->getData('helper');

        $query = $bookingObj->find()->contain(['Helper2', 'Helper1', 'Payments', 'Users', 'Drivers', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes'])
            ->where([
                'Bookings.entry_date >=' => $from_date,
                'Bookings.entry_date <=' => $to_date,
            ]);



        $query->andWhere([
            'Bookings.is_deleted' => '0', // AND condition
            'OR' => [
                'Bookings.helper1' => $driver,
                'Bookings.helper2' => $driver
            ]
        ]);





        $bookings = $query;
        $this->set(compact('bookings', 'driver'));
    }

    public function driverpaidpayment()
    {
        $userObj = TableRegistry::getTableLocator()->get('Users');
        $program = $userObj->find()->where(['is_deleted' => 0, 'is_active' => 1, 'user_type' => 3]);


        $this->set(compact('program'));
    }

    public function driverduepayment()
    {
        $userObj = TableRegistry::getTableLocator()->get('Users');
        $program = $userObj->find()->where(['is_deleted' => 0, 'is_active' => 1, 'user_type' => 3]);


        $this->set(compact('program'));
    }

    public function driverpaidpaymentreport()
    {
        $bookingObj = TableRegistry::getTableLocator()->get('Bookings');



        $from_date = $this->request->getData('start_date');
        $to_date = $this->request->getData('end_date');
        $driver = $this->request->getData('driver');

        $query = $bookingObj->find()

            ->select($bookingObj)
            ->select(['Payments.driver_payment_amount'])
            ->leftJoinWith('Payments', function ($q) {
                return $q;
            })
            ->where(function ($exp, $q) use ($from_date, $to_date) {
                return $exp->and_([
                    'Payments.created_at >=' => $from_date,
                    'Payments.created_at <=' => $to_date
                ])->or_([
                    'Payments.driver_payment_amount >' => 0
                ]);
            });



        if ($driver !== null) {
            $query->where(['Bookings.driver' => $driver]);
        }







        $bookings = $this->paginate($query);
        $this->set(compact('bookings'));
    }

    public function driverduepaymentreport()
    {
        $bookingObj = TableRegistry::getTableLocator()->get('Bookings');



        $from_date = $this->request->getData('start_date');
        $to_date = $this->request->getData('end_date');
        $driver = $this->request->getData('driver');

        $query = $bookingObj->find()
            ->where([

                'Bookings.entry_date >=' => $from_date,
                'Bookings.entry_date <=' => $to_date
            ])
            ->leftJoinWith('Payments', function ($q) {
                return $q;
            })
            ->where(function ($exp, $q) {
                return $exp->or_([
                    'Payments.bookings_id IS' => null,
                    'Payments.driver_payment_amount' => 0
                ]);
            });

        if ($driver !== null) {
            $query->where(['Bookings.driver' => $driver]);
        }



        $this->paginate = [
            'contain' => ['UpdatedPipes', 'UpdatedTanks', 'UpdatedChambers', 'Users', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes']
        ];



        $bookings = $this->paginate($query);
        $this->set(compact('bookings'));
    }


    public function program()
    {
        $userObj = TableRegistry::getTableLocator()->get('Users');
        $program = $userObj->find()->where(['is_deleted' => 0, 'is_active' => 1, 'user_type' => 2]);


        $this->set(compact('program'));
    }

    public function gst()
    {
        $userObj = TableRegistry::getTableLocator()->get('Users');
        $program = $userObj->find()->where(['is_deleted' => 0, 'is_active' => 1, 'user_type' => 2]);


        $this->set(compact('program'));
    }
    public function gstdetails()
    {
        $bookingObj = TableRegistry::getTableLocator()->get('Bookings');



        $from_date = $this->request->getData('start_date');
        $to_date = $this->request->getData('end_date');
        $branch = $this->request->getData('branch');

        $query = $bookingObj->find()->contain(['Users', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes'])
            ->where([
                'entry_date >=' => $from_date,
                'entry_date <=' => $to_date,
            ]);

        if ($branch !== null) {
            $query->andWhere(['user_id' => $branch]);
        }





        $bookings = $query;
        $this->set(compact('bookings'));
    }

    public function programdetails()
    {
        $bookingObj = TableRegistry::getTableLocator()->get('Bookings');



        $from_date = $this->request->getData('start_date');
        $to_date = $this->request->getData('end_date');
        $branch = $this->request->getData('branch');

        $query = $bookingObj->find()
            ->where([
                'entry_date >=' => $from_date,
                'entry_date <=' => $to_date,
            ]);

        if ($branch !== null) {
            $query->andWhere(['user_id' => $branch]);
        }

        $this->paginate = [
            'contain' => ['UpdatedPipes', 'UpdatedTanks', 'UpdatedChambers', 'Users', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes']
        ];



        $bookings = $this->paginate($query);
        $this->set(compact('bookings'));
    }
}
