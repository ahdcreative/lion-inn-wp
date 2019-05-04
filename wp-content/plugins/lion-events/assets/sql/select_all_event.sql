SELECT id, name, event_start_date, event_end_date, image_url, isSingleDayEvent, description_sml, description_lrg, toPublish 
FROM prefixplaceholder_event 
ORDER BY event_start_date ASC;