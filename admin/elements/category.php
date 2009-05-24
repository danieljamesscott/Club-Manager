<?php
/**
* @package     Club
* @copyright   Copyright (C) 2009 Daniel Scott (http://danieljamesscott.org). All rights reserved. 
* @license     GNU/GPL, see LICENSE.php
*/

defined('_JEXEC') or die();

class JElementCategory extends JElement
{
  var   $_name = 'category';

  function fetchElement($name, $value, &$node, $control_name)
  {
    $db = &JFactory::getDBO();

      $query = "SELECT id AS value, name AS text FROM #__clubcategories"
	.' ORDER BY ordering';

      $db->setQuery($query);
      $options = $db->loadObjectList();
      array_unshift($options, JHTML::_('select.option', '0', '- '.JText::_('Select Category').' -', 'value', 'text'));

      return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"', 'value', 'text', $value, $control_name.$name );   
  }
}
?>