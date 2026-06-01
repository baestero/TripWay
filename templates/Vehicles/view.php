<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Veículo'), ['action' => 'edit', $vehicle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Veículo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Veículo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vehicles view content">
            <h3><?= h($vehicle->license_plate) ?></h3>
            <table>
                <tr>
                    <th><?= __('Motorista:') ?></th>
                    <td><?= $vehicle->has('driver') ? $this->Html->link($vehicle->driver->name, ['controller' => 'Drivers', 'action' => 'view', $vehicle->driver->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Placa:') ?></th>
                    <td><?= h($vehicle->license_plate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modelo:') ?></th>
                    <td><?= h($vehicle->model) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marca:') ?></th>
                    <td><?= h($vehicle->brand) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status:') ?></th>
                    <td><?= h($vehicle->status === 'active' ? 'Ativo' : 'Inativo') ?></td>
                </tr>
                <tr>
                    <th><?= __('Código:') ?></th>
                    <td><?= $this->Number->format($vehicle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ano:') ?></th>
                    <td><?= h($vehicle->year) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Viagens Relacionadas:') ?></h4>
                <?php if (!empty($vehicle->trips)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Código') ?></th>
                                <th><?= __('Cidade de Origem') ?></th>
                                <th><?= __('Estaod de  Origem') ?></th>
                                <th><?= __('Cidade de Destino') ?></th>
                                <th><?= __('Estado de Destino') ?></th>
                                <th><?= __('Iniciada') ?></th>
                                <th><?= __('Finalizada') ?></th>
                                <th><?= __('Status') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($vehicle->trips as $trips) : ?>
                                <tr>
                                    <td><?= h($trips->id) ?></td>
                                    <td><?= h($trips->origin_city) ?></td>
                                    <td><?= h($trips->origin_state) ?></td>
                                    <td><?= h($trips->destination_city) ?></td>
                                    <td><?= h($trips->destination_state) ?></td>
                                    <td><?= h($trips->start_at) ?></td>
                                    <td><?= h($trips->finished_at) ?></td>
                                    <td><?= h($trips->status === 'active' ? 'em andamento' : 'encerrada') ?></td>
                                    <td class="actions">
                                    <td class="actions">
                                        <?= $this->Html->link(__('Visualizar'), ['controller' => 'Trips', 'action' => 'Visualizar', $trips->id]) ?>
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