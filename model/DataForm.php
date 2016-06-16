<?php
namespace app\model;


class DataForm extends \yii\base\Model {

    /**
     * @var array
     */
    public $data = [];

    /**
     * @return mixed
     */
    public function getResult() {
        return min($this->getDifferences());
    }

    /**
     * @return int
     */
    private function getMaxDelimiter() {
        if (!empty($this->data)) {
            return count($this->data) - 1;
        }
        return 0;
    }

    /**
     * @return array
     */
    private function getDifferences() {
        $differences = [];
        $delimiter = $this->getMaxDelimiter();
        for ($i = 1; $i <= $delimiter; $i++) {
            $chunk0 = array_slice($this->data, 0, $i);
            $chunk1 = array_slice($this->data, $i, $delimiter + 1);
            $sum0 = array_sum($chunk0);
            $sum1 = array_sum($chunk1);
            $differences[$i] = abs($sum0 - $sum1);
        }
        return $differences;
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            ['data', 'each', 'rule' => ['integer']],
            ['data', 'validateMinMax']
        ];
    }

    /**
     * @return bool
     */
    public function beforeValidate() {
        foreach ($this->data as $key => $value) {
            if ($value == "") {
                $this->data[$key] = 0;
            }
        }
        return parent::beforeValidate();
    }

    /**
     * @param $attribute
     * @param $params
     */
    public function validateMinMax($attribute, $params) {
        foreach ($this->data as $value) {
            if ($value < -1000 || $value > 1000) {
                $this->addError($attribute, 'Values should be between -1000 and 1000');
            }
        }
    }


}