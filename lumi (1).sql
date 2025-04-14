-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/04/2025 às 23:07
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `filmes_id` int(11) DEFAULT NULL,
  `series_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL CHECK (`avaliacao` >= 1 and `avaliacao` <= 5),
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `filmes_id`, `series_id`, `usuario_id`, `avaliacao`, `comentario`) VALUES
(16, 18, NULL, 2, 5, 'eu adorei a obra'),
(17, NULL, 6, 2, 2, 'eu curti a seire'),
(18, 7, NULL, 2, 3, 'ja vi o filme 3 vezes'),
(19, 6, NULL, 2, 4, 'gostei do fuilme'),
(20, 20, NULL, 2, 1, 'jula caro'),
(21, 4, NULL, 2, 3, 'b'),
(22, NULL, 14, 2, 4, 'ss'),
(23, NULL, 3, 2, 3, 'sa'),
(24, 2, NULL, 2, 5, 'assa'),
(25, NULL, 3, 2, 5, 'safasdsdsa'),
(26, NULL, 3, 2, 5, 'safasdsdsa'),
(27, NULL, 3, 2, 4, 'dFE');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_lancamento` date DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `descricao`, `data_lancamento`, `poster`) VALUES
(1, 'O Senhor dos Anéis: O Retorno do Rei', 'Na batalha final entre o bem e o mal, os hobbits Frodo e Sam continuam sua jornada para destruir o Um Anel.', '2003-12-17', 'poster_01.jpg'),
(2, 'Interestelar', 'Um grupo de astronautas viaja através de um buraco de minhoca em busca de um novo lar para a humanidade.', '2014-11-07', 'poster_02.jpg'),
(3, 'A Origem', 'Um ladrão com a habilidade de invadir sonhos aceita realizar um trabalho que parece impossível.', '2010-07-16', 'poster_03.jpg'),
(4, 'Clube da Luta', 'Um homem insone e um vendedor de sabão formam um clube de luta secreto com consequências inesperadas.', '1999-10-15', 'poster_04.jpg'),
(5, 'Gladiador', 'Um general romano busca vingança contra o imperador corrupto que matou sua família.', '2000-05-05', 'poster_05.jpg'),
(6, 'Vingadores: Ultimato', 'Os Vingadores restantes unem forças para desfazer as ações de Thanos e restaurar o equilíbrio no universo.', '2019-04-26', 'poster_06.jpg'),
(7, 'O Lobo de Wall Street', 'A história real do corretor da bolsa Jordan Belfort e sua ascensão e queda em Wall Street.', '2013-12-25', 'poster_07.jpg'),
(8, 'Parasita', 'Uma família pobre se infiltra na vida de uma família rica com consequências trágicas e surpreendentes.', '2019-05-30', 'poster_08.jpg'),
(9, 'Coringa', 'Explora a origem do vilão Coringa em Gotham e sua transformação em um símbolo de anarquia.', '2019-10-04', 'poster_09.jpg'),
(10, 'Mad Max: Estrada da Fúria', 'Em um mundo pós-apocalíptico, uma mulher busca redenção ao desafiar um tirano em alta velocidade.', '2015-05-15', 'poster_10.jpg'),
(11, 'Matrix', 'Um hacker descobre que o mundo como ele conhece é uma simulação e se junta a uma rebelião contra as máquinas.', '1999-03-31', 'poster_11.jpg'),
(12, 'Batman: O Cavaleiro das Trevas', 'Batman enfrenta o caótico e implacável Coringa, que ameaça Gotham City.', '2008-07-18', 'poster_12.jpg'),
(13, 'Pulp Fiction: Tempo de Violência', 'Histórias interconectadas de crime e redenção no submundo de Los Angeles.', '1994-10-14', 'poster_13.jpg'),
(14, 'Forrest Gump: O Contador de Histórias', 'A vida de um homem simples e seus encontros com eventos históricos nos EUA.', '1994-07-06', 'poster_14.jpg'),
(15, 'O Resgate do Soldado Ryan', 'Um grupo de soldados busca resgatar um soldado perdido na Segunda Guerra Mundial.', '1998-07-24', 'poster_15.jpg'),
(16, 'A Vida é Bela', 'Um pai faz de tudo para proteger seu filho dos horrores do Holocausto com uma fantasia criativa.', '1997-12-20', 'poster_16.jpg'),
(17, 'Whiplash: Em Busca da Perfeição', 'A história de um jovem baterista determinado a alcançar a grandeza a qualquer custo.', '2014-10-10', 'poster_17.jpg'),
(18, 'Django Livre', 'Um escravo libertado busca vingança e tenta resgatar sua esposa das mãos de um fazendeiro cruel.', '2012-12-25', 'poster_18.jpg'),
(19, 'O Grande Hotel Budapeste', 'As aventuras de um lendário concierge e seu fiel ajudante no famoso hotel europeu.', '2014-03-28', 'poster_19.jpg'),
(20, 'A Teoria de Tudo', 'A história inspiradora da vida do renomado físico Stephen Hawking e seus desafios pessoais.', '2014-11-07', 'poster_20.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_lancamento` date DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `series`
--

INSERT INTO `series` (`id`, `titulo`, `descricao`, `data_lancamento`, `poster`) VALUES
(1, 'Stranger Things', 'Uma cidade pequena descobre segredos e mistérios sobrenaturais quando uma criança desaparece.', '2016-07-15', 'poster_21.jpg'),
(2, 'Game of Thrones', 'Nobres lutam pelo controle do Trono de Ferro em Westeros.', '2011-04-17', 'poster_22.jpg'),
(3, 'Breaking Bad', 'Um professor de química com câncer terminal começa a fabricar metanfetamina para sustentar sua família.', '2008-01-20', 'poster_23.jpg'),
(4, 'The Mandalorian', 'Um caçador de recompensas navega pela galáxia após a queda do Império.', '2019-11-12', 'poster_24.jpg'),
(5, 'The Boys', 'Super-heróis corruptos enfrentam uma equipe de vigilantes determinada a expor seus segredos.', '2019-07-26', 'poster_25.jpg'),
(6, 'Squid Game', 'Participantes arriscam suas vidas em jogos mortais para ganhar uma grande soma de dinheiro.', '2021-09-17', 'poster_26.jpg'),
(7, 'The Crown', 'A história do reinado da Rainha Elizabeth II e dos eventos políticos e pessoais do Reino Unido.', '2016-11-04', 'poster_27.jpg'),
(8, 'Money Heist', 'Um grupo de ladrões executa um assalto meticulosamente planejado à Casa da Moeda da Espanha.', '2017-05-02', 'poster_28.jpg'),
(9, 'Dark', 'Desaparecimentos misteriosos revelam segredos sobrenaturais em uma pequena cidade alemã.', '2017-12-01', 'poster_29.jpg'),
(10, 'Euphoria', 'Um grupo de adolescentes enfrenta problemas com drogas, identidade e amor.', '2019-06-16', 'poster_30.jpg'),
(11, 'The Witcher', 'Um caçador de monstros luta para encontrar seu lugar em um mundo onde humanos podem ser mais cruéis que as bestas.', '2019-12-20', 'poster_31.jpg'),
(12, 'WandaVision', 'Super-heróis tentam viver uma vida normal em uma realidade misteriosa e surreal.', '2021-01-15', 'poster_32.jpg'),
(13, 'Loki', 'O vilão Loki ganha sua própria série e explora novas realidades.', '2021-06-09', 'poster_33.jpg'),
(14, 'Peaky Blinders', 'Uma gangue britânica dos anos 1920 luta por poder e riqueza.', '2013-09-12', 'poster_34.jpg'),
(15, 'Ozark', 'Um consultor financeiro se muda para os Ozarks, onde se envolve com atividades criminosas.', '2017-07-21', 'poster_35.jpg'),
(16, 'Ted Lasso', 'Um treinador de futebol americano aceita um trabalho como técnico de futebol na Inglaterra.', '2020-08-14', 'poster_36.jpg'),
(17, 'Succession', 'Uma família bilionária tenta manter o controle de seu império midiático.', '2018-06-03', 'poster_37.jpg'),
(18, 'The Handmaid\'s Tale', 'Mulheres são subjugadas e forçadas a servir como procriadoras em uma sociedade distópica.', '2017-04-26', 'poster_38.jpg'),
(19, 'The Umbrella Academy', 'Irmãos com superpoderes enfrentam eventos apocalípticos e desvendam segredos familiares.', '2019-02-15', 'poster_39.jpg'),
(20, 'House of the Dragon', 'A prequela de Game of Thrones sobre a guerra civil dos Targaryen.', '2022-08-21', 'poster_40.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('usuario','admin') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(2, 'Davi', 'daflores190@gmail.com', '$2y$10$D0gNh3eVNL7gArkrdBMCTe9KiYFN7ovQ202GCQcXdAHP.6DMvnajW', 'usuario'),
(4, 'Junior ', 'jrsantos@hotmail.com', '$2y$10$ilgZgFQ7rjAMY5KVDCl3TeZGgYsozevLXCrhaWZLEhtXcgaWexDe6', 'usuario'),
(6, 'fabio', 'fabio@gmail.com', '$2y$10$KLAsVhqgph3AttWLvg/QcOh0I/QX0nXeWqw8PZnntpvGn9aS9QB7C', 'usuario'),
(7, 'Admin', 'admin@lumi.com', '$2y$10$MqP5Ub2nrUue5aoo0I6aieiF.bcHxespW1EADPLiMt41AoANXtH3.', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filmes_id` (`filmes_id`),
  ADD KEY `series_id` (`series_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1196491;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`filmes_id`) REFERENCES `filmes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avaliacoes_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
