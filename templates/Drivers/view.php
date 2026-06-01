<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
?>
<div class="row">
  <aside class="column">
    <div class="side-nav">
      <h4 class="heading"><?= __('Ações') ?></h4>
      <?= $this->Html->link(__('Editar Motorista'), ['action' => 'edit', $driver->id], ['class' => 'side-nav-item']) ?>
      <?= $this->Html->link(__('Listar Motoristas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
      <?= $this->Html->link(__('Cadastrar Motorista'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
    </div>
  </aside>
  <div class="column-responsive column-80">
    <div class="drivers view content">
      <h3><?= h($driver->name) ?></h3>
      <table>
        <tr>
          <th><?= __('Nome:') ?></th>
          <td><?= h($driver->name) ?></td>
        </tr>
        <tr>
          <th><?= __('CPF:') ?></th>
          <td><?= h($driver->cpf) ?></td>
        </tr>
        <tr>
          <th><?= __('Celular:') ?></th>
          <td><?= h($driver->phone) ?></td>
        </tr>
        <tr>
          <th><?= __('Status:') ?></th>
          <td><?= h($driver->status === 'active' ? 'Ativo' : 'Inativo') ?></td>
        </tr>
        <tr>
          <th><?= __('Código:') ?></th>
          <td><?= $this->Number->format($driver->id) ?></td>
        </tr>
      </table>
      <div class="related">
        <h4><?= __('Viagens Relacionadas') ?></h4>
        <?php if (!empty($driver->trips)) : ?>
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
              <?php foreach ($driver->trips as $trips) : ?>
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
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Trips', 'action' => 'view', $trips->id]) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endif; ?>
      </div>
      <div class="related">
        <h4><?= __('Veículos Relacionados') ?></h4>
        <?php if (!empty($driver->vehicles)) : ?>
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
              <?php foreach ($driver->vehicles as $vehicles) : ?>
                <tr>
                  <td><?= h($vehicles->id) ?></td>
                  <td><?= h($vehicles->license_plate) ?></td>
                  <td><?= h($vehicles->model) ?></td>
                  <td><?= h($vehicles->brand) ?></td>
                  <td><?= h($vehicles->year) ?></td>
                  <td><?= h($vehicles->status === 'active' ? 'Ativo' : 'Inativo') ?></td>
                  <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Vehicles', 'action' => 'view', $vehicles->id]) ?>
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