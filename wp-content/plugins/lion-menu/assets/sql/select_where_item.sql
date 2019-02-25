SELECT id, name, description, price, isVegetarian, isGlutenFree, isSubsectionTitle, toPublish FROM prefixplaceholder_item 
WHERE parent_section = fk_placeholder
ORDER BY rank ASC;