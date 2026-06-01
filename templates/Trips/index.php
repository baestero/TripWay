<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Trip> $trips
 */
?>
<div class="trips index content">
    <?= $this->Html->link(__('Cadastrar'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Viagens') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Código') ?></th>
                    <th><?= $this->Paginator->sort('driver_id', 'Motorista') ?></th>
                    <th><?= $this->Paginator->sort('vehicle_id', 'Veículo') ?></th>
                    <th><?= $this->Paginator->sort('client_id', 'Cliente') ?></th>
                    <th><?= $this->Paginator->sort('origin_city', 'Cidade de Origem') ?></th>
                    <th><?= $this->Paginator->sort('origin_state', 'Estado de Origem') ?></th>
                    <th><?= $this->Paginator->sort('destination_city', 'Cidade de Destino') ?></th>
                    <th><?= $this->Paginator->sort('destination_state', 'Estado de Destino') ?></th>
                    <th><?= $this->Paginator->sort('start_at', 'Iniciada') ?></th>
                    <th><?= $this->Paginator->sort('finished_at', 'Finalizada') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trips as $trip): ?>
                    <tr>
                        <td><?= $this->Number->format($trip->id) ?></td>
                        <td><?= $trip->has('driver') ? $this->Html->link($trip->driver->name, ['controller' => 'Drivers', 'action' => 'view', $trip->driver->id]) : '' ?></td>
                        <td><?= $trip->has('vehicle') ? $this->Html->link($trip->vehicle->license_plate, ['controller' => 'Vehicles', 'action' => 'view', $trip->vehicle->id]) : '' ?></td>
                        <td><?= $trip->has('client') ? $this->Html->link($trip->client->name, ['controller' => 'Clients', 'action' => 'view', $trip->client->id]) : '' ?></td>
                        <td><?= h($trip->origin_city) ?></td>
                        <td><?= h($trip->origin_state) ?></td>
                        <td><?= h($trip->destination_city) ?></td>
                        <td><?= h($trip->destination_state) ?></td>
                        <td><?= $trip->start_at->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i') ?></td>
                        <td>
                            <?= $trip->finished_at
                                ? $trip->finished_at->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i')
                                : '' ?>
                        </td>
                        <td><?= h($trip->status === 'active' ? 'em andamento' : 'finalizada') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $trip->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trip->id]) ?>
                            <?= $this->Form->postLink(__('Encerrar'), ['action' => 'finishTrip', $trip->id], ['confirm' => __('Realmente deseja encerrar essa viagem? ', $trip->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('proxima') . ' >') ?>
            <?= $this->Paginator->last(__('ultima') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>