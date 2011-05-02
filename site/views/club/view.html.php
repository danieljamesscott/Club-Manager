<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the Club Component
 */
class ClubViewClub extends JView {

  protected $items;
  protected $pagination;
  protected $state;

  // Overwriting JView display method
  function display($tpl = null) {
    // Assign data to the view
    $this->items = $this->get('Items');
    $this->pagination = $this->get('Pagination');
    $this->state = $this->get('State');

    // Check for errors.
    if (count($errors = $this->get('Errors'))) {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }
    // Display the view
    parent::display($tpl);
  }
}
