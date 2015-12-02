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
	'Not Real'
);
INSERT INTO events VALUES (
	NULL, 'TEST_EVENT_2', 'admin',
	'eventimage_default', '1999-01-01 00:00:01',
	'TEST EVENT',
	'Not Real'
);