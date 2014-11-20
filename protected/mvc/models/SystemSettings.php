<?php

/**
 * This is the model class for table "system_settings".
 *
 * The followings are the available columns in table 'system_settings':
 * @property integer $id
 * @property integer $warehouse
 * @property integer $store
 * @property integer $menu_type
 */
class SystemSettings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SystemSettings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'system_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
    //array('doadmission, dodischarge','match','pattern'=>'/^(([0-2][0-9]|3[0-1])\-(0[1-9]|1[0-2])\-([1-2][0|1|2|9][0-9][0-9]))+$/','message'=>'{attribute} has Invalid Date'),
//array('model', 'match', 'pattern'=>'/^\w+[\w+\\.]*$/', 'message'=>'{attribute} should only contain word characters and dots.'),
//array('controller', 'match', 'pattern'=>'/^\w+[\w+\\/]*$/', 'message'=>'{attribute} should only contain word characters and slashes.'),
//array('baseControllerClass', 'match', 'pattern'=>'/^[a-zA-Z_]\w*$/', 'message'=>'{attribute} should only contain word characters.'),
//array('username', 'unique'),
//array('password', 'CCompositeUniqueKeyValidator', 'keyColumns' => 'password, branch_id'),

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_type', 'required'),
			array('warehouse,recipe_calculator, store, menu_type', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, warehouse,recipe_calculator,stock_restrickted, store, menu_type', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'warehouse' => 'Warehouse',
			'store' => 'Store',
			'menu_type' => 'Menu Type',
			'stock_restrickted'=>'stock Restricted'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.warehouse',$this->warehouse);
		$criteria->compare('t.store',$this->store);
		$criteria->compare('t.menu_type',$this->menu_type);
		$criteria->with=array();
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array('pageSize'=>30),//false
		));
	}
}