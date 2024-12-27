<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\District $district
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit District'), ['action' => 'edit', $district->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete District'), ['action' => 'delete', $district->id], ['confirm' => __('Are you sure you want to delete # {0}?', $district->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Districts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New District'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="districts view content">
            <h3><?= h($district->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= $district->has('state') ? $this->Html->link($district->state->name, ['controller' => 'States', 'action' => 'view', $district->state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($district->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($district->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($district->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($district->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $district->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $district->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Areas') ?></h4>
                <?php if (!empty($district->areas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('State Id') ?></th>
                            <th><?= __('District Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($district->areas as $areas) : ?>
                        <tr>
                            <td><?= h($areas->id) ?></td>
                            <td><?= h($areas->state_id) ?></td>
                            <td><?= h($areas->district_id) ?></td>
                            <td><?= h($areas->name) ?></td>
                            <td><?= h($areas->is_active) ?></td>
                            <td><?= h($areas->is_deleted) ?></td>
                            <td><?= h($areas->created_at) ?></td>
                            <td><?= h($areas->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Areas', 'action' => 'view', $areas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Areas', 'action' => 'edit', $areas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Areas', 'action' => 'delete', $areas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areas->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Post Offices') ?></h4>
                <?php if (!empty($district->post_offices)) : ?>
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
                        <?php foreach ($district->post_offices as $postOffices) : ?>
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
        </div>
    </div>
</div>
