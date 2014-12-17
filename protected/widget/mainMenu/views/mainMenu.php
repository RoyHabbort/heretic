<?php /*
<a href="/" class="main-menu-link homepage <?= ('/' == $arguments['active_page']) ? 'active' : '' ;?>">Главная</a>
*/?>

<?php foreach($arguments['menu'] as $key => $value) : ?>
<div class="<?= ($value['link'] == $arguments['active_page']) ? 'active' : '' ;?> main-menu-link" >
    <a data-pjax href="/<?=Page::getLink($value)?>"><?=$value['title']?></a>
    <?php if(!empty($value['child'])) : ?>
    <div class="two-lvl-menu">
        <div class="menu-lvl-list">
        <?php foreach ($value['child'] as $key2 => $value2) : ?>
            <a data-pjax class="<?= ($value2['link'] == $arguments['real_active']) ? 'active' : '' ;?> two-lvl-main-menu-link" href="/<?=$value2['link']?>"><?=$value2['title']?></a>
        <?php endforeach;?>
        </div>    
    </div>
    <?php endif; ?>
</div>
<?php endforeach; ?>