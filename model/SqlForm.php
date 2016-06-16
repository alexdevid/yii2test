<?php
namespace app\model;

use yii\web\UploadedFile;

class SqlForm extends \yii\base\Model {

    /**
     * @var UploadedFile
     */
    public $file;
    /**
     * @var string
     */
    public $tableName;

    /**
     * @var array
     */
    public $data;

    /**
     * @var array
     */
    public $tables = [
        'Agency',
        'AgencyNetwork',
        'Billing',
    ];

    /**
     * @return array
     */
    public function rules() {
        return [
            ['tableName', 'required'],
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'txt', 'maxSize' => 5120000000],
        ];
    }

    public function dump() {
        $this->data = $this->parseCsv($this->file->tempName);
        return $this;
    }

    /**
     * @param string $filename
     * @return array
     */
    private function parseCsv($filename) {
        $csv = $data = [];
        if (($handle = fopen($filename, "r")) !== false) {
            while (($row = fgetcsv($handle, 0, "\t")) !== false) {
                $csv[] = $row;
            }
            fclose($handle);
        }
        $columns = $csv[0];
        unset($csv[0]);
        return $csv;
    }
}