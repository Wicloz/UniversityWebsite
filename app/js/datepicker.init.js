function initDatetime () {
    $(function () {
        $('.datetime').datetimepicker({
            widgetPositioning: {
                horizontal: 'auto',
                vertical: 'bottom'
            },
            sideBySide: true,
            format: 'DD-MM-YYYY, HH:mm'
        });
    });
    $(function () {
        $('.date').datetimepicker({
            widgetPositioning: {
                horizontal: 'auto',
                vertical: 'bottom'
            },
            format: 'DD-MM-YYYY'
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
    $(function () {
        $('.datesql').datetimepicker({
            widgetPositioning: {
                horizontal: 'auto',
                vertical: 'bottom'
            },
            format: 'YYYY-MM-DD'
        });
    });
    $(function () {
        $('.datetimesql').datetimepicker({
            widgetPositioning: {
                horizontal: 'auto',
                vertical: 'bottom'
            },
            sideBySide: true,
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
}
