<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mail
 *
 * @author Рой
 */
class mail extends PHPMailer{
    
    /*
     * 3-12-2014
     * Отправление письма
     * roy
     */
    
    public function sendMail($params){
        
        $this->From = $params['from'];
        $this->FromName = $params['fromName'];
        $this->Subject = $params['subject'];
        
        $template = $params['template'].'Template';
        $this->Body = $this->$template($params);
        $this->isHTML(true);
        
        $this->AddAddress($params['toMail'], $params['to']);
        
        if(!$this->Send()) return false;
            else return true;
        
    }
    
    /*
     * 3-12-2014
     * Форматирование письма для singup
     * roy
     */
    
    private function signupTemplate($params){
        $views = new viewsClass();
        $body = '';
        $body .= 'Вас просят перезвонить по номеру ' . $params['data']['phone'] . '<br />';
        if(!empty($params['data']['date'])){
            $body .= 'Удобный для звонка день ' . $views->converteDate($params['data']['date'], 'date') . '<br />'; 
        }
        
        if(!empty($params['data']['s_sign'])||!empty($params['data']['po_sign'])){
            $body .= "Удобное время для звонка ";
            if(!empty($params['data']['s_sign'])){
                $body .= 'c ' . $params['data']['s_sign'] . ' ';
            }
            if(!empty($params['data']['po_sign'])){
                $body .= 'по ' . $params['data']['po_sign'];
            }
        }
        
        return $body;
        
    }
    
    /*
     * 3-12-2014
     * Форматирование письма для бронирования конгрессхола
     * roy
     */
    
    private function kongressTemplate($params){
        $body = '';
        $body .= 'Забронировать конгрессхолл';
        return $body;
    }
    
    
    
    
    private function formatedBody($params){
        
        $body = '';
        $body .= '' . $params['fio'] . '<br/>';
        $body .= 'Комментарий : ' . $params['comment'] . '<br/>';
        $body .= 'Номер телефона :' . $params['phone'];
        return $body;
        
    }
    
    
    
    
}
