PRAGMA foreign_keys = ON;

CREATE TABLE user (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	admin INTEGER,
	user_name VARCHAR,
	password VARCHAR,
	image_path VARCHAR
);
CREATE TABLE events (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	event_id VARCHAR,
	user_id INTEGER REFERENCES user(id),
	image_path VARCHAR,
	date DATE,
	description VARCHAR,
	type Integer
);
CREATE TABLE event_types (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	type VARCHAR
);
CREATE TABLE user_attends_event (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	u_id INTEGER,
	e_id INTEGER,
	FOREIGN KEY (u_id) REFERENCES user(id) ON DELETE CASCADE,
	FOREIGN KEY (e_id) REFERENCES events(id) ON DELETE CASCADE
);
CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	u_id INTEGER,
	e_id INTEGER,
	message TEXT,
	FOREIGN KEY (u_id) REFERENCES user(id) ON DELETE CASCADE,
	FOREIGN KEY (e_id) REFERENCES events(id) ON DELETE CASCADE
);


INSERT INTO user VALUES (
	NULL,
	1,
	'admin',
	'password',
	'default'
);
INSERT INTO user VALUES (
	NULL,
	0,
	'username',
	'password',
	'default'
);
INSERT INTO events VALUES (
	NULL, 'Anos do Sr. Vossa Excelência, o Admin', '1',
	'eventimage_default', '2015-December-5',
	'Jantar e depois Cinema no Arrábida',
	1
);
INSERT INTO events VALUES (
	NULL, 'BEBER ATE MORRER!', '1',
	'eventimage_default', '2015-December-31',
	'Isso queria eu, mas vou passar com os meus avós',
	6
);
INSERT INTO event_types VALUES (
	NULL,
	'Birthday Party'
);
INSERT INTO event_types VALUES (
	NULL,
	'Concert'
);
INSERT INTO event_types VALUES (
	NULL,
	'Parade'
);
INSERT INTO event_types VALUES (
	NULL,
	'Night Out'
);
INSERT INTO event_types VALUES (
	NULL,
	'Conference'
);
INSERT INTO event_types VALUES (
	NULL,
	'Holiday'
);
INSERT INTO user_attends_event VALUES (
	NULL,
	1,
	1
);
INSERT INTO user_attends_event VALUES (
	NULL,
	1,
	2
);
INSERT INTO user_attends_event VALUES (
	NULL,
	2,
	1
);
INSERT INTO comments VALUES (
	NULL,
	1,
	1,
	'E para partilhar a conta'

);
INSERT INTO comments VALUES (
	NULL,
	2,
	1,
	'Entao vou pedir a dobrar'

);
INSERT INTO comments VALUES (
	NULL,
	1,
	1,
	'Diz isso outra vez és banido do site'

);