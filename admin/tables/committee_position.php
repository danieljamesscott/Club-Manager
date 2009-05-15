<?php
/**
* @version		$Id: committee_position.php 9101 2007-10-02 00:29:21Z jinx $
* @package		Joomla
* @subpackage	Committee_Positions
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

/**
* Committee_Position Table class
*
* @package		Joomla
* @subpackage	Committee_Positions
* @since 1.0
*/
class TableCommittee_Position extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;

	/**
	 * @var int
	 */
	var $sid = null;

	/**
	 * @var string
	 */
	var $alias = null;

	/**
	 * @var int
	 */
	var $published = null;

	/**
	 * @var boolean
	 */
	var $checked_out = 0;

	/**
	 * @var time
	 */
	var $checked_out_time = 0;

	/**
	 * @var int
	 */
	var $ordering = null;

	/**
	 * @var int
	 */
	var $archived = null;

	/**
	 * @var string
	 */
	var $params = null;

  var $position 			= null;
  var $responsibilities 		= null;
  var $email		 		= null;
  var $level		 		= null;

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	function __construct(& $db) {
		parent::__construct('#__committee_position', 'id', $db);
	}

	/**
	* Overloaded bind function
	*
	* @acces public
	* @param array $hash named array
	* @return null|string	null is operation was satisfactory, otherwise returns an error
	* @see JTable:bind
	* @since 1.5
	*/
	function bind($array, $ignore = '')
	{
		if (key_exists( 'params', $array ) && is_array( $array['params'] )) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = $registry->toString();
		}

		return parent::bind($array, $ignore);
	}

	/**
	 * Overloaded check method to ensure data integrity
	 *
	 * @access public
	 * @return boolean True on success
	 * @since 1.0
	 */
	function check()
	{
// 		if (JFilterInput::checkAttribute(array ('href', $this->url))) {
// 			$this->_error = JText::_('Please provide a valid URL');
// 			return false;
// 		}

	  print $this->position;
		/** check for valid name */
		if (trim($this->position) == '') {
			$this->_error = JText::_('Your Committee Position must contain a position.');
			return false;
		}

// 		if (!(eregi('http://', $this->url) || (eregi('https://', $this->url)) || (eregi('ftp://', $this->url)))) {
// 			$this->url = 'http://'.$this->url;
// 		}

		/** check for existing name */
		$query = 'SELECT id FROM #__committee_position WHERE position = '.$this->_db->Quote($this->position);
		$this->_db->setQuery($query);

		$xid = intval($this->_db->loadResult());
		if ($xid && $xid != intval($this->id)) {
			$this->_error = JText::sprintf('WARNNAMETRYAGAIN', JText::_('Committee Position'));
			return false;
		}

		jimport('joomla.filter.output');
		$alias = JFilterOutput::stringURLSafe($this->position);

		if(empty($this->alias)) {
			$this->alias = $alias;
		}

// 		print $this->email;
//                 // check for valid client email
//                 jimport( 'joomla.mail.helper' );
// 		if (!JMailHelper::isEmailAddress( $this->email )) {
// 		  //		  $this->_error = JText::sprintf('WARNNAMETRYAGAIN', JText::_('Committee Position'));
// 		  $this->_error = JText::_('Invalid email address.');
//  		  return false;
// 		}
// 		print $this->level;
// 		if (!is_int($this->level)) {
// 		  $this->_error = JText::sprintf('WARNNAMETRYAGAIN', JText::_('Level must be an integer'));
// 		  //		  $this->setError(JText::_( 'Level must be an integer' ));
// 		  return false;
// 		}

		return true;
	}
}
?>
