<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of restMenu
 *
 * @author Рой
 */
class restMenu extends modelsClass {
    
    
    
    /*
     * 8-12-2014
     * Добавить в меню запись
     * roy
     */
    
    public function addCategory($params){
        
        $params = $this->validate($params, $rules = array(
            'required' => 'title',
            'string' => 'title, sort'
        )); 
        
        if(!empty($params['valid_errors'])){
            return array('errors' => $params['valid_errors']);
        }
        
        $sql = "INSERT INTO `restMenu` (`title`, `sort`, `parent_id`) VALUES ('{$params['title']}', '{$params['sort']}', '0')";
        $result = $this->query($sql);
        
        if($result){
            return array('success' => 'Категория успешно добавлена');
        }else{
            return array('errors' => 'Ошибка БД');
        }
        
    }
    
    
    
    /*
     * 8-12-2014
     * Получить полную структуру меню
     * roy
     */
    
    public function getStructurMenu(){
        
        $criteria = "`parent_id` = 0 ORDER BY `sort` ASC";
        $previce = $this->getAll('restMenu', $criteria);

        if(is_array($previce)){
            foreach ($previce as $key => $value) {
                $criteria = "`parent_id` = '{$value['id_restMenu']}' ORDER BY `sort` ASC";
                $previce[$key]['child'] = $this->getAll('restMenu', $criteria);

                if(is_array($previce[$key]['child'])){
                    foreach ($previce[$key]['child'] as $key2 => $value2) {
                        $criteria = "`parent_id` = '{$value2['id_restMenu']}' ORDER BY `sort` ASC";
                        $previce[$key]['child'][$key2]['child'] = $this->getAll('restMenu', $criteria);
                    }
                }

            }
        }
        
        return $previce;
        
    }
    
    
    /*
     * 8-12-2014
     * Получить список возможных родителей
     * roy
     */
    
    public function getParentOption($nowPage = '0'){
        $criteria = '`parent_id` = 0 ORDER BY `sort` ASC';
        $allMenu = $this->getAll('restMenu', $criteria);
          
        if(is_array($allMenu)){
            foreach ($allMenu as $key => $value) {
                $criteria = "`parent_id` = '{$value['id_restMenu']}' ORDER BY `sort` ASC";
                $allMenu[$key]['child'] = $this->getAll('restMenu', $criteria);
            }
        }
        
        
        if(is_array($allMenu)){
            foreach ($allMenu as $key => $value) {
                //Перегоняем 1 уровень
                if($value['id_restMenu'] != $nowPage){
                    $parent[$value['id_restMenu']] = $value['title']; 
                }
                
                //нужен ли 2 уровень
                if(is_array($value['child'])){
                    
                    //перебираем 2 уровень
                    foreach ($value['child'] as $key2 => $value2) {
                        //перегоняем 2 уровень
                        
                        if($value2["id_restMenu"] != $nowPage){
                            $parent[$value2['id_restMenu']] = $value2['title'];
                        }
                        
                    }
                }
            }
        }
        
        return $parent;
    }
    
    
    /*
     * 8-12-2014
     * Добавить запись в меню
     * roy
     */
    
    public function addRestMenu($params){
        
        $params = $this->validate($params, $rules = array(
            'required' => 'title, parent_id',
            'string' => 'title, sort, weight, price, parent_id'
        ));
        
        if(!empty($params['valid_errors'])){
            return array('errors' => $params['valid_errors']);
        }
        
        $sql = "INSERT INTO `restMenu` (`title`, `weight`, `price`, `parent_id`, `sort`)
                VALUES ('{$params['title']}', '{$params['weight']}', '{$params['price']}', '{$params['parent_id']}', '{$params['sort']}')";
        $result = $this->query($sql);
        
        if($result){
            return array('success' => 'Запись успешно добавлена');
        }else{
            return array('errors' => 'Ошибка БД');
        }
        
    }
    
    /*
     * 8-12-2014
     * редактировать запись в меню
     * roy
     */
    
    public function editRestMenu($params, $idRestMenu){
        
        $params['id_restMenu'] = $idRestMenu;
        
        $params = $this->validate($params, $rules = array(
            'required' => 'title, parent_id',
            'string' => 'title, sort, weight, price, parent_id'
        ));
        
        if(!empty($params['valid_errors'])){
            return array('errors' => $params['valid_errors']);
        }
        
        $sql = "UPDATE `restMenu` SET `title` = '{$params['title']}', `weight` = '{$params['weight']}',
                `price` = '{$params['price']}', `parent_id` = '{$params['parent_id']}', `sort` = '{$params['sort']}'
                WHERE `id_restMenu` = '{$params['id_restMenu']}'"; 
        $result = $this->query($sql);
        
        if($result){
            return array('success' => 'Запись успешно отредактирована');
        }else{
            return array('errors' => 'Ошибка БД');
        }
        
    }
    
    
    /*
     * 8-12-2014
     * Удаление пункта из меню, со всеми дочерними
     * roy
     */
    
    public function deleteRestMenu($idRestMenu){
        
        $params['id_restMenu'] = $idRestMenu;
        
        $params = $this->validate($params, $rules = array(
            'required' => 'id_restMenu',
            'string' => 'id_restMenu'
        ));
        
        if(!empty($params['valid_errors'])){
            return array('errors' => $params['valid_errors']);
        }
        
        $criteria = " `parent_id` = '{$params['id_restMenu']}'";
        $childers = $this->getAll('restMenu', $criteria);
        
        if(is_array($childers)){
            foreach ($childers as $key => $value) {
                
                $criteria = " `parent_id` = '{$value['id_restMenu']}'";
                $childers2 = $this->getAll('restMenu', $criteria);
                
                if(is_array($childers2)){
                    foreach ($childers2 as $key2 => $value2) {
                        $sql = "DELETE FROM `restMenu` WHERE `id_restMenu` = '{$value2['id_restMenu']}'";
                        $this->query($sql);
                    }
                }
                
                $sql = "DELETE FROM `restMenu` WHERE `id_restMenu` = '{$value['id_restMenu']}'";
                $this->query($sql);
            }
        }
        
        $sql = "DELETE FROM `restMenu` WHERE `id_restMenu` = '{$params['id_restMenu']}'";
        $this->query($sql);
        
        return array('success' => 'Удаление прошло успешно');
        
    }
    
    
}
