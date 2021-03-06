<?php

/**
 * This is the model class for table "ac_commission".
 *
 * The followings are the available columns in table 'ac_commission':
 * @property integer $id
 * @property integer $portal_id
 * @property string $decree
 * @property string $regulation
 */
class AcCommission extends BaseActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ac_commission';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('portal_id', 'numerical', 'integerOnly'=>true),
			array('decree, regulation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, portal_id, decree, regulation', 'safe', 'on'=>'search'),
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
			'portal_id' => 'Портал',
			'decree' => 'Указ Губернатора Томской области о Комиссии по соблюдению требований к служебному поведению государственных гражданских служащих Томской области и урегулированию конфликта интересов',
			'regulation' => 'Положение',
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
		$criteria->compare('portal_id',$this->portal_id);
		$criteria->compare('decree',$this->decree,true);
		$criteria->compare('regulation',$this->regulation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AcCommission the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
