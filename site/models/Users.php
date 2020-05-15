<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $balance
 * @property string $ipurchassed
 * @property string $ip
 * @property string $lastlogin
 * @property string $datereg
 * @property string $resseller
 * @property string $img
 * @property string $testemail
 * @property string $resetpin
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $repassword;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password','repassword', 'email'], 'required'],
            [['username', 'password'], 'string', 'max' => 100],
            [ 'email' ,'email'],
            ['password', 'compare', 'compareAttribute' => 'repassword'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'balance' => 'Balance',
            'authKey' => 'authKey',
            'accessToken' => 'accessToken',
            /*
            'ipurchassed' => 'Ipurchassed',
            'ip' => 'Ip',
            'lastlogin' => 'Lastlogin',
            'datereg' => 'Datereg',
            'resseller' => 'Resseller',
            'img' => 'Img',
            'testemail' => 'Testemail',
            'resetpin' => 'Resetpin',
            'admin'=>'admin',
            */
        ];
    }


    //*********************

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)//
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['accessToken'=> $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username'=> $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

}
