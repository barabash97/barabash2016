-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Apr 06, 2016 alle 22:39
-- Versione del server: 5.6.26
-- Versione PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vladicms`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `blogs`
--

INSERT INTO `blogs` (`id`, `id_user`, `id_category`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Roma news aggiornato a', '   Le notizie sulla societ'' di A.S. Roma   ', '2016-04-01 16:41:50', '2016-04-02 16:41:46'),
(2, 2, 1, 'Real Madrid Fun Club', 'Real Madrid Fun Club', '2016-04-04 12:37:57', '2016-04-04 12:37:57'),
(3, 2, 1, 'Arsenal Guinners', 'Arsenal Guinners', '2016-04-04 12:39:44', '2016-04-04 12:39:44');

-- --------------------------------------------------------

--
-- Struttura della tabella `blog_articles`
--

CREATE TABLE IF NOT EXISTS `blog_articles` (
  `id` int(10) unsigned NOT NULL,
  `id_blog` int(11) NOT NULL DEFAULT '1',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` text COLLATE utf8_unicode_ci,
  `meta_desc` text COLLATE utf8_unicode_ci,
  `full_text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `blog_articles`
--

INSERT INTO `blog_articles` (`id`, `id_blog`, `title`, `meta_key`, `meta_desc`, `full_text`, `created_at`, `updated_at`) VALUES
(1, 1, 'Primo articolo', 'Primo articoloPrimo articoloPrimo articoloPrimo articolo', 'Primo articoloPrimo articoloPrimo articolo', 'Primo articoloPrimo articoloPrimo articoloPrimo articoloPrimo articolo', '2016-04-01 16:53:35', '2016-04-01 16:53:35'),
(2, 1, 'dqwwwwwwwwww', '', '', 'dwqwwwwwwwwwwww', '2016-04-01 16:56:30', '2016-04-01 16:56:30'),
(3, 1, 'dqwwqdwdq', '', '', 'dwqwqdwdqdwqqw', '2016-04-01 16:57:00', '2016-04-01 16:57:00'),
(4, 1, 'Articolo di prova', 'key,key,key', 'description lalalalala', 'fulllldlwlqdwldqlwqlwlqdldlqqldlqdwlqdwqdwqdwqdwdqwqdw', '2016-04-02 15:23:41', '2016-04-02 15:23:41'),
(5, 1, 'Totti rinnova il contratto! aggiornato', 'totti, roma, gladiatore', 'Totti e Roma stringono la mano', 'Totti e Roma stringono la manoTotti e Roma stringono la manoTotti e Roma stringono la manoTotti e Roma stringono la manoTotti e Roma stringono la manodwqdqqwd ~~~ Aggiornato! xD', '2016-04-02 15:34:41', '2016-04-02 16:44:15'),
(6, 2, 'Ronaldo decisivo contro il Barca aggiornato', 'ronaldo, real madrid, barcellona, el clasico', 'El clasico - Il ritorno', 'Il sabato Ronaldo decisivo contro il Barca . Risultato finale 2:1', '2016-04-04 12:40:51', '2016-04-04 12:41:06');

-- --------------------------------------------------------

--
-- Struttura della tabella `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `id_root` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `description`, `id_root`) VALUES
(1, 'Sport', 'Tutto su sport', 0),
(2, 'Finanza', 'Tutto sulla finanza', 0),
(3, 'Viaggio', 'Tutto sul viaggio', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(10) unsigned NOT NULL,
  `user1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user1_is_typing` tinyint(1) NOT NULL DEFAULT '0',
  `user2_is_typing` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `chats`
--

INSERT INTO `chats` (`id`, `user1`, `user2`, `user1_is_typing`, `user2_is_typing`, `created_at`, `updated_at`) VALUES
(2, '1', '2', 0, 0, '2016-04-03 22:00:00', '2016-04-03 22:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `chat_messages`
--

CREATE TABLE IF NOT EXISTS `chat_messages` (
  `id` int(10) unsigned NOT NULL,
  `sender_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_username`, `message`, `read`, `created_at`, `updated_at`) VALUES
(2, '2', 'da 2 a 1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_30_170437_CreateBlogsTable', 1),
('2016_03_30_171707_CreateBlogCategoriesTable', 1),
('2016_03_30_172024_CreateBlogArticlesTable', 1),
('2016_04_04_150140_CreateUserFriendsTable', 2),
('2016_04_04_150612_CreateUserMessagesTable', 3),
('2016_04_04_170743_CreateChatsTable', 4),
('2016_04_04_170859_CreateChatMessagesTable', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_reg` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `confirm_reg`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@vladicms.it', '$2y$10$GYZv4zzzwOU.3c3xAT8SsOF89.fk7uH1SmhLYk4QSPubFIg9fEuj2', 'Volodymyr', 'Barabash', 0, 'zcKyF01Rn9fkbzjJkcIwFMlBT7wWMPnSL7bXoGgaivKmfGH9WBn3mPYiNB11', '2016-03-30 18:05:53', '2016-04-01 15:01:12'),
(2, 'andrey.gusev', 'andrey.gusev@mail.ru', '$2y$10$KCisvEWm2EMiO7pwe0mKUuOJmptt2xXmZhK1C5rrEXVFAI3vk0rpa', 'Andrey', 'Gusev', 0, 'dtK6qOvlajkcXhogXWqxKrgjMrurhWJLgOAEafENviXkWOMfjGaFyESH0tET', '2016-04-01 15:01:26', '2016-04-04 13:17:53');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_friends`
--

CREATE TABLE IF NOT EXISTS `user_friends` (
  `id` int(10) unsigned NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `user_messages`
--

CREATE TABLE IF NOT EXISTS `user_messages` (
  `id` int(10) unsigned NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `user_messages`
--

INSERT INTO `user_messages` (`id`, `from`, `to`, `text`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'babqwq', '2016-04-04 16:53:01', '2016-04-04 16:53:01'),
(2, 1, 2, 'wdqqdwwdqwd', '2016-04-05 16:06:47', '2016-04-05 16:06:47'),
(3, 1, 2, 'ciao ciao', '2016-04-05 16:07:18', '2016-04-05 16:07:18'),
(4, 1, 2, 'ciao', '2016-04-05 16:57:26', '2016-04-05 16:57:26'),
(5, 2, 1, 'ciaowqdqdqdqdq', '2016-04-05 16:58:32', '2016-04-05 16:58:32'),
(6, 2, 1, 'hahahha', '2016-04-05 16:58:49', '2016-04-05 16:58:49'),
(7, 2, 1, 'dwqdqdwdqwdqw', '2016-04-05 17:00:11', '2016-04-05 17:00:11'),
(8, 2, 1, '12415661', '2016-04-05 17:01:46', '2016-04-05 17:01:46');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indici per le tabelle `user_friends`
--
ALTER TABLE `user_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `user_friends`
--
ALTER TABLE `user_friends`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
