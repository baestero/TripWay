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
            <?= $this->Html->link(__('Listar Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients form content">
            <?= $this->Form->create($client) ?>
            <fieldset>
                <legend><?= __('Cadastrar Cliente') ?></legend>
                <?php
                echo $this->Form->control('name', ['label' => 'Nome:']);
                echo $this->Form->control('phone', ['label' => 'Celular:']);
                echo $this->Form->control('document', ['label' => 'Documento:']);
                echo $this->Form->control('zip_code', ['label' => 'CEP:']);
                echo $this->Form->control('street', ['label' => 'Rua:']);
                echo $this->Form->control('number', ['label' => 'Número:']);
                echo $this->Form->control('city', ['label' => 'Cidade:']);
                echo $this->Form->control('state', ['label' => 'Estado:']);
                echo $this->Form->control('status', [
                    'label' => 'Status:',
                    'type' => 'select',
                    'options' => [
                        'active' => 'Ativo',
                        'inactive' => 'Inativo'
                    ]
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cadastrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>