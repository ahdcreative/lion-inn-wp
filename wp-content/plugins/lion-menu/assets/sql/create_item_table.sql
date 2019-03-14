CREATE TABLE tableplaceholder (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(30),
    rank int(3) NOT NULL,
    date_created datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    date_updated datetime, 
    author int(3) NOT NULL,
    editor int(3),
    price decimal(5,2),
    type ENUM ('item', 'subtitle', 'note') NOT NULL DEFAULT 'item',
    description VARCHAR(200),
    isVegetarian boolean DEFAULT 0,
    isGlutenFree boolean DEFAULT 0,
    toPublish boolean NOT NULL DEFAULT 1,
    parent_section mediumint(9) NOT NULL,    
    PRIMARY KEY  (id),
    FOREIGN KEY (parent_section) REFERENCES prefixplaceholder_section(id)
) charsetplaceholder;