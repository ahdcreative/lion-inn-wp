SELECT id, name, price FROM prefixplaceholder_subitem 
WHERE parent_item = fk_placeholder
ORDER BY rank ASC;