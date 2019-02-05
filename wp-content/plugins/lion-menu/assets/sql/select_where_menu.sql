SELECT id, name FROM prefixplaceholder_menu WHERE id = fk_placeholder;
-- fk_placeholder is not a Foreign Key in this, 
-- but it works better to keep it like this in the code