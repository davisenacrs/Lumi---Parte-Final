-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2024 às 01:43
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lumi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_lancamento` date DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id`, `titulo`, `descricao`, `data_lancamento`, `poster`) VALUES
(1, 'Stranger Things', 'Uma cidade pequena descobre segredos e mistérios sobrenaturais quando uma criança desaparece.', '2016-07-15', 'poster_21.jpg'),
(2, 'Game of Thrones', 'Nobres lutam pelo controle do Trono de Ferro em Westeros.', '2011-04-17', 'url_para_poster_game_of_thrones'),
(3, 'Breaking Bad', 'Um professor de química com câncer terminal começa a fabricar metanfetamina para sustentar sua família.', '2008-01-20', 'url_para_poster_breaking_bad'),
(4, 'The Mandalorian', 'Um caçador de recompensas navega pela galáxia após a queda do Império.', '2019-11-12', 'url_para_poster_mandalorian'),
(5, 'The Boys', 'Super-heróis corruptos enfrentam uma equipe de vigilantes determinada a expor seus segredos.', '2019-07-26', 'url_para_poster_the_boys'),
(6, 'Squid Game', 'Participantes arriscam suas vidas em jogos mortais para ganhar uma grande soma de dinheiro.', '2021-09-17', 'url_para_poster_squid_game'),
(7, 'The Crown', 'A história do reinado da Rainha Elizabeth II e dos eventos políticos e pessoais do Reino Unido.', '2016-11-04', 'url_para_poster_the_crown'),
(8, 'Money Heist', 'Um grupo de ladrões executa um assalto meticulosamente planejado à Casa da Moeda da Espanha.', '2017-05-02', 'url_para_poster_money_heist'),
(9, 'Dark', 'Desaparecimentos misteriosos revelam segredos sobrenaturais em uma pequena cidade alemã.', '2017-12-01', 'url_para_poster_dark'),
(10, 'Euphoria', 'Um grupo de adolescentes enfrenta problemas com drogas, identidade e amor.', '2019-06-16', 'url_para_poster_euphoria'),
(11, 'The Witcher', 'Um caçador de monstros luta para encontrar seu lugar em um mundo onde humanos podem ser mais cruéis que as bestas.', '2019-12-20', 'url_para_poster_the_witcher'),
(12, 'WandaVision', 'Super-heróis tentam viver uma vida normal em uma realidade misteriosa e surreal.', '2021-01-15', 'url_para_poster_wandavision'),
(13, 'Loki', 'O vilão Loki ganha sua própria série e explora novas realidades.', '2021-06-09', 'url_para_poster_loki'),
(14, 'Peaky Blinders', 'Uma gangue britânica dos anos 1920 luta por poder e riqueza.', '2013-09-12', 'url_para_poster_peaky_blinders'),
(15, 'Ozark', 'Um consultor financeiro se muda para os Ozarks, onde se envolve com atividades criminosas.', '2017-07-21', 'url_para_poster_ozark'),
(16, 'Ted Lasso', 'Um treinador de futebol americano aceita um trabalho como técnico de futebol na Inglaterra.', '2020-08-14', 'url_para_poster_ted_lasso'),
(17, 'Succession', 'Uma família bilionária tenta manter o controle de seu império midiático.', '2018-06-03', 'url_para_poster_succession'),
(18, 'The Handmaid\'s Tale', 'Mulheres são subjugadas e forçadas a servir como procriadoras em uma sociedade distópica.', '2017-04-26', 'url_para_poster_handmaids_tale'),
(19, 'The Umbrella Academy', 'Irmãos com superpoderes enfrentam eventos apocalípticos e desvendam segredos familiares.', '2019-02-15', 'url_para_poster_umbrella_academy'),
(20, 'House of the Dragon', 'A prequela de Game of Thrones sobre a guerra civil dos Targaryen.', '2022-08-21', 'url_para_poster_house_of_dragon');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
