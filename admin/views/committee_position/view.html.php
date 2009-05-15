<?php
/**
* @version		$Id: view.html.php 9147 2007-10-04 15:26:39Z nurainir $
* @package		Joomla
* @subpackage	Committee_Position
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Committee_Position component
 *
 * @static
 * @package		Joomla
 * @subpackage	Committee_Position
 * @since 1.0
 */
class MembersViewCommittee_Position extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		if($this->getLayout() == 'default') {
			$this->_displayForm($tpl);
			return;
		}

		//get the committee_position
		$committee_position =& $this->get('data');

// 		if ($committee_position->url) {
// 			// redirects to url if matching id found
// 			$mainframe->redirect($committee_position->url);
// 		}

		parent::display($tpl);
	}

	function _displayForm($tpl)
	{
		global $mainframe, $option;

		$db		=& JFactory::getDBO();
		$uri 	=& JFactory::getURI();
		$user 	=& JFactory::getUser();
		$model	=& $this->getModel();


		$lists = array();

		//get the committee_position
		$committee_position	=& $this->get('data');
		$isNew		= ($committee_position->id < 1);

		// fail if checked out not by 'me'
		if ($model->isCheckedOut( $user->get('id') )) {
			$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'The committee_position' ), $committee_position->title );
			$mainframe->redirect( 'index.php?option='. $option, $msg );
		}

		// Edit or Create?
		if (!$isNew)
		{
			$model->checkout( $user->get('id') );
		}
		else
		{
			// initialise new record
			$committee_position->published = 1;
			$committee_position->approved 	= 1;
			$committee_position->order 	= 0;
			$committee_position->catid 	= JRequest::getVar( 'catid', 0, 'post', 'int' );
		}

		// build the html select list for ordering
		$query = 'SELECT ordering AS value, position AS text'
			. ' FROM #__committee_position'
			. ' ORDER BY ordering';

		$lists['ordering'] 			= JHTML::_('list.specificordering',  $committee_position, $committee_position->id, $query, 1 );

		// build the html select list
		$lists['published'] 		= JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $committee_position->published );

		// build list of users
		$lists['user_id'] 			= JHTML::_('list.users',  'user_id', $committee_position->user_id, 1, NULL, 'name', 0 );

		//clean committee_position data
		jimport('joomla.filter.output');
		JFilterOutput::objectHTMLSafe( $committee_position, ENT_QUOTES, 'description' );

		$file 	= JPATH_COMPONENT.DS.'models'.DS.'committee_position.xml';
		$params = new JParameter( $committee_position->params, $file );

		$this->assignRef('lists',		$lists);
		$this->assignRef('committee_position',		$committee_position);
		$this->assignRef('params',		$params);

		parent::display($tpl);
	}
}
?>
