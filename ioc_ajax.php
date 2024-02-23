<?php
/**
 * DokuWiki AJAX CALL SERVICE
 * Executa un command a partir de les dades rebudes a les variables $_POST o $_GET.
 * @author Josep Cañellas <jcanell4@ioc.cat>
 */
if (!defined('DOKU_INC')) define('DOKU_INC', realpath(dirname(__FILE__)."/../../") . "/");
if (!defined('DOKU_LIB_IOC')) define('DOKU_LIB_IOC', DOKU_INC . "lib/lib_ioc/");
require_once DOKU_LIB_IOC . "ajaxcommand/ajaxClasses.php";

$inst = ajaxCall::Instance();
$without = $inst->setCommand();
if ($without !== NULL) {
    $inst->setRequestParams( $inst->getParams($without) );
    $inst->loadOwn();
    $inst->process();
}
