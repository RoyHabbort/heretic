<div class="footer-menu-widget">
    
    <?php if(!empty($arguments['result'])) : ?>
        <div class="footer-menu-list">
            
            <?php foreach ($arguments['result'] as $key => $value) : ?>
                <div class="block-footer-menu">
                    <a data-pjax class="footer-menu-link" href="<?=$value['link']?>">
                        <?=$value['title']?>
                    </a>    
                    
                    <?php if(!empty($value['inner'])) : ?>
                        <?php foreach ($value['inner'] as $key2 => $value2) : ?>
                            <a data-pjax class="footer-menu-link-inner" href="/<?=$value2['link']?>">
                                <?=$value2['title']?>
                            </a>  
                        <?php endforeach;?>
                    <?php endif;?>
                    
                </div>    
            <?php endforeach;?>
        </div>        
    <?php endif;?>
    
</div>    