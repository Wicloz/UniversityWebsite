-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: putter.vuw.leidenuniv.nl:3306
-- Generation Time: Apr 02, 2016 at 02:23 PM
-- Server version: 5.5.47-log
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s1704362`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `category` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category`, `name`, `content`) VALUES
(1, 'calendars', 'exams', '<iframe class="calendar" src="https://calendar.google.com/calendar/embed?title=Exams%20I%26B&amp;mode=MONTH&amp;height=600&amp;wkst=2&amp;hl=en_GB&amp;bgcolor=%23FFFFFF&amp;src=ai9kouej2b434he9otn9pvd66c%40group.calendar.google.com&amp;color=%232F6309&amp;ctz=Europe%2FAmsterdam" frameborder="0" scrolling="no"></iframe>'),
(2, 'calendars', 'schedule', '<iframe class="calendar" src="https://calendar.google.com/calendar/embed?title=Schedule%20I%26B&amp;mode=WEEK&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=rtl0qkkkc1ldlfphb15264s368%40group.calendar.google.com&amp;color=%23711616&amp;src=ai9kouej2b434he9otn9pvd66c%40group.calendar.google.com&amp;color=%232F6309&amp;src=a4qi9uldsf0stvtvp24d0vc008%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=Europe%2FAmsterdam" frameborder="0" scrolling="no"></iframe>'),
(3, 'calendars', 'schedule_1ejrnaj', '<a target="_blank" href="http://liacs.leidenuniv.nl/assets/Roosters-2015-2016/1e-jr-IB-naj-2015-2016_3.pdf"><img class="rooster-img" src="media/schedules/1e-jr-IB-naj-2015-2016_3-1.png" alt="Rooster Najaar"></a>'),
(4, 'calendars', 'schedule_1ejrvoorj', '<a target="_blank" href="http://liacs.leidenuniv.nl/assets/Roosters-2015-2016/1e-jr-IB-voorj-2015-2016.pdf"><img class="rooster-img" src="media/schedules/1e-jr-IB-voorj-2015-2016-1.png" alt="Rooster Voorjaar"></a>'),
(5, 'forms', 'bblogin', '<h2>Login Blackboard</h2>\r\n<noscript>\r\n<div class="receipt-bad-editmode">Please enable JavaScript in your browser for the Blackboard application to function.</div>\r\n</noscript>\r\n<form target="blackboard" action="https://blackboard.leidenuniv.nl/webapps/login/" onsubmit="return validate_form( this, false, true );" method="POST" name="login">\r\n<script type="text/javascript">\r\nfunction login_openForgotPassword( url ) {\r\nvar passwordWin = window.open( url, ''forgotPasswordWindow'', ''menubar=1,resizable=1,scrollbars=1,status=1,width=850,height=480'' );\r\npasswordWin.focus();\r\n}\r\nFastInit.addOnLoad(function() {\r\nif( typeof ClientCache !== ''undefined'' ) {\r\nClientCache.clear();\r\n}\r\nvar startingJSessionCookie = getCookie("JSESSIONID");\r\nvar guestLocaleCookie = getCookie("guest.session.locale");\r\ndeleteCookie("JSESSIONID", "/@@", null, true);\r\ndeleteCookie("JSESSIONID", "/courses", null, true);\r\ndeleteCookie("JSESSIONID", "/sessions", null, true);\r\ndeleteCookie("JSESSIONID", "/systemdata", null, true);\r\ndeleteCookie("JSESSIONID", "/images", null, true);\r\ndeleteCookie("JSESSIONID", "/reportbranding", null, true);\r\ndeleteCookie("JSESSIONID", "/reports", null, true);\r\ndeleteCookie("JSESSIONID", "/modules", null, true);\r\ndeleteCookie("JSESSIONID", "/branding", null, true);\r\ndeleteCookie("JSESSIONID", "/sponsors", null, true);\r\ndeleteCookie("JSESSIONID", "/course_image_main_images", null, true);\r\ndeleteCookie("JSESSIONID", "/course_image_2_images", null, true);\r\ndeleteCookie("JSESSIONID", "/course_image_nav_images", null, true);\r\ndeleteCookie("JSESSIONID", "/org_image_main_images", null, true);\r\ndeleteCookie("JSESSIONID", "/org_image_2_images", null, true);\r\ndeleteCookie("JSESSIONID", "/org_image_nav_images", null, true);\r\ndeleteCookie("JSESSIONID", "/avatar", null, true);\r\ndeleteCookie("JSESSIONID", "/deployment", null, true);\r\ndeleteCookie("JSESSIONID", "/content_area", null, true);\r\ndeleteCookie("JSESSIONID", "/portfolio", null, true);\r\ndeleteCookie("JSESSIONID", "/evidence_area", null, true);\r\ndeleteCookie("JSESSIONID", "/public", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/axis", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/blackboard", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/chalkbox", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/collab", null, true);\r\ndeleteCookie("JSESSIONID", "", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/login", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/portal", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/soap", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/taglibs", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/ws", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/wysiwyg", null, true);\r\ndeleteCookie("JSESSIONID", "/xythosremoteadmin", null, true);\r\ndeleteCookie("JSESSIONID", "/bbcswebdav", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/cmsmain", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/xythoswfs", null, true);\r\ndeleteCookie("JSESSIONID", "/admin", null, true);\r\ndeleteCookie("JSESSIONID", "/colorpalettes", null, true);\r\ndeleteCookie("JSESSIONID", "/coursethemes", null, true);\r\ndeleteCookie("JSESSIONID", "/common", null, true);\r\ndeleteCookie("JSESSIONID", "/fonts", null, true);\r\ndeleteCookie("JSESSIONID", "/javascript", null, true);\r\ndeleteCookie("JSESSIONID", "/lib", null, true);\r\ndeleteCookie("JSESSIONID", "/login", null, true);\r\ndeleteCookie("JSESSIONID", "/themes", null, true);\r\ndeleteCookie("JSESSIONID", "/ui", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/dataIntegration", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/goal", null, true);\r\ndeleteCookie("JSESSIONID", "/api", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/rubric", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-content-model-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/gradebook", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-gate-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/assessment", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-social-learning-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbcms", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/vtbe-tinymce", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-common-styles-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/submission-services", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/portfolio", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/inline-grading", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/assignment", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/software-updates", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/streamViewer", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/spreview", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-xss-input-validation-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbgs-partner-cloud-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/caliper", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/taskprogress", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/cloud-profiles", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/blogs-journals", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-group-mgmt-LEARN", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-mygrades-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/discussionboard", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/sofo-mediasite-content-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/MWA-ACast-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbgs-vitalsource-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-lis-final-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-financial-aid-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/xplor-connector", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/date-management", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/cmsadmin", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/plugins", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/achievements", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/enterpriseSurvey", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/social-connector", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/calendar", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/BBBB-SIS-Reports-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-auth-provider-ldap-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-xss-filter-whitelist-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/retention", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-ss-xml-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-flatfile-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-auth-provider-shibboleth-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-auth-provider-cas-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-qa-fit-fixtures-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-alerts-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-theme-diff-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-xss-filter-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-esapi-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/item-analysis", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cx-ext-angel-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-nautilus-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/urku-urkundplgn-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/turn-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/rs-lockdown-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/ee-Eesypluginv2-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/mdb-sa-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-mobile-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/dto-richlink-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cookie-disclosure-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-lis-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/sen-whosonline-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-McGrawHill-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/grcc-LoginAs-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/eph-ephorus-assignment-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-data-integration-ims-xml-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/wvms-bb-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-wiki-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/hl-horizonlive-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-1027008845953-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cx-ext-vista-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-integration-gateway-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-vista-ext-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-ce4-ext-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-textbook-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-selfpeer-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/hw-po-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/any-echo360trial-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-ims-cc-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-mashups-flickr-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cntplayer-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbgs-cafescribe-integration-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bbgs-nbc-content-integration-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-mashups-youtube-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-leiden_guest-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-mashups-slideshare-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/3xo-unenroll-tool-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/RuG-agt-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/scor-scormengine-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/astr-1025622397760-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/Bb-sync-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/time-time-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-link-checker-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/dto-Server-time-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/tr02-lectoratogb-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-1024692540287-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/bb-cx-ext-ce4-plgnhndl-bb_bb60", null, true);\r\ndeleteCookie("JSESSIONID", "/webapps/searchwidgets", null, true);\r\nif (guestLocaleCookie != null) {\r\nsetCookie("guest.session.locale", guestLocaleCookie);\r\n}\r\nsetCookie("JSESSIONID", startingJSessionCookie);\r\n});\r\n</script>\r\n<div id="loginFormText">\r\n<p>Please enter your credentials and click the <b>Login</b> button below:</p>\r\n</div>\r\n<div id="loginFormFields">\r\n<ul id="loginFormList">\r\n<li class="login-field">\r\n<label for="user_id">Username:</label>\r\n<input name="user_id" id="user_id" size="25" maxlength="50" type="text">\r\n</li>\r\n<li class="login-field">\r\n<label for="password">Password:</label>\r\n<input size="25" name="password" id="password" autocomplete="off" type="password">\r\n</li>\r\n<li>\r\n<input class="submit-button-bb" value="Login" name="login" type="submit">\r\n</li>\r\n</ul>\r\n</div>\r\n<input name="action" value="login" type="hidden">\r\n<input name="new_loc" value="" type="hidden">\r\n</form>\r\n<iframe name="blackboard" src="https://blackboard.leidenuniv.nl/webapps/login/" width="100%" height="0"></iframe>'),
(11, 'text', 'introduction', '<h2>Wilco''s Study Website</h2>\r\n<p>This website has been developed partially because of a Study Skills and Presentation assignment and partially for my own needs. The planning works by setting a study goal to complete on a certain day. These goals are linked to an assignment, exam or subject and show up on the relevant pages. In addition to that, all the goals for today (and also any assignment deadlines or exams that occur today) show up at the home page.</p>\r\n<p>Also see the <a href="https://github.com/Wicloz/UniversityWebsite">Github Repository</a> for the source code.</p>'),
(12, 'calendars', 'agenda', '<iframe class="calendar" src="https://calendar.google.com/calendar/embed?title=Agenda&amp;mode=WEEK&amp;height=600&amp;wkst=2&amp;hl=en_GB&amp;bgcolor=%23FFFFFF&amp;src=deboer.wilco%40gmail.com&amp;color=%238C500B&amp;src=0e2k1khmh7bc113eiapm0d8qfk%40group.calendar.google.com&amp;color=%23182C57&amp;src=nl.dutch%23holiday%40group.v.calendar.google.com&amp;color=%2323164E&amp;src=ai9kouej2b434he9otn9pvd66c%40group.calendar.google.com&amp;color=%232F6309&amp;src=a4qi9uldsf0stvtvp24d0vc008%40group.calendar.google.com&amp;color=%23125A12&amp;src=%23contacts%40group.v.calendar.google.com&amp;color=%2323164E&amp;ctz=Europe%2FAmsterdam" frameborder="0" scrolling="no"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
`id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `subject` varchar(8) NOT NULL,
  `desc_short` varchar(100) NOT NULL,
  `desc_full` text NOT NULL,
  `link_assignment` text NOT NULL,
  `link_repository` text NOT NULL,
  `link_report` text NOT NULL,
  `team` varchar(100) NOT NULL,
  `completion` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `start_date`, `end_date`, `end_time`, `subject`, `desc_short`, `desc_full`, `link_assignment`, `link_repository`, `link_report`, `team`, `completion`) VALUES
(1, '2015-09-02', '2015-09-18', '17:00:00', 'pr', 'Programmeeropdracht 1: Beta', 'Deze opgave probeert te bepalen of iemand geschikt is voor een studie aan de universiteit: de loting wordt immers afgeschaft. Daartoe moeten enkele vragen beantwoord worden; zo moet de kandidaat weten op welke dag hij/zij geboren is. En als je denkt dat 1/3 + 1/4 gelijk is aan 2/7, is een beta-studie misschien niet verstandig.', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op1pm.php', 'https://github.com/Wicloz/PMPO/tree/master/PMPO_Beta/src', '', 'David Nieuwenhuizen', 1),
(2, '2015-09-23', '2015-10-09', '17:00:00', 'pr', 'Programmeeropdracht 2: Geheim', 'Staan er geheime boodschappen in teksten? En wat voor getallen staan in die boodschappen? Deze vragen gaan we beantwoorden!', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op2pm.php', 'https://github.com/Wicloz/PMPO/tree/master/PMPO_Geheim', '', 'Martijn Blokker', 1),
(3, '2015-10-14', '2015-11-06', '17:00:00', 'pr', 'Programmeeropdracht 3: Life', 'Het is de bedoeling om een C++-programma te maken dat de gebruiker in staat stelt Life te spelen via een menu-systeem. Dat betekent dat de gebruiker van het programma kan kiezen uit een aantal mogelijkheden, de zogeheten opties. Er is ï¿½ï¿½n submenu, waarin ook weer enkele opties zijn. De bedoeling is dat het hele menu op ï¿½ï¿½n regel staat, onder de wereld (zie verderop). De opties worden gekozen door de eerste letter van de betreffende optie in te toetsen (gevolgd door Enter), bijvoorbeeld een s of S om te stoppen. Uiteraard wordt een en ander duidelijk en ondubbelzinnig aan de gebruiker meegedeeld. Gebruik geen recursie!', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op3pm.php', 'https://github.com/Wicloz/PMPO/tree/master/PMPO_Life', '', '', 1),
(4, '2015-09-28', '2015-10-15', '23:59:00', 'bp', 'Bacterial Growth', 'Beantwoord vragen op het stencil betreffende bacterial growth. Zie blackboard voor downloadlink.', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3364455-dt-content-rid-3137349_1/xid-3137349_1', '', '', '', 1),
(5, '2015-09-22', '2015-11-06', '17:00:00', 'stpr', 'Semester study timetable', 'Produce a semester study timetable that contains: 1. A semester overview, which displays all your classes, the assignment deadlines for each class and exam dates for each class. 2. A detailed weekly planning schedule for the week before your first exam until your last exam. The semester timetable and weekly plans should have an interactive web front-end.  Classes, deadlines, exams and dates should be served from a mySQL database. Deadlines and classes should link to further details on LIACS course websites and the semester overview should link to the weekly plans. Weekly plans should also include other events and activities that you need to plan in the same time periods (e.g. Christmas holidays, part-time jobs, etc).', 'http://liacs.leidenuniv.nl/~wolstencroftkj/Assignment1_SSP.pdf', 'https://github.com/Wicloz/UniversityWebsite', '', '', 1),
(6, '2015-11-11', '2015-12-04', '17:00:00', 'pr', 'Programmeeropdracht 4: Othello', 'Het is de bedoeling om een C++-programma te maken dat de gebruiker in staat stelt het spel Othello (zie ook Reversi) te spelen via een eenvoudig menu. Othello-borden worden in het C++-programma gerepresenteerd door ingewikkelde pointer-structuren. Het is de bedoeling een klasse OthelloBord te maken, die onder meer memberfuncties heeft als afdrukken, spelerzet en computerzet. Uiteraard heeft deze klasse ook een constructor en een destructor. Verder moeten gedane zetten met behulp van een stapel ongedaan gemaakt kunnen worden, en kan het aantal vervolgpartijen worden uitgerekend.', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op4pm.php', 'https://github.com/Wicloz/PMPO/tree/master/PMPO_Othello', '', 'Jevan Kolk', 1),
(7, '2015-11-17', '2015-11-24', '11:15:00', 'stpr', 'Presentation Human Microbiome', 'Each group of two will have ten minutes to explain their theory as an oral presentation. You can use slides and/or draw diagrams on the chalk boards available. During the presentation:<br>1. Explain the current theory, using diagrams and analogies if they are helpful.<br>2. Explain the origins and history of the theory (i.e. who proposed it and when, what was the prevailing theory before this was proposed, and are there any credible ideas that may contradict the current theory).<br>3. Briefly give your own opinion of the theory. Is it credible? Has it stood the test of time?<br>Both members of each team should be involved with researching and preparing the presentation and both members of the team should be involved with presenting.', 'http://liacs.leidenuniv.nl/~wolstencroftkj/Assignment2_SSP.pdf', 'https://drive.google.com/drive/folders/0B44Sn7Hnnnhhb3lib2hBZFZ0NlU', 'https://docs.google.com/presentation/d/1swmxPdS5kHq7Yv_6EO_p7YHtWSZGPKpV8A42M3h2LIQ/edit?usp=sharing', 'Martijn Blokker', 1),
(9, '2015-12-08', '2015-12-11', '17:00:00', 'stpr', 'Written article Human Microbiome', 'In groups of two, explain the same scientific theory as a written article of no more than 3 pages (one report per group of two).<br><br>In this exercise, imagine that you are a science journalist writing about this theory just after it has been proposed. You are writing for a general audience without much scientific knowledge, so you will need to engage their interest and help them understand why this discovery is important.<br>In your report, explain the theory, but also explain why this theory is important for society. Will it change the world? If so, how? How will this work influence future research? You might also wish to discuss whether or not the theory is controversial. If it is, who is it controversial for?', 'http://liacs.leidenuniv.nl/~wolstencroftkj/Assignment3_SSP.pdf', 'https://nl.sharelatex.com/project/5666b4b1182bc84705fe5f8b', 'https://nl.sharelatex.com/project/5666b4b1182bc84705fe5f8b/output/output.pdf', 'Martijn Blokker', 1),
(10, '0000-00-00', '2016-04-21', '09:00:00', 'bc', 'Presentatie', '', '', '', '', '', 0),
(12, '2016-02-16', '2016-02-23', '00:00:00', 'lo', 'Homework 1', '', 'http://liacs.leidenuniv.nl/~bonsanguemm/Logic/hw2016.1.pdf', '', '', '', 1),
(13, '2016-02-24', '2016-03-27', '23:59:00', 'db', 'Practical Assignment 1', 'This practical assignment consists of three parts and should be delivered by March 27th 23:59pm.', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3497614-dt-content-rid-3488943_1/courses/4031DABA6-1516FWN/assignment.pdf', '', '', '', 1),
(14, '2016-02-15', '2016-03-21', '12:00:00', 'alg', 'Programmeeropdracht 1 (brute force)', 'Een mogelijke werkwijze bij het programmeren is:      Lees de opdracht helemaal door, want bijvoorbeeld vragen die je in het verslag moet beantwoorden, kunnen helpen bij de implementatie.     Toestand-actie-ruimtes zoals die in het verslag moeten komen, behandelen we bij het derde college, op vrijdag 19 februari 2016 en bij het werkcollege van donderdag 25 februari.     Implementeer achtereenvolgens:         constructor(s)         functie drukaf         functie eindstand         functie doezet(kolom), zowel voor gewoon vooruitzetten als voor slaan         recursieve functie winst (aantal)         functie doerandomzet         functie bestezet     Het is verstandig om in principe na elke nieuwe functie (of deel daarvan) te testen of het programma doet wat je verwacht, door de op dat moment geschreven functies aan te roepen vanuit main.cc.', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/een2016.pdf', 'https://github.com/Wicloz/ALGPO/tree/master/ALGPO_BruteForce', '', 'Jevan Kolk', 1),
(15, '2016-03-01', '2016-03-08', '00:00:00', 'lo', 'Homework 2', '', 'http://liacs.leidenuniv.nl/~bonsanguemm/Logic/hw2016.2.pdf', '', '', '', 1),
(16, '2016-03-15', '2016-03-22', '00:00:00', 'oib', 'Lees artikel door Ewen Callaway', '', 'https://app.perusall.com/courses/informatica-and-biologie/callaway-2011/dXdtWrYuymGPWZbxY', '', '', '', 1),
(17, '2016-03-14', '2016-05-30', '23:59:00', 'oo', '3 verslagen interviews inleveren', '', 'https://studiegids.leidenuniv.nl/courses/show/55111/onderzoek-onderzoekers', '', '', '', 0),
(18, '2016-03-14', '2016-06-13', '23:59:00', 'oo', 'Beoordeel de 3 verslagen', '', 'https://studiegids.leidenuniv.nl/courses/show/55111/onderzoek-onderzoekers', '', '', '', 0),
(19, '2016-03-22', '2016-04-03', '00:00:00', 'lo', 'Homework 3', '', 'http://liacs.leidenuniv.nl/~bonsanguemm/Logic/hw2016.3.pdf', '', '', '', 0),
(20, '2016-03-22', '2016-03-29', '11:15:00', 'oib', 'Doe de R cursus op DataCamp', '', 'https://www.datacamp.com/courses/free-introduction-to-r', '', '', '', 1),
(21, '0000-00-00', '2016-04-25', '13:00:00', 'bc', 'Verslag LDH inleveren', '', '', '', '', '', 0),
(22, '2016-03-24', '2016-04-18', '12:00:00', 'alg', 'Programmeeropdracht 2 (knock out)', 'Het programma en Makefile per e-mail sturen naar: j.m.de.graaf@liacs.leidenuniv.nl<br>Zorg dat het onderwerp van je mail begint met ”[ALGO]”, dat scheelt de docent een hoop gezoek. Het verslag (inclusief het programma) moet op papier worden ingeleverd in de daartoe bestemde doos met opschrift Algoritmiek in de postkamer van Informatica, kamer 156. Voor elke week te laat inleveren gaat er een punt van het cijfer af. Vermeld overal duidelijk de namen van de makers.', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/twee2016.pdf', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` varchar(20) NOT NULL,
  `subject` varchar(8) NOT NULL,
  `substance` text NOT NULL,
  `link` text NOT NULL,
  `mark` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `date`, `weight`, `subject`, `substance`, `link`, `mark`) VALUES
(1, '2015-09-21', 'Toets', 'mg', '', '', 7.1),
(2, '2015-10-16', 'Tentamen', 'mg', '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155460_1&handle=announcements_entry&mode=view#anonymous_element_13', 7.8),
(3, '2015-10-19', 'Toets', 'fi1', '', '', 9),
(4, '2015-12-11', 'Tentamen', 'mi', 'H27.1, H27.3<br>H5.3, H8.1<br>PP. 629<br>H27.6<br>H7.2, H25.3, H31<br>H10, H18, H55.4<br>H37.3, H27.5<br><br>Syllabus, powerpoints, notities', '', 6.14),
(5, '2015-12-17', 'Tentamen', 'cb', 'Campbell:<br>H5<br>H6<br>H7<br>H8<br>H9<br>H10, tot 10.4<br>H12<br>H18.5', '', 10),
(6, '2015-12-22', 'Tentamen', 'fi1', '', '', 9.5),
(7, '2016-01-05', 'Tentamen', 'pr', '', '', 9),
(8, '2015-11-11', 'Tentamen', 'cf', 'Biochemische reacties: (Thermodynamica, Vrije energie, Biochemische reacties, Evenwichten)<br>- H6.1, H6.2, H6.3<br><br>Membraantransport: (Membraantransport, Diffusie, Transporteiwitten, Osmose)<br>- H8.2, H8.3, H8.4<br>- H36.2 (''Short-Distance Transport of Water Across Plasma Membranes'')<br>- H48.2, H48.3 (behalve ''Evolution'')<br><br>Energietransformatie: (Redoxprocessen, Fotosystemen, Protonenpompen, Fosforylering)<br>- H10.1, H10.4<br>- H11<br><br>Powerpoints, Notities en Syllabus', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3345291-dt-content-rid-3087777_1/xid-3087777_1', 8.8),
(9, '2016-02-04', 'Toets', 'bc', '', '', 9.51),
(10, '2016-04-25', 'Tentamen', 'bc', '', '', 0),
(11, '2016-03-24', 'Toets', 'bc', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` text NOT NULL,
  `sub_names` text NOT NULL,
  `sub_urls` text NOT NULL,
  `header` varchar(20) NOT NULL,
  `target` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `url`, `sub_names`, `sub_urls`, `header`, `target`) VALUES
(1, 'Home', '?page=home', '', '', '', ''),
(2, 'Semester Overview', '?page=semester-overview', 'Semester Overview, Assignments, Exams, Planning', '?page=semester-overview, ?page=assignments, ?page=exams, ?page=planning', 'Overview', ''),
(3, 'Subjects', '%SUBJECTS%', '', '', 'Subjects', ''),
(5, 'Schedule I&B', '?page=schedule', '', '', '', ''),
(6, 'Notes', 'https://onedrive.live.com/redir?resid=7A26A4E50EEC48CB!487&authkey=!AAWHeOocCttgeYQ&ithint=onenote%2c', '', '', '', '_blank');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `permissions`) VALUES
(1, 'user', ''),
(2, 'editor', '{"editor": 1}'),
(3, 'admin', '{"editor": 1, "admin": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
`id` int(11) NOT NULL,
  `parent_table` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `duration` time NOT NULL,
  `goal` text NOT NULL,
  `finished_on` datetime NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`id`, `parent_table`, `parent_id`, `date_start`, `date_end`, `duration`, `goal`, `finished_on`, `done`) VALUES
(2, 'assignments', 5, '2015-10-31', '2015-11-01', '00:00:00', 'Work on the webpage to meet the requirements for the assignment', '2015-11-01 22:00:00', 1),
(3, 'assignments', 5, '2015-11-01', '2015-11-01', '00:00:00', 'Make entries easier to insert and edit, especcially for the planning', '2015-11-01 22:00:00', 1),
(4, 'subjects', 4, '2015-11-03', '2015-11-04', '02:00:00', 'Voorbereiden practicum fotosynthese', '2015-11-05 00:37:01', 1),
(5, 'subjects', 6, '2015-11-02', '2015-11-02', '00:00:15', 'Lees: Hs10.1; Hs11', '2015-11-02 22:47:30', 1),
(6, 'subjects', 6, '2015-11-04', '2015-11-05', '00:15:00', 'Lees: Hs10.4; Hs11', '2015-11-04 17:18:19', 1),
(8, 'assignments', 3, '2015-11-04', '2015-11-04', '02:00:00', 'Maken verslag Life', '2015-11-04 19:20:26', 1),
(10, 'subjects', 2, '2015-11-04', '2015-11-08', '00:45:00', 'Maak opgavenblad werkcollege', '2015-11-06 16:45:16', 1),
(11, 'assignments', 5, '2015-11-05', '2015-11-05', '00:30:00', 'Create introduction article', '2015-11-05 19:14:04', 1),
(13, 'exams', 8, '2015-11-07', '2015-11-07', '00:45:00', 'Lees samenvattingen hoofdstukken door', '2015-11-07 22:08:39', 1),
(15, 'exams', 8, '2015-11-07', '2015-11-10', '02:00:00', 'Kijk verzamelde video''s', '2015-11-10 23:14:44', 1),
(18, 'subjects', 4, '2015-11-14', '2015-11-14', '02:00:00', 'Afschrijven labjournaal dag 1', '2015-11-14 22:45:33', 1),
(19, 'subjects', 4, '2015-11-15', '2015-11-15', '01:00:00', 'Schrijven en voorbereiden proeven dag 2', '2015-11-15 17:43:43', 1),
(20, 'subjects', 5, '2015-11-13', '2015-11-14', '02:00:00', 'Lees: Campbell Hs5.3, Hs8.1, Hs27.1; Syllabus H2, H3, H4', '2015-11-15 13:18:39', 1),
(21, 'subjects', 5, '2015-11-14', '2015-11-14', '02:00:00', 'Lees: Campbell Hs27.1, Hs27.3; Syllabus H1', '2015-11-15 16:44:23', 1),
(22, 'subjects', 5, '2015-11-15', '2015-11-15', '02:00:00', 'Lees: Campbell Hs27.6; Syllabus H6, H7, H8', '2015-12-07 13:33:01', 1),
(23, 'subjects', 5, '2015-11-16', '2015-11-16', '02:00:00', 'Lees: Campbell Hs7.2, Hs25.3, Hs31', '2015-11-21 13:13:42', 1),
(24, 'subjects', 5, '2015-11-21', '2015-11-22', '02:00:00', 'Lees: Campbell Hs10, Hs18, Hs55.4, Hs37.3, Hs27.5', '2015-11-22 10:23:01', 1),
(25, 'subjects', 5, '2015-11-30', '2015-11-30', '01:00:00', 'Lees: Syllabus H5', '2015-12-01 11:10:59', 1),
(26, 'subjects', 3, '2015-11-23', '2015-11-23', '01:00:00', 'Lees tentamen maart 2015 door', '2015-11-23 16:18:14', 1),
(27, 'assignments', 7, '2015-11-19', '2015-11-19', '04:00:00', 'Work on presentation Human Microbiome', '2015-11-19 14:30:47', 1),
(28, 'assignments', 7, '2015-11-23', '2015-11-23', '01:00:00', 'Prepare for presentation', '2015-11-23 17:00:48', 1),
(30, 'subjects', 7, '2015-11-28', '2015-11-29', '01:00:00', 'Bestudeer powerpoints kern', '2015-11-30 13:00:04', 1),
(31, 'exams', 4, '2015-12-08', '2015-12-08', '03:00:00', 'Lees Campbell + Maak meerkeuzevragen', '2015-12-09 17:41:30', 1),
(32, 'exams', 4, '2015-12-10', '2015-12-10', '03:00:00', 'Lees syllabus + Herhaal notities en rest slides', '2015-12-11 10:01:21', 1),
(33, 'exams', 4, '2015-12-09', '2015-12-09', '01:30:00', 'Herhaal gedeelte powerpoints colleges', '2015-12-10 11:03:12', 1),
(34, 'exams', 5, '2015-12-12', '2015-12-12', '01:30:00', 'Neem presentaties cytoskelet, signaling en kanker door', '2015-12-12 23:37:23', 1),
(35, 'exams', 5, '2015-12-13', '2015-12-13', '03:00:00', 'Lees samenvattingen hoofdstukken Campbell', '2015-12-13 17:03:17', 1),
(36, 'exams', 5, '2015-12-14', '2015-12-14', '02:30:00', 'Herhaal eerste 3 powerpoints + gemiste colleges', '2015-12-14 22:21:42', 1),
(37, 'exams', 5, '2015-12-15', '2015-12-15', '02:30:00', 'Herhaal college 7 en 8', '2015-12-15 18:55:04', 1),
(38, 'subjects', 9, '2016-02-08', '2016-02-09', '01:00:00', 'Maak excel sheet NADH/BSA', '2016-02-09 15:48:00', 1),
(39, 'subjects', 12, '2016-02-09', '2016-02-12', '02:30:00', 'Lees 1.4: Semantics of propositional logic', '2016-02-12 12:21:04', 1),
(40, 'subjects', 12, '2016-02-16', '2016-02-19', '01:00:00', 'Lees 1.2: Natural deduction', '2016-02-18 16:11:57', 1),
(41, 'subjects', 9, '2016-02-20', '2016-02-21', '01:30:00', 'Werk excel sheets en labjournaal bij, print gegevens uit', '2016-02-21 15:47:32', 1),
(42, 'subjects', 12, '2016-02-20', '2016-02-20', '01:00:00', 'Maak opgaven 1.2', '2016-02-20 14:56:15', 1),
(43, 'assignments', 12, '2016-02-20', '2016-02-21', '00:15:00', 'Controleer antwoorden en lever in', '2016-02-21 15:47:33', 1),
(44, 'subjects', 9, '2016-03-12', '2016-03-13', '01:00:00', 'Bereid volgend practicum voor (begin labjournaal + maak schema)', '2016-03-12 17:32:33', 1),
(46, 'subjects', 11, '2016-02-27', '2016-02-27', '01:30:00', 'Maak opgaven eerste werkcollege', '2016-02-27 15:55:02', 1),
(47, 'subjects', 11, '2016-03-01', '2016-03-01', '01:30:00', 'Maak opgaven tweede werkcollege', '2016-03-01 15:48:26', 1),
(49, 'subjects', 12, '2016-03-01', '2016-03-01', '01:00:00', 'Lees 1.4.3 en 1.4.4', '2016-03-01 21:29:16', 1),
(50, 'subjects', 11, '2016-03-02', '2016-03-02', '00:30:00', 'Herhaal laatste gedeelte college', '2016-03-03 10:46:09', 1),
(51, 'subjects', 9, '2016-03-07', '2016-03-11', '05:00:00', 'Werk labjournaal bij', '2016-03-11 16:32:59', 1),
(52, 'assignments', 15, '2016-03-07', '2016-03-07', '00:30:00', 'Controleer antwoorden en lever in', '2016-03-07 17:38:18', 1),
(53, 'subjects', 12, '2016-03-15', '2016-03-17', '01:00:00', 'Lees 1.5.1 en 1.5.2', '2016-03-18 11:26:54', 1),
(54, 'assignments', 14, '2016-03-19', '2016-03-20', '00:30:00', 'Maak programma volledig af', '2016-03-19 15:38:06', 1),
(55, 'assignments', 14, '2016-03-19', '2016-03-20', '01:00:00', 'Schrijf stuk verslag over recursie', '2016-03-19 17:26:46', 1),
(57, 'assignments', 14, '2016-03-19', '2016-03-20', '01:30:00', 'Schrijf verslag af (met Jevan)', '2016-03-20 14:50:34', 1),
(58, 'subjects', 9, '2016-03-19', '2016-03-20', '01:00:00', 'Werk excel bestand bij (temparatuur, terugreactie en Lineweaver-Burk)', '2016-03-19 21:17:54', 1),
(59, 'assignments', 16, '2016-03-19', '2016-03-21', '01:00:00', 'Lees artikel op Perusall', '2016-03-21 15:18:34', 1),
(60, 'subjects', 10, '2016-03-24', '2016-03-28', '01:00:00', 'Haal werkcollege 24-03-2016 in', '2016-03-28 22:26:04', 1),
(61, 'subjects', 11, '2016-03-24', '2016-03-24', '01:30:00', 'Haal college 23-03-2016 in', '2016-03-24 13:01:08', 1),
(62, 'subjects', 12, '2016-03-24', '2016-03-24', '00:10:00', 'Lees 1.5.3: Horn Clauses', '2016-03-24 13:24:31', 1),
(63, 'subjects', 9, '2016-03-28', '2016-03-28', '00:15:00', 'Berijd practicum van disdag voor (Aanenten bacteriën)', '2016-03-29 08:41:59', 1),
(64, 'subjects', 9, '2016-04-03', '2016-04-03', '00:30:00', 'Berijd practicum maandag voor (Overproductie VirF)', '0000-00-00 00:00:00', 0),
(65, 'assignments', 19, '2016-04-02', '2016-04-02', '00:30:00', 'Controleer antwoorden en lever in', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `abbreviation` varchar(6) NOT NULL,
  `section` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `link_book` text NOT NULL,
  `link_home` text NOT NULL,
  `link_powerpoints` text NOT NULL,
  `link_schedule` text NOT NULL,
  `link_assignments` text NOT NULL,
  `link_marks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `abbreviation`, `section`, `content`, `active`, `link_book`, `link_home`, `link_powerpoints`, `link_schedule`, `link_assignments`, `link_marks`) VALUES
(1, 'Studeren & Presenteren', 'stpr', 'inf', '', 0, '', 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html', 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html#Lectures', 'http://liacs.leidenuniv.nl/~wolstencroftkj/SSPTimetable.pdf', 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html#Assignments', ''),
(2, 'Programmeermethoden', 'pr', 'inf', '', 0, 'media/books/Absolute C++.pdf', 'http://liacs.leidenuniv.nl/~kosterswa/pm/', 'http://liacs.leidenuniv.nl/~kosterswa/pm/college.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/inhoud.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/opdrachten.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/cijf/res.html'),
(3, 'Fundamentele Informatica 1', 'fi1', 'inf', '', 0, 'media/books/Schaums outlines Discrete Mathematics.pdf', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', '', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/fi1-cijfers-dec-2015-site.pdf'),
(4, 'Basispracticum', 'bp', 'bio', '', 0, '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/modulepage/view?course_id=_157670_1&cmp_tab_id=_114874_1&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157670_1&content_id=_3302925_1&mode=reset', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3302933-dt-content-rid-3037697_1/courses/4031BBPIB-1516FWN/HANDL%2020%20juli%202015.pdf', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3408273-dt-content-rid-3318406_1/courses/4031BBPIB-1516FWN/COHORT%202015-2016%20BLOK2%20BASISPRACTICUM%20voor%20I%26B%2024%20nov%20%20publicatie%20blackboard%202015%20.pdf'),
(5, 'Microbiologie', 'mi', 'bio', '', 0, 'media/books/Campbell Biology.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155463_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155463_1&content_id=_3402648_1', '', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3439771-dt-content-rid-3384914_1/courses/4031BBPIB-1516FWN/Cijferlijst%2011%20dec%20%20Microbiologie%20voor%20Informatica%20%20Biologie%20voor%20publicatie%20blackboard%202015-2016.pdf'),
(6, 'Celfysiologie', 'cf', 'bio', '', 0, 'media/books/Campbell Biology.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155462_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155462_1&content_id=_3344439_1', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3345291-dt-content-rid-3087777_1/xid-3087777_1', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3404299-dt-content-rid-3291856_1/courses/40212CF15-1516FWN/Cijferlijst%20Celfysiologie%20voor%20Informatica%20%20Biologie%202015-2016.pdf'),
(7, 'Celbiologie', 'cb', 'bio', '', 0, 'media/books/Campbell Biology.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157356_1&content_id=_3289911_1', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157356_1&content_id=_3291631_1', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3291622-dt-content-rid-3268088_1/xid-3268088_1', '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157356_1&content_id=_3441392_1'),
(8, 'Moleculaire Genetica', 'mg', 'bio', '', 0, 'media/books/Campbell Biology.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155460_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155460_1&content_id=_3229624_1&mode=reset', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155460_1&content_id=_3229624_1&mode=reset', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3380511-dt-content-rid-3203012_1/courses/40211MG10-1516FWN/Cohort%20Informatica%20%20Biologie%20toets%20Moleculaire%20Genetica%202015-2016%20.pdf'),
(9, 'Biochemie', 'bc', 'bio', '', 1, 'media/books/Manual Biochemistry I&B 2016.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_159672_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_159672_1&content_id=_3489702_1', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3462366-dt-content-rid-3426963_1/courses/4031IBBCH-1516FWN/Rooster%20Biochemie%20I%26B%20%28Blackboard%29.pdf', '', ''),
(10, 'Algoritmiek', 'alg', 'inf', '', 1, '', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/', '', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/', ''),
(11, 'Databases', 'db', 'inf', '', 1, '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_158226_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_158226_1&content_id=_3360722_1&mode=reset', '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_158226_1&content_id=_3491070_1', ''),
(12, 'Logica', 'lo', 'inf', '', 1, 'media/books/Logic in Computer Science.pdf', 'http://liacs.leidenuniv.nl/~bonsanguemm/logic.xhtml', '', '', '', ''),
(13, 'Orientatie I&B', 'oib', 'i&b', '', 1, '', '', '', '', '', ''),
(14, 'HC Bèta & Life Science', 'hcbls', 'hc', '', 1, '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_158114_1&handle=announcements_entry&mode=view', '', '', '', ''),
(15, 'Onderzoek & Onderzoekers', 'oo', 'hc', '', 1, '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_158211_1&handle=announcements_entry&mode=view', '', '', '', ''),
(16, 'Wetenschappelijke Uitdagingen voor 2050', 'wu50', 'hc', '', 1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `student_id` varchar(8) NOT NULL,
  `password` varchar(60) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `joined` datetime NOT NULL,
  `last_online` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `password`, `permission_group`, `name`, `email`, `umail`, `phone`, `joined`, `last_online`) VALUES
(1, 's1704362', '$2y$10$md.8ZZYtVVwldcTcUmlQ0uAjZF6Hx5CJRJErF8cNLZ0czXVVGMhvW', 3, 'Wilco de Boer', 'deboer.wilco@gmail.com', 's1704362@umail.leidenuniv.nl', '+310637338259', '2016-03-28 17:57:28', '2016-04-02 14:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `hash`) VALUES
(30, 1, '5a7d0206e015d2bcb4608a0f1b38b0e16d5efaef2044b88e01b4126ad78d936f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
