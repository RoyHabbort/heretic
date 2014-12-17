<div class="map-widget">
    
    <script type="text/javascript">
        
        $(document).ready(function(){
            
            HERETIC.cernel.loadScript('http://api-maps.yandex.ru/2.1/?lang=ru&l=pmap_RU', document.head, function(){
            
                ymaps.ready(function(){
                    var myMap = new ymaps.Map("YaMapConteiner", {
                        center: [47.22454956, 39.61327089],
                        zoom: 17,
                        type: 'yandex#publicMap'
                    });
                    
                    
                    var myPlacemark = new ymaps.Placemark([47.22454956, 39.61327089], {
                            balloonContentHeader: '<b>Отель Седьмое Небо</b>',
                        });             
                    myMap.geoObjects.add(myPlacemark);
                    

                })

            });
            
            
        });
        
    </script>
    
    <div id="YaMapConteiner" class="ymap-wrap" width="860" height="450">
        
        
    </div>
</div>    