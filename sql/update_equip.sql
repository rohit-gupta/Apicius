UPDATE equipment_availability SET quantity=quantity :opsign :quantity WHERE (user_id = :user_id AND equip_id = :equip_id) ;
