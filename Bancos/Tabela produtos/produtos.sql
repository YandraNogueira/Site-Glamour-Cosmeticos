-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/06/2023 às 01:38
-- Versão do servidor: 5.7.42-log-cll-lve
-- Versão do PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `glamour1_produtos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `preco` varchar(220) NOT NULL,
  `descricao` varchar(800) NOT NULL,
  `imagem` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `imagem`, `created`, `modified`) VALUES
(31, 'LoÃ§Ã£o Hidratante Desodorante Corporal Anti-stress Nativa SPA Jasmim Sambac 400ml', 'R$ 74,90', 'O stress Ã© uma das principais causas do envelhecimento da pele. Ele estimula a formaÃ§Ã£o excessiva de radicais livres e gera um processo oxidativo, alÃ©m de deixar a pele opaca e com aparÃªncia cansada.', '9.png', '2023-06-22 08:57:01', '2023-06-26 09:52:28'),
(32, 'Glamour Fever Desodorante ColÃ´nia 75ml', 'R$ 164,90', 'Glamour Fever acredita que um detalhe Ã© suficiente para retratar sua singularidade! Com intenÃ§Ã£o toda mulher pode ficar glamourosa e basta adicionar um toque do atemporal animal print para trazer estilo prÃ³prio e singularidade na sua produÃ§Ã£o.', '11.png', '2023-06-22 09:02:05', '2023-06-27 08:23:43'),
(33, 'Glamour Gold Glam Desodorante ColÃ´nia 75ml', ' R$ 164,90', 'Glamour acredita que uma produÃ§Ã£o especial e sua fragrÃ¢ncia favorita sÃ£o o segredo para brilhar com uma estrela - por isso incentiva vocÃª a criar seus momentos de produÃ§Ã£o e se sentir cada vez mais glamourosa com sua nova fragrÃ¢ncia!', '12.png', '2023-06-22 09:02:58', '2023-06-26 09:51:13'),
(34, 'Lily Le Parfum Perfume 30ml', 'R$ 299,90', 'Acreditamos que uma mulher delicada e sensÃ­vel tambÃ©m pode ser forte e empoderada. Inspirados por essa convicÃ§Ã£o, trazemos toda exuberÃ¢ncia do perfume com Lily Le Parfum.', '10.png', '2023-06-22 09:04:46', '2023-06-26 09:50:32'),
(35, 'Combo Match ProteÃ§Ã£o Dos Loiros (5 itens)', 'R$ 197,20', 'O combo Match Science ProteÃ§Ã£o dos Loiros vem com ativos de alta performance para cabelos descoloridos que precisam e merecem um tratamento especial.', '13.png', '2023-06-22 09:05:41', '2023-06-26 09:49:34'),
(36, 'MÃ¡scara de CÃ­lios Make B. Explosion Effect 10g', 'R$ 94,90', 'A MÃ¡scara de CÃ­lios Make B. Explosion Effect  entrega uma explosÃ£o de multi-efeitos alÃ©m de fortalecimento para os fios.', '14.png', '2023-06-22 09:08:45', '2023-06-26 09:47:17'),
(37, 'Boti Baby Sol ColÃ´nia Infantil 100ml', 'R$ 65,90', 'Conferem uma fragrÃ¢ncia suave na pele delicada de bebÃªs e crianÃ§as de 0 a 2 anos. Boti Baby Sol ColÃ´nia Infantil Ã© como fechar os olhos e sentir o calor do sol tocando a face.', '15.png', '2023-06-22 09:09:28', '2023-06-26 09:46:48'),
(38, 'Malbec Desodorante ColÃ´nia 100ml', 'R$ 179,90', 'Malbec Desodorante ColÃ´nia Ã© uma fragrÃ¢ncia Ãºnica e desenvolvida atravÃ©s de um processo de fabricaÃ§Ã£o exclusivo no mundo.', '16.png', '2023-06-22 09:10:21', '2023-06-26 09:44:43'),
(39, 'Quasar Fire Desodorante ColÃ´nia 100ml', 'R$ 139,90', 'Essa fragrÃ¢ncia Oriental Especiada traz notas quentes de especiarias como a Pimenta e o Gengibre, imprimindo muita personalidade para Quasar Fire Desodorante ColÃ´nia.', '17.png', '2023-06-22 09:28:28', '2023-06-26 09:44:12'),
(40, 'Boticollection Crazy Choices Desodorante ColÃ´nia 100ml', 'R$ 111,90', 'Boticollection Crazy Choices ColÃ´nia Ã© uma fragrÃ¢ncia feminina da famÃ­lia olfativa Oriental Ambarado com perfil quente e impactante.', '18.png', '2023-06-22 09:29:24', '2023-06-26 09:43:31'),
(41, 'Liz Desodorante ColÃ´nia 100ml', 'R$ 129,90', 'Liz, uma fragrÃ¢ncia feminina intensa e marcante, traduz o poder das madeiras combinado Ã  delicadeza e sensualidade de um floral arrebatador.', '19.png', '2023-06-22 09:37:23', '2023-06-27 15:42:34'),
(42, 'Zaad Arctic Eau de Parfum 95ml', 'R$ 269,90', 'Zaad Arctic Eau De Parfum apresenta uma fragrÃ¢ncia que te convida a viajar para viver a liberdade do inesperado.', '21.png', '2023-06-22 09:48:57', '2023-06-27 14:00:39');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
