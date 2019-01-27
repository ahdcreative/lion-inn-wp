CREATE TABLE tableplaceholder (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    order int(3) NOT NULL,
    date_created datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    date_updated datetime, 
    author int(3) NOT NULL,
    editor int(3),
    PRIMARY KEY  (id)
) charsetplaceholder;