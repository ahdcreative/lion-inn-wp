SELECT id, name, price, toPublish FROM prefixplaceholder_subitem 
WHERE parent_item = fk_placeholder
ORDER BY rank ASC;