<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookings view content">
            <h3><?= h($booking->first_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $booking->has('user') ? $this->Html->link($booking->user->id, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($booking->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($booking->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact No') ?></th>
                    <td><?= h($booking->contact_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Whatsapp No') ?></th>
                    <td><?= h($booking->whatsapp_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= $booking->has('state') ? $this->Html->link($booking->state->name, ['controller' => 'States', 'action' => 'view', $booking->state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('District') ?></th>
                    <td><?= $booking->has('district') ? $this->Html->link($booking->district->name, ['controller' => 'Districts', 'action' => 'view', $booking->district->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Area') ?></th>
                    <td><?= $booking->has('area') ? $this->Html->link($booking->area->name, ['controller' => 'Areas', 'action' => 'view', $booking->area->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Post Office') ?></th>
                    <td><?= $booking->has('post_office') ? $this->Html->link($booking->post_office->name, ['controller' => 'PostOffices', 'action' => 'view', $booking->post_office->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Chamber') ?></th>
                    <td><?= $booking->has('chamber') ? $this->Html->link($booking->chamber->name, ['controller' => 'Chambers', 'action' => 'view', $booking->chamber->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tank') ?></th>
                    <td><?= $booking->has('tank') ? $this->Html->link($booking->tank->name, ['controller' => 'Tanks', 'action' => 'view', $booking->tank->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pipe') ?></th>
                    <td><?= $booking->has('pipe') ? $this->Html->link($booking->pipe->name, ['controller' => 'Pipes', 'action' => 'view', $booking->pipe->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Receive By') ?></th>
                    <td><?= h($booking->payment_receive_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($booking->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= $this->Number->format($booking->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($booking->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle No') ?></th>
                    <td><?= $booking->vehicle_no === null ? '' : $this->Number->format($booking->vehicle_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Driver') ?></th>
                    <td><?= $booking->driver === null ? '' : $this->Number->format($booking->driver) ?></td>
                </tr>
                <tr>
                    <th><?= __('Helper1') ?></th>
                    <td><?= $booking->helper1 === null ? '' : $this->Number->format($booking->helper1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Helper2') ?></th>
                    <td><?= $booking->helper2 === null ? '' : $this->Number->format($booking->helper2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($booking->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Amount') ?></th>
                    <td><?= $booking->payment_amount === null ? '' : $this->Number->format($booking->payment_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Receive By Id') ?></th>
                    <td><?= $booking->payment_receive_by_id === null ? '' : $this->Number->format($booking->payment_receive_by_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Work Date') ?></th>
                    <td><?= h($booking->work_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Work Time') ?></th>
                    <td><?= h($booking->work_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Date') ?></th>
                    <td><?= h($booking->payment_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($booking->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($booking->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Entry Date') ?></th>
                    <td><?= h($booking->entry_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $booking->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($booking->address)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Remarks') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($booking->remarks)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Payment Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($booking->payment_note)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
