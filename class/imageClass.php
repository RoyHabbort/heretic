<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imageClass
 *
 * @author Рой
 */
class imageClass {
    
    /*
    
    public function addImage($file, $width = 340){
        if (!empty($_FILES[$file]["name"])){
            $image = $this->uploadFrontImage($file, $width);
            if ($image) return $image;
                else return array('error' =>"9");
        }
        
    }
    
    public function uploadFrontImage($file, $width=340){
        
        $imageinfo = getimagesize($_FILES[$file]['tmp_name']);
        if (($imageinfo['mime'] != 'image/png')&&($imageinfo['mime'] != 'image/jpg')&&($imageinfo['mime'] != 'image/jpeg')){
            return false;
        }
        
        $image_new = $this->imageResize($_FILES[$file]['tmp_name'], $width);
        
        $image_thumb = $this->imageResize($_FILES[$file]['tmp_name'], 230);
        
        $prefix = uniqid();
        $fileName = $prefix . '.jpg';
        $uploaddir = heretic::$_path['images_thumb'];
        $uploadfile =  $uploaddir . $fileName;
        if (imagejpeg($image_thumb, $uploadfile, 100)){
            $uploaddir = heretic::$_path['front_images'];
            $uploadfile =  $uploaddir . $fileName;
        
            if (imagejpeg($image_new, $uploadfile, 90)) {
                //$this->wetermark($uploadfile);
                return $fileName;
            }else return false;
        }else return false;
        
    }
    
    */
    
//    public function uploadGallery($file){
//        
//        $imageinfo = getimagesize($_FILES[$file]['tmp_name']);
//        if (($imageinfo['mime'] != 'image/png')&&($imageinfo['mime'] != 'image/jpg')&&($imageinfo['mime'] != 'image/jpeg')){
//            return false;
//        }
//        
//        $image_new = $this->imageResize($_FILES[$file]['tmp_name'], 1024);
//        $image_thumb = $this->imageResize($_FILES[$file]['tmp_name'], 100, 100);
//        
//        $prefix = uniqid();
//        $fileName = $prefix . '_' . basename($_FILES[$file]['name']);
//        $uploaddir = heretic::$_path['images_thumb'];
//        $uploadfile =  $uploaddir . $fileName;
//        if (imagejpeg($image_thumb, $uploadfile, 100)){
//            $uploaddir = heretic::$_path['big_image'];
//            $uploadfile =  $uploaddir . $fileName;
//        
//            if (imagejpeg($image_new, $uploadfile, 90)) return $fileName;
//                else return false;
//        }else return false;
//        
//    }
    
    /*
    
    private function imageResize($image, $new_width = 0, $new_height = 0){
        list($width, $height) = getimagesize($image);
        
        if($width < $new_width){
            $new_width = $width;
            $new_height = $height;
        }
        
        if (!$new_height){
            $ratio = $new_width/$width;
            $new_height = round($height * $ratio); 
        }else{
            
        }
        
        $image_new = imagecreatetruecolor($new_width, $new_height);
        $image_old = imagecreatefromjpeg($image);
        imagecopyresampled($image_new, $image_old, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        return $image_new;
        
    }
    
    
    private function wetermark($image){
        list($width, $height) = getimagesize($image);
        
        $stamp = imagecreatefrompng('assets/images/watermark.png');
        $image_old = imagecreatefromjpeg($image);
        imagecopyresampled($image_old, $stamp, 0, 0, 0, 0, 148, 40, 148, 40);
        imagejpeg($image_old, $image, 100);
        
    }
    
    */
    
    
    
    
    
    private function confirmDir($dir){
        if(!file_exists($dir)){
            mkdir($dir, 0777);
            chmod($dir, 0777);
        }
    }
    
    /*
     * 17-10-2014
     * Загрузака jpg
     * roy
     */
    
    
    public function uploadJpg($file, $width = 0, $height = 0, $dir = 'all', $fileName){
        
        $image = $_FILES[$file];
        
        $imageNew = $this->resizeJpg($image['tmp_name'], $width, $height);
        
        $uploaddir = heretic::$_path['images'] . $dir . '/';
        
        $this->confirmDir($uploaddir);
        
        $uploadfile =  $uploaddir . $fileName;
        if (imagejpeg($imageNew, $uploadfile, 90)){
            return true;
        }else{
            return false;
        }
        
    }
    
    
    private function resizeJpg($image, $newWidth = 0, $newHeight = 0){
        list($oldWidth, $oldHeight) = getimagesize($image);
        
        
        if($oldWidth < $newWidth){
            $newWidth = $oldWidth;
            $newHeight = $oldHeight;
        }
        
        if (!$newHeight){
            $ratio = $newWidth/$oldWidth;
            $newHeight = round($oldHeight * $ratio); 
        }
        
        $imageNew = imagecreatetruecolor($newWidth, $newHeight);
        $imageOld = imagecreatefromjpeg($image);
        imagecopyresampled($imageNew, $imageOld, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);
        
        return $imageNew;
        
    }
    
    
    /*
     * 17-10-2014
     * Загрузка png
     * roy
     */
    
    
    public function uploadPng($file, $width = 0, $height = 0, $dir = 'all', $fileName){
        $image = $_FILES[$file];
        
        $imageNew = $this->resizePng($image['tmp_name'], $width, $height);
        
        $uploaddir = heretic::$_path['images'] . $dir . '/';
        
        $this->confirmDir($uploaddir);
        
        $uploadfile =  $uploaddir . $fileName;
        if (imagepng($imageNew, $uploadfile, 2)){
            return true;
        }else{
            return false;
        }
        
    }
    
    
    public function resizePng($image, $newWidth = 0, $newHeight = 0){
        list($oldWidth, $oldHeight) = getimagesize($image);
        
        
        if($oldWidth < $newWidth){
            $newWidth = $oldWidth;
            $newHeight = $oldHeight;
        }
        
        if (!$newHeight){
            $ratio = $newWidth/$oldWidth;
            $newHeight = round($oldHeight * $ratio); 
        }
        
        $imageNew = imagecreatetruecolor($newWidth, $newHeight);
        $imageOld = imagecreatefrompng($image);
        imagecopyresampled($imageNew, $imageOld, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);
        
        return $imageNew;
        
    }
    
    
    /*
     * 17-10-2014
     * Загрузка gif
     * roy
     */
    
    public function uploadGif($file, $width = 0, $height = 0, $dir = 'all', $fileName){
        $image = $_FILES[$file];
        
        $imageNew = $this->resizeGif($image['tmp_name'], $width, $height);
        
        $uploaddir = heretic::$_path['images'] . $dir . '/';
        
        $this->confirmDir($uploaddir);
        
        $uploadfile =  $uploaddir . $fileName;
        if (imagegif($imageNew, $uploadfile, 2)){
            return true;
        }else{
            return false;
        }
        
    }
    
    
    public function resizeGif($image, $newWidth = 0, $newHeight = 0){
        list($oldWidth, $oldHeight) = getimagesize($image);
        
        
        if($oldWidth < $newWidth){
            $newWidth = $oldWidth;
            $newHeight = $oldHeight;
        }
        
        if (!$newHeight){
            $ratio = $newWidth/$oldWidth;
            $newHeight = round($oldHeight * $ratio); 
        }
        
        $imageNew = imagecreatetruecolor($newWidth, $newHeight);
        $imageOld = imagecreatefromgif($image);
        imagecopyresampled($imageNew, $imageOld, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);
        
        return $imageNew;
        
    }
    
    
    
    
    
}
