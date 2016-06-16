$(function () {
    $('.add-more').on('click', function (e) {
        e.preventDefault();
        var id = parseInt($(this).prev().find('input').data('id')) + 1;
        if (id >= 10) {
            return false;
        }
        var $group = $(this).prev().clone();
        $group.find('input').val("");
        $group.find('input').attr('name', 'DataForm[data][' + id + ']');
        $group.find('input').attr('data-id', id);
        $(this).before($group);
    });
});