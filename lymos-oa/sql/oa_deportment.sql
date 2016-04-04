# oa_deportment table

drop table if exists oa_deportment;

create table oa_deportment(
	deportment_id				int(11) unsigned not null auto_increment comment "deportment id",
	name 				varchar(20) not null default '' comment "deportment name",
	parent_id 					int(11) unsigned not null default 0 comment "parent deportment id",
	added_time 			int(11) not null default 0 comment "added time",

	primary key(deportment_id),
	unique key(name),
	key i_name(name),
)ENGINE=InnoDB default charset=utf8 comment "deportment table";
