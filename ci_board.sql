CREATE TABLE ci_board (
  board_id int(10) NOT NULL AUTO_INCREMENT,
  board_pid int(10) NULL DEFAULT '0',
  user_id varchar(20) NULL,
  user_name varchar(20) NOT NULL,
  subject varchar(50) NOT NULL,
  contents text NOT NULL,
  hits INT(10) NOT NULL DEFAULT '0',
  reg_date datetime NOT NULL,
  PRIMARY KEY (board_id),
  INDEX board_pid (board_pid)
)collate ='utf8_general_ci' ENGINE=MyISAM;

