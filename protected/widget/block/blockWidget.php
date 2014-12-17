<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of blockWidget
 *
 * @author Рой
 */
class blockWidget extends widgetClass{
    
    
    
    //Контроллер блоков
    public function controll($params){
        
        $page = $params['page'];
        if(empty($page)){
            return false;
        }
        
        switch ($page['link']) {
            case 'howTrack':
                $this->map();
                return true;
                break;
            
            case 'reviews':
                $this->review();
                return true;
                break;
            
            case 'vacancy':
                $this->vacancy();
                return true;
                break;

            case 'photogallery':
                $this->photogallery();
                return true;
                break;
            
            case 'Price':
                $this->priceAppartament();
                return true;
                break;
            
            case 'kongress':
                $this->kongress();
                return true;
                break;
            
            default:
                return false;
                break;
        }
        
    }
    
    
    //блок stock
    public function stockMain(){
        $result = '';
        $this->render('_stockMain', array('result' => $result));
    }
    
    
    //Блок новостей
    public function news(){
        $result = '';
        $this->render('_news', array('result' => $result));
    }
    
    //Меню магазинов
    public function menuShop(){
        $result = '';
        $this->render('_menuShop', array('result' => $result));
    }
    
    //Слайдер на главной
    public function mainSlider(){
        $result = '';
        $this->render('_mainSlider', array('result' => $result));
    }
    
    
}
