<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Planes Model
 *
 * @property \App\Model\Table\ReservationsTable&\Cake\ORM\Association\BelongsToMany $Reservations
 *
 * @method \App\Model\Entity\Plane newEmptyEntity()
 * @method \App\Model\Entity\Plane newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Plane[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plane get($primaryKey, $options = [])
 * @method \App\Model\Entity\Plane findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Plane patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Plane[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plane|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plane saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plane[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Plane[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Plane[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Plane[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlanesTable extends Table
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

        $this->setTable('planes');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Reservations', [
            'foreignKey' => 'plane_id',
            'targetForeignKey' => 'reservation_id',
            'joinTable' => 'planes_reservations',
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
            ->scalar('title')
            ->maxLength('title', 191)
            ->allowEmptyString('title')
            ->add('title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('seats')
            ->requirePresence('seats', 'create')
            ->notEmptyString('seats');

        $validator
            ->scalar('details')
            ->maxLength('details', 255)
            ->allowEmptyString('details');

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
        $rules->add($rules->isUnique(['title'], ['allowMultipleNulls' => true]), ['errorField' => 'title']);

        return $rules;
    }
}
