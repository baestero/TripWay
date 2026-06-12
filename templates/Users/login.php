<?= $this->Form->create() ?>
<div class="login-container">
  <h2>Transformando logística em inteligência.</h2>
  <h4>Acesse sua conta</h4>
</div>
<?= $this->Form->control('email', ['label' => 'Entre com seu email']) ?>

<?= $this->Form->control('password', ['label' => 'Senha']) ?>

<?= $this->Form->button('Entrar') ?>

<?= $this->Form->end() ?>