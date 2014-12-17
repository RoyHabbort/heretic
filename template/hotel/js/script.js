/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    //Переключение на вкладку заказа столика
    $('.booking-apartament-icon').on('click', function(){
        $('.booking-apartament').css('display', 'none');
        $('.booking-apartament-section').css('display', 'none');
        $('.booking-table').css('display', 'block');
        $('.booking-restoraunt-section').css('display', 'block');
    });
    
    //Переключение на вкладку заказа номера
    $('.booking-table-icon').on('click', function(){
        $('.booking-apartament').css('display', 'block');
        $('.booking-apartament-section').css('display', 'block');
        $('.booking-table').css('display', 'none');
        $('.booking-restoraunt-section').css('display', 'none');
    });
    
    HERETIC.modules.maskApi.fullInitiate();
    
    
    //фансибокс
    $('.fancybox').fancybox();
    
    //выпадающие меню
    $('.main-menu-link').on('mouseover', function(){
        $(this).find('.two-lvl-menu').css('display', 'block');
    }).on('mouseout', function(){
        $(this).find('.two-lvl-menu').css('display', 'none');
    });
    
    
    
    
});

