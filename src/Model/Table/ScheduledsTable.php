<?php
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
class ScheduledTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Example of using BookingsTable
        $bookingsTable = TableRegistry::getTableLocator()->get('Bookings');

        // Find all bookings
        $bookings = $bookingsTable->find('all', [
            'conditions' => ['Bookings.is_deleted' => 0],
        ]);

        // Debug or process bookings
        foreach ($bookings as $booking) {
            // Perform some operation with $booking
        }
    }
}
?>
