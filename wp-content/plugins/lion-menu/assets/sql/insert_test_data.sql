INSERT INTO `hjb01_lm_menu` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`) VALUES
(14, 'Standard', 0, '2019-01-30 01:00:37', NULL, 1, NULL),
(15, 'Desserts', 0, '2019-01-30 18:59:00', NULL, 1, NULL),
(17, 'Pizza', 0, '2019-01-30 20:56:06', NULL, 1, NULL);

INSERT INTO `hjb01_lm_section` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`, `side`, `parent_menu`) VALUES
(1, 'Starters', 1, '2019-01-30 20:51:18', NULL, 1, NULL, NULL, 14),
(2, 'Mains', 2, '2019-01-30 20:51:18', NULL, 1, NULL, NULL, 14),
(3, 'Sides', 3, '2019-01-30 20:53:06', NULL, 1, NULL, 1, 14),
(4, 'Ice Cream', 4, '2019-01-30 20:53:06', NULL, 1, NULL, 0, 15),
(5, 'Coffees', 5, '2019-01-30 20:54:11', NULL, 1, NULL, 1, 15),
(6, 'Pizza', 6, '2019-01-30 20:56:57', NULL, 1, NULL, 0, 17),
(7, 'Extras', 7, '2019-01-30 20:56:57', NULL, 1, NULL, 1, 17);

INSERT INTO `hjb01_lm_item` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`, `price`, `description`, `vegetarian`, `gluten_free`, `subsection`, `parent_section`) VALUES
(1, 'Pork Crackling', 1, '2019-01-30 22:19:32', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Soup of the Day', 2, '2019-01-30 22:19:32', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'HEC', 1, '2019-01-30 22:20:14', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(4, 'Pie', 2, '2019-01-30 22:20:14', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(5, 'Chocolate', 1, '2019-01-30 22:21:02', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(6, 'Vanilla', 2, '2019-01-30 22:21:02', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(7, 'Filter Coffee', 1, '2019-01-30 22:21:38', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(8, 'Tea', 2, '2019-01-30 22:21:38', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(9, 'Margharita', 1, '2019-01-30 22:22:31', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(10, 'Hawaiin', 2, '2019-01-30 22:22:31', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(11, 'Mushroom', 1, '2019-01-30 22:23:03', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(12, 'Onion', 2, '2019-01-30 22:23:03', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(13, 'Chips', 1, '2019-01-30 22:23:34', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(14, 'Salad', 2, '2019-01-30 22:23:34', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3);

INSERT INTO `hjb01_lm_subitem` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`, `price`, `parent_item`) VALUES
(1, 'Cheese', 1, '2019-01-30 22:24:27', NULL, 1, NULL, NULL, 13),
(2, 'Cajun Spice', 2, '2019-01-30 22:24:27', NULL, 1, NULL, NULL, 13);