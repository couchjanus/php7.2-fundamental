-- Adminer 4.5.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1,	'earth',	1),
(2,	'mars',	1),
(3,	'jupiter',	1),
(4,	'one',	1),
(5,	'two',	0),
(6,	'cats',	1),
(7,	'gpgs',	0),
(8,	'Black Cat',	1),
(9,	'Green Cat',	1),
(10,	'Soft Cat',	1);

DROP TABLE IF EXISTS `guestbook`;
CREATE TABLE `guestbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `guestbook` (`id`, `username`, `email`, `comment`, `created_at`) VALUES
(1,	'Test',	'test@my.com',	'Hello there',	'2018-04-10 13:09:26'),
(2,	'Test',	'test@my.com',	'Hello test',	'2018-04-10 13:09:18'),
(3,	'janus',	'janusnic@gmail.com',	'Hello world',	'2018-04-10 13:08:59');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `created_at`, `status`) VALUES
(1,	'Що таке Lorem Ipsum?',	'shco-take-lorem-ipsum',	'<p>Lorem Ipsum - це текст-риба,</p>\r\n<p><img src=\"../../../media//files_5adf6e8287161.jpg\" alt=\"\" /></p>\r\n<p>що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною рибою аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. Риба не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.</p>',	'2018-04-10 14:29:42',	1),
(2,	'PHP store',	'php-store',	'PHP store is a single store e-commerce system written in PHP. It uses a MySQL database to store the data. The system can be used to create a website, online store, upload products on it and start selling online.\r\n\r\nIt uses a flexible template system allowing to change the front site template and customize completely the look and feel. All the other different settings like currency used on the store etc. can also be modified easily from the admin panel. php store admin panel',	'2018-04-16 20:35:48',	1),
(3,	'With PHP Store',	'wich-php-store',	'With PHP Store, the vendor / store owner can: - create different product categories and add products in them - accept different payment options and process orders on the website - approve and reject the orders, generate invoices for them - create tax zones and set the taxes to be charged when placing orders on the store - create shipping zones and shipping costs associated with them - manage the product reviews written by the customers and see statistics for the website - create server side forms like contact forms etc. and manage the data posted with them - configure the customer loyalty program and let the customers earn points when placing orders on the store - manage the store pages and content, add new pages or modify the existing ones, change the content using a WYSIWYG editor\r\n\r\nThe customers have also functionality on the front site, allowing them to log in, check their orders, modify their profile information etc. multi languages flags mix PHP Store is multi language. It uses a language (text) file, which can be translated to any language, so a website running the script could have multiple languages and let the visitors of the website choose the language they prefer. On our default demo, we have added the Spanish and English languages, but more translations are available - in a case you may be interested in additional language, please contact us and we\'ll provide you more information on its availability.',	'2018-04-16 20:41:52',	1),
(4,	'Теги PHP',	'tags-php',	'Когда PHP обрабатывает файл, он ищет открывающие и закрывающие теги, такие как <?php и ?>, которые указывают PHP, когда начинать и заканчивать обработку кода между ними. Подобный способ обработки позволяет PHP внедряться во все виды различных документов, так как всё, что находится вне пары открывающих и закрывающих тегов, будет проигнорировано парсером PHP.\r\n\r\nPHP также допускает короткий открывающий тег <?, однако использовать их нежелательно, так как они доступны только если включены с помощью конфигурационной директивы php.ini short_open_tag, либо если PHP был сконфигурирован с опцией --enable-short-tags .\r\n\r\nЕсли файл содержит только код PHP, предпочтительно опустить закрывающий тег в конце файла. Это помогает избежать добавления случайных символов пробела или перевода строки после закрывающего тега PHP, которые могут послужить причиной нежелательных эффектов, так как PHP начинает выводить данные в буфер при отсутствии намерения у программиста выводить какие-либо данные в этой точке скрипта.',	'2018-04-16 21:15:33',	1),
(5,	'Изолирование от HTML',	'izolirovanie-ot-html',	'Все, что находится вне пары открывающегося и закрывающегося тегов, игнорируется интерпретатором PHP, у которого есть возможность обрабатывать файлы со смешанным содержимым. Это позволяет PHP-коду быть встроенным в документы HTML, к примеру, для создания шаблонов.\r\n<p>Это будет проигнорировано PHP и отображено браузером.</p>\r\n<?php echo \'А это будет обработано.\'; ?>\r\n<p>Это тоже будет проигнорировано PHP и отображено браузером.</p>\r\nЭто работает так, как и ожидается, потому что когда интерпретатор PHP встречает закрывающие теги ?>, он просто начинает выводить все что найдет (за исключением сразу следующего символа перевода строки - смотрите раздел разделение инструкций) пока не встретит другой открывающий тег за исключением случая с содержащимся внутри кода условным оператором, в котором интерпретатор определяет результат условия перед принятием решения что пропустить. Ознакомьтесь со следующим примером.\r\n\r\nИспользование структур с условиями',	'2018-04-16 21:19:09',	1);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `price` float unsigned NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `name`, `slug`, `status`, `category_id`, `price`, `brand`, `description`, `is_new`, `is_recommended`) VALUES
(43,	'qwerrtr',	'qwerrtr',	1,	5,	111,	'cats',	'Can create posts',	1,	0),
(44,	'Test cat',	'test-cat',	1,	1,	234,	'cats',	'test descr',	1,	0),
(45,	'New cat',	'new-cat',	1,	1,	222,	'cats',	'New cat with meta',	1,	0),
(46,	'Red cat',	'red-cat',	1,	8,	555,	'cats',	'test descr',	1,	0);

-- 2018-07-20 08:38:26
