(function($){

    $(function(){

        $('#ona-silhouette').on('mouseenter', '.ona-silhouette-over', function(){
            $('.ona-silhouette-over').each(function(){
                $(this).css('background-color', 'transparent');
            });
            $(this).css('background-color','#FC0');
            var id = $(this).data('id');
            var text = $('.ona-silhouette-text');
            text.find('h2').text(id + '. Something something something');
            text.find('p').text('Some more stuff that is really interesting ...');
        });

    });

})(jQuery);