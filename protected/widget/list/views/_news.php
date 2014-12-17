<?php if($arguments['result']) :?>
    <?php foreach ($arguments['result'] as $key => $value) : ?>
        <div class="block-news-one">
            
            <?php if((!empty($value['image'])) && (file_exists(heretic::$_path['images_thumb'].$value['image'])) ) : ?>
            <div class='block-news-one-img'>
                <img src='/<?=heretic::$_path['images_thumb'].$value['image']?>'>
            </div>
            <?php endif;?>
            
            <div class='block-news-one-text'>
                <a href="<?=$arguments['element_href']?><?=$value['id_news']?>" class="block-news-title"><?=$value['title']?></a>
                <span class="block-news-sub-title"><?=$value['sub-title']?></span>
                <span class="block-news-date"><span>Опубликованно:</span> <?=$this->converteDate($value['date'])?></span>
                <p class="block-news-text"><?=$this->previewText($value['text']);?></p>
            </div>
        </div>
    <?php endforeach;?>
<?php else : ?>
    <div>На данный момент нет новостей.</div>
<?php endif; ?>

