CREATE TABLE user (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	admin INTEGER,
	user_id VARCHAR,
	password VARCHAR
);

INSERT INTO user VALUES (
	NULL,
	1,
	'admin',
	'password'
);