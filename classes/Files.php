<?php

class Files
{
    public $src = './uploads/';
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
        // TODO add id to change where the upload goes e.g... /uploads/products/{id}/image.png
        $this->uploadFile = $this->src . basename($file_name);
        move_uploaded_file($this->tmp, $this->uploadFile);
    }

    private function optimize($fileName)
    {
        //TODO add an optimizer to reduce space used on server either ImageMagick or paid web service for more support
    }

}