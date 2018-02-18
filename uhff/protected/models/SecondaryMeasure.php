<?php

/**
 * This is the model class for table "secondary_measure".
 *
 * The followings are the available columns in table 'secondary_measure':
 * @property integer $id
 * @property string $name
 * @property double $portion
 * @property integer $measure_units_id
 *
 * The followings are the available model relations:
 * @property ProductPriceByStore[] $productPriceByStores
 * @property MeasureUnits $measureUnits
 */
class SecondaryMeasure extends CActiveRecord
{
	public $measureUnit_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'secondary_measure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, portion, measure_units_id', 'required'),
			array('measure_units_id', 'numerical', 'integerOnly'=>true),
			array('portion', 'numerical'),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, portion, measure_units_id, measureUnit_search', 'safe', 'on'=>'search'),
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
			'productPriceByStores' => array(self::HAS_MANY, 'ProductPriceByStore', 'secondary_measure_id'),
			'measureUnits' => array(self::BELONGS_TO, 'MeasureUnits', 'measure_units_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nombre',
			'portion' => 'Porción',
			'measure_units_id' => 'Unidad de medida',
			'measureUnit_search' => 'Unidad de medida',
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
		$criteria->with = array('measureUnits');
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('portion',$this->portion);
		$criteria->compare('measure_units_id',$this->measure_units_id);
		$criteria->compare('measureUnits.name',$this->measureUnit_search, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'t.id ASC',
				'attributes'=>array(
		            'measureUnit_search'=>array(
		                'asc'=>'measureUnits.name',
		                'desc'=>'measureUnits.name DESC',
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
	 * @return SecondaryMeasure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
