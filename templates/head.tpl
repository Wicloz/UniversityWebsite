<head>
    <title>{$title|default:"s1704362"}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css">
    <link rel="stylesheet" href="vendor/cmskit/jsoneditor/jsoneditor.min.css">
    <link rel="stylesheet" href="app/css/style.min.css">
    <script src="components/jquery/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="app/js/listeners.screen.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
    <script>
        (function($){
            $(function(){
                $.jGrowl.defaults.closerTemplate = '<div class="alert-close">[ Close All ]</div>';
                $.jGrowl.defaults.position = 'center';
                $.jGrowl.defaults.life = 6000;
            });
        })(jQuery);
    </script>
    <script src="app/components/ckeditor/ckeditor.js"></script>
    <script src="components/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea'
        });
    </script>
    <script src="vendor/cmskit/jsoneditor/jsoneditor.min.js"></script>
</head>
