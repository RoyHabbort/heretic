$(document).ready(function(){
   
    if(typeof HERETIC  === "undifined"){
        HERETIC = {};
    }
    HERETIC.modules = HERETIC.modules || {};
   
    var row = function(){
        return {
            val : '',
            error : '',
            input : '',
            row : ''
        }
    }
    
    var order = {
        
        date : new row(),
        time : new row(),
        duration : new row(),
        phone : new row(),
        description : new row(),
        success : $('.success-flash'),
        
        setRow : function(){
            
            order.date.row = $('.date-k');
            order.time.row = $('.time-k');
            order.duration.row = $('.duration-k');
            order.phone.row = $('.phone-k');
            order.description.row = $('.description-k');
            
        },
        setInput : function(){
            
            order.date.input = $(order.date.row).find('.kongress-input');
            order.time.input = $(order.time.row).find('.kongress-input');
            order.duration.input = $(order.duration.row).find('.kongress-input-range');
            order.phone.input = $(order.phone.row).find('.kongress-input');
            order.description.input = $(order.description.row).find('.kongress-input');
            
        },
        setValue : function(){
            
            order.date.val = $(order.date.input).val();
            order.time.val = $(order.time.input).val();
            order.duration.val = $(order.duration.input).val();
            order.phone.val = $(order.phone.input).val();
            order.description.val = $(order.description.input).val();
            
        },
        validate: function(){
            if(!order.date.val){
                order.date.error = 'Данное поле обязательно для заполнения';
            }
            if(!order.time.val){
                order.time.error = 'Данное поле обязательно для заполнения';
            }
            if(!order.duration.val){
                order.duration.error = 'Данное поле обязательно для заполнения';
            }
            if(!order.phone.val){
                order.phone.error = 'Данное поле обязательно для заполнения';
            }
            
        },
        setErrors: function(){
            
            $(order.date.row).find('.error-text').text(order.date.error);
            $(order.time.row).find('.error-text').text(order.time.error);
            $(order.duration.row).find('.error-text').text(order.duration.error);
            $(order.phone.row).find('.error-text').text(order.phone.error);
            $(order.description.row).find('.error-text').text(order.description.error);
            
        },
        clearError: function(){
            
            order.date.error = '';
            order.time.error = '';
            order.duration.error = '';
            order.phone.error = '';
            order.description.error = '';
            
            $(order.date.row).find('.error-text').text('');
            $(order.time.row).find('.error-text').text('');
            $(order.duration.row).find('.error-text').text('');
            $(order.phone.row).find('.error-text').text('');
            $(order.description.row).find('.error-text').text('');
            
        },
        clearInput: function(){
            $(order.date.input).val('');
            $(order.time.input).val('');
            $(order.duration.input).val('');
            $(order.phone.input).val('');
            $(order.description.input).val('');
        },
        clearSuccess : function(){
            $(order.success).text('');
        },
        sendOrder : function(){
            order.clearSuccess();
            order.setRow();
            order.setInput();
            order.clearError();
            order.setValue();
            
            order.validate();
            
            if((order.date.error)||(order.time.error)||(order.duration.error)||(order.phone.error)){
               order.setErrors();
               return false;
            }
            
            
            $.ajax({
                url : '/ajax/sendOrder',
                method : 'POST',
                dataType: 'JSON',
                data : {'data' : {
                        date : order.date.val,
                        time : order.time.val,
                        duration : order.duration.val,
                        phone : order.duration.val,
                        description : order.duration.val
                }},
                success : function(data){
                    
                    if(data.errors){
                        order.date.error = data.errors;
                        order.setErrors();
                        return false;
                    }
                    
                    if(data.success){
                        $(order.success).text(data.success);
                        order.clearError();
                        order.clearInput();
                    }
                    
                },
                error : function(){
                    order.date.error = 'Извините. Произошла ошибка связи с сервером. Повторите попытку чуть позже, или перезагрузите страницу';
                    order.setErrors();
                }
            });
                   
        }
        
    }
    
    
    $('.range-k').text($('.kongress-input-range').val());
    
    var intervalID;
    
    $('.kongress-input-range').on('focusin', function(){
        intervalID = setInterval(function(){
            $('.range-k').text($('.kongress-input-range').val());
        }, 100);
    });
    
    $('.kongress-input-range').on('focusout', function(){
        clearInterval(intervalID);
    });
    
    HERETIC.modules.order = order;
    
    
});


