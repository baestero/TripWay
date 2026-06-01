<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trips'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Trip'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trips view content">
            <h3><?= h($trip->origin_city) ?></h3>
            <table>
                <tr>
                    <th><?= __('Driver') ?></th>
                    <td><?= $trip->has('driver') ? $this->Html->link($trip->driver->name, ['controller' => 'Drivers', 'action' => 'view', $trip->driver->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle') ?></th>
                    <td><?= $trip->has('vehicle') ? $this->Html->link($trip->vehicle->license_plate, ['controller' => 'Vehicles', 'action' => 'view', $trip->vehicle->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $trip->has('client') ? $this->Html->link($trip->client->name, ['controller' => 'Clients', 'action' => 'view', $trip->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Origin City') ?></th>
                    <td><?= h($trip->origin_city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Origin State') ?></th>
                    <td><?= h($trip->origin_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Destination City') ?></th>
                    <td><?= h($trip->destination_city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Destination State') ?></th>
                    <td><?= h($trip->destination_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($trip->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($trip->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start At') ?></th>
                    <td><?= h($trip->start_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Finished At') ?></th>
                    <td><?= h($trip->finished_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
