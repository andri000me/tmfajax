<?php
//============================================================+
// File name   : tce_xhtml_header.php
// Begin       : 2004-04-24
// Last Update : 2011-03-15
//
// Description : print default XHTML page header
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//
// License:
//    Copyright (C) 2004-2010  Nicola Asuni - Tecnick.com LTD
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * output default XHTML header (doctype + head)
 * @package com.tecnick.tcexam.admin
 * @author Nicola Asuni
 * @since 2004-04-24
 * int $pagelevel page access level (0-10), default 0
 * string $thispage_title page title, default K_TCEXAM_TITLE
 * string $thispage_description page description, default K_TCEXAM_DESCRIPTION
 * string $thispage_author page author, default K_TCEXAM_AUTHOR
 * string $thispage_reply page reply to, default K_TCEXAM_REPLY_TO
 * string $thispage_keywords page keywords, default K_TCEXAM_KEYWORDS
 * string $thispage_icon page icon, default K_TCEXAM_ICON
 * string $thispage_style page CSS file name, default K_TCEXAM_STYLE
 */

/**
 */

//if necessary load default values
if (!isset($pagelevel) or empty($pagelevel)) {
    $pagelevel = 0;
}
if (!isset($thispage_title) or empty($thispage_title)) {
    $thispage_title = K_TCEXAM_TITLE;
}
if (!isset($thispage_description) or empty($thispage_description)) {
    $thispage_description = K_TCEXAM_DESCRIPTION;
}
if (!isset($thispage_author) or empty($thispage_author)) {
    $thispage_author = K_TCEXAM_AUTHOR;
}
if (!isset($thispage_reply) or empty($thispage_reply)) {
    $thispage_reply = K_TCEXAM_REPLY_TO;
}
if (!isset($thispage_keywords) or empty($thispage_keywords)) {
    $thispage_keywords = K_TCEXAM_KEYWORDS;
}
if (!isset($thispage_icon) or empty($thispage_icon)) {
    $thispage_icon = K_TCEXAM_ICON;
}
if (!isset($thispage_style) or empty($thispage_style)) {
    if (strcasecmp($l['a_meta_dir'], 'rtl') == 0) {
        $thispage_style = K_TCEXAM_STYLE_RTL;
    } else {
        $thispage_style = K_TCEXAM_STYLE;
    }
}

if($_SESSION['session_user_level']<1){
	header('Location: ../../public/index.php');
	exit;
}

echo '<'.'?'.'xml version="1.0" encoding="'.$l['a_meta_charset'].'" '.'?'.'>'.K_NEWLINE;
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'.K_NEWLINE;
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.$l['a_meta_language'].'" lang="'.$l['a_meta_language'].'" dir="'.$l['a_meta_dir'].'">'.K_NEWLINE;

echo '<head>'.K_NEWLINE;
echo '<title>'.htmlspecialchars($thispage_title, ENT_NOQUOTES, $l['a_meta_charset']).'</title>'.K_NEWLINE;
echo '<meta name="viewport" content="width=device-width, initial-scale=1">'.K_NEWLINE;
echo '<meta http-equiv="Content-Type" content="text/html; charset='.$l['a_meta_charset'].'" />'.K_NEWLINE;
echo '<meta name="language" content="'.$l['a_meta_language'].'" />'.K_NEWLINE;
echo '<meta name="tcexam_level" content="'.$pagelevel.'" />'.K_NEWLINE;
echo '<meta name="description" content="'.htmlspecialchars($thispage_description, ENT_COMPAT, $l['a_meta_charset']).' ['.base64_decode(K_KEY_SECURITY).']" />'.K_NEWLINE;
echo '<meta name="author" content="nick"/>'.K_NEWLINE;
echo '<meta name="reply-to" content="'.htmlspecialchars($thispage_reply, ENT_COMPAT, $l['a_meta_charset']).'" />'.K_NEWLINE;
echo '<meta name="keywords" content="'.htmlspecialchars($thispage_keywords, ENT_COMPAT, $l['a_meta_charset']).'" />'.K_NEWLINE;
echo '<meta name="robots" content="noindex,nofollow">'.K_NEWLINE;
echo '<meta name="googlebot" content="noindex,nofollow">'.K_NEWLINE;
echo '<link rel="stylesheet" href="'.K_PATH_HOST.K_PATH_TCEXAM.'public/styles/normalize.css">'.K_NEWLINE;
echo '<link rel="stylesheet" href="'.K_PATH_HOST.K_PATH_TCEXAM.'public/styles/main.css">'.K_NEWLINE;
echo '<link rel="stylesheet" href="'.K_PATH_HOST.K_PATH_TCEXAM.'admin/styles/selectize.css">'.K_NEWLINE;
echo '<link rel="stylesheet" href="'.K_PATH_HOST.K_PATH_TCEXAM.'admin/styles/select2.min.css">'.K_NEWLINE;
  
echo '<link rel="stylesheet" href="'.$thispage_style.'" type="text/css" />'.K_NEWLINE;
//$svgBg = '<link rel="stylesheet" href="'.K_PATH_HOST.K_PATH_TCEXAM.'public/styles/bg/'.rand(1,11).'.css">';
//echo $svgBg.K_NEWLINE;
echo '<link rel="shortcut icon" href="'.$thispage_icon.'" />'.K_NEWLINE;
echo '<script src="'.K_PATH_HOST.K_PATH_TCEXAM.'shared/jscripts/vendor/jquery.min.js"></script>'.K_NEWLINE;
echo '<script src="'.K_PATH_HOST.K_PATH_TCEXAM.'shared/jscripts/vendor/selectize.min.js"></script>'.K_NEWLINE;
echo '<script src="'.K_PATH_HOST.K_PATH_TCEXAM.'shared/jscripts/vendor/select2.min.js"></script>'.K_NEWLINE;
echo '<script>'.K_NEWLINE;
echo 'const K_ADDRESS_LINE1 = "'.K_ADDRESS_LINE1.'"'.K_NEWLINE;
echo 'const K_ADDRESS_LINE2 = "'.K_ADDRESS_LINE2.'"'.K_NEWLINE;
echo 'const K_ADDRESS_LINE3 = "'.K_ADDRESS_LINE3.'"'.K_NEWLINE;
echo '</script>'.K_NEWLINE;
// calendar
if (isset($enable_calendar) and $enable_calendar) {
    echo '<style type="text/css">@import url('.K_PATH_SHARED_JSCRIPTS.'jscalendar/calendar-blue.css);</style>'.K_NEWLINE;
    echo '<script type="text/javascript" src="'.K_PATH_SHARED_JSCRIPTS.'jscalendar/calendar.js"></script>'.K_NEWLINE;
    if (F_file_exists(''.K_PATH_SHARED_JSCRIPTS.'jscalendar/lang/calendar-'.$l['a_meta_language'].'.js')) {
        echo '<script type="text/javascript" src="'.K_PATH_SHARED_JSCRIPTS.'jscalendar/lang/calendar-'.$l['a_meta_language'].'.js"></script>'.K_NEWLINE;
    } else {
        echo '<script type="text/javascript" src="'.K_PATH_SHARED_JSCRIPTS.'jscalendar/lang/calendar-en.js"></script>'.K_NEWLINE;
    }
    echo '<script type="text/javascript" src="'.K_PATH_SHARED_JSCRIPTS.'jscalendar/calendar-setup.js"></script>'.K_NEWLINE;
}
echo '<!-- T'.'CE'.'x'.'am1'.'97'.'30'.'10'.'4 -->'.K_NEWLINE;
echo '<link rel="stylesheet" href="'.K_PATH_HOST.K_PATH_TCEXAM.'public/styles/fontawesome/css/all.min.css" type="text/css" />'.K_NEWLINE;

echo '</head>'.K_NEWLINE;

echo '<body>'.K_NEWLINE;

global $login_error;
if (isset($login_error) and $login_error) {
    F_print_error('WARNING', $l['m_login_wrong']);
}

//============================================================+
// END OF FILE
//============================================================+
