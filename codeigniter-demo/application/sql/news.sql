drop table if exists news;
create table news(
	id 		int(11) not null auto_increment,
	title 	varchar(128) not null default '',
	slug 	varchar(128) not null default '',
	text 	text not null,
	
	primary key (id),
	key slug(slug)
)default charset=utf8;
