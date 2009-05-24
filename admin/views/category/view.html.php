<?php
/**
* @package     Club
* @copyright   Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
* @copyright   Copyright (C) 2009 Daniel Scott (http://danieljamesscott.org). All rights reserved. 
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
 * HTML View class for the Category component
 *
 * @package	Club
 */
class ClubViewCategory extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		if($this->getLayout() == 'default') {
			$this->_displayForm($tpl);
			return;
		}

		//get the category
		$category =& $this->get('data');

		if ($category->url) {
			// redirects to url if matching id found
			$mainframe->redirect($category->url);
		}

		parent::display($tpl);
	}

	function _displayForm($tpl)
	{
		global $mainframe, $option;

		$db	=& JFactory::getDBO();
		$uri 	=& JFactory::getURI();
		$user 	=& JFactory::getUser();
		$model	=& $this->getModel();


		$lists = array();

		//get the category
		$category	=& $this->get('data');
		$isNew		= ($category->id < 1);

		// fail if checked out not by 'me'
		if ($model->isCheckedOut( $user->get('id') )) {
			$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'The category' ), $category->name );
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
			$category->published = 1;
			$category->approved 	= 1;
			$category->order 	= 0;
			$category->id 	= JRequest::getVar( 'id', 0, 'post', 'int' );
		}

		// build the html select list for ordering
		$query = 'SELECT ordering AS value, name AS text'
			. ' FROM #__clubcategories'
			. ' ORDER BY ordering';

		$lists['ordering'] 			= JHTML::_('list.specificordering',  $category, $category->id, $query, 1 );

		// build the html select list
		$lists['published'] 		= JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $category->published );

		//clean category data
		jimport('joomla.filter.output');
		JFilterOutput::objectHTMLSafe( $category, ENT_QUOTES, 'description' );

		$file 	= JPATH_COMPONENT.DS.'models'.DS.'category.xml';
		$params = new JParameter( $category->params, $file );

		$this->assignRef('lists',		$lists);
		$this->assignRef('category',		$category);
		$this->assignRef('params',		$params);

		parent::display($tpl);
	}
}
?>
