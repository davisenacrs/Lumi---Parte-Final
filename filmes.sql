-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2024 às 01:45
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
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_lancamento` date DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filmes`
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

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1196491;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
