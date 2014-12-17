<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainMenuWidget
 *
 * @author Рой
 */
class mainMenuWidget extends widgetClass{
    
    public function index($params){
        
        $activePage = heretic::$active_page;
        $realActive = $activePage;
        $activePage = $this->getMenuActiveElement($activePage);
        
        $model = new page();
        $menu = $model->getTopMenu();
        
        $this->render('mainMenu', array('menu' => $menu, 'active_page' => $activePage, 'real_active' => $realActive));
        
    }
    
    
    /*
     * 9-12-2014
     * находим активный пункт меню, если находимся на внутренних страницах
     * работает только для двухуровневой вложенности
     * roy
     */
    private function getMenuActiveElement($link){
        
        $model = new page();
        $previse = $model->getPageByLink($link);
        
        if(!empty($previse['errors'])){
            return false;
        }
        
        
        if(!empty($previse['parent_id'])){
            if($previse['parent_id'] != 0){
                $sql = "SELECT * FROM `page` WHERE `id_page` = '{$previse['parent_id']}'";
                $previse = $model->query($sql);
                $previse = $previse[0];
            }
        }
        
        return $previse['link'];
        
    }
    
    
//    private function getMenuActiveElement($activePage){
//        
//        if($activePage == '/') return '/';
//        $model = new page();
//        $typeMenu = $model->getTopMenuType();
//        
//        $criteria = "`link` = '{$activePage}'";
//        $page = $model->getAll('page', $criteria);
//        $page = $page[0]; 
//        
//        if(empty($page['page_type'])){
//            return false;
//        }
//        
//        $schet = 0;
//        
//        
//        while(($typeMenu != $page['page_type']) || (!empty($page['page_type'])) || ($schet == 10)){
//            $parent = $page['parent_id'];
//            $page = $model->getById('page', $parent);
//            $schet++;
//        }
//        
//        $activeMenu = $page['link'];
//        return $activeMenu;
//        
//    }
    
    
    
    
    /*
     * 26-11-2014
     * Нижнее меню
     * roy
     */
    
    public function footerMenu(){
        
        $model = new page();
        $result = $model->getFooterMenu();
        
        $this->render('_footerMenu', array('result' => $result));
    }
    
    
    
    
}
