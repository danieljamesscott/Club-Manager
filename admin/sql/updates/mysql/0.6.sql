DROP TABLE IF EXISTS `#__club_members`;
DROP TABLE IF EXISTS `#__category_members`;
DROP TABLE IF EXISTS `#__club_member`;
DROP TABLE IF EXISTS `#__club_categories`;
DROP TABLE IF EXISTS `#__club_category`;
DROP TABLE IF EXISTS `#__club`;

CREATE TABLE `#__club` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__club_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `picture` varchar(200) default NULL,
  `coach` varchar(100) default NULL,
  `trainer` varchar(100) default NULL,
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(150) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `access` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__club_categories` (
  `club_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`club_id`, `category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__club_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default '',
  `number` int(12) default NULL,
  `position` varchar(100) default NULL,
  `residence` varchar(100) default NULL,
  `nicknames` varchar(200) default NULL,
  `dob` date default NULL,
  `nationality` varchar(50) default NULL,
  `clubhistory` mediumtext,
  `honours` mediumtext,
  `about` mediumtext,
  `quote` varchar(200) default NULL,
  `hometown` varchar(200) default NULL,
  `fave_player` varchar(200) default NULL,
  `height_weight` varchar(200) default NULL,
  `school_attending` varchar(200) default NULL,
  `graduating_class` varchar(200) default NULL,
  `gpa` varchar(200) default NULL,
  `sat_act` varchar(200) default NULL,
  `level_rating` varchar(200) default NULL,
  `decision_makers` text(500) default NULL,
  `travel_schedule` text(500) default NULL,
  `hobbies` text(500) default NULL,
  `conference` text(500) default NULL,
  `picture` varchar(200) default NULL,
  `leaving_date` date default NULL,
  `joining_date` date default NULL,
  `first_name` varchar(20) NOT NULL default '',
  `middle_name` varchar(20) default NULL,
  `surname` varchar(20) NOT NULL default '',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `alias` varchar(255) NOT NULL default '',
  `email_to` varchar(60) default '',
  `description` text(500) default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__club_members` (
  `club_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY  (`club_id`, `member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__category_members` (
  `category_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY  (`category_id`, `member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__club` (`id`, `name`) VALUES
  (1, 'Test Club 1'),
  (2, 'Test Club 2');

INSERT INTO `#__club_category` (`id`, `name`) VALUES
  (1, 'Test Category 1'),
  (2, 'Test Category 2'),
  (3, 'Test Category 3');

INSERT INTO `#__club_categories` (`club_id`, `category_id`) VALUES
  (1, 1),
  (1, 2),
  (2, 3);

INSERT INTO `#__club_member` (`id`, `name`) VALUES
  (1, 'Test Member 1'),
  (2, 'Test Member 2'),
  (3, 'Test Member 3');

INSERT INTO `#__club_members` (`club_id`, `member_id`) VALUES
  (1, 1),
  (1, 2),
  (2, 3);

INSERT INTO `#__category_members` (`category_id`, `member_id`) VALUES
  (1, 1),
  (2, 2),
  (3, 3);

