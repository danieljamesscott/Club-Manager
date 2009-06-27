<?php
/**
* @package	Club
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
 * @copyright   Copyright (C) 2009 Daniel Scott (http://danieljamesscott.org). All rights reserved. 
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
* Member Table class
*/
class TableMember extends JTable
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
	var $catid = null;

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
	 * @var string
	 */
	var $params = null;

  var $name 		= null;
  var $user_id 		= null;
  var $number 		= null;
  var $position 	= null;
  var $residence 	= null;
  var $nicknames 	= null;
  var $dob 		= null;
  var $nationality 	= null;
  var $clubhistory 	= null;
  var $honours 		= null;
  var $about 		= null;
  var $quote 		= null;
  var $hometown 	= null;
  var $fave_player 	= null;
  var $height_weight 	= null;
  var $school_attending	= null;
  var $graduating_class	= null;
  var $gpa		= null;
  var $sat_act		= null;
  var $level_rating	= null;
  var $decision_makers	= null;
  var $travel_schedule	= null;
  var $hobbies		= null;
  var $conference	= null;
  var $picture 		= null;
  var $leaving_date 	= null;
  var $joining_date 	= null;
  var $first_name 	= null;
  var $middle_name 	= null;
  var $surname 		= null;

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	function __construct(& $db) {
		parent::__construct('#__member', 'id', $db);
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
		/** check for existing name */
		$query = 'SELECT id FROM #__member WHERE name = '.$this->_db->Quote($this->name).' AND catid = '.(int) $this->catid;
		$this->_db->setQuery($query);

		$xid = intval($this->_db->loadResult());
		if ($xid && $xid != intval($this->id)) {
			$this->_error = JText::sprintf('WARNNAMETRYAGAIN', JText::_('Member'));
			return false;
		}

		jimport('joomla.filter.output');
		$alias = JFilterOutput::stringURLSafe($this->name);

		if(empty($this->alias)) {
			$this->alias = $alias;
		}

		return true;
	}
}
?>
