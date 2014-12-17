<div class="review-widget">
    
    <?php if(!empty($arguments['result'])) : ?>
        <div class="review-list">
            <?php foreach ($arguments['result'] as $key => $value) : ?>
                <div class="review-one review-form">
                    <?=$value['text']?>
                </div>    
            <?php endforeach;?>
        </div>
    <?php else : ?>
        <div>
            Нет отзывов в данный момент
        </div>
    <?php endif;?> 
    
        
</div>    