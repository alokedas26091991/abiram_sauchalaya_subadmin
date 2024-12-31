<div class="main-content">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3">
                                <?= $this->Form->create($payment, ['class' => 'form-horizontal', 'type' => 'file']); ?>
                                <div class="form-body">
                                    <h4 class="form-section"> <?= $this->Html->link(__('Payment'), ['action' => 'index']) ?> <?= __('Update') ?> </h4>

                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Driver Paid Amount') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->input('driver_payment_amount', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Helper1 Paid Amount') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->input('helper1_payment_amount', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Helper2 Paid Amount') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->input('helper2_payment_amount', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <?= $this->Form->button(__('Update'), ['class' => 'btn btn-success']) ?>
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