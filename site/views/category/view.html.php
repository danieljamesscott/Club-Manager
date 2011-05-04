<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the Category Component
 */
class ClubViewCategory extends JView {

  protected $items;
  protected $pagination;
  protected $state;

  // Overwriting JView display method
  function display($tpl = null) {
    // Assign data to the view
    $this->items = $this->get('Items');
    $this->pagination = $this->get('Pagination');
    $this->state = $this->get('State');

    // Get picture image url
    if($this->items[0]->picture) {
      $this->items[0]->picture_html = JHtml::_('image', $this->items[0]->picture, $this->items[0]->name . ' picture', array('align' => 'middle', 'width' => '250', 'height' => '209'));
    } else {
      $this->items[0]->picture_html = JText::_("COM_CLUB_NO_PICTURE_AVAILABLE");
    }

    // Check for errors.
    if (count($errors = $this->get('Errors'))) {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }
    // Display the view
    parent::display($tpl);
  }
}
