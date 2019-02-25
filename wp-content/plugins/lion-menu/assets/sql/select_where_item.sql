SELECT id, name, description, price, vegetarian, gluten_free, isSubsectionTitle, toPublish FROM prefixplaceholder_item 
WHERE parent_section = fk_placeholder
ORDER BY rank ASC;