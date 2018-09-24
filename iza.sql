-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2018 at 05:21 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IZA`
--

-- --------------------------------------------------------

--
-- Table structure for table `lonas`
--

CREATE TABLE `lonas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `lnTrailerSize` varchar(10) NOT NULL,
  `descEnglish` varchar(50) NOT NULL,
  `descEspanol` varchar(70) NOT NULL,
  `lnWidth` int(11) NOT NULL,
  `lnLength` int(11) NOT NULL,
  `lnPrecio` float NOT NULL,
  `lnMoldura` float NOT NULL,
  `lnTotal` float NOT NULL,
  `lnUsCost` float NOT NULL,
  `lnLabor` float NOT NULL,
  `horas` float NOT NULL,
  `precio` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lonas`
--

INSERT INTO `lonas` (`id`, `codigo`, `lnTrailerSize`, `descEnglish`, `descEspanol`, `lnWidth`, `lnLength`, `lnPrecio`, `lnMoldura`, `lnTotal`, `lnUsCost`, `lnLabor`, `horas`, `precio`) VALUES
(1, 'TARP16X5', '16 x 5', 'Tarp 70\" x 178\" With Aluminum Trim', 'Lona 70\" x 178\" Con Moldura Aluminio', 70, 178, 1167, 385, 1552, 91.2941, 70, 2, 206.941),
(2, 'TARP16X6', '16 x 6', 'Tarp 82\" x 178\" With Aluminum Trim', 'Lona 82\" x 178\" Con Moldura Aluminio', 82, 178, 1302, 385, 1687, 99.2353, 70, 2, 218.853),
(3, 'TARP16X6.5', '16 x 6.5', 'Tarp 88\" x 178\" With Aluminum Trim', 'Lona 88\" x 178\" Con Moldura Aluminio', 88, 178, 1376, 385, 1761, 103.588, 70, 2, 225.382),
(4, 'TARP16X7', '16 x 7', 'Tarp 92\" x 178\" With Aluminum Trim', 'Lona 92\" x 178\" Con Moldura Aluminio', 92, 178, 1421, 385, 1806, 106.235, 70, 2, 229.353),
(5, 'TARP18X5', '18 x 5', 'Tarp 70\" x 204\" With Aluminum Trim', 'Lona 70\" x 204\" Con Moldura Aluminio', 70, 204, 1332, 385, 1717, 101, 70, 2, 221.5),
(6, 'TARP18X6', '18 x 6', 'Tarp 82\" x 204\" With Aluminum Trim', 'Lona 82\" x 204\" Con Moldura Aluminio', 82, 203, 1469, 385, 1854, 109.059, 70, 2, 233.588),
(7, 'TARP18X6.5', '18 x 6.5', 'Tarp 88\" x 204\" With Aluminum Trim', 'Lona 88\" x 204\" Con Moldura Aluminio', 88, 203, 1551, 385, 1936, 113.882, 70, 2, 240.824),
(8, 'TARP18X7', '18 x 7', 'Tarp 92\" x 204\" With Aluminum Trim', 'Lona 92\" x 204\" Con Moldura Aluminio', 92, 203, 1603, 385, 1988, 116.941, 70, 2, 245.412),
(9, 'TARP20X5', '20 x 5', 'Tarp 70\" x 224\" With Aluminum Trim', 'Lona 70\" x 224\" Con Moldura Aluminio', 70, 224, 1438, 385, 1823, 107.235, 70, 2, 230.853),
(10, 'TARP20X6', '20 x 6', 'Tarp 82\" x 224\" With Aluminum Trim', 'Lona 82\" x 224\" Con Moldura Aluminio', 82, 224, 1607, 385, 1992, 117.176, 70, 2, 245.765),
(11, 'TARP20X6.5', '20 x 6.5', 'Tarp 88\" x 224\" With Aluminum Trim', 'Lona 88\" x 224\" Con Moldura Aluminio', 88, 224, 1697, 385, 2082, 122.471, 70, 2, 253.706),
(12, 'TARP20X7', '20 x 7', 'Tarp 92\" x 224\" With Aluminum Trim', 'Lona 92\" x 224\" Con Moldura Aluminio', 92, 224, 1752, 385, 2137, 125.706, 70, 2, 258.559),
(13, 'TARP22X5', '22 x 5', 'Tarp 70\" x 251\" With Aluminum Trim', 'Lona 70\" x 251\" Con Moldura Aluminio', 70, 251, 1600, 385, 1985, 116.765, 70, 2, 245.147),
(14, 'TARP22X6', '22 x 6', 'Tarp 82\" x 251\" With Aluminum Trim', 'Lona 82\" x 251\" Con Moldura Aluminio', 82, 251, 1784, 385, 2169, 127.588, 70, 2, 261.382),
(15, 'TARP22X6.5', '22 x 6.5', 'Tarp 88\" x 251\" With Aluminum Trim', 'Lona 88\" x 251\" Con Moldura Aluminio', 88, 251, 1886, 385, 2271, 133.588, 70, 2, 270.382),
(16, 'TARP22X7', '22 x 7', 'Tarp 92\" x 251\" With Aluminum Trim', 'Lona 92\" x 251\" Con Moldura Aluminio', 92, 251, 1948, 385, 2333, 137.235, 70, 2, 275.853),
(17, 'TARP24X5', '24 x 5', 'Tarp 70\" x 271\" With Aluminum Trim', 'Lona 70\" x 271\" Con Moldura Aluminio', 70, 271, 1716, 385, 2101, 123.588, 70, 2, 255.382),
(18, 'TARP24X6', '24 x 6', 'Tarp 82\" x 271\" With Aluminum Trim', 'Lona 82\" x 271\" Con Moldura Aluminio', 82, 271, 1916, 385, 2301, 135.353, 70, 2, 273.029),
(19, 'TARP24X6.5', '24 x 6.5', 'Tarp 88\" x 271\" With Aluminum Trim', 'Lona 88\" x 271\" Con Moldura Aluminio', 88, 271, 2027, 385, 2412, 141.882, 70, 2, 282.824),
(20, 'TARP24X7', '24 x 7', 'Tarp 92\" x 271\" With Aluminum Trim', 'Lona 92\" x 271\" Con Moldura Aluminio', 92, 271, 2090, 385, 2475, 145.588, 70, 2, 288.382);

-- --------------------------------------------------------

--
-- Table structure for table `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descEnglish` varchar(100) NOT NULL,
  `descEspanol` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `horas` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opciones`
--

INSERT INTO `opciones` (`id`, `codigo`, `descEnglish`, `descEspanol`, `precio`, `horas`) VALUES
(1, '20KJACK', 'Additional 20K Jack', 'Gato Adicional de 20K', 105, 0.5),
(2, '4FTDOGPROOF', '4\' Compartment Dog Proof', '4\' Compartimiento Con Tubo 1/2\" Entre PTR\'s', 125, 1),
(3, 'WIDEGATE42', '42\" Wide Escape Gate ( Standard Height )', 'Puerta Escape De 42\"Ancho', 0, 2),
(4, 'WIDEGATE48', '48\" Wide Escape Gate  ( Standard Height )', 'Puerta Escape De 48\"Ancho', 0, 2),
(5, 'TALLGATE5FT8', '5\'8\"Tall Escape Gate  ( Standard Width )', 'Puerta Escape De 5\'8\"Alto', 0, 3),
(6, 'WIDETALLGATE', '48\" Wide & 5\'8\" Tall Escape Gate', 'Puerta Escape De 48\"Ancho y 5\'8\"Alto', 0, 5),
(7, '54WIDETALLGATE', '54\" Wide & 5\'8\" Tall Escape Gate', 'Puerta Escape De 54\"Ancho y 5\'8\"Alto', 0, 5),
(9, '6FTWIDE15A', '6\' Wide trailer with 1 - 5\' wide axle', 'Remolque de 6\' Ancho Con 1 Eje de 5\'', 700, 3),
(10, '6FTWIDE25A', '6\' Wide trailer with 2 - 5\' wide axles', 'Remolque de 6\' Ancho Con 2 Ejes de 5\'', 850, 5),
(11, '6TAXLEWB', '6\'8\" T Axle W/B option', 'Eje T Con Freno', 185, 0),
(12, '6.5FTWIDE26A', '6\'8\" Wide trailer with 2 - 6\' axles', 'Remolque de 6\'8\"Ancho Con 2 Ejes de 6\'', 850, 3),
(13, '6.5FTWIDE36A', '6\'8\" Wide trailer with 3 - 6\' axles', 'Remolque de 6\'8\"Ancho Con 3 Ejes de 6\'', 1000, 5),
(14, '7HIGH', '7\' Trailer height - Per foot of trailer length', 'Remolque de 7\' Alto', 42, 2),
(16, '7FT8WIDE', '7\'8\" Wide Trailer ( Price per foot of trailer length)', 'Remolque de 7\'8\"Ancho', 24, 0.5),
(17, '7WAYFEMALE', '7 Way Female Plug Installed At Rear Of Trailer', 'Enchufe Hembra 7 Way. Instalado En El Posterior', 48, 0),
(18, '8DOORSTEP', '8\" Step For Door', 'Escalon de 8\"Para Tack Room', 43.5, 1),
(19, '12KELECJACK', '12K Electric', 'Gato Electrico De 12K', 900, 2),
(20, '8K2AXLE', '8K Double Axles', '2 Ejes De 8K', 1420.9, 0),
(21, '8K3AXLE', '8K Triple Axles', '3 Ejes De 8K', 2130.9, 0),
(22, '10K2AXLE', '10K Double Axles', '2 Ejes De 10 Km', 2369, 100),
(23, 'AIRVENTS', 'Air vents', 'Ventiladores De Aire', 34, 1),
(24, 'CENTERGBUTTERFLY', 'Center gate butterfly option', 'Puerta Central Mariposa', 150, 5),
(25, 'CENTERGSLIDER', 'Center Gate Swing/Slider', 'Puerta Intermedia Corrediza', 175, 2),
(26, 'DIVIDERGATEHM', 'Center Gate Sheet Metal Half Way Up.', 'Puerta Central Con Lamina A La Mitad', 125, 2),
(27, 'DOUBLEDECK', 'Double deck option ( Per foot of trailer ) Without Wood Floor ', 'Remolque Con Doble Piso', 55, 1),
(28, 'DDECKSLIDERG', 'Double Deck Center Gate With Swing/Slider', 'Puerta Central Swing/Slider Para Doble Piso', 250, 2),
(29, 'DDECKSORTINGG', 'Double Deck Center Gate With Sorting Gate', 'Puerta Central Con Puerta Division Para Doble Piso', 175, 1),
(30, 'ELEC/HYDBRAKE', 'Electric/Hydraulic Brake Option', 'Ejes De Hidráulico', 730, 6),
(31, 'ESCAPEDOOR', 'Extra escape door  ', 'Extra Puerta De Escape', 250, 6),
(32, 'EXTRAGATESTAN', 'Extra middle gate ( Standard height )', 'Extra Puerta Central ( Altura Normal )', 325, 9),
(33, 'EXTRAGATETALL', 'Extra middle gate ( Tall gate )', 'Extra Puerta Central ( Alta )', 375, 10),
(34, 'RHINOLINER', 'Extra Rhino liner - Per square foot', 'Rhino Liner Por Pie', 8, 0.167),
(35, 'EXTRATRD', 'Extra tack room door', 'Extra Puerta Para Tack Room', 350, 14),
(36, 'SADDLERACKS', 'Individual Saddle racks', 'Motureros Individuales', 50, 3),
(37, 'MOVEABLEGATE', 'Floating Gate', 'Puerta Central Movible(Floating Gate)', 550, 10),
(38, 'PLEXIGLASS', 'Plexi glass 1/8\" X 12\'\' X 12\" Strips ( Price Per Running Foot )', 'Plexi Glass', 20, 0.5),
(39, 'BUTTERFLYG', 'Extra Rear Butterfly Gate', 'Puerta Mariposa ( Extra )', 400, 5),
(40, 'SWING/SLIDER', 'Rear Swing/Slider gate', 'Puerta Trasera Corrediza', 250, 4),
(41, 'RAMP', 'Removable Ramp', 'Rampa Para Remolque', 205, 2),
(42, 'ROLLERPIN', 'Roller pin option', 'Con Rodillos', 170, 1.5),
(43, 'CRUBBERBOARD', 'Rubber Boards ( Cleated )', 'Piso Con Tablas De Hule ( Estándar )', 4.22, 0),
(44, 'SRUBBERBOARD', 'Rubber Boards ( Tongue & Groove )', 'Piso Con Tablas De Hule ( Liso )', 3.75, 0),
(45, 'RUBBERMATTING', 'Rubber matting per foot', 'Instalar Hule Sobre La Madera', 20.5, 0.167),
(46, 'RUBBERBUMPER', 'Rubber Bumpers', 'Defensa Con Proteccion De Hule', 32, 0),
(47, 'SADDLEBLANKET', 'Saddle Blanket Rack ( Price Per Rack )', 'Tubo Para Cobija', 33.33, 2),
(48, 'SADDLEBLIGHTS', 'Saddle Box Lights. 1 On Each Side With Separate Switch', '1 - Luz en Ambos Lados en saddle box Con Switch', 99, 1),
(49, '3SADDLERACKS', 'Set of 3 saddle racks', 'Rack Con 3 Moturas', 150, 8),
(50, 'SOLIDBUTTERFY', 'Solid Rear Butterfly Gates', 'Puertas Mariposa Solidas', 150, 2),
(51, 'SPARETIRESIDE', 'Spare tire rack on sides', 'Lllanta Extra En Lado', 50.66, 2),
(52, 'SPAREUNECK', 'Spare Under Neck', 'Llanta Extra Abajo Del Ganso', 50, 2),
(53, 'SPITNOSEWM', 'Split Nose with expanded metal', 'Divison En Ganso Con Lamina Desplegada', 200, 9),
(54, 'SPRINGPIN', 'Spring Loaded Pin', 'Perno Con Resorte', 100, 2),
(55, 'SWINGRACK', 'Swing Out Saddle Rack', 'Rack De Moturas Que Habre Hacia Fuera', 145, 5),
(56, '34X20X9', 'Waterproof tool box  - 34\" x 20\" x 9\"', 'Cajon De Herramienta De 34\" x 20\" x 9\"', 200, 5),
(57, '1/4RAILS', 'Weld 1/4', 'Rieles de 1/4', 10, 0.2),
(58, 'BBTLOGO', 'White/Black big bend logos', 'Logo Big Bend', 8, 0),
(59, '4HIGHSIDE', '4\' High solid sides - Per foot of trailer length', 'Redilas de 4\' Alto', 12, 0.5),
(60, 'HYDJACK', 'Hydraulic Jack', 'Gato Hidraulico', 1200, 2),
(61, 'WOODFLOOR', 'Wood Floor', 'Piso Con Tablas De Madera', 0, 0),
(62, 'NOROLLERS', 'Without Roller Pin Option', 'Sin Rodillos', 0, 0),
(63, 'BUTTERFLYGATE', 'Rear Butterfly Gate', 'Puerta Trasera Mariposa ( Estándar )', 0, 0),
(64, 'SINGLESWING', 'Rear Single Swing Gate', 'Puerta Trasera ( Single Swing )', 0, 0),
(65, 'STANDARDSIDES', 'Standard Sides', 'Redilas Estándar', 0, 0),
(66, 'FLUSHFENDERS', 'Sides Flush With Fenders', 'Redilas Aras Con Fender', 0, 0),
(67, 'DOUBLEDECKSIDE', 'Sides For Double Deck', 'Redilas Para Doble Piso', 0, 0),
(68, '10PLY16SR', '10 Ply Tires With 16\" Steel Rims', 'Llantas 10 Ply Con Rin de Acero 16\"', 162.78, 0),
(69, '12PLY16SR', '12 Ply Tires With 16\" Steel Rims', 'Llantas 12 Ply Con Rin de Acero 16\"', 199.5, 0),
(70, '14PLY16SR', '14 Ply Tires With  16\"Steel Rims', 'Llantas 14 Ply Con Rin de Acero 16\"', 248.8, 0),
(71, '14PLY16AR', '14 Ply Tires With 16\"Aluminum Rims', 'Llantas 14 Ply Con Rin de Aluminio 16\"', 371.2, 0),
(72, '18PLY16SR', '18 Ply Tires With 17.5\" Steel Rims', 'Llantas 18 Ply Con Rin de Acero 17.5\"', 386.54, 0),
(73, '10PLY16SRE', '10 Ply Spare Tire With 16\" Steel Rim', 'Llanta Extra 10 Ply Con Rin de Acero 16\"', 81.39, 0),
(74, '12PLY16SRE', '12 Ply Spare Tire With 16\" Steel Rim', 'Llanta Extra 12 Ply Con Rin de Acero 16\"', 99.75, 0),
(75, '14PLY16SRE', '14 Ply Spare Tire With 16\" Steel Rim', 'Llanta Extra 14 Ply Con Rin de Acero 16\"', 124.4, 0),
(76, '14PLY16ARE', '14 Ply Spare Tire With 16\"Aluminum Rim', 'Llanta Extra 14 Ply Con Rin de Aluminio 16\"', 185.6, 0),
(77, '18PLY16SRE', '18 Ply Spare Tire With 17.5\" Steel Rim', 'Llanta Extra 18 Ply Con Rin de Acero 17.5\"', 193.27, 0),
(78, 'TIRECOVER', 'Spare Tire Cover', 'Lona Para Llanta Extra', 17, 0),
(79, '10K3AXLE', '10K Double Axles', '2 Ejes De 10K', 2369, 0),
(80, 'REMOVECG', 'Remove Center Gate', 'quitar puerta central', -275, 0),
(81, 'REMOVESG', 'Remove Sorting Gate', 'Quitar puerta corrediza en puerta central', -100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(11) NOT NULL,
  `trailerNo` int(11) DEFAULT NULL,
  `trailerVin` varchar(30) DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `notes` text,
  `trailerHrs` int(11) DEFAULT NULL,
  `trailerPrice` float DEFAULT NULL,
  `subTotal` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `totHrs` int(11) DEFAULT NULL,
  `totPrice` float DEFAULT NULL,
  `options` text,
  `trailerSpecs` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNo`, `trailerNo`, `trailerVin`, `dueDate`, `orderDate`, `notes`, `trailerHrs`, `trailerPrice`, `subTotal`, `discount`, `totHrs`, `totPrice`, `options`, `trailerSpecs`) VALUES
(0, 0, '', '0000-00-00', '2018-09-21', '', NULL, NULL, 10344.2, 206.885, 226, 10137.4, '{\"codigo1\":\"-\",\"descEnglish1\":\"Select Wood Type\",\"descEspanol1\":\"-\",\"horas1\":\"0\",\"precio1\":\"810.24\",\"codigo2\":\"-\",\"descEnglish2\":\"Select Side\",\"descEspanol2\":\"-\",\"horas2\":\"0\",\"precio2\":\"0\",\"codigo3\":\"-\",\"descEnglish3\":\"Select Rear Gate\",\"descEspanol3\":\"-\",\"horas3\":\"0\",\"precio3\":\"0\",\"codigo4\":\"-\",\"descEnglish4\":\"Select Roller\",\"descEspanol4\":\"-\",\"horas4\":\"0\",\"precio4\":\"0\",\"codigo5\":\"-\",\"descEnglish5\":\"Select Tire\",\"descEspanol5\":\"-\",\"horas5\":\"0\",\"precio5\":\"0\",\"codigo6\":\"-\",\"descEnglish6\":\"Select Spare Tire\",\"descEspanol6\":\"-\",\"horas6\":\"0\",\"precio6\":\"0\",\"codigo7\":\"2FTSADDLEBOX2DBOX \",\"descEnglish7\":\"2FTSADDLEBOX2DBOX\",\"descEspanol7\":\" 2\' Saddle Box Con 2 Puertas. Con 2 Motureros \",\"horas7\":\" 11 \",\"precio7\":\" 630\",\"codigo8\":\"-\",\"descEnglish8\":\"\",\"descEspanol8\":\"-\",\"horas8\":\"0\",\"precio8\":\"0\",\"codigo9\":\"-\",\"descEnglish9\":\"\",\"descEspanol9\":\"-\",\"horas9\":\"0\",\"precio9\":\"0\",\"codigo10\":\"-\",\"descEnglish10\":\"\",\"descEspanol10\":\"-\",\"horas10\":\"0\",\"precio10\":\"0\",\"codigo11\":\"-\",\"descEnglish11\":\"\",\"descEspanol11\":\"-\",\"horas11\":\"0\",\"precio11\":\"0\",\"codigo12\":\"-\",\"descEnglish12\":\"\",\"descEspanol12\":\"-\",\"horas12\":\"0\",\"precio12\":\"0\",\"codigo13\":\"-\",\"descEnglish13\":\"\",\"descEspanol13\":\"-\",\"horas13\":\"0\",\"precio13\":\"0\",\"codigo14\":\"-\",\"descEnglish14\":\"\",\"descEspanol14\":\"-\",\"horas14\":\"0\",\"precio14\":\"0\",\"codigo15\":\"-\",\"descEnglish15\":\"Select Tarp\",\"descEspanol15\":\"-\",\"horas15\":\"0\",\"precio15\":\"0\",\"codigo16\":\"-\",\"descEnglish16\":\"Select Vents\",\"descEspanol16\":\"-\",\"horas16\":\"0\",\"precio16\":\"0\"}', '{\"Modelos\":\"24x6FT2A\",\"tLength\":\"24\",\"tWidth\":\"6\",\"tAxles\":\"\",\"tSides\":\"\",\"tTop\":\"\",\"tRearGate\":\"\",\"tCompartments\":\"\",\"tEscapeGate\":\"\",\"horasMdl\":\" 210 \",\"precioMdl\":\"8584 \",\"tToolBox\":\"\",\"tSaddleRack\":\"\",\"tBlanketBars\":\"\",\"tFloorType\":\"CRUBBERBOARD\",\"tFloorSpacing\":\"Standard\",\"tRollers\":\"\",\"tHinch\":\"\",\"tHSLength\":\"\",\"tMatting\":\"\",\"tCalf\":\"Normal\",\"tRod\":\"No\",\"tVents\":\"\",\"tRhino\":\"\",\"tSideRails\":\"\",\"tSaddleBox\":\"With Divider Wall\",\"tTires\":\"\",\"tExtraTire\":\"\",\"tColor\":\"\",\"tFrontPlug\":\"\",\"tRearPlug\":\"\",\"tTireCover\":\"No\",\"tTarp\":\"\",\"totWeight\":\"5779\",\"floorFt\":\"192\"}'),
(5026, 29873, '3892-SDHJ', '2018-11-22', '2018-09-12', 'Se requiere escribir alguna nota para saber como aparecen en la impresion del PDF asi que escribe algo de una longitud respetable para poder hacer esa prueba por favor', NULL, NULL, 6173.94, 123.479, 148, 6050.46, '{\"codigo1\":\"-\",\"descEnglish1\":\"Select Wood Type\",\"descEspanol1\":\"-\",\"horas1\":\"0\",\"precio1\":\"0\",\"codigo2\":\"-\",\"descEnglish2\":\"Select Side\",\"descEspanol2\":\"-\",\"horas2\":\"0\",\"precio2\":\"0\",\"codigo3\":\"-\",\"descEnglish3\":\"Select Rear Gate\",\"descEspanol3\":\"-\",\"horas3\":\"0\",\"precio3\":\"0\",\"codigo4\":\"-\",\"descEnglish4\":\"Select Roller\",\"descEspanol4\":\"-\",\"horas4\":\"0\",\"precio4\":\"0\",\"codigo5\":\"-\",\"descEnglish5\":\"Select Tire\",\"descEspanol5\":\"-\",\"horas5\":\"0\",\"precio5\":\"0\",\"codigo6\":\"-\",\"descEnglish6\":\"Select Spare Tire\",\"descEspanol6\":\"-\",\"horas6\":\"0\",\"precio6\":\"0\",\"codigo7\":\"2FTSADDLEBOX2D \",\"descEnglish7\":\"2FTSADDLEBOX2D\",\"descEspanol7\":\" 2\' Saddle Box Con 2 Puertas. Con 2 Motureros \",\"horas7\":\" 11 \",\"precio7\":\" 630\",\"codigo8\":\"-\",\"descEnglish8\":\"\",\"descEspanol8\":\"-\",\"horas8\":\"0\",\"precio8\":\"0\",\"codigo9\":\"-\",\"descEnglish9\":\"\",\"descEspanol9\":\"-\",\"horas9\":\"0\",\"precio9\":\"0\",\"codigo10\":\"-\",\"descEnglish10\":\"\",\"descEspanol10\":\"-\",\"horas10\":\"0\",\"precio10\":\"0\",\"codigo11\":\"-\",\"descEnglish11\":\"\",\"descEspanol11\":\"-\",\"horas11\":\"0\",\"precio11\":\"0\",\"codigo12\":\"-\",\"descEnglish12\":\"\",\"descEspanol12\":\"-\",\"horas12\":\"0\",\"precio12\":\"0\",\"codigo13\":\"-\",\"descEnglish13\":\"\",\"descEspanol13\":\"-\",\"horas13\":\"0\",\"precio13\":\"0\",\"codigo14\":\"-\",\"descEnglish14\":\"\",\"descEspanol14\":\"-\",\"horas14\":\"0\",\"precio14\":\"0\",\"codigo15\":\"TARP16X5 \",\"descEnglish15\":\" Tarp 70\\\" x 178\\\" With Aluminum Trim \",\"descEspanol15\":\" Lona 70\\\" x 178\\\" Con Moldura Aluminio \",\"horas15\":\" 2 \",\"precio15\":\" 206.941\",\"codigo16\":\"-\",\"descEnglish16\":\"Select Vents\",\"descEspanol16\":\"-\",\"horas16\":\"0\",\"precio16\":\"0\"}', '{\"Modelos\":\"12x6HT1A\",\"tLength\":\"\",\"tWidth\":\"\",\"tAxles\":\"\",\"tSides\":\"\",\"tTop\":\"\",\"tRearGate\":\"\",\"tCompartments\":\"\",\"tEscapeGate\":\"\",\"horasMdl\":\" 135\",\"precioMdl\":\"5337 \",\"tToolBox\":\"\",\"tSaddleRack\":\"\",\"tBlanketBars\":\"\",\"tFloorType\":\"\",\"tFloorSpacing\":\"Standard\",\"tRollers\":\"\",\"tHinch\":\"\",\"tHSLength\":\"\",\"tMatting\":\"\",\"tCalf\":\"Normal\",\"tRod\":\"No\",\"tVents\":\"\",\"tRhino\":\"\",\"tSideRails\":\"\",\"tSaddleBox\":\"With Divider Wall\",\"tTires\":\"\",\"tExtraTire\":\"\",\"tColor\":\"\",\"tFrontPlug\":\"6 Way\",\"tRearPlug\":\"6 Way\",\"tTireCover\":\"No\",\"tTarp\":\"TARP16X5\",\"totWeight\":\"\",\"floorFt\":\"\"}'),
(5027, 123, 'AJKLAS', '2018-10-31', '2018-09-14', 'Se requiere escribir alguna nota para saber como aparecen en la impresion del PDF asi que escribe algo de una longitud respetable para poder hacer esa prueba por favor. AGRADECEMOS EL COMENTARIO PARA PODER HACER ESTE SISTEMA UN POCO MAS AMIGABLE', NULL, NULL, 14604.7, 292.094, 229, 14312.6, '{\"codigo1\":\"SRUBBERBOARD \",\"descEnglish1\":\" Rubber Boards ( Tongue & Groove ) \",\"descEspanol1\":\" Piso Con Tablas De Hule ( Liso ) \",\"horas1\":\" 0 \",\"precio1\":\" 3.75\",\"codigo2\":\"STANDARDSIDES \",\"descEnglish2\":\" Standard Sides \",\"descEspanol2\":\" Redilas Est\\ufffdndar \",\"horas2\":\" 0 \",\"precio2\":\" 0\",\"codigo3\":\"BUTTERFLYGATE \",\"descEnglish3\":\" Rear Butterfly Gate \",\"descEspanol3\":\" Puerta Trasera Mariposa ( Est\\ufffdndar ) \",\"horas3\":\" 0 \",\"precio3\":\" 0\",\"codigo4\":\"ROLLERPIN \",\"descEnglish4\":\" Roller pin option \",\"descEspanol4\":\" Con Rodillos \",\"horas4\":\" 1.5 \",\"precio4\":\" 170\",\"codigo5\":\"10PLY16SR \",\"descEnglish5\":\" 10K Double Axles - \",\"descEspanol5\":\" 2 Ejes De 10K \",\"horas5\":\" 0 \",\"precio5\":\" 2369\",\"codigo6\":\"10PLY16SRE \",\"descEnglish6\":\" 10K Double Axles - \",\"descEspanol6\":\" 2 Ejes De 10K \",\"horas6\":\" 0 \",\"precio6\":\" 2369\",\"codigo7\":\"DELUXETACKROOM \",\"descEnglish7\":\"DELUXETACKROOM\",\"descEspanol7\":\" Tack Room Deluxe, 7 Montureros y 2 tubos para cobija \",\"horas7\":\" 24 \",\"precio7\":\" 1590\",\"codigo8\":\"ESCAPEDOOR \",\"descEnglish8\":\"ESCAPEDOOR\",\"descEspanol8\":\" Extra Puerta De Escape \",\"horas8\":\" 6 \",\"precio8\":\" 250\",\"codigo9\":\"CENTERGBUTTERFLY \",\"descEnglish9\":\"CENTERGBUTTERFLY\",\"descEspanol9\":\" Puerta Central Mariposa \",\"horas9\":\" 5 \",\"precio9\":\" 150\",\"codigo10\":\"RHINOLINER \",\"descEnglish10\":\"RHINOLINER\",\"descEspanol10\":\" Rhino Liner Por Pie \",\"horas10\":\" 0.167 \",\"precio10\":\" 8\",\"codigo11\":\"RAMP \",\"descEnglish11\":\"RAMP\",\"descEspanol11\":\" Rampa Para Remolque \",\"horas11\":\" 2 \",\"precio11\":\" 205\",\"codigo12\":\"BUTTERFLYG \",\"descEnglish12\":\"BUTTERFLYG\",\"descEspanol12\":\" Puerta Mariposa ( Extra ) \",\"horas12\":\" 5 \",\"precio12\":\" 400\",\"codigo13\":\"RUBBERBUMPER \",\"descEnglish13\":\"RUBBERBUMPER\",\"descEspanol13\":\" Defensa Con Proteccion De Hule \",\"horas13\":\" 0 \",\"precio13\":\" 32\",\"codigo14\":\"SADDLERACKS \",\"descEnglish14\":\"SADDLERACKS\",\"descEspanol14\":\" Motureros Individuales \",\"horas14\":\" 3 \",\"precio14\":\" 50\",\"codigo15\":\"TARP16X5 \",\"descEnglish15\":\" Tarp 70\\\" x 178\\\" With Aluminum Trim \",\"descEspanol15\":\" Lona 70\\\" x 178\\\" Con Moldura Aluminio \",\"horas15\":\" 2 \",\"precio15\":\" 206.941\",\"codigo16\":\"2 - BS \",\"descEnglish16\":\" 2 - Vents Behind Spare \",\"descEspanol16\":\" 2 - Vents Atras Llanta Extra \",\"horas16\":\" 0.5 \",\"precio16\":\" 68\"}', '{\"Modelos\":\"18x6BT1A\",\"tLength\":\"28\",\"tWidth\":\"7\",\"tAxles\":\"3\",\"tSides\":\"STANDARDSIDES\",\"tTop\":\"Full Top\",\"tRearGate\":\"BUTTERFLYGATE\",\"tCompartments\":\"2\",\"tEscapeGate\":\"Driver Side\",\"horasMdl\":\" 180\",\"precioMdl\":\"6733 \",\"tToolBox\":\"1 - DS\",\"tSaddleRack\":\"1 - DS\",\"tBlanketBars\":\"2\",\"tFloorType\":\"SRUBBERBOARD\",\"tFloorSpacing\":\"0\",\"tRollers\":\"ROLLERPIN\",\"tHinch\":\"Yes\",\"tHSLength\":\"10\",\"tMatting\":\"10\",\"tCalf\":\"Normal\",\"tRod\":\"Yes\",\"tVents\":\"2 - BS & 2 - DSD\",\"tRhino\":\"10\",\"tSideRails\":\"2\",\"tSaddleBox\":\"Only HSS for Racks\",\"tTires\":\"10PLY16SR\",\"tExtraTire\":\"10PLY16SRE\",\"tColor\":\"Postal Blue\",\"tFrontPlug\":\"6 Way\",\"tRearPlug\":\"6 Way\",\"tTireCover\":\"Yes\",\"tTarp\":\"TARP16X5\",\"totWeight\":\"\",\"floorFt\":\"\"}'),
(5028, 0, '', '0000-00-00', '2018-09-21', '', NULL, NULL, 9218.22, 184.364, 221, 9033.86, '{\"codigo1\":\"CRUBBERBOARD \",\"descEnglish1\":\" Rubber Boards ( Cleated ) \",\"descEspanol1\":\" Piso Con Tablas De Hule ( Est\\ufffdndar ) \",\"horas1\":\" 0 \",\"precio1\":\" 4.22\",\"codigo2\":\"-\",\"descEnglish2\":\"Select Side\",\"descEspanol2\":\"-\",\"horas2\":\"0\",\"precio2\":\"0\",\"codigo3\":\"-\",\"descEnglish3\":\"Select Rear Gate\",\"descEspanol3\":\"-\",\"horas3\":\"0\",\"precio3\":\"0\",\"codigo4\":\"-\",\"descEnglish4\":\"Select Roller\",\"descEspanol4\":\"-\",\"horas4\":\"0\",\"precio4\":\"0\",\"codigo5\":\"-\",\"descEnglish5\":\"Select Tire\",\"descEspanol5\":\"-\",\"horas5\":\"0\",\"precio5\":\"0\",\"codigo6\":\"-\",\"descEnglish6\":\"Select Spare Tire\",\"descEspanol6\":\"-\",\"horas6\":\"0\",\"precio6\":\"0\",\"codigo7\":\"2FTSADDLEBOX2D \",\"descEnglish7\":\"2FTSADDLEBOX2D\",\"descEspanol7\":\" 2\' Saddle Box Con 2 Puertas. Con 2 Motureros \",\"horas7\":\" 11 \",\"precio7\":\" 630\",\"codigo8\":\"-\",\"descEnglish8\":\"\",\"descEspanol8\":\"-\",\"horas8\":\"0\",\"precio8\":\"0\",\"codigo9\":\"-\",\"descEnglish9\":\"\",\"descEspanol9\":\"-\",\"horas9\":\"0\",\"precio9\":\"0\",\"codigo10\":\"-\",\"descEnglish10\":\"\",\"descEspanol10\":\"-\",\"horas10\":\"0\",\"precio10\":\"0\",\"codigo11\":\"-\",\"descEnglish11\":\"\",\"descEspanol11\":\"-\",\"horas11\":\"0\",\"precio11\":\"0\",\"codigo12\":\"-\",\"descEnglish12\":\"\",\"descEspanol12\":\"-\",\"horas12\":\"0\",\"precio12\":\"0\",\"codigo13\":\"-\",\"descEnglish13\":\"\",\"descEspanol13\":\"-\",\"horas13\":\"0\",\"precio13\":\"0\",\"codigo14\":\"-\",\"descEnglish14\":\"\",\"descEspanol14\":\"-\",\"horas14\":\"0\",\"precio14\":\"0\",\"codigo15\":\"-\",\"descEnglish15\":\"Select Tarp\",\"descEspanol15\":\"-\",\"horas15\":\"0\",\"precio15\":\"0\",\"codigo16\":\"-\",\"descEnglish16\":\"Select Vents\",\"descEspanol16\":\"-\",\"horas16\":\"0\",\"precio16\":\"0\"}', '{\"Modelos\":\"24x6FT2A\",\"tLength\":\"24\",\"tWidth\":\"6\",\"tAxles\":\"\",\"tSides\":\"\",\"tTop\":\"\",\"tRearGate\":\"\",\"tCompartments\":\"\",\"tEscapeGate\":\"\",\"horasMdl\":\" 210 \",\"precioMdl\":\"8584 \",\"tToolBox\":\"\",\"tSaddleRack\":\"\",\"tBlanketBars\":\"\",\"tFloorType\":\"CRUBBERBOARD\",\"tFloorSpacing\":\"Standard\",\"tRollers\":\"\",\"tHinch\":\"\",\"tHSLength\":\"\",\"tMatting\":\"\",\"tCalf\":\"Normal\",\"tRod\":\"No\",\"tVents\":\"\",\"tRhino\":\"\",\"tSideRails\":\"\",\"tSaddleBox\":\"With Divider Wall\",\"tTires\":\"\",\"tExtraTire\":\"\",\"tColor\":\"\",\"tFrontPlug\":\"\",\"tRearPlug\":\"\",\"tTireCover\":\"No\",\"tTarp\":\"\",\"totWeight\":\"6931\",\"floorFt\":\"192\"}'),
(7112, 0, '56DFGJHKLFGJK', '0000-00-00', '2018-09-22', 'USE WHITE DECALS', NULL, NULL, 10790.9, 215.818, 223, 10575.1, '{\"codigo1\":\"CRUBBERBOARD \",\"descEnglish1\":\" Rubber Boards ( Cleated ) \",\"descEspanol1\":\" Piso Con Tablas De Hule ( Est\\ufffdndar ) \",\"horas1\":\" 0 \",\"precio1\":\"784.92\",\"codigo2\":\"STANDARDSIDES \",\"descEnglish2\":\" Standard Sides \",\"descEspanol2\":\" Redilas Est\\ufffdndar \",\"horas2\":\" 0 \",\"precio2\":\" 0\",\"codigo3\":\"BUTTERFLYGATE \",\"descEnglish3\":\" Rear Butterfly Gate \",\"descEspanol3\":\" Puerta Trasera Mariposa ( Est\\ufffdndar ) \",\"horas3\":\" 0 \",\"precio3\":\" 0\",\"codigo4\":\"ROLLERPIN \",\"descEnglish4\":\" Roller pin option \",\"descEspanol4\":\" Con Rodillos \",\"horas4\":\" 1.5 \",\"precio4\":\" 170\",\"codigo5\":\"14PLY16SR \",\"descEnglish5\":\" 14 Ply Tires With  16\\\"Steel Rims \",\"descEspanol5\":\" Llantas 14 Ply Con Rin de Acero 16\\\" \",\"horas5\":\" 0 \",\"precio5\":\"497.6\",\"codigo6\":\"14PLY16SRE \",\"descEnglish6\":\" 14 Ply Spare Tire With 16\\\" Steel Rim \",\"descEspanol6\":\" Llanta Extra 14 Ply Con Rin de Acero 16\\\" \",\"horas6\":\" 0 \",\"precio6\":\" 124.4\",\"codigo7\":\"2FTSADDLEBOX2D \",\"descEnglish7\":\"2FTSADDLEBOX2D\",\"descEspanol7\":\" 2\' Saddle Box Con 2 Puertas. Con 2 Motureros \",\"horas7\":\" 11 \",\"precio7\":\" 630\",\"codigo8\":\"-\",\"descEnglish8\":\"\",\"descEspanol8\":\"-\",\"horas8\":\"0\",\"precio8\":\"0\",\"codigo9\":\"-\",\"descEnglish9\":\"\",\"descEspanol9\":\"-\",\"horas9\":\"0\",\"precio9\":\"0\",\"codigo10\":\"-\",\"descEnglish10\":\"\",\"descEspanol10\":\"-\",\"horas10\":\"0\",\"precio10\":\"0\",\"codigo11\":\"-\",\"descEnglish11\":\"\",\"descEspanol11\":\"-\",\"horas11\":\"0\",\"precio11\":\"0\",\"codigo12\":\"-\",\"descEnglish12\":\"\",\"descEspanol12\":\"-\",\"horas12\":\"0\",\"precio12\":\"0\",\"codigo13\":\"-\",\"descEnglish13\":\"\",\"descEspanol13\":\"-\",\"horas13\":\"0\",\"precio13\":\"0\",\"codigo14\":\"-\",\"descEnglish14\":\"\",\"descEspanol14\":\"-\",\"horas14\":\"0\",\"precio14\":\"0\",\"codigo15\":\"-\",\"descEnglish15\":\"Select Tarp\",\"descEspanol15\":\"-\",\"horas15\":\"0\",\"precio15\":\"0\",\"codigo16\":\"-\",\"descEnglish16\":\"Select Vents\",\"descEspanol16\":\"-\",\"horas16\":\"0\",\"precio16\":\"0\"}', '{\"Modelos\":\"24x6FT2A\",\"tLength\":\"24\",\"tWidth\":\"6\",\"tAxles\":\"2\",\"tSides\":\"STANDARDSIDES\",\"tTop\":\"Full Top\",\"tRearGate\":\"BUTTERFLYGATE\",\"tCompartments\":\"\",\"tEscapeGate\":\"Passenger Side\",\"horasMdl\":\" 210 \",\"precioMdl\":\"8584 \",\"tToolBox\":\"\",\"tSaddleRack\":\"2 - DS\",\"tBlanketBars\":\"\",\"tFloorType\":\"CRUBBERBOARD\",\"tFloorSpacing\":\"Standard\",\"tRollers\":\"ROLLERPIN\",\"tHinch\":\"Yes\",\"tHSLength\":\"\",\"tMatting\":\"\",\"tCalf\":\"Normal\",\"tRod\":\"No\",\"tVents\":\"\",\"tRhino\":\"\",\"tSideRails\":\"\",\"tSaddleBox\":\"With Divider Wall\",\"tTires\":\"14PLY16SR\",\"tExtraTire\":\"14PLY16SRE\",\"tColor\":\"\",\"tFrontPlug\":\"7 Way\",\"tRearPlug\":\"\",\"tTireCover\":\"No\",\"tTarp\":\"\",\"totWeight\":\"4517\",\"floorFt\":\"186\"}');

-- --------------------------------------------------------

--
-- Table structure for table `paridad`
--

CREATE TABLE `paridad` (
  `moneda` varchar(5) NOT NULL,
  `compra` float NOT NULL,
  `venta` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paridad`
--

INSERT INTO `paridad` (`moneda`, `compra`, `venta`) VALUES
('USD', 17, 19);

-- --------------------------------------------------------

--
-- Table structure for table `saddles`
--

CREATE TABLE `saddles` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descEnglish` varchar(100) NOT NULL,
  `descEspanol` varchar(100) NOT NULL,
  `horas` float NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saddles`
--

INSERT INTO `saddles` (`id`, `codigo`, `descEnglish`, `descEspanol`, `horas`, `precio`) VALUES
(1, '2FTSADDLEBOX2D', '2\' x 4\' High saddle compartment ( Solid sides & 2 Doors )', '2\' Saddle Box Con 2 Puertas. Con 2 Motureros', 11, 630),
(2, '2FTSADDLEBOX3D', '2\' x 4\' High saddle compartment ( Solid sides & 3 Doors )', '2\' Saddle Box Con 3 Puertas. Con 2 Motureros', 11, 630),
(3, '2FTSADDLEBOX4D', '2\' x 4\' High saddle compartment ( Solid sides & 4 Doors )', '2\' Saddle Box Con 4 Puertas. Con 2 Motureros', 11, 630),
(4, '3FTSADDLEBOX2D', '3\' x 4\' High saddle compartment ( Solid sides & 2 Doors )', '3\' Saddle Box Con 2 Puertas. Con 2 Motureros', 11, 730),
(5, '3FTSADDLEBOX3D', '3\' x 4\' High saddle compartment ( Solid sides & 3 Doors )', '3\' Saddle Box Con 3 Puertas. Con 2 Motureros', 13, 840),
(6, '3FTSADDLEBOX4D', '3\' x 4\' High saddle compartment ( Solid sides & 4 Doors )', '3\' Saddle Box Con 4 Puertas. Con 2 Motureros', 15.5, 950),
(7, '2X4FTTACKROOM', '2\' x 4\' High saddle compartment ( Solid sides & 2 Doors )', '2\' Saddle Box Con 2 Puertas. Con 2 Motureros', 11, 630),
(8, '3FTTACKROOM', '3\' Tack Room ( Door on Passenger Side ) With 3 Racks', '3\' Tack Room Con 3 Motureros ( Puerta en Lado Pasajero )', 18, 997.5),
(9, '3.5FTTACKROOM', '3.5\' Tack Room ( Door On Passenger Side ) With 3 Racks', '3.5\' Tack Room Con 3 Motureros ( Puerta En Lado Pasajero )', 20, 1163),
(10, '4FTTACKROOM', '4\' Tack Room ( Door on Passenger Side ) With 3 Racks', '4\' Tack Room Con 3 Motureros ( Puerta en Lado Pasajero )', 18, 1097.5),
(11, 'DELUXETACKROOM', 'Deluxe Tack Room, Includes 6 Saddle racks & 2 Blanket Bars', 'Tack Room Deluxe, 7 Montureros y 2 tubos para cobija', 24, 1590);

-- --------------------------------------------------------

--
-- Table structure for table `trailers`
--

CREATE TABLE `trailers` (
  `id` int(11) NOT NULL,
  `codigo` varchar(8) NOT NULL,
  `descEnglish` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `horas` float NOT NULL,
  `weight` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trailers`
--

INSERT INTO `trailers` (`id`, `codigo`, `descEnglish`, `precio`, `horas`, `weight`) VALUES
(1, '12x6BT1A', '12\' x 6\' Stock Trailer, 1 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 5146, 132, 0),
(2, '12x6HT1A', '12\' x 6\' Stock Trailer, 1 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 5337, 135, 0),
(3, '12x6FT1A', '12\' x 6\' Stock Trailer, 1 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 5662, 148, 0),
(4, '14x6BT1A', '14\' x 6\' Stock Trailer, 1 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 5431, 137, 3025),
(5, '14x6HT1A', '14\' x 6\' Stock Trailer, 1 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 5622, 143, 3173),
(6, '14x6FT1A', '14\' x 6\' Stock Trailer, 1 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 5874, 151, 3310),
(7, '16x6BT1A', '16\' x 6\' Stock Trailer, 1 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 5716.8, 145, 3194),
(8, '16x6HT1A', '16\' x 6\' Stock Trailer, 1 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 5907.2, 150, 3364),
(9, '16x6FT1A', '16\' x 6\' Stock Trailer, 1 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 5996.8, 159, 3534),
(10, '16x6BT2A', '16\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 6355.2, 161, 3701),
(11, '16x6HT2A', '16\' x 6\' Stock Trailer, 2 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 6556.8, 166, 3871),
(12, '16x6FT2A', '16\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 6635.2, 176, 4041),
(13, '18x6BT1A', '18\' x 6\' Stock Trailer, 1 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 6733, 180, 3498),
(14, '18x6HT1A', '18\' x 6\' Stock Trailer, 1 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 6845, 183, 3753),
(15, '18x6FT1A', '18\' x 6\' Stock Trailer, 1 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 6957, 185, 4008),
(16, '18x6BT2A', '18\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 7128, 181, 3648),
(17, '18x6HT2A', '18\' x 6\' Stock Trailer, 2 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 7240, 184, 3903),
(18, '18x6FT2A', '18\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 7352, 186, 4158),
(19, '20x6BT2A', '20\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 7520, 190, 4026),
(20, '20x6HT2A', '20\' x 6\' Stock Trailer, 2 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 7688, 193, 4238),
(21, '20x6FT2A', '20\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 7800, 195, 4450),
(22, '22x6BT2A', '22\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 7682, 191, 4225),
(23, '22x6HT2A', '22\' x 6\' Stock Trailer, 2 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 7850, 194, 4436),
(24, '22x6FT2A', '22\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 7985, 198, 4710),
(25, '24x6BT2A', '24\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 8248, 202, 5077),
(26, '24x6HT2A', '24\' x 6\' Stock Trailer, 2 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 8416, 206, 5332),
(27, '24x6FT2A', '24\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 8584, 210, 5587),
(28, '26x6BT3A', '26\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 8814, 205, 5330),
(29, '26x6HT3A', '26\' x 6\' Stock Trailer, 2 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 8982, 211, 5627),
(30, '26x6FT3A', '26\' x 6\' Stock Trailer, 2 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 9183, 215, 5924),
(31, '28x6BT3A', '28\' x 6\' Stock Trailer, 3 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 9984, 253, 5711),
(32, '28x6HT3A', '28\' x 6\' Stock Trailer, 3 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 10208, 259, 6008),
(33, '28x6FT3A', '28\' x 6\' Stock Trailer, 3 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 10432, 267, 6305),
(34, '32x6BT3A', '32\' x 6\' Stock Trailer, 3 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 10656, 270, 6740),
(35, '32x6HT3A', '32\' x 6\' Stock Trailer, 3 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 10824, 274, 7080),
(36, '32x6FT3A', '32\' x 6\' Stock Trailer, 3 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 11104, 281, 7420),
(37, '36x6BT3A', '36\' x 6\' Stock Trailer, 3 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 11664, 296, 7050),
(38, '36x6HT3A', '36\' x 6\' Stock Trailer, 3 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 11888, 301, 7425),
(39, '36x6FT3A', '36\' x 6\' Stock Trailer, 3 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 12224, 309, 7895),
(40, '40x7BT3A', '40\' x 7\' Stock Trailer, 3 Axle, Standard Sides, Bow Top, Rear Butterfly Gate, Color: ', 18310.53, 325, 0),
(41, '40x7HT3A', '40\' x 7\' Stock Trailer, 3 Axle, Standard Sides, 1/2 Top, Rear Butterfly Gate, Color: ', 18581.01, 331, 0),
(42, '40x7FT3A', '40\' x 7\' Stock Trailer, 3 Axle, Standard Sides, Full Top, Rear Butterfly Gate, Color: ', 18986.73, 340, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `celular` varchar(10) NOT NULL,
  `photo` text NOT NULL,
  `rol` int(11) NOT NULL,
  `sistema` varchar(1) NOT NULL,
  `intentos` int(11) NOT NULL,
  `activo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `email`, `celular`, `photo`, `rol`, `sistema`, `intentos`, `activo`) VALUES
(1, 'rick', '123', 'Ricardo Urbina N.', 'rickyurbina@gmail.com', '', '', 0, 'A', 0, 'S'),
(3, 'rene', '123', 'Rene Friesen', 'rene@gmail.com', '6251230000', '', 1, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `vents`
--

CREATE TABLE `vents` (
  `id` int(11) NOT NULL,
  `codigo` varchar(16) NOT NULL,
  `descEnglish` varchar(70) NOT NULL,
  `descEspanol` varchar(70) NOT NULL,
  `precio` float NOT NULL,
  `horas` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vents`
--

INSERT INTO `vents` (`id`, `codigo`, `descEnglish`, `descEspanol`, `precio`, `horas`) VALUES
(1, '2 - BS', '2 - Vents Behind Spare', '2 - Vents Atras de Llanta Extra', 68, 0.5),
(2, '2 - UN', '2 - Vents Under Neck Into Saddle Box', '2 - Vents En Frente Abajo Del Ganso', 68, 0.5),
(3, '2 - PSD', '2 - Vents On Passenger Side Door', '2 - Vents En Puerta Lado Pasajero', 68, 0.5),
(4, '2 - DSD', '2 - Vents On Driverside Door', '2 - Vents En Puerta Lado Chofer', 68, 0.5),
(5, '2 - BS & 2 - PSD', '2 - Vents Behind Spare & 2 - Vents On Passenger Side Door', '2 - Vents Atras Llanta Extra y 2 - Vents En Puerta Lado Pasajero', 136, 1),
(6, '2 - BS & 2 - DSD', '2 - Vents Behind Spare & 2 - Vents On Driverside Door', '2 - Vents Atras Llanta Extra y 2 - Vents En Puerta Lado Chofer', 136, 1),
(7, '2 - BS & 2 - UN', '2 - Vents Behind Spare & 2 - Vents Under Neck Into Saddle Box', '2 - Vents Atras Llanta Extra y 2 - Vents En Frente Abajo Del Ganso', 136, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lonas`
--
ALTER TABLE `lonas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNo`);

--
-- Indexes for table `paridad`
--
ALTER TABLE `paridad`
  ADD PRIMARY KEY (`moneda`);

--
-- Indexes for table `saddles`
--
ALTER TABLE `saddles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailers`
--
ALTER TABLE `trailers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modelo` (`codigo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vents`
--
ALTER TABLE `vents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lonas`
--
ALTER TABLE `lonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `saddles`
--
ALTER TABLE `saddles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trailers`
--
ALTER TABLE `trailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vents`
--
ALTER TABLE `vents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
