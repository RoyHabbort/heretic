<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ajaxController
 *
 * @author Рой
 */
class ajaxController extends controllerClass{
    
    public function index(){
        errorClass::getPageError(404);
    }
    
    
    /*
     * 17-10-2014
     * Загрузка изображений на сервер
     * roy
     */
    
    public function jqueryUpload(){
        $this->confirmRules();
        $this->confirmAjax();
        $model = new image();
        
        if(!empty($_FILES)){
            $result = $model->uploadImage();
            
            if($result){
                echo json_encode(array('success' => 'Изображение успешно загружено', 'file_name' => $result['file_name']));
            }else{
                echo json_encode(array('errors' => 'При загрузке произошла ошибка'));
            }
            
        }else{
            $result = array('errors' => 'Ошибка загрузки');
            echo json_encode($result); 
        }
        
    }
    
    
    /*
     * 18-10-2014
     * Удаление изображения
     * roy
     */
    
    public function deleteImage(){
        $this->confirmRules();
        $this->confirmAjax();
        $model = new image();
        
        if(!empty($_POST)){
            $result = $model->deleteImage($_POST);
            echo json_encode($result);
        }else{
            $result = array('errors' => 'Ошибка удаления');
            echo json_encode($result);
        }
    }
    
    
    /*
     * 21-10-2014
     * Обратная связь
     * roy
     */
    
    public function addSignup(){
        if(empty($_POST)) errorClass::getPageError (404);
        
        if(!empty($_POST['data']['phone'])){
            $model = new page();
            $mail = new mail();
            $email = $model->getById('mail', 1);
            $form = array(
                'to' => heretic::$_config['mail']['name'],
                'toMail' => $email['mail'],
                'fromName' => heretic::$_config['mail']['name'],
                'from' => $email['mail'],
                'subject' => 'Обратный звонок',
                'template' => 'signup',
                'data' => $_POST['data']
            );
            
            $result = $mail->sendMail($form);

            if($result){
                echo json_encode(array('success' => 'Ваша заявка принята.'));
            }else{
                echo json_encode(array('errors' => array('public_error' => 'Произошла непредвиденая ошибка. Попробуйте обновить страницу')));
            }
        }else{
            echo json_encode(array('errors' => array('phone' => 'Данное поле обязательно для заполнения')));
        }
        
    }
    
    
    /*
     * 10-2014
     * Проверка прав пользователя
     * roy
     */
    
    private function confirmRules(){
        if($_SESSION['rules'] != 4){
            $location = '/';
            header( "Location: {$location}", true, 303 );
        }
    } 
    
    /*
     * 10-2014
     * Проверка на то, что пришёл аякс
     * roy
     */
    
    private function confirmAjax() {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
                && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            
            return true;
            
        }else{
            errorClass::getPageError(404);
            exit();
        }
    }
    
    
    /*
     * 2-12-2014
     * Выдача всех номеров
     * roy
     */
    
    public function getAllAppartaments(){
        $model = new page();
        $criteria = " `page_type` = 5 ORDER BY `sort` ASC";
        $promise = $model->getAll('page', $criteria);
        
        if(!empty($promise)&&($promise)){
            $result = array();
            
            foreach ($promise as $key => $value) {
                $result[] = $model->getPageByLink($value['link']);
            }
            
            if(!empty($result)&&($result)){
                echo json_encode(array('success' => 'Информация о комнатах получена', 'appartaments' => $result));
            }else{
                echo json_encode(array('errors' => 'Информация о номерах отсутствует'));
            }
            
            
        }else{
            echo json_encode(array('errors' => 'Ошибка БД'));
        }
           
    }
    
    /*
     * 2-12-2014
     * Выдача номера по линку
     * roy
     */
    
    public function getAppartmentByLink(){
        
        $model = new page();
        if(!empty($_POST)){
            
            $post = $_POST['data'];
            $post = $model->validate($params, $rules = array(
                'string' => 'link'
            ));
            
            $criteria = "`page_type` = 5 AND `link` = '{$post['link']}'";
            $promise = $model->getAll('page', $criteria);
            
            if(empty($promise)){
                echo json_encode(array('errors' => 'Ошибка синхронизации'));
                exit;
            }
            
            $result = $model->getPageByLink($promide[0]['link']);
            
            if(!empty($result)&&($result)){
                echo json_encode(array('success' => 'Информация о комнате получена', 'appartament' => $result));
            }else{
                echo json_encode(array('errors' => 'Ошибка БД'));
            }
            
            
        }else{
            echo json_encode(array('errors' => 'Ошибка синхронизации'));
        }
        
        
    }
    
    
    /*
     * 3-12-2014
     * Оставить заявку на конгресс холл
     * roy
     */
    
    public function sendOrder(){
        
        //$postdata = file_get_contents("php://input");
        //$post = json_decode($postdata);
        
        $post = $_POST;
        
        if(empty($post['data']['description'])){
            $post['data']['description'] = '';
        }
        
        $model = new page();
        if(!empty($post['data'])){
            $post = $post['data'];
            $post = $model->validate($post, $rules = array(
                'required' => 'date, time, duration, phone',
                'string' => 'date, time, duration, phone',
                'text' => 'description'
            ));
            
            if(!empty($post['valid_errors'])){
                echo json_encode(array('errors' => 'Форма заполнена неверно', 'valid_errors' => $post['valid_errors']));
                exit;
            }
            
            $mail = new mail();
            $email = $model->getById('mail', 2);
            
            $form = array(
                'to' => heretic::$_config['mail']['name'],
                'toMail' => $email['mail'],
                'fromName' => heretic::$_config['mail']['name'],
                'from' => $email['mail'],
                'subject' => 'Заказ конгресс хола',
                'template' => 'kongress',
                'data' => $post,
            );
            
            
            $result = $mail->sendMail($form);

            if($result){
                echo json_encode(array('success' => 'Ваша заявка принята.'));
            }else{
                echo json_encode(array('errors' => array('public_error' => 'Произошла непредвиденая ошибка. Попробуйте обновить страницу')));
            }
            
            
        }else{
            echo json_encode(array('errors' => 'Ошибка синхронизации'));
        }
        
    }
    
    
    
    /*
     * 10-12-2014
     * Получение активной ссылки
     * roy
     */
    
    public function getActiveMenu(){
        
        
        if(empty($_POST['link'])){
            echo json_encode(array('error' => 'Непредвиденная ошибка'));
            exit;
        }
        
        
        
        echo json_encode(array('error' => $_POST['link']));
        
        
        
    }
    
    
}
