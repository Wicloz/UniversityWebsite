$(function () {
    $('.datetime').datetimepicker({
        widgetPositioning: {
            horizontal: 'auto',
            vertical: 'bottom'
        },
        sideBySide: true,
        format: 'YYYY/MM/DD, HH:mm'
    });
});
$(function () {
    $('.date').datetimepicker({
        widgetPositioning: {
            horizontal: 'auto',
            vertical: 'bottom'
        },
        format: 'YYYY/MM/DD'
    });
});
$(function () {
    $('.time').datetimepicker({
        widgetPositioning: {
            horizontal: 'auto',
            vertical: 'bottom'
        },
        format: 'HH:mm:ss'
    });
});
$(function () {
    $('.duration').datetimepicker({
        widgetPositioning: {
            horizontal: 'auto',
            vertical: 'bottom'
        },
        useCurrent: false,
        format: 'HH:mm:ss'
    });
});
