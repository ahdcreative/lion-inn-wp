SELECT id, name, event_start_date, event_end_date, image_url, image_height, image_width, isSingleDayEvent, description, toPublish 
FROM prefixplaceholder_event 
ORDER BY event_start_date ASC;