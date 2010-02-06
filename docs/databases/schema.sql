
--
-- Table structure for table `casa`
--

DROP TABLE IF EXISTS `casa`;
CREATE TABLE `casa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `funcionamento` text,
  `telefone1` varchar(255) DEFAULT NULL,
  `telefone2` varchar(255) DEFAULT NULL,
  `telefone3` varchar(255) DEFAULT NULL,
  `observacao` text,
  PRIMARY KEY (`id`)
);

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `observacao` text,
  PRIMARY KEY (`id`)
);

--
-- Table structure for table `ingrediente`
--

DROP TABLE IF EXISTS `ingrediente`;
CREATE TABLE `ingrediente` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `observacao` text,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `casa_id` bigint(20) NOT NULL,
  `categoria_id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `obaservacao` text,
  PRIMARY KEY (`id`),
);


--
-- Table structure for table `produto_ingrediente`
--

DROP TABLE IF EXISTS `produto_ingrediente`;
CREATE TABLE `produto_ingrediente` (
  `produto_id` bigint(20) NOT NULL DEFAULT '0',
  `ingrediente_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`produto_id`,`ingrediente_id`),
);

