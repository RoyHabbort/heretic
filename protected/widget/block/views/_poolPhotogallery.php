<div class="pool-photogallery-widget">
    
    <?php if(!empty($arguments['result'])) : ?>
        <?php if(!empty($arguments['result']["pool_photogallery"])) : ?>
            <div class="pool-photogallery-list">
            <?php foreach ($arguments['result']["pool_photogallery"] as $key => $value) : ?>
                <a href="/<?=$value['full_path']?>" class="fancybox">
                    <?=heretic::viewImage($value['thumb_path'])?>
                </a>    
            <?php endforeach;?>
            </div>    
        <?php endif;?>
    <?php endif;?>
    
</div>