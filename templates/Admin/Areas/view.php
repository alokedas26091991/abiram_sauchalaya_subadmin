<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Area $area
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Area'), ['action' => 'edit', $area->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Area'), ['action' => 'delete', $area->id], ['confirm' => __('Are you sure you want to delete # {0}?', $area->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Areas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Area'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="areas view content">
            <h3><?= h($area->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= $area->has('state') ? $this->Html->link($area->state->name, ['controller' => 'States', 'action' => 'view', $area->state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('District') ?></th>
                    <td><?= $area->has('district') ? $this->Html->link($area->district->name, ['controller' => 'Districts', 'action' => 'view', $area->district->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($area->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($area->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($area->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($area->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $area->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $area->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Post Offices') ?></h4>
                <?php if (!empty($area->post_offices)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('State Id') ?></th>
                            <th><?= __('District Id') ?></th>
                            <th><?= __('Area Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Pincode') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($area->post_offices as $postOffices) : ?>
                        <tr>
                            <td><?= h($postOffices->id) ?></td>
                            <td><?= h($postOffices->state_id) ?></td>
                            <td><?= h($postOffices->district_id) ?></td>
                            <td><?= h($postOffices->area_id) ?></td>
                            <td><?= h($postOffices->name) ?></td>
                            <td><?= h($postOffices->pincode) ?></td>
                            <td><?= h($postOffices->is_active) ?></td>
                            <td><?= h($postOffices->is_deleted) ?></td>
                            <td><?= h($postOffices->created_at) ?></td>
                            <td><?= h($postOffices->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PostOffices', 'action' => 'view', $postOffices->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PostOffices', 'action' => 'edit', $postOffices->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PostOffices', 'action' => 'delete', $postOffices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postOffices->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($area->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Location') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('User Type') ?></th>
                            <th><?= __('Phone No') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('State Id') ?></th>
                            <th><?= __('District') ?></th>
                            <th><?= __('Area Id') ?></th>
                            <th><?= __('Post Office Id') ?></th>
                            <th><?= __('Pincode') ?></th>
                            <th><?= __('Last Login Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($area->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->name) ?></td>
                            <td><?= h($users->location) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->user_type) ?></td>
                            <td><?= h($users->phone_no) ?></td>
                            <td><?= h($users->image) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->address) ?></td>
                            <td><?= h($users->state_id) ?></td>
                            <td><?= h($users->district) ?></td>
                            <td><?= h($users->area_id) ?></td>
                            <td><?= h($users->post_office_id) ?></td>
                            <td><?= h($users->pincode) ?></td>
                            <td><?= h($users->last_login_date) ?></td>
                            <td><?= h($users->create_date) ?></td>
                            <td><?= h($users->is_active) ?></td>
                            <td><?= h($users->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
