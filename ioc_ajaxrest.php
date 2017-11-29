<?php
/**
 * DokuWiki AJAX REST SERVICE
 * Executa un command a partir de les dades rebudes a les variables $_POST o $_GET
 * per a ns_tree_rest, ns_mediatree_rest, list_projects_rest, list_templates_rest
 * @author Josep Cañellas <jcanell4@ioc.cat>
 */
if (!defined('DOKU_INC')) define('DOKU_INC', realpath(dirname(__FILE__)."/../../") . '/');
require_once DOKU_INC."lib/plugins/ajaxcommand/ajaxClasses.php";

$inst = ajaxRest::Instance();
$inst->requestHtmlParams();
if ($inst->setCommand()) {
    $inst->loadOwn();
    $inst->process();
}
