<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Donors Model
 *
 * @method \App\Model\Entity\Donor newEmptyEntity()
 * @method \App\Model\Entity\Donor newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Donor> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Donor get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Donor findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Donor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Donor> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Donor|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Donor saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Donor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Donor>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Donor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Donor> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Donor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Donor>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Donor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Donor> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DonorsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('donors');
        $this->setDisplayField('donorName');
        $this->setPrimaryKey('donorID');
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
            ->scalar('donorName')
            ->maxLength('donorName', 50)
            ->requirePresence('donorName', 'create')
            ->notEmptyString('donorName');

        $validator
            ->scalar('nric')
            ->maxLength('nric', 12)
            ->requirePresence('nric', 'create')
            ->notEmptyString('nric');

        $validator
            ->scalar('phoneNumber')
            ->maxLength('phoneNumber', 12)
            ->requirePresence('phoneNumber', 'create')
            ->notEmptyString('phoneNumber');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('bloodType')
            ->maxLength('bloodType', 3)
            ->requirePresence('bloodType', 'create')
            ->notEmptyString('bloodType');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 255)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->scalar('age')
            ->maxLength('age', 3)
            ->requirePresence('age', 'create')
            ->notEmptyString('age');

        return $validator;
    }
}
