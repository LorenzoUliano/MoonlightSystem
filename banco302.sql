-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2022 às 04:28
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

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
(16, 'tb_itens_venda', '2022-05-31 10:35:43', 'UPDATE', '12|21|28|2|1.00', '12|21|28|3|1.00');

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
(3, 'Vestuário'),
(4, 'Eletrdomésticos'),
(10, 'Eletromoveis '),
(11, 'Carros '),
(12, 'Carros '),
(13, 'Gabriel'),
(14, 'junor');

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
  `preuni` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_itens_venda`
--

INSERT INTO `tb_itens_venda` (`id_itens_venda`, `fk_id_pedido`, `fk_id_produto`, `qtd_venda`, `preuni`) VALUES
(2, 1, 4, 7, 60.00),
(3, 2, 4, 18, 58.00),
(4, 1, 1, 10, 1.00),
(5, 1, 1, 12, 1.00),
(6, 1, 1, 1, 1.00),
(7, 1, 1, 1, 1.00),
(8, 1, 1, 1, 1.00),
(9, 1, 1, 1, 1.00),
(10, 1, 1, 1, 1.00),
(12, 21, 28, 3, 1.00);

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
(22, 3, 1);

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
(4, 'Feijão', 2.00, 3.00, 'dqweqwewerwe', 1, 19.00),
(6, 'Casarão', 2.00, 2.00, 'Ação, Confusão além', 1, NULL),
(7, 'Carne de Primeira', 20.00, 70.00, 'sdasfsa', 1, NULL),
(15, 'Carne', 40.00, 75.00, 'csdsadsadsadssad', 1, NULL),
(16, 'Feijão', 23.00, 30.00, ' eteywety dhfsdfjsfd dhffdjhfdsj\r\ndfdjfdslfds', 1, NULL),
(18, 'Carne de Primeira', 20.00, 30.00, 'dwsadssadadsdsasd dshgsasdj sfssfddfds', 1, NULL),
(19, 'Carne de Primeira', 25.00, 4.60, 'safasfsdfsaggdas\r\ndgsdsggdssdggds', 1, NULL),
(20, 'Feijão', 20.00, 30.00, 'asdsaddassad', 1, NULL),
(21, 'Carne', 25.00, 20.00, 'safsaasfsa  ', 10, NULL),
(22, 'Carne de Primeira', 20.00, 70.00, 'asDA', 2, NULL),
(23, 'Carne de Primeira', 25.00, 80.00, 'ssasa', 5, NULL),
(24, 'Carne de Segunda', 25.00, 70.00, 'dasadsass', 6, NULL),
(27, 'Carne', 30.00, 40.00, '1 dadssda xcxcxc', 1, NULL),
(28, 'Carne', 30.00, 40.00, '1 dadssda xcxcxc Eraldo', 1, NULL),
(29, 'Carne de Segunda', 21.00, 23.00, 'asddasdsas', 1, NULL),
(30, 'Feijão', 20.00, 30.00, 'aADdA', 1, NULL),
(31, 'Carne de Segunda', 67.00, 98.00, 'hghghfhh', 1, NULL),
(32, 'Carne', 30.00, 40.00, 'xccdcdsdssa eraldo  ', 1, NULL),
(33, 'Feijão', 23.00, 23.00, 'adsadsa', 1, NULL),
(34, 'Carne', 30.00, 40.00, 'xccdcdsdssa eraldo  ', 1, NULL),
(38, 'ahhanbemmoscao', 1234.00, 2345.00, ' ', 10, NULL);

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
(1, 'Pedro');

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
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_itens_venda`
--
ALTER TABLE `tb_itens_venda`
  MODIFY `id_itens_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `tb_vendedor`
--
ALTER TABLE `tb_vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
