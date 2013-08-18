SELECT equip_id,name,quantity FROM equipment_availability NATURAL JOIN equipment WHERE user_id = :user_id
