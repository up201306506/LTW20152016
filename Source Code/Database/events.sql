CREATE TABLE events (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	event_id VARCHAR,
	user_id VARCHAR,
	image_path VARCHAR,
	date DATE,
	description VARCHAR,
	type VARCHAR
);

INSERT INTO events VALUES (
	NULL, 'TEST_EVENT', 'admin',
	'eventimage_default', '1999-01-01 00:00:01',
	'TEST EVENT',
	'Not Real'
);