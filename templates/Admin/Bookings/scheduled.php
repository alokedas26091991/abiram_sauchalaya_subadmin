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
                                    <h4 class="form-section"> <?= $this->Html->link(__('Scheduled'), ['action' => 'index']) ?> <?= __('Order') ?> </h4>
                                    
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control"><?= __('Work Date') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->date('work_date', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control"><?= __('Work Time') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->time('work_time', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control"><?= __('Remarks') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->input('remarks', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
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