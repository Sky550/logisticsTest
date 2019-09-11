<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property int $sex 0-n/a 1-male 2-female
 * @property string $date
 * @property string $email
 *
 * @property Addrese[] $addrese
 */
class Customer extends \yii\db\ActiveRecord
{
    const NOT_ANSWERED = 0;
    const MALE = 1;
    const FEMALE = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'surname', 'date', 'email'], 'required'],
            [['sex'], 'integer'],
            [['date'], 'safe'],
            [['login', 'name', 'surname'], 'string', 'max' => 50],
            [['login'],'string','min' => 4],
            [['password'], 'string', 'max' => 255,'min' => 6],
            [['email'], 'string', 'max' => 254],
            [['name','surname'], 'match', 'pattern' => '/^\p{Lu}+/u', 'message' => 'Field must contain exactly 2 uppercase letters.'],
            [['email'], 'unique'],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'login' => Yii::t('app', 'Login'),
            'password' => Yii::t('app', 'Password'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'sex' => Yii::t('app', 'Sex'),
            'date' => Yii::t('app', 'Date'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasMany(Address::className(), ['customer_login' => 'login']);
    }
}
