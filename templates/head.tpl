<head>
    <title>{$title|default:"s1704362"}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/css/style.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment-with-locales.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script>
        moment().format();
    </script>
    <script type="text/javascript">
        $(function () {
            $('.datetime').datetimepicker({
                sideBySide: true,
                format: 'DD/MM/YYYY, HH:mm'
            });
        });
        $(function () {
            $('.date').datetimepicker({
                format: 'DD/MM/YYYY'
            });
        });
        $(function () {
            $('.time').datetimepicker({
                format: 'HH:mm:ss'
            });
        });
        $(function () {
            $('.duration').datetimepicker({
                useCurrent: false,
                format: 'HH:mm:ss'
            });
        });
    </script>
</head>
