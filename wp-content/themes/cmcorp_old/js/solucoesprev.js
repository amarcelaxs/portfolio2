var solucoesprev = new function solucoesprev(){


    var gridsolucoes =  function gridsolucoes() {
        // init Isotope
        var $grid = $('.grid-sistema-solucoes').isotope({
            // options
        });
        // filter items on button click
        $('.filter-list-group').on('click', 'li span', function () {
            var filterValue = $(this).attr('data-filter');
            $('.filter-list-group li span').removeClass('active');
            $(this).addClass('active');
            $grid.isotope({filter: filterValue});
        });
    }
    var modal_sistema = function modal_sistema(){
        $('#modal-sistemas').on('show.bs.modal', function(e) {
            var pageId = $(e.relatedTarget).attr('data-page-id');
            var modal = $(this);
            var selecionado = modal.find('[data-page-id=' + pageId + ']');
            modal.find('[data-page-id]').each(function(k, v) {
                $(v).addClass('item-nao-ativo');
                $(v).removeClass('item-ativo');
            });
            selecionado.removeClass('item-nao-ativo');
            selecionado.addClass('item-ativo');

        });
        $('.sistema-prev').on('click', function() {
            var modal =  $('#modal-sistemas');
            var ativo = modal.find('.item-ativo');
            var anterior = ativo.prev();
            modal.find('[data-page-id]').each(function(k, v) {
                $(v).addClass('item-nao-ativo');
                $(v).removeClass('item-ativo');
            });
            anterior.removeClass('item-nao-ativo');
            anterior.addClass('item-ativo');
        });
        $('.sistema-next').on('click', function() {
            var modal =  $('#modal-sistemas');
            var ativo = modal.find('.item-ativo');
            var proximo = ativo.next();
            modal.find('[data-page-id]').each(function(k, v) {
                $(v).addClass('item-nao-ativo');
                $(v).removeClass('item-ativo');
            });
            proximo.removeClass('item-nao-ativo');
            proximo.addClass('item-ativo');

        });

        $('#modal-sistemas')
            .find('.modal-content:first')
            .find('.sistema-prev span')
            .removeClass('glyphicon-chevron-left')
            .addClass('glyphicon-minus');
        $('#modal-sistemas')
            .find('.modal-content:first')
            .find('.sistema-prev')
            .off('click');
        $('#modal-sistemas')
            .find('.modal-content:last')
            .find('.sistema-next span')
            .removeClass('glyphicon-chevron-right')
            .addClass('glyphicon-minus');
        $('#modal-sistemas')
            .find('.modal-content:last')
            .find('.sistema-next')
            .off('click');
    };


    this.init = function init(){
        // init Isotope
        if($(".grid-sistema-solucoes").length > 0){
            gridsolucoes();
        }
        if($("#modal-sistemas").length > 0){
            modal_sistema();
        }
    }
}