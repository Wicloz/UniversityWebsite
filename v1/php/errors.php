<?php

function err_404 () {
	return '<div class="paragraph-center col-sm-12"><h2>Error 404: Page not found</h2><p>Sorry, it seems you were trying to access a page that doesn\'t exist. Please check the spelling of the URL you were trying to access and try again.<br>If you are of the opinion the server is at fault, please contact the developer.</p><img src="media/404.png" width=100% alt="404"></div>';
}

function err_500 () {
	return '<div class="paragraph-center col-sm-12"><h2>Error 500: Internal server error</h2><p>Internal server error. Please contact the developer.</p></div>';
}

function err_501 () {
	return '<div class="paragraph-center col-sm-12"><h2>Error 501: Database error</h2><p>Database error. Please contact the developer.</p></div>';
}

?>
