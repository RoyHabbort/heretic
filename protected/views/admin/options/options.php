<div class="content-width page-admin">
    
    <div class="admin-title block-padding">
        <div>Настройки сайта</div>
    </div>    
    
    <div class='success-flash padding-left-20'>
        <?= heretic::getFlash('success');?>
    </div>    
    
    <div class="admin-page-block padding-left-right-20 form-options">
        <form action="/admin/mailEdit/1" method="post">
            <div class="row-admin row-input">
                <div class="errors-text error-input"> </div>
                <label>Адрес для заказа звонка обратной связи</label>
                <input name="mail" type="text" class="admin-input text-input" value="<?=$arguments['result']['signup']?>">
                <button type="submit" class="btn btn-green">Сохранить</button>
            </div>    
        </form>    
        
        <form action="/admin/mailEdit/2" method="post">
            <div class="row-admin row-input">
                <div class="errors-text error-input"> </div>
                <label>Адрес для заказа конгресс холла</label>
                <input name="mail" type="text" class="admin-input text-input" value="<?=$arguments['result']['kongress']?>">
                <button type="submit" class="btn btn-green">Сохранить</button>
            </div>
        </form>
        
    </div>    
</div>