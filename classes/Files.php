<?php

class Files
{
    public $src = './uploads';
    public $tmp;
    public $type;
    public $fileName;
    public $uploadFile;

    /**
     * @param $file_name
     * @param $tmp_name
     */
    public function upload($file_name, $tmp_name)
    {
        $this->fileName = $file_name;
        $this->tmp = $tmp_name;
        $this->uploadFile = $this->src . basename($file_name);
    }

    public function uploadFile()
    {
        if (move_uploaded_file($this->tmp, $this->uploadFile)) {
            return true;
        }
        return false;
    }
}