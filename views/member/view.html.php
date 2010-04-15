<?php
/**
 * @package	Club
 * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
 * @copyright   Copyright (C) 2009 Daniel Scott (http://danieljamesscott.org). All rights reserved. 
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

/**
 * @package		Joomla
 * @subpackage	Members
 */
class ClubViewMember extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		$user		= &JFactory::getUser();
		$pathway	= &$mainframe->getPathway();
		$document	= & JFactory::getDocument();
		$model		= &$this->getModel();

		// Get the parameters of the active menu item
		$menus	= &JSite::getMenu();
		$menu    = $menus->getActive();

		$pparams = &$mainframe->getParams('com_club');

		// Push a model into the view
		$model		= &$this->getModel();
		$modelCat	= &$this->getModel( 'Category' );

		// Selected Request vars
		// ID may come from the member switcher
		if (!($memberId	= JRequest::getInt('member_id',0))) {
		  $memberId = JRequest::getInt( 'id', $memberId );
		}

		// query options
		$options['id']	= $memberId;
		$options['aid']	= $user->get('aid', 0);

		$member	= $model->getMember( $options );

		// check if we have a member
		if (!is_object( $member )) {
		  JError::raiseError( 404, JText::_("MEMBER_NOT_FOUND"));
		  return;
		}

		$options['category_id']	= $member->catid;
		$options['order by']	= 'cd.default_con DESC, cd.ordering ASC';

		// Set the document page title
		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		if (is_object( $menu ) && isset($menu->query['view']) && $menu->query['view'] == 'member' && isset($menu->query['id']) && $menu->query['id'] == $member->id) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$pparams->set('page_title',	$member->name);
			}
		} else {
			$pparams->set('page_title',	$member->name);
		}
		$document->setTitle( $pparams->get( 'page_title' ) );

		//set breadcrumbs
		if (isset( $menu ) && isset($menu->query['view']) && $menu->query['view'] != 'member'){
		  $pathway->addItem($member->name, '');
		}

		// Add metadata
		$document->setMetaData('description',
				       htmlentities($member->clubhistory . " " . $member->about));

		$document->setMetaData('keywords', htmlentities($member->nicknames));

		// Correctly format data
		if($member->number == 0) {
		  $member->number = '';
		}

		if($member->dob != '0000-00-00') {
		  $member->dob = date('jS M Y',strtotime($member->dob));
		} else {
		  $member->dob = '';
		}

		// Get picture image url
		if($member->picture) {
		  $member->picture = JHTML::_('image.site', 'con_address.png', 	'/images/members/', $member->picture, 	'/images/members/', $member->name . ' picture', 'align="middle" width="250" height="209"');
		} else {
		  $member->picture = "No picture available";
		}

		// Adds parameter handling
		$member->params = new JParameter($member->params);

		$this->assignRef('member', $member);
		$this->assignRef('params', $pparams);

		parent::display($tpl);
	}
}
