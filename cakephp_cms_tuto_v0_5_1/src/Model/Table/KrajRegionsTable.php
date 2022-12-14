<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * KrajRegions Model
 *
 * @property \App\Model\Table\ObecCitiesTable&\Cake\ORM\Association\HasMany $ObecCities
 * @property \App\Model\Table\OkresCountiesTable&\Cake\ORM\Association\HasMany $OkresCounties
 *
 * @method \App\Model\Entity\KrajRegion newEmptyEntity()
 * @method \App\Model\Entity\KrajRegion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\KrajRegion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\KrajRegion get($primaryKey, $options = [])
 * @method \App\Model\Entity\KrajRegion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\KrajRegion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\KrajRegion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\KrajRegion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KrajRegion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KrajRegion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\KrajRegion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\KrajRegion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\KrajRegion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class KrajRegionsTable extends Table
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

        $this->setTable('kraj_regions');
        $this->setDisplayField('nazev');
        $this->setPrimaryKey('id');

        $this->hasMany('ObecCities', [
            'foreignKey' => 'kraj_region_id',
        ]);
        $this->hasMany('OkresCounties', [
            'foreignKey' => 'kraj_region_id',
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
            ->maxLength('kod', 7)
            ->requirePresence('kod', 'create')
            ->notEmptyString('kod');

        $validator
            ->scalar('nazev')
            ->maxLength('nazev', 80)
            ->requirePresence('nazev', 'create')
            ->notEmptyString('nazev');

        return $validator;
    }
}
