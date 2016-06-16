<?php
namespace app\model;

use yii\web\UploadedFile;

class UploadForm extends \yii\base\Model {

    const KEY_SEPARATOR = '.';

    /**
     * @var UploadedFile
     */
    public $file;

    /**
     * @var array
     */
    public $content = [];

    /**
     * @var array
     */
    public $data = [];

    /**
     * @return array
     */
    public function rules() {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt'],
        ];
    }

    /**
     * @return bool
     */
    public function upload() {
        if ($this->validate()) {
            $this->content = file($this->file->tempName);
            $this->parse();
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return $this
     */
    public function parse() {
        foreach ($this->content as $line) {
            $split = preg_split('/[=]/', $line);
            $this->assignArrayByPath($this->data, $split[0], $split[1]);
        }
        return $this;
    }

    /**
     * @param array $arr
     * @param string $path
     * @param mixed $value
     */
    function assignArrayByPath(&$arr, $path, $value) {
        $keys = explode(self::KEY_SEPARATOR, $path);
        foreach ($keys as $key) {
            $arr = &$arr[trim($key)];
        }
        $arr = preg_replace("/[;\'\s-]+/", "", $value);
    }
}