SELECT name,quantity,unit FROM ingredients NATURAL JOIN (SELECT * FROM ingredients_requirement WHERE dish_id = :dish_id) AS requirement;
