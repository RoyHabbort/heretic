<?php

/*
 * 17-10-2014
 * Модель работы с изображениями
 * Данная модель предоставляет функции для работы с загружаемыми на сайт изображениями
 * roy
 */

class image extends modelsClass{
    
    private function getError($text){
        return array('errors' => 'Ошибка загрузки изображения. ' . $text);
    }
    
    /*
     * 17-10-2014
     * Загрузка изображения
     * roy
     */

    public function uploadImage(){
        
        if(empty($_FILES)){
            return $this->getError();
        }
        
        foreach ($_FILES as $key => $value) {
            $fName = $key;
            $fileArray = $value;
        }
        
        $fileName = str_replace('field_inner_', '', $fName);
        
        
        $sqlFilter = "SELECT * FROM `field` f
                        INNER JOIN `image_filter` imf ON imf.id_image_filter = f.image_filter
                        INNER JOIN `thumb_image_filter` tif ON tif.image_filter = imf.id_image_filter
                        INNER JOIN `medium_image_filter` mif ON mif.image_filter = imf.id_image_filter
                        INNER JOIN `full_image_filter` fif ON fif.image_filter = imf.id_image_filter
                        WHERE f.field_name = '{$fileName}'";
                        
        $imageFilter = $this->query($sqlFilter);
        $imageFilter = $imageFilter[0];
        
        $imageClass = new imageClass();
        
        $imageinfo = getimagesize($value['tmp_name']);
        
        switch ($imageinfo['mime']) {
            case 'image/jpg':
                
                $prefix = uniqid();
                $fileName = $prefix . '_' . $fileArray['name'];
                
                $imageClass->uploadJpg($fName, $imageFilter['thumb_width'], $imageFilter['thumb_height'], $imageFilter['thumb_dir'], $fileName);
                $imageClass->uploadJpg($fName, $imageFilter['medium_width'], $imageFilter['medium_height'], $imageFilter['medium_dir'], $fileName);
                $imageClass->uploadJpg($fName, $imageFilter['full_width'], $imageFilter['full_height'], $imageFilter['full_dir'], $fileName);
                
                break;
            
            case 'image/jpeg':
                
                $prefix = uniqid();
                $fileName = $prefix . '_' . $fileArray['name'];
                
                $imageClass->uploadJpg($fName, $imageFilter['thumb_width'], $imageFilter['thumb_height'], $imageFilter['thumb_dir'], $fileName);
                $imageClass->uploadJpg($fName, $imageFilter['medium_width'], $imageFilter['medium_height'], $imageFilter['medium_dir'], $fileName);
                $imageClass->uploadJpg($fName, $imageFilter['full_width'], $imageFilter['full_height'], $imageFilter['full_dir'], $fileName);
                
                break;
            
            case 'image/png':
                $prefix = uniqid();
                $fileName = $prefix . '_' . $fileArray['name'];
                
                $imageClass->uploadPng($fName, $imageFilter['thumb_width'], $imageFilter['thumb_height'], $imageFilter['thumb_dir'], $fileName);
                $imageClass->uploadPng($fName, $imageFilter['medium_width'], $imageFilter['medium_height'], $imageFilter['medium_dir'], $fileName);
                $imageClass->uploadPng($fName, $imageFilter['full_width'], $imageFilter['full_height'], $imageFilter['full_dir'], $fileName);
                
                break;
            
            case 'image/gif':
                
                $prefix = uniqid();
                $fileName = $prefix . '_' . $fileArray['name'];
                
                $imageClass->uploadGif($fName, $imageFilter['thumb_width'], $imageFilter['thumb_height'], $imageFilter['thumb_dir'], $fileName);
                $imageClass->uploadGif($fName, $imageFilter['medium_width'], $imageFilter['medium_height'], $imageFilter['medium_dir'], $fileName);
                $imageClass->uploadGif($fName, $imageFilter['full_width'], $imageFilter['full_height'], $imageFilter['full_dir'], $fileName);
                
                break;

            default:
                return $this->getError('Неправильный формат файла');
                break;
        }
        
        
        return array('file_name' => $fileName);
        
    }
    
    
    /*
     * 18-10-2014
     * Удаление изображения
     * roy
     */
    
    public function deleteImage($params){
        $params = $this->validate($params, $rules = array(
            'required' => 'id, field',
            'string' => 'id, field'
            ));
        
        if(!empty($params['valid_errors'])){
            return array('errors' => $params['valid_errors']);
        }
        
        $sql = "DELETE FROM `field_inner_{$params['field']}` WHERE `id_field_{$params['field']}` = '{$params['id']}'";
        $result = $this->query($sql);
        
        return $result;
        
    }
    
    
    
    /*
     * 22-10-2014
     * Добавление одиночного изображения
     * Roy
     */
    
    public function addOneImage(){
        
        if(empty($_FILES)){
            return $this->getError();
        }
        
        $imageClass = new imageClass();
        $imageinfo = getimagesize($_FILES['image']['tmp_name']);
        
        $prefix = uniqid();
        $fileName = $prefix . '_' . $_FILES['image']['name'];
        $fName = 'image';
        switch ($imageinfo['mime']) {
            
            case 'image/jpg':
                $imageClass->uploadJpg($fName, 1920, 1080, 'slider', $fileName);
                
                break;
            
            case 'image/jpeg':
                $imageClass->uploadJpg($fName, 1920, 1080, 'slider', $fileName);
                
                break;
            
            case 'image/png':
                $imageClass->uploadPng($fName, 1920, 1080, 'slider', $fileName);
                
                break;
            
            case 'image/gif':
                $imageClass->uploadGif($fName, 1920, 1080, 'slider', $fileName);
                
                break;

            default:
                return $this->getError('Неправильный формат файла');
                break;
            
        }
        
        return array('file_name' => $fileName);
        
    }
    
    /*
     * 22-10-2014
     * Проверка на коректный ввод изображения
     * roy
     */
    
    private function confirmImage($mime){
        
        if($mime == 'image/jpg' && $mime == 'image/jpeg' && $mime == 'image/png' && $mime == 'image/gif'){
            return true;
        }
        return false;
        
    }
    
}