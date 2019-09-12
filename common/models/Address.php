<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "addreses".
 *
 * @property string $customer_login
 * @property string $post_index
 * @property string $country
 * @property string $city
 * @property int $street
 * @property string $house
 * @property string $appartament
 *
 * @property Customer $customerLogin
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addreses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_login', 'post_index', 'country', 'city', 'street', 'house','street'], 'required'],
            [['customer_login'], 'string', 'max' => 50],
            [['post_index'], 'number'],
            [['post_index'], 'string', 'max' => 12],
            [['country'], 'match', 'pattern' => '/[A-Z]{2}$/', 'message' => 'Field must contain exactly 2 uppercase letters.'],
            [['city'], 'string', 'max' => 100],
            [['house', 'appartament'], 'string', 'max' => 4],
           // [['customer_login'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_login' => 'login']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_login' => Yii::t('app', 'Customer Login'),
            'post_index' => Yii::t('app', 'Post Index'),
            'country' => Yii::t('app', 'Country'),
            'city' => Yii::t('app', 'City'),
            'street' => Yii::t('app', 'Street'),
            'house' => Yii::t('app', 'House'),
            'appartament' => Yii::t('app', 'Appartament'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerLogin()
    {
        return $this->hasOne(Customer::className(), ['login' => 'customer_login']);
    }
}
