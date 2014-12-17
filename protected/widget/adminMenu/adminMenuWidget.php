<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminMenuWidget
 *
 * @author Рой
 */
class adminMenuWidget extends widgetClass{
    
    public function index(){
        
        $adminMenu = array(
            1 => array(
                'title' => 'Материалы',
                'link' => 'page'
            ),
            2 => array(
                'title' => 'Типы материалов',
                'link' => 'pageType'
            ),
            3 => array(
                'title' => 'Блоки',
                'link' => 'block'
            ),
            4 => array(
                'title' => 'Поля',
                'link' => 'field'
            ),
            5 => array(
                'title' => 'Фильтры изображения',
                'link' => 'imageFilter'
            ),
            6 => array(
                'title' => 'Настройки',
                'link' => 'options'
            )
        );
        
        
        $this->render('_menu', array('adminMenu' => $adminMenu));
    }
    
}
