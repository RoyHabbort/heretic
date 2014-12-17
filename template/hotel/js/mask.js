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
    
    var maskApi = {
        //Установка датапикеров
        datapicker : function(){
            $('.date-input').datepicker({
                dateFormat: "yy-mm-dd" 
            });
            
            //Клик на иконке вызывает датапикер
            $('.calendar-icon').on('click', function(){
                $(this).parents('.input-row').find('.date-input').focus();
            });
        },
        //маска телефона
        phoneMask : function(){
            $('.phone-input').mask("+7 (999) 999-99-99");
        },
        //Маска времени
        timeMask : function(){
            
            $.mask.definitions['H'] = '[012]';
            $.mask.definitions['M'] = '[012345]';
            $.mask.definitions['G'] = '[0123456789]';

            $(".time-input").mask('HG:M9');

            $('body').on('keyup', ".time-input", function(){
                var value = $(this).val(),
                    el = $(this),
                    range = document.createRange(),
                    sel = window.getSelection(),
                    position = $(this).getCaret(this);

                if((value[0] == 2)&&(value[1] > 3)){
                    var newValue = value[0] + '3' + value[2] + value[3] + value[4]; 
                    $(this).val(newValue);

                    this.setSelectionRange(position, position);

                }
            });
            
        },
        //полная инициализация
        fullInitiate : function(){
            maskApi.datapicker();
            maskApi.phoneMask();
            maskApi.timeMask();
        }
        
    }
    
    HERETIC.modules.maskApi = maskApi;
    
});