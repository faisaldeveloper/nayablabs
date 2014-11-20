<?php

/**
 * This is the model class for table "submenu".
 *
 * The followings are the available columns in table 'submenu':
 * @property integer $id
 * @property integer $menu_id
 * @property string $name
 * @property integer $rate
 *
 * The followings are the available model relations:
 * @property Menu $menu
 * @property orderdetail[] $orderdetails
 */
class Submenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Submenu the static model class
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
		return 'submenu';
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
			array('menu_id, name, rate', 'required'),
			array('menu_id, rate', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, menu_id, name, rate', 'safe', 'on'=>'search'),
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
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
			'orderdetails' => array(self::HAS_MANY, 'Orderdetail', 'submenu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_id' => 'Menu',
			'name' => 'Name',
			'rate' => 'Rate',
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
		$criteria->compare('menu.name',$this->menu_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.rate',$this->rate);
		$criteria->with=array('menu',);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array('pageSize'=>30),//false
		));
	}
	public function selfsearch($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
        $criteria->condition="menu_id=".$id;
		$criteria->compare('t.id',$this->id);
		$criteria->compare('menu.name',$this->menu_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.rate',$this->rate);
		$criteria->with=array('menu',);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array('pageSize'=>30),//false
		));
	}
}