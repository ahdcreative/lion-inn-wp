CREATE TABLE tableplaceholder (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(40),
    event_start_date date NOT NULL,
    event_end_date date,
    image_url VARCHAR(30),
    image_height int(5),
    image_width int(5),
    isSingleDayEvent boolean NOT NULL,
    date_created datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    date_updated datetime, 
    author int(3) NOT NULL,
    editor int(3),
    description VARCHAR(500),
    toPublish boolean NOT NULL DEFAULT 1,
    PRIMARY KEY  (id)
) charsetplaceholder;