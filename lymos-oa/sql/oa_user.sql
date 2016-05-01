# oa_user table

drop table if exists oa_user;

create table oa_user(
	userid				int(11) unsigned not null auto_insrement comment "user id",
	roleid				int(11) unsigned not null default 0 comment "role id",
	deportment_id		int(11) unsigned not null default 0 comment "deportment id",
	username 			varchar(20) not null default '' comment "user name",
	nickname 			varchar(20) not null default '' comment "nick name",
	chinese_name 		varchar(20) not null default '' comment "chinese name",
	email 				varchar(60) not null default '' comment "email",
	added_time 			int(11) not null default 0 comment "added time",

	primary key(userid),
	unique key(username),
	key i_email (email)
)ENGINE=InnoDB default charset=utf8 comment "user table";
