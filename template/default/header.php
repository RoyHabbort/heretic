<body>
    <header>
        <div class="head-line content-width">
            <div class="logo"><a href="<?= heretic::$_config['main_page'] ?>">Homedom</a></div>
            <div class="soc-seti">
            
            
            <script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter" data-url="http://homedom.ru/page" data-title="Homedom.ru" data-description="Сайт homedom.ru. Некоторая инфа по сайту. "></div>
            </div>
            
            <div class="phone">8 (800) 600-32-14</div>
            <div class="login">
                <?php if (!empty($_SESSION['phone'])) : ?>
                <span class="login-user"><?php heretic::Widget('login')?></span>
                <?php else: ?>
                <a href="/users/registration" class="btn">Зарегистрироваться</a>
                <span>или</span>
                <a href="/users/login" class="btn btn-blue">Войти</a>
                <?php endif;?>
            </div>
        </div>    
    </header>