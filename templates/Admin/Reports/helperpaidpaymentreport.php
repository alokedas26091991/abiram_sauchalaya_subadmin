<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Helper Paid Payment List</h2>
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
                                        <th>Helper</th>
                                        <th>Type</th>
                                        <th>Driver</th>
                                        <th>Branch</th>

                                        <th>Contact No</th>

                                        <th>Chamber</th>
                                        <th>Tank</th>
                                        <th>Pipe</th>
                                        <th>Amount</th>
                                        <th>Helper Paid Amount</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 1;

                                    foreach ($bookings as $booking) :


                                        $helperName = null;
                                        if (!empty($booking->helper1) && $booking->helper1->id == $driver) {
                                            $helperName = $booking->helper1->name;
                                            $type = 1;
                                            $paid_amount = $booking->payment->helper1_payment_amount;
                                        } elseif (!empty($booking->helper2) && $booking->helper2->id == $driver) {
                                            $helperName = $booking->helper2->name;
                                            $type = 2;
                                            $paid_amount = $booking->payment->helper2_payment_amount;
                                        }

                                    ?>
                                        <?php
                                        if ($paid_amount) {
                                        ?>
                                            <tr>
                                                <td><?= $k++ ?></td>
                                                <td><?= $helperName ?></td>
                                                <td><?= $type == 1 ? "Helper1" : "Helper2" ?></td>
                                                <td><?= h($booking->driver->name) ?></td>
                                                <td><?= $booking->has('user') ? h($booking->user->name) : '' ?></td>

                                                <td><?= h($booking->contact_no) ?></td>

                                                <td><?= $booking->has('chamber') ? h($booking->chamber->name) : '' ?></td>
                                                <td><?= $booking->has('tank') ? h($booking->tank->name) : '' ?></td>
                                                <td><?= $booking->has('pipe') ? h($booking->pipe->name) : '' ?></td>
                                                <td><?= h($booking->amount) ?></td>
                                                <td><?= $paid_amount ?></td>



                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>


                            <?= $this->Form->end() ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>