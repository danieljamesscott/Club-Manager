<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * CategoriesList Model
 */
class ClubModelCategoryMembers extends JModelList {
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
    $query->select('#__club_category_members.id, #__club_category_members.category_id, #__club_category.name as category_name, #__club_category_members.member_id, #__club_member.name as member_name, #__club_category_members.published,#__club_category_members.checked_out,#__club_category_members.checked_out_time,#__club_category_members.editor,#__club_category_members.ordering,#__club_category_members.params,#__club_category_members.access');


    // club.id as club_id,alias,category_id,published,checked_out,checked_out_time,editor,ordering,params,access');
    // From the club table
    $query->from('#__club_category_members');
    $query->leftJoin('#__club_category on (#__club_category_members.category_id = #__club_category.id)');
    $query->leftJoin('#__club_member on (#__club_category_members.member_id = #__club_member.id)');
    return $query;
  }
}