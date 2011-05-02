<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * CategoriesList Model
 */
class ClubModelClubCategories extends JModelList {
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
    // select #__club_categories.club_id, #__club.name, #__club_categories.category_id, #__club_category.name from #__club_categories left outer join #__club on (#__club_categories.club_id = #__club.id) left outer join #__club_category on (#__club_categories.category_id = #__club_category.id);

    $query->select('#__club_categories.id, #__club_categories.club_id, #__club.name as club_name, #__club_categories.category_id, #__club_category.name as category_name, #__club_categories.published,#__club_categories.checked_out,#__club_categories.checked_out_time,#__club_categories.editor,#__club_categories.ordering,#__club_categories.params,#__club_categories.access');


    // club.id as club_id,alias,category_id,published,checked_out,checked_out_time,editor,ordering,params,access');
    // From the club table
    $query->from('#__club_categories');
    $query->leftJoin('#__club on (#__club_categories.club_id = #__club.id)');
    $query->leftJoin('#__club_category on (#__club_categories.category_id = #__club_category.id)');
    return $query;
  }
}