-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02/07/2024 às 21:27
-- Versão do servidor: 10.4.6-MariaDB
-- Versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `AutoBD`
--

-- --------------------------------------------------------

--
-- Estrutura para tabelas
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY('id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `livros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `autores` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `ano` int NOT NULL,
  `editora` varchar(255) NOT NULL,
  `userEmprest` varchar(500) NOT NULL,
  `quantDisp` int NOT NULL,
  PRIMARY KEY('id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `emprest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(255) NOT NULL,
  `livroId` varchar(255) NOT NULL,
  PRIMARY KEY('id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Colocar chaves estrangeiras
--

ALTER TABLE emprest
  ADD CONSTRAINT emprest_FK_1
  FOREIGN KEY(userId) REFERENCES usuarios(id) ON DELETE CASCADE;

ALTER TABLE emprest
  ADD CONSTRAINT emprest_FK_2
  FOREIGN KEY(livroId) REFERENCES livros(id) ON DELETE CASCADE;

--
--Popular Livros
--


--
--Colocar um Admin
--

insert into


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
