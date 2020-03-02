-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 10 2018 г., 11:57
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tea_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desc-short` text NOT NULL,
  `desc-full` text,
  `price` tinyint(4) NOT NULL,
  `health` varchar(50) DEFAULT NULL,
  `taste` varchar(50) DEFAULT NULL,
  `aroma` varchar(50) DEFAULT NULL,
  `mouth` varchar(50) DEFAULT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `desc-short`, `desc-full`, `price`, `health`, `taste`, `aroma`, `mouth`, `picture`) VALUES
(1, 'Pure Ceylon Tea', 'Our finest, high-grade rich Organic and  Fairtrade Ceylon Black Tea hasn`t changed much over the years...', 'Begin your day with a superb broken leaf tea from Sri Lanka. Suggestions of roses and fine woods come from the dried leaves alone. Once infused, this tea is elegant and bright, yet hearty enough to support a drop of milk. BOP.', 10, '', 'Mineral Woody', 'Roasted tomatoes', 'Dry', 'ceylon-2.jpg'),
(2, 'Earl Grey Tea', 'High-grade Ceylon Black Tea, with tantalising aromas of fresh bergamot to whisk you away to lands far away.', '', 11, '', 'Wood', 'Smoke', 'Dry', 'earl-grey.jpg'),
(3, 'Assam Black Tea', 'Experience the strong and pungent flavour of our loose Assam tea that comes from pure, unblended tea leaves..', NULL, 9, NULL, NULL, NULL, NULL, 'assam.jpg'),
(4, 'Dragon Well Green Tea', 'Our fine Dragonwell green tea has a sweet, rounded flavor, full, nutty and buttery texture, and pleasantly dry finish. A truly satisfying cup of tea.', NULL, 11, NULL, NULL, NULL, NULL, 'dragonwell.jpg'),
(5, 'Budding Jasmine Rose', 'Young silver-tip tea leaves of exceptional quality are scented with jasmine, then wrapped around a real rosebud.', 'Simply place in an individual cup - ideally clear tempered glass - and watch each rose emerge moments after you add water. Approximately 4-5 pcs per ounce.', 15, NULL, 'Jasmine', 'Jasmine', 'Juicy', 'jasmine-bud.jpg'),
(6, 'Gunpowder Green Tea', 'his healthy green tea, delicately rolled into small pellets, has a floral and smoky aroma with plenty of natural sweetness.', NULL, 6, NULL, 'Smoky Earthy', 'Pine nuts', 'Clean', 'gunpowder.jpg'),
(7, 'Sencha Tea', 'Our fine Dragonwell green tea has a sweet, rounded flavor, full, nutty and buttery texture, and pleasantly dry finish. A truly satisfying cup of tea.', NULL, 13, NULL, 'Sun-dried ', 'Maize', 'Medium rich', 'sencha.jpg'),
(8, 'Ivan Tea', 'Carefully hand-picked in the very heart of Russia, dried and slightly fermented leaves and flowers of Ivan-tea (Epilobium angustifolium) will bring you good health and natural taste.', NULL, 7, NULL, 'Crispy rice', 'Grass', 'Clean', 'kiprey.jpg'),
(9, 'Lapsang Souchong', 'Mature tea leaves from Fujian province are smoked over pine wood fires, giving Lapsang Souchong its assertive yet smooth flavor.', 'Lower in caffeine than other black teas, this full-flavored tea is excellent both in the morning or later in the day.', 6, NULL, 'Smoky Roses', 'Smoke Cinnamon Lemon', 'Delicate', 'lapsang.jpg'),
(10, 'Lapsang Souchong', 'Mature tea leaves from Fujian province are smoked over pine wood fires, giving Lapsang Souchong its assertive yet smooth flavor.', 'Lower in caffeine than other black teas, this full-flavored tea is excellent both in the morning or later in the day.', 6, NULL, 'Smoky Roses', 'Smoke Cinnamon Lemon', 'Delicate', 'lapsang.jpg'),
(11, 'Darjeeling First Flush', 'One of the treasures of Darjeeling\'s first flush, or harvest, in Darjeeling are the lots denoted \"muscatel\".', ' This full-bodied muscatel from Makaibari Estate has a pronounced, beautiful fragrance and taste suggestive of ripe stone fruit and a long finish with pleasant astringency.', 21, NULL, 'Brisk Citrus', 'Herbaceous', 'Cooling', 'darjeeling.jpg'),
(12, 'Yunnan Golden Tips', 'Meticulously crafted in Yunnan Province, this exceptional black tea is composed of gorgeous, golden tips, which yield more flavor and aroma than standard leaves.', ' Once infused, the tips brew a smooth, round liquor that can be enjoyed neat or with a drop of milk. Especially notice how its bouquet of dry woods and smoke gives way to a luscious, lingering flavor of honey and molasses.', 15, NULL, 'Cacao Pepper', 'Honey Toast', 'Rich and viscouse', 'yunnan_golden_tips.jpg'),
(13, 'Darjeeling First Flush', 'One of the treasures of Darjeeling\'s first flush, or harvest, in Darjeeling are the lots denoted \"muscatel\".', ' This full-bodied muscatel from Makaibari Estate has a pronounced, beautiful fragrance and taste suggestive of ripe stone fruit and a long finish with pleasant astringency.', 21, NULL, 'Brisk Citrus', 'Herbaceous', 'Cooling', 'darjeeling.jpg'),
(14, 'Yunnan Golden Tips', 'Meticulously crafted in Yunnan Province, this exceptional black tea is composed of gorgeous, golden tips, which yield more flavor and aroma than standard leaves.', ' Once infused, the tips brew a smooth, round liquor that can be enjoyed neat or with a drop of milk. Especially notice how its bouquet of dry woods and smoke gives way to a luscious, lingering flavor of honey and molasses.', 15, NULL, 'Cacao Pepper', 'Honey Toast', 'Rich and viscouse', 'yunnan_golden_tips.jpg'),
(15, 'Genmaicha', 'A unique tea experience with a textural appeal like no other.', 'In a marriage of two classic Japanese flavors, roasted rice adds a velvety note of popcorn and chestnuts to the bright vigor of whole leaf green tea.', 9, NULL, 'Oat Cereal', 'Coffee Grounds', 'Full and expansive', 'genmaicha.jpg'),
(16, 'Fujian Green', 'Made from Fujian\'s small leaf variety, this innovative newly crafted tea is one of the most easily brewed and appreciated teas we have come across. ', 'Surprising, yet invigorating aromas of fresh mango and ripe melon accompany a sweet liquor void of bitterness. This is a must try for anyone who loves green tea.', 21, NULL, 'Edamame', 'Fresh Mango', 'Clean with a mildly dry finish', 'fujian_green.jpg'),
(17, 'Genmaicha', 'A unique tea experience with a textural appeal like no other.', 'In a marriage of two classic Japanese flavors, roasted rice adds a velvety note of popcorn and chestnuts to the bright vigor of whole leaf green tea.', 9, NULL, 'Oat Cereal', 'Coffee Grounds', 'Full and expansive', 'genmaicha.jpg'),
(18, 'Fujian Green', 'Made from Fujian\'s small leaf variety, this innovative newly crafted tea is one of the most easily brewed and appreciated teas we have come across. ', 'Surprising, yet invigorating aromas of fresh mango and ripe melon accompany a sweet liquor void of bitterness. This is a must try for anyone who loves green tea.', 21, NULL, 'Edamame', 'Fresh Mango', 'Clean with a mildly dry finish', 'fujian_green.jpg'),
(19, 'Shu Pu-erh', 'Our most robust selection, this Shu Pu-erh is the perfect tea for coffee lovers. ', 'Made in the centuries-old “cooked” method and then aged for one year, this tea has the sophistication of a much older Pu-erh. Just use one piece for a medium-sized teapot to enjoy a sweet and earthy liquor that can be re-steeped for a dozen infusions or more. An excellent drink for health according to traditional Chinese medicine.', 17, NULL, 'Black Coffee Mineral', 'Roasted Carrots', 'Full-bodied and smooth', 'shu_pu_erh.jpg'),
(20, 'Wild Picked Shu Pu-erh', 'Harvested by hand from wild growing arbor sized tea plants from Bulang Mountain, the leaves of this Shu Pu-erh are \"cooked\" for 40 days and then aged for a full year. ', 'A pleasantly earthy fragrance gives way to complex layers of sweet fruits and rewarding spice. Tea of this quality will infuse 15 times or more with some of the best infusions coming towards the end. Traditional Chinese medicine suggests that Pu-erh is an excellent drink for your health.', 27, NULL, 'Rye Bread Ginger', 'Gingerbread', 'Rich and juicy', 'wild_pu_erh.jpg'),
(21, 'Shu Pu-erh', 'Our most robust selection, this Shu Pu-erh is the perfect tea for coffee lovers. ', 'Made in the centuries-old “cooked” method and then aged for one year, this tea has the sophistication of a much older Pu-erh. Just use one piece for a medium-sized teapot to enjoy a sweet and earthy liquor that can be re-steeped for a dozen infusions or more. An excellent drink for health according to traditional Chinese medicine.', 17, NULL, 'Black Coffee Mineral', 'Roasted Carrots', 'Full-bodied and smooth', 'shu_pu_erh.jpg'),
(22, 'Wild Picked Shu Pu-erh', 'Harvested by hand from wild growing arbor sized tea plants from Bulang Mountain, the leaves of this Shu Pu-erh are \"cooked\" for 40 days and then aged for a full year. ', 'A pleasantly earthy fragrance gives way to complex layers of sweet fruits and rewarding spice. Tea of this quality will infuse 15 times or more with some of the best infusions coming towards the end. Traditional Chinese medicine suggests that Pu-erh is an excellent drink for your health.', 27, NULL, 'Rye Bread Ginger', 'Gingerbread', 'Rich and juicy', 'wild_pu_erh.jpg'),
(23, 'Pure Ceylon Tea', 'Our finest, high-grade rich Organic and  Fairtrade Ceylon Black Tea hasnâ€™t changed much over the years...', 'Begin your day with a superb broken leaf tea from Sri Lanka. Suggestions of roses and fine woods come from the dried leaves alone. Once infused, this tea is elegant and bright, yet hearty enough to support a drop of milk. BOP.', 10, '', 'Mineral Woody', 'Roasted tomatoes', 'Dry', 'ceylon-2.jpg'),
(24, 'Earl Grey Tea', 'High-grade Ceylon Black Tea, with tantalising aromas of fresh bergamot to whisk you away to lands far away.', '', 11, '', 'Wood', 'Smoke', 'Dry', 'earl-grey.jpg'),
(25, 'Assam Black Tea', 'Experience the strong and pungent flavour of our loose Assam tea that comes from pure, unblended tea leaves..', NULL, 9, NULL, NULL, NULL, NULL, 'assam.jpg'),
(26, 'Dragon Well Green Tea', 'Our fine Dragonwell green tea has a sweet, rounded flavor, full, nutty and buttery texture, and pleasantly dry finish. A truly satisfying cup of tea.', NULL, 11, NULL, NULL, NULL, NULL, 'dragonwell.jpg'),
(27, 'Budding Jasmine Rose', 'Young silver-tip tea leaves of exceptional quality are scented with jasmine, then wrapped around a real rosebud.', 'Simply place in an individual cup - ideally clear tempered glass - and watch each rose emerge moments after you add water. Approximately 4-5 pcs per ounce.', 15, NULL, 'Jasmine', 'Jasmine', 'Juicy', 'jasmine-bud.jpg'),
(28, 'Gunpowder Green Tea', 'his healthy green tea, delicately rolled into small pellets, has a floral and smoky aroma with plenty of natural sweetness.', NULL, 6, NULL, 'Smoky Earthy', 'Pine nuts', 'Clean', 'gunpowder.jpg'),
(29, 'Sencha Tea', 'Our fine Dragonwell green tea has a sweet, rounded flavor, full, nutty and buttery texture, and pleasantly dry finish. A truly satisfying cup of tea.', NULL, 13, NULL, 'Sun-dried ', 'Maize', 'Medium rich', 'sencha.jpg'),
(30, 'Ivan Tea', 'Carefully hand-picked in the very heart of Russia, dried and slightly fermented leaves and flowers of Ivan-tea (Epilobium angustifolium) will bring you good health and natural taste.', NULL, 7, NULL, 'Crispy rice', 'Grass', 'Clean', 'kiprey.jpg'),
(31, 'Jade Oolong', 'Named after it\'s low oxidation level, green tea drinkers will find this tea as a wonderful introduction to China\'s rich tradition of oolong tea. ', 'A delicate balance of vegetal and floral, this tea is sweet and aromatic but without some of the tannin present in a light oxidized Tieguanyin. Unassuming but thoroughly enjoyable, not unlike a good Pinot Grigio. Equally refreshing brewed hot or cold, this tea is the perfect year-round accompaniment to meals.', 12, NULL, 'Lemon Slices', 'Osthmanthus', 'Light with no astringency', 'oolong.jpg'),
(32, 'Dong Ding', 'The mountainous Dong Ding region near Taipei is celebrated for its lovely green oolong. ', 'Dong Ding can be made very strong, yet it consistently rewards with a mellow smoothness. The aroma suggests lilacs, first thing in the morning.', 15, NULL, 'Rose Water', 'Butter', 'Mouthwatering', 'dong_ding.jpg'),
(33, 'Jade Oolong', 'Named after it\'s low oxidation level, green tea drinkers will find this tea as a wonderful introduction to China\'s rich tradition of oolong tea. ', 'A delicate balance of vegetal and floral, this tea is sweet and aromatic but without some of the tannin present in a light oxidized Tieguanyin. Unassuming but thoroughly enjoyable, not unlike a good Pinot Grigio. Equally refreshing brewed hot or cold, this tea is the perfect year-round accompaniment to meals.', 12, NULL, 'Lemon Slices', 'Osthmanthus', 'Light with no astringency', 'oolong.jpg'),
(34, 'Dong Ding', 'The mountainous Dong Ding region near Taipei is celebrated for its lovely green oolong. ', 'Dong Ding can be made very strong, yet it consistently rewards with a mellow smoothness. The aroma suggests lilacs, first thing in the morning.', 15, NULL, 'Rose Water', 'Butter', 'Mouthwatering', 'dong_ding.jpg'),
(35, 'Pure Ceylon Tea', 'Our finest, high-grade rich Organic and  Fairtrade Ceylon Black Tea hasnâ€™t changed much over the years...', 'Begin your day with a superb broken leaf tea from Sri Lanka. Suggestions of roses and fine woods come from the dried leaves alone. Once infused, this tea is elegant and bright, yet hearty enough to support a drop of milk. BOP.', 10, '', 'Mineral Woody', 'Roasted tomatoes', 'Dry', 'ceylon-2.jpg'),
(36, 'Pure Ceylon Tea', 'Our finest, high-grade rich Organic and  Fairtrade Ceylon Black Tea hasnâ€™t changed much over the years...', 'Begin your day with a superb broken leaf tea from Sri Lanka. Suggestions of roses and fine woods come from the dried leaves alone. Once infused, this tea is elegant and bright, yet hearty enough to support a drop of milk. BOP.', 10, '', 'Mineral Woody', 'Roasted tomatoes', 'Dry', 'ceylon-2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `temp_orders`
--

CREATE TABLE `temp_orders` (
  `cart_id` int(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `good_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `full_price` int(11) AS (`quantity`*`price`) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `temp_orders`
--

INSERT INTO `temp_orders` (`cart_id`, `user_id`, `good_id`, `quantity`, `price`) VALUES
(3, '3', 1, 1, 10),
(31, '2d4d92aac80b70d36c2377b18c0aa88b', 1, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `uname`, `login`, `password`) VALUES
(1, 'First user', 'first@mail.co', '5f4dcc3b5aa765d61d8327deb882cf99bfeifheidsl7'),
(2, 'Second User', 'second@mail.co', '827ccb0eea8a706c4c34a16891f84e7bbfeifheidsl7'),
(3, 'Administrator', 'admin@tea.org', '21232f297a57a5a743894a0e4a801fc3bfeifheidsl7'),
(7, 'Test user', 'test@mail.c', '67c762276bced09ee4df0ed537d164eabfeifheidsl7'),
(18, 'Will', 'will@tea.org', '123'),
(20, 'Walter', 'water@test.org', '098f6bcd4621d373cade4e832627b4f6bfeifheidsl7'),
(21, 'vasya', 'vasya@n.t', 'a127c4fdad3080541ec6acc0d8acd704bfeifheidsl7');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `temp_orders`
--
ALTER TABLE `temp_orders`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `good_id` (`good_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `temp_orders`
--
ALTER TABLE `temp_orders`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `temp_orders`
--
ALTER TABLE `temp_orders`
  ADD CONSTRAINT `temp_orders_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
