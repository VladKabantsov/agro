CREATE VIEW `goods_in_shops` AS
select a.*, b.sprice
            from 
            (
                select o.shop_id, o.goods_id, 
					   sum(o.rem_goods) as rem_goods
                from orders o 
                group by o.shop_id, o.goods_id
            ) a 
            join 
            (
                select s1.goods_id, s1.sprice 
                from selling_prices s1
                join 
                (
                    select goods_id, max(date) as date
                    from selling_prices
                    group by goods_id
                ) s2
                on s1.goods_id = s2.goods_id
                        and s1.date = s2.date
            ) b
            on a.goods_id = b.goods_id