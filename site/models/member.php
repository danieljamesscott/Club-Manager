<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');
jimport('administrator.components.com_club.tables');

/**
 * Club Model
 */
class ClubModelMember extends JModelItem {
  /**
   * Method to build an SQL query to load the member data.
   *
   * @return      string  An SQL query
   */
  function getData() {
    // Create a new query object.
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    // Select some fields
    $query->select(' id, alias, name, number, position, residence, nicknames, dob, nationality, club_history, honours, about, quote, home_town, fave_player, height_weight, school_attending, graduating_class, gpa, sat_act, level_rating, decision_makers, travel_schedule, hobbies, conference, picture, leaving_date, joining_date, first_name, middle_name, last_name, published, checked_out, checked_out_time, editor, ordering, params, user_id, access, email_to, description');

    $query->from('#__club_member');

    // Get the member ID from the request
    $id = JRequest::getInt('id');
    $query->where("#__club_member.id = $id");
    $db->setQuery($query);
    // Return an object containing the row
    return($db->loadObject());
  }
}
