/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var initFieldAdd = function(){
        var index = $('select[name="field_type_id"]').val();
        if(index == 6){
            $('.section-image-filter').css('display', 'block');
        }else{
            $('.section-image-filter').css('display', 'none');
        }
    };
    initFieldAdd();
    
    $('select[name="field_type_id"]').on('change', function(e){
        initFieldAdd();
    });
    
    
    $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
    
    
    //Показывать меню
    $('.show-menu-btn').on('click', function(){
        HERETIC.modules.facechange($(this).parents('.block-rest-menu-one').find('.inner-rest-menu'));
    });
    
    
//    $('.rest-menu .one-block').on('mouseenter', function(e){
//        $('.rest-menu .one-block').css('background', '#f4f4f4');
//        $(this).css('background', '#dfebf1');
//        e.stopPropagation();
//    });
//    
//    $('.rest-menu .one-block').on('mouseleave', function(e){
//        $(this).css('background', '#f4f4f4');
//        e.stopPropagation();
//    });

});


