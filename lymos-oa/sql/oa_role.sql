# oa_role table

drop table if exists oa_role;

create table oa_role(
	roleid				int(11) unsigned not null auto_insrement comment "role id",
	name 				varchar(20) not null default '' comment "role name",
	permission 			text comment "permission",
	added_time 			int(11) not null default 0 comment "added time",

	primary key(role),
	unique key(name),
	key i_name(name),
)ENGINE=InnoDB default charset=utf8 comment "role table";
