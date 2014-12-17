

angular.module('app', ['ngRoute'])
    
        /*
         * 3-12-2014
         * Фабрика для работы с номерами
         * roy
         */
    
        .factory('Appartment', function($http, $q){
            var result = {
                alarm:function(){
                    alert('alarm!!!');
                },
                getAllAppartaments:function($scope){
                    $http.get('/ajax/getAllAppartaments')
                    .then(function(resp){
                        if(resp.data.errors){
                            result.errors(resp.data.errors);
                            return false;
                        }
                        if(resp.data.success){
                            $scope.listAppartaments =  resp.data.appartaments;
                            $scope.changeApparament = $scope.listAppartaments[0];
                            result.changedAppartment($scope, $scope.listAppartaments[0]);
                        }else{
                            result.errors('Извините. Произошла непредвиденная ошибка. Попробуйте перезагрузить страницу');
                        }
                                
                    }, function(err){
                        result.errors('Ошибка связи с сервером. Попробуйте обновить страницу');
                    });  
                },
                changedAppartment:function($scope, changeAppartment){
                    
                    if(!changeAppartment.slider_appartament.length){
                        changeAppartment.slider_appartament = [{medium_path : 'template/hotel/img/error/not_photo_300.jpg'}];
                    }
                    
                    $scope.sliderAppartament = changeAppartment.slider_appartament;
                    
                    setTimeout(function(){

                        if(HERETIC.modules.sliderApi.mainSlider.API){
                            HERETIC.modules.sliderApi.mainSlider.reload();
                        }else{
                            HERETIC.modules.sliderApi.mainSlider.initiate();  
                        }

                    }, 100);
                    
                },
                errors:function(err){
                    if(err){
                        alert(err);
                    }else{
                        alert('Ошибка модели бронирования');
                    }
                }
            };
            return result;
    })


        /*
         * 3-12-2014
         * Контроллер работы с бронированием
         * roy
         */


        .controller('bookingCtrl', function($scope, $http, Appartment){
            
            $(document).ready(function(){
                Appartment.getAllAppartaments($scope);
                $scope.changedAppartmentC = function(changeAppartment){
                    Appartment.changedAppartment($scope, changeAppartment);
                };
                
            });
        
    })
    