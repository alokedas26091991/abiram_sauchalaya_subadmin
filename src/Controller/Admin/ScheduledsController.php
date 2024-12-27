<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScheduledsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $schedule = TableRegistry::getTableLocator()->get('Bookings');
        $this->paginate = [
            'contain' => ['Users', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes'],
        ];
        $twoDaysAgo = date('Y-m-d H:i:s', strtotime('-2 days'));
        $query = $schedule->find('all')
            ->where(function ($exp, $q) use ($twoDaysAgo) {
                return $exp->gte('entry_date', $twoDaysAgo);
            });
        if ($this->Auth->user('id') != 1) {
            $query = $query->where(['user_id' => $this->Auth->user('id')]);
        }
        $bookings = $this->paginate($query);
        $this->set(compact('bookings'));
}

}
