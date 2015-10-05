<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Wilco de Boer</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	
	<body>
        <!--sdh-->
		<div class="container-fluid" id="header">
			<a href="http://liacs.leidenuniv.nl/" target="_blank">
				<img src="images/leidenuniv.png" alt="Logo Universiteit Leiden">
			</a>
			<div class="container-fluid" id="headertext">
				<h1>W.F.H. de Boer</h1>
			</div>
		</div>
		
		<nav class="navbar navbar-blue">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">s1704362</a>
				</div>
				<div class="collapse navbar-collapse" id="mainNavbar">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="">Subjects
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="subject_fi1.php">Fundamentele Informatica</a></li>
							<li><a href="subject_pm.php">Programmeermethoden</a></li>
							<li><a href="subject_stpr.php">Studeren & Presenteren</a></li>
							<li><a href="subject_mg.php">Moleculaire Genetica</a></li>
							<li><a href="subject_bp.php">Basispracticum</a></li>
						  </ul>
						</li>
						<li><a href="semester-overview.php">Semester Overview</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="schedule.php">Schedule I&B</a></li>
						<li><a href="https://onedrive.live.com/view.aspx?resid=7A26A4E50EEC48CB!401&ithint=onenote%2c&app=OneNote&authkey=!ALF9KqGbBDdyK_M" target="_blank">Notes</a></li>
						<li><a href="http://www.color-hex.com/color-palette/10598" target="_blank">Color Palette</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
        <!--edh-->
		
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="col-sm-2" id="content-right">
				</div>
				<div class="col-sm-8" id="content-main">
					<div id="loginBoxFull" class="paragraph-center col-sm-12">
						<h2>Login Blackboard</h2>
						<noscript>
							<div class="receipt-bad-editmode">Please enable JavaScript in your browser for the Blackboard application to function.</div>
						</noscript>
						<form target="blackboard" action="https://blackboard.leidenuniv.nl/webapps/login/" onsubmit="return validate_form( this, false, true );" method="POST" name="login">
							<script type="text/javascript">
								function login_openForgotPassword( url )
								{
									var passwordWin = window.open( url, 'forgotPasswordWindow', 'menubar=1,resizable=1,scrollbars=1,status=1,width=850,height=480' );
									passwordWin.focus();
								}
								FastInit.addOnLoad(function()
								{
									if( typeof ClientCache !== 'undefined' )
									{
										ClientCache.clear();
									}
									var startingJSessionCookie = getCookie("JSESSIONID");
									var guestLocaleCookie = getCookie("guest.session.locale");
									deleteCookie("JSESSIONID", "/@@", null, true);
									deleteCookie("JSESSIONID", "/courses", null, true);
									deleteCookie("JSESSIONID", "/sessions", null, true);
									deleteCookie("JSESSIONID", "/systemdata", null, true);
									deleteCookie("JSESSIONID", "/images", null, true);
									deleteCookie("JSESSIONID", "/reportbranding", null, true);
									deleteCookie("JSESSIONID", "/reports", null, true);
									deleteCookie("JSESSIONID", "/modules", null, true);
									deleteCookie("JSESSIONID", "/branding", null, true);
									deleteCookie("JSESSIONID", "/sponsors", null, true);
									deleteCookie("JSESSIONID", "/course_image_main_images", null, true);
									deleteCookie("JSESSIONID", "/course_image_2_images", null, true);
									deleteCookie("JSESSIONID", "/course_image_nav_images", null, true);
									deleteCookie("JSESSIONID", "/org_image_main_images", null, true);
									deleteCookie("JSESSIONID", "/org_image_2_images", null, true);
									deleteCookie("JSESSIONID", "/org_image_nav_images", null, true);
									deleteCookie("JSESSIONID", "/avatar", null, true);
									deleteCookie("JSESSIONID", "/deployment", null, true);
									deleteCookie("JSESSIONID", "/content_area", null, true);
									deleteCookie("JSESSIONID", "/portfolio", null, true);
									deleteCookie("JSESSIONID", "/evidence_area", null, true);
									deleteCookie("JSESSIONID", "/public", null, true);
									deleteCookie("JSESSIONID", "/webapps/axis", null, true);
									deleteCookie("JSESSIONID", "/webapps/blackboard", null, true);
									deleteCookie("JSESSIONID", "/webapps/chalkbox", null, true);
									deleteCookie("JSESSIONID", "/webapps/collab", null, true);
									deleteCookie("JSESSIONID", "", null, true);
									deleteCookie("JSESSIONID", "/webapps/login", null, true);
									deleteCookie("JSESSIONID", "/webapps/portal", null, true);
									deleteCookie("JSESSIONID", "/webapps/soap", null, true);
									deleteCookie("JSESSIONID", "/webapps/taglibs", null, true);
									deleteCookie("JSESSIONID", "/webapps/ws", null, true);
									deleteCookie("JSESSIONID", "/webapps/wysiwyg", null, true);
									deleteCookie("JSESSIONID", "/xythosremoteadmin", null, true);
									deleteCookie("JSESSIONID", "/bbcswebdav", null, true);
									deleteCookie("JSESSIONID", "/webapps/cmsmain", null, true);
									deleteCookie("JSESSIONID", "/webapps/xythoswfs", null, true);
									deleteCookie("JSESSIONID", "/admin", null, true);
									deleteCookie("JSESSIONID", "/colorpalettes", null, true);
									deleteCookie("JSESSIONID", "/coursethemes", null, true);
									deleteCookie("JSESSIONID", "/common", null, true);
									deleteCookie("JSESSIONID", "/fonts", null, true);
									deleteCookie("JSESSIONID", "/javascript", null, true);
									deleteCookie("JSESSIONID", "/lib", null, true);
									deleteCookie("JSESSIONID", "/login", null, true);
									deleteCookie("JSESSIONID", "/themes", null, true);
									deleteCookie("JSESSIONID", "/ui", null, true);
									deleteCookie("JSESSIONID", "/webapps/dataIntegration", null, true);
									deleteCookie("JSESSIONID", "/webapps/goal", null, true);
									deleteCookie("JSESSIONID", "/api", null, true);
									deleteCookie("JSESSIONID", "/webapps/rubric", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-content-model-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/gradebook", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-gate-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/assessment", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-social-learning-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bbcms", null, true);
									deleteCookie("JSESSIONID", "/webapps/vtbe-tinymce", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-common-styles-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/submission-services", null, true);
									deleteCookie("JSESSIONID", "/webapps/portfolio", null, true);
									deleteCookie("JSESSIONID", "/webapps/inline-grading", null, true);
									deleteCookie("JSESSIONID", "/webapps/assignment", null, true);
									deleteCookie("JSESSIONID", "/webapps/software-updates", null, true);
									deleteCookie("JSESSIONID", "/webapps/streamViewer", null, true);
									deleteCookie("JSESSIONID", "/webapps/spreview", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-xss-input-validation-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bbgs-partner-cloud-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/caliper", null, true);
									deleteCookie("JSESSIONID", "/webapps/taskprogress", null, true);
									deleteCookie("JSESSIONID", "/webapps/cloud-profiles", null, true);
									deleteCookie("JSESSIONID", "/webapps/blogs-journals", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-group-mgmt-LEARN", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-mygrades-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/discussionboard", null, true);
									deleteCookie("JSESSIONID", "/webapps/sofo-mediasite-content-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/MWA-ACast-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bbgs-vitalsource-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-data-integration-lis-final-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-financial-aid-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/xplor-connector", null, true);
									deleteCookie("JSESSIONID", "/webapps/date-management", null, true);
									deleteCookie("JSESSIONID", "/webapps/cmsadmin", null, true);
									deleteCookie("JSESSIONID", "/webapps/plugins", null, true);
									deleteCookie("JSESSIONID", "/webapps/achievements", null, true);
									deleteCookie("JSESSIONID", "/webapps/enterpriseSurvey", null, true);
									deleteCookie("JSESSIONID", "/webapps/social-connector", null, true);
									deleteCookie("JSESSIONID", "/webapps/calendar", null, true);
									deleteCookie("JSESSIONID", "/webapps/BBBB-SIS-Reports-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-auth-provider-ldap-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-xss-filter-whitelist-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/retention", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-data-integration-ss-xml-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-data-integration-flatfile-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-auth-provider-shibboleth-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-auth-provider-cas-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-qa-fit-fixtures-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-alerts-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-theme-diff-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-xss-filter-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-esapi-plgnhndl-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/item-analysis", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-cx-ext-angel-plgnhndl-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-nautilus-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/urku-urkundplgn-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/turn-plgnhndl-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/rs-lockdown-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/ee-Eesypluginv2-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/mdb-sa-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/Bb-mobile-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/dto-richlink-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-cookie-disclosure-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-data-integration-lis-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/sen-whosonline-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/Bb-McGrawHill-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/grcc-LoginAs-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/eph-ephorus-assignment-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-data-integration-ims-xml-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/wvms-bb-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/Bb-wiki-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/hl-horizonlive-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-1027008845953-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-cx-ext-vista-plgnhndl-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-integration-gateway-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-vista-ext-plgnhndl-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-ce4-ext-plgnhndl-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/Bb-textbook-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-selfpeer-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/hw-po-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/any-echo360trial-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-ims-cc-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-mashups-flickr-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-cntplayer-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bbgs-cafescribe-integration-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bbgs-nbc-content-integration-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-mashups-youtube-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-leiden_guest-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-mashups-slideshare-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/3xo-unenroll-tool-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/RuG-agt-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/scor-scormengine-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/astr-1025622397760-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/Bb-sync-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/time-time-plgnhndl-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-link-checker-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/dto-Server-time-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/tr02-lectoratogb-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-1024692540287-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/bb-cx-ext-ce4-plgnhndl-bb_bb60", null, true);
									deleteCookie("JSESSIONID", "/webapps/searchwidgets", null, true);
									if (guestLocaleCookie != null)
									{
										setCookie("guest.session.locale", guestLocaleCookie);
									}
									setCookie("JSESSIONID", startingJSessionCookie);
								});
							</script>
							<div id="loginFormText">
								<p>Please enter your credentials and click the <b>Login</b> button below:</p>
							</div>
							<div id="loginFormFields">
								<ul id="loginFormList">
									<li class="login-field">
										<label for="user_id">Username:</label>
										<input name="user_id" id="user_id" size="25" maxlength="50" type="text">
									</li>
									<li class="login-field">
										<label for="password">Password:</label>
										<input size="25" name="password" id="password" autocomplete="off" type="password">
									</li>
									<li>
										<input class="submit-button" value="Login" name="login" type="submit">
									</li>
								</ul>
							</div>
							<input name="action" value="login" type="hidden">
							<input name="new_loc" value="" type="hidden">
						</form>
						<iframe name="blackboard" src="https://blackboard.leidenuniv.nl/webapps/login/" width="100%" height="0"></iframe>
					</div>
				</div>
				<div class="col-sm-2" id="content-left">
				</div>
			</div>
		</div>
		
		<!--sdf-->
		<div class="container-fluid" id="footer">
			<div class="row">
				<div class="col-sm-1" id="footer-right">
				</div>
				<div class="col-sm-10" id="footer-main">
					<h2>Contact</h2>
					<p>Wilco de Boer</p>
					<p>Email: <a href="mailto:deboer.wilco@gmail.com">deboer.wilco@gmail.com</a></p>
					<p>Umail: <a href="mailto:s1704362@umail.leidenuniv.nl">s1704362@umail.leidenuniv.nl</a></p>
					<p>Mobile number: +31 0637338259</p>
				</div>
				<div class="col-sm-1" id="footer-left">
				</div>
			</div>
		</div>
		<!--edf-->
	</body>
</html>