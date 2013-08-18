UPDATE ingredients_availability SET quantity=quantity :opsign :quantity WHERE (user_id = :user_id AND ingred_id = :ingred_id) ;
