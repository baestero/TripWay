<div class="drivers index content">
  <?= $this->Html->link(__('Cadastrar'), ['action' => 'add'], ['class' => 'button float-right']) ?>
  <h3><?= __('Motoristas') ?></h3>
  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th><?= $this->Paginator->sort('id', 'Código') ?></th>
          <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
          <th><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
          <th><?= $this->Paginator->sort('phone',  'Celular') ?></th>
          <th><?= $this->Paginator->sort('status',) ?></th>
          <th class="actions"><?= __('Ações') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($drivers as $driver): ?>
          <tr>
            <td><?= $this->Number->format($driver->id) ?></td>
            <td><?= h($driver->name) ?></td>
            <td><?= h($driver->cpf) ?></td>
            <td><?= h($driver->phone) ?></td>
            <td><?= h($driver->status === 'active' ? 'Ativo' : 'Inativo') ?></td>
            <td class="actions">
              <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $driver->id]) ?>
              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $driver->id]) ?>
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