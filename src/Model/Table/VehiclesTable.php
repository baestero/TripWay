<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicles Model
 *
 * @property \App\Model\Table\DriversTable&\Cake\ORM\Association\BelongsTo $Drivers
 * @property \App\Model\Table\TripsTable&\Cake\ORM\Association\HasMany $Trips
 *
 * @method \App\Model\Entity\Vehicle newEmptyEntity()
 * @method \App\Model\Entity\Vehicle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Vehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VehiclesTable extends Table
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

        $this->setTable('vehicles');
        $this->setDisplayField('license_plate');
        $this->setPrimaryKey('id');

        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'vehicle_id',
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
            ->scalar('license_plate')
            ->maxLength('license_plate', 15)
            ->requirePresence('license_plate', 'create')
            ->notEmptyString('license_plate')
            ->add('license_plate', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('model')
            ->maxLength('model', 20)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->scalar('brand')
            ->maxLength('brand', 20)
            ->requirePresence('brand', 'create')
            ->notEmptyString('brand');

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
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
        $rules->add($rules->isUnique(['license_plate']), ['errorField' => 'license_plate']);
        $rules->add($rules->existsIn('driver_id', 'Drivers'), ['errorField' => 'driver_id']);

        return $rules;
    }
}
