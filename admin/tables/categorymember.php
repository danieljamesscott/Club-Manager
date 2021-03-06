<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * Category Table class
 */
class ClubTableCategoryMember extends JTable {
  /**
   * Constructor
   *
   * @param object Database connector object
   */
  function __construct(&$db) {
    parent::__construct('#__club_category_members', 'id', $db);
  }
}