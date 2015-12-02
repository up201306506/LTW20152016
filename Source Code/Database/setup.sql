PRAGMA foreign_keys = ON;

CREATE TABLE user (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	admin INTEGER,
	user_id VARCHAR,
	password VARCHAR
);
CREATE TABLE events (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	event_id VARCHAR,
	user_id VARCHAR,
	image_path VARCHAR,
	date DATE,
	description VARCHAR,
	type Integer
);
CREATE TABLE event_types (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	type VARCHAR
);



INSERT INTO user VALUES (
	NULL,
	1,
	'admin',
	'password'
);
INSERT INTO user VALUES (
	NULL,
	0,
	'OQUELHAS',
	'obelhas'
);
INSERT INTO events VALUES (
	NULL, 'TEST_EVENT_1', 'admin',
	'eventimage_default', '1999-01-01 00:00:01',
	'TEST EVENT',
	1
);
INSERT INTO events VALUES (
	NULL, 'TEST_EVENT_2', 'admin',
	'eventimage_default', '1999-01-01 00:00:01',
	'TEST EVENT',
	1
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