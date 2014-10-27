/**
 * Created by Dimona on 25.10.14.
 */
$(document).ready(function () {
    $('.navbar li').click(function (e) {
        $('.navbar li.active').removeClass('active');
        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
//        e.preventDefault();
    });
});