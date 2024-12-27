<div class="main-content">
	<div class="content-wrapper">
		<section id="horizontal-form-layouts">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="px-3">
								<?= $this->Form->create($user, ['class' => 'form-horizontal', 'type' => 'file']); ?>
								<div class="form-body">
									<h4 class="form-section"> <?= $this->Html->link(__('Users'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
									<div class="row g-4">
										<div class="form-group col-md-4">
											<label for="focusedinput" class="label-control" for="projectinput1">
												<?= __('Select User Type') ?>
											</label>
											<div class="abc">
												<select class="form-control" name="user_type">
													<option value="1" <?= $user->user_type == '1' ? ' selected="selected"' : ''; ?>>Admin</option>
													<option value="2" <?= $user->user_type == '2' ? ' selected="selected"' : ''; ?>>Branch</option>
													<option value="3" <?= $user->user_type == '3' ? ' selected="selected"' : ''; ?>>Driver</option>
													<option value="4" <?= $user->user_type == '4' ? ' selected="selected"' : ''; ?>>Helper</option>
													<option value="5" <?= $user->user_type == '5' ? ' selected="selected"' : ''; ?>>Employee</option>
												</select>

											</div>
										</div>
										<div class="form-group col-md-4">
											<label for="focusedinput" class="label-control" for="projectinput1">
												<?= __('Name') ?></label>
											<div class="abc">
												<?php
												echo $this->Form->input('name', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
												?>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label for="focusedinput" class="label-control" for="projectinput1">
												<?= __('Email') ?></label>
											<div class="abc">

												<?php
												echo $this->Form->input('email', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
												?>

											</div>
										</div>
										<div class="form-group col-md-4">
											<label for="focusedinput" class="label-control" for="projectinput1">
												<?= __('Phone') ?></label>
											<div class="abc">
												<?php
												echo $this->Form->input('phone_no', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
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
											<label for="focusedinput" class="label-control" for="projectinput1">
												<?= __('Pincode') ?></label>
											<div class="abc">

												<?php
												echo $this->Form->input('pincode', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
												?>
											</div>
										</div>

										<div class="form-group col-md-12">
											<label for="focusedinput" class="label-control" for="projectinput1">
												<?= __('Photo') ?></label>
											<div class="abc">
												<?php
												echo $this->Form->input('image_file', ['type' => 'file', 'class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
												?>
											</div>
										</div>
										<div class="form-group col-md-12">
											<label for="focusedinput" class="label-control" for="projectinput1">
												<?= __('Address') ?></label>
											<div class="abc">

												<?php
												echo $this->Form->textarea('address', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
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