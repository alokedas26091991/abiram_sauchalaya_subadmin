<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2> Payment List</h2>
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

                                        <th>Driver</th>
                                        <th>Helper 1</th>
                                        <th>Helper 2</th>
                                        <th>Branch</th>
                                        <th>Customer</th>

                                        <th>Contact No</th>

                                        <th>Chamber</th>
                                        <th>Tank</th>
                                        <th>Pipe</th>
                                        <th>Amount</th>
                                        <th>Driver Paid Amount</th>
                                        <th>Helper1 Paid Amount</th>
                                        <th>Helper2 Paid Amount</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 1;

                                    foreach ($bookings as $booking) :




                                    ?>
                                        <tr>
                                            <td><?= $k++ ?></td>
                                            <td><?= $booking->booking->driver->name ?></td>

                                            <td><?= $booking->booking->helper1->name ?></td>
                                            <td><?= $booking->booking->helper2->name ?></td>
                                            <td><?= h($booking->booking->user->name) ?></td>
                                            <td><?= h($booking->booking->first_name) ?></td>

                                            <td><?= $booking->booking->contact_no ?></td>

                                            <td><?= $booking->booking->chamber->name ?></td>
                                            <td><?= $booking->booking->tank->name ?></td>
                                            <td><?= $booking->booking->pipe->name ?></td>
                                            <td><?= $booking->booking->amount ?></td>

                                            <td><?= $booking->driver_payment_amount ?></td>
                                            <td><?= $booking->helper1_payment_amount ?></td>
                                            <td><?= $booking->helper2_payment_amount ?></td>

                                            <td class="actions">

                                                <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'paymentedit', $booking->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>

                                                <?= $this->Form->postLink('<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'deletepayment', $booking->id], ['escape' => false, 'class' => 'btn-default', 'confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?>
                                            </td>

                                        </tr>
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