<?php

/**
 * This is the model class for table "discuss".
 *
 * The followings are the available columns in table 'discuss':
 * @property integer $id
 * @property integer $portal_id
 * @property string $title
 * @property integer $date_start
 * @property integer $date_finish
 * @property integer $date_publish
 * @property string $description
 * @property integer $file
 * @property integer $executive_id
 */
class Discuss extends BaseActiveRecord
{
    public $finish = 0;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'discuss';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('date_start, date_finish, date_publish, description, executive_id', 'required'),
            array('portal_id, date_start, date_finish, date_publish, file', 'numerical', 'integerOnly' => TRUE),
            array('title', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, portal_id, title, date_start, date_finish, date_publish, description, file', 'safe', 'on' => 'search'),
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
            'executive' => array(self::BELONGS_TO, 'Executive', 'executive_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'portal_id' => 'Орган исполнительной власти',
            'title' => 'Название',
            'date_start' => 'Дата начала',
            'date_finish' => 'Дата окончания',
            'date_publish' => 'Дата публикации',
            'description' => 'Описание',
            'file' => 'Файл',
            'executive_id' => 'Орган исполнительной власти',
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
    public function search($addCriteria = null)
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('portal_id', $this->portal_id);
        $criteria->compare('title', $this->title, TRUE);
        $criteria->compare('date_start', $this->date_start);

        if ($addCriteria !== null)
            $criteria->mergeWith($addCriteria);

//        if (!$archive)
//            $criteria->addCondition('date_finish > '.time());
//        else
//            $criteria->addCondition('date_finish < '.time());

        $criteria->compare('date_publish', $this->date_publish);

        $criteria->compare('description', $this->description, TRUE);
        $criteria->compare('file', $this->file);
        $criteria->compare('executive_id', $this->executive_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Discuss the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
