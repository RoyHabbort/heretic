<div class="content-width page-admin">
    
    <div class="admin-title block-padding">
        <div>Редактирование Ресторанного меню</div>
        <a href='/admin/addCategoryMenu/' class='btn btn-green'>Добавить категорию в меню</a>
    </div>    
    
    <div class='success-flash padding-left-20'>
        <?= heretic::getFlash('success');?>
    </div>    
    
    

    <div class="admin-page-block padding-left-right-20 rest-menu">
        
        <?php if(!empty($arguments['result'])) : ?>
            <?php foreach ($arguments['result'] as $key => $value) : ?>
                <div class="block-rest-menu-one block-padding margin-bottom-20">
                    <div class="title big-title">
                        <?=$value['title'];?>
                        
                        <div class="button-position-r">
                            <a class="btn btn-green" href="/admin/addRestMenu/<?=$value['id_restMenu']?>">
                                Добавить запись в меню
                            </a>    
                            <a class="btn btn-blue" href="/admin/editCategoryMenu/<?=$value['id_restMenu']?>">
                                Редактировать
                            </a>    
                            <a class="btn btn-red" href="/admin/deleteRestMenu/<?=$value['id_restMenu']?>" onClick="return confirm('Удалить всю категорию целиком? (будут удалены и все внутренние пункты меню)')">
                                Удалить категорию
                            </a>
                            <span class="btn btn-green show-menu-btn">
                                +
                            </span>
                        </div> 
                        
                    </div>
                    
                    <?php if(!empty($value['child'])) : ?>
                        <div class="inner-rest-menu">
                            <?php foreach($value['child'] as $key2 => $value2) : ?>
                            <div class="one-block block-padding margin-bottom-20">
                                <div class="rest-menu-head">
                                    <div class="title">
                                        <?=$value2['title'];?>
                                    </div>

                                    <div class="weight">
                                        <?= (!empty($value2['weight'])) ? $value2['weight'] : '';?>
                                    </div>    

                                    <div class="price">
                                        <?= (!empty($value2['price'])) ? $value2['price'] : '';?>
                                    </div>
                                </div>    
                                
                                <div class="button-position">
                                    <a class="btn-native btn-native-blue" href="/admin/editRestMenu/<?=$value2['id_restMenu']?>">
                                        Редактировать
                                    </a>    
                                    <a class="btn-native btn-native-red" href="/admin/deleteRestMenu/<?=$value2['id_restMenu']?>" onClick="return confirm('Вы уверены?')">
                                        Удалить
                                    </a>
                                </div> 
                                
                                <?php if(!empty($value2['child'])) : ?>
                                    <div class="inner-2-rest-menu padding-left-right-20">
                                        <?php foreach($value2['child'] as $key3 => $value3) : ?>
                                            <div class="one-block block-padding margin-bottom-20">
                                                <div class="rest-menu-head">
                                                    <div class="title">
                                                        <?=$value3['title'];?>
                                                    </div>

                                                    <div class="weight">
                                                        <?= (!empty($value3['weight'])) ? $value3['weight'] : '';?>
                                                    </div>    

                                                    <div class="price">
                                                        <?= (!empty($value3['price'])) ? $value3['price'] : '';?>
                                                    </div>
                                                </div>  
                                                
                                                <div class="button-position">
                                                    <a class="btn-native btn-native-blue" href="/admin/editRestMenu/<?=$value3['id_restMenu']?>">
                                                        Редактировать
                                                    </a>    
                                                    <a class="btn-native btn-native-red" href="/admin/deleteRestMenu/<?=$value3['id_restMenu']?>" onClick="return confirm('Вы уверены?')">
                                                        Удалить
                                                    </a>
                                                </div> 
                                                
                                            </div>    
                                        <?php endforeach;?>
                                    </div>    
                                <?php endif;?>
                                
                            </div>
                            <?php endforeach;?>
                        </div>
                    <?php endif; ?>
                    
                    
                </div>
            <?php endforeach;?>
        <?php else : ?>
            <div class="block-padding">
                В данный момент ресторанное меню не заполнено.
            </div>
        <?php endif;?>
    
    </div>    
    
</div>