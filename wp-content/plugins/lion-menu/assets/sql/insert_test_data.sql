INSERT INTO `hjb01_lm_menu` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`) VALUES
(14, 'Standard', 1, '2019-01-30 01:00:37', NULL, 1, NULL),
(15, 'Desserts', 3, '2019-01-30 18:59:00', NULL, 1, NULL),
(17, 'Pizza', 2, '2019-01-30 20:56:06', NULL, 1, NULL);

INSERT INTO `hjb01_lm_section` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`, `side`, `parent_menu`) VALUES
(1, 'Starters', 1, '2019-01-30 20:51:18', NULL, 1, NULL, 0, 14),
(2, 'Mains', 2, '2019-01-30 20:51:18', NULL, 1, NULL, 0, 14),
(3, 'Sides', 4, '2019-01-30 20:53:06', NULL, 1, NULL, 1, 14),
(4, 'Ice Cream', 4, '2019-01-30 20:53:06', NULL, 1, NULL, 0, 15),
(5, 'Coffees', 5, '2019-01-30 20:54:11', NULL, 1, NULL, 1, 15),
(6, 'Pizza', 6, '2019-01-30 20:56:57', NULL, 1, NULL, 0, 17),
(7, 'Extras', 7, '2019-01-30 20:56:57', NULL, 1, NULL, 1, 17),
(9, 'Desserts', 3, '2019-02-19 13:35:46', NULL, 1, NULL, 0, 14),
(11, 'Coffee', 0, '2019-02-24 19:18:09', NULL, 1, NULL, 1, 14);

INSERT INTO `hjb01_lm_item` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`, `price`, `type`, `description`, `isVegetarian`, `isGlutenFree`, `parent_section`) VALUES
(2, 'Soup of the Day', 2, '2019-01-30 22:19:32', NULL, 1, NULL, '5.00', 'item', 'Homemade soup of the day served with hot crusty bread.', 1, 1, 1),
(3, 'Ham, Egg & Chips', 3, '2019-01-30 22:20:14', '2019-02-12 19:42:53', 1, 1, '0.00', 'item', 'Gammon ham served with egg and chips.', 0, 1, 2),
(4, 'Pie', 2, '2019-01-30 22:20:14', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 2),
(5, 'Chocolate', 1, '2019-01-30 22:21:02', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 4),
(6, 'Vanilla', 2, '2019-01-30 22:21:02', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 4),
(7, 'Filter Coffee', 1, '2019-01-30 22:21:38', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 5),
(8, 'Tea', 2, '2019-01-30 22:21:38', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 5),
(9, 'Margharita', 1, '2019-01-30 22:22:31', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 6),
(10, 'Hawaiin', 2, '2019-01-30 22:22:31', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 6),
(11, 'Mushroom', 1, '2019-01-30 22:23:03', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 7),
(12, 'Onion', 2, '2019-01-30 22:23:03', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 7),
(13, 'Chips', 1, '2019-01-30 22:23:34', '2019-02-19 00:14:21', 1, 1, '3.50', 'item', '', 0, 0, 3),
(14, 'Salad', 2, '2019-01-30 22:23:34', NULL, 1, NULL, NULL, 'item', '', NULL, NULL, 3),
(17, 'Pork Crackling', 1, '2019-02-10 20:52:52', '2019-02-12 20:51:24', 1, 1, '0.00', 'item', 'Served with apple sauce.', 1, 1, 1),
(18, 'Pasta', 1, '2019-02-12 20:01:14', NULL, 1, NULL, '0.00', 'subtitle', '', 0, 0, 2),
(18, 'Note', 5, '2019-02-12 20:01:14', NULL, 1, NULL, '0.00', 'note', '', 0, 0, 2),
(20, 'Cheese & Biscuits', 1, '2019-02-24 18:12:49', NULL, 1, NULL, '4.00', 'item', '', 1, 0, 9);


INSERT INTO `hjb01_lm_subitem` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`, `price`, `parent_item`) VALUES
(5, 'Cheese', 1, '2019-02-10 20:57:29', '2019-02-18 21:36:40', 1, 1, '0.50', 13),
(6, 'Tomato', 0, '2019-02-24 17:33:11', NULL, 1, NULL, '0.00', 9);