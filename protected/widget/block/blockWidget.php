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
    
    //отображение фотогаллереи бассейна
    public function poolPhotogallery(){
        
        $model = new page();
        $result = $model->getPageByLink('photogallery_pool');
        $this->render('_poolPhotogallery', array('result' => $result));
        
    }
    
    //отображение вакансий
    public function vacancy(){
        $model = new page();
        $result = $model->getAllMaterialForType(2);
        
        
        $this->render('_vacancy', array('result' => $result));
    }
    
    
    //отображение отзывов
    public function review(){
        
        $model = new review();
        $criteria = " `moderation` = 1 ORDER BY `date` ASC";
        $result = $model->getAll('reviews', $criteria);
        
        $this->render('_review', array('result' => $result));
    }
    
    
    //выдача формы для отзыва
    public function reviewForm(){
        $this->render('_reviewForm');
    }
    
    
    //Дублирование страницы трансфера
    public function transfer(){
        $model = new page();
        $result = $model->getPageByLink('transfer');
        $this->render('_transfer', array('result' => $result));
    }
    
    
    //Карта в контактах
    public function map(){
        $this->render('_map');
    }
    
    
    //Вывод таблицы цен номеров
    public function priceAppartament(){
        $model = new Page();
        $criteria = "`page_type` = 5 ORDER BY `sort` ASC";
        $promise = $model->getAll('page', $criteria);
        
        if(!empty($promise)&&($promise)){
            $result = array();
            
            foreach ($promise as $key => $value) {
                $result[] = $model->getPageByLink($value['link']);
            }
            
            if(!empty($result)&&($result)){
                $this->render('_priceAppartament', array('result' => $result));
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }
    
    //Вывод формы заказа конгресс холла
    public function kongress(){
        
        $this->render('_kongress', array());
    }
    
    
    
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
                $this->poolPhotogallery();
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
    
    
    
}
