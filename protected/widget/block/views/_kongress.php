

<script type="text/javascript">
        
    $(document).ready(function(){

        HERETIC.cernel.loadScript('/<?=  heretic::$_path['template']?>js/angular/kongress.js', document.head, function(){

        });


    });

</script>




<div class="kongress-form-widget">
    
    <div class="kongress-form">
        
        <div class="kongress-head">
            <h3>Заказать конгресс холл</h3>
        </div>
        
        <div class="success-flash"></div>    
        
        <div class="kongress-row input-row date-k">
            <div class="error-text fio-error">
                
            </div>    
            <label>Дата</label>
            <input type="text"  class="kongress-input date-input" name="date">
            <div class="calendar-icon"></div>
            <div class="clearfix"></div>
        </div>

        <div class="kongress-row input-row time-k">
            <div class="error-text fio-error">
               
            </div>    
            <label>Время начала</label>
            <input type="text" class="kongress-input time-input" name="time">
        </div>
        
        <div class="kongress-row input-row duration-k">
            <div class="error-text fio-error">
                
            </div>    
            <label>Продолжительность <span class="range-k"></span> часов </label>
            <input type="range" class="kongress-input-range" min="1" max="12">
            
            <div id="slider-range"></div>
            
        </div>
        
        <div class="kongress-row input-row phone-k">
            <div class="error-text comment-error">
                
            </div>    
            <label>Телефон для контакта</label>
            <input type="text" class="kongress-input phone-input" name="phone">
        </div>
        
        <div class="kongress-row input-row description-k">
            <div class="error-text comment-error">
                
            </div>    
            <label>Конгресс</label>
            <textarea class="kongress-input" name="description"></textarea>
        </div>
        
        <button type='button' class='btn btn-green kongress-btn' onClick="HERETIC.modules.order.sendOrder()">Оставить заявку</button>
        
    </div>    
    
</div>    