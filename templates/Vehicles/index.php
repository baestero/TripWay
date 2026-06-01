<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehicle> $vehicles
 */
?>
<div class="vehicles index content">
    <?= $this->Html->link(__('Cadastrar'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Veículos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Código') ?></th>
                    <th><?= $this->Paginator->sort('driver_id', 'Motorista') ?></th>
                    <th><?= $this->Paginator->sort('license_plate', 'Placa') ?></th>
                    <th><?= $this->Paginator->sort('model', 'Modelo') ?></th>
                    <th><?= $this->Paginator->sort('brand', 'Marca') ?></th>
                    <th><?= $this->Paginator->sort('year', 'Ano') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Ações',) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle): ?>
                    <tr>
                        <td><?= $this->Number->format($vehicle->id) ?></td>
                        <td><?= $vehicle->has('driver') ? $this->Html->link($vehicle->driver->name, ['controller' => 'Drivers', 'action' => 'view', $vehicle->driver->id]) : '' ?></td>
                        <td><?= h($vehicle->license_plate) ?></td>
                        <td><?= h($vehicle->model) ?></td>
                        <td><?= h($vehicle->brand) ?></td>
                        <td><?= h($vehicle->year) ?></td>
                        <td><?= h($vehicle->status === 'active' ? 'Ativo' : 'Inativo') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $vehicle->id]) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $vehicle->id]) ?>
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
            <?= $this->Paginator->next(__('próxima') . ' >') ?>
            <?= $this->Paginator->last(__('ultima') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>