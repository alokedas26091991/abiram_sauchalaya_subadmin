<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Driver Paid Payment Report</h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->create(null, [
                            'url' => [
                                'controller' => 'Reports',
                                'action' => 'driverpaidpaymentreport'
                            ]
                        ]); ?>

                        <div class="form-group row">
                            <label for="full_name" class="col-md-3 label-control"><?= __('Driver') ?></label>
                            <div class="col-sm-9">
                                <select name="driver" class="form-control" id="cat" required>
                                    <?php
                                    foreach ($program as $p) {
                                    ?>
                                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>











                        <div class="form-group row">
                            <label for="full_name" class="col-md-3 label-control"><?= __('Start Date') ?></label>
                            <div class="col-sm-9">
                                <input type="date" name="start_date" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="full_name" class="col-md-3 label-control"><?= __('End Date') ?></label>
                            <div class="col-sm-9">
                                <input type="date" name="end_date" class="form-control" required />
                            </div>
                        </div>



                        <?= $this->Form->button(__('Search'), ['class' => 'btn btn-success']) ?>

                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>