<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');
jimport('administrator.components.com_club.tables');

/**
 * Club Model
 */
class ClubModelClub extends JModelList {
  /**
   * Method to build an SQL query to load the list data.
   *
   * @return      string  An SQL query
   */
  protected function getListQuery() {
    // Create a new query object.
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    // Select some fields
    $query->select('#__club.id,#__club.alias,#__club.name,#__club.published,#__club.checked_out,#__club.checked_out_time,#__club.editor,#__club.ordering,#__club.params,#__club.access,#__club_category.id as category_id,#__club_category.name as category_name,#__club_category.picture as category_picture,#__club_category.coach as category_coach,#__club_category.trainer as category_trainer,#__club_category.manager as category_manager');
    // From the club table
    $query->from('#__club_categories');
    $query->leftJoin('#__club on (#__club_categories.club_id = #__club.id)');
    $query->leftJoin('#__club_category on (#__club_categories.category_id = #__club_category.id)');

    // Get the club ID from the request
    $id = JRequest::getInt('id');
    $query->where("#__club.id = $id");
    return $query;
  }
}

/* public function getTable($type = 'Club', $prefix = 'ClubTable', $config = array()) { */
/*   return JTable::getInstance($type, $prefix, $config); */
/* } */

/* public function getName() { */
/*   if (!isset($this->name)) { */
/*     $id = JRequest::getInt('id'); */
/*     // Get a ClubTable instance */
/*     $table = $this->getTable(); */

/*     // Load the message */
/*     $table->load($id); */

/*     // Assign the message */
/*     $this->name = $table->name; */
/*   } */
/*   return $this->name; */
/* } */
