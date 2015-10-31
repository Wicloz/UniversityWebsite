-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 okt 2015 om 21:00
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL,
  `category` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`id`, `category`, `name`, `content`) VALUES
(1, 'calendars', 'exams', '<iframe class="calendar" src="https://calendar.google.com/calendar/embed?title=Exams%20I%26B&amp;mode=MONTH&amp;height=600&amp;wkst=2&amp;hl=en_GB&amp;bgcolor=%23FFFFFF&amp;src=ai9kouej2b434he9otn9pvd66c%40group.calendar.google.com&amp;color=%232F6309&amp;ctz=Europe%2FAmsterdam" frameborder="0" scrolling="no"></iframe>'),
(2, 'calendars', 'schedule', '<iframe class="calendar" src="https://calendar.google.com/calendar/embed?title=Schedule%20I%26B&amp;mode=WEEK&amp;height=600&amp;wkst=7&amp;hl=en_GB&amp;bgcolor=%23FFFFFF&amp;src=ai9kouej2b434he9otn9pvd66c%40group.calendar.google.com&amp;color=%232F6309&amp;src=a4qi9uldsf0stvtvp24d0vc008%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=Europe%2FAmsterdam" frameborder="0" scrolling="no"></iframe>'),
(3, 'calendars', 'schedule_1ejrnaj', '<a target="_blank" href="http://liacs.leidenuniv.nl/assets/Roosters-2015-2016/1e-jr-IB-naj-2015-2016.pdf"><img class="rooster-img" src="media/articles/1e-jr-IB-naj-2015-2016-page-001.jpg" alt="Rooster Najaar"></a>'),
(4, 'calendars', 'schedule_1ejrvoorj', '<a target="_blank" href="http://liacs.leidenuniv.nl/assets/Roosters-2015-2016/1e-jr-IB-voorj-2015-2016.pdf"><img class="rooster-img" src="media/articles/1e-jr-IB-voorj-2015-2016-page-001.jpg" alt="Rooster Voorjaar"></a>'),
(5, 'forms', 'bblogin', '<h2>Login Blackboard</h2>\r\n<noscript>\r\n<div class="receipt-bad-editmode">Please enable JavaScript in your browser for the Blackboard application to function.</div>\r\n</noscript>\r\n<form target="blackboard" action="https://blackboard.leidenuniv.nl/webapps/login/" onsubmit="return validate_form( this, false, true );" method="POST" name="login">\r\n<script type="text/javascript">\r\nfunction login_openForgotPassword( url ) {\r\nvar passwordWin = window.open( url, ''forgotPasswordWindow'', ''menubar=1,resizable=1,scrollbars=1,status=1,width=850,height=480'' );\r\npasswordWin.focus();\r\n}\r\nFastInit.addOnLoad(function() {\r\nif( typeof ClientCache !== ''undefined'' ) {\r\nClientCache.clear();\r\n}\r\nvar startingJSessionCookie = getCookie("JSESSIONID");\r\nvar guestLocaleCookie = getCookie("guest.session.locale");\r\ndeleteCookie("JSESSIONID", "/@@", null, true);\r\ndeleteCookie("JSESSIONID", "/courses", null, true);\r\ndeleteCookie("JSESSIONID", "/sessions", null, true);\r\ndeleteCookie("JSESSIONID", "/systemdata", null, true);\r\ndeleteCookie("JSESSIONID", "/images", null, true);\r\ndeleteCookie("JSESSIONID", "/reportbranding", null, true);\r\ndeleteCookie("JSESSIONID", "/reports", null, true);\r\ndeleteCookie("JSESSIONID", "/modules", null, true);\r\ndeleteCookie("JSESSIONID", "/branding", null, true);\r\ndeleteCookie("JSESSIONID", "/sponsors", null, true);\r\ndeleteCookie("JSESSIONID", "/course_image_main_images", null, true);\r\ndeleteCookie("JSESSIONID", "/course_image_2_images", null, true);\r\ndeleteCookie("JSESSIONID", "/course_image_nav_images", null, true);\r\ndeleteCookie("JSESSIONID", "/org_image_main_images", null, true);\r\ndeleteCookie("JSESSIONID", "/org_image_2_images", null, true);\r\ndeleteCookie("JSESSIONID", "/org_image_nav_images", null, true);\r\ndeleteCookie("JSESSIONID", "/avatar", null, true);\r\ndeleteCookie("JSESSIONID", "/deployment", null, true);\r\ndeleteCookie("JSESSIONID", "/content_area", null, true);\r\ndeleteCookie("JSESSIONID", "/portfolio", null, true);\r\ndeleteCookie("JSESSIONID", "/evidence_area", null, true);\r\ndeleteCookie("JSESSIONID", "/public", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/axis", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/blackboard", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/chalkbox", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/collab", null, true);\r\ndeleteCookie("JSESSIONID", "", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/login", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/portal", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/soap", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/taglibs", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/ws", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/wysiwyg", null, true);\r\ndeleteCookie("JSESSIONID", "/xythosremoteadmin", null, true);\r\ndeleteCookie("JSESSIONID", "/bbcswebdav", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/cmsmain", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/xythoswfs", null, true);\r\ndeleteCookie("JSESSIONID", "/admin", null, true);\r\ndeleteCookie("JSESSIONID", "/colorpalettes", null, true);\r\ndeleteCookie("JSESSIONID", "/coursethemes", null, true);\r\ndeleteCookie("JSESSIONID", "/common", null, true);\r\ndeleteCookie("JSESSIONID", "/fonts", null, true);\r\ndeleteCookie("JSESSIONID", "/javascript", null, true);\r\ndeleteCookie("JSESSIONID", "/lib", null, true);\r\ndeleteCookie("JSESSIONID", "/login", null, true);\r\ndeleteCookie("JSESSIONID", "/themes", null, true);\r\ndeleteCookie("JSESSIONID", "/ui", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/dataIntegration", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/goal", null, true);\r\ndeleteCookie("JSESSIONID", "/api", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/rubric", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-content-model-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/gradebook", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-gate-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/assessment", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-social-learning-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbcms", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/vtbe-tinymce", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-common-styles-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/submission-services", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/portfolio", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/inline-grading", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/assignment", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/software-updates", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/streamViewer", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/spreview", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-xss-input-validation-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbgs-partner-cloud-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/caliper", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/taskprogress", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/cloud-profiles", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/blogs-journals", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-group-mgmt-LEARN", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-mygrades-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/discussionboard", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/sofo-mediasite-content-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/MWA-ACast-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbgs-vitalsource-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-lis-final-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-financial-aid-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/xplor-connector", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/date-management", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/cmsadmin", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/plugins", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/achievements", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/enterpriseSurvey", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/social-connector", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/calendar", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/BBBB-SIS-Reports-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-auth-provider-ldap-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-xss-filter-whitelist-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/retention", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-ss-xml-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-flatfile-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-auth-provider-shibboleth-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-auth-provider-cas-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-qa-fit-fixtures-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-alerts-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-theme-diff-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-xss-filter-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-esapi-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/item-analysis", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cx-ext-angel-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-nautilus-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/urku-urkundplgn-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/turn-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/rs-lockdown-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/ee-Eesypluginv2-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/mdb-sa-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-mobile-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/dto-richlink-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cookie-disclosure-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-lis-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/sen-whosonline-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-McGrawHill-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/grcc-LoginAs-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/eph-ephorus-assignment-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-ims-xml-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/wvms-bb-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-wiki-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/hl-horizonlive-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-1027008845953-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cx-ext-vista-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-integration-gateway-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-vista-ext-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-ce4-ext-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-textbook-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-selfpeer-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/hw-po-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/any-echo360trial-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-ims-cc-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-mashups-flickr-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cntplayer-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbgs-cafescribe-integration-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbgs-nbc-content-integration-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-mashups-youtube-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-leiden_guest-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-mashups-slideshare-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/3xo-unenroll-tool-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/RuG-agt-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/scor-scormengine-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/astr-1025622397760-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-sync-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/time-time-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-link-checker-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/dto-Server-time-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/tr02-lectoratogb-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-1024692540287-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cx-ext-ce4-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/searchwidgets", null, true);\r\nif (guestLocaleCookie != null) {\r\nsetCookie("guest.session.locale", guestLocaleCookie);\r\n}\r\nsetCookie("JSESSIONID", startingJSessionCookie);\r\n});\r\n</script>\r\n<div id="loginFormText">\r\n<p>Please enter your credentials and click the <b>Login</b> button below:</p>\r\n</div>\r\n<div id="loginFormFields">\r\n<ul id="loginFormList">\r\n<li class="login-field">\r\n<label for="user_id">Username:</label>\r\n<input name="user_id" id="user_id" size="25" maxlength="50" type="text">\r\n</li>\r\n<li class="login-field">\r\n<label for="password">Password:</label>\r\n<input size="25" name="password" id="password" autocomplete="off" type="password">\r\n</li>\r\n<li>\r\n<input class="submit-button" value="Login" name="login" type="submit">\r\n</li>\r\n</ul>\r\n</div>\r\n<input name="action" value="login" type="hidden">\r\n<input name="new_loc" value="" type="hidden">\r\n</form>\r\n<iframe name="blackboard" src="https://blackboard.leidenuniv.nl/webapps/login/" width="100%" height="0"></iframe>'),
(11, 'text', 'introduction', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
