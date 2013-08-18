SELECT name,quantity FROM equipment NATURAL JOIN (SELECT * FROM equipment_requirement WHERE dish_id = :dish_id) AS requirement;
