<head>
    <title>{$title|default:"s1704362"}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="components/css/bootstrap.min.css">
    <link rel="stylesheet" href="components/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="components/css/jquery.jgrowl.min.css">
    <link rel="stylesheet" href="components/jsoneditor/jsoneditor.min.css">
    <link rel="stylesheet" href="app/js/poof.form.min.css">
    <link rel="stylesheet" href="app/css/style.min.css">

    <script src="components/js/jquery-3.1.0.min.js"></script>
    <script src="components/js/bootstrap.min.js"></script>
    <script src="app/js/listeners.screen.js"></script>
    <script src="components/js/jquery.jgrowl.min.js"></script>
    <script>
        (function($){
            $(function(){
                $.jGrowl.defaults.closerTemplate = '<div class="alert-close">[ Close All ]</div>';
                $.jGrowl.defaults.position = 'center';
                $.jGrowl.defaults.life = 6000;
            });
        })(jQuery);
    </script>
    <script src="components/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea'
        });
    </script>
    <script src="components/jsoneditor/jsoneditor.min.js"></script>
</head>
