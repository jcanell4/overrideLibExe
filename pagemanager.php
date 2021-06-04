<?php
    if (!defined('DOKU_INC')) define('DOKU_INC', realpath(dirname(__FILE__).'/../../').'/');
    define('DOKU_MEDIAMANAGER',1);

    // for multi uploader:
    @ini_set('session.use_only_cookies',0);
    require_once(DOKU_INC.'inc/init.php');

    global $INPUT;
    global $lang;
    global $conf;
    // handle passed message
    if ($INPUT->str('msg1')) msg(hsc($INPUT->str('msg1')),1);
    if ($INPUT->str('err')) msg(hsc($INPUT->str('err')),-1);

    // get namespace to display (either direct or from deletion order)
    $NS = cleanID($INPUT->str('ns'));
    $IMG = null;

    global $INFO, $JSINFO;
    $INFO = !empty($INFO) ? array_merge($INFO, mediainfo()) : mediainfo();
    $JSINFO['id']        = '';
    $JSINFO['namespace'] = '';
    $AUTH = $INFO['perm'];

    $tmp = array();
    trigger_event('MEDIAMANAGER_STARTED', $tmp);
    session_write_close();  //close session

    // do not display the manager if user does not have read access
    if ($AUTH < AUTH_READ && !$fullscreen) {
        http_status(403);
        die($lang['accessdenied']);
    }

    if (!$fullscreen) {
        header('Content-Type: text/html; charset=utf-8');
        include(template('pagemanager.php'));
    }
