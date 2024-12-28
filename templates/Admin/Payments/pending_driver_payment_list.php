<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Driver Payment</h2>
                </div>
                <div class="xyz">




                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive-sm">
                            <?= $this->Form->create(null, [
                                'url' => [
                                    'controller' => 'Payments',
                                    'action' => 'add_driver_payment'
                                ]
                            ]); ?>
                            <table class="table table-striped projects" id="sampleTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Driver</th>
                                        <th>Branch</th>
                                        <th>Name</th>
                                        <th>Contact No</th>

                                        <th>Chamber</th>
                                        <th>Tank</th>
                                        <th>Pipe</th>
                                        <th>Amount</th>
                                        <th>Pay</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 1;

                                    foreach ($bookings as $booking) :




                                    ?>
                                        <tr>
                                            <td><?= $k++ ?></td>
                                            <td><?= h($booking->driver->name) ?></td>
                                            <td><?= $booking->has('user') ? h($booking->user->name) : '' ?></td>
                                            <td><?= h($booking->first_name) ?> <?= h($booking->last_name) ?></td>
                                            <td><?= h($booking->contact_no) ?></td>

                                            <td><?= $booking->has('chamber') ? h($booking->chamber->name) : '' ?></td>
                                            <td><?= $booking->has('tank') ? h($booking->tank->name) : '' ?></td>
                                            <td><?= $booking->has('pipe') ? h($booking->pipe->name) : '' ?></td>
                                            <td><?= h($booking->amount) ?></td>
                                            <td>
                                                <input type="text" class="form-control" name="id[]" value="<?= $booking->id ?>">
                                                <input type="text" class="form-control" name="pay[]">
                                            </td>


                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>

                            <?= $this->Form->end() ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>