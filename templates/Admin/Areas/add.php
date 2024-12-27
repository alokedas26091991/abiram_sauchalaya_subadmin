<div class="main-content">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3">
                                <?= $this->Form->create($area, ['class' => 'form-horizontal', 'type' => 'file']); ?>
                                <div class="form-body">
                                    <h4 class="form-section"> <?= $this->Html->link(__('Police Station'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('State') ?>
                                        </label>
                                        <div class="col-sm-9">
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
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('District') ?>
                                        </label>
                                        <div class="col-sm-9">
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
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Police Station') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->input('name', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="is_active" class="col-md-3 label-control"><?= __('Status') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->input('is_active', ['type' => 'checkbox', 'checked' => $area->is_active == 1, 'class' => 'onoffswitch-checkbox']); ?>
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