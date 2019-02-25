CREATE TABLE tableplaceholder (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    rank int(3) NOT NULL,
    date_created datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    date_updated datetime, 
    author int(3) NOT NULL,
    editor int(3),
    side boolean NOT NULL DEFAULT 0,
    toPublish boolean NOT NULL DEFAULT 1,
    parent_menu mediumint(9) NOT NULL,
    PRIMARY KEY  (id),
    FOREIGN KEY (parent_menu) REFERENCES prefixplaceholder_menu(id)
) charsetplaceholder;
