<?php

/**
 * This is the model class for table "product_price_by_store".
 *
 * The followings are the available columns in table 'product_price_by_store':
 * @property integer $id
 * @property integer $stores_id
 * @property integer $products_id
 * @property string $price
 * @property string $description
 * @property integer $secondary_measure_id
 * @property double $sold_portions
 * @property integer $individual_inventory
 *
 * The followings are the available model relations:
 * @property Inventory[] $inventories
 * @property SecondaryMeasure $secondaryMeasure
 * @property Products $products
 * @property Stores $stores
 * @property Sales[] $sales
 * @property Tickets[] $tickets
 */
class ProductPriceByStore extends CActiveRecord
{
	public $product_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_price_by_store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stores_id, products_id, price, description', 'required'),
			array('stores_id, products_id, secondary_measure_id, individual_inventory', 'numerical', 'integerOnly'=>true),
			array('price, sold_portions', 'numerical'),
			array('description', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, stores_id, products_id, price, product_search, description, secondary_measure_id, sold_portions, individual_inventory', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Products', 'products_id'),
			'secondaryMeasure' => array(self::BELONGS_TO, 'SecondaryMeasure', 'secondary_measure_id'),
			'store' => array(self::BELONGS_TO, 'Stores', 'stores_id'),
			'sales' => array(self::HAS_MANY, 'Sales', 'product_price_by_store_id'),
			'tickets' => array(self::HAS_MANY, 'Tickets', 'product_price_by_store_id'),
			'inventories' => array(self::HAS_MANY, 'Inventory', 'product_price_by_store_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'stores_id' => 'Sucursal',
			'products_id' => 'Producto',
			'product_search' => 'Producto',
			'price' => 'Precio',
			'description' => 'Descripción',
			'secondary_measure_id' => 'Unidad de medida secundaria',
			'sold_portions' => 'Porciones por unidad',
			'individual_inventory' => 'Inventario individual',
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
		$criteria->compare('stores_id',$this->stores_id);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('secondary_measure_id',$this->secondary_measure_id);
		$criteria->compare('sold_portions',$this->sold_portions);
		$criteria->compare('individual_inventory',$this->individual_inventory);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchAdmin($store_id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('product');
		$criteria->compare('id',$this->id);
		$criteria->compare('stores_id',$store_id);
		$criteria->compare('product.name',$this->product_search, true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('secondary_measure_id',$this->secondary_measure_id);
		$criteria->compare('sold_portions',$this->sold_portions);
		$criteria->compare('individual_inventory',$this->individual_inventory);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
			'sort'=>array(
		        'attributes'=>array(
		            'product_search'=>array(
		                'asc'=>'product.name',
		                'desc'=>'product.name DESC',
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
	 * @return ProductPriceByStore the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getSecondaryMeasureUnits($product_id = 0){
		$secondaryMeasureUnits = array();
		if ($product_id > 0) {
			$product = Products::model()->findByPk($product_id);
			$secondaryMeasureUnits=$product->measureUnit->secondaryMeasures;
		}
		return CHtml::listData($secondaryMeasureUnits, 'id', 'name');
	}
}
