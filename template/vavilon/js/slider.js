/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    var sliderApi = {
        stockMainSlider : {api:{}},
        mainSlider: {api:{}},
        newsSlider:{api:{}}
    };
    
    if(typeof HERETIC  === "undifined"){
        HERETIC = {};
    }
    HERETIC.modules = HERETIC.modules || {};

    
    sliderApi.stockMainSlider.api.initiate = function(){
        sliderApi.stockMainSlider.object = $('.stock-main-slider');
        $(sliderApi.stockMainSlider.object).bxSlider({
            pager: false,
            controls: true,
            minSlides: 5,
            maxSlides: 5,
            slideWidth: 198,
            slideMargin: 40,
            moveSlides: 1
        });
    };
    sliderApi.stockMainSlider.api.initiate();
    
    
    
    sliderApi.mainSlider.api.initiate = function(){
        sliderApi.mainSlider.object = $('.main-slider-list');
        $(sliderApi.mainSlider.object).bxSlider({
            pager: true,
            controls: false,
            moveSlides: 1,
            slideWidth: 824
        });
    };
    sliderApi.mainSlider.api.initiate();
    
    
    //слайдер новостей
    
    sliderApi.newsSlider.api.initiate = function(){
        sliderApi.newsSlider.object = $('.news-slider');
        $(sliderApi.newsSlider.object).bxSlider({
            pager: false,
            controls: false,
            moveSlides: 1,
            slideWidth: 200,
            slideMargin: 40,
            minSlides: 3,
            maxSlides: 3,
        });
    }
    sliderApi.newsSlider.api.initiate();
    
    
    HERETIC.modules.sliderApi = sliderApi;
    
});