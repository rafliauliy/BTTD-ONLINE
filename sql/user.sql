-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jun 2024 pada 14.33
-- Versi server: 10.6.16-MariaDB-cll-lve
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6627429_kal_bttd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_wa` varchar(50) NOT NULL,
  `role` enum('vendor','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_perusahaan`, `nama`, `alamat`, `username`, `email`, `no_telp`, `no_wa`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(29, 'PT Jaya Baya Logistics', 'gawang setyawan', 'Cilegon', 'gawang', 'gawang@gmail.com', '081902123121', '0891221312122', 'vendor', '$2y$10$CeEBq.yi09iKBZhvsWVnYeXbXPs5civAh0pdXn1eVwGHj9Jyw0I4C', 1707463656, 'bf5f4af00b0fd0a7341c7c7c04bdb844.png', 1),
(39, 'CV. ANUGERAH JAYA MANDIRI', '', '', 'user123', '', '', '', 'vendor', '$2y$10$udOG.v2fDVx.UkPk3hS3LOz9UTTwnLArdg7YbGgoCtOgZW.1txvu.', 1711437872, 'user.png', 1),
(40, 'PT Krakatau Argo Logistics', 'Admin BTTD KAL', 'Cilegon', 'Administrator', 'admin@krakatau-argologistics.com', '081808685989', '081808685989', 'admin', '$2y$10$O.06VF.iRJzvCMHUbAo5I.mm.HvOdDqn8ssFzBae2fgW1M/7b3Fw6', 1711438768, '880e84ab9f44d8e7922e59213ccc2f64.png', 1),
(42, 'CV. GALANG PRASTYA', '', '', 'customer456', '', '', '', 'vendor', '$2y$10$Eek6jrRNnl6O7QPeFQdMuemSLxtCDeeBjxeNuV6/6IoHpQpCMDuBm', 1711439274, 'user.png', 1),
(43, 'CV. HARIZA COLLECTION', '', '', 'accountrr', '', '', '', 'vendor', '$2y$10$Zjnq6B9L7wXkU3IriGBztucsUxl9xdSpggw3brnXyLPnArKlJgnKK', 1711439303, 'user.png', 1),
(44, 'CV. JAYA PRATAMA MANDIRI', '', '', 'techsupport', '', '', '', 'vendor', '$2y$10$fl9ZX2OS02zHBDvjADddZ.Q3wO2ec4OgugFbyCgwpYWuKVcVxez5S', 1711439334, 'user.png', 1),
(45, 'CV. KAWASAN STEEL', '', '', 'finance101', '', '', '', 'vendor', '$2y$10$s2oNfCc5GCDeYqzkAVsfBOTN3v/uQJ7Wml1D3DtuzL2mdBFvFNRX.', 1711439388, 'user.png', 1),
(46, 'CV. KOTA BARU', 'KOTA BARU', 'BUMI PANGGUNGRAWI INDAH BLOK A.I NO.3 , PANGGUNGRA', 'admin007', 'kotabaru.pajak@gmail.com', '081299174095', '', 'vendor', '$2y$10$RQ27YqqSpP6VZsX6wQz1Su1e9nwvj0Wpd7elimekLIiaCx9R8QdHq', 1711439435, '60d5438b1de1e055c0a70097d992f38f.png', 1),
(47, 'CV. LATANSA PARADISO', '', '', 'client999', '', '', '', 'vendor', '$2y$10$DyLKhUNzeE8cfS4/q33EieFJKozZK9BOstpk/pRoh4smqB7jq0dFK', 1711439464, 'user.png', 1),
(48, 'CV. MAHADEWI', '', '', 'manager2027', '', '', '', 'vendor', '$2y$10$9AtXsE9S4Zcx0F3pBkNA5eKo08y4aXk4M84Tvwjhdnx7mHYWGvJk2', 1711439492, 'user.png', 1),
(49, 'CV. MANUNGGAL KARYA CIPTA', '', '', 'member333', '', '', '', 'vendor', '$2y$10$1/PxqyITMulw6Ca0WKPCo..Xsd0CU/JdzB8SLx9YbNQN7/M8aJ7t.', 1711439523, 'user.png', 1),
(50, 'CV. PIJAR BINTANG', '', '', 'staff777', '', '', '', 'vendor', '$2y$10$LtVS4HaaphgiIqKzwrGLa.jacHNoegnRUL.0bDwu/kNKp7PwJPhHq', 1711439551, 'user.png', 1),
(51, 'CV. SELARAS LINTAS TEKHNIK', 'SUWARDI', 'Jl. Raya Cisoka Talaga Selapajang Cisoka Tangerang', 'usr555', 'selaraslintastekhnik@gmail.com', '082125875549', '082125875549', 'vendor', '$2y$10$GJ0FBR2L.ZpOWdLswBYBuuNFYo2Jj.OWwSgVJH/H1BD1FfpU8lfc2', 1711439581, '1f4eaafe804808e0675e3a08a7e4eb68.jpg', 1),
(52, 'CV. SINAR BERDIKARI KREASINDO', '', '', 'consultant', '', '', '', 'vendor', '$2y$10$va2mlSSfHALD8tvqjadikeTNeTFedfrU5EC86TL9v9sTPxCjVMeVe', 1711439617, 'user.png', 1),
(53, 'KAP PAUL HADIWINATA, HIDAJAT, ARSONO, RETNO, PALIL', '', '', 'developer22', '', '', '', 'vendor', '$2y$10$tqtijxwWSpmVlbYsd.alU.RInxmvp203h130ViBHPseVLE/nOiPY2', 1711439646, 'user.png', 1),
(54, 'KJPP ERICK, RIKARNADI DAN REKAN', '', '', 'tester44', '', '', '', 'vendor', '$2y$10$BWXCmoGHXrHzoGAj4.brC.MRUQo95CUXSPFJErwN1BC7XQiRS998a', 1711439678, 'user.png', 1),
(55, 'KJPP FEBRIMAN SIREGAR DAN REKAN', '', '', 'analyst999', '', '', '', 'vendor', '$2y$10$zCc1RppVB/gyzh.HsxOtbuhJE8P7Agp3dn36YBeN6jUPbUlBZxfqW', 1711439703, 'user.png', 1),
(56, 'KOPERASI KEMANDIRIAN LOGISTICS', '', '', 'marketer007', '', '', '', 'vendor', '$2y$10$MLGhXvPjGwasJL6EEaFwvOclCHcC54UL.Adf9ihAmVgoXMuoXCGu6', 1711439734, 'user.png', 1),
(57, 'PT. ABETA MULTI SEJAHTERA', '', '', 'hr20236', '', '', '', 'vendor', '$2y$10$2.8SmYSshpC5IIGBc3Qi2uBeKbhoZbfguQ6lYm2AV.B6CGfWSQ6bq', 1711439782, 'user.png', 1),
(58, 'PT. ACS INDONESIA REGISTRASI', '', '', 'designer21', '', '', '', 'vendor', '$2y$10$bZQQYCOLAYE5Eb4V9hQzbOitppKXo/zXqw3eOKLMRtLk30jBZ0Ucy', 1711439811, 'user.png', 1),
(59, 'PT. ADIL JAYA', '', '', 'support011', '', '', '', 'vendor', '$2y$10$PkUSmwSe2bjFDb4JqviFx.KgC7yhpR/LYTX1DbALAV5YsAXbAJ.ae', 1711439843, 'user.png', 1),
(60, 'PT. ALAS JAWADWIPA NUSANTARA', '', '', 'assistant89', '', '', '', 'vendor', '$2y$10$ic79BXLQS6G4kPnetK9KsOMfUJt668/qWKurz6RdeF03HkChbfEgC', 1711439875, 'user.png', 1),
(61, 'PT. ANGGUN ADI SENTOSA', '', '', 'supervisor5', '', '', '', 'vendor', '$2y$10$1CjCo./Hugs0DTj6epkJfOK7bXi2tDiPD6msBzMilNGUWht..yUzi', 1711439921, 'user.png', 1),
(62, 'PT. ANNISA RIZKI JAYA BERSAMA', '', '', 'user5432', '', '', '', 'vendor', '$2y$10$hM1D0LhLLI3sXmvYDf8Fh.pe2iWoJ6RAUJVXxBPY4RXz9z7wDiIyW', 1711439957, 'user.png', 1),
(63, 'PT. ARIYA AGUNG LOGISTIK', '', '', 'consumer32', '', '', '', 'vendor', '$2y$10$ec8qaF0PcOmP9QeTiAsdSu6zR0PqIZc/Pl6RoA5bZUtoQilAMnhHC', 1711439999, 'user.png', 1),
(64, 'PT. ASOKA WAJA WISESA', '', '', 'client090', '', '', '', 'vendor', '$2y$10$0UVO6rVkSkcuoXfZ3/GtFe9n9a/Emp75lLUgl74kcYpoyc36nRn/u', 1711440048, 'user.png', 1),
(65, 'PT. ASTRA INTERNATIONAL TBK', '', '', 'guest123', '', '', '', 'vendor', '$2y$10$6CKhYsZSAEb3Sl85d2I9ieXshKMtJSOckeg8tOqzhsuLz/tCBDTni', 1711440073, 'user.png', 1),
(66, 'PT. ASURANSI INTRA ASIA', '', '', 'operator5', '', '', '', 'vendor', '$2y$10$E0/Q0hUcY4pP7iZdpVsl8OA7mtE3MuoJtRfAfqwcwGBC65AEI67A.', 1711440106, 'user.png', 1),
(67, 'PT. ASURANSI RAMAYANA TBK', '', '', 'reception', '', '', '', 'vendor', '$2y$10$xSWpGjunUY1RiNwgACdhC.ca6vgt7CqXsNJDNlt7ETp75B5zUUol2', 1711440134, 'user.png', 1),
(68, 'PT. BAHTERA SUMBER MAKMUR', '', '', 'subscriber', '', '', '', 'vendor', '$2y$10$BmsIvarkeIDlvQr/gw1QXe8CNzFg05lyyAQDteiAYwAIAtBZHbfpq', 1711440176, 'user.png', 1),
(69, 'PT. BATUTA EKSPEDISI LOGISTIK', '', '', 'student20249', '', '', '', 'vendor', '$2y$10$9b3h8hJtHJWo33xnBP.0uO17kpuzkn.FN.wicGdNdUUAvQ9pNfY/i', 1711440206, 'user.png', 1),
(70, 'PT. BCS LOGISTICS', 'Purnomo', 'Jl Raya Merak KM 115 Kel. Rawa Arum Kec. Gerogol K', 'reader112', 'purnomo@bcs-logistics.co.id', '0254570555', '082310314533', 'vendor', '$2y$10$yMAKe1e6U34BZFDSbRS29efC5nIkv66dE6XXdxyXnX1St4aZnVsPC', 1711440237, 'user.png', 1),
(71, 'PT. BDO BISNIS SOLUSI INDONESIA', '', '', 'writer222', '', '', '', 'vendor', '$2y$10$XeHeu.qMcOiRSai/4lQSo.hifFRfy.IljOSCuErU2Zhl0ZGJ03J9y', 1711440264, 'user.png', 1),
(72, 'PT. BIMARUNA JAYA', '', '', 'editor333', '', '', '', 'vendor', '$2y$10$/H8AAh2w1rq7UK65OhsNoO/MG5fto8T24DozhFPQW8PJMARAccr8u', 1711440292, 'user.png', 1),
(73, 'PT. BINABUSANA INTERNUSA', '', '', 'researcher5', '', '', '', 'vendor', '$2y$10$WwBnGUA1FLmjSyR4jv07NOPRPKMKV17mTTKZ3pXPd/Oky3dHPsD/.', 1711440323, 'user.png', 1),
(74, 'PT. BUCINDO MITRA SINERGI', '', '', 'librarian7', '', '', '', 'vendor', '$2y$10$JgFBm2a86WAajQXHp21kU.T6M/3LfZF16206bUBBE4cTXVKF0Nkrq', 1711440346, 'user.png', 1),
(75, 'PT. CAKRA BUANA EKA SENTOSA', 'Enda Kurniawan', 'JL. Lingkar selatan Blok B42 No.2C Cibeber Kota Ci', 'CBES', 'marketing@cakrabuanaekasentosa.id', '08121201613', '08121201613', 'vendor', '$2y$10$8dq0MwD43AK8AflwSHLASuQ.G2K6BbCnAWZtBpGKOw7BfpeSEb6va', 1711440373, 'user.png', 1),
(76, 'PT. CALIFILARD PRIMA INDONESIA', '', '', 'teacher111', '', '', '', 'vendor', '$2y$10$5HZrY1y..yvyp1fRIGYkKuBo.v3sEq3yF0cpO0etF/NBYtp9EwR2y', 1711440395, 'user.png', 1),
(77, 'PT. CATUR PUTRA PRATAMA', '', '', 'professor99', '', '', '', 'vendor', '$2y$10$j/iEYzi8AgrQ8t9.OfH.n..FFe8DY2XS0au4KYRnWiw2PTuSJ0w/q', 1711440419, 'user.png', 1),
(78, 'PT. CENTRA QUALITA', '', '', 'principal01', '', '', '', 'vendor', '$2y$10$mAwopOr81PzUINIFazBnQeHuViNu.6Y/GisvEYn3ZptKxaduQZt5m', 1711440446, 'user.png', 1),
(79, 'PT. CILEGON CITRA PERKASA', '', '', 'student1234', '', '', '', 'vendor', '$2y$10$r2W6aqYpID4FVjsaCuQHKeMkg1/BlEqG6Y.ZxECgYmWq5MLrCgFxy', 1711440470, 'user.png', 1),
(80, 'PT. CIPTA GUNA LESTARI', '', '', 'learner789', '', '', '', 'vendor', '$2y$10$XB4pm9rMqDQXXZH8o8UP2eT1DKSe/7VMafYc5GH8fEd20/MTT.QFi', 1711440491, 'user.png', 1),
(81, 'PT. DAEDONG MACHINERY', '', '', 'trainer345', '', '', '', 'vendor', '$2y$10$zxbpcEsbJayqO1aIdZVbh.j269W1IdMkCbuVsm2gzZtv.PMLpWqBa', 1711440515, 'user.png', 1),
(82, 'PT. DAEKYONG PLANTEC', '', '', 'trainee678', '', '', '', 'vendor', '$2y$10$EpZV8ZlcxuuJmH98B8wF9O0wZQIujPPaskDuE5drVuGucsEzfo2HW', 1711440538, 'user.png', 1),
(83, 'PT. DAKAR ESHAN ABADI', 'Abdul Rohim', 'Jl. Promoter 3, no.61A Lengkong Gudang Timur Kec. ', 'DEA', 'abdulrohim@ptdakar.com', '085233331089', '085233331089', 'vendor', '$2y$10$zT/9XEHLz47sQCgXeoWBJ.FXBOoQL9E6HXZHsNbIYKfehCY4HZnju', 1711440558, 'user.png', 1),
(84, 'PT. ELIM SEJAHTERA TRANSINDO', '', '', 'shareholder', '', '', '', 'vendor', '$2y$10$p2QrkItngVLeZMyN/cUZguRAxg7..ZVfVA44Zt6RLto3hQE1J8VeC', 1711440582, 'user.png', 1),
(85, 'PT. ETICON REKAYASA TEKNIK', '', '', 'investor333', '', '', '', 'vendor', '$2y$10$pcaonaN13/4ylf1kdrKDie8D3UjCQgy60oxi2W3gultT7wTsD1AJ.', 1711440609, 'user.png', 1),
(86, 'PT. FADIL DAMAR PUTRA', '', '', 'stakeholder', '', '', '', 'vendor', '$2y$10$Am7ORo21/q7evngZXCN0VuXlNb95OEGP7ckPfONJ9KjjzD8RBgNpa', 1711440632, 'user.png', 1),
(87, 'PT. GLORIA MINING PERKASA', '', '', 'member909', '', '', '', 'vendor', '$2y$10$JuuU199loWaMxTNmUnmp0eI9.Wzf/zqbXZPSF9ZfHQi280iazzvOW', 1711440659, 'user.png', 1),
(88, 'PT. HAFIS NURYATAMA KONSTRUKSI', '', '', 'alpha456', '', '', '', 'vendor', '$2y$10$7HcLQu6ip72pPzg6oBuQ.e.gz0qnse2S1Ig0xw9wBk0jW7HLMrpJe', 1711440682, 'user.png', 1),
(89, 'PT. HAMASA MESH', '', '', 'beta789', '', '', '', 'vendor', '$2y$10$Gon0u7fQ8YDpXKJjj.hJHuDK95EgHGDFzssu/CMhyYWeXE78J12jK', 1711440710, 'user.png', 1),
(90, 'PT. HIBAINDO ARMADA MOTOR', '', '', 'gamma321', '', '', '', 'vendor', '$2y$10$muIh2uMznVOb5zbOGNGkrOxYGHLwMPUn57XSEU3Cd9Sk/tCmd4/Pm', 1712039304, 'user.png', 1),
(91, 'PT. HUSNI PUTRA MANDIRI', '', '', 'delta654', '', '', '', 'vendor', '$2y$10$M1DZr8QWSpbk0zPEyT.aTO2m4Eif4y17rf1fcXYQmGQqqW4bbt5vW', 1712039326, 'user.png', 1),
(92, 'PT. HUTOMO TATA MANDIRI', '', '', 'epsilon987', '', '', '', 'vendor', '$2y$10$9Xgsyda37qSVwt4v8p/x/.cF.nbATWAcTaNIAIUN.j2elt8iyZsZO', 1712039345, 'user.png', 1),
(93, 'PT. INDOBARUNA BULK TRANSPORT', '', '', 'zeta123', '', '', '', 'vendor', '$2y$10$E9WKajc0yr8DruW73JUKnO4B7ZudYnaLpwPhNxX02yfeKyRDxN23O', 1712039367, 'user.png', 1),
(94, 'PT. INDOMOBIL PRIMA ENERGI', '', '', 'eta456', '', '', '', 'vendor', '$2y$10$UxPOBBMUM1UpDDDK2G409udbB3PrhW3bati6Lx4Qa8slkjlsHtKMu', 1712039413, 'user.png', 1),
(95, 'PT. INTERNATIONAL TOTAL SERVICE & LOGISTICS', '', '', 'theta789', '', '', '', 'vendor', '$2y$10$w9/0V9asd99JqcsvH0vebuK5bM1DS8./g/U2SxAfx2.LKHiWiC1xa', 1712039441, 'user.png', 1),
(96, 'PT. INTI PERSADA MANDIRI', '', '', 'iota321', '', '', '', 'vendor', '$2y$10$aiJBBhFdpg4kruK3bSaaR.sXz1wn8/C1m2rM8Kt6wEBAnXGDaNnwa', 1712039463, 'user.png', 1),
(97, 'PT. INTILINTAS MEGA MANDALA', 'MICELINA', 'RUKO TONGKOL NO. 6 Y PADEMANGAN JAKARTA UTARA', 'kappa654', 'pt.imm.jkt@gmail.com', '6917458', '08561502379', 'vendor', '$2y$10$q35PulPMLKHmvW51GUHksONtY8EjJYQG3D152q6jVMfwHFd9VMJh.', 1712039492, 'user.png', 1),
(98, 'PT. IRON BIRD', '', '', 'lambda987', '', '', '', 'vendor', '$2y$10$PkzFR/SDTyAlz8rC5XKWlO3DVAbf1Wz7m9RCiaj2VaILi99xeJdmK', 1712039518, 'user.png', 1),
(99, 'PT. JAYAMAS ABADI', '', '', 'mu123', '', '', '', 'vendor', '$2y$10$aOGAuwYPdR8MDdOdYlOkoePKpsKl8aUMvjrUUiQLYRAu2lXpiHZaO', 1712039543, 'user.png', 1),
(100, 'PT. KARYA NUSA GLOBAL', '', '', 'omicron321', '', '', '', 'vendor', '$2y$10$srkylC9jC1CBoz9edZg9bu6.wlEtRwe3G886bhs4xGm3qYLpLo4F6', 1712039577, 'user.png', 1),
(101, 'PT. KARYA TRANSPORT ABADI', '', '', 'pi654', '', '', '', 'vendor', '$2y$10$O3DrjFhO7UWJI1Wpn.KUhutBF1gFC42xvbFy2o0tzU/yn1lxCy482', 1712039599, 'user.png', 1),
(103, 'PT. KAWAN LAMA SEJAHTERA', '', '', 'sigma123', '', '', '', 'vendor', '$2y$10$oP5awlOFvVmVPbJA/aFKweENaillYvkbU8DMPRJQSy6/96j2glkzG', 1712039645, 'user.png', 1),
(104, 'PT. KAWAN LAMA SOLUSI', '', '', 'tau456', '', '', '', 'vendor', '$2y$10$uD/hr643DSnQOPe5kPUPWetPvu.UrZ.m01fvfZUFPkLFTWQSYntiy', 1712039667, 'user.png', 1),
(105, 'PT. KHAIDAR UTAMA TRANSPORTASI', '', '', 'upsilon987', '', '', '', 'vendor', '$2y$10$wgZYkPuXAu71GjhhjHBRBePxfEP.wOQEzX2K9l6F99HTrKrp.FfBG', 1712039690, 'user.png', 1),
(106, 'PT. KRAKATAU BANDAR SAMUDERA', '', '', 'chi456', '', '', '', 'vendor', '$2y$10$yK4vAnZXyHtsWY8m0ImZYuBI7u1YwGYNTgKIeWBEpYYkv/ivacFGm', 1712039710, 'user.png', 1),
(107, 'PT. KRAKATAU CHANDRA ENERGI', '', '', 'psi987', '', '', '', 'vendor', '$2y$10$C6MaqU3CG4FLdRHc9aM/G.PWdPllZI69RCMLj.moQCX.XSN/dvyBu', 1712039741, 'user.png', 1),
(108, 'PT. KRAKATAU JASA LOGISTIK', 'HARMADI SURYA', 'Gedung 1 Area Perkantoran PT Krakatau Engineering,', 'useralpha', 'KEUANGAN.KJLCLG@GMAIL.COM', '0254396375', '6285219893569', 'vendor', '$2y$10$aJa.Sp9VyzTjYuAgmuPk/O9ekZU4G6B/rbJH16gTr57Dgl3vvYMN6', 1712039805, 'user.png', 1),
(109, 'PT. KRAKATAU JASA SAMUDERA', '', '', 'userbeta', '', '', '', 'vendor', '$2y$10$y.6uKRGYLtY9y4lx1m/TEuqkG6yPJTWDdQuATfdYXJvScoa4Vve5u', 1712039826, 'user.png', 1),
(110, 'PT. KRAKATAU MEDIKA', '', '', 'usergamma', '', '', '', 'vendor', '$2y$10$2BV8KSWCfcxcgyXQLcxCouNY4poIZolS/wccXgbJMJeIgU0GgNXKW', 1712039849, 'user.png', 1),
(111, 'PT. KRAKATAU PERBENGKELAN & PERAWATAN', '', '', 'userdelta', '', '', '', 'vendor', '$2y$10$4AKWcIjyovOVVm51pauN8uuNpHZ88m0rJ2.n0zzNtpLm.Lw7TTXHe', 1712039872, 'user.png', 1),
(112, 'PT. KRAKATAU POSCO', '', '', 'userepsilon', '', '', '', 'vendor', '$2y$10$B30o2QHJ1.ZaAYor9ZhI1ONaO0E0nsqvBEoJD/azlaTCMjrO9pyz2', 1712039900, 'user.png', 1),
(113, 'PT. KRAKATAU SAMUDERA SOLUSI', '', '', 'userzeta', '', '', '', 'vendor', '$2y$10$6Yvk.35/t/HJlmdJYCBYq.8zpzA.X2Dc1EgsiD0sLiY08vgOFy43C', 1712039926, 'user.png', 1),
(114, 'PT. KRAKATAU SARANA ENERGI', '', '', 'usereta', '', '', '', 'vendor', '$2y$10$JMs6yI2S658egtLbfSiyPOsgYXz3lekIcY516pXfkpgGKwyty.6uy', 1712039949, 'user.png', 1),
(115, 'PT. KRAKATAU SARANA PROPERTI', '', '', 'useriota', '', '', '', 'vendor', '$2y$10$.l9roN02SmehdxU2uWuPpuRY/rThld..7Gk0b6.5dxgTtU5JMVWtS', 1712039980, 'user.png', 1),
(116, 'PT. KRAKATAU SEMEN INDONESIA', '', '', 'userkappa', '', '', '', 'vendor', '$2y$10$BnFdBZ812mmn8DXrIDoISezbF8W2Sx2hNZ7n1OMfTMq7zE1bd4gPe', 1712040006, 'user.png', 1),
(117, 'PT. KRAKATAU STEEL', '', '', 'userlambda', '', '', '', 'vendor', '$2y$10$8qoQ3mp5CEL1SMw70R2WoO1lfWY/DuQigndHjrTU2uvHMQslU4oFq', 1712040064, 'user.png', 1),
(118, 'PT. LINGGA PERKASA JAYA LINE', '', '', 'usermu', '', '', '', 'vendor', '$2y$10$Pgc4iYK/q67Qx.Pi.YpbxOrtIj0SWU1.qw/LU28I7ukeeHTlUOWq2', 1712040098, 'user.png', 1),
(119, 'PT. LINTAS HARAPAN MANDIRI', '', '', 'usernu', '', '', '', 'vendor', '$2y$10$YzCC6WJHhVcLuO10WS/tHehMJQq760CHSfVlvj6fSsBQX162uRIPG', 1712040124, 'user.png', 1),
(120, 'PT. LTA DIESEL ENGINE SERVICE', '', '', 'userxi', '', '', '', 'vendor', '$2y$10$gpBA3L/HYhOxjfr5vYD6.eDd.4ymPRXXDylNsLMsFAG5Yn67345iq', 1712040156, 'user.png', 1),
(121, 'PT. MAHAKARYA BUMI', '', '', 'useromicron', '', '', '', 'vendor', '$2y$10$HbQzIuu1epLXouy2SJwoeOURD3U/2VBsTv0V/KtQOJLlmcIXlb1Iq', 1712040184, 'user.png', 1),
(122, 'PT. MANDIRI JAYA PERKASA UTAMA', '', '', 'userpi', '', '', '', 'vendor', '$2y$10$0Ie5Nk.fgZWVtHOY6cvPJOIivy.K2bKvCIMKNrFfXoidic0Ycxzm2', 1712040208, 'user.png', 1),
(123, 'PT. MANGGALA SARANA UTAMA', '', '', 'userrho', '', '', '', 'vendor', '$2y$10$9mQz3BvGN/2TBnHnVgaMT.Qp4jcJMWsuf/hj6/UioDv7Vu41mO7rW', 1712040231, 'user.png', 1),
(124, 'PT. MITRA BERSAMA SUKMA PERKASA', '', '', 'usersigma', '', '', '', 'vendor', '$2y$10$eFOx7e2Rt6qLnOd2SV/pvOzp8HKz.GjWvuZKRrTeRAZkyZIV34tte', 1712040259, 'user.png', 1),
(125, 'PT. MITRA KENCANA MANDIRI ENTERTAINMENT', '', '', 'usertau', '', '', '', 'vendor', '$2y$10$WE3zAzwuoIISVLDQUaFdBedoY0dBs5DrbKezrjqfRh/Jjp.Pa0X7y', 1712040281, 'user.png', 1),
(126, 'PT. MULTI GUNA EQUIPMENT', '', '', 'userchi', '', '', '', 'vendor', '$2y$10$ikPL6gyWoQCG3UMAAoTrmuZOCkUQBU9v5vvPzQMVT8.2Qewoce2QW', 1712040330, 'user.png', 1),
(127, 'PT. MUTIARA MAJU BERSAMA', '', '', 'userpsi', '', '', '', 'vendor', '$2y$10$wzjK8FdpKWw4/0PArxz3X.XsvmaXi8Civ6Qxd0n8f47NXfsZc6pgi', 1712040405, 'user.png', 1),
(128, 'PT. NIPPON JENSINDO', '', '', 'useromega', '', '', '', 'vendor', '$2y$10$9F2X3i7h/XFC0eGDTTCiyuh35LG5Kut96Pqfp/skhUEFc7TAyRJQe', 1712040434, 'user.png', 1),
(129, 'PT. ONGLEN MULTI PERSADA', '', '', 'user52', '', '', '', 'vendor', '$2y$10$aifk0wrCNuMSPMBDWMz9MOOqScP/deRI7nRQHQH/tulJBGs/0U9N.', 1712040488, 'user.png', 1),
(130, 'PT. PADUMACOM KARYA JAYA', '', '', 'user53', '', '', '', 'vendor', '$2y$10$AwGscxY.IBkAukQ3GK4WueQlBKCTYF/NUjmJ0f./9JVxm/NuPPV9e', 1712040519, 'user.png', 1),
(131, 'PT. PELITA GLOBAL LOGISTIK', '', '', 'user54', '', '', '', 'vendor', '$2y$10$RYe6yLQdKknsryVKHW3rauiwI3.CjSAN.SV/BuL1MLkyR2MHAbHB6', 1712040555, 'user.png', 1),
(132, 'PT. PK GLOBAL INDONESIA', '', '', 'user55', '', '', '', 'vendor', '$2y$10$DG3we8./2LcHyC5X/RDcAe.8IGpn./PSPf54EI0j4WZeAzAoIMigy', 1712040578, 'user.png', 1),
(133, 'PT. POROS LOGISTIK INDONESIA', '', '', 'user56', '', '', '', 'vendor', '$2y$10$SgRcovZ3IGa6HlELpAHpCuUwPuOe2YLbzknWCVSdKYtewyZCIVakW', 1712040600, 'user.png', 1),
(134, 'PT. POWOO E&C INDONESIA', '', '', 'user57', '', '', '', 'vendor', '$2y$10$f8iiqqGJlG7mEkPrTGL5ueIafjIwrS6yCxJVgxl6pCrfy6UQXzIRK', 1712040673, 'user.png', 1),
(135, 'PT. KARYA USAHA TRANSPORT', '', '', 'rho987', '', '', '', 'vendor', '$2y$10$iU.hWBSE9XqSDEIaudrXSehgPB1uAK8MCvKvZsqb7yC/.TdAXUMXG', 1712040786, 'user.png', 1),
(136, 'PT. PRATAMA GALUH PERKASA', '', '', 'user58', '', '', '', 'vendor', '$2y$10$LiiwSYW13CPrGWHBJfv/I.Vv78c5XA5Ea.3gTdXnhNeEv8akiO2H.', 1712040856, 'user.png', 1),
(137, 'PT. PRATAMA MANDIRI MULYA', '', '', 'user59', '', '', '', 'vendor', '$2y$10$hbWvfXWzS58rcJ4O3/pwAuIgjksmepJjkE6O3mEpvgJmaVPE9RRda', 1712040885, 'user.png', 1),
(138, 'PT. PRISMA HORISON SURYATAMA', '', '', 'user60', '', '', '', 'vendor', '$2y$10$zQtpSDKkY7LwEgt43FzTc.lkDYbl0D48/RoJeofoRgspY.TbMjRVW', 1712040907, 'user.png', 1),
(139, 'PT. PUNINAR JAYA', 'Wawa', 'Jl. Raya Cakung Cilincing KM 1,5 Jakarta Timur, 13', 'Puninar', 'ho-billing@puninar.com', '4602278', '082114475151', 'vendor', '$2y$10$pCrlW8hRdQw4FCwPxIp/neDG.3FWY8q8cKTEcUQRPmRUz1tIL91Ka', 1712040928, 'user.png', 1),
(140, 'PT. PUTRA RAYA INDO JAVA', '', '', 'user62', '', '', '', 'vendor', '$2y$10$0K2cPb8FXowKP3gQh/rb3.x5fEkRCrNtqSdidLx6CgftgegJiSsI2', 1712040952, 'user.png', 1),
(141, 'PT. PUTRA SIMEULUE CUT', '', '', 'user63', '', '', '', 'vendor', '$2y$10$.6CgwCuTVpHa34HOwiFTHuxR9r8u4g6y7/2gH9OUKvfId7v2LxJeS', 1712040977, 'user.png', 1),
(142, 'PT. PUTRA SUMBER ALAM', '', '', 'user64', '', '', '', 'vendor', '$2y$10$GNavgETtdvYZJuh5Cgn1mOqEFuTDDvUdG3Vx72GiDsVMGwAxM4wUu', 1712041005, 'user.png', 1),
(143, 'PT. PUTRI BANTEN PANGAN', '', '', 'user65', '', '', '', 'vendor', '$2y$10$4quZ6QNm.YBaf3TVxp6e8.Y9uQiDKBP8sE4c9i/zp5YbiJYtgGNnC', 1712041055, 'user.png', 1),
(144, 'PT. RODA MAS PERKASA', '', '', 'user66', '', '', '', 'vendor', '$2y$10$CRhzyUO6tku351HgF9KZUuAyzriGSjbBwPyEez.TgEPYHuOctjbKC', 1712041080, 'user.png', 1),
(145, 'PT. SABA TRANSINDO', '', '', 'user67', '', '', '', 'vendor', '$2y$10$i2/.Zs73NkZYMgC0/wCXZuzkwZgZ/HTnS0TFwgJEE3CvRledkdCAG', 1712041118, 'user.png', 1),
(146, 'PT. SAMUDERA ADLYS LOGISTIK', 'Rayhana Aisyah', 'Komp. Ruko Cilegon Highway Blok A No. 4, Jl. Raya ', 'user68', 'rayhana.aisyah@samudera-bahana.com', '02548494333', '081298124515', 'vendor', '$2y$10$Gff72j49DYRmAnHAResKjeahmqaQrstVJNk.c.BiJfY.CfyBCLe3G', 1712041140, 'user.png', 1),
(147, 'PT. SAMUDERA PRATAMA MANDIRI', '', '', 'user69', '', '', '', 'vendor', '$2y$10$ZvT742eeSI2ADHEPfqPA5uh9J8wCKcxhbo0BUJ19bJo38lFw/uqBK', 1712041168, 'user.png', 1),
(148, 'PT. SAMUDRA JAYA PRATAMA', '', '', 'user70', '', '', '', 'vendor', '$2y$10$RHjGtTcSoM3TtV.zDenSQ.Sns1F7CvfZHeDn4TAGG4.ce6OWI1/pS', 1712041193, 'user.png', 1),
(149, 'PT. SAMUEL RENO CILEGON', '', '', 'user71', '', '', '', 'vendor', '$2y$10$OUFPlijhHI5e1M4fXiva4uGbWvmMGAng1Yn17NGX7LeamKmhf/mOS', 1712041223, 'user.png', 1),
(150, 'PT. SARI ASIH ARIA CEMERLANG', '', '', 'user72', '', '', '', 'vendor', '$2y$10$kPuBflJl./L5n35eDGWX4O3QfYld0/KoqNbOcHiEpmn/5VUVj8tZa', 1712041247, 'user.png', 1),
(151, 'PT. SEJAHTERA LOGISTIK ABADI', 'Nofry Silalahi', 'Jl. Raya Cakung Cilincing No.16, RT.004, RW.010, S', 'user73', 'sejahteralogistika@gmail.com', '4408275', '081376766834', 'vendor', '$2y$10$KxB8o.qUtQhPT/xANjYmuet8NUZ9QxiJDOHB.Q9xlx.zCblOz87TS', 1712041293, 'user.png', 1),
(152, 'PT. SEMEN INDONESIA LOGISTIK', '', '', 'user74', '', '', '', 'vendor', '$2y$10$M47V80I6kvXgij2kwuqgyONjRxM0UQfHpmIYJti3S4NamNzkjFAqa', 1712041322, 'user.png', 1),
(153, 'PT. SIBA SURYA', '', '', 'user76', '', '', '', 'vendor', '$2y$10$kGkRe7LebugtYzvMheudX..aQa/.1lif9dQOxMHIP2lmmOhhdXqgm', 1712041352, 'user.png', 1),
(154, 'PT. SUBENDWIPA JAYA', '', '', 'user77', '', '', '', 'vendor', '$2y$10$qvJ7CIMODe/ovViJhJT.euZZHSXeNtT/FHDZLYlt8hatmN2y8NyKS', 1712041373, 'user.png', 1),
(155, 'PT. SUMBER SAHABAT TEKNIK', '', '', 'user78', '', '', '', 'vendor', '$2y$10$EYb56J2vhRX5WkBzM4DxE.538oTG0LgHpHacF3glfEzem9DioegsS', 1712041393, 'user.png', 1),
(156, 'PT. TIKI JALUR NUGRAHA EKAKURIR', '', '', 'user79', '', '', '', 'vendor', '$2y$10$tYa9r5brA.Ypt1gUIWk7.uxr8cfdJFcYIZLxRxDA8Hj0Dqjpbs8xi', 1712041416, 'user.png', 1),
(157, 'PT. TND JAYA MANDIRI', 'Maharanni C Wohon', '', 'user80', 'admin@tndjayamandiri.com', '08111454232', '08111454232', 'vendor', '$2y$10$s6qSbpNg7tQqF1SCxQH6guw0GVLIssqVO5xTzHw/xuGucsV5Y6WEW', 1712041439, 'user.png', 1),
(158, 'PT. TRIBHAKTI INSPEKTAMA', '', '', 'user82', '', '', '', 'vendor', '$2y$10$QQCkl023Gp0ydNmDNlvljuTEq1eIC7MEx1Aj9zB7yoioFpX7BwIeq', 1712041473, 'user.png', 1),
(159, 'PT. TRIBINA PANUTAN', '', '', 'user83', '', '', '', 'vendor', '$2y$10$dhvtvW8rM.J6RO7Q83bVZODBFg9KzhsEr2tqKEBlnp5KujeMLGPSi', 1712041497, 'user.png', 1),
(160, 'PT. TRIDAYA SAKTI ASIA', '', '', 'user84', '', '', '', 'vendor', '$2y$10$3YH./h.KdUnq0wpUgMmKKuGDQtBFY1pLst/.bofeIg.WpD3kU8Cua', 1712041522, 'user.png', 1),
(161, 'PT. TRIKUSUMA JAYA PERKASA', '', '', 'user85', '', '', '', 'vendor', '$2y$10$U5.TDzW3uMGTuvBjUw2goufyBveUyGwrjAy0uHWPKTKaV.eE/QQle', 1712041544, 'user.png', 1),
(162, 'PT. TRIPUTERA CIPTA TRANSPORT', '', '', 'user86', '', '', '', 'vendor', '$2y$10$9Kzc9MoIYETPfsRLjo7oqeOuEoL9mKwaLF2ycAomuFIsmfhG2hIsK', 1712041566, 'user.png', 1),
(163, 'PT. TRISINDO ASRIKARYA', '', '', 'user87', '', '', '', 'vendor', '$2y$10$yANHTnqsgmSPaGToVSQ6O.8sqADJHvEw3PmSMvqJT5UzcuTpLpKV2', 1712041585, 'user.png', 1),
(164, 'PT. TUBAGUS JAYA MAHAKARYA', '', '', 'user88', '', '', '', 'vendor', '$2y$10$U0asIztWxGSufSeXm9QjKenUeOIAM9NxzdCWJY5p8xkuPCD8oWN/O', 1712041605, 'user.png', 1),
(165, 'PT. UNGGUL PLASTIK', '', '', 'user89', '', '', '', 'vendor', '$2y$10$BADU7jCSvxpYjCLNTIsVr.83ooF5m4nv6EWiJ0MowWCivBAsE0bm6', 1712041623, 'user.png', 1),
(166, 'PT. UNITED TRACTORS', '', '', 'user90', '', '', '', 'vendor', '$2y$10$30A4pv.Vyl9EIKZNjfWwrujlyKX13hRCajktyed3tO1voTKROI4LK', 1712041648, 'user.png', 1),
(167, 'PT. USAHA TEKNIK INDONESIA', '', '', 'user91', '', '', '', 'vendor', '$2y$10$o.3bOGrU4vAxeSovt018n.d61xqvreOWgQdmZIeP0skGpFQcmugdu', 1712041672, 'user.png', 1),
(168, 'PT. WIRYO CRANES PERKASA', '', '', 'user95', '', '', '', 'vendor', '$2y$10$5J7R5a9tg3H2s8gg1tmAJ.eO6/QA.Bj992oy0hDjtLGwsreJ92msG', 1712041700, 'user.png', 1),
(169, 'PT. WIZZY SMART TECHNOLOGY', '', '', 'user96', '', '', '', 'vendor', '$2y$10$IcATmVDcfu6C6o5eUIo2N.B2eWtG41.FBHVIOCgaQ5JwLmxZYIw9m', 1712041723, 'user.png', 1),
(170, 'PT. YULIANA INTI PERSADA', '', '', 'user97', '', '', '', 'vendor', '$2y$10$YCj9LrTdi95c0O6nHyUU.uBwC0zIEX/JCqBYeNKWELDC33kyJpCdK', 1712041742, 'user.png', 1),
(171, 'RSIA PERMATA SERDANG', '', '', 'user98', '', '', '', 'vendor', '$2y$10$EfJpcfUSXCc.5r386Hf0p.Nqk.4QqccT5thEa2YRGXe2HYX7aLdvi', 1712041765, 'user.png', 1),
(172, 'SCHEUERLE EURO', '', '', 'user99', '', '', '', 'vendor', '$2y$10$7eqWtCzsgkH.Fi9DoOxQZObnuJ0TsNNelAqu5cr5H/UJKKqWlMFfS', 1712041785, 'user.png', 1),
(173, 'TUBAGUS SYAFRIAL & AMRAN NANGASAN', '', '', 'user100', '', '', '', 'vendor', '$2y$10$W.V93NwxrOf1UwKyuG/Ju.kS3Pu.Adx3W3F8TH.06PPDw8QoMLD3m', 1712041865, 'user.png', 1),
(174, 'AP Verifikasi PT KAL', 'Ghifari Daris Al Raffi', '', 'finance03', 'ghifari.daris@krakatau-argologistics.com', '081283405160', '081283405160', 'admin', '$2y$10$X//G0SjK2VSA2iB5BojJ0Oqhz5S.REPVwd8jffh0MGvzMgYmBXueq', 1714017352, 'user.png', 1),
(175, 'Tax and AR PT KAL', 'Siti Disti Diah', '', 'finance04', 'sitidisti.diah.ptkal@gmail.com', '08176738329', '08176738329', 'admin', '$2y$10$XK3LTbokEB8PatsofVXnJOg1tT6eiSWDedei3GSKQbMZba9uu3QxW', 1714017432, 'user.png', 1),
(177, 'CV. GEMILANG SAKTI UTAMA', 'Enadang Sukarna', 'Jl. Raya Anyer Rt 02 Rw 02, Kota Cilegon', 'Gemilang2016', 'gemilangsutama@gmail.com', '081281031007', '081281031007', 'vendor', '$2y$10$5i9kZ535HqW6EImWl8CgVeXfPhG8lPFF2/BqfROcHdAx46SGGccDq', 1717987957, 'user.png', 1),
(178, 'PT. DIAN PRO CONSULTING', 'Nandra Iswahyada', 'BBS III E2 NO 05', 'DIANPRO', 'pt.dianpro@yahoo.com', '081906117422', '081906117422', 'vendor', '$2y$10$YrVXZPpXujo2T2TSRpwyRO8fbq.2XWntzfKEvsAl5WQUo95UcIV2a', 1718002375, '6cd1a60e61bfe51e990089075e079421.png', 1),
(179, 'PT. PELAYARAN NELLY DWI PUTRI', '', '', 'gamingguru', '', '', '', 'vendor', '$2y$10$vTHZjo0RKw.KTLWDTsdy1Ou/1CtU76KiOQAdK8n7cknXnu8O4Ib1O', 1718758785, 'user.png', 1),
(180, 'PT. CAKRA BUANA EKA SENTOSA 2', 'Enda Kurniawan', 'Cilegon', 'Cakrabuana', 'marketing@cakrabuanaekasentoda.id', '08121201613', '08121201613', 'vendor', '$2y$10$kFJwjszVqLJR5IvSibJ65uUvegi/GV8HSV4OeYfGO28iBHZS5/Exy', 1719298100, 'user.png', 1),
(182, 'PT. MERAK JAYA ASRI', '', '', 'apaajabisa', '', '', '', 'vendor', '$2y$10$9L6g6zCMR5jRkBO9GjCg0erJ3pmp/4lUXLx2jlGmnU1BC/lOka0Eu', 1719310608, 'user.png', 1),
(183, 'PT. CAKRA BUANA EKA SENTOSA 3', '', '', 'musiclover', '', '', '', 'vendor', '$2y$10$Q7bNZ4DZc7ueoLEZ4ytrMelpJFuh.dxZtYE0HJNcon4sKGAnZv3n.', 1719381228, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
