<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trips Model
 *
 * @property \App\Model\Table\DriversTable&\Cake\ORM\Association\BelongsTo $Drivers
 * @property \App\Model\Table\VehiclesTable&\Cake\ORM\Association\BelongsTo $Vehicles
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 *
 * @method \App\Model\Entity\Trip newEmptyEntity()
 * @method \App\Model\Entity\Trip newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Trip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trip findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Trip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trip[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trip|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trip[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trip[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trip[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TripsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('trips');
        $this->setDisplayField('origin_city');
        $this->setPrimaryKey('id');

        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('driver_id')
            ->notEmptyString('driver_id');

        $validator
            ->integer('vehicle_id')
            ->notEmptyString('vehicle_id');

        $validator
            ->integer('client_id')
            ->notEmptyString('client_id');

        $validator
            ->scalar('origin_city')
            ->maxLength('origin_city', 50)
            ->requirePresence('origin_city', 'create')
            ->notEmptyString('origin_city');

        $validator
            ->scalar('origin_state')
            ->maxLength('origin_state', 2)
            ->requirePresence('origin_state', 'create')
            ->notEmptyString('origin_state');

        $validator
            ->scalar('destination_city')
            ->maxLength('destination_city', 50)
            ->requirePresence('destination_city', 'create')
            ->notEmptyString('destination_city');

        $validator
            ->scalar('destination_state')
            ->maxLength('destination_state', 2)
            ->requirePresence('destination_state', 'create')
            ->notEmptyString('destination_state');

        $validator
            ->dateTime('start_at')
            ->notEmptyDateTime('start_at');

        $validator
            ->dateTime('finished_at')
            ->allowEmptyDateTime('finished_at');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('driver_id', 'Drivers'), ['errorField' => 'driver_id']);
        $rules->add($rules->existsIn('vehicle_id', 'Vehicles'), ['errorField' => 'vehicle_id']);
        $rules->add($rules->existsIn('client_id', 'Clients'), ['errorField' => 'client_id']);

        return $rules;
    }
}
