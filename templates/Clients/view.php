<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Cliente'), ['action' => 'edit', $client->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Cadastrar Cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients view content">
            <h3><?= h($client->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome:') ?></th>
                    <td><?= h($client->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular:') ?></th>
                    <td><?= h($client->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Documento:') ?></th>
                    <td><?= h($client->document) ?></td>
                </tr>
                <tr>
                    <th><?= __('CEP:') ?></th>
                    <td><?= h($client->zip_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rua:') ?></th>
                    <td><?= h($client->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('Número:') ?></th>
                    <td><?= h($client->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cidade:') ?></th>
                    <td><?= h($client->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado:') ?></th>
                    <td><?= h($client->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status:') ?></th>
                    <td><?= h($client->status === 'active' ? 'Ativo' : 'Inativo') ?></td>
                </tr>
                <tr>
                    <th><?= __('Código:') ?></th>
                    <td><?= $this->Number->format($client->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Viagens Relacionadas') ?></h4>
                <?php if (!empty($client->trips)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Código') ?></th>
                                <th><?= __('Placa') ?></th>
                                <th><?= __('Modelo') ?></th>
                                <th><?= __('Marca') ?></th>
                                <th><?= __('Ano') ?></th>
                                <th><?= __('Status') ?></th>
                                <th class="actions"><?= __('Ações') ?></th>
                            </tr>
                            <?php foreach ($client->trips as $trips) : ?>
                                <tr>
                                    <td><?= h($trips->id) ?></td>
                                    <td><?= h($trips->driver_id) ?></td>
                                    <td><?= h($trips->vehicle_id) ?></td>
                                    <td><?= h($trips->client_id) ?></td>
                                    <td><?= h($trips->origin_city) ?></td>
                                    <td><?= h($trips->origin_state) ?></td>
                                    <td><?= h($trips->destination_city) ?></td>
                                    <td><?= h($trips->destination_state) ?></td>
                                    <td><?= h($trips->start_at) ?></td>
                                    <td><?= h($trips->finished_at) ?></td>
                                    <td><?= h($trips->status) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Trips', 'action' => 'view', $trips->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Trips', 'action' => 'edit', $trips->id]) ?>
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