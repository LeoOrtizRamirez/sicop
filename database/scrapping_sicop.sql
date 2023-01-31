-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 16:54:11
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scrapping_sicop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concursos`
--

CREATE TABLE `concursos` (
  `concurso_id` int(11) NOT NULL,
  `concurso_numero_procedimiento` varchar(50) DEFAULT NULL,
  `concurso_fecha_publicacion` datetime DEFAULT NULL,
  `concurso_fecha_apertura` datetime DEFAULT NULL,
  `concurso_estado` varchar(50) DEFAULT NULL,
  `concurso_entidad_contratante` varchar(100) DEFAULT NULL,
  `concurso_enlace` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `concursos`
--

INSERT INTO `concursos` (`concurso_id`, `concurso_numero_procedimiento`, `concurso_fecha_publicacion`, `concurso_fecha_apertura`, `concurso_estado`, `concurso_entidad_contratante`, `concurso_enlace`) VALUES
(1, '2022PI-000239-0006500001', '2022-10-16 07:33:00', '2022-10-17 14:30:00', 'Adjudicación En Firme', '2022PI-000239-0006500001COMISION NACIONAL DE PREVENCION DE RIESGOS Y ATENCION DE EMERGENCIAS', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ603.jsp?cartelNo=20221002578&amp;cartelSeq=00'),
(2, '2022PI-000238-0006500001', '2022-10-16 07:28:00', '2022-10-17 14:21:00', 'Adjudicación En Firme', '2022PI-000238-0006500001COMISION NACIONAL DE PREVENCION DE RIESGOS Y ATENCION DE EMERGENCIAS', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ603.jsp?cartelNo=20221002577&amp;cartelSeq=00'),
(3, '2022PI-000237-0006500001', '2022-10-16 07:23:00', '2022-10-17 14:10:00', 'Adjudicación En Firme', '2022PI-000237-0006500001COMISION NACIONAL DE PREVENCION DE RIESGOS Y ATENCION DE EMERGENCIAS', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ603.jsp?cartelNo=20221002576&amp;cartelSeq=00'),
(4, '2022PI-000236-0006500001', '2022-10-16 07:19:00', '2022-10-17 14:00:00', 'Adjudicación En Firme', '2022PI-000236-0006500001COMISION NACIONAL DE PREVENCION DE RIESGOS Y ATENCION DE EMERGENCIAS', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ603.jsp?cartelNo=20221002575&amp;cartelSeq=00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_concursos`
--

CREATE TABLE `detalle_concursos` (
  `id_detalle_concurso` int(11) NOT NULL,
  `funcionarios_relacionados_concurso` varchar(200) NOT NULL,
  `estado_concurso` varchar(200) NOT NULL,
  `fecha_hora_publicacion` varchar(200) NOT NULL,
  `cartel` varchar(200) NOT NULL,
  `numero_procedimiento` varchar(200) NOT NULL,
  `numero_sicop_1` varchar(200) NOT NULL,
  `numero_sicop_2` varchar(200) NOT NULL,
  `nombre_institucion` varchar(200) NOT NULL,
  `concurso_confidencial` varchar(200) NOT NULL,
  `cartel_2` varchar(200) NOT NULL,
  `encargado_publicacion_gestion_objeciones_apertura` varchar(200) NOT NULL,
  `elaborador` varchar(200) NOT NULL,
  `encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion` varchar(200) NOT NULL,
  `registro_cartel` varchar(200) NOT NULL,
  `versiones_cartel` varchar(200) NOT NULL,
  `version_consulta` varchar(200) NOT NULL,
  `descripcion_procedimiento` varchar(200) NOT NULL,
  `clasificacion_objeto` varchar(200) NOT NULL,
  `tipo_procedimiento` varchar(200) NOT NULL,
  `excepcion_contratacion_directa` varchar(200) NOT NULL,
  `tipo_modalidad` varchar(200) NOT NULL,
  `tipo_recepcion_oferta` varchar(200) NOT NULL,
  `lugar_apertura` varchar(200) NOT NULL,
  `inicio_recepcion_ofertas` varchar(200) NOT NULL,
  `cierre_recepcion_ofertas` varchar(200) NOT NULL,
  `fecha_hora_apertura_oferta` varchar(200) NOT NULL,
  `plazo_adjudicacion` varchar(200) NOT NULL,
  `presupuesto_total_estimado` varchar(200) NOT NULL,
  `presupuesto_total_estimado_usd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_concursos`
--

INSERT INTO `detalle_concursos` (`id_detalle_concurso`, `funcionarios_relacionados_concurso`, `estado_concurso`, `fecha_hora_publicacion`, `cartel`, `numero_procedimiento`, `numero_sicop_1`, `numero_sicop_2`, `nombre_institucion`, `concurso_confidencial`, `cartel_2`, `encargado_publicacion_gestion_objeciones_apertura`, `elaborador`, `encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion`, `registro_cartel`, `versiones_cartel`, `version_consulta`, `descripcion_procedimiento`, `clasificacion_objeto`, `tipo_procedimiento`, `excepcion_contratacion_directa`, `tipo_modalidad`, `tipo_recepcion_oferta`, `lugar_apertura`, `inicio_recepcion_ofertas`, `cierre_recepcion_ofertas`, `fecha_hora_apertura_oferta`, `plazo_adjudicacion`, `presupuesto_total_estimado`, `presupuesto_total_estimado_usd`) VALUES
(1, 'Funcionarios relacionados con el concurso', 'Adjudicación en firme', ' 16/10/2022 07:33', 'DAVID PEREZ CASTILLO', ' 2022PI-000239-0006500001', '20221002578', '00', 'COMISION NACIONAL DE PREVENCION DE RIESGOS Y ATENCION DE EMERGENCIAS', ' No', '', 'DAVID PEREZ CASTILLO', 'DAVID PEREZ CASTILLO', 'DAVID PEREZ CASTILLO', ' Registro', ' ', ' 20221002578-00', 'Alquiler de maquinaria pesada para atender emergencia en el cantón Upala, distrito San José, río Niño, sector San José centro, RC 2-13-038', ' SERVICIOS', 'CONTRATACIÓN ESPECIAL', ' Contratación por Emergencia no Declarada, Ley Nacional de Emergencias y Prevención del Riesgo N°8488', ' En línea', '16/10/2022 08:00', '', '17/10/2022 14:30', '', '', ' ', '', ''),
(2, 'Funcionarios relacionados con el concurso', 'Adjudicación en firme', ' 16/10/2022 07:28', 'DAVID PEREZ CASTILLO', ' 2022PI-000238-0006500001', '20221002577', '00', 'COMISION NACIONAL DE PREVENCION DE RIESGOS Y ATENCION DE EMERGENCIAS', ' No', '', 'DAVID PEREZ CASTILLO', 'DAVID PEREZ CASTILLO', 'DAVID PEREZ CASTILLO', ' Registro', ' ', ' 20221002577-00', 'Alquiler de maquinaria pesada para atender emergencia en el cantón de Golfito, Sector La esperanza,  reconstrucción de dique en ambos márgenes.', ' SERVICIOS', 'CONTRATACIÓN ESPECIAL', ' Contratación por Emergencia no Declarada, Ley Nacional de Emergencias y Prevención del Riesgo N°8488', ' En línea', '16/10/2022 08:00', '', '17/10/2022 14:21', '', '', ' ', '', ''),
(3, 'Funcionarios relacionados con el concurso', 'Adjudicación en firme', ' 16/10/2022 07:23', 'DAVID PEREZ CASTILLO', ' 2022PI-000237-0006500001', '20221002576', '00', 'COMISION NACIONAL DE PREVENCION DE RIESGOS Y ATENCION DE EMERGENCIAS', ' No', '', 'DAVID PEREZ CASTILLO', 'DAVID PEREZ CASTILLO', 'DAVID PEREZ CASTILLO', ' Registro', ' ', ' 20221002576-00', 'Alquiler de maquinaria para el cantón de Golfito, Río Claro, Sector Las cavernitas, Recava de Río , rehabilitación de camino cantonal y mejorar dique', ' SERVICIOS', 'CONTRATACIÓN ESPECIAL', ' Contratación por Emergencia no Declarada, Ley Nacional de Emergencias y Prevención del Riesgo N°8488', ' En línea', '16/10/2022 08:00', '', '17/10/2022 14:10', '', '', ' ', '', ''),
(4, 'Funcionarios relacionados con el concurso', 'Adjudicación en firme', ' 16/10/2022 07:19', 'DAVID PEREZ CASTILLO', ' 2022PI-000236-0006500001', '20221002575', '00', 'COMISION NACIONAL DE PREVENCION DE RIESGOS Y ATENCION DE EMERGENCIAS', ' No', '', 'DAVID PEREZ CASTILLO', 'DAVID PEREZ CASTILLO', 'DAVID PEREZ CASTILLO', ' Registro', ' ', ' 20221002575-00', 'Alquiler de maquinaria para el cantón de Golfito, Río Claro, Sector Las Vegas , Recava de Río , rehabilitación de camino cantonal y mejorar dique.', ' SERVICIOS', 'CONTRATACIÓN ESPECIAL', ' Contratación por Emergencia no Declarada, Ley Nacional de Emergencias y Prevención del Riesgo N°8488', ' En línea', '16/10/2022 08:00', '', '17/10/2022 14:00', '', '', ' ', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlace_detalle_concursos`
--

CREATE TABLE `enlace_detalle_concursos` (
  `id` int(11) NOT NULL,
  `concurso_numero_procedimiento` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enlace_detalle_concursos`
--

INSERT INTO `enlace_detalle_concursos` (`id`, `concurso_numero_procedimiento`, `nombre`, `link`) VALUES
(1, '2022PI-000239-0006500001', 'historial_modificaciones_cartel', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ604.jsp?cartelNo=20221002578&amp;cartelSeq=00'),
(2, '2022PI-000239-0006500001', 'consulta_notificaciones', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ724.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;instCartelNo= 2022PI-000239-0006500001'),
(3, '2022PI-000239-0006500001', 'historial_modificaciones_presupuesto', 'https://www.sicop.go.cr/moduloBid/etc/EP_ETJ_EXQ876.jsp?cartelNo=20221002578&amp;cartelSeq=00'),
(4, '2022PI-000239-0006500001', 'funcionarios_relacionados_concurso', 'https://www.sicop.go.cr/moduloBid/common/co/EpUserAuthList.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate='),
(5, '2022PI-000239-0006500001', 'aplicacion_sistema', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ625.jsp?isView=Y&amp;progId=coq603&amp;cartelNo=20221002578&amp;cartelSeq=00&amp;isPopup='),
(6, '2022PI-000239-0006500001', 'solicitud_aclaracion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_POI018.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;biddocTypeCd=XM'),
(7, '2022PI-000239-0006500001', 'consulta_aclaracion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_COQ015.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;isPopup='),
(8, '2022PI-000239-0006500001', 'detalle_partida', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=1'),
(9, '2022PI-000239-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=1'),
(10, '2022PI-000239-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=2'),
(11, '2022PI-000239-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=3'),
(12, '2022PI-000239-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=4'),
(13, '2022PI-000239-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=5'),
(14, '2022PI-000239-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=6'),
(15, '2022PI-000239-0006500001', 'Partida 1_ofertar', 'https://www.sicop.go.cr/moduloOferta/servlet/oferta/EP_OTV_PNA100?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=Partida1'),
(16, '2022PI-000239-0006500001', 'Partida 1_resultado_apertura', 'https://www.sicop.go.cr/moduloOferta/servlet/search/EP_SEV_COQ622?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=Partida1&amp;cartelProgressCd=01'),
(17, '2022PI-000239-0006500001', 'Partida 1_motivo_anulacion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXA011.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=Partida1'),
(18, '2022PI-000239-0006500001', 'Partida 1_resultado_evaluacion', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ607.jsp?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelCate=Partida1&amp;cartelProgressCd=01'),
(19, '2022PI-000239-0006500001', 'Documentos del cartel: TDRS Upala, San José.pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelVersion=1610202273319&amp;docFileSeqno=1&amp;loginYn=N&amp;cmd=downloadFile'),
(20, '2022PI-000239-0006500001', 'Documentos del cartel: Upala- 2 Informe de situacion CME 10-10- Firmado (1).pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelVersion=1610202273319&amp;docFileSeqno=2&amp;loginYn=N&amp;cmd=downloadFile'),
(21, '2022PI-000239-0006500001', 'Documentos del cartel: Solicitud_San José_Firma (1).pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelVersion=1610202273319&amp;docFileSeqno=3&amp;loginYn=N&amp;cmd=downloadFile'),
(22, '2022PI-000239-0006500001', 'Documentos del cartel: OFICIO GESTION VIAL 811-2022_Compromiso Geólogo (1).pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelVersion=1610202273319&amp;docFileSeqno=4&amp;loginYn=N&amp;cmd=downloadFile'),
(23, '2022PI-000239-0006500001', 'Documentos del cartel: DA-GRH-0042-Obra Menor por Primer Impacto_Río Niño, sector San José (1).pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002578&amp;cartelSeq=00&amp;cartelVersion=1610202273319&amp;docFileSeqno=5&amp;loginYn=N&amp;cmd=downloadFile'),
(24, '2022PI-000239-0006500001', '_resultado_solicitud_verificacion', 'https://www.sicop.go.cr/moduloBid/common/review/EpExamReqListQ.jsp?cartelNo=20221002578&amp;cartelCate=&amp;retVal=EXQ861&amp;beforeBtnYn=Y'),
(25, '2022PI-000239-0006500001', '_condiciones_declaraciones', 'https://www.sicop.go.cr/moduloOferta/oferta/EP_OTJ_PNQ031.jsp?isView=Y&amp;cartelNo=20221002578&amp;cartelSeq=00'),
(26, '2022PI-000239-0006500001', '_listado', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?cateId=&amp;proceType=&amp;biddocRcvYn=Y&amp;regDtTo=&amp;regDtFrom=&amp;instNm=&amp;prodUnitUserYn=&amp;openbidDtTo=15%2F12%2F2022&amp;pr'),
(27, '2022PI-000238-0006500001', 'historial_modificaciones_cartel', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ604.jsp?cartelNo=20221002577&amp;cartelSeq=00'),
(28, '2022PI-000238-0006500001', 'consulta_notificaciones', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ724.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;instCartelNo= 2022PI-000238-0006500001'),
(29, '2022PI-000238-0006500001', 'historial_modificaciones_presupuesto', 'https://www.sicop.go.cr/moduloBid/etc/EP_ETJ_EXQ876.jsp?cartelNo=20221002577&amp;cartelSeq=00'),
(30, '2022PI-000238-0006500001', 'funcionarios_relacionados_concurso', 'https://www.sicop.go.cr/moduloBid/common/co/EpUserAuthList.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate='),
(31, '2022PI-000238-0006500001', 'aplicacion_sistema', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ625.jsp?isView=Y&amp;progId=coq603&amp;cartelNo=20221002577&amp;cartelSeq=00&amp;isPopup='),
(32, '2022PI-000238-0006500001', 'solicitud_aclaracion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_POI018.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;biddocTypeCd=XM'),
(33, '2022PI-000238-0006500001', 'consulta_aclaracion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_COQ015.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;isPopup='),
(34, '2022PI-000238-0006500001', 'detalle_partida', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=1'),
(35, '2022PI-000238-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=1'),
(36, '2022PI-000238-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=2'),
(37, '2022PI-000238-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=3'),
(38, '2022PI-000238-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=4'),
(39, '2022PI-000238-0006500001', 'Partida 1_ofertar', 'https://www.sicop.go.cr/moduloOferta/servlet/oferta/EP_OTV_PNA100?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=Partida1'),
(40, '2022PI-000238-0006500001', 'Partida 1_resultado_apertura', 'https://www.sicop.go.cr/moduloOferta/servlet/search/EP_SEV_COQ622?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=Partida1&amp;cartelProgressCd=01'),
(41, '2022PI-000238-0006500001', 'Partida 1_motivo_anulacion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXA011.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=Partida1'),
(42, '2022PI-000238-0006500001', 'Partida 1_resultado_evaluacion', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ607.jsp?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelCate=Partida1&amp;cartelProgressCd=01'),
(43, '2022PI-000238-0006500001', 'Documentos del cartel: TDRS Golfito, Sector La Esperanza.pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelVersion=1610202272829&amp;docFileSeqno=1&amp;loginYn=N&amp;cmd=downloadFile'),
(44, '2022PI-000238-0006500001', 'Documentos del cartel: Solicitud de Emergencias No Declaradas rio Claro.pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelVersion=1610202272829&amp;docFileSeqno=2&amp;loginYn=N&amp;cmd=downloadFile'),
(45, '2022PI-000238-0006500001', 'Documentos del cartel: Golfito- 03 INFORME AFECTACION LA ESPERANZA DE RIO CLARO- Firmado (4) (1).pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002577&amp;cartelSeq=00&amp;cartelVersion=1610202272829&amp;docFileSeqno=3&amp;loginYn=N&amp;cmd=downloadFile'),
(46, '2022PI-000238-0006500001', '_resultado_solicitud_verificacion', 'https://www.sicop.go.cr/moduloBid/common/review/EpExamReqListQ.jsp?cartelNo=20221002577&amp;cartelCate=&amp;retVal=EXQ861&amp;beforeBtnYn=Y'),
(47, '2022PI-000238-0006500001', '_condiciones_declaraciones', 'https://www.sicop.go.cr/moduloOferta/oferta/EP_OTJ_PNQ031.jsp?isView=Y&amp;cartelNo=20221002577&amp;cartelSeq=00'),
(48, '2022PI-000238-0006500001', '_listado', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?cateId=&amp;proceType=&amp;biddocRcvYn=Y&amp;regDtTo=&amp;regDtFrom=&amp;instNm=&amp;prodUnitUserYn=&amp;openbidDtTo=15%2F12%2F2022&amp;pr'),
(49, '2022PI-000237-0006500001', 'historial_modificaciones_cartel', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ604.jsp?cartelNo=20221002576&amp;cartelSeq=00'),
(50, '2022PI-000237-0006500001', 'consulta_notificaciones', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ724.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;instCartelNo= 2022PI-000237-0006500001'),
(51, '2022PI-000237-0006500001', 'historial_modificaciones_presupuesto', 'https://www.sicop.go.cr/moduloBid/etc/EP_ETJ_EXQ876.jsp?cartelNo=20221002576&amp;cartelSeq=00'),
(52, '2022PI-000237-0006500001', 'funcionarios_relacionados_concurso', 'https://www.sicop.go.cr/moduloBid/common/co/EpUserAuthList.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate='),
(53, '2022PI-000237-0006500001', 'aplicacion_sistema', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ625.jsp?isView=Y&amp;progId=coq603&amp;cartelNo=20221002576&amp;cartelSeq=00&amp;isPopup='),
(54, '2022PI-000237-0006500001', 'solicitud_aclaracion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_POI018.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;biddocTypeCd=XM'),
(55, '2022PI-000237-0006500001', 'consulta_aclaracion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_COQ015.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;isPopup='),
(56, '2022PI-000237-0006500001', 'detalle_partida', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=1'),
(57, '2022PI-000237-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=1'),
(58, '2022PI-000237-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=2'),
(59, '2022PI-000237-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=3'),
(60, '2022PI-000237-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=4'),
(61, '2022PI-000237-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=5'),
(62, '2022PI-000237-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=6'),
(63, '2022PI-000237-0006500001', 'Partida 1_ofertar', 'https://www.sicop.go.cr/moduloOferta/servlet/oferta/EP_OTV_PNA100?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=Partida1'),
(64, '2022PI-000237-0006500001', 'Partida 1_resultado_apertura', 'https://www.sicop.go.cr/moduloOferta/servlet/search/EP_SEV_COQ622?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=Partida1&amp;cartelProgressCd=01'),
(65, '2022PI-000237-0006500001', 'Partida 1_motivo_anulacion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXA011.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=Partida1'),
(66, '2022PI-000237-0006500001', 'Partida 1_resultado_evaluacion', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ607.jsp?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelCate=Partida1&amp;cartelProgressCd=01'),
(67, '2022PI-000237-0006500001', 'Documentos del cartel: TDRS Golfito, Río Claro.pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelVersion=1610202272358&amp;docFileSeqno=1&amp;loginYn=N&amp;cmd=downloadFile'),
(68, '2022PI-000237-0006500001', 'Documentos del cartel: MG-SPI-CNE-28-2022- Río Claro- Sector las Cavernitas distrito Guaycara.pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelVersion=1610202272358&amp;docFileSeqno=2&amp;loginYn=N&amp;cmd=downloadFile'),
(69, '2022PI-000237-0006500001', 'Documentos del cartel: Golfito- 03 INFORME AFECTACION LA ESPERANZA DE RIO CLARO- Firmado (11).pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002576&amp;cartelSeq=00&amp;cartelVersion=1610202272358&amp;docFileSeqno=3&amp;loginYn=N&amp;cmd=downloadFile'),
(70, '2022PI-000237-0006500001', '_resultado_solicitud_verificacion', 'https://www.sicop.go.cr/moduloBid/common/review/EpExamReqListQ.jsp?cartelNo=20221002576&amp;cartelCate=&amp;retVal=EXQ861&amp;beforeBtnYn=Y'),
(71, '2022PI-000237-0006500001', '_condiciones_declaraciones', 'https://www.sicop.go.cr/moduloOferta/oferta/EP_OTJ_PNQ031.jsp?isView=Y&amp;cartelNo=20221002576&amp;cartelSeq=00'),
(72, '2022PI-000237-0006500001', '_listado', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?cateId=&amp;proceType=&amp;biddocRcvYn=Y&amp;regDtTo=&amp;regDtFrom=&amp;instNm=&amp;prodUnitUserYn=&amp;openbidDtTo=15%2F12%2F2022&amp;pr'),
(73, '2022PI-000236-0006500001', 'historial_modificaciones_cartel', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ604.jsp?cartelNo=20221002575&amp;cartelSeq=00'),
(74, '2022PI-000236-0006500001', 'consulta_notificaciones', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ724.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;instCartelNo= 2022PI-000236-0006500001'),
(75, '2022PI-000236-0006500001', 'historial_modificaciones_presupuesto', 'https://www.sicop.go.cr/moduloBid/etc/EP_ETJ_EXQ876.jsp?cartelNo=20221002575&amp;cartelSeq=00'),
(76, '2022PI-000236-0006500001', 'funcionarios_relacionados_concurso', 'https://www.sicop.go.cr/moduloBid/common/co/EpUserAuthList.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate='),
(77, '2022PI-000236-0006500001', 'aplicacion_sistema', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ625.jsp?isView=Y&amp;progId=coq603&amp;cartelNo=20221002575&amp;cartelSeq=00&amp;isPopup='),
(78, '2022PI-000236-0006500001', 'solicitud_aclaracion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_POI018.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;biddocTypeCd=XM'),
(79, '2022PI-000236-0006500001', 'consulta_aclaracion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_COQ015.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;isPopup='),
(80, '2022PI-000236-0006500001', 'detalle_partida', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=1'),
(81, '2022PI-000236-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=1'),
(82, '2022PI-000236-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=2'),
(83, '2022PI-000236-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=3'),
(84, '2022PI-000236-0006500001', 'detalle_linea', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=1&amp;cateSeqno=4'),
(85, '2022PI-000236-0006500001', 'Partida 1_ofertar', 'https://www.sicop.go.cr/moduloOferta/servlet/oferta/EP_OTV_PNA100?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=Partida1'),
(86, '2022PI-000236-0006500001', 'Partida 1_resultado_apertura', 'https://www.sicop.go.cr/moduloOferta/servlet/search/EP_SEV_COQ622?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=Partida1&amp;cartelProgressCd=01'),
(87, '2022PI-000236-0006500001', 'Partida 1_motivo_anulacion', 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXA011.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=Partida1'),
(88, '2022PI-000236-0006500001', 'Partida 1_resultado_evaluacion', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ607.jsp?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelCate=Partida1&amp;cartelProgressCd=01'),
(89, '2022PI-000236-0006500001', 'Documentos del cartel: TDRS Golfito, Río Claro.pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelVersion=161020227197&amp;docFileSeqno=1&amp;loginYn=N&amp;cmd=downloadFile'),
(90, '2022PI-000236-0006500001', 'Documentos del cartel: MG-SPI-CNE-26-2022- Río Claro- Sector la Escuela las Vegas distrito Guaycara.pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelVersion=161020227197&amp;docFileSeqno=2&amp;loginYn=N&amp;cmd=downloadFile'),
(91, '2022PI-000236-0006500001', 'Documentos del cartel: Golfito- 03 INFORME AFECTACION LA ESPERANZA DE RIO CLARO- Firmado (10).pdf', 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=20221002575&amp;cartelSeq=00&amp;cartelVersion=161020227197&amp;docFileSeqno=3&amp;loginYn=N&amp;cmd=downloadFile'),
(92, '2022PI-000236-0006500001', '_resultado_solicitud_verificacion', 'https://www.sicop.go.cr/moduloBid/common/review/EpExamReqListQ.jsp?cartelNo=20221002575&amp;cartelCate=&amp;retVal=EXQ861&amp;beforeBtnYn=Y'),
(93, '2022PI-000236-0006500001', '_condiciones_declaraciones', 'https://www.sicop.go.cr/moduloOferta/oferta/EP_OTJ_PNQ031.jsp?isView=Y&amp;cartelNo=20221002575&amp;cartelSeq=00'),
(94, '2022PI-000236-0006500001', '_listado', 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?cateId=&amp;proceType=&amp;biddocRcvYn=Y&amp;regDtTo=&amp;regDtFrom=&amp;instNm=&amp;prodUnitUserYn=&amp;openbidDtTo=15%2F12%2F2022&amp;pr');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `concursos`
--
ALTER TABLE `concursos`
  ADD PRIMARY KEY (`concurso_id`);

--
-- Indices de la tabla `detalle_concursos`
--
ALTER TABLE `detalle_concursos`
  ADD PRIMARY KEY (`id_detalle_concurso`);

--
-- Indices de la tabla `enlace_detalle_concursos`
--
ALTER TABLE `enlace_detalle_concursos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `concursos`
--
ALTER TABLE `concursos`
  MODIFY `concurso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_concursos`
--
ALTER TABLE `detalle_concursos`
  MODIFY `id_detalle_concurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `enlace_detalle_concursos`
--
ALTER TABLE `enlace_detalle_concursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
