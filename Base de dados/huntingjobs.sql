-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jan-2023 às 00:41
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
(3, 1, 'Titulo1', 'Titulo1', 'Titulo1', 2),
(4, 1, 'Programador C#', '<p>Programador C#</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Skill1</li>\r\n	<li>Skill2</li>\r\n	<li>Skill3</li>\r\n</ul>\r\n', '<p>Programador C#</p>\r\n', 1);

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
('common_user', '2', 1668700944),
('common_user', '31', 1672600391),
('common_user', '32', 1672600612),
('common_user', '34', 1672600855);

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
  `descricao` text NOT NULL,
  `contactoTelefone` int(9) DEFAULT NULL,
  `contactoTelemovel` int(9) DEFAULT NULL,
  `morada` varchar(75) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `idAdmin`, `Nome`, `descricao`, `contactoTelefone`, `contactoTelemovel`, `morada`, `email`) VALUES
(1, 1, 'Empresa 1', '<p>Descri&ccedil;&atilde;o da empresa 1</p>\r\n\r\n<p>Teste da formata&ccedil;&atilde;o do texto da empresa 1</p>\r\n\r\n<ul>\r\n	<li>-Teste Linguagens de programa&ccedil;&atilde;o\r\n	<ul>\r\n		<li>-Java</li>\r\n		<li>-C#</li>\r\n		<li>-PHP</li>\r\n		<li>-CSS</li>\r\n		<li>-Python</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 912345678, 261121212, 'morada da empresa1', 'empresa1@outlook.pt'),
(2, 2, 'Empresa do user 2', 'Descrição da empresa 2 \r\nTeste da formatação do texto da empresa 1\r\n -Teste Linguagens de programação \r\n-Java \r\n-C# \r\n-PHP \r\n-CSS \r\n-Python', 912345678, 216121212, 'Morada da Empresa 2', 'empresa2@outlook.pt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencia`
--

CREATE TABLE `experiencia` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `experiencia`
--

INSERT INTO `experiencia` (`id`, `idUser`, `titulo`, `descricao`, `categoria`, `data_inicio`, `data_fim`) VALUES
(1, 1, 'Programador C#', 'Desenvolvimento de Software costumizado ao gosto do cliente.', 1, '2010-10-10', '2020-11-27'),
(2, 1, 'Programador WEB', 'Desenvolvimento de um website de loja de roupa Online com a framework PRESTASHOP.\r\nManutenção do stock e produtos da cliente através da conexão á API do software SAGE.', 1, '2022-02-28', '2022-06-26'),
(3, 1, 'Programação Unity3D', 'Desenvolvimento de um videojogo em 3D usando a plataforma Unity para o museu da Lourinha.\r\nO jogo tinha como objetivo dar uma pequena idea de como era o tempo dos dinossauros ás crianças que visitavam o museu.', 1, '2022-06-21', '2022-07-26');

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
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Monteiro', 'umykV5DNWr3yn45LMbyUGGzwtTQd_H_U', '$2y$13$bRLIsUjr77FnSFGPyrMpXOiWkRiwLq4R/xf9SJfKGz8H9w76/.73m', NULL, 'monteiro@outlook.pt', 10, '0000-00-00', '0000-00-00 00:00:00', '5oclOf00qQai7068dpBCkG_OIEBGVAsY_1668696456'),
(2, 'MonteiroComum', 'PDb3Lrlo5CDrVybqK_3DKAN0mJt5srVl', '$2y$13$aWxw/t9hjrE1jBmp2TN6P.4/9ne30dN9veFP6DBUOtXcfNSCHU.rK', NULL, 'MonteiroComum@outlook.pt', 10, '2022-12-20', '0000-00-00 00:00:00', 'N_YleDaQF28aELpnKfjjjCxKX7Mfw2k__1668701014'),
(25, 'somethingelse', '5NRxVJQQeX8hH8Aj2NRHRoJ8WGKFPljQ', '$2y$13$0vKepj9TOWfEB5DRXdgsuewZ1EWJWcIC8765JKPzQImU12XuSw29O', NULL, 'something@email.pt', 10, '0000-00-00', '0000-00-00 00:00:00', 'z_Ivo_cTln3X1Fv9ZmQnaq7WDxB7YHPg_1672348787'),
(28, 'Monteiro2', 'xcfLwlk6chpIDzMp2Qnnzc1eJVIoTqg7', '$2y$13$EVLOQ1uId3ZnksjJKWgrBeHi65uQrWXFVYBP6ljrjiSPXpdeYJhCK', NULL, 'email@email.pt', 10, '0000-00-00', '0000-00-00 00:00:00', 'smT9fNMIr_4FCjv7iLItlOHh9r2w9DCJ_1672350137');

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
-- Índices para tabela `experiencia`
--
ALTER TABLE `experiencia`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
