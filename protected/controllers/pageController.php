<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainController
 *
 * @author Рой
 */
class pageController extends controllerClass{
    
    /*
     * 10-2014
     * Установка активной страницы
     * roy
     */
    
    private function setActivePage($link){
        heretic::$active_page = $link;
    }
    
    
    /*
     * 10-2014
     * Получить шаблон данного материала
     * roy
     */
    
    private function getTemplate($page){
        
        if(!empty($page['template'])){
            
            if(!file_exists(heretic::$_path['views'].'page/'.$page['template'].'.php')){
                return false;
            }
            return $page['template'];
        }else{
            return 'page';
        }
        
    }
    
    /*
     * 10-2014
     * Вывод главной страницы
     * roy
     */
    
    public function index() { 
        heretic::setTitle('гостинично-ресторанный комплекс');
        $model = new page();
        $this->setActivePage('/');
        $result = $model->getPageByLink('about');
        $template = $this->getTemplate($result);
        
        if (!isset($_SERVER["HTTP_X_PJAX"])){
            $this->render('index', array('result' => $result, 'main' => 1));
        }else{
            $this->partialRender('index', array('result' => $result, 'main' => 1));
        }
    }
    
    /*
     * 10-2014
     * Вывод внутренних страниц
     * roy
     */
    
    public function pageList($params){
        if(empty($params)){
            errorClass::getPageError(404);
        }
        
        $model = new page();
        $page = $model->extractLink($params);
        
        if($page=='hostal'){
            $page = 'about';
        }
        
        $this->setActivePage($page);
        
        $result = $model->getPageByLink($page);
        if(empty($result) || (!empty($result['errors']))){
            errorClass::getPageError(404);
            return false;
        }
        heretic::setTitle($result['title']);
        $template = $this->getTemplate($result);
        if (!isset($_SERVER["HTTP_X_PJAX"])){
            $this->render($template, array('result' => $result));
        }else{
            $this->partialRender($template, array('result' => $result));
        }
        
        
    }
    
    
    
//    public function pageListTest($params){
//        
//        if(empty($params)){
//            errorClass::getPageError(404);
//        }
//        
//        $page = $params[0];
//        $model = new page();
//        $this->setActivePage($page);
//        $result = $model->getPageByLink($page);
//        
//        $template = $this->getTemplate($result);
//        $this->render($template, array('result' => $result));
//        
//    }
    
    
    
    
}
