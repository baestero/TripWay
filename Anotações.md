# Projeto TripWays

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

    -Tudo isso sem você escrever nenhuma rota manual.

## Criação do Service para Validação de regras de negócio para as trips

- Apos a criação de todos as Models, Controllers, Views, vamos para a parte de validação de regras de negócio e decidi colocar separado em um Service.

- `src/Service/TripService.php`

## Após a criação do service importei no controller

`use App\Service\TripService;`

# Regras de negócio para serem validadas

## Não pode ser posível criar uma viagem com veículo ou motorista inativos

## Não permitir que a viagem finalizada seja editada
