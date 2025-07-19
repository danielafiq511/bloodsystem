<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appointments Model
 *
 * @method \App\Model\Entity\Appointment newEmptyEntity()
 * @method \App\Model\Entity\Appointment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Appointment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appointment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Appointment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Appointment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Appointment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appointment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Appointment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Appointment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Appointment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Appointment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Appointment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Appointment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Appointment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Appointment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Appointment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AppointmentsTable extends Table
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

        $this->setTable('appointments');
        $this->setDisplayField('donorID');
        $this->setPrimaryKey('appointmentID');

        $this->belongsTo('Donors');
$this->belongsTo('Hospitals');

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
            ->integer('donorID')
            ->requirePresence('donorID', 'create')
            ->notEmptyString('donorID');

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
            ->scalar('gender')
            ->maxLength('gender', 255)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->scalar('age')
            ->maxLength('age', 3)
            ->requirePresence('age', 'create')
            ->notEmptyString('age');

        $validator
            ->integer('hospitalID')
            ->requirePresence('hospitalID', 'create')
            ->notEmptyString('hospitalID');

        $validator
            ->scalar('hospitalName')
            ->maxLength('hospitalName', 255)
            ->requirePresence('hospitalName', 'create')
            ->notEmptyString('hospitalName');

        $validator
            ->dateTime('dateTime')
            ->requirePresence('dateTime', 'create')
            ->notEmptyDateTime('dateTime');

        return $validator;
    }
}
