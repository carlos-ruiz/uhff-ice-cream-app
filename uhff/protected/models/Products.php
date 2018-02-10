<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $measure_units_id
 *
 * The followings are the available model relations:
 * @property ProductPriceByStore[] $productPriceByStores
 * @property MeasureUnits $measureUnits
 */
class Products extends CActiveRecord
{
	public $abbr;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, measure_units_id', 'required'),
			array('image', 'required', 'on'=>'insert'),
			array('name', 'length', 'max'=>100),
			array('description', 'length', 'max'=>256),
			array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'on'=>'insert'),
			array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('id, measure_units_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, image, measure_units_id, abbr', 'safe', 'on'=>'search'),
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
			// 'inventories' => array(self::HAS_MANY, 'Inventory', 'products_id'),
			'productPrices' => array(self::HAS_MANY, 'ProductPriceByStore', 'products_id'),
			'measureUnit' => array(self::BELONGS_TO, 'MeasureUnits', 'measure_units_id'),
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
			'description' => 'Descripción',
			'image' => 'Imágen',
			'measure_units_id' => 'Unidad de medida',
			'abbr' => 'Unidad de medida',
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
		$criteria->with = array('measureUnit');

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('measure_units_id',$this->measure_units_id);
		$criteria->compare('measureUnit.abbr',$this->abbr, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
		        'attributes'=>array(
		            'abbr'=>array(
		                'asc'=>'measureUnit.abbr',
		                'desc'=>'measureUnit.abbr DESC',
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
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
