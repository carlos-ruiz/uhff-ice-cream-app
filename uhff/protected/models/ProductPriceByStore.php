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
 *
 * The followings are the available model relations:
 * @property Products $products
 * @property Stores $stores
 * @property Sales[] $sales
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
			array('stores_id, products_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('price', 'length', 'max'=>45),
			array('description', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, stores_id, products_id, price, product_search', 'safe', 'on'=>'search'),
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
			'store' => array(self::BELONGS_TO, 'Stores', 'stores_id'),
			'sales' => array(self::HAS_MANY, 'Sales', 'product_price_by_store_id'),
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
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
}
