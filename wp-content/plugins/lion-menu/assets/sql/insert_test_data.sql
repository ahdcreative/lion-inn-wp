INSERT INTO `hjb01_lm_menu` (`id`, `name`, `rank`, `date_created`, `date_updated`, `author`, `editor`) VALUES
(14, 'Standard', 0, '2019-01-30 01:00:37', NULL, 1, NULL),
(15, 'Desserts', 0, '2019-01-30 18:59:00', NULL, 1, NULL),
(17, 'Pizza', 0, '2019-01-30 20:56:06', NULL, 1, NULL);

INSERT INTO `hjb01_lm_section` (`id`, `name`, `date_created`, `date_updated`, `author`, `editor`, `side`, `parent_menu`) VALUES
(1, 'Starters', '2019-01-30 20:51:18', NULL, 1, NULL, NULL, 14),
(2, 'Mains', '2019-01-30 20:51:18', NULL, 1, NULL, NULL, 14),
(3, 'Sides', '2019-01-30 20:53:06', NULL, 1, NULL, 1, 14),
(4, 'Ice Cream', '2019-01-30 20:53:06', NULL, 1, NULL, 0, 15),
(5, 'Coffees', '2019-01-30 20:54:11', NULL, 1, NULL, 1, 15),
(6, 'Pizza', '2019-01-30 20:56:57', NULL, 1, NULL, 0, 17),
(7, 'Extras', '2019-01-30 20:56:57', NULL, 1, NULL, 1, 17);