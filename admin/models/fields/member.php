<?php
// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Member Form Field class for the Member component
 */
class JFormFieldMember extends JFormFieldList {
  /**
   * The field type.
   *
   * @var         string
   */
  protected $type = 'Member';

  /**
   * Method to get a list of options for a list input.
   *
   * @return      array           An array of JHtml options.
   */
  protected function getOptions() {
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('id,name');
    $query->from('#__club_member');
    $db->setQuery((string)$query);
    $messages = $db->loadObjectList();
    $options = array();
    if ($messages) {
      foreach($messages as $message) {
        $options[] = JHtml::_('select.option', $message->id, $message->name);
      }
    }
    $options = array_merge(parent::getOptions(), $options);
    return $options;
  }
}
