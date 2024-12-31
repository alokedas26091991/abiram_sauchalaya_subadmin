<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>GST Report</h2>
                </div>
                <div class="xyz">




                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive-sm">
                            <table class="table table-striped projects" id="sampleTable">
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
                                        <th>GST Amount(18%)</th>
                                        <th>Total amount</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 1;
                                    $bookamount = 0;
                                    $gstamount = 0;
                                    $total_gst_amount = 0;
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

                                        $bookamount = $bookamount + $booking->amount;
                                        $gstamount = $gstamount + round($booking->amount * 18 / 100);
                                        $total_gst_amount = $total_gst_amount + round($booking->amount + $booking->amount * 18 / 100);

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
                                                <?php
                                                echo $gst_amount = round($booking->amount * 18 / 100);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $gst_amount = round($booking->amount + $booking->amount * 18 / 100);
                                                ?>
                                            </td>
                                            <td>
                                                <p class="<?= h($statusClass) ?>"><?= $a ?></p>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="8">total</td>
                                        <td><?= $bookamount ?></td>
                                        <td><?= $gstamount ?></td>
                                        <td><?= $total_gst_amount ?></td>
                                    </tr>
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