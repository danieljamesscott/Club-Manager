<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');
jimport('administrator.components.com_club.tables');

/**
 * Club Model
 */
class ClubModelCategory extends JModelList {
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
    $query->select('#__club_category_members.id as member_id, #__club_category_members.category_id, #__club_category.name as name, #__club_category.picture as picture, #__club_category.trainer as trainer, #__club_category.coach as coach, #__club_category.manager as manager, #__club_category_members.member_id, #__club_member.name as member_name, #__club_member.number as member_number, #__club_category_members.published,#__club_category_members.checked_out,#__club_category_members.checked_out_time,#__club_category_members.editor,#__club_category_members.ordering,#__club_category_members.params,#__club_category_members.access');

    // From the club table
    $query->from('#__club_category');
    $query->leftJoin('#__club_category_members on (#__club_category_members.category_id = #__club_category.id)');
    $query->leftJoin('#__club_member on (#__club_category_members.member_id = #__club_member.id)');

    // Get the category ID from the request
    $id = JRequest::getInt('id');
    $query->where("#__club_category.id = $id");
    return $query;
  }
}
