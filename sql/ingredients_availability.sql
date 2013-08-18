SELECT ingred_id,name,quantity,unit FROM ingredients_availability NATURAL JOIN ingredients WHERE user_id = :user_id
