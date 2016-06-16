<?php

namespace app\model;

use Yii;

/**
 * This is the model class for table "agency".
 *
 * @property integer $agency_id
 * @property integer $agency_network_id
 * @property string $agency_name
 */
class Agency extends \yii\db\ActiveRecord {

    public function getAgencyNetwork() {
        return $this->hasOne(AgencyNetwork::className(), ['agency_id' => 'agency_id']);
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'agency';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['agency_network_id', 'agency_name'], 'required'],
            [['agency_network_id'], 'integer'],
            [['agency_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'agency_id' => 'Agency ID',
            'agency_network_id' => 'Agency Network ID',
            'agency_name' => 'Agency Name',
        ];
    }
}
