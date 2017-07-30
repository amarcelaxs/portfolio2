var all = new function all(){

    var helpers = new function helpers(){

        //Código para adicionar os IDs de notícias e linhas e a descrição da notícia em seus respectivos lugares.
        String.prototype.fmt = function ()
        {
            var args = arguments;
            return this.replace
            (
                /\{(\d+)\}/g, function ($0, $1)
                {
                    return args[$1] !== void 0 && args[$1] !== null ? args[$1] : '';
                }
            );
        };
    }


	var menuLineAnimation = function menuLineAnimation() {

        var mls = document.querySelector('.menu .line').style;
        var bmla = $('nav.menu > ul > li.active');

        if (bmla.length > 0) {
            setTimeout(function () { // Delay para pegar a tamanho correta do width e left
                mls.left = bmla[0].offsetLeft + 'px';
                mls.width = bmla[0].clientWidth + 'px';
            }, 100);

            window.mlsLeft = bmla[0].offsetLeft;
            window.mlsWidth = bmla[0].clientWidth;
        }

        $('nav.menu > ul > li').click(function () {
            $('nav.menu > ul > li').removeClass("active");
            $(this).addClass("active");

            var self = this;
            if (this.offsetLeft > window.mlsLeft) {
                mls.width = (this.offsetLeft - window.mlsLeft + this.clientWidth) + 'px';
                setTimeout(function () {
                    mls.left = self.offsetLeft + 'px';
                    mls.width = self.clientWidth + 'px';
                }, 350);
            }
            else {
                mls.left = this.offsetLeft + 'px';
                mls.width = (window.mlsWidth + window.mlsLeft - this.offsetLeft) + 'px';
                setTimeout(function () {
                    mls.width = self.clientWidth + 'px';
                }, 350);
            }

            window.mlsLeft = this.offsetLeft;
            window.mlsWidth = this.clientWidth;

        });
    };
    
    var batePapo = function batePapo() {
        $(".chat").click(function(){
          $('#formilla-chat-button').css({'display':'block'});        		
        });       
    }

  
    this.init = function init(){

    	$(document).ready(function(){
            menuLineAnimation();
            subir();
            urlPages();
            animation();
            footerSolucoes();
            batePapo();
			//setActiveMenu($('#page-id').val());
        });
    }

};