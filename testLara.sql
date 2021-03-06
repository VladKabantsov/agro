-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 04 2018 г., 13:13
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testLara`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Родентициди'),
(2, 'Інсектициди');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `barcode` int(10) UNSIGNED NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `manfac_id` int(10) UNSIGNED NOT NULL,
  `measure_id` int(10) UNSIGNED NOT NULL,
  `g_name` varchar(60) NOT NULL,
  `rec_price` int(10) UNSIGNED DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `log_date` datetime NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `price1` int(10) UNSIGNED NOT NULL,
  `price2` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `logs`
--

(1, 1, 15, '2018-01-02 08:32:52', 1, 470, 900),
(2, 2, 5, '2018-01-02 08:34:58', 1, 55, 300);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2017_12_30_080427_create_nerds_table', 1);

-- --------------------------------------------------------

--
INSERT INTO `logs` (`id`, `order_id`, `quantity`, `log_date`, `user_id`, `price1`, `price2`) VALUES
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `goods_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `rem_goods` int(10) UNSIGNED NOT NULL COMMENT 'remaining goods',
  `price` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица заказов';

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `goods_id`, `quantity`, `rem_goods`, `price`, `date`, `user_id`) VALUES
(1, 1, 10, 0, 27, '2017-12-31 15:56:58', 1),
(2, 1, 20, 15, 40, '2018-12-31 15:57:46', 1),
(3, 2, 30, 25, 11, '2017-12-31 15:58:18', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `selling_prices`
--

CREATE TABLE `selling_prices` (
  `id` int(11) NOT NULL,
  `goods_id` int(10) UNSIGNED NOT NULL,
  `sprice` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `selling_prices`
--

INSERT INTO `selling_prices` (`id`, `goods_id`, `sprice`, `date`, `user_id`) VALUES
(1, 1, 40, '2017-01-01 10:28:49', 1),
(2, 2, 20, '2018-01-01 10:29:33', 1),
(3, 1, 60, '2018-01-01 10:29:47', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Daisy Lebsack Jr.', 'bzemlak@example.org', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(2, 'Leila Corkery', 'wkoepp@example.org', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(3, 'Rhiannon Brekke', 'esta01@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(4, 'Prof. Clementina Fay', 'harris.alexandrea@example.com', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(5, 'Omer Skiles', 'dach.silas@example.com', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(6, 'Eldred McGlynn', 'jenifer.feest@example.org', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(7, 'Ernestina Schultz', 'henriette49@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(8, 'Jaylan Yost', 'verna15@example.org', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(9, 'Mr. Lawrence Heathcote IV', 'claudia33@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(10, 'George Moen', 'berge.rudy@example.com', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(11, 'Prof. Reuben Witting', 'vonrueden.michaela@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(12, 'Prof. Burley Walter Sr.', 'hkutch@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(13, 'Dr. Mason Streich', 'rwalsh@example.com', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(14, 'Antone Cole', 'julien.roberts@example.org', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(15, 'Hardy Spencer', 'cpadberg@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(16, 'Isobel Deckow', 'tlittel@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(17, 'Mabel Aufderhar', 'mhaag@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(18, 'Isobel Block II', 'mills.jay@example.org', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(19, 'Zackery Mitchell', 'lola17@example.org', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(20, 'Prof. Kellen VonRueden MD', 'stefanie.feil@example.net', '$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi', '2018-01-02 15:05:35', '2018-01-02 15:05:35'),
(21, 'test', 'test@test.com', '$2y$10$amv0Nf.JSw9G5gn.OEOveua08qKUUf/ibE/w86FFC5ybuEfKX6unm', '2018-01-03 05:13:37', '2018-01-03 05:13:37');

--
-- Индексы сохранённых таблиц
--

--
-- Структура таблицы `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manfac_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `measures`
--

CREATE TABLE `measures` (
  `id` int(11) NOT NULL,
  `meas_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Индексы таблицы `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `selling_prices`
--
ALTER TABLE `selling_prices`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для таблицы `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Индексы таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `selling_prices`
--
ALTER TABLE `selling_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
