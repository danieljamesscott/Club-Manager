<?php

// No direct access
defined('_JEXEC') or die;

/**
 * Club component helper.
 *
 * @package             Joomla.Administrator
 * @subpackage          com_club
 * @since               1.6
 */
class ClubHelper {
  /**
   * Configure the Linkbar.
   *
   * @param       string  $vName  The name of the active view.
   *
   * @return      void
   * @since       1.6
   */
  public static function addSubmenu($vName) {
    JSubMenuHelper::addEntry(
                             JText::_('COM_CLUB_SUBMENU_CLUBS'),
                             'index.php?option=com_club&view=clubs',
                             $vName == 'clubs'
                             );
    JSubMenuHelper::addEntry(
                             JText::_('COM_CLUB_SUBMENU_CATEGORIES'),
                             'index.php?option=com_club&view=categories',
                             $vName == 'categories'
                             );
    JSubMenuHelper::addEntry(JText::_('COM_CLUB_SUBMENU_MEMBERS'),
                             'index.php?option=com_club&view=members',
                             $vName == 'members'
                             );
    JSubMenuHelper::addEntry(
                             JText::_('COM_CLUB_SUBMENU_CLUBCATEGORIES'),
                             'index.php?option=com_club&view=clubcategories',
                             $vName == 'clubcategories'
                             );
    JSubMenuHelper::addEntry(
                             JText::_('COM_CLUB_SUBMENU_CATEGORYMEMBERS'),
                             'index.php?option=com_club&view=categorymembers',
                             $vName == 'categorymembers'
                             );
  }
}

