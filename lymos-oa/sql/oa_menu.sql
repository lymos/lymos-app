# oa_menu table

drop table if exists oa_menu;

create table oa_menu(
	menu_id				int(11) unsigned not null auto_increment comment "menu id",
	name 				varchar(20) not null default '' comment "menu name",
	parent_id 					int(11) unsigned not null default 0 comment "parent menu id",
	added_time 			int(11) not null default 0 comment "added time",

	primary key(menu_id),
	unique key(name),
	key i_name(name),
	key i_parent_id (parent_id)
)ENGINE=InnoDB default charset=utf8 comment "menu table";
