<div class="main-content">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3">
                                <?= $this->Form->create($booking, ['class' => 'form-horizontal', 'type' => 'file']); ?>
                                <div class="form-body">
                                    <h4 class="form-section"> <?= $this->Html->link(__('Booking'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
                                    <div class="row g-4">
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('First Name') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->input('first_name', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Last Name') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->input('last_name', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Address') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->input('address', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Contact Number') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->input('contact_no', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Whatsapp Number') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->input('whatsapp_no', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('State') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('state_id', [
                                                'type' => 'select',
                                                'options' => $states,
                                                'class' => 'form-control',
                                                'empty' => __('Select State'),
                                                'label' => false,
                                                'div' => false,
                                                'id' => 'state_id'
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('District') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('district_id', [
                                                'type' => 'select',
                                                'options' => $districts,
                                                'class' => 'form-control',
                                                'empty' => __('Select District'),
                                                'label' => false,
                                                'div' => false,
                                                'id' => 'district_id'
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Police Station') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('area_id', [
                                                'type' => 'select',
                                                'options' => $areas,
                                                'class' => 'form-control',
                                                'empty' => __('Select Police Station'),
                                                'label' => false,
                                                'div' => false,
                                                'id' => 'area_id'
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Gram Panchayat ') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('post_office_id', [
                                                'type' => 'select',
                                                'options' => $postOffices,
                                                'class' => 'form-control',
                                                'empty' => __('Select Gram Panchayat'),
                                                'label' => false,
                                                'div' => false,
                                                'id' => 'post_office_id'
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Enter Pincode') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->input('pincode', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false, 'id' => 'pincode']);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Chamber') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('chamber_id', [
                                                'type' => 'select',
                                                'options' => $chambers,
                                                'class' => 'form-control',
                                                'empty' => __('Select Chamber'),
                                                'label' => false,
                                                'div' => false,
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Tank') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('tank_id', [
                                                'type' => 'select',
                                                'options' => $tanks,
                                                'class' => 'form-control',
                                                'empty' => __('Select Tank'),
                                                'label' => false,
                                                'div' => false,
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Amount') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->input('amount', ['class' => 'form-control', 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="is_active" class="label-control"><?= __('Status') ?></label>
                                        <div class="abc">

                                            <select class="form-control" name="status">
                                                <option value="1" <?= $booking->status == '1' ? ' selected="selected"' : ''; ?>>Pending </option>
                                                <option value="2" <?= $booking->status == '2' ? ' selected="selected"' : ''; ?>>Processing </option>
                                                <option value="3" <?= $booking->status == '3' ? ' selected="selected"' : ''; ?>>Completed </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Work Date') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('work_date', ['class' => 'form-control', 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Work Time') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('work_time', ['class' => 'form-control', 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Vehicle No') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('vehicle_no', [
                                                'type' => 'select',
                                                'options' => $vehicle,
                                                'class' => 'form-control',
                                                'empty' => __('Select Vehicle'),
                                                'label' => false,
                                                'div' => false,
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Driver') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('driver', [
                                                'type' => 'select',
                                                'options' => $driver,
                                                'class' => 'form-control',
                                                'empty' => __('Select Driver'),
                                                'label' => false,
                                                'div' => false,
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Payment Amount') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('payment_amount', ['class' => 'form-control', 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Payment Date') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('payment_date', ['class' => 'form-control', 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label for="focusedinput" class="label-control"><?= __('Payment Receive By') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('payment_receive_by', ['class' => 'form-control', 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="focusedinput" class="label-control"><?= __('Helper 1') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('helper1', [
                                                'type' => 'select',
                                                'options' => $helper,
                                                'class' => 'form-control',
                                                'empty' => __('Select Helper 1'),
                                                'label' => false,
                                                'div' => false,
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="focusedinput" class="label-control"><?= __('Helper 2') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('helper2', [
                                                'type' => 'select',
                                                'options' => $helper,
                                                'class' => 'form-control',
                                                'empty' => __('Select Helper 2'),
                                                'label' => false,
                                                'div' => false,
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="focusedinput" class="label-control"><?= __('Remarks') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('remarks', ['class' => 'form-control', 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="focusedinput" class="label-control"><?= __('Payment Note') ?></label>
                                        <div class="abc">
                                            <?php
                                            echo $this->Form->control('payment_note', ['class' => 'form-control', 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                                        </div>
                                    </div>
                                    </div>
                                    

                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>