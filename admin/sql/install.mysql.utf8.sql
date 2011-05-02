DROP TABLE IF EXISTS #__club_category_members;
DROP TABLE IF EXISTS #__club_member;
DROP TABLE IF EXISTS #__club_categories;
DROP TABLE IF EXISTS #__club_category;
DROP TABLE IF EXISTS #__club;

CREATE TABLE #__club (
  id int(11) NOT NULL AUTO_INCREMENT,
  alias varchar(255) NOT NULL default '',
  name varchar(50) NOT NULL,
  published tinyint(1) unsigned NOT NULL default '0',
  checked_out int(11) unsigned NOT NULL default '0',
  checked_out_time datetime NOT NULL default '0000-00-00 00:00:00',
  editor varchar(150) NOT NULL default '',
  ordering int(11) NOT NULL default '0',
  params text NOT NULL,
  access tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE #__club_category (
  id int(11) NOT NULL AUTO_INCREMENT,
  alias varchar(255) NOT NULL default '',
  name varchar(50) NOT NULL default '',
  picture varchar(200) default NULL,
  coach varchar(100) default NULL,
  trainer varchar(100) default NULL,
  manager varchar(100) default NULL,
  published tinyint(1) unsigned NOT NULL default '0',
  checked_out int(11) unsigned NOT NULL default '0',
  checked_out_time datetime NOT NULL default '0000-00-00 00:00:00',
  editor varchar(150) NOT NULL default '',
  ordering int(11) NOT NULL default '0',
  params text NOT NULL,
  access tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE #__club_member (
  id int(11) NOT NULL AUTO_INCREMENT,
  alias varchar(255) NOT NULL default '',
  name varchar(50) NOT NULL default '',
  number int(12) default NULL,
  position varchar(100) default NULL,
  residence varchar(100) default NULL,
  nicknames varchar(200) default NULL,
  dob date default NULL,
  nationality varchar(50) default NULL,
  club_history text default NULL,
  honours text default NULL,
  about text default NULL,
  quote text default NULL,
  home_town text default NULL,
  fave_player text default NULL,
  height_weight text default NULL,
  school_attending text default NULL,
  graduating_class text default NULL,
  gpa text default NULL,
  sat_act text default NULL,
  level_rating text default NULL,
  decision_makers text default NULL,
  travel_schedule text default NULL,
  hobbies text default NULL,
  conference text default NULL,
  picture text default NULL,
  leaving_date date default NULL,
  joining_date date default NULL,
  first_name text NOT NULL default '',
  middle_name text default NULL,
  last_name text NOT NULL default '',
  published tinyint(1) unsigned NOT NULL default '0',
  checked_out int(11) unsigned NOT NULL default '0',
  checked_out_time datetime NOT NULL default '0000-00-00 00:00:00',
  editor varchar(150) NOT NULL default '',
  ordering int(11) NOT NULL default '0',
  params text NOT NULL,
  user_id int(11) NOT NULL default '0',
  access tinyint(3) unsigned NOT NULL default '0',
  email_to varchar(60) default '',
  description text(500) default '',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE #__club_categories (
  id int(11) NOT NULL AUTO_INCREMENT,
  alias varchar(255) NOT NULL default '',
  club_id int(11) NOT NULL,
  category_id int(11) NOT NULL,
  published tinyint(1) unsigned NOT NULL default '0',
  checked_out int(11) unsigned NOT NULL default '0',
  checked_out_time datetime NOT NULL default '0000-00-00 00:00:00',
  editor varchar(150) NOT NULL default '',
  ordering int(11) NOT NULL default '0',
  params text NOT NULL,
  access tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE #__club_category_members (
  id int(11) NOT NULL AUTO_INCREMENT,
  category_id int(11) NOT NULL,
  member_id int(11) NOT NULL,
  alias varchar(255) NOT NULL default '',
  published tinyint(1) unsigned NOT NULL default '0',
  checked_out int(11) unsigned NOT NULL default '0',
  checked_out_time datetime NOT NULL default '0000-00-00 00:00:00',
  editor varchar(150) NOT NULL default '',
  ordering int(11) NOT NULL default '0',
  params text NOT NULL,
  access tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO #__club (id, alias, name) VALUES
  (1, 'testclub1', 'Test Club 1'),
  (2, 'testclub2', 'Test Club 2');

INSERT INTO #__club_category (id, alias, name, coach, trainer, manager) VALUES
  (1, 'testcat1', 'Test Category 1', 'Coach 1', 'Trainer 1', 'Manager 1'),
  (2, 'testcat2', 'Test Category 2', 'Coach 2', 'Trainer 2', 'Manager 2'),
  (3, 'testcat3', 'Test Category 3', 'Coach 3', 'Trainer 3', 'Manager 3');

INSERT INTO #__club_categories (club_id, category_id, alias) VALUES
  (1, 1, 'alias1'),
  (1, 2, 'alias2'),
  (2, 3, 'alias3');

INSERT INTO #__club_member (id, alias, name, number) VALUES
  (1, 'testmember1', 'Test Member 1', 1),
  (2, 'testmember2', 'Test Member 2', 2),
  (3, 'testmember3', 'Test Member 3', 3);

INSERT INTO #__club_member (id, alias, name, number, position, residence, nicknames, dob, nationality, club_history, honours, about, quote, home_town, fave_player, height_weight, school_attending, graduating_class, gpa, sat_act, level_rating, decision_makers, travel_schedule, hobbies, conference, picture, leaving_date, joining_date, first_name, middle_name, last_name) VALUES (4, 'testmember4', 'Test Member 4', 5, 'Attack', 'Home', 'Testy', '1990-01-01', 'National', 'Old Club', 'Winner', 'Me', 'Quote Me', 'Home town', 'Me', 'Tall, heavy', 'School', 'Class of ?', 'GPA', 'SAT', 'Level', 'Decision', 'Schedule', 'Hobbies', 'Conference', 'pic', '2010-04-25', '2011-05-25', 'First', 'Middle', 'Last');

INSERT INTO #__club_category_members (category_id, member_id) VALUES
  (1, 1),
  (2, 2),
  (2, 3),
  (2, 4);

