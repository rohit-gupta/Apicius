--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Data for Name: dishes; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO dishes VALUES (1, 'Classic Martini', 'Cocktail', 'Beverage');
INSERT INTO dishes VALUES (2, 'Cuba Libre', 'Cocktail', 'Beverage');
INSERT INTO dishes VALUES (3, 'Brandy Alexander', 'Cocktail', 'Beverage');
INSERT INTO dishes VALUES (4, 'Old Fashioned', 'Cocktail', 'Beverage');


--
-- Data for Name: cooking_steps; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO cooking_steps VALUES (1, 1, 'Rinse martini glass in dry vermouth and pour out.');
INSERT INTO cooking_steps VALUES (1, 2, 'Shake gin with ice until chilled. ');
INSERT INTO cooking_steps VALUES (1, 3, 'Pour into martini glass.');
INSERT INTO cooking_steps VALUES (1, 4, 'Add olives.');
INSERT INTO cooking_steps VALUES (2, 1, 'Pour over ice, in order given, into a highball glass.');
INSERT INTO cooking_steps VALUES (2, 2, 'Garnish with a lime wheel.');
INSERT INTO cooking_steps VALUES (3, 1, 'Pour the liquors and cream into a mixing glass.');
INSERT INTO cooking_steps VALUES (3, 2, ' Shake and pour in martini glass.');
INSERT INTO cooking_steps VALUES (3, 3, 'Garnish with a sprinkle of nutmeg on top.');


--
-- Data for Name: equipment; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO equipment VALUES (1, 'Mixing Glass');
INSERT INTO equipment VALUES (2, 'Blender');
INSERT INTO equipment VALUES (3, 'Martini Glass');


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO users VALUES (1, 'klug3', '9507b1b10640524bd5a1a74c26b15bd44c9139be', '2013-03-26 18:37:37+05:30', 'grohit@iitk.ac.in');


--
-- Data for Name: equipment_availability; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO equipment_availability VALUES (3, 1, 14);
INSERT INTO equipment_availability VALUES (1, 1, 10);


--
-- Data for Name: equipment_requirement; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO equipment_requirement VALUES (3, 1, 1, false);
INSERT INTO equipment_requirement VALUES (1, 3, 1, false);


--
-- Data for Name: ingredients; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO ingredients VALUES (1, 'Vodka');
INSERT INTO ingredients VALUES (2, 'Rum');
INSERT INTO ingredients VALUES (3, 'Brandy');
INSERT INTO ingredients VALUES (4, 'Gin');
INSERT INTO ingredients VALUES (5, 'Vermouth');
INSERT INTO ingredients VALUES (6, 'Cola');
INSERT INTO ingredients VALUES (7, 'Cream');
INSERT INTO ingredients VALUES (8, 'Dark crème de cacao');
INSERT INTO ingredients VALUES (9, 'Nutmeg');
INSERT INTO ingredients VALUES (10, 'Olives');
INSERT INTO ingredients VALUES (11, 'Lime Juice');
INSERT INTO ingredients VALUES (12, 'Aromatic Bitters');
INSERT INTO ingredients VALUES (13, 'Bourbon');
INSERT INTO ingredients VALUES (14, 'Cherry');
INSERT INTO ingredients VALUES (15, 'Orange');
INSERT INTO ingredients VALUES (16, 'Lemon');


--
-- Data for Name: ingredients_availability; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO ingredients_availability VALUES (4, 1, 100, 'oz');
INSERT INTO ingredients_availability VALUES (6, 1, 90, 'oz');
INSERT INTO ingredients_availability VALUES (5, 1, 101, 'oz');
INSERT INTO ingredients_availability VALUES (2, 1, 105, 'oz');
INSERT INTO ingredients_availability VALUES (3, 1, 12, 'oz');
INSERT INTO ingredients_availability VALUES (9, 1, 10, 'oz');
INSERT INTO ingredients_availability VALUES (8, 1, 2, 'oz');
INSERT INTO ingredients_availability VALUES (7, 1, 2, 'oz');


--
-- Data for Name: ingredients_requirement; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO ingredients_requirement VALUES (4, 1, 3, 'oz', false);
INSERT INTO ingredients_requirement VALUES (5, 1, 2, 'oz', false);
INSERT INTO ingredients_requirement VALUES (2, 2, 2, 'oz', false);
INSERT INTO ingredients_requirement VALUES (6, 2, 3, 'oz', false);
INSERT INTO ingredients_requirement VALUES (3, 3, 1, 'oz', false);
INSERT INTO ingredients_requirement VALUES (11, 2, 1, 'oz', false);
INSERT INTO ingredients_requirement VALUES (7, 3, 1, 'oz', false);
INSERT INTO ingredients_requirement VALUES (8, 3, 1, 'oz', false);
INSERT INTO ingredients_requirement VALUES (9, 3, 5, 'Pieces', false);
INSERT INTO ingredients_requirement VALUES (13, 4, 2, 'oz', false);
INSERT INTO ingredients_requirement VALUES (12, 4, 2, 'Dashes', false);
INSERT INTO ingredients_requirement VALUES (16, 4, 1, 'Wedge', false);
INSERT INTO ingredients_requirement VALUES (14, 4, 1, 'Piece', false);


--
-- Data for Name: ratings; Type: TABLE DATA; Schema: public; Owner: grohit
--

INSERT INTO ratings VALUES (4, 1, '2013-04-11 12:06:52', 1);
INSERT INTO ratings VALUES (3, 1, '2013-04-11 12:07:50', 4);


--
-- PostgreSQL database dump complete
--

