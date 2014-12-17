<div class="row">
    <div class="content-width breadcrumbs">
        <?php heretic::Widget('breadCrumbs', $arguments['result']['link'])?>
    </div>   
    <div class="content-width template-page">
        <div class="table-type">
            <?php heretic::widget('innerMenu', array('page' => $arguments['result'], 'condition' => 2), 'standartMenu')?>    
            <div class="work-place">
                <h1><?=$arguments['result']['title']?></h1>
                <div class="page-content">
                    <?= (!empty($arguments['result']['text'])) ? $arguments['result']['text'] : '' ;?>
                </div>
            </div>
        </div>  
    </div>    
</div>    