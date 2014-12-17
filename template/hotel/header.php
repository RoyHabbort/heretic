<body>
    
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
    
    
    <div class="content-wrapper">
        <header ng-app="app">
            
            <div class="head-line">
                <div class="logo">
                    <div class="div-logo">
                        <a data-pjax href="/" class="logo-line">
                            <div class="logo-img">
                                <img src="/<?= heretic::$_path['template'] ?>img/logo.png">
                            </div>
                            <div class="logo-title">
                                Седьмое небо
                            </div>
                            <div class="logo-sub">
                                Гостинично-ресторанный комплекс
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>    
                </div>
                <?php heretic::Widget('mainMenu')?>
                <div class="call-cell">
                    <div class="call-line">
                        <div class="call-img">
                            <img src="/<?= heretic::$_path['template']?>img/icons/phone.png">
                        </div>
                        <div class="call-text">
                            <div class="call-title">Заказать звонок</div>
                            <div class="call-sub">Мы вам перезвоним</div>
                        </div>
                    </div>    
                    
                    <?php heretic::Widget('singup')?>
                    
                </div>
            </div>
            <div class="topic-line <?= (!empty($arguments['main'])) ? 'main-class' : '' ;?>">
                <div class="left-menu" ng-controller="bookingCtrl">
                    <div class="booking-block">
                        <?php heretic::Widget('booking', array(), 'bookingMain')?>
                    </div> 
                    <div class="appartament-slider">
                        <?php heretic::Widget('slider', array(), 'appartament')?>
                    </div>  
                </div>
                <div class="topic-image">
                    <div class="one-topic-img">
                        <img src="/<?=heretic::$_path['template']?>img/bg_main.jpg">
                    </div>
                </div>   
                <div class="clearfix"></div>
            </div> 
            
        </header>
        <div class="page" id="pjax-conteiner">
      