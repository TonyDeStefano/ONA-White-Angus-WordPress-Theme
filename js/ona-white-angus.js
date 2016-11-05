(function($){

    $(function(){

        $('#ona-silhouette').on('click, mouseenter', '.ona-silhouette-over', function(){
            $('.ona-silhouette-over').each(function(){
                $(this).css('background-color', 'transparent');
            });
            $(this).css('background-color','#FC0');
            var id = $(this).data('id');
            var text = $('.ona-silhouette-text');
            text.find('h2').text($(this).data('title'));
            text.find('p').text($(this).data('content'));
        });

    });

})(jQuery);