<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newsController
 *
 * @author Рой
 */
class newsController extends controllerClass {
    
    /*
    public function listNews($params){
        if(empty($params[0])){
            $news_page=1;
        }else $news_page=$params[0];
        $page=3;
        $models = new news();
        $result = $models->getById('page', $page);
        $criteria = " 1 ORDER BY `date` DESC, `id_news` DESC ";
        $news = $models->getAll('news', $criteria);
        heretic::$_config['titlePage'] = $result['title'];
        $this->render('list', array('page' => $result, 'num_page' => $page, 'news' => $news, 'news_page' => $news_page));
        
    }
    
    
    public function newView($params){
        if(empty($params)){
            errorClass::getPageError(404);
        }
        $page=3;
        $page_news = (integer) $params[0];
        
        $models = new news();
        $result = $models->getById('news', $page_news);
        heretic::$_config['titlePage'] = $result['title'];
        $this->render('news', array('page' => $result, 'num_page' => $page));
    }
    */
}
