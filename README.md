# test
Тестовое задание
Скоприруйте папки и файлы в корень хоста
Настройте подключение к MySQL /my-host/core/Model.php
Создайте таблицу в MySQL

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'test', PASSWORD('Qwerty123'));
