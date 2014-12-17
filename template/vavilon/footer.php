            </div>
            <footer>

                <div class="footer-menu content-width">
                    <?php heretic::Widget('mainMenu', array(), 'footerMenu');?>
                </div>
                
                <div class="footer-line content-width">
                    
                    
                    <div class="footer-hr"></div>
                    
                    <div class="footer-table">
                        <div class="f-contact">
                            <div class="">© 2014 Торгово-развлекательный центр «<strong>Вавилон</strong>» <br /> Все права защищены</div>
                        </div>

                        <div class="f-time">
                            <div class="">Круглосуточный контакт-центр:</div>
                            <div class="phone-f">(863) 230-06-80</div>
                        </div>

                        <div class="f-studio">
                            <a href="www.justmilk.ru" class="table-type-inline">
                                <div class="studio-text">Сайт разработан студией</div>
                                <div class="studio-logo"></div>
                            </a>    
                        </div>
                    </div>
                    
                </div>    
            </footer>
        </div>
        
        <div class="script-position">
            
            <?php
                foreach (heretic::$_script as $key => $value) {
                    echo '<script type="text/javascript" src="/'.heretic::$_path['template'].$value.'"></script>';
                }

                foreach (heretic::$_config['extension'] as $extension => $option) {

                    if(($option['template'] == 'all')||($option['template'] == heretic::$_config['template_name'])){

                        foreach ($option['js'] as $key => $value) {
                            $dir = heretic::$_path['extension'] . $option['dir'] . $value;
                            echo '<script type="text/javascript" src="/'.$dir.'"></script>';
                        }

                        foreach ($option['css'] as $key => $value) {
                            $dir = heretic::$_path['extension'] . $option['dir'] . $value;
                            echo '<link rel="stylesheet" type="text/css" href="/'.$dir.'">';
                        }

                    }

                }

            ?>
        </div>
    </body>
</html>