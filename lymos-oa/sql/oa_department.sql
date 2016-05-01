# oa_department table

drop table if exists oa_department;

create table oa_department(
	department_id				int(11) unsigned not null auto_increment comment "department id",
	department_name 				varchar(20) not null default '' comment "department name",
	parent_id 					int(11) unsigned not null default 0 comment "parent department id",
	added_time 			int(11) not null default 0 comment "added time",

	primary key(department_id),
	unique key(department_name)
)ENGINE=InnoDB default charset=utf8 comment "department table";

