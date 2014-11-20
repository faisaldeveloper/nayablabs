<?php

/**
 * This is the model class for table "branche".
 *
 * The followings are the available columns in table 'branche':
 * @property integer $id
 * @property string $branch_address
 * @property string $branch_phone
 * @property string $branch_fax
 * @property string $branch_email
 * @property string $ntn_no
 * @property string $gst_no
 * @property integer $restaurant_id
 * @property string $active_date
 * @property string $expiry_date
 * @property string $appkey
 *
 * The followings are the available model relations:
 * @property Restaurant $restaurant
 */
class Branche extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Branche the static model class
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
		return 'branche';
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
			array('branch_address, branch_phone, branch_fax, branch_email, restaurant_id, active_date, expiry_date, appkey', 'required'),
			array('restaurant_id', 'numerical', 'integerOnly'=>true),
			array('branch_address', 'length', 'max'=>255),
			array('branch_phone, ntn_no, gst_no', 'length', 'max'=>20),
			array('branch_fax', 'length', 'max'=>30),
			array('branch_email', 'length', 'max'=>50),
			array('appkey', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, branch_address, branch_phone, branch_fax, branch_email, ntn_no, gst_no, restaurant_id, active_date, expiry_date, appkey', 'safe', 'on'=>'search'),
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
			'restaurant' => array(self::BELONGS_TO, 'Restaurant', 'restaurant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'branch_address' => 'Branch Address',
			'branch_phone' => 'Branch Phone',
			'branch_fax' => 'Branch Fax',
			'branch_email' => 'Branch Email',
			'ntn_no' => 'Ntn No',
			'gst_no' => 'Gst No',
			'restaurant_id' => 'Restaurant',
			'active_date' => 'Active Date',
			'expiry_date' => 'Expiry Date',
			'appkey' => 'Appkey',
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
		$criteria->compare('t.branch_address',$this->branch_address,true);
		$criteria->compare('t.branch_phone',$this->branch_phone,true);
		$criteria->compare('t.branch_fax',$this->branch_fax,true);
		$criteria->compare('t.branch_email',$this->branch_email,true);
		$criteria->compare('t.ntn_no',$this->ntn_no,true);
		$criteria->compare('t.gst_no',$this->gst_no,true);
		$criteria->compare('restaurant.name',$this->restaurant_id,true);
		if(!empty($this->dob)){$this->dob = date('Y-m-d',strtotime($this->dob));}
		$criteria->compare('t.active_date',$this->active_date,true);
		if(!empty($this->dob)){$this->dob = date('Y-m-d',strtotime($this->dob));}
		$criteria->compare('t.expiry_date',$this->expiry_date,true);
		$criteria->compare('t.appkey',$this->appkey,true);
		$criteria->with=array('restaurant',);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array('pageSize'=>30),//false
		));
	}
}