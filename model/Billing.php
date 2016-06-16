<?php

namespace app\model;

use Yii;

/**
 * This is the model class for table "billing".
 *
 * @property integer $billing_id
 * @property integer $agency_id
 * @property integer $user_id
 * @property string $date
 * @property double $amount
 */
class Billing extends \yii\db\ActiveRecord {

    public function getAgency() {
        return $this->hasOne(Agency::className(), ['agency_id' => 'agency_id']);
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'billing';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['agency_id', 'user_id', 'date'], 'required'],
            [['agency_id', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'billing_id' => 'Billing ID',
            'agency_id' => 'Agency ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'amount' => 'Amount',
        ];
    }
}
