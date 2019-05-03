CREATE TABLE tableplaceholder (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    day VARCHAR(30),
    title VARCHAR(200) DEFAULT "No Regular Events",
    description VARCHAR(800) DEFAULT "No regular events happen on a Saturday. <br> Food is served as normal, until 9:30pm. The pub closes at midnight.",
    PRIMARY KEY  (id)
) charsetplaceholder;