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

        $('.ona-homepage-boxes-submit').click(function(){

            var ona_homepage_boxes = [];

            for (var x=1; x<=3; x++) {
                var obj = {
                    index: x,
                    title: $('#homepage-box-title-'+x).val(),
                    content: $('#homepage-box-content-'+x).val(),
                    link: $('#homepage-box-link-'+x).val(),
                    link_text: $('#homepage-box-link-text-'+x).val()
                };
                ona_homepage_boxes.push(obj);
            }

            $('#ona-homepage-boxes').val(JSON.stringify(ona_homepage_boxes));
            $('#ona-homepage-boxes-form').submit();
        });

    });

})(jQuery);