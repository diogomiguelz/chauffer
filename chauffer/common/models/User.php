<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $phone_number
 * @property string|null $date_of_birth
 * @property string|null $gender
 * @property string|null $address
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class User extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const GENDER_M = 'M';
    const GENDER_F = 'F';
    const GENDER_O = 'O';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password_reset_token', 'phone_number', 'date_of_birth', 'gender', 'address', 'verification_token'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 10],
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['date_of_birth'], 'safe'],
            [['gender', 'address'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone_number'], 'string', 'max' => 20],
            ['gender', 'in', 'range' => array_keys(self::optsGender())],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'date_of_birth' => 'Date Of Birth',
            'gender' => 'Gender',
            'address' => 'Address',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }


    /**
     * column gender ENUM value labels
     * @return string[]
     */
    public static function optsGender()
    {
        return [
            self::GENDER_M => 'M',
            self::GENDER_F => 'F',
            self::GENDER_O => 'O',
        ];
    }

    /**
     * @return string
     */
    public function displayGender()
    {
        return self::optsGender()[$this->gender];
    }

    /**
     * @return bool
     */
    public function isGenderM()
    {
        return $this->gender === self::GENDER_M;
    }

    public function setGenderToM()
    {
        $this->gender = self::GENDER_M;
    }

    /**
     * @return bool
     */
    public function isGenderF()
    {
        return $this->gender === self::GENDER_F;
    }

    public function setGenderToF()
    {
        $this->gender = self::GENDER_F;
    }

    /**
     * @return bool
     */
    public function isGenderO()
    {
        return $this->gender === self::GENDER_O;
    }

    public function setGenderToO()
    {
        $this->gender = self::GENDER_O;
    }
}
