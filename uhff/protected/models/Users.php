<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $last_name
 * @property integer $user_roles_id
 * @property integer $stores_id
 *
 * The followings are the available model relations:
 * @property Sales[] $sales
 * @property Stores $stores
 * @property UserRoles $userRoles
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, user_roles_id, stores_id', 'required'),
			array('user_roles_id, stores_id', 'numerical', 'integerOnly'=>true),
			array('username, password, name, last_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, name, last_name, user_roles_id, stores_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sales' => array(self::HAS_MANY, 'Sales', 'users_id'),
			'store' => array(self::BELONGS_TO, 'Stores', 'stores_id'),
			'userRole' => array(self::BELONGS_TO, 'UserRoles', 'user_roles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Nombre de usuario',
			'password' => 'Contraseña',
			'name' => 'Nombre',
			'last_name' => 'Apellido',
			'user_roles_id' => 'Rol de Usuario',
			'stores_id' => 'Sucursal',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('user_roles_id',$this->user_roles_id);
		$criteria->compare('stores_id',$this->stores_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
	{
		return hash_equals($this->password, crypt($password, "uhffhelados"));
	}

	public function findByUsername($username)
	{
		return Users::model()->find(array("condition"=>"username =  '".$username."'"));
	}

	public function administratorUserames()
	{
		$adminRole = UserRoles::model()->find(array("condition"=>"role = 'administrator'"));
		$administrators = Users::model()->findAll(array("select"=>"username", "condition"=>"user_roles_id =  ".$adminRole->id));
		$usernames = array();
		foreach ($administrators as $admin) {
			array_push($usernames, $admin->username);
		}
		return $usernames;
	}
}
