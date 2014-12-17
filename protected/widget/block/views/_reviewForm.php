<div class="review-form-widget">

    <div class='review-form-list review-form'>
        
        <div class="review-head">
            <h3>Оставить отзыв</h3>
        </div>
        
        
        <div class="success-flash"></div>    
        <div class='error-text'></div>


        <?php
        $name = 'name';
        heretic::Widget('input', array(
            'type' => 'text',
            'name' => $name,
            'label' => 'Имя:',
            'errors' => (!empty($arguments['errors'][$name])) ? $arguments['errors'][$name] : '',
            'result' => (!empty($arguments['review'][$name])) ? $arguments['feedback'][$name] : '',
        ));?>

        <?php
        $name = 'email';
        heretic::Widget('input', array(
            'type' => 'text',
            'name' => $name,
            'label' => 'Email:',
            'errors' => (!empty($arguments['errors'][$name])) ? $arguments['errors'][$name] : '',
            'result' => (!empty($arguments['review'][$name])) ? $arguments['feedback'][$name] : '',
        ));?>

        <?php
        $name = 'text';
        heretic::Widget('input', array(
            'type' => 'textarea',
            'name' => $name,
            'label' => 'Отзыв:',
            'errors' => (!empty($arguments['errors'][$name])) ? $arguments['errors'][$name] : '',
            'result' => (!empty($arguments['review'][$name])) ? $arguments['feedback'][$name] : '',
        ));?>

        <button type='submit' class='btn btn-green review-btn'>Оставить отзыв</button>
    </div>
    
    
    <script type="text/javascript" src="/<?=heretic::$_path['template']?>js/review.js"></script>
    
</div>    