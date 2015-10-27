<?php

function err_404 () {
	return '<div class="paragraph-center col-sm-12"><h2>Error 404: Page not found</h2><p>The requested object could not be found. If you entered the URL manually, please check for errors. In case of a broken link, please contact the developer.</p></div>';
}

function err_500 () {
	return '<div class="paragraph-center col-sm-12"><h2>Error 500: Internal server error</h2><p>Internal server error. Please contact the developer.</p></div>';
}

function err_501 () {
	return '<div class="paragraph-center col-sm-12"><h2>Error 501: Database error</h2><p>Database error. Please contact the developer.</p></div>';
}

?>
