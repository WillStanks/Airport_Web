<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ObecCities Model
 *
 * @property \App\Model\Table\KrajRegionsTable&\Cake\ORM\Association\BelongsTo $KrajRegions
 * @property \App\Model\Table\OkresCountiesTable&\Cake\ORM\Association\BelongsTo $OkresCounties
 * @property \App\Model\Table\ArticlesTable&\Cake\ORM\Association\HasMany $Articles
 *
 * @method \App\Model\Entity\ObecCity newEmptyEntity()
 * @method \App\Model\Entity\ObecCity newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ObecCity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ObecCity get($primaryKey, $options = [])
 * @method \App\Model\Entity\ObecCity findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ObecCity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ObecCity[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ObecCity|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObecCity saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObecCity[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ObecCity[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ObecCity[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ObecCity[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ObecCitiesTable extends Table
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

        $this->setTable('obec_cities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('KrajRegions', [
            'foreignKey' => 'kraj_region_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('OkresCounties', [
            'foreignKey' => 'okres_county_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'obec_city_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('kod')
            ->maxLength('kod', 11)
            ->requirePresence('kod', 'create')
            ->notEmptyString('kod');

        $validator
            ->scalar('nazev')
            ->maxLength('nazev', 80)
            ->requirePresence('nazev', 'create')
            ->notEmptyString('nazev');

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
        $rules->add($rules->existsIn(['kraj_region_id'], 'KrajRegions'), ['errorField' => 'kraj_region_id']);
        $rules->add($rules->existsIn(['okres_county_id'], 'OkresCounties'), ['errorField' => 'okres_county_id']);

        return $rules;
    }
}
