/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function(){
   
    if(typeof HERETIC === "undifined"){
        HERETIC = {};
    }
    HERETIC.cernel = HERETIC.cernel || {};
    
    
    HERETIC.cernel = (function(){
        
        var 
        imageOnLoad = function(){
            //Неудачная
            
        },
        loadScript = function(src, appendTo, callback) {
            var script = document.createElement('script');
            if (!appendTo) {
                appendTo = document.getElementsByTagName('head')[0];
            }
            if (script.readyState && !script.onload) {
                // IE, Opera
                script.onreadystatechange = function() {
                    if (script.readyState == "loaded" || script.readyState == "complete") {
                        script.onreadystatechange = null;
                        callback();
                    }
                }
            }
            else {
                // Rest
                script.onload = callback;
            }
            script.src = src;
            appendTo.appendChild(script);

        };
        
        return {
            imageOnLoad : imageOnLoad,
            loadScript : loadScript
        }
        
    })();
    
    
    
    
    
    
});