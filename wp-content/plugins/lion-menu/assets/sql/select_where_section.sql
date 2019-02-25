SELECT id, name, side, toPublish FROM prefixplaceholder_section 
WHERE parent_menu = fk_placeholder
ORDER BY rank ASC;