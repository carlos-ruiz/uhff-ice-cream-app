<?php

/**
 * This is the model class for table "inventory".
 *
 * The followings are the available columns in table 'inventory':
 * @property integer $id
 * @property integer $quantity
 * @property integer $quantity_min
 * @property integer $product_price_by_store_id
 * @property integer $products_id
 * @property integer $stores_id
 *
 * The followings are the available model relations:
 * @property ProductPriceByStore $productPriceByStore
 */
class Inventory extends CActiveRecord
{

	public $product_search;
	public $product_description_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('quantity, quantity_min', 'required'),
			array('quantity, quantity_min, product_price_by_store_id, products_id, stores_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, quantity, quantity_min, product_price_by_store_id, products_id, stores_id, product_description_search, product_search', 'safe', 'on'=>'search'),
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
			'productPrice' => array(self::BELONGS_TO, 'ProductPriceByStore', 'product_price_by_store_id'),
			'product' => array(self::BELONGS_TO, 'Products', 'products_id'),
			'store' => array(self::BELONGS_TO, 'Stores', 'stores_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'quantity' => 'Cantidad',
			'product_search' => 'Producto',
			'product_description_search' => 'Descripción',
			'quantity_min' => 'Cantidad Mínima',
			'product_price_by_store_id' => 'Producto',
			'products_id' => 'Producto',
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
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('quantity_min',$this->quantity_min);
		$criteria->compare('product_price_by_store_id',$this->product_price_by_store_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}

	public function searchAdmin($store_id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('productPrice', 'productPrice.product');

		$criteria->compare('t.id',$this->id, false);
		$criteria->compare('productPrice.stores_id',$store_id, true, 'OR');
		$criteria->compare('t.stores_id',$store_id, false, 'OR');
		$criteria->compare('product.name',$this->product_search, true);
		$criteria->compare('productPrice.description',$this->product_description_search, true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('quantity_min',$this->quantity_min);
		$criteria->compare('product_price_by_store_id',$this->product_price_by_store_id);
		$criteria->compare('t.products_id',$this->products_id);
		$criteria->compare('t.stores_id',$this->stores_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
			'sort'=>array(
				'defaultOrder'=>'quantity ASC',
		        'attributes'=>array(
		            'product_search'=>array(
		                'asc'=>'product.name',
		                'desc'=>'product.name DESC',
		            ),
		            'product_description_search'=>array(
		                'asc'=>'productPrice.description',
		                'desc'=>'productPrice.description DESC',
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
	 * @return Inventory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
