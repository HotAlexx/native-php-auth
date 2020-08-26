SELECT `email` FROM `users` GROUP BY `email` HAVING COUNT(`login`)>1;
SELECT `login` FROM `users` LEFT JOIN orders o on users.id = o.user_id WHERE o.price IS NULL;
SELECT `login` FROM `users` INNER JOIN orders o on users.id = o.user_id GROUP BY `login` HAVING COUNT(*)>2;