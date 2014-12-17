/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
   
    
          
    
    if(typeof HERETIC  === "undifined"){
        HERETIC = {};
    }
    HERETIC.modules = HERETIC.modules || {};
    
            
    HERETIC.modules.pjax = (function(){
        
        $('body').on('click', 'a[data-pjax]', function(event){
            
            var target = $(this).attr('href');
            
            HERETIC.modules.pjax.link = $(this);
            HERETIC.modules.pjax.target = target;
            
            event.stopPropagation();
            $.pjax({
               'url' : target,
               'container' : '#pjax-conteiner'
            });
            
            HERETIC.modules.pjax.position = $(document).scrollTop();
            
            return false;

        });
        
        $(document).on('pjax:end', function() {
            
            var path = document.location.pathname;
            
            if(path.length > 1){
                $('.topic-line').removeClass('main-class');
            }else{
                $('.topic-line').addClass('main-class');
            }
            
            HERETIC.modules.pjax.loadPage();
            
            /*
            $(document).scrollTop(HERETIC.modules.pjax.position);
            
            $('html, body').animate({
                scrollTop: $("#pjax-conteiner").offset().top
            }, 500);
            */
        }); 
        
        $(document).on('pjax:send', function() {
            
            $('.main-menu-link').removeClass('active');
            $('.two-lvl-main-menu-link').removeClass('active');
            
            $('.main-menu-link').each(function(){
                if ($(this).children('a').attr('href') == HERETIC.modules.pjax.target){
                    $(this).addClass('active');
                }
            });
            
            
            $('.two-lvl-main-menu-link').each(function(){
                if ($(this).attr('href') == HERETIC.modules.pjax.target){
                    $(this).addClass('active');
                    $(this).parents('.main-menu-link').addClass('active');
                }
            });
            
            
//            $.ajax({
//                url : '/ajax/getActiveMenu',
//                method : 'POST',
//                dataType: 'JSON',
//                data : {'link' : HERETIC.modules.pjax.target},
//                success : function(data){
//                    console.log(data);
//                },
//                error : function(err){
//                    console.log(err);
//                }
//            });
            
        });
        
//        $(document).on('pjax:send', function() {
//            $('.load-wrapper').css('display', 'block');
//        });
//        $(document).on('pjax:complete', function() {
//            $('.load-wrapper').css('display', 'none');
//        });
        
        
        
        
        return {
            loadPage : function(){
                HERETIC.modules.sliderApi.appartSlider.initiate();
                HERETIC.modules.sliderApi.appartThumbSlider.initiate();
                HERETIC.modules.maskApi.fullInitiate();
            }
        }
        
    })();        
            
});