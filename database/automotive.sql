-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2024 г., 20:39
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `automotive`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `admin_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `admin_password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `role` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `admin_email`, `mobile`, `admin_password`, `role`) VALUES
(1, 'Абел', 'Нгоян', 'aboba@gmail.com', '89092261337', 'abobarus', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `short_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `full_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `short_text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `full_text` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `short_image`, `full_image`, `short_text`, `full_text`, `date`) VALUES
(1, 'Мы открылись!', 'news/e380a9c0d39cd0abac63035672706aac.jpg', 'news/c68a14113f31cfb117a333f989765e19.jpg', 'Новая станция на Московское шоссе, 5д', 'Приглашаем всех клиентов на БЕСПЛАТНУЮ* замену масла в двигателе.  Сервис и магазин масел в одном месте.  Масла, фильтры в наличии и на заказ.  Замена масла в АКПП!', '2022-02-24');

-- --------------------------------------------------------

--
-- Структура таблицы `promos`
--

CREATE TABLE `promos` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `short_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `full_image` varchar(255) DEFAULT NULL,
  `short_text` text NOT NULL,
  `full_text` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `promo_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `promos`
--

INSERT INTO `promos` (`id`, `name`, `short_image`, `full_image`, `short_text`, `full_text`, `promo_date`) VALUES
(1, 'Все масла здесь!\r\n', 'promos/16d1789f14b7c0d2be59469c4d8f3747.png', 'promos/8fc6aa371666364bd8d06625b569af17.png', 'Оригинальное масло в канистрах и на розлив от официальных поставщиков.', 'На каждой станции в наличии представлен большой ассортимент масел, фильтров, технических жидкостей, тормозных колодок, свечей зажигания и лампочек для фар.  Масло в канистрах и на розлив.  Моторное масло для грузовых автомобилей!  Мы продаём только оригинальное масло от официальных поставщиков.  На все масла имеются сертификаты качества.  Мы дорожим своей репутацией, поэтому покупая масло в Aвтомотив Вы можете со 100%-ой уверенностью знать, что заливаете настоящее оригинальное масло. А за счёт больших объёмов реализуемого масла, мы можем позволить себе такие низкие цены.', '2022-02-24');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `service` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='записи на обслуживание';

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `user_name`, `user_email`, `service`, `description`, `date`, `time`) VALUES
(1, 4, 'Абел', 'abelchik.ru@gmail.com', 'Ремонт двигателя', 'В машине поменять прокладку', '2024-01-01', '09:00:00'),
(2, 4, 'Абел', 'abelchik.ru@gmail.com', 'Ремонт двигателя', 'eeee', '2024-01-01', '10:00:00'),
(3, 4, 'Абел', 'abelchik.ru@gmail.com', 'Инвалид', 'Арлекино с6 хочу', '2024-05-14', '15:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `review` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `image`) VALUES
(11, 'Ремонт двигателя', 'services/6f04c20b5d9f46e9a888ca6dca3a33ee.png'),
(12, 'Слесарный ремонт', 'services/655b0ab1278b5c5b95848b03ee00c86e.png'),
(14, 'Автомойка', 'services/f5c02080cae7f230664870c41e88e55c.png'),
(15, 'Кузовные работы', 'services/03dac311242c3e03e049735c466d4fc8.png'),
(16, 'Техобслуживание', 'services/3f237abef77349a161b2d92a59f42656.png'),
(17, 'Покраска', 'services/38ece0b0967fb122cf45d6783072403f.png'),
(18, 'Магазин запчастей', 'services/422d98881b1cd9ab5cc47cc474b464ae.png'),
(19, 'Шиномонтаж', 'services/b5855e067bc40ac5c5cd6019b86fc62d.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица пользователей';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(4, 'Абел', 'abelchik.ru@gmail.com', '$2y$10$IVlLxjQVc0X20O0g/NI/3OXNf5pz9ckjzch1TZUump4gNdydGgeim', 1),
(5, 'фиксер', 'fikser6@gmail.com', '$2y$10$Lfn/zvTxz4nzOl6HlO1l5uL.XKhncLf/Cd5DyjgUfQ0kxG2oFi8.2', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `promos`
--
ALTER TABLE `promos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
