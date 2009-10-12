<?php

  /**
   * @package Club
   * @author Daniel Scott <dan@danieljamesscott.org>
   * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
   * @copyright   Copyright (C) 2009 Daniel Scott (http://danieljamesscott.org).
   * All rights reserved.
   * @license		GNU/GPL, see LICENSE.php
   * Joomla! is free software. This version may have been modified pursuant
   * to the GNU General Public License, and as distributed it includes or
   * is derivative of works licensed under the GNU General Public License or
   * other free or open source software licenses.
   * See COPYRIGHT.php for copyright notices and details.
   */

function ClubBuildRoute(&$query)
{
  $segments = array();

  if (isset($query['view'])) {
    if (empty($query['Itemid'])) {
      $segments[] = $query['view'];
    }

    unset($query['view']);
  };

  if (isset($query['id'])) {
    $segments[] = $query['id'];
    unset($query['id']);
  };

  if (isset($query['layout'])) {
    $segments[] = $query['layout'];
    unset($query['layout']);
  };
  return $segments;
}

function ClubParseRoute($segments)
{
  $vars = array();

  //Get the active menu item
  $menu =& JSite::getMenu();
  $item =& $menu->getActive();

  // Count route segments
  $count = count($segments);

  //Standard routing for articles
  if (!isset($item)) {
    $vars['id'] = $segments[$count - 1];
    return $vars;
  }

  //Handle View and Identifier
  switch($item->query['view'])
    {
    case 'category'   :
      {
        $vars['id'] = $segments[$count-1];
      }
      break;
    }
  return $vars;
}
