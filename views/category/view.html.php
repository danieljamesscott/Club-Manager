<?php
/**
 * @package	Club
 * @subpackage	Member
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
class ClubViewCategory extends JView
{
	function display($tpl = null)
	{
		global $mainframe, $option;

		$user	  = &JFactory::getUser();
		$uri 	  =& JFactory::getURI();
		$model	  = &$this->getModel();
		$document =& JFactory::getDocument();

		$pparams = &$mainframe->getPageParameters('com_club');

		// Selected Request vars
		$categoryId			= JRequest::getVar('catid',0,'', 'int');
		$limit				= JRequest::getVar('limit',$mainframe->getCfg('list_limit'),'', 'int');
		$limitstart			= JRequest::getVar('limitstart',0,'', 'int');
		$filter_order		= JRequest::getVar('filter_order','cd.ordering','', 'cmd');
		$filter_order_Dir	= JRequest::getVar('filter_order_Dir','ASC','','word');

		// Set some defaults against system variables
		$pparams->def('page_title',	$menu->name);

		// query options
		$options['aid'] 		= $user->get('aid', 0);
		$options['category_id']	= $categoryId;
		$options['limit']		= $limit;
		$options['limitstart']	= $limitstart;
		$options['order by']	= "$filter_order $filter_order_Dir, cd.ordering";

		$categories	= $model->getCategories( $options );
		$members	= $model->getMembers( $options );
		$total 		= $model->getMemberCount( $options );

		//prepare members
		$k = 0;
		for($i = 0; $i <  count( $members ); $i++)
		{
			$member =& $members[$i];

			$member->link	   = JRoute::_('index.php?option=com_club&view=member&id='.$member->slug);
			$member->email_to = JHTML::_('email.cloak', $member->email_to);

			$member->odd	= $k;
			$member->count = $i;
			$k = 1 - $k;
			if($member->number == 0) {
			  $member->number = '';
			}
		}

		// find current category
		// TODO: Move to model
		$category = null;
		foreach ($categories as $i => $_cat)
		{
			if ($_cat->id == $categoryId) {
				$category = &$categories[$i];
				break;
			}
		}
		if ($category == null) {
			$db = &JFactory::getDBO();
			$category =& JTable::getInstance( 'category' );
		}

		// Set the page title and pathway
		if ($category->title)
		{
			// Add the category breadcrumbs item
			$document->setTitle(JText::_('Member').' - '.$category->title);
		} else {
			$document->setTitle(JText::_('Member'));
		}

		// table ordering
		if ( $filter_order_Dir == 'DESC' ) {
			$lists['order_Dir'] = 'ASC';
		} else {
			$lists['order_Dir'] = 'DESC';
		}
		$lists['order'] = $filter_order;
		$selected = '';

		jimport('joomla.html.pagination');
		$pagination = new JPagination($total, $limitstart, $limit);

		$this->assignRef('items',		$members);
		$this->assignRef('lists',		$lists);
		$this->assignRef('pagination',	$pagination);
		$this->assignRef('category',	$category);
		$this->assignRef('params',		$pparams);
		
		$this->assign('action',		$uri->toString());

		parent::display($tpl);
	}
}