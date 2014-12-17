<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inputWidget
 *
 * @author Рой
 */
class inputWidget extends widgetClass{
    
    
    public function index($params){
        
        switch ($params['type']) {
            
            case 'select':
                $this->render('_select', $params);
                break;
            
            case 'textarea':
                $this->render('_textarea', $params);
                break;
            
            case 'textarea-no':
                $params['no-CK'] = 1;
                $this->render('_textarea', $params);
                break;
            
            case 'text':
                $this->render('_text', $params);
                break;
            
            case 'date':
                $this->render('_date', $params);
                break;
            
            case 'image':
                $this->render('_image', $params);
                break;
            
            case 'checkbox':
                $this->render('_checkbox', $params);
                break;
            
            default:
                $this->render('_text', $params);
                break;
        }
        
    }
    
 
    /*
     * 11-12-2014
     * Поле редактирования изображений
     * roy
     */
    
    public function editImage($params){
        
        $model = new admin();
        $imageFilter = $model->getImageFilterById($params['option']['image_filter']);
        foreach ($params['result'] as $key => $value) {
            $params['result'][$key]['path'] = heretic::$_path['images'] . $imageFilter['thumb_dir'] . '/' . $value['content'];
        }
        $this->render('_editImage', array('image' => $params, 'image_filter' => $imageFilter));
        
    }
    
    
}
