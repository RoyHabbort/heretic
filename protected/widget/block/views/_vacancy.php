<div class="vacancy-widget">
    
    <div class="widget-vacancy-list">
    <?php if(!empty($arguments['result'])) : ?>
        <?php foreach($arguments['result'] as $key => $value) : ?>
        <div class="vacancy-one">
            <div class="vacancy-head">
                <div class="vacancy-title">
                    <?=$value['title']?>
                </div>
            </div>    
            <div class="vacancy-text-block">
                <div class="vacancy-text">
                    <?=$value['text']?>
                </div>    
            </div>    
        </div>
        <?php endforeach; ?>
    <?php endif;?>
    </div>
        
</div>    