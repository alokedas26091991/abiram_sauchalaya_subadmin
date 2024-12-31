<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Driver Due Payment List</h2>
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
                                        <th>Updated Chember</th>
                                        <th>Updated Tank</th>
                                        <th>Updated Pipe</th>
                                        <th>Updated Amount</th>

                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 1;
                                    foreach ($bookings as $booking) :
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
                                            <td><?= $booking->updatedchember->name ?></td>
                                            <td><?= $booking->updatedtank->name ?></td>
                                            <td><?= $booking->updatedpipe->name ?></td>
                                            <td><?= h($booking->final_amount) ?></td>

                                            <td>
                                                <p class="<?= h($statusClass) ?>"><?= $a ?></p>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>