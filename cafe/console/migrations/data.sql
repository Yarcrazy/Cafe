INSERT INTO cafe.public.cook (name)
VALUES ('John Wick'),
       ('Jeremy Clarcson'),
       ('Kevin Smith');
INSERT INTO cafe.public.dish (cook_id, name)
VALUES (1, 'porridge'),
       (1, 'soup'),
       (2, 'potato'),
       (2, 'meat'),
       (3, 'nasi goreng'),
       (3, 'noodles');
INSERT INTO cafe.public.menu (dish_id)
VALUES (1),
       (2),
       (3),
       (5),
       (6);