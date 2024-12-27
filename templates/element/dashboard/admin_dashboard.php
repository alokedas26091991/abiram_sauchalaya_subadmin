<style>
    a.btn.btn-success.button.float-right.bhhhhh {
    margin-left: 35px;
}
    </style>
  
  <?php
use Cake\ORM\TableRegistry;

$booking = TableRegistry::getTableLocator()->get('Bookings');

// Get today's date
$today = date('Y-m-d');

// Fetch today's data
$booking1 = $booking->find("all", [
    "order" => ["Bookings.id" => "DESC"],
    'contain' => ['Users', 'States', 'Districts', 'Areas', 'PostOffices', 'Chambers', 'Tanks', 'Pipes']
])->where([
    'Bookings.is_deleted' => "0",
    'DATE(Bookings.entry_date) =' => $today // Filter for today's data
]);

$this->set('booking1', $booking1);
?>

  
  <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                   
                     <div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Today's Booking List</h2>
                </div>
               
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive-sm">
                            <table class="table table-striped projects">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Entry By</th>
                                        <th>Name</th>
                                        <th>Contact No</th>
                                        <th>Address</th>
                                        <th>Chamber</th>
                                        <th>Tank</th>
                                        <th>Pipe</th>
                                        <th>Amount</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 1;
                                    foreach ($booking1 as $booking) :
                                        $ab = [1 => 'Pending', 2 => 'Processing', 3 => 'Completed'];
                                        $a = $ab[$booking->status];
                                        $statusClass = '';
                                        if ($booking->status == 1) {
                                            $statusClass = 'status-onhold';
                                        } else if ($booking->status == 2) {
                                            $statusClass = 'status-processing';
                                        } else if ($booking->status == 3) {
                                            $statusClass = 'status-completed';
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $k++ ?></td>
                                            <td><?= $booking->has('user') ? h($booking->user->name) : '' ?></td>
                                            <td><?= h($booking->first_name) ?> <?= h($booking->last_name) ?></td>
                                            <td><?= h($booking->contact_no) ?></td>
                                            <td><?= $booking->post_office->name ?>, <?= $booking->area->name ?>, <?= $booking->district->name ?>, <?= $booking->state->name ?>, <?= $booking->pincode ?></td>
                                            <td><?= $booking->has('chamber') ? h($booking->chamber->name) : '' ?></td>
                                            <td><?= $booking->has('tank') ? h($booking->tank->name) : '' ?></td>
                                            <td><?= $booking->has('pipe') ? h($booking->pipe->name) : '' ?></td>
                                            <td><?= h($booking->amount) ?></td>
                                            <td>
                                                <p class="<?= h($statusClass) ?>"><?= $a ?></p>
                                            </td>
                                           
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
          
                      
                     
					
               