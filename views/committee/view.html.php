<?php
/**
 * @version		$Id: view.html.php 8604 2007-08-28 18:06:52Z jinx $
 * @package		Joomla
 * @subpackage	Member
 * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
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
class MemberViewCommittee extends JView {
  function display($tpl = null) {
    global $mainframe, $option;

    $user	  = &JFactory::getUser();
    $uri 	  =& JFactory::getURI();
    $model	  = &$this->getModel();
    $document =& JFactory::getDocument();

    $pparams = &$mainframe->getPageParameters('com_club');

    // Selected Request vars
    //    $committeeId			= JRequest::getVar('catid',0,'', 'int');

    // Set some defaults against system variables
    $pparams->def('page_title',	$menu->name);

    // query options
    //    $options['aid'] 		= $user->get('aid', 0);
    //    $options['committee_id']	= $committeeId;

    //    $categories	= $model->getCategories( $options );
    $committee_members	= $model->getCommitteeMembers( $options );
    //    $total 		= $model->getMemberCount( $options );

    //prepare members
    $k = 0;
    for($i = 0; $i <  count( $members ); $i++) {
//       $member =& $members[$i];

//       $member->link	   = JRoute::_('index.php?option=com_club&view=member&id='.$member->slug);
//       $member->email_to = JHTML::_('email.cloak', $member->email_to);

//       $member->odd	= $k;
//       $member->count = $i;
//       $k = 1 - $k;
//       if($member->number == 0) {
// 	$member->number = '';
//       }
    }

    // find current committee
    // TODO: Move to model

    // Set the page title and pathway
    if ($committee->title) {
      // Add the committee breadcrumbs item
      $document->setTitle(JText::_('Member').' - '.$committee->title);
    } else {
      $document->setTitle(JText::_('Member'));
    }

    $this->assignRef('items', $members);
    $this->assignRef('lists', $lists);
    $this->assignRef('committee', $committee);
    $this->assignRef('params', $pparams);
		
    parent::display($tpl);
  }
}