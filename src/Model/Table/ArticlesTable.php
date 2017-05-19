<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticlesTable extends Table
{

/************
public function findPublished(Query $query, array $options)
{
  $query = $addresses->find('all')->contain(['Users']);
  foreach ($query as $address)
  {
    echo $address->user->username;
  }
}
************/
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
      /***************  $this->belongsTo('Users')
        ->setForeignKey('user_id')
        ->setJoinType('INNER'); *****************/
        $this->setTable('articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
  /**********    $validator
      ->integer($this->Auth->user('id'))
      ->allowEmpty('user_id', 'create');
************/
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->dateTime('creation_date')
            ->requirePresence('creation_date', 'create')
            ->notEmpty('creation_date');

      /*  $validator
            ->requirePresence('media', 'create')
            ->notEmpty('media');
*/
        return $validator;
    }
}
