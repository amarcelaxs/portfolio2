var dados_form = function dados_form()
    {         
        
        var setmenu = function setmenu() {
            $('.todos_os_dados').on('click', function() {
                    
                $('.dados_newsletter').css({'display':'none'}); 
                $('.dados_parceiro').css({'display':'none'});   
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'none'});  
                $('.todos_formularios').css({'display':'block'});
            });
            $('.form_contato').on('click', function() {                   
                $('.todos_formularios').css({'display':'none'});          
                $('.dados_newsletter').css({'display':'none'}); 
                $('.dados_parceiro').css({'display':'none'});   
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'block'});           
            });       
            $('.form_newsletter').on('click', function() { 
                $('.todos_formularios').css({'display':'none'});  
                $('.dados_parceiro').css({'display':'none'});   
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'none'});                   
                $('.dados_newsletter').css({'display':'block'});           
            });
            $('.form_parceiros').on('click', function() {   
                $('.todos_formularios').css({'display':'none'});             
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'none'});                   
                $('.dados_newsletter').css({'display':'none'});                 
                $('.dados_parceiro').css({'display':'block'});           
            });
            $('.form_trabalhe_conosco').on('click', function() {
                $('.todos_formularios').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'none'});                   
                $('.dados_newsletter').css({'display':'none'});                 
                $('.dados_parceiro').css({'display':'none'});                   
                $('.dados_trabalhe_conosco').css({'display':'block'});           
            });
            $('.form_chat').on('click', function() {
                $('.todos_formularios').css({'display':'none'});
                $('.fomulario_contato').css({'display':'none'});
                $('.dados_newsletter').css({'display':'none'}); 
                $('.dados_parceiro').css({'display':'none'});   
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'block'});           
            });
        }
    }
this.init = function init(){
         $("document").ready(function () {
           setmenu();
        });
}
