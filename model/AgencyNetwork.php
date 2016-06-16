<?php

namespace app\model;

use Yii;

/**
 * This is the model class for table "agency_network".
 *
 * @property integer $agency_network_id
 * @property string $agency_network_name
 */
class AgencyNetwork extends \yii\db\ActiveRecord
{

    public function getAgencies() {
        return $this->hasMany(Agency::className(), ['agency_id' => 'agency_id']);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_network';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_network_name'], 'required'],
            [['agency_network_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'agency_network_id' => 'Agency Network ID',
            'agency_network_name' => 'Agency Network Name',
        ];
    }
}
