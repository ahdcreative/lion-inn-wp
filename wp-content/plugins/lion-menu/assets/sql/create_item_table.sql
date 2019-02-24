CREATE TABLE tableplaceholder (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    rank int(3) NOT NULL,
    date_created datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    date_updated datetime, 
    author int(3) NOT NULL,
    editor int(3),
    price decimal(5,2),
    description VARCHAR(200),
    vegetarian boolean,
    gluten_free boolean,
    isSubsectionTitle boolean,
    toPublish boolean NOT NULL DEFAULT 1,
    parent_section mediumint(9) NOT NULL,    
    PRIMARY KEY  (id),
    FOREIGN KEY (parent_section) REFERENCES prefixplaceholder_section(id)
) charsetplaceholder;