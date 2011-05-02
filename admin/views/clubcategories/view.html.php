<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Categories View
 */
class ClubViewClubCategories extends JView {

  protected $items;
  protected $pagination;
  protected $state;

  /**
   * Categories view display method
   * @return void
   */
  function display($tpl = null) {
    // Get data from the model
    $this->items = $this->get('Items');
    $this->pagination = $this->get('Pagination');
    $this->state = $this->get('State');

    // Check for errors.
    if (count($errors = $this->get('Errors'))) {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }

    // Set the toolbar
    $this->addToolBar();

    // Display the template
    parent::display($tpl);
  }

  /**
   * Setting the toolbar
   */
  protected function addToolBar() {
    JToolBarHelper::title(JText::_('COM_CLUB_MANAGER_CLUBCATEGORIES'));
    JToolBarHelper::deleteList('', 'clubcategory.delete');
    JToolBarHelper::editList('clubcategory.edit');
    JToolBarHelper::addNew('clubcategory.add');
  }

  /**
   * Method to set up the document properties
   *
   * @return void
   */
  protected function setDocument() {
    $document = JFactory::getDocument();
    $document->setTitle(JText::_('COM_CLUB_ADMINISTRATION'));
  }
}