(function($) {

    $(function () {

        $('.ona-hover-cow-submit').click(function(){

            var ona_hover_cow = [];

            for (var x=1; x<=12; x++) {
                var obj = {
                    index: x,
                    title: $('#hover-cow-title-'+x).val(),
                    content: $('#hover-cow-content-'+x).val()
                };
                ona_hover_cow.push(obj);
            }

            $('#ona-hover-cow').val(JSON.stringify(ona_hover_cow));
            $('#ona-hover-cow-form').submit();
        });

    });

})(jQuery);