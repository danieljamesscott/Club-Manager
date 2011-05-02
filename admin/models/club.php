<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * Club Model
 */
class ClubModelClub extends JModelAdmin {
  /**
   * Returns a reference to the a Table object, always creating it.
   *
   * @param       type    The table type to instantiate
   * @param       string  A prefix for the table class name. Optional.
   * @param       array   Configuration array for model. Optional.
   * @return      JTable  A database object
   * @since       1.6
   */
  public function getTable($type = 'Club', $prefix = 'ClubTable', $config = array()) {
    return JTable::getInstance($type, $prefix, $config);
  }
  /**
   * Method to get the record form.
   *
   * @param       array   $data           Data for the form.
   * @param       boolean $loadData       True if the form is to load its own data (default case), false if not.
   * @return      mixed   A JForm object on success, false on failure
   * @since       1.6
   */
  public function getForm($data = array(), $loadData = true) {
    // Get the form.
    $form = $this->loadForm('com_club.club', 'club', array('control' => 'jform', 'load_data' => $loadData));
    if (empty($form)) {
      return false;
    }
    return $form;
  }
  /**
   * Method to get the script that have to be included on the form
   *
   * @return string	Script files
   */
  public function getScript() {
    return 'administrator/components/com_club/models/forms/club.js';
  }
  /**
   * Method to get the data that should be injected in the form.
   *
   * @return      mixed   The data for the form.
   * @since       1.6
   */
  protected function loadFormData() {
    // Check the session for previously entered form data.
    $data = JFactory::getApplication()->getUserState('com_club.edit.club.data', array());
    if (empty($data)) {
      $data = $this->getItem();
    }
    return $data;
  }
}