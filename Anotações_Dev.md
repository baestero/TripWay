# Projeto TripWay

## Criação de migrations

- Realizei a criação das migrations com os seguintes Relacionamentos

- cake bake migrations nome_da_migration (singular)
- cake migrations migrate (para executar criação das tabelas no banco)
    - Drivers
        - hasMany `vehicles`
        - hasMany `trips`
    - Vehicles
        - belongsTo `drivers`
        - hasMany `trips`
    - Clients
        - hasMany `trips`
    - Trips
        - belongsTo `drivers`
        - belongsTo `vehicles`
        - belongsTo `clients`

## Criação das Models

- Criei as models de forma automaática com
    - c`ake bake model nome_da_tabela`

## Criação dos controllers com template do cake

- A IA me sugeriu que ao invés de criar tudo na mão, o cake me disponibilizava um crud basico, para iniciar.

- cake bake all `Clients`
- cake bake all `Drivers`
- cake bake all `Vehicles`
- cake bake all `Trips`

- O comando cria `cake bake all Drivers`

### Model

    - definição da tabela drivers
    - validações (validationDefault)
    - regras de integridade (buildRules)
    - associações (hasMany, etc.)

### Controller

1. index ()

- lista todos os drivers
- com paginação

2. add()

- formulário de criação
- salva no banco

3. edit()
   -editar registro existente
4. view()

- visualizar um driver específico

5. delete()

- excluir registro

### Views (Templates)

1.index.php
2.add.php
2.edit.php
2.view.php

    | Camada         | O que gera                |
    | -------------- | ------------------------- |
    | Model          | Table + Entity            |
    | Controller     | CRUD completo             |
    | Views          | index/add/edit/view       |
    | Helpers        | forms, tabelas, paginator |
    | Base funcional | sistema CRUD pronto       |

### Routes

- Sobre as rotas o cake usa Auto Routing por conevanção - Se temos DriversController ele enetende a rota /drivers

                                                                                                                                                                        | URL               | Método    |
                                                                                                                                                                        | ----------------- | --------- |
                                                                                                                                                                        | /drivers          | index()   |
                                                                                                                                                                        | /drivers/add      | add()     |
                                                                                                                                                                        | /drivers/edit/1   | edit(1)   |
                                                                                                                                                                        | /drivers/view/1   | view(1)   |
                                                                                                                                                                        | /drivers/delete/1 | delete(1) |

    -Tudo isso sem escrever nenhuma rota manual.

## Criação do Service para Validação de regras de negócio para as trips

- Apos a criação de todos as Models, Controllers, Views, vamos para a parte de validação de regras de negócio e decidi colocar separado em um Service.

- `src/Service/TripService.php`

- Após a criação do service importei no controller

`use App\Service\TripService;`

## Regras de negócio para serem validadas

- Não permitir criar viagem com motorista ou veiculos em viagem.

- Não pode ser posível criar uma viagem com veículo ou motorista inativos

- Não permitir que a viagem finalizada seja editada

# Deploy

## Migração do banco para Postgresql

- Com a decisão tomada de tentar realizar o deploy dessa aplicação, pelos meios gratuitos disponíveis no momento, precisaria de um banco mais robusto para que eu pudesse hospedar.

- Com a migração do banco realizada, vou configurar os acessos env ao banco para o deploy.
  as migrations facilitaram bastante para utilizar o novo banco.

## Docker

- Com a necessidade de fazer o deploy no render, que foi a ferramenta que escolhi, surgiu outra necessidade, o uso de docker para poder fazer build do projeto no render.

## Dificuldades + Solução

- Após configurar docker e subir o projeto no render tive dificuldades com o erro:

    Could not find driver postgresql for connection default.%0D%0ACake\Database\Exception\MissingDriverException%0D%0A%0D%0Arender

- O problema era que o app.php tinha 'url' => env('DATABASE\*URL', null) no default, e o app_local.php gerado pelo entrypoint tinha driver + host etc. No merge os dois conflitavam e o CakePHP não conseguia inferir o driver corretamente.

- A solução foi deixar o default vazio no app.php e toda a config do banco ficando apenas no app_local.php gerado dinamicamente pelo entrypoint.

## Alteração nas Tables

- Após a criação de uma nova table de Users, identifiquei que não tinha a coluna created e modified e descobri o uso da addtimestamp()

Porem já tinha criado as migrations em produção e para corrigir criei uma nova migration adicionando o addTimestamp() para cada tabela que ainda não possuia e no codigo das tables no
initialize adicionei o código:

      ```php
     $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created_at' => 'new',
                    'updated_at' => 'always'
                ]
            ]
        ]);
      ```

- Assim não afetaria meus dados de produção e adicionaria as novas colunas created e modified

## Tela de Login

- Para criação de login iniciei criando a migration User
- Agora vou criar model e controller
  cake bake model Users & cake bake controller Users

Primeiro passo é configurar na entity Users o hash da senha

```php
  protected function _setPassword(?string $password): ?string
    {
        if (empty($password)) {
            return $password;
        }

        return (new DefaultPasswordHasher())->hash($password);
    }
```

### rotas

- Deixei padrão do cake configurar as rotas chamando pelos metodos do controller Users

### Controller Users & autenticação

- Aqui criei os metodos login e logout.

- A autenticação vou deixar por contra do plugin do cake Authentication Plugin.
  composer require cakephp/authentication

adiciona tambem no appController
$this->loadComponent('Authentication.Authentication');

adiciona o plugin em src/Application.php, em bootstrap():
verificar codigo no applications php e copiar
