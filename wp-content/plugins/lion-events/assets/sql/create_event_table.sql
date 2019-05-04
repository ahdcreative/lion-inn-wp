CREATE TABLE tableplaceholder (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(40),
    event_start_date date NOT NULL,
    event_end_date date,
    isSingleDayEvent boolean NOT NULL,
    date_created datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    date_updated datetime, 
    author int(3) NOT NULL,
    editor int(3),
    description_sml VARCHAR(300),
    description_lrg VARCHAR(800),
    toPublish boolean NOT NULL DEFAULT 1,
    PRIMARY KEY  (id)
) charsetplaceholder;