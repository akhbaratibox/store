<?php


namespace App\classes;


class UploadFile
{
    protected $filename;
    protected $max_filesize = 3000000;
    protected $extension;
    protected $path;

    public function getName(){
        return $this->filename;
    }

    protected function setName($file , $name=""){
        if($name==""){
            $name = pathinfo($file, PATHINFO_FILENAME);
        }
        $name = strtolower(str_replace(['-',' '], '-', $name));
        $hash = md5(microtime());
        $ext = $this->fileExtension();
        $this->filename = "{$name}-{$hash}.{$ext}";
    }

    protected function fileExtension($file){
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }

    public static function fileSize($file){
        $fileOBJ = new static();
        return $file > $fileOBJ->max_filesize ? true : false;
    }

    public static function isImage($file){
        $fileOBJ = new static();
        $ext = $fileOBJ->extension($file);
        $validExt = array('jpg','png','gif','jpeg');

        if(in_array(strtolower($ext),$validExt)){
            return false;
        }

        return true;
    }

    public function path(){
        return $this->path;
    }

    public static function move($temp_path,$folder,$file,$new_fileName){
        $fileOBJ = new static();
        $ds = DIRECTORY_SEPARATOR;

        $fileOBJ->setName($file, $new_fileName);
        $file_name = $fileOBJ->getName();

        if(!is_dir($folder)){
            mkdir($folder,0777,true);
        }
        $fileOBJ->path = "{$folder}{$ds}{$file_name}";
        $absolute_path = BASE_PATH."{$ds}public{$ds}$fileOBJ->path";

        if(move_uploaded_file($temp_path, $absolute_path)){
            return $fileOBJ;
        }

}


}
