<div class="priceAppartament-widget">
    
    <div class="priceAppartament-list">
    <?php if(!empty($arguments['result'])) : ?>
            <div class="priceAppartament-table">
            <?php foreach ($arguments['result'] as $key => $value) : ?>
                <div class="table-row">
                    <div class="appart-title">
                        <?=$value['title']?>
                    </div>    
                    <div class="appart-price">
                        <?=$value['price_appartament']?>
                    </div>    
                </div>    
            <?php endforeach;?>
            </div>
    <?php endif;?>
    
</div>