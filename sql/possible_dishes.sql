-- get ids of all possible to cook dishes 
-- inputs: user_id
SELECT * FROM dishes NATURAL JOIN
(
	SELECT dish_id FROM dishes 

	EXCEPT

	-- ids of impossible to cook dishes
	(
		SELECT dish_id FROM (
	
			(SELECT ingredients_requirement.ingred_id, ingredients_requirement.dish_id FROM ingredients_requirement) 

			EXCEPT
			-- available ingredients
			 (SELECT ingredients_requirement.ingred_id, ingredients_requirement.dish_id FROM ingredients_requirement CROSS JOIN (SELECT * FROM ingredients_availability WHERE user_id=:user_id) AS user_ingred WHERE ingredients_requirement.ingred_id = user_ingred.ingred_id)
			 
			 -- end sub-sub-query
	) AS impossible)
 )	AS possible
-- end sub query

-- end query
