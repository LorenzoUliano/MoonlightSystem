-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2022 às 04:11
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
-- Banco de dados: `banco302`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_auditoria`
--

CREATE TABLE `tb_auditoria` (
  `id_auditoria` int(11) NOT NULL,
  `nm_tabela` varchar(255) NOT NULL,
  `dt_evento` datetime NOT NULL,
  `evento` varchar(255) NOT NULL,
  `vl_anterior` varchar(255) DEFAULT NULL,
  `vl_novo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_auditoria`
--

INSERT INTO `tb_auditoria` (`id_auditoria`, `nm_tabela`, `dt_evento`, `evento`, `vl_anterior`, `vl_novo`) VALUES
(1, 'tb_pedido', '2022-05-16 14:27:20', 'INSERT', NULL, '21|3|1|'),
(2, 'tb_pedido', '2022-05-16 14:28:13', 'INSERT', NULL, '22|3|1|'),
(3, 'tb_produto', '2022-05-19 10:31:25', 'INSERT', NULL, NULL),
(4, 'tb_produto', '2022-05-19 10:31:25', 'INSERT', NULL, NULL),
(5, 'tb_produto', '2022-05-19 10:31:25', 'INSERT', NULL, NULL),
(6, 'tb_itens_venda', '2022-05-31 09:38:23', 'INSERT', NULL, '4|1|1|10|1.00'),
(7, 'tb_itens_venda', '2022-05-31 09:38:30', 'INSERT', NULL, '5|1|1|12|1.00'),
(8, 'tb_itens_venda', '2022-05-31 09:41:28', 'INSERT', NULL, '6|1|1|1|1.00'),
(9, 'tb_itens_venda', '2022-05-31 09:42:59', 'INSERT', NULL, '7|1|1|1|1.00'),
(10, 'tb_itens_venda', '2022-05-31 09:43:37', 'INSERT', NULL, '8|1|1|1|1.00'),
(11, 'tb_itens_venda', '2022-05-31 09:45:06', 'INSERT', NULL, '9|1|1|1|1.00'),
(12, 'tb_itens_venda', '2022-05-31 09:46:54', 'INSERT', NULL, '10|1|1|1|1.00'),
(13, 'tb_itens_venda', '2022-05-31 09:49:24', 'INSERT', NULL, '11|19|34|1|1.00'),
(14, 'tb_itens_venda', '2022-05-31 09:54:44', 'DELETE', '11|19|34|1|1.00', NULL),
(15, 'tb_itens_venda', '2022-05-31 09:54:51', 'INSERT', NULL, '12|21|28|1|1.00'),
(16, 'tb_itens_venda', '2022-05-31 10:35:43', 'UPDATE', '12|21|28|2|1.00', '12|21|28|3|1.00'),
(17, 'tb_itens_venda', '2022-11-15 16:02:19', 'INSERT', NULL, '13|0|27|12|0.00'),
(18, 'tb_itens_venda', '2022-11-15 16:04:21', 'INSERT', NULL, '14|0|15|1|0.00'),
(19, 'tb_itens_venda', '2022-11-15 16:07:52', 'INSERT', NULL, '15|0|20|1|0.00'),
(20, 'tb_itens_venda', '2022-11-15 16:10:20', 'DELETE', '13|0|27|12|0.00', NULL),
(21, 'tb_itens_venda', '2022-11-15 16:10:21', 'DELETE', '14|0|15|1|0.00', NULL),
(22, 'tb_itens_venda', '2022-11-15 16:11:22', 'INSERT', NULL, '16|0|32|1|0.00'),
(23, 'tb_itens_venda', '2022-11-15 16:11:28', 'DELETE', '16|0|32|1|0.00', NULL),
(24, 'tb_itens_venda', '2022-11-15 16:11:32', 'INSERT', NULL, '17|0|18|1|0.00'),
(25, 'tb_itens_venda', '2022-11-15 16:15:04', 'INSERT', NULL, '18|0|28|12|0.00'),
(26, 'tb_produto', '2022-11-15 16:27:30', 'INSERT', NULL, NULL),
(27, 'tb_produto', '2022-11-15 16:27:52', 'DELETE', '4|Feijão|2.00|3.00|dqweqwewerwe|1|19.00', NULL),
(28, 'tb_produto', '2022-11-15 16:27:57', 'DELETE', NULL, NULL),
(29, 'tb_produto', '2022-11-15 16:28:02', 'DELETE', NULL, NULL),
(30, 'tb_produto', '2022-11-15 16:28:04', 'DELETE', NULL, NULL),
(31, 'tb_produto', '2022-11-15 16:28:06', 'DELETE', NULL, NULL),
(32, 'tb_produto', '2022-11-15 16:28:08', 'DELETE', NULL, NULL),
(33, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(34, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(35, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(36, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(37, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(38, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(39, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(40, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(41, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(42, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(43, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(44, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(45, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(46, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(47, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(48, 'tb_produto', '2022-11-15 16:28:36', 'DELETE', NULL, NULL),
(49, 'tb_grupo', '2022-11-15 16:28:56', 'DELETE', '3|Vestuário|', NULL),
(50, 'tb_grupo', '2022-11-15 16:28:56', 'DELETE', '4|Eletrdomésticos|', NULL),
(51, 'tb_grupo', '2022-11-15 16:28:57', 'DELETE', '10|Eletromoveis |', NULL),
(52, 'tb_grupo', '2022-11-15 16:28:58', 'DELETE', '11|Carros |', NULL),
(53, 'tb_grupo', '2022-11-15 16:28:58', 'DELETE', '12|Carros |', NULL),
(54, 'tb_grupo', '2022-11-15 16:28:59', 'DELETE', '13|Gabriel|', NULL),
(55, 'tb_grupo', '2022-11-15 16:28:59', 'DELETE', '14|junor|', NULL),
(56, 'tb_grupo', '2022-11-15 16:29:39', 'INSERT', NULL, '15|Alimenticio|'),
(57, 'tb_grupo', '2022-11-15 16:29:41', 'DELETE', '15|Alimenticio|', NULL),
(58, 'tb_grupo', '2022-11-15 16:29:46', 'INSERT', NULL, '16|Comida|'),
(59, 'tb_grupo', '2022-11-15 16:29:57', 'DELETE', '16|Comida|', NULL),
(60, 'tb_grupo', '2022-11-15 16:30:00', 'INSERT', NULL, '17|Doce|'),
(61, 'tb_grupo', '2022-11-15 16:30:03', 'INSERT', NULL, '18|Salgado|'),
(62, 'tb_pedido', '2022-11-15 16:30:53', 'UPDATE', '19|2|1', '19|2|1'),
(63, 'tb_produto', '2022-11-15 16:34:57', 'INSERT', NULL, NULL),
(64, 'tb_itens_venda', '2022-11-15 16:35:17', 'INSERT', NULL, '19|0|40|5|0.00'),
(65, 'tb_itens_venda', '2022-11-15 22:00:02', 'INSERT', NULL, '20|0|40|5|0.00'),
(66, 'tb_itens_venda', '2022-11-15 22:00:13', 'INSERT', NULL, '21|0|40|30|0.00'),
(67, 'tb_itens_venda', '2022-11-15 22:00:26', 'DELETE', '20|0|40|5|0.00', NULL),
(68, 'tb_itens_venda', '2022-11-15 22:00:26', 'DELETE', '21|0|40|30|0.00', NULL),
(69, 'tb_produto', '2022-11-15 22:01:15', 'INSERT', NULL, NULL),
(70, 'tb_itens_venda', '2022-11-15 22:01:37', 'INSERT', NULL, '22|0|41|1|0.00'),
(71, 'tb_vendedor', '2022-11-15 22:06:22', 'UPDATE', '1|Pedro', '1|Pedro'),
(72, 'tb_vendedor', '2022-11-15 22:06:27', 'UPDATE', '1|Pedro', '1|Pedro Foda'),
(73, 'tb_vendedor', '2022-11-15 22:06:35', 'INSERT', NULL, '2|Pedro 3|'),
(74, 'tb_grupo', '2022-11-15 22:10:05', 'INSERT', NULL, '19|Agridoce|'),
(75, 'tb_grupo', '2022-11-15 22:10:18', 'DELETE', '17|Doce|', NULL),
(76, 'tb_vendedor', '2022-11-15 22:56:40', 'INSERT', NULL, '3||'),
(77, 'tb_pedido', '2022-11-15 23:04:41', 'INSERT', NULL, '23|2|2|'),
(78, 'tb_vendedor', '2022-11-15 23:05:51', 'INSERT', NULL, '4|Carlos|'),
(79, 'tb_vendedor', '2022-11-15 23:05:53', 'DELETE', '3||', NULL),
(80, 'tb_itens_venda', '2022-11-15 23:39:53', 'INSERT', NULL, '23|0|41|12|0.00'),
(81, 'tb_itens_venda', '2022-11-15 23:39:58', 'INSERT', NULL, '24|0|40|1|0.00'),
(82, 'tb_itens_venda', '2022-11-15 23:39:59', 'DELETE', '23|0|41|12|0.00', NULL),
(83, 'tb_itens_venda', '2022-11-15 23:40:11', 'INSERT', NULL, '25|0|40|1|0.00'),
(84, 'tb_itens_venda', '2022-11-15 23:40:16', 'DELETE', '24|0|40|1|0.00', NULL),
(85, 'tb_itens_venda', '2022-11-15 23:40:16', 'DELETE', '25|0|40|1|0.00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cidade`
--

CREATE TABLE `tb_cidade` (
  `id_cidade` int(11) NOT NULL,
  `nm_cidade` varchar(55) DEFAULT NULL,
  `uf_cidade` varchar(2) DEFAULT NULL,
  `dt_cadastro` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_cidade`
--

INSERT INTO `tb_cidade` (`id_cidade`, `nm_cidade`, `uf_cidade`, `dt_cadastro`) VALUES
(1, 'Tubarão :)', 'sc', 0),
(6, 'Capivari', 'SC', 0),
(11, 'Imbituba', 'SC', 0),
(12, 'Guarulhos', 'SP', 0);

--
-- Acionadores `tb_cidade`
--
DELIMITER $$
CREATE TRIGGER `trg_cidade_del` AFTER DELETE ON `tb_cidade` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo)
VALUES ('tb_cidade', NOW(), 'DELETE', CONCAT (OLD.id_cidade, '|', OLD.nm_cidade, '|', OLD.uf_cidade, '|', OLD.dt_cadastro), NULL
        );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_cidade_up` AFTER UPDATE ON `tb_cidade` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_cidade',NOW(), 'UPDATE', CONCAT(OLD.id_cidade, '|', OLD.nm_cidade, '|', OLD.uf_cidade, '|', OLD.dt_cadastro ),  CONCAT(NEW.id_cidade, '|', NEW.nm_cidade, '|', NEW.uf_cidade, '|', NEW.dt_cadastro )
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_tb_cidade_ins` AFTER INSERT ON `tb_cidade` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo)
VALUES ('tb_cidade', NOW(), 'INSERT', NULL, CONCAT (NEW.id_cidade, '/', NEW.nm_cidade, '/', NEW.uf_cidade, '/', NEW.dt_cadastro)
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nm_cliente` varchar(55) DEFAULT NULL,
  `cpf_cliente` varchar(11) DEFAULT NULL,
  `fk_id_cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `nm_cliente`, `cpf_cliente`, `fk_id_cidade`) VALUES
(1, 'Luana', '12345678911', 12),
(2, 'Gabriel', '31212313213', 2),
(3, 'Joaquim', '12312312308', 1);

--
-- Acionadores `tb_cliente`
--
DELIMITER $$
CREATE TRIGGER `trg_cli_ins` AFTER INSERT ON `tb_cliente` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_cliente',NOW(), 'INSERT', NULL, CONCAT(NEW.id_cliente, '|', NEW.nm_cliente, '|', NEW.cpf_cliente, '|', NEW.fk_id_cidade, '|' )
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_cliente_del` AFTER DELETE ON `tb_cliente` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_cliente',NOW(), 'DELETE', CONCAT(OLD.id_cliente, '|', OLD.nm_cliente, '|', OLD.cpf_cliente, '|', OLD.fk_id_cidade, '|' ), NULL
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_cliente_up` AFTER UPDATE ON `tb_cliente` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_cliente',NOW(), 'UPDATE', CONCAT(OLD.id_cliente, '|', OLD.nm_cliente, '|', OLD.cpf_cliente, '|', OLD.fk_id_cidade ), CONCAT(NEW.id_cliente, '|', NEW.nm_cliente, '|', NEW.cpf_cliente, '|', NEW.fk_id_cidade )
         );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE `tb_fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nm_fornecedor` varchar(55) DEFAULT NULL,
  `cnpj_fornecedor` varchar(11) DEFAULT NULL,
  `fk_id_cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`id_fornecedor`, `nm_fornecedor`, `cnpj_fornecedor`, `fk_id_cidade`) VALUES
(2, 'rogerio', '12344568765', 11);

--
-- Acionadores `tb_fornecedor`
--
DELIMITER $$
CREATE TRIGGER `trg_forn_del` AFTER DELETE ON `tb_fornecedor` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_fornecedor',NOW(), 'DELETE', CONCAT(OLD.id_fornecedor, '|', OLD.nm_fornecedor, '|', OLD.cnpj_fornecedor, '|', OLD.fk_id_cidade, '|' ), NULL
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_fornecedor_ins` AFTER INSERT ON `tb_fornecedor` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_fornecedor',NOW(), 'INSERT', NULL, CONCAT(NEW.id_fornecedor, '|', NEW.nm_fornecedor, '|', NEW.cnpj_fornecedor, '|', NEW.fk_id_cidade, '|' )
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_fornecedor_up` AFTER UPDATE ON `tb_fornecedor` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_fornecedor',NOW(), 'UPDATE', CONCAT(OLD.id_fornecedor, '|', OLD.nm_fornecedor,'|', OLD.cnpj_fornecedor, '|', OLD.fk_id_cidade ), CONCAT(NEW.id_fornecedor, '|', NEW.nm_fornecedor,'|', NEW.cnpj_fornecedor, '|', NEW.fk_id_cidade )
         );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nm_funcionario` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `telefone` varchar(55) NOT NULL,
  `rg` varchar(55) NOT NULL,
  `dt_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `nm_funcionario`, `email`, `cpf`, `senha`, `telefone`, `rg`, `dt_nascimento`) VALUES
(1, 'teste', 'lorenzomettleruliano@gmail.com', '132.984.079-84', '123456', '42342321', '42347892347', '2004-12-12'),
(4, 'Lorenzo Mettler Uliano', 'lorenzomettleruliano@gmail.com', '111.111.111-11', '123456', '1231223', '48 991296882', '2004-07-27'),
(5, 'teste2', 'abshire.janis@example.org', '3123123123', '123456', '5435345', '5435345345', '2004-07-27'),
(6, 'Lorenzo', 'saldkla@gmail.com', '132.233.332-21', '1231241', '12312312', '7.234.324', '2000-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `id_grupo` int(11) NOT NULL,
  `nm_grupo` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_grupo`
--

INSERT INTO `tb_grupo` (`id_grupo`, `nm_grupo`) VALUES
(18, 'Salgado'),
(19, 'Agridoce');

--
-- Acionadores `tb_grupo`
--
DELIMITER $$
CREATE TRIGGER `trg_grupo_del` AFTER DELETE ON `tb_grupo` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo)
VALUES ('tb_grupo', NOW(), 'DELETE', CONCAT (OLD.id_grupo, '|', OLD.nm_grupo, '|'), NULL
        );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_grupo_ins` AFTER INSERT ON `tb_grupo` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo)
VALUES ('tb_grupo', NOW(), 'INSERT', NULL, CONCAT (NEW.id_grupo, '|', NEW.nm_grupo, '|')
        );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_grupo_up` AFTER UPDATE ON `tb_grupo` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_grupo',NOW(), 'UPDATE', CONCAT(OLD.id_grupo,'|', OLD.nm_grupo ), CONCAT(NEW.id_grupo,'|', NEW.nm_grupo )
         );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens_venda`
--

CREATE TABLE `tb_itens_venda` (
  `id_itens_venda` int(11) NOT NULL,
  `fk_id_pedido` int(11) NOT NULL,
  `fk_id_produto` int(11) NOT NULL,
  `qtd_venda` int(11) NOT NULL,
  `preuni` float(9,2) NOT NULL,
  `fk_id_venda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_itens_venda`
--

INSERT INTO `tb_itens_venda` (`id_itens_venda`, `fk_id_pedido`, `fk_id_produto`, `qtd_venda`, `preuni`, `fk_id_venda`) VALUES
(2, 1, 4, 7, 60.00, 0),
(3, 2, 4, 18, 58.00, 0),
(4, 1, 1, 10, 1.00, 0),
(5, 1, 1, 12, 1.00, 0),
(6, 1, 1, 1, 1.00, 0),
(7, 1, 1, 1, 1.00, 0),
(8, 1, 1, 1, 1.00, 0),
(9, 1, 1, 1, 1.00, 0),
(10, 1, 1, 1, 1.00, 0),
(12, 21, 28, 3, 1.00, 0),
(15, 0, 20, 1, 0.00, 7),
(17, 0, 18, 1, 0.00, 2),
(18, 0, 28, 12, 0.00, 8),
(19, 0, 40, 5, 0.00, 9),
(22, 0, 41, 1, 0.00, 11);

--
-- Acionadores `tb_itens_venda`
--
DELIMITER $$
CREATE TRIGGER `trg_itens_venda_del` AFTER DELETE ON `tb_itens_venda` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_itens_venda',NOW(), 'DELETE', CONCAT(OLD.id_itens_venda, '|', OLD.fk_id_pedido, '|', OLD.fk_id_produto, '|', OLD.qtd_venda, '|', OLD.preuni), NULL
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_tb_itens_venda_ins` AFTER INSERT ON `tb_itens_venda` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_itens_venda',NOW(), 'INSERT', NULL, CONCAT(NEW.id_itens_venda, '|', NEW.fk_id_pedido, '|', NEW.fk_id_produto, '|', NEW.qtd_venda, '|', NEW.preuni)
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_tb_itens_venda_up` AFTER UPDATE ON `tb_itens_venda` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo) VALUES ('tb_itens_venda', NOW(), 'UPDATE', CONCAT(OLD.id_itens_venda, '|', OLD.fk_id_pedido, '|', OLD.fk_id_produto, '|', OLD.qtd_venda, '|', OLD.preuni), CONCAT(NEW.id_itens_venda, '|', NEw.fk_id_pedido, '|', NEW.fk_id_produto, '|', NEW.qtd_venda, '|', NEW.preuni) );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id_pedido` int(11) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `fk_id_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`id_pedido`, `fk_id_cliente`, `fk_id_vendedor`) VALUES
(19, 2, 1),
(21, 4, 1),
(22, 3, 1),
(23, 2, 2);

--
-- Acionadores `tb_pedido`
--
DELIMITER $$
CREATE TRIGGER `trg_ped_del` AFTER DELETE ON `tb_pedido` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo) VALUE ('tb_pedido', NOW(), 'DELETE', CONCAT(OLD.id_pedido, '|',OLD.fk_id_cliente, '|',OLD.fk_id_vendedor,'|'), NULL );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_ped_ins` AFTER INSERT ON `tb_pedido` FOR EACH ROW BEGIN
	INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo) VALUE ('tb_pedido', NOW(), 'INSERT', NULL, CONCAT(NEW.id_pedido, '|',NEW.fk_id_cliente, '|',NEW.fk_id_vendedor,'|') );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_pedido_up` AFTER UPDATE ON `tb_pedido` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_pedido',NOW(), 'UPDATE', CONCAT(OLD.id_pedido,'|', OLD.fk_id_cliente, '|', OLD.fk_id_vendedor ), CONCAT(NEW.id_pedido,'|', NEW.fk_id_cliente, '|', NEW.fk_id_vendedor )
         );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `nm_produto` varchar(55) NOT NULL,
  `precocompra` float(9,2) DEFAULT NULL,
  `precovenda` float(9,2) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `fk_id_grupo` int(11) DEFAULT NULL,
  `qtd_estoque` double(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nm_produto`, `precocompra`, `precovenda`, `obs`, `fk_id_grupo`, `qtd_estoque`) VALUES
(40, 'Pão', 0.50, 1.50, ' ', 18, NULL),
(41, 'Cachorro', 50.00, 79.90, ' melhor que picanha', 18, NULL);

--
-- Acionadores `tb_produto`
--
DELIMITER $$
CREATE TRIGGER `trg_produto_del` AFTER DELETE ON `tb_produto` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_produto',NOW(), 'DELETE', CONCAT(OLD.id_produto, '|', OLD.nm_produto, '|', OLD.precocompra, '|', OLD.precovenda, '|', OLD.obs, '|', OLD.fk_id_grupo, '|', OLD.qtd_estoque), NULL
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_produto_up` AFTER UPDATE ON `tb_produto` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_produto',NOW(), 'UPDATE',CONCAT(OLD.id_produto,'|', OLD.nm_produto, '|', OLD.precocompra,'|', OLD.precovenda,  '|', OLD.obs, '|', OLD.fk_id_grupo, '|', OLD.qtd_estoque), CONCAT(NEW.id_produto,'|', NEW.nm_produto, '|', NEW.precocompra,'|', NEW.precovenda,  '|', NEW.obs, '|', NEW.fk_id_grupo, '|', NEW.qtd_estoque)
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_tb_produto_ins` AFTER INSERT ON `tb_produto` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_produto',NOW(), 'INSERT', NULL, CONCAT(NEW.id_produto, '|', NEW.nm_produto, '|', NEW.precocompra, '|', NEW.precovenda, '|', NEW.obs, '|', NEW.fk_id_grupo, '|', NEW.qtd_estoque)
         );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_venda`
--

CREATE TABLE `tb_venda` (
  `id_venda` int(11) NOT NULL,
  `dt_venda` date NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `fk_id_vendedor` int(11) NOT NULL,
  `vl_total` float(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_venda`
--

INSERT INTO `tb_venda` (`id_venda`, `dt_venda`, `fk_id_cliente`, `fk_id_vendedor`, `vl_total`) VALUES
(1, '2022-11-11', 0, 0, NULL),
(13, '2022-11-15', 3, 2, 0.00),
(14, '2022-11-15', 2, 2, 0.00),
(15, '2022-11-15', 3, 2, 0.00),
(16, '2022-11-15', 3, 2, 0.00),
(17, '2022-11-15', 3, 1, 0.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vendedor`
--

CREATE TABLE `tb_vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `nm_vendedor` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_vendedor`
--

INSERT INTO `tb_vendedor` (`id_vendedor`, `nm_vendedor`) VALUES
(1, 'Pedro Foda'),
(2, 'Pedro 3'),
(4, 'Carlos');

--
-- Acionadores `tb_vendedor`
--
DELIMITER $$
CREATE TRIGGER `trg_vendedor_del` AFTER DELETE ON `tb_vendedor` FOR EACH ROW BEGIN
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_vendedor',NOW(), 'DELETE', CONCAT(OLD.id_vendedor, '|', OLD.nm_vendedor, '|' ), NULL
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_vendedor_ins` AFTER INSERT ON `tb_vendedor` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_vendedor',NOW(), 'INSERT', NULL, CONCAT(NEW.id_vendedor, '|', NEW.nm_vendedor, '|' )
         );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_vendedor_up` AFTER UPDATE ON `tb_vendedor` FOR EACH ROW BEGIN 
INSERT INTO tb_auditoria (nm_tabela, dt_evento, evento, vl_anterior, vl_novo
) VALUES ('tb_vendedor',NOW(), 'UPDATE', CONCAT(OLD.id_vendedor, '|', OLD.nm_vendedor), CONCAT(NEW.id_vendedor, '|', NEW.nm_vendedor)
         );
END
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_auditoria`
--
ALTER TABLE `tb_auditoria`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Índices para tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`);

--
-- Índices para tabela `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Índices para tabela `tb_itens_venda`
--
ALTER TABLE `tb_itens_venda`
  ADD PRIMARY KEY (`id_itens_venda`);

--
-- Índices para tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `tb_venda`
--
ALTER TABLE `tb_venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- Índices para tabela `tb_vendedor`
--
ALTER TABLE `tb_vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_auditoria`
--
ALTER TABLE `tb_auditoria`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_grupo`
--
ALTER TABLE `tb_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_itens_venda`
--
ALTER TABLE `tb_itens_venda`
  MODIFY `id_itens_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `tb_venda`
--
ALTER TABLE `tb_venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_vendedor`
--
ALTER TABLE `tb_vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
