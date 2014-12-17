<div class="row">
    <div class="content-width breadcrumbs">
        <?php heretic::Widget('breadCrumbs', $arguments['result']['link'])?>
    </div>   
    <div class="content-width template-page">
        <div class="table-type">
            <?php heretic::widget('innerMenu', array('page' => $arguments['result'], 'condition' => 1), 'standartMenu')?>    
            <div class="work-place">
                <?php if($arguments['result']['link'] == "transferTwo") : ?>
                
                    <div class="review-block">
                        <?php heretic::Widget('block', array(), 'transfer')?>
                    </div>
                
                <?php else :?>
                    
                    <h1><?=$arguments['result']['title']?></h1>
                    <div class="page-content">
                        <?= (!empty($arguments['result']['text'])) ? $arguments['result']['text'] : '' ;?>
                    </div>
                
                <?php endif;?>
                
                <div class="block-widget">
                    <?php heretic::Widget('block', array('page' => $arguments['result']), 'controll')?>
                </div>  
                    
                <?php if($arguments['result']['link'] == "reviews") : ?>    
                    <div class="review-form-block">
                        <?php heretic::Widget('block', array(), 'reviewForm')?>
                    </div>    
                <?php endif;?>    
                    
                    
                <?php if($arguments['result']['link'] == '3d tour') : ?>
                    <div class="3d-tour-block">
                        <?php heretic::Widget('threedTour')?>
                    </div>
                <?php endif;?>    
                    
                <?php if($arguments['result']['link'] == 'selectAppartament') : ?>
                    <div class="select-appartament-block">
                        <?php heretic::Widget('svgPlan')?>
                    </div>    
                <?php endif; ?>    
                    
                    
            </div>
        </div>    
    </div>    
</div>    