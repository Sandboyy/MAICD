-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 31-Maio-2021 às 19:13
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `maicd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `centro_saude`
--

DROP TABLE IF EXISTS `centro_saude`;
CREATE TABLE IF NOT EXISTS `centro_saude` (
  `pk_cent_saud` int(5) NOT NULL AUTO_INCREMENT,
  `nome_cent_saud` varchar(60) NOT NULL,
  `tipo_cent_saud` varchar(15) NOT NULL,
  `cnpj_cent_saud` varchar(14) NOT NULL,
  `comp_cent_saud` varchar(10) NOT NULL,
  `leit_disp_cent_saud` int(3) NOT NULL,
  `max_leit_cent_saud` int(4) NOT NULL,
  `fk_ende_cent_saud` int(5) NOT NULL,
  PRIMARY KEY (`pk_cent_saud`),
  KEY `fk_ende_cent_saud` (`fk_ende_cent_saud`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `centro_saude`
--

INSERT INTO `centro_saude` (`pk_cent_saud`, `nome_cent_saud`, `tipo_cent_saud`, `cnpj_cent_saud`, `comp_cent_saud`, `leit_disp_cent_saud`, `max_leit_cent_saud`, `fk_ende_cent_saud`) VALUES
(1, 'Centro de Saude III', 'Posto', '46137469000178', 'Público', 1, 5, 1),
(2, 'Hospital Estadual de Bauru', 'Hospital', '46230439000373', 'Público', 1, 15, 2),
(3, 'Unimed Bauru', 'Hospital', '1024987465', 'Privado', 5, 20, 3),
(4, 'Beneficiencia Portuguesa', 'Hospital', '123456791110', 'Público', 5, 6, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doenca`
--

DROP TABLE IF EXISTS `doenca`;
CREATE TABLE IF NOT EXISTS `doenca` (
  `pk_doen` int(5) NOT NULL AUTO_INCREMENT,
  `nome_doen` varchar(15) NOT NULL,
  `temp_recu_doen` int(3) NOT NULL,
  `form_cont_doen` varchar(20) NOT NULL,
  PRIMARY KEY (`pk_doen`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `doenca`
--

INSERT INTO `doenca` (`pk_doen`, `nome_doen`, `temp_recu_doen`, `form_cont_doen`) VALUES
(1, 'covid', 15, 'viral'),
(2, 'dengue', 30, 'Mosquito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_cent_saud`
--

DROP TABLE IF EXISTS `endereco_cent_saud`;
CREATE TABLE IF NOT EXISTS `endereco_cent_saud` (
  `pk_ende_cent_saud` int(5) NOT NULL AUTO_INCREMENT,
  `logr_ende_cent_saud` varchar(100) NOT NULL,
  `nume_ende_cent_saud` varchar(7) NOT NULL,
  `bair_ende_cent_saud` varchar(40) NOT NULL,
  `cida_ende_cent_saud` varchar(40) NOT NULL,
  `uf_cent_saud` varchar(2) NOT NULL,
  `cep_ende_cent_saud` varchar(10) NOT NULL,
  `lati_ende_cent_saud` float(10,6) NOT NULL,
  `long_ende_cent_saud` float(10,6) NOT NULL,
  PRIMARY KEY (`pk_ende_cent_saud`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco_cent_saud`
--

INSERT INTO `endereco_cent_saud` (`pk_ende_cent_saud`, `logr_ende_cent_saud`, `nume_ende_cent_saud`, `bair_ende_cent_saud`, `cida_ende_cent_saud`, `uf_cent_saud`, `cep_ende_cent_saud`, `lati_ende_cent_saud`, `long_ende_cent_saud`) VALUES
(1, 'Avenida Mario Amaral Gurgel', '660', 'Centro', 'Cabrália Paulista', 'SP', '17480-000', -22.459669, -49.335438),
(2, 'Av. Eng. Luís Edmundo Carrijo Coube', '1-100', 'Nucleo Res. Pres. Geisel', 'Bauru', 'SP', '17033-360', -22.338373, -49.028057),
(3, 'R. Rio Branco', '27-65', 'Jardim Paulista', 'Bauru', 'SP', '17017-220', -22.340477, -49.066734),
(4, 'R. Gustavo Maciel', '18-79', 'Centro', 'Bauru', 'SP', '17015-321', -22.327160, -49.069736);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_paciente`
--

DROP TABLE IF EXISTS `endereco_paciente`;
CREATE TABLE IF NOT EXISTS `endereco_paciente` (
  `pk_ende_paci` int(5) NOT NULL AUTO_INCREMENT,
  `logr_ende_paci` varchar(100) NOT NULL,
  `nume_ende_paci` varchar(4) NOT NULL,
  `bair_ende_paci` varchar(40) NOT NULL,
  `cida_ende_paci` varchar(40) NOT NULL,
  `uf_ende_paci` varchar(2) NOT NULL,
  `cep_ende_paci` varchar(10) NOT NULL,
  `lati_ende_paci` float(10,6) NOT NULL,
  `long_ende_paci` float(10,6) NOT NULL,
  PRIMARY KEY (`pk_ende_paci`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco_paciente`
--

INSERT INTO `endereco_paciente` (`pk_ende_paci`, `logr_ende_paci`, `nume_ende_paci`, `bair_ende_paci`, `cida_ende_paci`, `uf_ende_paci`, `cep_ende_paci`, `lati_ende_paci`, `long_ende_paci`) VALUES
(40, 'R. Antonio Consalter Longo', '115', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.458950, -49.337872),
(36, 'Clovis Magalhaes de Mattos Carvalho', '141', 'Antonio Orlato Madrigal 2', 'CabrÃ¡lia Paulista', 'SP', '17480000', -22.460514, -49.337814),
(41, 'Rua Seis de Agosto', '954', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.456831, -49.340984),
(33, 'Rua Antonio Consalter Longo', '225', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480000', -22.454842, -49.337517),
(42, 'Rua Manoel Francisco', '1121', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.456202, -49.334454),
(43, 'Rua Francisco Bueno dos Reis', '376', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.454239, -49.337559),
(44, 'Rua Francisco Bueno dos Reis', '777', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.454290, -49.337841),
(45, 'Rua Francisco Bueno dos Reis', '832', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.454330, -49.337673),
(46, 'Rua Antonio Consalter Longo', '632', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.453979, -49.337784),
(47, 'Rua Antonio Consalter Longo', '115', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.454023, -49.337765),
(48, 'Rua Antonio Consalter Longo', '687', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.454090, -49.337811),
(49, 'Rua Antonio Consalter Longo', '116', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000', -22.453873, -49.337814),
(50, 'Avenida do Hipódromo ', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326944, -49.025101),
(51, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326975, -49.025078),
(52, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326851, -49.025101),
(53, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326866, -49.025051),
(54, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326862, -49.025066),
(55, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326904, -49.025051),
(56, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326849, -49.025051),
(57, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326824, -49.025101),
(58, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326942, -49.025078),
(59, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326975, -49.025078),
(60, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326777, -49.025055),
(61, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326794, -49.025082),
(62, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326817, -49.025101),
(63, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326784, -49.025078),
(64, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326820, -49.025116),
(65, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326853, -49.025131),
(66, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326893, -49.025089),
(67, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326916, -49.025059),
(68, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326935, -49.025097),
(69, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326883, -49.025070),
(70, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326944, -49.025131),
(71, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326807, -49.025078),
(72, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326870, -49.025047),
(73, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326813, -49.025108),
(74, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326904, -49.025078),
(75, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326824, -49.025116),
(76, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326904, -49.025066),
(77, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326796, -49.025063),
(78, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326866, -49.025085),
(79, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326805, -49.025074),
(80, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326826, -49.025036),
(81, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326813, -49.025093),
(82, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326841, -49.025070),
(83, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326853, -49.025051),
(84, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326899, -49.025124),
(85, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326918, -49.025051),
(86, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326923, -49.025089),
(87, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326880, -49.025120),
(88, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326910, -49.025101),
(89, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326796, -49.025108),
(90, 'Avenida do Hipódromo', '675', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326891, -49.025127),
(91, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326973, -49.025146),
(92, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326982, -49.025127),
(93, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326998, -49.025108),
(94, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327003, -49.025093),
(95, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327028, -49.025082),
(96, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327009, -49.025059),
(97, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.326990, -49.025135),
(98, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327017, -49.025127),
(99, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327013, -49.025066),
(100, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327032, -49.025059),
(101, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327051, -49.025070),
(102, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327005, -49.025013),
(103, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327053, -49.025093),
(104, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327032, -49.025112),
(105, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327036, -49.025078),
(106, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327049, -49.025066),
(107, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327045, -49.025093),
(108, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327021, -49.025105),
(109, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327032, -49.025063),
(110, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327044, -49.025043),
(111, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327059, -49.025036),
(112, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327068, -49.025082),
(113, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327045, -49.025105),
(114, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327063, -49.025085),
(115, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327099, -49.025105),
(116, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327087, -49.025078),
(117, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327106, -49.025070),
(118, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327097, -49.025101),
(119, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327120, -49.025074),
(120, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327122, -49.025105),
(121, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327076, -49.025040),
(122, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327059, -49.024998),
(123, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327103, -49.025040),
(124, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327116, -49.025070),
(125, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327145, -49.025024),
(126, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327147, -49.025085),
(127, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327168, -49.025108),
(128, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327154, -49.025066),
(129, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327162, -49.025024),
(130, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327168, -49.025005),
(131, 'António Manoel costa', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326565, -49.025356),
(132, 'Avenida do Hipódromo ', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326555, -49.025379),
(133, 'Avenida do Hipódromo', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326538, -49.025349),
(134, 'Avenida do Hipódromo', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326548, -49.025360),
(135, 'Avenida do Hipódromo', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326509, -49.025368),
(136, 'Avenida do Hipódromo', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326515, -49.025349),
(137, 'Avenida do Hipódromo', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326469, -49.025391),
(138, 'Avenida do Hipódromo', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326466, -49.025421),
(139, 'Avenida do Hipódromo', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326468, -49.025452),
(140, 'Avenida do Hipódromo', '22', 'Carolina', 'Bauru ', 'SP', '17032-620', -22.326479, -49.025433),
(141, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327353, -49.025089),
(142, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-600', -22.327349, -49.025036),
(143, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327353, -49.025093),
(144, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-600', -22.327360, -49.025047),
(145, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327372, -49.025124),
(146, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-600', -22.327366, -49.025047),
(147, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327370, -49.025105),
(148, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-600', -22.327370, -49.025040),
(149, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-620', -22.327335, -49.025112),
(150, 'Avenida do Hipódromo', '8-55', 'Nucleo Hab. Pres. Geisel', 'Bauru ', 'SP', '17032-600', -22.327353, -49.025024);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_paciente_internado`
--

DROP TABLE IF EXISTS `endereco_paciente_internado`;
CREATE TABLE IF NOT EXISTS `endereco_paciente_internado` (
  `pk_ende_paci_inte` int(5) NOT NULL AUTO_INCREMENT,
  `logr_ende_paci_inte` varchar(100) NOT NULL,
  `nume_ende_paci_inte` varchar(7) NOT NULL,
  `bair_ende_paci_inte` varchar(40) NOT NULL,
  `cida_ende_paci_inte` varchar(40) NOT NULL,
  `uf_ende_paci_inte` varchar(2) NOT NULL,
  `cep_ende_paci_inte` varchar(10) NOT NULL,
  PRIMARY KEY (`pk_ende_paci_inte`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco_paciente_internado`
--

INSERT INTO `endereco_paciente_internado` (`pk_ende_paci_inte`, `logr_ende_paci_inte`, `nume_ende_paci_inte`, `bair_ende_paci_inte`, `cida_ende_paci_inte`, `uf_ende_paci_inte`, `cep_ende_paci_inte`) VALUES
(19, 'Rua Antonio Consalter ', '115', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000'),
(20, 'Rua Francisco Bueno dos Leels', '777', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000'),
(21, 'Francisco Bueno dos Reis', '225', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000'),
(22, 'Rua Antonio Consalter Longo', '115', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000'),
(23, 'R. Antonio Alves', '35-54', 'Jardim Aeroporto', 'Bauru', 'SP', '17023-431'),
(24, 'Av. Comendador da Silva Martha', '12-3', 'Jardim Estoril', 'Bauru', 'SP', '17014-510'),
(25, 'R. Vivaldo GuimarÃ£es', '15-7', 'Vila Mesquita', 'Bauru', 'SP', '17014-510'),
(26, 'Rua benedito moreira pinto', '264', 'Jardim Panorama', 'Bauru', 'SP', '17011-110'),
(27, 'Rua benedito moreira pinto', '289', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(28, 'Rua benedito moreira pinto', '345', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(29, 'Rua benedito moreira pinto', '241', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(30, 'Rua benedito moreira pinto', '311', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(31, 'Rua benedito moreira pinto', '335', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(32, 'Rua benedito moreira pinto', '335', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(33, 'Rua benedito moreira pinto', '335', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(34, 'Rua benedito moreira pinto', '201', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(35, 'Rua benedito moreira pinto', '322', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(36, 'Rua benedito moreira pinto', '355', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(37, 'Rua benedito moreira pinto', '366', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(38, 'Rua benedito moreira pinto', '377', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(39, 'Rua benedito moreira pinto', '388', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(40, 'Rua benedito moreira pinto', '400', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(41, 'Rua benedito moreira pinto', '411', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(42, 'R. Antonio Consalter Longo', '115', 'Centro', 'CabrÃ¡lia Paulista', 'SP', '17480-000'),
(43, 'Rua benedito moreira pinto', '112', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(44, 'Rua benedito moreira pinto', '135', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(45, 'Rua benedito moreira pinto', '1231', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(46, 'Rua benedito moreira pinto', '123', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(47, 'Rua benedito moreira pinto', '146', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(48, 'Rua benedito moreira pinto', '1458', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(49, 'Rua benedito moreira pinto', '554', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(50, 'Rua benedito moreira pinto', '554', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(51, 'Rua benedito moreira pinto', '546', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(52, 'Rua benedito moreira pinto', '241', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(53, 'Rua benedito moreira pinto', '345', 'Jardim Panorama', 'Bauru', 'SP', '17011110'),
(54, 'Rua benedito moreira pinto', '289', 'Jardim Panorama', 'Bauru', 'SP', '17011110');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_cent_saud`
--

DROP TABLE IF EXISTS `funcionario_cent_saud`;
CREATE TABLE IF NOT EXISTS `funcionario_cent_saud` (
  `pk_func_cent_saud` int(5) NOT NULL AUTO_INCREMENT,
  `nome_func_cent_saud` varchar(30) NOT NULL,
  `fone_func_cent_saud` varchar(15) NOT NULL,
  `cpf_func-cent_saud` varchar(15) NOT NULL,
  `carg_func_cent_saud` varchar(10) NOT NULL,
  `login_func_cent_saud` varchar(10) NOT NULL,
  `senh_func_cent_saud` varchar(32) NOT NULL,
  `fk_cent_saud` int(5) NOT NULL,
  PRIMARY KEY (`pk_func_cent_saud`),
  KEY `fk_cent_saud` (`fk_cent_saud`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario_cent_saud`
--

INSERT INTO `funcionario_cent_saud` (`pk_func_cent_saud`, `nome_func_cent_saud`, `fone_func_cent_saud`, `cpf_func-cent_saud`, `carg_func_cent_saud`, `login_func_cent_saud`, `senh_func_cent_saud`, `fk_cent_saud`) VALUES
(1, 'Alessandro Dionisio', '998002216', '44539021826', 'Estagiário', 'ale', '698dc19d489c4e4db73e28a713eab07b', 1),
(2, 'Rober', '998002216', '44539021826', 'Estagiário', 'heb', '698dc19d489c4e4db73e28a713eab07b', 2),
(3, 'Jose', '7894564', '7894561234', 'Estagiário', 'uni', '698dc19d489c4e4db73e28a713eab07b', 3),
(4, 'Will', '456871245', '1324567925', 'Estagiário', 'bene', '698dc19d489c4e4db73e28a713eab07b', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `pk_paci` int(5) NOT NULL AUTO_INCREMENT,
  `nome_paci` varchar(50) NOT NULL,
  `cpf_paci` varchar(15) NOT NULL,
  `fone_paci` varchar(15) NOT NULL,
  `data_entr_paci` date NOT NULL,
  `fk_cent_saud` int(5) DEFAULT NULL,
  `fk_ende_paci` int(5) NOT NULL,
  `fk_doen` int(5) NOT NULL,
  PRIMARY KEY (`pk_paci`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`pk_paci`, `nome_paci`, `cpf_paci`, `fone_paci`, `data_entr_paci`, `fk_cent_saud`, `fk_ende_paci`, `fk_doen`) VALUES
(6, 'Banco 06', '44539021826', '998002216', '2021-03-19', 1, 33, 1),
(9, 'Dairce', '48562156809', '998002216', '2021-03-22', 1, 36, 1),
(12, 'Rober', '586.321.456-89', '(99) 6642-53015', '2021-04-05', 1, 41, 2),
(11, 'Alessandre', '44539021826', '32851382', '2021-03-31', 1, 40, 1),
(13, 'Molina', '563.214.897-65', '(14) 9965-87402', '2021-04-05', 1, 42, 2),
(14, 'Ameno', '369521487', '134679852', '2021-03-19', 1, 43, 1),
(15, 'Jorge ', '1223565', '995643215', '2021-03-19', 1, 44, 1),
(16, 'Lucii', '65478999', '99645325', '2021-03-19', 1, 45, 1),
(17, 'Zulu ', '46532123', '9985623', '2021-03-19', 1, 46, 1),
(18, 'Aqua', '65432897', '9965332555', '2021-03-19', 1, 47, 1),
(19, 'Gizelle', '8654123', '99123654', '2021-03-19', 1, 48, 1),
(20, 'Keanu ', '94563178', '99545223', '2021-03-19', 2, 49, 1),
(21, 'Kayne ', '456852364', '99645383', '2021-05-31', 2, 50, 1),
(22, 'Enrico', '852369456', '99645374', '2021-05-31', 2, 51, 1),
(23, 'Enzo', '032486957', '996541238', '2021-05-31', 2, 52, 1),
(24, 'Antonella', '654320897', '9978654132', '2021-05-31', 2, 53, 1),
(25, 'Brigite', '875612123', '998523641', '2021-05-31', 2, 54, 1),
(26, 'Celine', '65432898', '9965332556', '2021-05-31', 2, 55, 1),
(27, 'Dangelo', '85432898', '9965338556', '2021-05-31', 2, 56, 1),
(28, 'Desirée', '1223965', '995985215', '2021-05-31', 2, 57, 1),
(29, 'Isla', '85852898', '9965323556', '2021-05-31', 2, 58, 1),
(30, 'Emma', '46532175', '99648525', '2021-05-31', 2, 59, 1),
(31, 'Ravi', '456023197', '9965339321', '2021-05-31', 4, 60, 1),
(32, 'Diamonique', '94993178', '99640025', '2021-05-31', 4, 61, 1),
(33, 'Francis', '111111111', '9965462310', '2021-05-31', 4, 62, 1),
(34, 'Greta', '02135321', '9999999', '2021-05-31', 4, 63, 1),
(35, 'Finn', '561342089', '996564302', '2021-05-31', 4, 64, 1),
(36, 'Iolanda', '456456465', '9988823', '2021-05-31', 4, 65, 1),
(37, 'Zander', '045612389', '9965312345', '2021-05-31', 4, 66, 1),
(38, 'Justine', '0000001235', '99463282', '2021-05-31', 4, 67, 1),
(39, 'Arlo', '159874236', '9965354321', '2021-05-31', 4, 68, 1),
(40, 'Lauren', '0315151', '994561238', '2021-05-31', 4, 69, 1),
(41, 'Esdras', '8456123097', '998532460', '2021-05-31', 4, 70, 1),
(42, 'Lavínia', '1223564', '9985623', '2021-05-31', 4, 71, 1),
(43, 'Efraim', '03546502', '9965338555', '2021-05-31', 4, 72, 1),
(44, 'Nívia', '46532100', '99645326', '2021-05-31', 4, 73, 1),
(45, 'Baruc', '8456123088', '9965323550', '2021-05-31', 4, 74, 1),
(46, 'Olívia', '1223569', '99564325', '2021-05-31', 4, 75, 1),
(47, 'Caleb', '000000000', '000000000', '2021-05-31', 4, 76, 1),
(48, 'Pilar', '11111111', '99111111', '2021-05-31', 4, 77, 1),
(49, 'Scarlet', '000000001', '992222222', '2021-05-31', 4, 78, 1),
(50, 'Daisy', '11111112', '9933333333', '2021-05-31', 4, 79, 1),
(51, 'Maitê', '000000002', '992222223', '2021-05-31', 4, 80, 1),
(52, 'Ayla', '11111113', '99111112', '2021-05-31', 4, 81, 1),
(53, 'Ellen', '0000000004', '99111113', '2021-05-31', 4, 82, 1),
(54, 'Abraham', '11111114', '99111115', '2021-05-31', 4, 83, 1),
(55, 'Anthony', '000000006', '992222228', '2021-05-31', 4, 84, 1),
(56, 'Álvaro', '11111115', '99111110', '2021-05-31', 4, 85, 1),
(57, 'Gregory', '000000008', '992222220', '2021-05-31', 4, 86, 1),
(58, 'Joseph', '11111110', '99561614', '2021-05-31', 4, 87, 1),
(59, 'Júlio César', '000000009', '99154613', '2021-05-31', 4, 88, 1),
(60, 'Levi', '11111116', '99545645', '2021-05-31', 4, 89, 1),
(61, 'Olavo', '000000007', '9965338556', '2021-05-31', 4, 90, 1),
(62, 'Romeu', '11111116', '995643218', '2021-05-31', 4, 91, 1),
(63, 'Tomás', '000000004', '99653165498', '2021-05-31', 4, 92, 1),
(64, 'Ângelo', '11111118', '998562356', '2021-05-31', 4, 93, 1),
(65, 'Theodoro', '000000005', '9965312345', '2021-05-31', 4, 94, 1),
(66, 'Valentim', '11111119', '99015', '2021-05-31', 4, 95, 1),
(67, 'Lorenzo', '11111115', '9985623', '2021-05-31', 4, 96, 1),
(68, 'Henry', '11111120', '995648888', '2021-05-31', 4, 97, 1),
(69, 'Louis', '000000010', '9965338558', '2021-05-31', 4, 98, 1),
(70, 'Brian', '11111112', '998562356', '2021-05-31', 4, 99, 1),
(71, 'Charles', '000000011', '9965323556', '2021-05-31', 4, 100, 1),
(72, 'Zayn', '000000012', '9965323556', '2021-05-31', 4, 101, 1),
(73, 'Liam', '000000012', '9965323556', '2021-05-31', 4, 102, 1),
(74, 'Jase', '000000013', '998138075', '2021-05-31', 4, 103, 1),
(75, 'Vance', '000000014', '998138078', '2021-05-31', 4, 104, 1),
(76, 'Ammiel', '000000015', '998138079', '2021-05-31', 4, 105, 1),
(77, 'Zaqueu', '000000016', '998138179', '2021-05-31', 4, 106, 1),
(78, 'Otacílio', '000000017', '998238179', '2021-05-31', 4, 107, 1),
(79, 'Abílio', '000000018', '998238119', '2021-05-31', 4, 108, 1),
(80, 'Ubaldo', '000000019', '998238110', '2021-05-31', 3, 109, 1),
(81, 'Dimas', '000000020', '998238111', '2021-05-31', 3, 110, 1),
(82, 'Ozias', '000000021', '998238112', '2021-05-31', 3, 111, 1),
(83, 'Alipio', '000000022', '998238113', '2021-05-31', 3, 112, 1),
(84, 'Jabari', '000000023', '998238114', '2021-05-31', 3, 113, 1),
(85, 'Yehuda', '000000024', '998238115', '2021-05-31', 3, 114, 1),
(86, 'Elon', '000000025', '998238116', '2021-05-31', 3, 115, 1),
(87, 'Amoz', '000000026', '998238117', '2021-05-31', 3, 116, 1),
(88, 'Calum', '000000027', '998238118', '2021-05-31', 3, 117, 1),
(89, 'Dartagnan', '000000028', '998238119', '2021-05-31', 3, 118, 1),
(90, 'Diederik', '000000029', '998238120', '2021-05-31', 3, 119, 1),
(91, 'Ethan', '000000030', '998238121', '2021-05-31', 3, 120, 1),
(92, 'Jedrek', '000000031', '998238122', '2021-05-31', 3, 121, 1),
(93, 'Takeshi', '000000032', '998238123', '2021-05-31', 3, 122, 1),
(94, 'Etta', '000000033', '998238124', '2021-05-31', 3, 123, 1),
(95, 'Georgia', '000000034', '998238125', '2021-05-31', 3, 124, 1),
(96, 'Ayla', '000000035', '998238126', '2021-05-31', 3, 125, 1),
(97, 'Kira', '000000036', '998238127', '2021-05-31', 3, 126, 1),
(98, 'Akira', '000000037', '998238128', '2021-05-31', 3, 127, 1),
(99, 'Agnes', '000000038', '998238129', '2021-05-31', 3, 128, 1),
(100, 'Juniper', '000000039', '998238130', '2021-05-31', 3, 129, 1),
(101, 'Mabel', '000000040', '998238131', '2021-05-31', 3, 130, 1),
(102, 'Zaíra', '000000041', '998238132', '2021-05-31', 2, 131, 1),
(103, 'Pilar', '000000042', '998238133', '2021-05-31', 2, 132, 1),
(104, 'Nara', '000000043', '998238134', '2021-05-31', 2, 133, 1),
(105, 'Zulmira', '000000044', '998238135', '2021-05-31', 2, 134, 1),
(106, 'Milagros', '000000045', '998238136', '2021-05-31', 2, 135, 1),
(107, 'Akilah', '000000046', '998238137', '2021-05-31', 2, 136, 1),
(108, 'Savana', '000000047', '998238138', '2021-05-31', 2, 137, 1),
(109, 'Corazón', '000000048', '998238139', '2021-05-31', 2, 138, 1),
(110, 'Kirsten', '000000049', '998238140', '2021-05-31', 2, 139, 1),
(111, 'Kathleen', '000000050', '998238141', '2021-05-31', 2, 140, 1),
(112, 'Sigrid', '000000051', '998238142', '2021-05-31', 2, 141, 1),
(113, 'Virna', '000000052', '998238143', '2021-05-31', 2, 142, 1),
(114, 'Martina', '000000053', '998238144', '2021-05-31', 2, 143, 1),
(115, 'Gael', '000000054', '998238145', '2021-05-31', 2, 144, 1),
(116, 'Iori', '000000055', '998238146', '2021-05-31', 2, 145, 1),
(117, 'Aiyra', '000000056', '998238147', '2021-05-31', 2, 146, 1),
(118, 'Jurema', '000000057', '998238148', '2021-05-31', 2, 147, 1),
(119, 'Avati', '000000058', '998238149', '2021-05-31', 2, 148, 1),
(120, 'Ivair', '000000059', '998238150', '2021-05-31', 2, 149, 1),
(121, 'Tupã', '000000060', '998238151', '2021-05-31', 2, 150, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente_internado`
--

DROP TABLE IF EXISTS `paciente_internado`;
CREATE TABLE IF NOT EXISTS `paciente_internado` (
  `pk_paci_inte` int(5) NOT NULL AUTO_INCREMENT,
  `nome_paci_inte` varchar(50) NOT NULL,
  `cpf_paci_inte` varchar(15) NOT NULL,
  `fone_paci_inte` varchar(15) NOT NULL,
  `data_entr_paci_inte` date NOT NULL,
  `fk_cent_saud` int(5) NOT NULL,
  `fk_ende_paci_inte` int(5) NOT NULL,
  `fk_doen` int(5) NOT NULL,
  `esta_doen` varchar(10) NOT NULL,
  PRIMARY KEY (`pk_paci_inte`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente_internado`
--

INSERT INTO `paciente_internado` (`pk_paci_inte`, `nome_paci_inte`, `cpf_paci_inte`, `fone_paci_inte`, `data_entr_paci_inte`, `fk_cent_saud`, `fk_ende_paci_inte`, `fk_doen`, `esta_doen`) VALUES
(6, 'BRKsEdu', '171.440.638-29', '(14) 9980-02216', '2021-04-01', 1, 19, 1, 'Grave'),
(7, 'Player 94', '445.390.218-26', '(14) 9980-02216', '2021-04-01', 1, 20, 1, 'Grave'),
(8, 'Toguro', '445.390.218-26', '(14) 9980-02216', '2021-04-01', 1, 21, 2, 'Moderado'),
(9, 'Avelar', '445.390.218-26', '(14) 9980-02216', '2021-04-01', 1, 22, 1, 'Grave'),
(10, 'Paulo de Souza', '171.440.638-29', '(14) 9966-43201', '2021-05-30', 3, 23, 1, 'Grave'),
(11, 'Andres Sanchez', '789.365.214-79', '(14) 9918-74521', '2021-05-31', 3, 24, 1, 'Grave'),
(12, 'Guto Lima', '456.123.798-52', '(14) 7825-3614', '2021-05-30', 3, 25, 1, 'Grave'),
(13, 'Legolas', '100.730.660-28', '(14) 9568-42231', '2021-05-25', 2, 26, 1, 'Grave'),
(14, 'Raegar', '648.321.520-76', '(14) 9578-56631', '2021-05-24', 2, 27, 1, 'Grave'),
(15, 'Aragorn', '099.327.130-82', '(14) 9445-78630', '2021-05-26', 2, 28, 1, 'Grave'),
(16, 'Arya', '605.595.950-00', '(14) 9743-35612', '2021-05-24', 2, 29, 1, 'Grave'),
(17, 'Jotaro', '877.710.250-99', '(14) 9445-328', '2021-05-23', 2, 30, 1, 'Grave'),
(18, 'Giorno', '411.567.950-60', '(14) 9882-36547', '2021-05-24', 2, 33, 1, 'Grave'),
(19, 'Shanks', '426.346.290-44', '(14) 9645-83512', '2021-05-24', 2, 34, 1, 'Moderado'),
(20, 'Gimli', '086.675.660-47', '(14) 9856-47521', '2021-05-26', 2, 35, 1, 'Moderado'),
(21, 'Teach', '121.748.140-05', '(14) 9885-56644', '2021-05-25', 2, 36, 1, 'Moderado'),
(22, 'Jhonny', '254.068.060-76', '(14) 9654-23178', '2021-05-25', 2, 37, 1, 'Moderado'),
(23, 'Satoru', '174.323.040-09', '(14) 5864-53123', '2021-05-26', 2, 38, 1, 'Moderado'),
(24, 'Gojo', '714.994.530-94', '(14) 9864-56231', '2021-05-26', 2, 39, 1, 'Moderado'),
(25, 'Light', '866.647.980-93', '(14) 9864-56231', '2021-05-28', 2, 40, 1, 'Moderado'),
(26, 'Aizen', '127.896.150-04', '(14) 9562-13786', '2021-05-28', 2, 41, 1, 'Moderado'),
(27, 'Ale Dionisio', '445.789.201-63', '(14) 7821-5634', '2021-05-31', 4, 42, 1, 'Grave'),
(28, 'Lebron', '148.920.320-69', '(14) 9654-65431', '2021-05-24', 3, 43, 2, 'Grave'),
(29, 'Kewen', '711.271.940-20', '(14) 9864-56234', '2021-05-28', 3, 44, 2, 'Moderado'),
(30, 'Zoom', '993.240.080-72', '(14) 9156-15614', '2021-05-22', 3, 45, 2, 'Grave'),
(31, 'Leo', '914.983.260-30', '(14) 9816-51653', '2021-05-22', 3, 46, 2, 'Grave'),
(32, 'Sagnoma', '504.994.690-54', '(14) 9156-23132', '2021-05-22', 3, 47, 1, 'Grave'),
(33, 'Oliver', '592.632.960-49', '(14) 9152-35213', '2021-05-22', 3, 48, 2, 'Grave'),
(34, 'Jhonax', '648.174.280-31', '(14) 4564-56213', '2021-05-23', 3, 49, 2, 'Grave'),
(35, 'Thomas', '671.609.730-97', '(14) 5651-65421', '2021-05-21', 3, 50, 1, 'Grave'),
(36, 'Luiz Henrique', '286.179.290-65', '(14) 1236-54654', '2021-05-20', 3, 51, 2, 'Grave'),
(37, 'Burki', '480.549.710-60', '(14) 5861-22133', '2021-05-21', 3, 52, 2, 'Grave'),
(38, 'Guilherme', '318.840.050-04', '(14) 9156-54231', '2021-05-21', 3, 53, 2, 'Grave'),
(39, 'Kannop', '930.590.210-31', '(14) 5835-31265', '2021-05-20', 3, 54, 2, 'Grave');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
