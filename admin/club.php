<?php
/**
* @package	Club
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
* @copyright    Copyright (C) 2009 Daniel Scott (http://danieljamesscott.org). All rights reserved. 
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/*
 * Make sure the user is authorized to view this page
 * Currently, must be able to modify 'users' because ACL is hardcoded
 */
$user = & JFactory::getUser();
if (!$user->authorize( 'com_users', 'manage' )) {
	$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}

$controllerName = JRequest::getCmd( 'c', 'members' );

switch ($controllerName) {
 default:
   $controllerName = 'members';
   // allow fall through
   
 case 'members' :

   require_once( JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php' );
   $controllerName = 'ClubController'.$controllerName;

   // Create the controller
   $controller = new $controllerName();

   // Perform the Request task
   $controller->execute( JRequest::getCmd('task') );

   // Redirect if set by the controller
   $controller->redirect();
   break;
}
?>
