-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Dez-2022 às 19:07
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `huntingjobs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `id` int(11) NOT NULL,
  `id_Empresa` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `perfil_procurado` text NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id`, `id_Empresa`, `titulo`, `descricao`, `perfil_procurado`, `categoria`) VALUES
(1, 1, 'Titulo1', 'Descricao 1', 'perfil 1', 0),
(2, 4, 'Tituloteste', 'Tituloteste', 'Tituloteste', 0),
(3, 1, 'Titulo1', 'Titulo1', 'Titulo1', 2),
(4, 1, 'Programador C#', 'Programador C#', 'Programador C#', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1668700944),
('admin', '6', 1668700944);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1668700944, 1668700944),
('common_user', 1, NULL, NULL, NULL, 1668700944, 1668700944),
('post/create', 2, 'Create a post', NULL, NULL, 1668700944, 1668700944),
('post/delete', 2, 'Delete own post', NULL, NULL, 1668700944, 1668700944),
('post/update', 2, 'Update post', NULL, NULL, 1668700944, 1668700944);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'common_user'),
('admin', 'post/update'),
('common_user', 'post/create'),
('common_user', 'post/delete'),
('common_user', 'post/update');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatura`
--

CREATE TABLE `candidatura` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data_candidatura` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `Nome`) VALUES
(1, 'Informática'),
(2, 'Marketing'),
(3, 'Administração / Secretariado'),
(4, 'Arquitetura / Design');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `descricao` varchar(999) NOT NULL,
  `contactoTelefone` int(9) DEFAULT NULL,
  `contactoTelemovel` int(9) DEFAULT NULL,
  `morada` varchar(75) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `idAdmin`, `Nome`, `descricao`, `contactoTelefone`, `contactoTelemovel`, `morada`, `email`) VALUES
(1, 1, 'Empresa 1', 'Descrição da empresa 1\r\n\r\nTeste da formatação do texto da empresa 1\r\n     -Teste\r\n\r\nLinguagens de programação\r\n     -Java\r\n     -C#\r\n     -PHP\r\n     -CSS\r\n     -Python\r\n', 912345678, 261121212, 'morada da empresa1', 'empresa1@outlook.pt'),
(2, 2, 'Empresa do user 2', 'Descrição da empresa 2 \r\nTeste da formatação do texto da empresa 1\r\n -Teste Linguagens de programação \r\n-Java \r\n-C# \r\n-PHP \r\n-CSS \r\n-Python', 912345678, 216121212, 'Morada da Empresa 2', 'empresa2@outlook.pt'),
(3, 1, 'IPL', '<p>Empresa 2</p>\r\n\r\n<hr />\r\n<p>Skills necess&aacute;rias</p>\r\n\r\n<ol>\r\n	<li>C#</li>\r\n	<li>Java</li>\r\n	<li>PHP</li>\r\n	<li>Python</li>\r\n</ol>\r\n', 918782326, NULL, 'Travessa da FOnte', 'pedromonteiroescola@outlook.pt'),
(4, 1, 'Empresa Teste', '<ul>\r\n	<li>Empresa</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>Something in Empresa</li>\r\n	<li>Something else in empresa\r\n	<ol>\r\n		<li>Something in point 2</li>\r\n	</ol>\r\n	</li>\r\n</ol>\r\n', 918782326, 261212121, 'Morada da Empresa Teste', 'empresateste@hotmail.pt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `expprofissionais`
--

CREATE TABLE `expprofissionais` (
  `experiencias` varchar(700) NOT NULL,
  `referencias` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1668694610),
('m130524_201442_init', 1668694612),
('m140506_102106_rbac_init', 1668695022),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1668695022),
('m180523_151638_rbac_updates_indexes_without_prefix', 1668695022),
('m190124_110200_add_verification_token_column_to_user_table', 1668694612),
('m200409_110543_rbac_update_mssql_trigger', 1668695022),
('m221117_154851_init_rbac', 1668700944);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Monteiro', 'umykV5DNWr3yn45LMbyUGGzwtTQd_H_U', '$2y$13$bRLIsUjr77FnSFGPyrMpXOiWkRiwLq4R/xf9SJfKGz8H9w76/.73m', NULL, 'monteiro@outlook.pt', 10, 1668696456, 1668696456, '5oclOf00qQai7068dpBCkG_OIEBGVAsY_1668696456'),
(2, 'MonteiroComum', 'PDb3Lrlo5CDrVybqK_3DKAN0mJt5srVl', '$2y$13$aWxw/t9hjrE1jBmp2TN6P.4/9ne30dN9veFP6DBUOtXcfNSCHU.rK', NULL, 'MonteiroComum@outlook.pt', 10, 1668701014, 1668701014, 'N_YleDaQF28aELpnKfjjjCxKX7Mfw2k__1668701014'),
(5, 'MonteiroAdmin', 'xeFqgQtXAM4NBwGkrO8tYo13Bbo380wV', '$2y$13$.WWzoGAHGnQ8Ft/9K5J1du/E.SpjHanclerQb1vsoBYkDLfTLgky6', NULL, 'MonteiroAdmin@admin.pt', 10, 1669040611, 1669040611, 'yo_nCpwGeVqlBg40Gh9g0CuB9PYl6Qgd_1669040611'),
(6, 'Tomas', '6qV0TwUDpGja4RAH-amisncx_6tUDMeZ', '$2y$13$O8nIN4FEYpNSv09teu7IQut2LGoUxIwjYRHBGb31d.X7SQyF/l6Mu', NULL, 'tomas_h.jeronimo@hotmail.com', 10, 1669114386, 1669114386, 'p52UMiMF1yoeBf1omPad4xK57b3uaaI6_1669114386'),
(7, 'TomasComum', '2yKBFobP1EdUt9c2CVggfHEKuDkMSmq_', '$2y$13$PHWVKJM0OYRniNxevDsHSu/RcvtYRoCg7NK6UYCD7iOHFrEcBNChK', NULL, 'tomashjeronimo@gmail.com', 10, 1669130284, 1669130284, '6DX3afeJo58uAohzX6bTwUCtE0WvqVjE_1669130284'),
(8, 'rita', 'A5nl0CSBGuqMmADsHIIxkLIqxF3j66_J', '$2y$13$nXRVcuJCAFnzXpsko1vvmexZQQZup/uLJXp6beFBrUOvk0Vd3X6LW', NULL, 'rita12345678@gmail.com', 10, 1669206325, 1669206325, 'p3i-HegRmaH6A1yR12I80lgqQ60No1KY_1669206325'),
(9, 'xico', '35WAlFCrN112VV6haMdMbB0nsxTAcOdZ', '$2y$13$EiYuvuPRrqf8yvu.YLW.Wea3QBVK17Cher.rJYgMRFjjYTi0C30Qe', NULL, 'xico12345678@gmail.com', 10, 1669206519, 1669206519, 'hYucwEKAVgvCHDlp1geEzf52LlcMTbQP_1669206519');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Índices para tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Índices para tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Índices para tabela `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Índices para tabela `candidatura`
--
ALTER TABLE `candidatura`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`idAdmin`);

--
-- Índices para tabela `expprofissionais`
--
ALTER TABLE `expprofissionais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `candidatura`
--
ALTER TABLE `candidatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `expprofissionais`
--
ALTER TABLE `expprofissionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
