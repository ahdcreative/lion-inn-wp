INSERT INTO `hjb01_le_u_event` (`id`, `name`, `event_start_date`, `event_end_date`, `image_url`, `image_height`, `image_width`, `isSingleDayEvent`, `date_created`, `date_updated`, `author`, `editor`, `description`, `toPublish`) VALUES
                                (1, 'Event One', '2019-04-17', '2019-04-20', 'closed.png', '', '', 0, '2019-04-15 21:02:27', '2019-04-16 19:50:52', 1, 1, 'Desc', 1),
                                (2, 'Event Two', '2019-04-17', '2019-04-19', 'rugby.jpg', '', '', 0, '2019-04-15 21:05:19', NULL, 1, NULL, 'Desc', 1),
                                (3, 'Single Day Event', '2019-04-18', '0000-00-00', 'karaoke.png', '', '', 1, '2019-04-16 19:59:34', NULL, 1, NULL, 'Desc', 1);

INSERT INTO `hjb01_le_r_event` (`id`, `day`, `title`, `description`, `icon_url`) VALUES
                                (1, 'Monday', 'Open Mic Night', '<p>Come along the 1st &amp; 3rd Monday night every month. If you play an instrument or sing, or just enjoy entertaining come along fun begins at 8.30pm.</p>', ''),
                                (2, 'Tuesday', 'Cribb', '<p>The Lion Inn participates in the local cribb league during the winter. During the summer an in-house friendly ladder league is run - all are welcome.</p>', ''),
                                (3, 'Wednesday', 'Quiz', '<p>The Lion Inn participates in the local quiz league during the winter. During the summer on the 1st &amp; 3rd Wednesday The Lion Inn hosts a friendly quiz night - all are welcome.</p>', ''),
                                (4, 'Thursday', 'Darts', '<p>The Lion Inn participates in the local darts league during the winter. During the summer the darts team practice all are welcome to join in and take on the team members.</p>', ''),
                                (5, 'Friday', 'Fish on Friday', '<p>Come along every Friday. A choice of plaice or cod for £7.50. Served with chips and peas (garden / mushy). 6:30 - 8:30pm.</p>', ''),
                                (6, 'Saturday', 'No Regular Events', '<p>No regular events happen on a Saturday.&nbsp;<br>Food is served as normal, until 9:30pm. The pub closes at midnight.</p>', ''),
                                (7, 'Sunday', 'Twilight Jazz', '<p>Come along on the 2nd Sunday of every month. If you enjoy jazz, this is the night for you. Come and join us. Fun begins at 5pm.</p>', '');