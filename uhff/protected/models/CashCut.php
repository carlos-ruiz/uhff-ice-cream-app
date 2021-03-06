<?php

/**
 * This is the model class for table "cash_cut".
 *
 * The followings are the available columns in table 'cash_cut':
 * @property integer $id
 * @property string $datetime
 * @property double $amount
 * @property integer $users_id
 *
 * The followings are the available model relations:
 * @property Users $users
 */
class CashCut extends CActiveRecord
{
	public $user_search;
	public $store_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cash_cut';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('datetime, amount, users_id', 'required'),
			array('users_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, datetime, amount, users_id, user_search, store_search', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'users_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'datetime' => 'Fecha',
			'amount' => 'Importe',
			'users_id' => 'Usuario',
			'user_search' => 'Usuario',
			'store_search' => 'Sucursal',
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
		$criteria->with = array('user', 'user.store');
		$criteria->compare('id',$this->id);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('user.name',$this->user_search,true);
		$criteria->compare('store.name',$this->store_search,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('users_id',$this->users_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'t.id ASC',
		        'attributes'=>array(
		            'user_search'=>array(
		                'asc'=>'user.name',
		                'desc'=>'user.name DESC',
		            ),
		            'store_search'=>array(
		                'asc'=>'store.name',
		                'desc'=>'store.name DESC',
		            ),
		            '*',
		        ),
		    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CashCut the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
