CREATE TABLE tableplaceholder (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    date_created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    date_updated datetime DEFAULT '0000-00-00 00:00:00', 
    author int(3) NOT NULL,
    editor int(3),
    price decimal(5,2),
    parent_item mediumint(9) NOT NULL,
    PRIMARY KEY  (id),
    FOREIGN KEY  (parent_item) REFERENCES prefixplaceholder_item(id)
) charsetplaceholder;