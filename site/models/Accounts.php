<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property int $aid
 * @property string $acctype
 * @property string $country
 * @property string $infos
 * @property float $price
 * @property int $sold
 * @property string|null $sto
 * @property string|null $dateofsold
 * @property string $date
 * @property int $uid
 * @property string|null $reported
 * @property string $sitename
 * @property string $source
 * @property string $a_username
 * @property string $a_password
 * @property string $proof_url
 * @property string|null $notes
 *
 * @property Users $u
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['acctype','stat', 'country', 'infos', 'price', 'sitename', 'source', 'a_username', 'a_password', 'proof_url'], 'required'],
            [['price'], 'number'],
            [['sitename'], 'string', 'max' => 30],
            [['infos', 'notes'], 'string', 'max' => 250],
            [['a_username', 'a_password', 'proof_url'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aid' => 'Aid',
            'acctype' => 'Acctype',
            'country' => 'Country',
            'infos' => 'Details',
            'price' => 'Price',
            'sold' => 'Sold',
            'sto' => 'Sto',
            'dateofsold' => 'Dateofsold',
            'date' => 'Date',
            'uid' => 'Uid',
            'reported' => 'Reported',
            'sitename' => 'Sitename',
            'source' => 'Source',
            'a_username' => 'A Username',
            'a_password' => 'A Password',
            'proof_url' => 'Proof Url',
            'notes' => 'Notes',
            'stat' => 'States',
        ];
    }

    /**
     * Gets query for [[U]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(Users::className(), ['uid' => 'uid']);
    }
}
