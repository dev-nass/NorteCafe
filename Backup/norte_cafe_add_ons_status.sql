-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 05:47 PM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `norte_cafe`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `(0)_truncate_tables_COTU` ()   BEGIN
    -- Disable foreign key checks to avoid constraint issues
    SET FOREIGN_KEY_CHECKS = 0;

    -- Truncate each table individually
    TRUNCATE TABLE carts;
    TRUNCATE TABLE orders;
    TRUNCATE TABLE transactions;
    TRUNCATE TABLE users;

    -- Re-enable foreign key checks
    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `(1)_user_Seeder` ()   INSERT INTO users (user_id, first_name, last_name, username, email, password, contact_number, gender, age, date_of_birth, role, house_number, street, barangay, city, province, region, postal_code, available, verified, created_at) VALUES
(1, 'Amanda', 'Johnson', 'user1', 'user1@example.com','$2b$12$85YobYNDO3Ma1/H8.iaSn.5uG9WZ7NfV0xgBstnQN1oaMejEpMmye', '618-940-3317x88465', 'Female', 38, '1987-02-20', 'Customer', '554', 'Brandi Rue', 'College', 'Port Miguelland', 'Rhode Island', 'Region IV-A', '7083', NULL, 1, '2020-06-07 17:35:22'),
(2, 'Cheyenne', 'Bauer', 'user2', 'user2@example.com', '$2b$12$KHAcArSw6uEUFvqHGSAhk.Q2K1Q/t1YV2O2iIFc2P7cjZqzVGDd.S', '001-142-075-0815x8772', 'Female', 35, '1989-08-02', 'Customer', '579', 'Timothy Island', 'Could', 'South Pamela', 'Nebraska', 'Region IV-A', '7375', NULL, 1, '2015-11-20 18:27:52'),
(3, 'Adriana', 'Hendricks', 'user3', 'user3@example.com', '$2b$12$0SAaA4hNCktLfQes9ptlZe4C6Gzgzz.wJryjcSVHqAVx4EDNgXSPO', '538-673-1901x68321', 'Male', 51, '1974-03-17', 'Customer', '373', 'Rodney Manors', 'From', 'Andrewside', 'Utah', 'Region IV-A', '4271', NULL, 1, '2016-09-12 06:04:38'),
(4, 'Nicole', 'Rice', 'user4', 'user4@example.com', '$2b$12$muJWEGoUbq/X/z2ZMchR5.2AsMhfX/vaEzuNB8To2599LYrDlSfF.', '001-994-824-6774x264', 'Female', 31, '1993-10-07', 'Customer', '684', 'Carolyn Isle', 'More', 'New Ericview', 'Wyoming', 'Region IV-A', '3234', NULL, 1, '2015-10-03 02:37:19'),
(5, 'Jennifer', 'Nguyen', 'user5', 'user5@example.com', '$2b$12$v8N/vsQQX/5pVNOIAgO/recnfCwHAcigroJKsOFUaDCMPS/Ym7l1e', '109-498-1049', 'Male', 25, '1999-09-11', 'Customer', '14', 'Conner Spur', 'Local', 'New Toniview', 'Indiana', 'Region IV-A', '5413', NULL, 1, '2021-02-26 19:59:28'),
(6, 'Christopher', 'Ward', 'user6', 'user6@example.com', '$2b$12$AC8G4UgeHyZ95bJSqXU6YeG1ywYUIxCihvEuo5uiltEx9PFF8exh6', '(497)021-5884x68481', 'Female', 43, '1981-06-19', 'Customer', '515', 'Crane Dale', 'Really', 'West Williamfurt', 'Texas', 'Region IV-A', '2536', NULL, 1, '2019-01-13 17:54:06'),
(7, 'Karen', 'Brock', 'user7', 'user7@example.com', '$2b$12$Lifs9Yk4QhwH.XwtdoNw2ek1OHF2IXMz.m0p4P/yZepptgwzVJgnK', '+1-903-298-3318x964', 'Female', 58, '1966-08-04', 'Customer', '921', 'Victor Tunnel', 'Husband', 'Clarkshire', 'South Dakota', 'Region IV-A', '7068', NULL, 1, '2024-10-29 10:59:28'),
(8, 'Sarah', 'Jackson', 'user8', 'user8@example.com', '$2b$12$AqbhyqXK8LyHtdqG7cEVYuelviN90erehIctYT219m9kQA0b1ceOa', '001-004-400-3730', 'Female', 60, '1965-04-09', 'Customer', '596', 'Rodriguez Ville', 'Ten', 'Torresview', 'Connecticut', 'Region IV-A', '4440', NULL, 1, '2022-05-08 08:01:17'),
(9, 'Ashlee', 'Moon', 'user9', 'user9@example.com', '$2b$12$NXNo/GRPrdQYZzuJlRrm..6YF4HyMxnTMj94MHMoiR/zv4ary89aS', '+1-891-795-6472x2081', 'Male', 35, '1989-10-29', 'Customer', '969', 'Vaughn Mission', 'Red', 'Parkertown', 'Kentucky', 'Region IV-A', '5522', NULL, 1, '2021-04-27 15:56:49'),
(10, 'Amy', 'Proctor', 'user10', 'user10@example.com', '$2b$12$j/.QnmPKkfdpYrMwaqBmXe/./crarT6wH.ZKtZr4NucmteOIsrbH2', '575.472.2716', 'Female', 26, '1999-03-17', 'Customer', '635', 'Maddox Valleys', 'Interest', 'Lake Valerie', 'Pennsylvania', 'Region IV-A', '3126', NULL, 1, '2021-12-26 03:29:06'),
(11, 'William', 'Gallegos', 'user11', 'user11@example.com', '$2b$12$YykAai81xVwEbbxf4FpTwO.lQ3VeW4KMEl/AnRTNAYKhTv9FbdzrG', '+1-288-970-8528', 'Female', 59, '1965-11-05', 'Customer', '172', 'Michael Point', 'Price', 'Wendyview', 'Arizona', 'Region IV-A', '3150', NULL, 1, '2020-10-25 18:10:27'),
(12, 'Anna', 'Jones', 'user12', 'user12@example.com', '$2b$12$SfGqMLPgZamytEtBxlgBNuJsIXPFbWIcM6Haj36xWFMI3O0P7AfMa', '001-588-805-9788', 'Male', 39, '1986-02-23', 'Customer', '53', 'Richmond Junction', 'Make', 'Daleborough', 'Oklahoma', 'Region IV-A', '8593', NULL, 1, '2023-09-17 00:44:37'),
(13, 'Tanya', 'Taylor', 'user13', 'user13@example.com', '$2b$12$tR7PzoPsrFInUl2U.a87ouayrIh.ZSha2Sd.CVoXyNgrj6RQZ6jUC', '8893742555', 'Male', 56, '1969-02-05', 'Employee', '975', 'Gloria Creek', 'Become', 'New Sarahaven', 'Utah', 'Region IV-A', '7349', NULL, 1, '2015-07-20 17:49:36'),
(14, 'Kristin', 'Mann', 'user14', 'user14@example.com', '$2b$12$WDrJGIpYNxA1dBLbW/BsJeNVxYEV48b7VQOgPGGPoovLK1xyxjeR.', '+1-090-171-2480x06211', 'Female', 25, '1999-07-12', 'Customer', '16', 'Jennifer Circle', 'Participant', 'Joelborough', 'Maryland', 'Region IV-A', '9936', NULL, 1, '2018-07-31 00:35:57'),
(15, 'Maurice', 'Chaney', 'user15', 'user15@example.com', '$2b$12$gCEg04zO2ueEJP3b481vAOBs2Evb0iij0QAz.Ol0eFS7ESdG/IG0q', '718-928-4979', 'Female', 32, '1992-11-18', 'Customer', '635', 'Evans Point', 'Course', 'Knoxview', 'Maine', 'Region IV-A', '5961', NULL, 1, '2015-05-30 19:45:03'),
(16, 'Dennis', 'Maynard', 'user16', 'user16@example.com', '$2b$12$JfDdD2hwq2edX9GKf0cQh.Zp0cvFVsWxFHesFJvb/kHKPSUFP6V3u', '985-913-9380x38925', 'Male', 49, '1976-01-14', 'Customer', '860', 'Pittman Haven', 'Measure', 'Bradleytown', 'New Jersey', 'Region IV-A', '8115', NULL, 1, '2021-06-03 12:44:30'),
(17, 'David', 'Fuentes', 'user17', 'user17@example.com', '$2b$12$e0TkpDimyX8lthrSQngzfOzCrR7NevUbMHNwsKtTc3Hc3YF6Uhvhm', '741-757-0246x028', 'Female', 25, '1999-06-16', 'Customer', '42', 'Moody Via', 'Or', 'Kirkhaven', 'West Virginia', 'Region IV-A', '8687', NULL, 1, '2016-10-13 19:05:43'),
(18, 'Kevin', 'Robinson', 'user18', 'user18@example.com', '$2b$12$Z2yraWpABHjlE1HNpz3gWuyFsMCgKQI6Csv82pPuNhipe.Z.D5Bme', '229.448.2133x1058', 'Female', 59, '1965-08-14', 'Customer', '856', 'Aaron Forges', 'Few', 'East Matthew', 'Florida', 'Region IV-A', '7069', NULL, 1, '2021-05-09 17:19:47'),
(19, 'David', 'Cain', 'user19', 'user19@example.com', '$2b$12$98s.xc9q/mp1Bt.wYF.qBOgtuFjj6HByN2Op1YUlEfjysuiOQRVsa', '783-742-6467', 'Female', 26, '1998-09-29', 'Customer', '140', 'King Course', 'Human', 'Chelseyville', 'Nebraska', 'Region IV-A', '3197', NULL, 1, '2019-10-27 09:40:33'),
(20, 'Joseph', 'Kennedy', 'user20', 'user20@example.com', '$2b$12$cM5zwCBnZBPe2fil/TR9YuRSZK8vE5.ny0kvezlO5Vzi/7M0BHnV6', '(443)088-5068x99148', 'Male', 42, '1982-06-01', 'Customer', '610', 'Sweeney Knolls', 'Discover', 'South Jack', 'Georgia', 'Region IV-A', '5504', NULL, 1, '2015-06-12 13:19:42'),
(21, 'Sarah', 'Nguyen', 'user21', 'user21@example.com', '$2b$12$uyUSkiAt6F2Bwgn4lP6YeeWvDoMLdiijKL2BZh.AVenP8tJyfNdte', '8809548134', 'Male', 45, '1979-05-13', 'Customer', '747', 'Kylie Avenue', 'Fund', 'Nicolemouth', 'Michigan', 'Region IV-A', '3954', NULL, 1, '2020-08-11 15:48:23'),
(22, 'Mark', 'Alvarez', 'user22', 'user22@example.com', '$2b$12$26G0iPEMjRHJgdar5H.HUeEgRXejYimBpZ5NSVQQFnkykF7AW51by', '795.537.1562x201', 'Male', 50, '1974-07-03', 'Customer', '977', 'Roberts Prairie', 'Store', 'West Sarahburgh', 'Louisiana', 'Region IV-A', '4500', NULL, 1, '2020-07-06 04:46:50'),
(23, 'Emily', 'Chambers', 'user23', 'user23@example.com', '$2b$12$TJJeAPxy5c48wz4Cp3NT9OtU.TcscLeAkaTWQcKMQ.HQJb33JY84m', '585.291.6681x846', 'Male', 30, '1995-02-04', 'Customer', '71', 'Garrett Spur', 'North', 'South Anitafurt', 'Virginia', 'Region IV-A', '5755', NULL, 1, '2016-04-24 09:55:44'),
(24, 'Laura', 'Hernandez', 'user24', 'user24@example.com', '$2b$12$2MVTYPd0zFJ3U.WTDSf.ievC9w.rqMayNXZk.Mu0aeICuLXSkiCe.', '045.668.0799', 'Male', 24, '2000-05-05', 'Employee', '764', 'William Ports', 'Future', 'West Alan', 'Indiana', 'Region IV-A', '1362', NULL, 1, '2017-10-11 14:59:10'),
(25, 'Nichole', 'Morgan', 'user25', 'user25@example.com', '$2b$12$0vKYaCKjKOCnd5wWeh4tUOEtBhgYmlioa7hOIsvcJ4EoiQ1b1McO6', '001-405-927-7766x299', 'Female', 20, '2004-12-01', 'Employee', '642', 'Estrada Lodge', 'Time', 'Thomasmouth', 'Iowa', 'Region IV-A', '5991', NULL, 1, '2017-01-15 07:46:15'),
(26, 'Wendy', 'Stone', 'user26', 'user26@example.com', '$2b$12$9fUc8fkhgrQP2Bp8EcKK1e1gKIP3AjZS8rQcuOLaK3zhg4cig1RuO', '001-647-597-8785x61103', 'Male', 39, '1986-05-02', 'Employee', '873', 'Elizabeth Drives', 'Continue', 'North Chelsea', 'Rhode Island', 'Region IV-A', '3617', NULL, 1, '2018-12-25 09:16:51'),
(27, 'Martin', 'Young', 'user27', 'user27@example.com', '$2b$12$EFkTNV91bU2uY/bFMXW2V.LWqtuoOuIsoOv/t18hY7COJRGEait42', '958-386-8351x12883', 'Female', 26, '1998-12-17', 'Customer', '169', 'Harding Extension', 'Relate', 'Lake Tylerfort', 'Kansas', 'Region IV-A', '1424', NULL, 1, '2021-01-16 07:39:46'),
(28, 'Christy', 'Ruiz', 'user28', 'user28@example.com', '$2b$12$Ofvic2Z8Qt.4.SmpfyBfQ.dkEAnkBC1f6sBddIjY6QB9LknBnFw5m', '+1-169-877-9772x702', 'Female', 36, '1988-05-05', 'Customer', '35', 'Bryan Creek', 'Man', 'Heatherborough', 'Ohio', 'Region IV-A', '7478', NULL, 1, '2024-11-22 14:54:02'),
(29, 'Melissa', 'Barker', 'user29', 'user29@example.com', '$2b$12$4glfCwtsGpK2b43H10ChX.Ne9gvJDzhXdlBgG62Mrh417jTFlWM76', '249.912.9669', 'Female', 50, '1974-08-20', 'Customer', '23', 'Francis Ways', 'Weight', 'Nancymouth', 'Rhode Island', 'Region IV-A', '3999', NULL, 1, '2019-09-13 05:22:56'),
(30, 'Nicholas', 'Franco', 'user30', 'user30@example.com', '$2b$12$8GgNO/HlgeuzmCI2JaRa2OUqVcPtVI7dgfgcFX4k2rjnbxXWgCKVq', '+1-712-857-4195x92035', 'Female', 30, '1994-10-31', 'Customer', '874', 'Navarro Island', 'If', 'West Corey', 'Hawaii', 'Region IV-A', '8419', NULL, 1, '2022-03-11 12:49:52'),
(31, 'Jerome', 'Meyers', 'user31', 'user31@example.com', '$2b$12$1BQsc0V339PC18wgyfqy8uMJIwsCG3n09hzNGj8JpcSHcGW3pZEx6', '046.552.9005x0400', 'Male', 32, '1992-12-21', 'Customer', '778', 'Jessica Squares', 'Ball', 'North Robertstad', 'Wyoming', 'Region IV-A', '5277', NULL, 1, '2015-06-21 03:26:06'),
(32, 'Roberto', 'Gray', 'user32', 'user32@example.com', '$2b$12$YSD5cq7UrdVLSBR.6EygZOpw6OtFOkZBQg.F6X4rM1nuphc4X8Bmi', '+1-680-257-0079x593', 'Male', 18, '2006-11-10', 'Customer', '512', 'Toni Spur', 'Effort', 'Clarkborough', 'Wisconsin', 'Region IV-A', '5410', NULL, 1, '2019-09-01 20:06:28'),
(33, 'Miguel', 'Hatfield', 'user33', 'user33@example.com', '$2b$12$UkXW5zD96365ClDYNq8O8ebfqrJ5sqTgf3Pko9HIDq3WSsbQmliW.', '794.712.1059', 'Male', 37, '1988-01-31', 'Customer', '493', 'Juan Plains', 'Parent', 'Mcdanielside', 'New Jersey', 'Region IV-A', '8916', NULL, 1, '2023-03-26 02:18:53'),
(34, 'Antonio', 'Riley', 'user34', 'user34@example.com', '$2b$12$p/rhx26LyIaCmuiaqlfuoOUfd24t1h7Hc79Ni8r3GZidAvWVq37am', '795-876-5806x022', 'Male', 47, '1977-07-11', 'Customer', '886', 'Deborah Lodge', 'Find', 'Matthewmouth', 'Kentucky', 'Region IV-A', '7191', NULL, 1, '2019-07-10 23:43:30'),
(35, 'Julie', 'Parker', 'user35', 'user35@example.com', '$2b$12$VQiPwmaqVAmCyHlN.vKkseNkTqJ4krCCxCVr3muJYlzGbrDrdEfH2', '001-764-691-2755x07271', 'Female', 38, '1986-11-15', 'Employee', '323', 'Wilson Causeway', 'List', 'Ernestmouth', 'Wyoming', 'Region IV-A', '2197', NULL, 1, '2024-02-13 05:06:27'),
(36, 'Arthur', 'White', 'user36', 'user36@example.com', '$2b$12$E8wpmspiw7ODHiL8BFq8guwPta91EqsdZDJMFbwVZXan6wG4fv9pS', '9057522994', 'Female', 59, '1965-09-10', 'Customer', '541', 'Garrett Terrace', 'Bed', 'East Perry', 'Louisiana', 'Region IV-A', '5780', NULL, 1, '2022-02-10 11:55:46'),
(37, 'Kristen', 'Woods', 'user37', 'user37@example.com', '$2b$12$vnaWcvSH3j8ACov2wR3ZYeuLG19K/zwsGNHOeEw/ie0oCS7Z1QBgi', '001-045-824-8325x697', 'Male', 32, '1993-01-03', 'Customer', '188', 'Ryan Grove', 'During', 'East Rodney', 'Missouri', 'Region IV-A', '7945', NULL, 1, '2020-07-14 01:16:34'),
(38, 'Andre', 'Brown', 'user38', 'user38@example.com', '$2b$12$ueKloiH.gk94n09IosWcge8Mz3cvyyVGbbJvXMEvR/7qU9DxoTjtm', '(054)901-0416', 'Male', 27, '1997-09-07', 'Customer', '964', 'Grimes Ford', 'Building', 'Michaelville', 'Louisiana', 'Region IV-A', '9940', NULL, 1, '2016-10-08 22:29:26'),
(39, 'Leslie', 'Holmes', 'user39', 'user39@example.com', '$2b$12$NbVF/dqt2G4aXLccrsypIe8Y1c.RjhSTCRsU.z2m2FtnR46gE1DRa', '777-219-0349x329', 'Male', 32, '1993-01-11', 'Customer', '477', 'Ricky Turnpike', 'Decade', 'Port Baileyview', 'Louisiana', 'Region IV-A', '6602', NULL, 1, '2022-11-09 20:59:29'),
(40, 'Cynthia', 'Johnson', 'user40', 'user40@example.com', '$2b$12$IjMcMRHxN63x2zmwYu/N0Oyt5w8iMODaR2WF8W5YizZBMOjaoE.Mm', '777-184-3567x1705', 'Male', 31, '1993-10-27', 'Customer', '280', 'Amanda Port', 'Decide', 'Port Markborough', 'Nebraska', 'Region IV-A', '2052', NULL, 1, '2021-01-28 07:56:24'),
(41, 'Andrew', 'Murray', 'user41', 'user41@example.com', '$2b$12$r.D1zFQmDyZs1P21gBF3kOCfOVvP3CtO8qItRT.2vc.1EpFAjQJTK', '362-192-2440x25464', 'Male', 26, '1999-04-28', 'Customer', '329', 'Torres Camp', 'Nearly', 'South Tammy', 'Louisiana', 'Region IV-A', '6582', NULL, 1, '2017-02-05 02:24:12'),
(42, 'Michael', 'Hendricks', 'user42', 'user42@example.com', '$2b$12$dw/WFs5o6/BsFoBv0PDp6eq0XSrAviwV.GnFOaFAg3O7zeQ5QrywO', '396-726-5949x6388', 'Female', 25, '1999-10-14', 'Customer', '859', 'Jennifer Pine', 'Gas', 'West James', 'Michigan', 'Region IV-A', '1907', NULL, 1, '2022-08-31 09:55:37'),
(43, 'Charles', 'Schwartz', 'user43', 'user43@example.com', '$2b$12$7Ma0mpWh20WmgOl01ut14.jvxjUbrxZL/xggeYS9nqg/6d.xe7OOG', '+1-715-368-9404x680', 'Male', 43, '1981-05-26', 'Customer', '969', 'Jose Turnpike', 'Compare', 'Sarahville', 'Texas', 'Region IV-A', '8474', NULL, 1, '2019-05-11 08:00:24'),
(44, 'Lyann', 'Brown', 'user44', 'user44@example.com', '$2b$12$YxkZ7Ye3nPhxR7vmm6KdF.eybpVgdB5dNWKrRHDrkW/1NI.C7kh.K', '+1-628-843-0059x094', 'Female', 20, '2004-05-31', 'Customer', '64', 'Berg Tunnel', 'Gun', 'Jonesshire', 'New Jersey', 'Region IV-A', '9775', NULL, 1, '2023-03-05 04:23:33'),
(45, 'Rachel', 'Moore', 'user45', 'user45@example.com', '$2b$12$BLCw4oKrS4Me10LgbMOi9.4mzrmHtyPJ1miNWykixLaoIy.9w4JQC', '856.624.8094x40876', 'Female', 43, '1981-06-08', 'Customer', '647', 'Keith Coves', 'Last', 'Campbellmouth', 'Illinois', 'Region IV-A', '4664', NULL, 1, '2022-02-09 16:53:26'),
(46, 'Nathan', 'Ryan', 'user46', 'user46@example.com', '$2b$12$qXaAibLQYS8HgBzoeCD3cuLQ.bcHPai2VMxGwfiqv2FmeZmTjjPA.', '411.086.6177x4078', 'Male', 18, '2006-10-03', 'Customer', '875', 'Sherman Canyon', 'Red', 'Silvaport', 'Georgia', 'Region IV-A', '8931', NULL, 1, '2019-03-21 21:47:51'),
(47, 'Lisa', 'Lopez', 'user47', 'user47@example.com', '$2b$12$OEgJ2f.BqO8UttFLTVqk6./aVt991JGoo4crylie9PypTxhoD8le2', '(593)468-4271x925', 'Male', 25, '1999-06-11', 'Customer', '214', 'Sherri Island', 'Hand', 'Cynthiamouth', 'Washington', 'Region IV-A', '8345', NULL, 1, '2023-05-20 13:35:35'),
(48, 'Brenta', 'Moody', 'user48', 'user48@example.com', '$2b$12$bEQC9fNUvteGHiBvLDCsjudeZtlGPXjKirsZ/eiV6kVOCxEYYy51y', '001-044-284-1598x3272', 'Male', 57, '1967-10-04', 'Customer', '131', 'Jeanette Passage', 'Food', 'Hayeston', 'Arkansas', 'Region IV-A', '2989', NULL, 1, '2015-12-08 01:14:52'),
(49, 'Timothy', 'Greer', 'user49', 'user49@example.com', '$2b$12$AzmhwVDqXtPC4nfoKHGOyu/tOnXS3Mrnx9NeTqqiUMRwFaqJL.Sem', '001-928-507-7252', 'Male', 36, '1989-03-08', 'Customer', '577', 'Adam Drive', 'New', 'Schneiderfurt', 'North Dakota', 'Region IV-A', '1516', NULL, 1, '2022-12-16 10:14:17'),
(50, 'Jesus', 'Dixon', 'user50', 'user50@example.com', '$2b$12$51ndTdAijXwlQaFqfuztne/2z8QwaIBRiZrpWTdXmcPak/5XQ7rDu', '001-825-465-5519x2292', 'Male', 50, '1974-06-28', 'Customer', '609', 'Charles Island', 'Than', 'Lake Karenchester', 'Pennsylvania', 'Region IV-A', '1218', NULL, 1, '2023-10-06 01:19:59'),
(101, 'Christine', 'Meyers', 'user101', 'user101@example.com', '$2b$12$1BQsc0V339PC18wgyfqy8uMJIwsCG3n09hzNJpcSHcGW3pZEx6', '046.552.9008x0400', 'Male', 32, '1992-12-21', 'Rider', '778', 'Jessica Squares', 'Ball', 'North Robertstad', 'Wyoming', 'Region IV-A', '5277', 0, 1, '2015-06-21 03:26:06'),
(102, 'Lynn', 'Brown', 'user102', 'user102@example.com', '$2b$12$YxkZ7Ye3nPhxR7vmm6KdF.eybpVgdB5dNWKrRHDrkWI.C7kh.K', '+1-628-843-0059x594', 'Female', 20, '2004-05-31', 'Rider', '64', 'Berg Tunnel', 'Gun', 'Jonesshire', 'New Jersey', 'Region IV-A', '9775', 0, 1, '2023-03-05 04:23:33'),
(103, 'Brent', 'Moody', 'use1038', 'user103@example.com', '$2b$12$bEQC9fNUvteGHiBvLDCsjudeZtlGPXsZ/eiV6kVOCxEYYy51y', '001-044-284-1598x3272', 'Male', 57, '1967-10-04', 'Rider', '131', 'Jeanette Passage', 'Food', 'Hayeston', 'Arkansas', 'Region IV-A', '2989', 0, 1, '2015-12-08 01:14:52'),
(104, "Jennifer", "Toche", "Jennifer", "jen@gmail.com", "$2y$10$ocusM9enpQsuA9ClG5HKqOjeTX8/4VBdWpn42LgYdxxAjw9baPW0m", "09452234677", "Female", 32, "1990-10-09", "Admin", "Blk J2", "Fatima Rd", "San Simon", "Dasmariñas", "Cavite", "4A", "4114", NULL, 1, "2025-05-11 16:07:58"),
(105, "Sheree", "Maquirang", "Sheree", "sheree@gmail.com", "$2y$10$5lyAy9nhKunU.ETAL2NfjeP/6ZhpFXqSl/9.dfkHUHxD3vV.d2nRu", "09876765333", "Female", 20, "2005-01-23", "Employee", "Blk K3", NULL, "San KanaBa", "Dasmariñas", "Cavite", "4A", "4114", NULL, 1, "2025-05-11 17:12:38")$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `(2)_cart_Seeder` ()   INSERT INTO carts (cart_id, user_id, menu_item_id, menu_item_size_id, add_ons_id, quantity, order_placed) VALUES
(1, 10, 11, 17, 4, 4, 1),
(2, 31, 47, 56, 2, 5, 1),
(3, 12, 15, 81, 6, 1, 1),
(4, 40, 9, 12, 2, 2, 1),
(5, 46, 23, 8, 6, 2, 1),
(6, 45, 33, 53, 2, 2, 1),
(7, 50, 46, 62, 1, 3, 1),
(8, 47, 40, 70, 2, 3, 1),
(9, 50, 35, 38, 5, 4, 1),
(10, 19, 29, 6, 3, 2, 1),
(11, 35, 43, 29, 2, 2, 1),
(12, 30, 24, 3, 3, 3, 1),
(13, 34, 46, 87, 6, 2, 1),
(14, 35, 47, 47, 3, 4, 1),
(15, 12, 34, 61, 4, 3, 1),
(16, 30, 32, 76, 5, 1, 1),
(17, 15, 10, 47, 4, 4, 1),
(18, 47, 45, 65, 5, 5, 1),
(19, 6, 22, 35, 5, 1, 1),
(20, 26, 6, 4, 1, 2, 1),
(21, 39, 30, 20, 4, 3, 1),
(22, 14, 6, 72, 1, 3, 1),
(23, 19, 27, 64, 5, 4, 1),
(24, 20, 2, 58, 3, 3, 1),
(25, 45, 24, 44, 1, 4, 1),
(26, 48, 36, 57, 3, 5, 1),
(27, 4, 24, 60, 1, 3, 1),
(28, 20, 41, 51, 5, 4, 1),
(29, 46, 46, 65, 5, 5, 1),
(30, 18, 17, 57, 2, 4, 1),
(31, 26, 29, 23, 2, 2, 1),
(32, 24, 17, 11, 5, 5, 1),
(33, 12, 21, 82, 3, 5, 1),
(34, 12, 42, 40, 6, 4, 1),
(35, 34, 11, 54, 1, 4, 1),
(36, 50, 12, 4, 5, 5, 1),
(37, 25, 4, 63, 2, 3, 1),
(38, 15, 23, 50, 4, 5, 1),
(39, 2, 46, 49, 1, 1, 1),
(40, 3, 44, 76, 5, 1, 1),
(41, 11, 41, 11, 2, 4, 1),
(42, 20, 5, 26, 4, 3, 1),
(43, 48, 27, 62, 3, 3, 1),
(44, 35, 11, 77, 1, 3, 1),
(45, 31, 5, 81, 4, 5, 1),
(46, 13, 24, 51, 3, 1, 1),
(47, 47, 5, 8, 6, 5, 1),
(48, 46, 21, 37, 5, 3, 1),
(49, 20, 10, 88, 3, 1, 1),
(50, 5, 42, 88, 1, 2, 1),
(51, 16, 4, 37, 1, 4, 1),
(52, 27, 29, 34, 6, 4, 1),
(53, 19, 44, 23, 2, 4, 1),
(54, 5, 35, 64, 6, 3, 1),
(55, 13, 35, 77, 6, 3, 1),
(56, 19, 7, 54, 4, 4, 1),
(57, 33, 29, 28, 1, 4, 1),
(58, 1, 27, 34, 1, 5, 1),
(59, 12, 16, 29, 6, 4, 1),
(60, 34, 15, 26, 2, 5, 1),
(61, 19, 35, 63, 5, 5, 1),
(62, 34, 18, 28, 3, 2, 1),
(63, 26, 26, 56, 2, 1, 1),
(64, 26, 23, 61, 1, 4, 1),
(65, 48, 34, 27, 4, 1, 1),
(66, 8, 41, 70, 2, 5, 1),
(67, 44, 23, 68, 6, 5, 1),
(68, 11, 15, 8, 4, 3, 1),
(69, 20, 33, 71, 2, 2, 1),
(70, 7, 13, 66, 4, 2, 1),
(71, 14, 33, 80, 5, 4, 1),
(72, 24, 37, 68, 2, 5, 1),
(73, 15, 26, 37, 6, 4, 1),
(74, 28, 21, 73, 4, 2, 1),
(75, 9, 16, 86, 3, 1, 1),
(76, 18, 25, 52, 1, 2, 1),
(77, 26, 2, 80, 1, 4, 1),
(78, 37, 39, 72, 2, 2, 1),
(79, 45, 25, 86, 4, 1, 1),
(80, 41, 34, 10, 2, 4, 1),
(81, 23, 13, 62, 3, 5, 1),
(82, 33, 13, 27, 5, 2, 1),
(83, 38, 39, 2, 2, 1, 1),
(84, 44, 4, 14, 2, 5, 1),
(85, 5, 11, 21, 3, 4, 1),
(86, 7, 9, 17, 3, 4, 1),
(87, 38, 1, 20, 1, 5, 1),
(88, 16, 13, 24, 6, 4, 1),
(89, 14, 33, 68, 1, 2, 1),
(90, 41, 10, 26, 3, 5, 1),
(91, 6, 25, 16, 6, 2, 1),
(92, 29, 34, 46, 4, 1, 1),
(93, 39, 10, 33, 5, 2, 1),
(94, 11, 25, 52, 4, 5, 1),
(95, 20, 17, 48, 1, 4, 1),
(96, 3, 31, 35, 3, 4, 1),
(97, 17, 48, 28, 1, 5, 1),
(98, 31, 46, 75, 4, 2, 1),
(99, 16, 29, 55, 5, 1, 1),
(100, 50, 15, 87, 1, 3, 1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `(3)_transaction_Seeder` ()   INSERT INTO transactions (transaction_id, user_id, rider_id, discount_id, payment_method, amount_due, amount_tendered, `change`, status, created_at) VALUES
(1, 7, 101, 2, 'COD', 545.26, 604.84, 59.58, 'Delivered', '2025-03-30 06:10:27'),
(2, 45, 102, 4, 'COD', 582.5, 741.45, 158.95, 'Delivered', '2016-04-04 23:12:52'),
(3, 46, 103, 2, 'GCASH', 854.58, 889.33, 34.75, 'Delivered', '2017-05-10 03:50:20'),
(4, 41, 103, 2, 'COD', 831.76, 860.42, 28.66, 'Delivered', '2020-11-03 19:04:40'),
(5, 24, 101, 1, 'GCASH', 152.23, 333.89, 181.66, 'Delivered', '2020-01-16 05:11:24'),
(6, 15, 102, 1, 'COD', 678.26, 796.31, 118.05, 'Delivered', '2021-04-09 18:21:20'),
(7, 14, 102, 3, 'GCASH', 434.31, 445.96, 11.65, 'Delivered', '2022-11-17 19:19:52'),
(8, 35, 101, 4, 'GCASH', 920.8, 1090.22, 169.42, 'Delivered', '2018-05-21 19:28:06'),
(9, 31, 103, 2, 'GCASH', 999.55, 1110.77, 111.22, 'Delivered', '2024-04-09 04:29:23'),
(10, 18, 101, 2, 'COD', 157.41, 261.17, 103.76, 'Delivered', '2024-12-20 02:34:55'),
(11, 49, 101, 2, 'COD', 246.97, 385.3, 138.33, 'Delivered', '2021-11-03 12:21:32'),
(12, 17, 101, 2, 'COD', 972.69, 996.08, 23.39, 'Delivered', '2022-03-10 00:41:31'),
(13, 10, 101, 2, 'COD', 780.05, 908.99, 128.94, 'Delivered', '2018-01-14 00:10:43'),
(14, 40, 101, 4, 'COD', 664.92, 811.23, 146.31, 'Delivered', '2020-12-17 20:13:36'),
(15, 31, 102, 3, 'COD', 112.85, 221.58, 108.73, 'Delivered', '2015-12-24 20:56:37'),
(16, 43, 102, 2, 'GCASH', 623.36, 635.26, 11.9, 'Delivered', '2016-04-15 08:20:50'),
(17, 30, 101, 3, 'GCASH', 874.54, 936.38, 61.84, 'Delivered', '2016-11-04 06:39:21'),
(18, 15, 101, 2, 'GCASH', 115.92, 236.9, 120.98, 'Delivered', '2022-06-19 00:38:09'),
(19, 49, 101, 4, 'GCASH', 713.06, 814.11, 101.05, 'Delivered', '2017-08-02 08:26:22'),
(20, 6, 101, 1, 'COD', 986.49, 1019.92, 33.43, 'Delivered', '2022-08-26 02:27:06'),
(21, 28, 103, 2, 'GCASH', 225.24, 390.2, 164.96, 'Delivered', '2023-08-25 00:07:05'),
(22, 37, 102, 1, 'COD', 950.46, 992.74, 42.28, 'Delivered', '2017-04-17 15:31:59'),
(23, 26, 103, 3, 'COD', 501.37, 513.01, 11.64, 'Delivered', '2017-07-08 12:12:24'),
(24, 35, 103, 1, 'GCASH', 434.02, 551.8, 117.78, 'Delivered', '2017-11-10 02:34:06'),
(25, 28, 102, 3, 'COD', 533.9, 624.79, 90.89, 'Delivered', '2018-12-03 03:38:36'),
(26, 18, 103, 1, 'COD', 610.61, 634.1, 23.49, 'Delivered', '2020-02-02 02:08:11'),
(27, 46, 102, 3, 'GCASH', 950.74, 972.23, 21.49, 'Delivered', '2015-02-27 02:04:30'),
(28, 42, 102, 2, 'GCASH', 703.71, 844.09, 140.38, 'Delivered', '2021-11-07 22:49:10'),
(29, 13, 103, 1, 'COD', 305.41, 503.93, 198.52, 'Delivered', '2021-06-07 02:50:32'),
(30, 23, 103, 2, 'COD', 281.09, 407.34, 126.25, 'Delivered', '2019-07-22 22:19:51'),
(31, 48, 102, 1, 'COD', 647.09, 802.18, 155.09, 'Delivered', '2021-10-08 16:23:15'),
(32, 30, 101, 3, 'GCASH', 548.32, 703.89, 155.57, 'Delivered', '2022-05-20 07:14:13'),
(33, 33, 103, 2, 'COD', 474.34, 582.1, 107.76, 'Delivered', '2021-01-24 09:11:35'),
(34, 47, 101, 4, 'COD', 293.06, 377.63, 84.57, 'Delivered', '2016-04-23 12:47:15'),
(35, 19, 101, 2, 'GCASH', 927.18, 1113.66, 186.48, 'Delivered', '2017-12-10 23:24:48'),
(36, 42, 102, 4, 'COD', 398.78, 534.77, 135.99, 'Delivered', '2019-02-27 19:29:05'),
(37, 29, 102, 1, 'GCASH', 738.86, 843.98, 105.12, 'Delivered', '2016-02-02 10:49:28'),
(38, 22, 103, 3, 'COD', 709.33, 858.03, 148.7, 'Delivered', '2022-11-15 11:18:24'),
(39, 17, 101, 3, 'GCASH', 715.25, 857.46, 142.21, 'Delivered', '2019-02-21 00:07:40'),
(40, 35, 103, 4, 'GCASH', 539.79, 733.78, 193.99, 'Delivered', '2017-05-10 22:42:49'),
(41, 28, 102, 3, 'GCASH', 358.0, 501.35, 143.35, 'Delivered', '2021-03-05 08:11:00'),
(42, 8, 101, 2, 'COD', 545.3, 679.55, 134.25, 'Delivered', '2023-06-29 22:49:29'),
(43, 48, 101, 2, 'COD', 480.62, 595.57, 114.95, 'Delivered', '2022-03-22 23:17:17'),
(44, 48, 103, 1, 'COD', 889.7, 1025.99, 136.29, 'Delivered', '2019-07-07 08:51:56'),
(45, 24, 102, 2, 'COD', 312.58, 497.89, 185.31, 'Delivered', '2023-08-03 13:13:27'),
(46, 18, 101, 3, 'GCASH', 319.86, 339.35, 19.49, 'Delivered', '2025-08-01 21:21:05'),
(47, 28, 102, 2, 'GCASH', 786.97, 958.34, 171.37, 'Delivered', '2024-10-16 14:05:51'),
(48, 30, 103, 4, 'GCASH', 726.96, 770.08, 43.12, 'Delivered', '2023-12-15 19:54:13'),
(49, 49, 102, 2, 'GCASH', 281.41, 300.97, 19.56, 'Delivered', '2022-08-25 13:19:24'),
(50, 20, 102, 3, 'GCASH', 498.46, 696.13, 197.67, 'Delivered', '2018-10-22 12:29:00'),
(51, 7, 103, 3, 'GCASH', 286.92, 385.93, 99.01, 'Delivered', '2024-10-31 14:56:16'),
(52, 41, 102, 4, 'GCASH', 210.07, 233.13, 23.06, 'Delivered', '2021-08-23 08:09:09'),
(53, 43, 101, 1, 'COD', 800.17, 897.1, 96.93, 'Delivered', '2022-04-09 14:32:40'),
(54, 2, 102, 1, 'GCASH', 875.82, 945.29, 69.47, 'Delivered', '2022-11-16 18:27:01'),
(55, 7, 101, 4, 'COD', 788.78, 866.14, 77.36, 'Delivered', '2022-02-27 16:41:10'),
(56, 43, 103, 4, 'GCASH', 404.1, 525.34, 121.24, 'Delivered', '2021-01-15 14:10:55'),
(57, 12, 101, 2, 'GCASH', 540.12, 717.92, 177.8, 'Delivered', '2020-08-29 15:06:21'),
(58, 19, 101, 2, 'COD', 135.63, 326.09, 190.46, 'Delivered', '2017-03-29 15:57:40'),
(59, 27, 103, 4, 'GCASH', 847.44, 999.95, 152.51, 'Delivered', '2019-09-12 18:16:08'),
(60, 40, 102, 1, 'GCASH', 301.1, 349.77, 48.67, 'Delivered', '2020-12-02 21:28:43'),
(61, 46, 101, 1, 'COD', 621.55, 634.03, 12.48, 'Delivered', '2023-08-20 05:58:57'),
(62, 15, 102, 4, 'GCASH', 574.72, 620.13, 45.41, 'Delivered', '2021-02-17 00:45:58'),
(63, 30, 103, 4, 'COD', 780.02, 937.67, 157.65, 'Delivered', '2016-05-03 21:30:17'),
(64, 24, 102, 3, 'GCASH', 405.43, 576.99, 171.56, 'Delivered', '2021-06-26 01:47:37'),
(65, 23, 102, 4, 'GCASH', 202.14, 284.57, 82.43, 'Delivered', '2017-04-08 00:36:08'),
(66, 41, 101, 1, 'COD', 303.37, 305.15, 1.78, 'Delivered', '2015-05-06 08:40:22'),
(67, 22, 102, 3, 'GCASH', 649.77, 790.38, 140.61, 'Delivered', '2022-08-07 07:30:05'),
(68, 1, 101, 4, 'COD', 344.38, 479.84, 135.46, 'Delivered', '2020-09-28 02:00:02'),
(69, 22, 103, 3, 'COD', 303.95, 306.1, 2.15, 'Delivered', '2018-10-04 03:26:12'),
(70, 22, 102, 1, 'GCASH', 831.22, 896.99, 65.77, 'Delivered', '2023-06-28 10:44:47'),
(71, 35, 102, 2, 'COD', 431.28, 463.37, 32.09, 'Delivered', '2025-07-20 15:26:57'),
(72, 41, 101, 1, 'COD', 879.15, 1026.13, 146.98, 'Delivered', '2015-03-03 17:55:52'),
(73, 23, 101, 1, 'GCASH', 390.94, 448.29, 57.35, 'Delivered', '2015-10-19 01:45:34'),
(74, 50, 101, 3, 'GCASH', 838.12, 907.63, 69.51, 'Delivered', '2016-10-12 21:06:12'),
(75, 2, 102, 3, 'GCASH', 875.04, 1036.83, 161.79, 'Delivered', '2025-01-29 14:41:58'),
(76, 43, 102, 1, 'COD', 960.28, 1040.86, 80.58, 'Delivered', '2022-09-23 22:36:56'),
(77, 3, 102, 3, 'COD', 478.65, 577.41, 98.76, 'Delivered', '2017-10-01 17:44:26'),
(78, 46, 101, 4, 'COD', 268.25, 290.43, 22.18, 'Delivered', '2019-01-08 20:38:39'),
(79, 24, 101, 3, 'GCASH', 899.95, 1038.04, 138.09, 'Delivered', '2016-11-01 20:41:54'),
(80, 42, 101, 3, 'GCASH', 173.61, 323.99, 150.38, 'Delivered', '2016-08-02 20:13:40'),
(81, 7, 101, 3, 'COD', 569.58, 650.11, 80.53, 'Delivered', '2022-03-01 16:37:28'),
(82, 13, 103, 4, 'GCASH', 875.42, 959.04, 83.62, 'Delivered', '2016-04-08 04:30:01'),
(83, 47, 101, 1, 'COD', 670.26, 700.42, 30.16, 'Delivered', '2020-03-30 04:56:58'),
(84, 14, 102, 2, 'GCASH', 892.73, 976.23, 83.5, 'Delivered', '2015-11-19 14:29:21'),
(85, 45, 102, 3, 'GCASH', 641.35, 736.29, 94.94, 'Delivered', '2023-11-27 03:49:10'),
(86, 47, 103, 3, 'COD', 282.11, 411.83, 129.72, 'Delivered', '2018-10-15 16:30:11'),
(87, 18, 101, 4, 'COD', 656.56, 680.07, 23.51, 'Delivered', '2023-12-04 03:33:12'),
(88, 31, 103, 3, 'GCASH', 505.6, 608.44, 102.84, 'Delivered', '2018-08-31 07:09:22'),
(89, 48, 101, 1, 'GCASH', 527.66, 635.89, 108.23, 'Delivered', '2025-05-05 23:10:47'),
(90, 3, 102, 2, 'COD', 172.22, 315.01, 142.79, 'Delivered', '2025-02-26 08:05:39'),
(91, 21, 102, 2, 'COD', 377.07, 557.91, 180.84, 'Delivered', '2024-04-30 23:14:27'),
(92, 8, 103, 3, 'COD', 231.34, 277.45, 46.11, 'Delivered', '2018-01-11 06:13:27'),
(93, 3, 101, 1, 'COD', 883.56, 1048.32, 164.76, 'Delivered', '2017-01-20 19:01:15'),
(94, 4, 102, 4, 'COD', 271.56, 410.03, 138.47, 'Delivered', '2019-11-14 03:07:03'),
(95, 11, 103, 4, 'COD', 471.19, 665.15, 193.96, 'Delivered', '2022-04-12 06:01:27'),
(96, 44, 101, 1, 'GCASH', 802.97, 817.53, 14.56, 'Delivered', '2023-10-10 22:28:02'),
(97, 21, 101, 2, 'COD', 391.78, 410.57, 18.79, 'Delivered', '2023-08-12 13:28:40'),
(98, 16, 102, 3, 'GCASH', 800.92, 972.55, 171.63, 'Delivered', '2025-03-10 01:05:34'),
(99, 48, 103, 3, 'COD', 413.0, 544.45, 131.45, 'Delivered', '2024-04-21 21:14:49'),
(100, 15, 102, 3, 'GCASH', 259.0, 424.91, 165.91, 'Delivered', '2024-10-06 03:57:15')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `(4)_orders_Seeder` ()   INSERT INTO orders (order_id, transaction_id, cart_id, total_price, created_at) VALUES
(1, 1, 1, 330.35, '2025-07-31 17:17:26'),
(2, 2, 2, 431.43, '2015-04-12 22:10:00'),
(3, 3, 3, 401.39, '2019-02-23 12:07:32'),
(4, 4, 4, 816.44, '2015-06-15 00:30:41'),
(5, 5, 5, 524.66, '2018-03-11 03:33:29'),
(6, 6, 6, 506.4, '2025-03-21 08:45:12'),
(7, 7, 7, 779.6, '2017-12-22 11:13:19'),
(8, 8, 8, 760.28, '2017-06-28 23:00:08'),
(9, 9, 9, 527.62, '2016-06-02 10:36:31'),
(10, 10, 10, 661.42, '2024-11-04 08:53:22'),
(11, 11, 11, 336.44, '2016-06-17 17:29:59'),
(12, 12, 12, 852.85, '2021-03-16 12:46:17'),
(13, 13, 13, 746.04, '2020-09-13 11:59:03'),
(14, 14, 14, 844.05, '2020-01-19 08:27:11'),
(15, 15, 15, 333.05, '2019-06-25 22:42:37'),
(16, 16, 16, 900.61, '2015-12-22 10:45:56'),
(17, 17, 17, 480.73, '2020-10-08 01:36:27'),
(18, 18, 18, 499.9, '2016-10-17 18:24:54'),
(19, 19, 19, 705.9, '2020-12-16 13:09:37'),
(20, 20, 20, 263.97, '2015-08-06 16:16:05'),
(21, 21, 21, 939.17, '2021-12-04 20:10:50'),
(22, 22, 22, 636.68, '2015-11-24 09:00:12'),
(23, 23, 23, 599.73, '2022-06-11 14:04:41'),
(24, 24, 24, 868.86, '2024-08-18 16:58:54'),
(25, 25, 25, 710.22, '2018-01-15 16:59:46'),
(26, 26, 26, 505.67, '2018-05-15 11:13:13'),
(27, 27, 27, 553.94, '2019-10-22 16:06:29'),
(28, 28, 28, 916.31, '2015-08-17 17:40:37'),
(29, 29, 29, 776.76, '2019-12-31 19:06:58'),
(30, 30, 30, 988.75, '2021-12-25 02:18:02'),
(31, 31, 31, 195.74, '2021-01-24 15:32:43'),
(32, 32, 32, 722.08, '2020-06-18 22:16:02'),
(33, 33, 33, 240.38, '2015-10-07 17:27:54'),
(34, 34, 34, 561.09, '2022-01-26 09:42:09'),
(35, 35, 35, 433.47, '2015-09-23 05:51:05'),
(36, 36, 36, 413.67, '2019-01-07 05:49:43'),
(37, 37, 37, 606.08, '2021-04-26 20:43:33'),
(38, 38, 38, 660.06, '2021-07-16 13:34:26'),
(39, 39, 39, 924.26, '2022-02-10 18:32:54'),
(40, 40, 40, 878.18, '2019-11-21 20:59:16'),
(41, 41, 41, 567.43, '2016-10-07 11:04:49'),
(42, 42, 42, 731.31, '2018-08-08 17:47:51'),
(43, 43, 43, 560.0, '2019-02-03 22:06:11'),
(44, 44, 44, 940.84, '2021-10-01 03:25:49'),
(45, 45, 45, 987.55, '2017-09-28 21:08:35'),
(46, 46, 46, 620.43, '2023-11-21 06:03:06'),
(47, 47, 47, 698.12, '2015-09-07 19:51:46'),
(48, 48, 48, 654.13, '2022-06-20 05:50:35'),
(49, 49, 49, 896.0, '2020-03-04 01:36:30'),
(50, 50, 50, 385.04, '2022-04-05 17:43:07'),
(51, 51, 51, 346.71, '2025-04-15 16:18:32'),
(52, 52, 52, 910.01, '2025-04-01 15:54:24'),
(53, 53, 53, 458.29, '2022-04-25 06:07:20'),
(54, 54, 54, 573.52, '2020-02-12 14:17:53'),
(55, 55, 55, 207.49, '2024-06-21 08:45:41'),
(56, 56, 56, 727.49, '2018-08-21 10:00:43'),
(57, 57, 57, 301.38, '2018-08-15 16:07:15'),
(58, 58, 58, 889.26, '2023-06-23 15:27:28'),
(59, 59, 59, 727.52, '2020-01-27 22:13:03'),
(60, 60, 60, 389.58, '2020-02-27 05:42:15'),
(61, 61, 61, 738.6, '2015-09-05 02:07:26'),
(62, 62, 62, 870.28, '2020-05-15 05:49:14'),
(63, 63, 63, 100.08, '2022-06-15 22:26:47'),
(64, 64, 64, 618.27, '2020-10-16 04:39:59'),
(65, 65, 65, 465.15, '2025-08-01 01:04:08'),
(66, 66, 66, 343.84, '2016-01-18 23:00:10'),
(67, 67, 67, 946.0, '2015-05-18 08:30:40'),
(68, 68, 68, 670.98, '2018-09-08 17:00:58'),
(69, 69, 69, 768.51, '2022-10-15 19:29:46'),
(70, 70, 70, 103.36, '2025-06-27 00:36:38'),
(71, 71, 71, 209.44, '2024-05-16 04:54:37'),
(72, 72, 72, 955.13, '2016-09-10 21:11:01'),
(73, 73, 73, 474.48, '2015-04-04 00:06:51'),
(74, 74, 74, 128.92, '2016-01-29 18:47:02'),
(75, 75, 75, 688.1, '2025-03-02 21:18:31'),
(76, 76, 76, 184.86, '2024-11-10 13:48:43'),
(77, 77, 77, 869.71, '2023-10-10 13:10:29'),
(78, 78, 78, 763.24, '2021-01-15 18:07:51'),
(79, 79, 79, 845.55, '2024-11-10 05:06:43'),
(80, 80, 80, 788.46, '2017-08-29 07:31:42'),
(81, 81, 81, 920.53, '2015-01-06 10:16:49'),
(82, 82, 82, 680.52, '2015-10-19 05:56:56'),
(83, 83, 83, 563.57, '2023-12-30 15:43:55'),
(84, 84, 84, 587.72, '2018-04-10 13:51:33'),
(85, 85, 85, 971.04, '2022-09-21 14:39:34'),
(86, 86, 86, 630.04, '2019-06-17 21:34:45'),
(87, 87, 87, 348.12, '2020-10-14 11:42:14'),
(88, 88, 88, 710.18, '2021-02-04 14:14:33'),
(89, 89, 89, 343.23, '2015-11-04 13:30:58'),
(90, 90, 90, 714.32, '2017-09-06 14:01:31'),
(91, 91, 91, 627.69, '2020-11-12 20:51:12'),
(92, 92, 92, 286.16, '2024-11-07 14:11:37'),
(93, 93, 93, 242.37, '2025-01-25 15:31:39'),
(94, 94, 94, 422.36, '2022-10-14 22:04:44'),
(95, 95, 95, 423.86, '2020-10-28 04:46:18'),
(96, 96, 96, 810.52, '2021-06-12 20:03:22'),
(97, 97, 97, 700.44, '2025-08-02 22:28:56'),
(98, 98, 98, 571.06, '2016-11-19 17:18:00'),
(99, 99, 99, 340.85, '2017-01-02 13:00:18'),
(100, 100, 100, 990.8, '2022-01-11 23:22:57')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addOns_Seeder` ()   INSERT INTO add_ons (name, category, price, available) 
	VALUES 	('Booba Pearl', 'MILKTEA', 10.00, true), 
    		('Nata', 'MILKTEA', 10.00, true), 
            ('Whipped Cream', 'MILKTEA', 15.00, true),
            ('Cheese Cake', 'MILKTEA' , 20.00, true), 
            ('Caramel Drizzle', 'MILKTEA', 10.00, true),
            ('Milk', 'COFFEE', 25.00, true)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `discount_Seeder` ()   INSERT INTO discounts (name, type, value, min_amount)
VALUES
    ('₱5 off', 'fixed', 5.00, 500.00),
    ('₱10 off', 'fixed', 10.00, 1000.00),
    ('5% off', 'percentage', 0.05, 550.00),
    ('10% off', 'percentage', 0.1, 1050.00)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuItem_Seederv3` ()   INSERT INTO menu_items (name, description, available, category, image_dir) VALUES
-- ESPRESSO
('Americano', 'Bold espresso with hot water for strong coffee lovers.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/americano.png'),
('Biscoff Latte', 'Espresso with creamy Biscoff spread and cookie flavors.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/biscoff-latte.png'),
('Cafe Latte', 'Smooth espresso with steamed milk, perfect morning drink.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/cafe-latte.png'),
('Salted Caramel Latte', 'Espresso and caramel blend with a salty twist.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/salted-caramel-latte.png'),
('Spanish Latte', 'Sweetened espresso with milk for a rich flavor.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/spanish-latte.png'),
('Tiramisu Latte', 'Coffee infused with cocoa and mascarpone cheese flavor.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/tiramisu-latte.png'),

-- COFFEE
('Cappuccino', 'Espresso, steamed milk, and frothy foam on top.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/cappuccino.png'),
('Caramel Macchiato', 'Espresso, milk, and caramel drizzle for sweetness.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/caramel-macchiato.png'),
('Kape Tuerca', 'Nutty and bold Filipino coffee blend, aromatic taste.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/kape-tuerca.png'),
('Mocha', 'Chocolate and espresso mix for a delightful drink.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/mocha.png'),
('White Coffee', 'Mild coffee with creamy milk, smooth and delicious.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/white-coffee.png'),

-- MILKTEA
('Cookies & Cream', 'Milk tea blended with chocolate cookie crumbles.', 1, 'MILKTEA', '../../storage/backend/img/menu/milktea/cookies-and-cream.png'),
('Dark Chocolate', 'Deep and indulgent dark chocolate milk tea.', 1, 'MILKTEA', '../../storage/backend/img/menu/milktea/dark-chocolate.png'),
('Okinawa', 'Brown sugar-infused milk tea with roasted notes.', 1, 'MILKTEA', '../../storage/backend/img/menu/milktea/okinawa.png'),
('Red Velvet', 'Rich red velvet tea with sweet creamy topping.', 1, 'MILKTEA', '../../storage/backend/img/menu/milktea/red-velvet.png'),

-- COFFEE FRAPPE
('Cappuccino Frappe', 'Frosty cappuccino blended for a refreshing treat.', 1, 'COFFEE FRAPPE', '../../storage/backend/img/menu/coffee-frappe/cappuccino.png'),
('Caramel Macchiato Frappe', 'Cold caramel coffee blended with ice and milk.', 1, 'COFFEE FRAPPE', '../../storage/backend/img/menu/coffee-frappe/caramel-macchiato.png'),
('Mocha Frappe', 'Chilled mocha coffee with a chocolatey taste.', 1, 'COFFEE FRAPPE', '../../storage/backend/img/menu/coffee-frappe/mocha.png'),
('White Coffee Frappe', 'Cold white coffee blend with smooth texture.', 1, 'COFFEE FRAPPE', '../../storage/backend/img/menu/coffee-frappe/white-coffee.png'),

-- SIGNATURE DRINKS
('Biscoff Cream', 'Smooth Biscoff-flavored drink with a creamy texture.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/biscoff-cream.png'),
('Matcha Oreo', 'Matcha tea blended with Oreo cookies for crunch.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/matcha-oreo.png'),
('Matcha Strawberry Foam', 'Matcha with strawberry foam, a refreshing combination.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/matcha-strawberry-foam.png'),
('Strawberry Whipped Cheese', 'Sweet strawberry drink topped with whipped cheese.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/strawbery-whipped-cheese.png'),
('Ube Cream', 'Creamy and earthy ube-flavored signature beverage.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/ube-cream.png'),

-- FRUIT DRINKS
('Green Apple Juice', 'Crisp and tangy green apple fruit juice.', 1, 'FRUIT DRINK', '../../storage/backend/img/menu/fruit-drink/green-apple.png'),
('Lychee Juice', 'Delicate and fragrant lychee fruit juice.', 1, 'FRUIT DRINK', '../../storage/backend/img/menu/fruit-drink/lychee.png'),
('Mango Juice', 'Smooth and tropical mango fruit juice delight.', 1, 'FRUIT DRINK', '../../storage/backend/img/menu/fruit-drink/mango.png'),
('Strawberry Juice', 'Fresh strawberry fruit juice, naturally sweet.', 1, 'FRUIT DRINK', '../../storage/backend/img/menu/fruit-drink/strawberry.png'),

-- FRUIT FRAPPE
('Green Apple Frappe', 'Green apple fruit blended with ice, refreshing.', 1, 'FRUIT FRAPPE', '../../storage/backend/img/menu/fruit-frappe/green-apple-frappe.png'),
('Lychee Frappe', 'Blended lychee fruit frappe, subtly floral.', 1, 'FRUIT FRAPPE', '../../storage/backend/img/menu/fruit-frappe/lychee-frappe.png'),
('Mango Frappe', 'Chilled mango fruit blended into icy goodness.', 1, 'FRUIT FRAPPE', '../../storage/backend/img/menu/fruit-frappe/mango-frapp.png'),
('Strawberry Frappe', 'Frosty strawberry fruit drink with natural sweetness.', 1, 'FRUIT FRAPPE', '../../storage/backend/img/menu/fruit-frappe/strawberry-frappe.png'),

-- NACHOS
('Cheese Beef Nachos', 'Nachos topped with beef and melted cheese.', 1, 'NACHOS', '../../storage/backend/img/menu/nachos/cheese-beef-nachos.png'),
('Cheese Nachos', 'Crispy nachos drizzled with creamy cheese sauce.', 1, 'NACHOS', '../../storage/backend/img/menu/nachos/cheese-nachos.png'),

-- PIZZA
('Ham & Cheese Pizza', 'Classic ham and cheese on a crispy crust.', 1, 'PIZZA', '../../storage/backend/img/menu/pizza/ham-and-cheese-pizza.png'),
('Pepperoni Pizza', 'Spicy and savory pepperoni slices on pizza.', 1, 'PIZZA', '../../storage/backend/img/menu/pizza/pepperoni-pizza.png'),
('Shawarma Pizza', 'Middle Eastern flavors on a cheesy pizza.', 1, 'PIZZA', '../../storage/backend/img/menu/pizza/shawarma-pizza.png'),

-- GRILLED SANDWICH
('Cheese Sandwich', 'Toasted bread with melted cheese inside.', 1, 'GRILLED SANDWICH', '../../storage/backend/img/menu/grilled-sandwich/cheese-grilled-sandwich.png'),
('Ham & Cheese Sandwich', 'Grilled sandwich with ham and cheese filling.', 1, 'GRILLED SANDWICH', '../../storage/backend/img/menu/grilled-sandwich/ham-and-cheese-grilled-sandwich.png'),
('Nutella Sandwich', 'Sweet toasted bread with Nutella chocolate spread.', 1, 'GRILLED SANDWICH', '../../storage/backend/img/menu/grilled-sandwich/nutella-grilled-sandwich.png'),

-- CROFFLES
('Biscoff Croffle', 'Crispy croffle topped with Biscoff cookie spread.', 1, 'CROFFLES', '../../storage/backend/img/menu/croffles/biscoff-croffle.png'),

('Nutella Croffle', 'Sweet croffle topped with Nutella chocolate spread.', 1, 'CROFFLES', '../../storage/backend/img/menu/croffles/nutella-croffles.png'),
('Oreo Cream Croffle', 'Croffle with Oreo crumbles and creamy topping.', 1, 'CROFFLES', '../../storage/backend/img/menu/croffles/oreo-cream-croffles.png'),
('Tiramisu Croffle', 'Tiramisu-flavored croffle with cocoa and cream.', 1, 'CROFFLES', '../../storage/backend/img/menu/croffles/tiramisu-croffles.png'),

-- MINI DONUTS
('Biscoff Mini Donuts', 'Mini donuts covered with Biscoff spread.', 1, 'MINI DONUT', '../../storage/backend/img/menu/mini-donut/biscoff.png'),
('Chocolate Mini Donuts', 'Soft chocolate-flavored mini donuts, bite-sized delight.', 1, 'MINI DONUT', '../../storage/backend/img/menu/mini-donut/chocolate.png'),
('Nutella Mini Donuts', 'Mini donuts dipped in Nutella chocolate goodness.', 1, 'MINI DONUT', '../../storage/backend/img/menu/mini-donut/nutella.png'),
('Oreo Cream Mini Donuts', 'Mini donuts with Oreo cream topping.', 1, 'MINI DONUT', '../../storage/backend/img/menu/mini-donut/oreocream.png')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuSizes_Seederv3` ()   INSERT INTO menu_item_sizes (menu_item_id, size, price) VALUES
-- ESPRESSO
(1, 'M', 59.00), (1, 'L', 69.00),
(2, 'M', 119.00), (2, 'L', 129.00),
(3, 'M', 79.00), (3, 'L', 89.00),
(4, 'M', 89.00), (4, 'L', 99.00),
(5, 'M', 89.00), (5, 'L', 99.00),
(6, 'M', 109.00), (6, 'L', 119.00),

-- COFFEE
(7, 'M', 40.00), (7, 'L', 50.00),
(8, 'M', 40.00), (8, 'L', 50.00),
(9, 'M', 50.00), (9, 'L', 60.00),
(10, 'M', 40.00), (10, 'L', 50.00),
(11, 'M', 40.00), (11, 'L', 50.00),

-- MILKTEA
(12, 'M', 40.00), (12, 'L', 50.00),
(13, 'M', 50.00), (13, 'L', 60.00),
(14, 'M', 40.00), (14, 'L', 50.00),
(15, 'M', 40.00), (15, 'L', 50.00),

-- COFFEE FRAPPE
(16, 'M', 60.00), (16, 'L', 70.00),
(17, 'M', 60.00), (17, 'L', 70.00),
(18, 'M', 60.00), (18, 'L', 70.00),
(19, 'M', 60.00), (19, 'L', 70.00),

-- SIGNATURE DRINKS
(20, 'M', 90.00), (20, 'L', 100.00),
(21, 'M', 80.00), (21, 'L', 90.00),
(22, 'M', 80.00), (22, 'L', 90.00),
(23, 'M', 80.00), (23, 'L', 90.00),
(24, 'M', 60.00), (24, 'L', 70.00),

-- FRUIT DRINKS
(25, 'M', 40.00), (25, 'L', 50.00),
(26, 'M', 40.00), (26, 'L', 50.00),
(27, 'M', 40.00), (27, 'L', 50.00),
(28, 'M', 40.00), (28, 'L', 50.00),

-- FRUIT FRAPPE
(29, 'M', 65.00), (29, 'L', 75.00),
(30, 'M', 65.00), (30, 'L', 75.00),
(31, 'M', 65.00), (31, 'L', 75.00),
(32, 'M', 65.00), (32, 'L', 75.00),

-- NACHOS
(33, 'R', 80.00),
(34, 'R', 100.00),

-- PIZZA
(35, '6 Inches', 60.00),
(36, '6 Inches', 65.00),
(37, '6 Inches', 65.00),

-- GRILLED SANDWICH
(38, 'R', 35.00),
(39, 'R', 45.00),
(40, 'R', 40.00),

-- CROFFLES
(41, 'Mini', 55.00), (41, 'Regular', 100.00),
(42, 'Mini', 55.00), (42, 'Regular', 100.00),
(43, 'Mini', 65.00), (43, 'Regular', 120.00),
(44, 'Mini', 65.00), (44, 'Regular', 120.00),

-- MINI DONUTS
(45, '6pcs', 55.00), (45, '12pcs', 100.00),
(46, '6pcs', 60.00), (46, '12pcs', 110.00),
(47, '6pcs', 65.00), (47, '12pcs', 120.00),
(48, '6pcs', 60.00), (48, '12pcs', 110.00)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rider_Seeder` ()   INSERT INTO users (
  user_id, first_name, last_name, username, email, password,
  contact_number, gender, age, date_of_birth, address, role,
  house_number, street, barangay, city, provience, region, postal_code,
  available, verified
) VALUES
(18, 'Rider', 'One', 'riderone', 'rider18@example.com', '$2y$10$dummyHashRider1', '09181234501', 'Male', 30, '1995-04-05', '123 Rider St', 'Rider', '123', 'Rider', 'Barangay Rider', 'Quezon City', 'Metro Manila', 'NCR', '1100', 1, 1),
(19, 'Rider', 'Two', 'ridertwo', 'rider19@example.com', '$2y$10$dummyHashRider2', '09181234502', 'Male', 27, '1998-02-11', '124 Rider St', 'Rider', '124', 'Rider', 'Barangay Rider', 'Quezon City', 'Metro Manila', 'NCR', '1101', 1, 1),
(20, 'Rider', 'Three', 'riderthree', 'rider20@example.com', '$2y$10$dummyHashRider3', '09181234503', 'Male', 35, '1989-07-20', '125 Rider St', 'Rider', '125', 'Rider', 'Barangay Rider', 'Quezon City', 'Metro Manila', 'NCR', '1102', 1, 1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `truncate_all_tables` ()   BEGIN
    -- Disable foreign key checks to avoid constraint issues
    SET FOREIGN_KEY_CHECKS = 0;

    -- Truncate each table individually
    TRUNCATE TABLE carts;
    TRUNCATE TABLE orders;
    TRUNCATE TABLE transactions;
    TRUNCATE TABLE users;
    TRUNCATE TABLE add_ons;
    TRUNCATE TABLE discounts;
    TRUNCATE TABLE menu_items;
    TRUNCATE TABLE menu_item_sizes;
    TRUNCATE TABLE password_reset_requests;

    -- Re-enable foreign key checks
    SET FOREIGN_KEY_CHECKS = 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `add_on_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`add_on_id`, `name`, `category`, `price`, `available`, `status`) VALUES
(1, 'Booba Pearl', 'MILKTEA', 10.00, 1, 0),
(2, 'Nata', 'MILKTEA', 10.00, 1, 1),
(3, 'Whipped Cream', 'MILKTEA', 15.00, 1, 1),
(4, 'Cheese Cake', 'MILKTEA', 20.00, 1, 1),
(5, 'Caramel Drizzle', 'MILKTEA', 10.00, 1, 1),
(6, 'Milk', 'COFFEE', 25.00, 1, 1),
(7, 'Chocolate Syrup', 'MILKTEA', 40.00, 1, 1),
(8, 'Stawberry Syrup', 'MILKTEA', 50.00, 1, 1),
(9, 'Stawberry Syrup x4', 'MILKTEA', 50.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `menu_item_id` int NOT NULL,
  `menu_item_size_id` int NOT NULL,
  `add_ons_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `order_placed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `menu_item_id`, `menu_item_size_id`, `add_ons_id`, `quantity`, `order_placed`) VALUES
(1, 10, 11, 17, 4, 4, 1),
(2, 31, 47, 56, 2, 5, 1),
(3, 12, 15, 81, 6, 1, 1),
(4, 40, 9, 12, 2, 2, 1),
(5, 46, 23, 8, 6, 2, 1),
(6, 45, 33, 53, 2, 2, 1),
(7, 50, 46, 62, 1, 3, 1),
(8, 47, 40, 70, 2, 3, 1),
(9, 50, 35, 38, 5, 4, 1),
(10, 19, 29, 6, 3, 2, 1),
(11, 35, 43, 29, 2, 2, 1),
(12, 30, 24, 3, 3, 3, 1),
(13, 34, 46, 87, 6, 2, 1),
(14, 35, 47, 47, 3, 4, 1),
(15, 12, 34, 61, 4, 3, 1),
(16, 30, 32, 76, 5, 1, 1),
(17, 15, 10, 47, 4, 4, 1),
(18, 47, 45, 65, 5, 5, 1),
(19, 6, 22, 35, 5, 1, 1),
(20, 26, 6, 4, 1, 2, 1),
(21, 39, 30, 20, 4, 3, 1),
(22, 14, 6, 72, 1, 3, 1),
(23, 19, 27, 64, 5, 4, 1),
(24, 20, 2, 58, 3, 3, 1),
(25, 45, 24, 44, 1, 4, 1),
(26, 48, 36, 57, 3, 5, 1),
(27, 4, 24, 60, 1, 3, 1),
(28, 20, 41, 51, 5, 4, 1),
(29, 46, 46, 65, 5, 5, 1),
(30, 18, 17, 57, 2, 4, 1),
(31, 26, 29, 23, 2, 2, 1),
(32, 24, 17, 11, 5, 5, 1),
(33, 12, 21, 82, 3, 5, 1),
(34, 12, 42, 40, 6, 4, 1),
(35, 34, 11, 54, 1, 4, 1),
(36, 50, 12, 4, 5, 5, 1),
(37, 25, 4, 63, 2, 3, 1),
(38, 15, 23, 50, 4, 5, 1),
(39, 2, 46, 49, 1, 1, 1),
(40, 3, 44, 76, 5, 1, 1),
(41, 11, 41, 11, 2, 4, 1),
(42, 20, 5, 26, 4, 3, 1),
(43, 48, 27, 62, 3, 3, 1),
(44, 35, 11, 77, 1, 3, 1),
(45, 31, 5, 81, 4, 5, 1),
(46, 13, 24, 51, 3, 1, 1),
(47, 47, 5, 8, 6, 5, 1),
(48, 46, 21, 37, 5, 3, 1),
(49, 20, 10, 88, 3, 1, 1),
(50, 5, 42, 88, 1, 2, 1),
(51, 16, 4, 37, 1, 4, 1),
(52, 27, 29, 34, 6, 4, 1),
(53, 19, 44, 23, 2, 4, 1),
(54, 5, 35, 64, 6, 3, 1),
(55, 13, 35, 77, 6, 3, 1),
(56, 19, 7, 54, 4, 4, 1),
(57, 33, 29, 28, 1, 4, 1),
(58, 1, 27, 34, 1, 5, 1),
(59, 12, 16, 29, 6, 4, 1),
(60, 34, 15, 26, 2, 5, 1),
(61, 19, 35, 63, 5, 5, 1),
(62, 34, 18, 28, 3, 2, 1),
(63, 26, 26, 56, 2, 1, 1),
(64, 26, 23, 61, 1, 4, 1),
(65, 48, 34, 27, 4, 1, 1),
(66, 8, 41, 70, 2, 5, 1),
(67, 44, 23, 68, 6, 5, 1),
(68, 11, 15, 8, 4, 3, 1),
(69, 20, 33, 71, 2, 2, 1),
(70, 7, 13, 66, 4, 2, 1),
(71, 14, 33, 80, 5, 4, 1),
(72, 24, 37, 68, 2, 5, 1),
(73, 15, 26, 37, 6, 4, 1),
(74, 28, 21, 73, 4, 2, 1),
(75, 9, 16, 86, 3, 1, 1),
(76, 18, 25, 52, 1, 2, 1),
(77, 26, 2, 80, 1, 4, 1),
(78, 37, 39, 72, 2, 2, 1),
(79, 45, 25, 86, 4, 1, 1),
(80, 41, 34, 10, 2, 4, 1),
(81, 23, 13, 62, 3, 5, 1),
(82, 33, 13, 27, 5, 2, 1),
(83, 38, 39, 2, 2, 1, 1),
(84, 44, 4, 14, 2, 5, 1),
(85, 5, 11, 21, 3, 4, 1),
(86, 7, 9, 17, 3, 4, 1),
(87, 38, 1, 20, 1, 5, 1),
(88, 16, 13, 24, 6, 4, 1),
(89, 14, 33, 68, 1, 2, 1),
(90, 41, 10, 26, 3, 5, 1),
(91, 6, 25, 16, 6, 2, 1),
(92, 29, 34, 46, 4, 1, 1),
(93, 39, 10, 33, 5, 2, 1),
(94, 11, 25, 52, 4, 5, 1),
(95, 20, 17, 48, 1, 4, 1),
(96, 3, 31, 35, 3, 4, 1),
(97, 17, 48, 28, 1, 5, 1),
(98, 31, 46, 75, 4, 2, 1),
(99, 16, 29, 55, 5, 1, 1),
(100, 50, 15, 87, 1, 3, 1),
(102, 106, 7, 14, 6, 5, 1),
(103, 106, 1, 1, NULL, 5, 1),
(104, 106, 6, 11, NULL, 4, 1),
(105, 108, 6, 11, NULL, 4, 1),
(106, 108, 4, 7, NULL, 4, 1),
(107, 108, 1, 1, NULL, 5, 1),
(108, 108, 8, 15, NULL, 4, 1),
(109, 108, 8, 15, NULL, 5, 1),
(110, 108, 9, 17, NULL, 4, 1),
(111, 108, 7, 13, NULL, 5, 1),
(112, 108, 7, 13, NULL, 5, 1),
(113, 108, 8, 15, NULL, 6, 1),
(114, 106, 15, 29, 5, 5, 1),
(115, 106, 8, 15, NULL, 5, 1),
(116, 108, 5, 9, NULL, 4, 1),
(117, 108, 4, 7, NULL, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` decimal(11,2) NOT NULL,
  `min_amount` decimal(11,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `name`, `type`, `value`, `min_amount`, `created_at`) VALUES
(1, '₱5 off', 'fixed', 5.00, 500.00, '2025-05-28 15:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menu_item_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `available` tinyint(1) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_item_id`, `name`, `description`, `available`, `category`, `image_dir`, `status`) VALUES
(1, 'Americano', 'Bold espresso with hot water for strong coffee lovers.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/americano.png', 1),
(2, 'Biscoff Latte', 'Espresso with creamy Biscoff spread and cookie flavors.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/biscoff-latte.png', 1),
(3, 'Cafe Latte', 'Smooth espresso with steamed milk, perfect morning drink.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/cafe-latte.png', 1),
(4, 'Salted Caramel Latte', 'Espresso and caramel blend with a salty twist.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/salted-caramel-latte.png', 1),
(5, 'Spanish Latte', 'Sweetened espresso with milk for a rich flavor.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/spanish-latte.png', 1),
(6, 'Tiramisu Latte', 'Coffee infused with cocoa and mascarpone cheese flavor.', 1, 'ESPRESSO', '../../storage/backend/img/menu/espresso/tiramisu-latte.png', 1),
(7, 'Cappuccino', 'Espresso, steamed milk, and frothy foam on top.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/cappuccino.png', 1),
(8, 'Caramel Macchiato', 'Espresso, milk, and caramel drizzle for sweetness.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/caramel-macchiato.png', 1),
(9, 'Kape Tuerca', 'Nutty and bold Filipino coffee blend, aromatic taste.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/kape-tuerca.png', 1),
(10, 'Mocha', 'Chocolate and espresso mix for a delightful drink.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/mocha.png', 1),
(11, 'White Coffee', 'Mild coffee with creamy milk, smooth and delicious.', 1, 'COFFEE', '../../storage/backend/img/menu/coffee/white-coffee.png', 1),
(12, 'Cookies & Cream', 'Milk tea blended with chocolate cookie crumbles.', 1, 'MILKTEA', '../../storage/backend/img/menu/milktea/cookies-and-cream.png', 1),
(13, 'Dark Chocolate', 'Deep and indulgent dark chocolate milk tea.', 1, 'MILKTEA', '../../storage/backend/img/menu/milktea/dark-chocolate.png', 1),
(14, 'Okinawa', 'Brown sugar-infused milk tea with roasted notes.', 1, 'MILKTEA', '../../storage/backend/img/menu/milktea/okinawa.png', 1),
(15, 'Red Velvet', 'Rich red velvet tea with sweet creamy topping.', 1, 'MILKTEA', '../../storage/backend/img/menu/milktea/red-velvet.png', 1),
(16, 'Cappuccino Frappe', 'Frosty cappuccino blended for a refreshing treat.', 1, 'COFFEE FRAPPE', '../../storage/backend/img/menu/coffee-frappe/cappuccino.png', 1),
(17, 'Caramel Macchiato Frappe', 'Cold caramel coffee blended with ice and milk.', 1, 'COFFEE FRAPPE', '../../storage/backend/img/menu/coffee-frappe/caramel-macchiato.png', 1),
(18, 'Mocha Frappe', 'Chilled mocha coffee with a chocolatey taste.', 1, 'COFFEE FRAPPE', '../../storage/backend/img/menu/coffee-frappe/mocha.png', 1),
(19, 'White Coffee Frappe', 'Cold white coffee blend with smooth texture.', 1, 'COFFEE FRAPPE', '../../storage/backend/img/menu/coffee-frappe/white-coffee.png', 1),
(20, 'Biscoff Cream', 'Smooth Biscoff-flavored drink with a creamy texture.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/biscoff-cream.png', 1),
(21, 'Matcha Oreo', 'Matcha tea blended with Oreo cookies for crunch.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/matcha-oreo.png', 1),
(22, 'Matcha Strawberry Foam', 'Matcha with strawberry foam, a refreshing combination.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/matcha-strawberry-foam.png', 1),
(23, 'Strawberry Whipped Cheese', 'Sweet strawberry drink topped with whipped cheese.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/strawbery-whipped-cheese.png', 1),
(24, 'Ube Cream', 'Creamy and earthy ube-flavored signature beverage.', 1, 'SIGNATURE DRINK', '../../storage/backend/img/menu/signature-drink/ube-cream.png', 1),
(25, 'Green Apple Juice', 'Crisp and tangy green apple fruit juice.', 1, 'FRUIT DRINK', '../../storage/backend/img/menu/fruit-drink/green-apple.png', 1),
(26, 'Lychee Juice', 'Delicate and fragrant lychee fruit juice.', 1, 'FRUIT DRINK', '../../storage/backend/img/menu/fruit-drink/lychee.png', 1),
(27, 'Mango Juice', 'Smooth and tropical mango fruit juice delight.', 1, 'FRUIT DRINK', '../../storage/backend/img/menu/fruit-drink/mango.png', 1),
(28, 'Strawberry Juice', 'Fresh strawberry fruit juice, naturally sweet.', 1, 'FRUIT DRINK', '../../storage/backend/img/menu/fruit-drink/strawberry.png', 1),
(29, 'Green Apple Frappe', 'Green apple fruit blended with ice, refreshing.', 1, 'FRUIT FRAPPE', '../../storage/backend/img/menu/fruit-frappe/green-apple-frappe.png', 1),
(30, 'Lychee Frappe', 'Blended lychee fruit frappe, subtly floral.', 1, 'FRUIT FRAPPE', '../../storage/backend/img/menu/fruit-frappe/lychee-frappe.png', 1),
(31, 'Mango Frappe', 'Chilled mango fruit blended into icy goodness.', 1, 'FRUIT FRAPPE', '../../storage/backend/img/menu/fruit-frappe/mango-frapp.png', 1),
(32, 'Strawberry Frappe', 'Frosty strawberry fruit drink with natural sweetness.', 1, 'FRUIT FRAPPE', '../../storage/backend/img/menu/fruit-frappe/strawberry-frappe.png', 1),
(33, 'Cheese Beef Nachos', 'Nachos topped with beef and melted cheese.', 1, 'NACHOS', '../../storage/backend/img/menu/nachos/cheese-beef-nachos.png', 1),
(34, 'Cheese Nachos', 'Crispy nachos drizzled with creamy cheese sauce.', 1, 'NACHOS', '../../storage/backend/img/menu/nachos/cheese-nachos.png', 1),
(35, 'Ham & Cheese Pizza', 'Classic ham and cheese on a crispy crust.', 1, 'PIZZA', '../../storage/backend/img/menu/pizza/ham-and-cheese-pizza.png', 1),
(36, 'Pepperoni Pizza', 'Spicy and savory pepperoni slices on pizza.', 1, 'PIZZA', '../../storage/backend/img/menu/pizza/pepperoni-pizza.png', 1),
(37, 'Shawarma Pizza', 'Middle Eastern flavors on a cheesy pizza.', 1, 'PIZZA', '../../storage/backend/img/menu/pizza/shawarma-pizza.png', 1),
(38, 'Cheese Sandwich', 'Toasted bread with melted cheese inside.', 1, 'GRILLED SANDWICH', '../../storage/backend/img/menu/grilled-sandwich/cheese-grilled-sandwich.png', 1),
(39, 'Ham & Cheese Sandwich', 'Grilled sandwich with ham and cheese filling.', 1, 'GRILLED SANDWICH', '../../storage/backend/img/menu/grilled-sandwich/ham-and-cheese-grilled-sandwich.png', 1),
(40, 'Nutella Sandwich', 'Sweet toasted bread with Nutella chocolate spread.', 1, 'GRILLED SANDWICH', '../../storage/backend/img/menu/grilled-sandwich/nutella-grilled-sandwich.png', 1),
(41, 'Biscoff Croffle', 'Crispy croffle topped with Biscoff cookie spread.', 1, 'CROFFLES', '../../storage/backend/img/menu/croffles/biscoff-croffle.png', 1),
(42, 'Nutella Croffle', 'Sweet croffle topped with Nutella chocolate spread.', 1, 'CROFFLES', '../../storage/backend/img/menu/croffles/nutella-croffles.png', 1),
(43, 'Oreo Cream Croffle', 'Croffle with Oreo crumbles and creamy topping.', 1, 'CROFFLES', '../../storage/backend/img/menu/croffles/oreo-cream-croffles.png', 1),
(44, 'Tiramisu Croffle', 'Tiramisu-flavored croffle with cocoa and cream.', 1, 'CROFFLES', '../../storage/backend/img/menu/croffles/tiramisu-croffles.png', 1),
(45, 'Biscoff Mini Donuts', 'Mini donuts covered with Biscoff spread.', 1, 'MINI DONUT', '../../storage/backend/img/menu/mini-donut/biscoff.png', 1),
(46, 'Chocolate Mini Donuts', 'Soft chocolate-flavored mini donuts, bite-sized delight.', 1, 'MINI DONUT', '../../storage/backend/img/menu/mini-donut/chocolate.png', 1),
(47, 'Nutella Mini Donuts', 'Mini donuts dipped in Nutella chocolate goodness.', 1, 'MINI DONUT', '../../storage/backend/img/menu/mini-donut/nutella.png', 1),
(48, 'Oreo Cream Mini Donuts', 'Mini donuts with Oreo cream topping.', 1, 'MINI DONUT', '../../storage/backend/img/menu/mini-donut/oreocream.png', 1),
(49, 'Strawberry', 'Truly a pure strawberry flavour', 1, 'MILKTEA', '../../storage/backend/img/menu_testing/strawberry-milk-tea-featured-image-1.jpg', 1),
(50, 'Strawberry Milktea', 'Enjoy the sweet blen of starberry', 1, 'MILKTEA', '../../storage/backend/img/menu_testing/strawberry-milk-tea-featured-image-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_sizes`
--

CREATE TABLE `menu_item_sizes` (
  `menu_item_size_id` int NOT NULL,
  `menu_item_id` int NOT NULL,
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_item_sizes`
--

INSERT INTO `menu_item_sizes` (`menu_item_size_id`, `menu_item_id`, `size`, `price`) VALUES
(1, 1, 'M', 59.00),
(2, 1, 'L', 69.00),
(3, 2, 'M', 119.00),
(4, 2, 'L', 129.00),
(5, 3, 'M', 79.00),
(6, 3, 'L', 89.00),
(7, 4, 'M', 89.00),
(8, 4, 'L', 99.00),
(9, 5, 'M', 89.00),
(10, 5, 'L', 99.00),
(11, 6, 'M', 109.00),
(12, 6, 'L', 119.00),
(13, 7, 'M', 40.00),
(14, 7, 'L', 50.00),
(15, 8, 'M', 40.00),
(16, 8, 'L', 50.00),
(17, 9, 'M', 50.00),
(18, 9, 'L', 60.00),
(19, 10, 'M', 40.00),
(20, 10, 'L', 50.00),
(21, 11, 'M', 40.00),
(22, 11, 'L', 50.00),
(23, 12, 'M', 40.00),
(24, 12, 'L', 50.00),
(25, 13, 'M', 50.00),
(26, 13, 'L', 60.00),
(27, 14, 'M', 40.00),
(28, 14, 'L', 50.00),
(29, 15, 'M', 40.00),
(30, 15, 'L', 50.00),
(31, 16, 'M', 60.00),
(32, 16, 'L', 70.00),
(33, 17, 'M', 60.00),
(34, 17, 'L', 70.00),
(35, 18, 'M', 60.00),
(36, 18, 'L', 70.00),
(37, 19, 'M', 60.00),
(38, 19, 'L', 70.00),
(39, 20, 'M', 90.00),
(40, 20, 'L', 100.00),
(41, 21, 'M', 80.00),
(42, 21, 'L', 90.00),
(43, 22, 'M', 80.00),
(44, 22, 'L', 90.00),
(45, 23, 'M', 80.00),
(46, 23, 'L', 90.00),
(47, 24, 'M', 60.00),
(48, 24, 'L', 70.00),
(49, 25, 'M', 40.00),
(50, 25, 'L', 50.00),
(51, 26, 'M', 40.00),
(52, 26, 'L', 50.00),
(53, 27, 'M', 40.00),
(54, 27, 'L', 50.00),
(55, 28, 'M', 40.00),
(56, 28, 'L', 50.00),
(57, 29, 'M', 65.00),
(58, 29, 'L', 75.00),
(59, 30, 'M', 65.00),
(60, 30, 'L', 75.00),
(61, 31, 'M', 65.00),
(62, 31, 'L', 75.00),
(63, 32, 'M', 65.00),
(64, 32, 'L', 75.00),
(65, 33, 'R', 80.00),
(66, 34, 'R', 100.00),
(67, 35, '6 Inches', 60.00),
(68, 36, '6 Inches', 65.00),
(69, 37, '6 Inches', 65.00),
(70, 38, 'R', 35.00),
(71, 39, 'R', 45.00),
(72, 40, 'R', 40.00),
(73, 41, 'Mini', 55.00),
(74, 41, 'Regular', 100.00),
(75, 42, 'Mini', 55.00),
(76, 42, 'Regular', 100.00),
(77, 43, 'Mini', 65.00),
(78, 43, 'Regular', 120.00),
(79, 44, 'Mini', 65.00),
(80, 44, 'Regular', 120.00),
(81, 45, '6pcs', 55.00),
(82, 45, '12pcs', 100.00),
(83, 46, '6pcs', 60.00),
(84, 46, '12pcs', 110.00),
(85, 47, '6pcs', 65.00),
(86, 47, '12pcs', 120.00),
(87, 48, '6pcs', 60.00),
(88, 48, '12pcs', 110.00),
(89, 49, 'M', 50.00),
(90, 49, 'L', 78.00),
(91, 50, 'M', 50.00),
(92, 50, 'XL', 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `transaction_id` int NOT NULL,
  `cart_id` int NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `transaction_id`, `cart_id`, `total_price`, `created_at`) VALUES
(8, 8, 8, 760.28, '2017-06-28 15:00:08'),
(9, 9, 9, 527.62, '2016-06-02 02:36:31'),
(10, 10, 10, 661.42, '2024-11-04 00:53:22'),
(11, 11, 11, 336.44, '2016-06-17 09:29:59'),
(12, 12, 12, 852.85, '2021-03-16 04:46:17'),
(13, 13, 13, 746.04, '2020-09-13 03:59:03'),
(14, 14, 14, 844.05, '2020-01-19 00:27:11'),
(15, 15, 15, 333.05, '2019-06-25 14:42:37'),
(16, 16, 16, 900.61, '2015-12-22 02:45:56'),
(17, 17, 17, 480.73, '2020-10-07 17:36:27'),
(18, 18, 18, 499.90, '2016-10-17 10:24:54'),
(19, 19, 19, 705.90, '2020-12-16 05:09:37'),
(20, 20, 20, 263.97, '2015-08-06 08:16:05'),
(21, 21, 21, 939.17, '2021-12-04 12:10:50'),
(22, 22, 22, 636.68, '2015-11-24 01:00:12'),
(23, 23, 23, 599.73, '2022-06-11 06:04:41'),
(24, 24, 24, 868.86, '2024-08-18 08:58:54'),
(25, 25, 25, 710.22, '2018-01-15 08:59:46'),
(26, 26, 26, 505.67, '2018-05-15 03:13:13'),
(27, 27, 27, 553.94, '2019-10-22 08:06:29'),
(28, 28, 28, 916.31, '2015-08-17 09:40:37'),
(29, 29, 29, 776.76, '2019-12-31 11:06:58'),
(30, 30, 30, 988.75, '2021-12-24 18:18:02'),
(31, 31, 31, 195.74, '2021-01-24 07:32:43'),
(32, 32, 32, 722.08, '2020-06-18 14:16:02'),
(33, 33, 33, 240.38, '2015-10-07 09:27:54'),
(34, 34, 34, 561.09, '2022-01-26 01:42:09'),
(35, 35, 35, 433.47, '2015-09-22 21:51:05'),
(36, 36, 36, 413.67, '2019-01-06 21:49:43'),
(37, 37, 37, 606.08, '2021-04-26 12:43:33'),
(38, 38, 38, 660.06, '2021-07-16 05:34:26'),
(39, 39, 39, 924.26, '2022-02-10 10:32:54'),
(40, 40, 40, 878.18, '2019-11-21 12:59:16'),
(41, 41, 41, 567.43, '2016-10-07 03:04:49'),
(42, 42, 42, 731.31, '2018-08-08 09:47:51'),
(43, 43, 43, 560.00, '2019-02-03 14:06:11'),
(44, 44, 44, 940.84, '2021-09-30 19:25:49'),
(45, 45, 45, 987.55, '2017-09-28 13:08:35'),
(46, 46, 46, 620.43, '2023-11-20 22:03:06'),
(47, 47, 47, 698.12, '2015-09-07 11:51:46'),
(48, 48, 48, 654.13, '2022-06-19 21:50:35'),
(49, 49, 49, 896.00, '2020-03-03 17:36:30'),
(50, 50, 50, 385.04, '2022-04-05 09:43:07'),
(51, 51, 51, 346.71, '2025-04-15 08:18:32'),
(52, 52, 52, 910.01, '2025-04-01 07:54:24'),
(53, 53, 53, 458.29, '2022-04-24 22:07:20'),
(54, 54, 54, 573.52, '2020-02-12 06:17:53'),
(55, 55, 55, 207.49, '2024-06-21 00:45:41'),
(56, 56, 56, 727.49, '2018-08-21 02:00:43'),
(57, 57, 57, 301.38, '2018-08-15 08:07:15'),
(58, 58, 58, 889.26, '2023-06-23 07:27:28'),
(59, 59, 59, 727.52, '2020-01-27 14:13:03'),
(60, 60, 60, 389.58, '2020-02-26 21:42:15'),
(61, 61, 61, 738.60, '2015-09-04 18:07:26'),
(62, 62, 62, 870.28, '2020-05-14 21:49:14'),
(63, 63, 63, 100.08, '2022-06-15 14:26:47'),
(64, 64, 64, 618.27, '2020-10-15 20:39:59'),
(65, 65, 65, 465.15, '2025-07-31 17:04:08'),
(66, 66, 66, 343.84, '2016-01-18 15:00:10'),
(67, 67, 67, 946.00, '2015-05-18 00:30:40'),
(68, 68, 68, 670.98, '2018-09-08 09:00:58'),
(69, 69, 69, 768.51, '2022-10-15 11:29:46'),
(70, 70, 70, 103.36, '2025-06-26 16:36:38'),
(71, 71, 71, 209.44, '2024-05-15 20:54:37'),
(72, 72, 72, 955.13, '2016-09-10 13:11:01'),
(73, 73, 73, 474.48, '2015-04-03 16:06:51'),
(74, 74, 74, 128.92, '2016-01-29 10:47:02'),
(75, 75, 75, 688.10, '2025-03-02 13:18:31'),
(76, 76, 76, 184.86, '2024-11-10 05:48:43'),
(77, 77, 77, 869.71, '2023-10-10 05:10:29'),
(78, 78, 78, 763.24, '2021-01-15 10:07:51'),
(79, 79, 79, 845.55, '2024-11-09 21:06:43'),
(80, 80, 80, 788.46, '2017-08-28 23:31:42'),
(81, 81, 81, 920.53, '2015-01-06 02:16:49'),
(82, 82, 82, 680.52, '2015-10-18 21:56:56'),
(83, 83, 83, 563.57, '2023-12-30 07:43:55'),
(84, 84, 84, 587.72, '2018-04-10 05:51:33'),
(85, 85, 85, 971.04, '2022-09-21 06:39:34'),
(86, 86, 86, 630.04, '2019-06-17 13:34:45'),
(87, 87, 87, 348.12, '2020-10-14 03:42:14'),
(88, 88, 88, 710.18, '2021-02-04 06:14:33'),
(89, 89, 89, 343.23, '2015-11-04 05:30:58'),
(90, 90, 90, 714.32, '2017-09-06 06:01:31'),
(91, 91, 91, 627.69, '2020-11-12 12:51:12'),
(92, 92, 92, 286.16, '2024-11-07 06:11:37'),
(93, 93, 93, 242.37, '2025-01-25 07:31:39'),
(94, 94, 94, 422.36, '2022-10-14 14:04:44'),
(95, 95, 95, 423.86, '2020-10-27 20:46:18'),
(96, 96, 96, 810.52, '2021-06-12 12:03:22'),
(97, 97, 97, 700.44, '2025-08-02 14:28:56'),
(98, 98, 98, 571.06, '2016-11-19 09:18:00'),
(99, 99, 99, 340.85, '2017-01-02 05:00:18'),
(100, 100, 100, 990.80, '2022-01-11 15:22:57'),
(101, 101, 102, 250.00, '2025-05-15 13:36:00'),
(102, 102, 103, 295.00, '2025-05-27 08:04:17'),
(103, 103, 104, 436.00, '2025-05-27 09:49:29'),
(104, 104, 105, 436.00, '2025-05-27 12:58:27'),
(105, 105, 106, 356.00, '2025-05-27 12:59:46'),
(106, 106, 107, 295.00, '2025-05-27 13:05:50'),
(107, 107, 108, 160.00, '2025-05-27 13:20:30'),
(108, 108, 109, 200.00, '2025-05-27 13:26:07'),
(109, 109, 110, 200.00, '2025-05-27 13:28:42'),
(110, 110, 111, 200.00, '2025-05-27 13:35:18'),
(111, 111, 112, 200.00, '2025-05-27 13:43:19'),
(112, 112, 113, 240.00, '2025-05-27 14:17:18'),
(113, 113, 114, 200.00, '2025-05-28 12:35:55'),
(114, 114, 115, 200.00, '2025-05-28 12:52:23'),
(115, 115, 116, 356.00, '2025-05-28 13:15:02'),
(116, 116, 117, 1335.00, '2025-05-28 15:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_requests`
--

CREATE TABLE `password_reset_requests` (
  `password_reset_request_id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token_selector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token_validate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exp_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `rider_id` int DEFAULT NULL,
  `discount_id` int DEFAULT NULL,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount_due` decimal(11,2) NOT NULL,
  `amount_tendered` decimal(11,2) DEFAULT NULL,
  `change` decimal(11,2) DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_proof_dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery_proof_dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_id`, `rider_id`, `discount_id`, `payment_method`, `amount_due`, `amount_tendered`, `change`, `location`, `status`, `payment_proof_dir`, `delivery_proof_dir`, `created_at`, `confirmed_at`, `delivered_at`) VALUES
(8, 35, 101, NULL, 'GCASH', 920.80, 1090.22, 169.42, NULL, 'Delivered', NULL, NULL, '2018-05-21 11:28:06', NULL, NULL),
(9, 31, 103, NULL, 'GCASH', 999.55, 1110.77, 111.22, NULL, 'Delivered', NULL, NULL, '2024-04-08 20:29:23', NULL, NULL),
(10, 18, 101, NULL, 'COD', 157.41, 261.17, 103.76, NULL, 'Delivered', NULL, NULL, '2024-12-19 18:34:55', NULL, NULL),
(11, 49, 101, NULL, 'COD', 246.97, 385.30, 138.33, NULL, 'Delivered', NULL, NULL, '2021-11-03 04:21:32', NULL, NULL),
(12, 17, 101, NULL, 'COD', 972.69, 996.08, 23.39, NULL, 'Delivered', NULL, NULL, '2022-03-09 16:41:31', NULL, NULL),
(13, 10, 101, NULL, 'COD', 780.05, 908.99, 128.94, NULL, 'Delivered', NULL, NULL, '2018-01-13 16:10:43', NULL, NULL),
(14, 40, 101, NULL, 'COD', 664.92, 811.23, 146.31, NULL, 'Delivered', NULL, NULL, '2020-12-17 12:13:36', NULL, NULL),
(15, 31, 102, NULL, 'COD', 112.85, 221.58, 108.73, NULL, 'Delivered', NULL, NULL, '2015-12-24 12:56:37', NULL, NULL),
(16, 43, 102, NULL, 'GCASH', 623.36, 635.26, 11.90, NULL, 'Delivered', NULL, NULL, '2016-04-15 00:20:50', NULL, NULL),
(17, 30, 101, NULL, 'GCASH', 874.54, 936.38, 61.84, NULL, 'Delivered', NULL, NULL, '2016-11-03 22:39:21', NULL, NULL),
(18, 15, 101, NULL, 'GCASH', 115.92, 236.90, 120.98, NULL, 'Delivered', NULL, NULL, '2022-06-18 16:38:09', NULL, NULL),
(19, 49, 101, NULL, 'GCASH', 713.06, 814.11, 101.05, NULL, 'Delivered', NULL, NULL, '2017-08-02 00:26:22', NULL, NULL),
(20, 6, 101, NULL, 'COD', 986.49, 1019.92, 33.43, NULL, 'Delivered', NULL, NULL, '2022-08-25 18:27:06', NULL, NULL),
(21, 28, 103, NULL, 'GCASH', 225.24, 390.20, 164.96, NULL, 'Delivered', NULL, NULL, '2023-08-24 16:07:05', NULL, NULL),
(22, 37, 102, NULL, 'COD', 950.46, 992.74, 42.28, NULL, 'Delivered', NULL, NULL, '2017-04-17 07:31:59', NULL, NULL),
(23, 26, 103, NULL, 'COD', 501.37, 513.01, 11.64, NULL, 'Delivered', NULL, NULL, '2017-07-08 04:12:24', NULL, NULL),
(24, 35, 103, NULL, 'GCASH', 434.02, 551.80, 117.78, NULL, 'Delivered', NULL, NULL, '2017-11-09 18:34:06', NULL, NULL),
(25, 28, 102, NULL, 'COD', 533.90, 624.79, 90.89, NULL, 'Delivered', NULL, NULL, '2018-12-02 19:38:36', NULL, NULL),
(26, 18, 103, NULL, 'COD', 610.61, 634.10, 23.49, NULL, 'Delivered', NULL, NULL, '2020-02-01 18:08:11', NULL, NULL),
(27, 46, 102, NULL, 'GCASH', 950.74, 972.23, 21.49, NULL, 'Delivered', NULL, NULL, '2015-02-26 18:04:30', NULL, NULL),
(28, 42, 102, NULL, 'GCASH', 703.71, 844.09, 140.38, NULL, 'Delivered', NULL, NULL, '2021-11-07 14:49:10', NULL, NULL),
(29, 13, 103, NULL, 'COD', 305.41, 503.93, 198.52, NULL, 'Delivered', NULL, NULL, '2021-06-06 18:50:32', NULL, NULL),
(30, 23, 103, NULL, 'COD', 281.09, 407.34, 126.25, NULL, 'Delivered', NULL, NULL, '2019-07-22 14:19:51', NULL, NULL),
(31, 48, 102, NULL, 'COD', 647.09, 802.18, 155.09, NULL, 'Delivered', NULL, NULL, '2021-10-08 08:23:15', NULL, NULL),
(32, 30, 101, NULL, 'GCASH', 548.32, 703.89, 155.57, NULL, 'Delivered', NULL, NULL, '2022-05-19 23:14:13', NULL, NULL),
(33, 33, 103, NULL, 'COD', 474.34, 582.10, 107.76, NULL, 'Delivered', NULL, NULL, '2021-01-24 01:11:35', NULL, NULL),
(34, 47, 101, NULL, 'COD', 293.06, 377.63, 84.57, NULL, 'Delivered', NULL, NULL, '2016-04-23 04:47:15', NULL, NULL),
(35, 19, 101, NULL, 'GCASH', 927.18, 1113.66, 186.48, NULL, 'Delivered', NULL, NULL, '2017-12-10 15:24:48', NULL, NULL),
(36, 42, 102, NULL, 'COD', 398.78, 534.77, 135.99, NULL, 'Delivered', NULL, NULL, '2019-02-27 11:29:05', NULL, NULL),
(37, 29, 102, NULL, 'GCASH', 738.86, 843.98, 105.12, NULL, 'Delivered', NULL, NULL, '2016-02-02 02:49:28', NULL, NULL),
(38, 22, 103, NULL, 'COD', 709.33, 858.03, 148.70, NULL, 'Delivered', NULL, NULL, '2022-11-15 03:18:24', NULL, NULL),
(39, 17, 101, NULL, 'GCASH', 715.25, 857.46, 142.21, NULL, 'Delivered', NULL, NULL, '2019-02-20 16:07:40', NULL, NULL),
(40, 35, 103, NULL, 'GCASH', 539.79, 733.78, 193.99, NULL, 'Delivered', NULL, NULL, '2017-05-10 14:42:49', NULL, NULL),
(41, 28, 102, NULL, 'GCASH', 358.00, 501.35, 143.35, NULL, 'Delivered', NULL, NULL, '2021-03-05 00:11:00', NULL, NULL),
(42, 8, 101, NULL, 'COD', 545.30, 679.55, 134.25, NULL, 'Delivered', NULL, NULL, '2023-06-29 14:49:29', NULL, NULL),
(43, 48, 101, NULL, 'COD', 480.62, 595.57, 114.95, NULL, 'Delivered', NULL, NULL, '2022-03-22 15:17:17', NULL, NULL),
(44, 48, 103, NULL, 'COD', 889.70, 1025.99, 136.29, NULL, 'Delivered', NULL, NULL, '2019-07-07 00:51:56', NULL, NULL),
(45, 24, 102, NULL, 'COD', 312.58, 497.89, 185.31, NULL, 'Delivered', NULL, NULL, '2023-08-03 05:13:27', NULL, NULL),
(46, 18, 101, NULL, 'GCASH', 319.86, 339.35, 19.49, NULL, 'Delivered', NULL, NULL, '2025-08-01 13:21:05', NULL, NULL),
(47, 28, 102, NULL, 'GCASH', 786.97, 958.34, 171.37, NULL, 'Delivered', NULL, NULL, '2024-10-16 06:05:51', NULL, NULL),
(48, 30, 103, NULL, 'GCASH', 726.96, 770.08, 43.12, NULL, 'Delivered', NULL, NULL, '2023-12-15 11:54:13', NULL, NULL),
(49, 49, 102, NULL, 'GCASH', 281.41, 300.97, 19.56, NULL, 'Delivered', NULL, NULL, '2022-08-25 05:19:24', NULL, NULL),
(50, 20, 102, NULL, 'GCASH', 498.46, 696.13, 197.67, NULL, 'Delivered', NULL, NULL, '2018-10-22 04:29:00', NULL, NULL),
(51, 7, 103, NULL, 'GCASH', 286.92, 385.93, 99.01, NULL, 'Delivered', NULL, NULL, '2024-10-31 06:56:16', NULL, NULL),
(52, 41, 102, NULL, 'GCASH', 210.07, 233.13, 23.06, NULL, 'Delivered', NULL, NULL, '2021-08-23 00:09:09', NULL, NULL),
(53, 43, 101, NULL, 'COD', 800.17, 897.10, 96.93, NULL, 'Delivered', NULL, NULL, '2022-04-09 06:32:40', NULL, NULL),
(54, 2, 102, NULL, 'GCASH', 875.82, 945.29, 69.47, NULL, 'Delivered', NULL, NULL, '2022-11-16 10:27:01', NULL, NULL),
(55, 7, 101, NULL, 'COD', 788.78, 866.14, 77.36, NULL, 'Delivered', NULL, NULL, '2022-02-27 08:41:10', NULL, NULL),
(56, 43, 103, NULL, 'GCASH', 404.10, 525.34, 121.24, NULL, 'Delivered', NULL, NULL, '2021-01-15 06:10:55', NULL, NULL),
(57, 12, 101, NULL, 'GCASH', 540.12, 717.92, 177.80, NULL, 'Delivered', NULL, NULL, '2020-08-29 07:06:21', NULL, NULL),
(58, 19, 101, NULL, 'COD', 135.63, 326.09, 190.46, NULL, 'Delivered', NULL, NULL, '2017-03-29 07:57:40', NULL, NULL),
(59, 27, 103, NULL, 'GCASH', 847.44, 999.95, 152.51, NULL, 'Delivered', NULL, NULL, '2019-09-12 10:16:08', NULL, NULL),
(60, 40, 102, NULL, 'GCASH', 301.10, 349.77, 48.67, NULL, 'Delivered', NULL, NULL, '2020-12-02 13:28:43', NULL, NULL),
(61, 46, 101, NULL, 'COD', 621.55, 634.03, 12.48, NULL, 'Delivered', NULL, NULL, '2023-08-19 21:58:57', NULL, NULL),
(62, 15, 102, NULL, 'GCASH', 574.72, 620.13, 45.41, NULL, 'Delivered', NULL, NULL, '2021-02-16 16:45:58', NULL, NULL),
(63, 30, 103, NULL, 'COD', 780.02, 937.67, 157.65, NULL, 'Delivered', NULL, NULL, '2016-05-03 13:30:17', NULL, NULL),
(64, 24, 102, NULL, 'GCASH', 405.43, 576.99, 171.56, NULL, 'Delivered', NULL, NULL, '2021-06-25 17:47:37', NULL, NULL),
(65, 23, 102, NULL, 'GCASH', 202.14, 284.57, 82.43, NULL, 'Delivered', NULL, NULL, '2017-04-07 16:36:08', NULL, NULL),
(66, 41, 101, NULL, 'COD', 303.37, 305.15, 1.78, NULL, 'Delivered', NULL, NULL, '2015-05-06 00:40:22', NULL, NULL),
(67, 22, 102, NULL, 'GCASH', 649.77, 790.38, 140.61, NULL, 'Delivered', NULL, NULL, '2022-08-06 23:30:05', NULL, NULL),
(68, 1, 101, NULL, 'COD', 344.38, 479.84, 135.46, NULL, 'Delivered', NULL, NULL, '2020-09-27 18:00:02', NULL, NULL),
(69, 22, 103, NULL, 'COD', 303.95, 306.10, 2.15, NULL, 'Delivered', NULL, NULL, '2018-10-03 19:26:12', NULL, NULL),
(70, 22, 102, NULL, 'GCASH', 831.22, 896.99, 65.77, NULL, 'Delivered', NULL, NULL, '2023-06-28 02:44:47', NULL, NULL),
(71, 35, 102, NULL, 'COD', 431.28, 463.37, 32.09, NULL, 'Delivered', NULL, NULL, '2025-07-20 07:26:57', NULL, NULL),
(72, 41, 101, NULL, 'COD', 879.15, 1026.13, 146.98, NULL, 'Delivered', NULL, NULL, '2015-03-03 09:55:52', NULL, NULL),
(73, 23, 101, NULL, 'GCASH', 390.94, 448.29, 57.35, NULL, 'Delivered', NULL, NULL, '2015-10-18 17:45:34', NULL, NULL),
(74, 50, 101, NULL, 'GCASH', 838.12, 907.63, 69.51, NULL, 'Delivered', NULL, NULL, '2016-10-12 13:06:12', NULL, NULL),
(75, 2, 102, NULL, 'GCASH', 875.04, 1036.83, 161.79, NULL, 'Delivered', NULL, NULL, '2025-01-29 06:41:58', NULL, NULL),
(76, 43, 102, NULL, 'COD', 960.28, 1040.86, 80.58, NULL, 'Delivered', NULL, NULL, '2022-09-23 14:36:56', NULL, NULL),
(77, 3, 102, NULL, 'COD', 478.65, 577.41, 98.76, NULL, 'Delivered', NULL, NULL, '2017-10-01 09:44:26', NULL, NULL),
(78, 46, 101, NULL, 'COD', 268.25, 290.43, 22.18, NULL, 'Delivered', NULL, NULL, '2019-01-08 12:38:39', NULL, NULL),
(79, 24, 101, NULL, 'GCASH', 899.95, 1038.04, 138.09, NULL, 'Delivered', NULL, NULL, '2016-11-01 12:41:54', NULL, NULL),
(80, 42, 101, NULL, 'GCASH', 173.61, 323.99, 150.38, NULL, 'Delivered', NULL, NULL, '2016-08-02 12:13:40', NULL, NULL),
(81, 7, 101, NULL, 'COD', 569.58, 650.11, 80.53, NULL, 'Delivered', NULL, NULL, '2022-03-01 08:37:28', NULL, NULL),
(82, 13, 103, NULL, 'GCASH', 875.42, 959.04, 83.62, NULL, 'Delivered', NULL, NULL, '2016-04-07 20:30:01', NULL, NULL),
(83, 47, 101, NULL, 'COD', 670.26, 700.42, 30.16, NULL, 'Delivered', NULL, NULL, '2020-03-29 20:56:58', NULL, NULL),
(84, 14, 102, NULL, 'GCASH', 892.73, 976.23, 83.50, NULL, 'Delivered', NULL, NULL, '2015-11-19 06:29:21', NULL, NULL),
(85, 45, 102, NULL, 'GCASH', 641.35, 736.29, 94.94, NULL, 'Delivered', NULL, NULL, '2023-11-26 19:49:10', NULL, NULL),
(86, 47, 103, NULL, 'COD', 282.11, 411.83, 129.72, NULL, 'Delivered', NULL, NULL, '2018-10-15 08:30:11', NULL, NULL),
(87, 18, 101, NULL, 'COD', 656.56, 680.07, 23.51, NULL, 'Delivered', NULL, NULL, '2023-12-03 19:33:12', NULL, NULL),
(88, 31, 103, NULL, 'GCASH', 505.60, 608.44, 102.84, NULL, 'Delivered', NULL, NULL, '2018-08-30 23:09:22', NULL, NULL),
(89, 48, 101, NULL, 'GCASH', 527.66, 635.89, 108.23, NULL, 'Delivered', NULL, NULL, '2025-05-05 15:10:47', NULL, NULL),
(90, 3, 102, NULL, 'COD', 172.22, 315.01, 142.79, NULL, 'Delivered', NULL, NULL, '2025-02-26 00:05:39', NULL, NULL),
(91, 21, 102, NULL, 'COD', 377.07, 557.91, 180.84, NULL, 'Delivered', NULL, NULL, '2024-04-30 15:14:27', NULL, NULL),
(92, 8, 103, NULL, 'COD', 231.34, 277.45, 46.11, NULL, 'Delivered', NULL, NULL, '2018-01-10 22:13:27', NULL, NULL),
(93, 3, 101, NULL, 'COD', 883.56, 1048.32, 164.76, NULL, 'Delivered', NULL, NULL, '2017-01-20 11:01:15', NULL, NULL),
(94, 4, 102, NULL, 'COD', 271.56, 410.03, 138.47, NULL, 'Delivered', NULL, NULL, '2019-11-13 19:07:03', NULL, NULL),
(95, 11, 103, NULL, 'COD', 471.19, 665.15, 193.96, NULL, 'Delivered', NULL, NULL, '2022-04-11 22:01:27', NULL, NULL),
(96, 44, 101, NULL, 'GCASH', 802.97, 817.53, 14.56, NULL, 'Delivered', NULL, NULL, '2023-10-10 14:28:02', NULL, NULL),
(97, 21, 101, NULL, 'COD', 391.78, 410.57, 18.79, NULL, 'Delivered', NULL, NULL, '2023-08-12 05:28:40', NULL, NULL),
(98, 16, 102, NULL, 'GCASH', 800.92, 972.55, 171.63, NULL, 'Delivered', NULL, NULL, '2025-03-09 17:05:34', NULL, NULL),
(99, 48, 103, NULL, 'COD', 413.00, 544.45, 131.45, NULL, 'Delivered', NULL, NULL, '2024-04-21 13:14:49', NULL, NULL),
(100, 15, 102, NULL, 'GCASH', 259.00, 424.91, 165.91, NULL, 'Delivered', NULL, NULL, '2024-10-05 19:57:15', NULL, NULL),
(101, 106, 107, NULL, 'GCASH', 300.00, 330.00, 30.00, 'Blk J1 Lot 14, Fatima Rd, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Delivered', '../../storage/backend/img/proof_of_payment/proof-of-payment.png', '../../storage/backend/img/delivery_proof/delivery-proof.jpg', '2025-05-15 13:36:00', '2025-05-15 14:00:29', '2025-05-15 14:02:00'),
(102, 106, NULL, NULL, 'COD', 345.00, NULL, NULL, 'Blk J1 Lot 14, Fatima Rd, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Cancelled', NULL, NULL, '2025-05-27 08:04:17', '2025-05-28 12:45:34', NULL),
(103, 106, NULL, NULL, 'COD', 486.00, NULL, NULL, 'Blk J1 Lot 14, Fatima Rd, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Rejected by Employee', NULL, NULL, '2025-05-27 09:49:29', '2025-05-27 12:59:18', NULL),
(104, 108, NULL, NULL, 'COD', 486.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Rejected by Employee', NULL, NULL, '2025-05-27 12:58:27', '2025-05-27 12:59:18', NULL),
(105, 108, NULL, NULL, 'COD', 406.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Rejected by Employee', NULL, NULL, '2025-05-27 12:59:46', '2025-05-27 12:59:53', NULL),
(106, 108, NULL, NULL, 'COD', 345.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Rejected by Employee Toche', NULL, NULL, '2025-05-27 13:05:50', '2025-05-27 13:06:34', NULL),
(107, 108, NULL, NULL, 'COD', 210.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Cancelled Toche', NULL, NULL, '2025-05-27 13:20:30', '2025-05-27 13:25:22', NULL),
(108, 108, NULL, NULL, 'COD', 250.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Cancelled Toche', NULL, NULL, '2025-05-27 13:26:07', '2025-05-27 13:27:26', NULL),
(109, 108, NULL, NULL, 'COD', 250.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Cancelled', NULL, NULL, '2025-05-27 13:28:42', '2025-05-27 13:29:18', NULL),
(110, 108, NULL, NULL, 'COD', 250.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Rejected by Employee Toche', NULL, NULL, '2025-05-27 13:35:18', '2025-05-27 13:35:39', NULL),
(111, 108, NULL, NULL, 'COD', 250.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Approved by Employee', NULL, NULL, '2025-05-27 13:43:19', '2025-05-27 14:01:22', NULL),
(112, 108, 107, NULL, 'COD', 290.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Approved by Employee Toche', NULL, NULL, '2025-05-27 14:17:18', '2025-05-27 14:48:36', NULL),
(113, 106, NULL, NULL, 'COD', 250.00, NULL, NULL, 'Blk J1 Lot 14, Fatima Rd, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Rejected by Employee Toche', NULL, NULL, '2025-05-28 12:35:55', '2025-05-28 12:51:28', NULL),
(114, 106, 107, NULL, 'COD', 250.00, NULL, NULL, 'Blk J1 Lot 14, Fatima Rd, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Cancelled', NULL, NULL, '2025-05-28 12:52:23', '2025-05-28 13:16:08', NULL),
(115, 108, NULL, NULL, 'COD', 406.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Cancelled', NULL, NULL, '2025-05-28 13:15:02', '2025-05-28 13:20:04', NULL),
(116, 108, NULL, NULL, 'COD', 1375.00, NULL, NULL, 'Blk J1 Lot 14, San Francisco 2, Dasmariñas, Cavite, 4A, 4114', 'Pending', NULL, NULL, '2025-05-28 15:12:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `house_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `barangay` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `region` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `postal_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `profile_dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `contact_number`, `gender`, `age`, `date_of_birth`, `role`, `house_number`, `street`, `barangay`, `city`, `province`, `region`, `postal_code`, `available`, `verified`, `profile_dir`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amanda', 'Johnson', 'user1', 'user1@example.com', '$2b$12$85YobYNDO3Ma1/H8.iaSn.5uG9WZ7NfV0xgBstnQN1oaMejEpMmye', '618-940-3317x88465', 'Female', 38, '1987-02-20', 'Customer', '554', 'Brandi Rue', 'College', 'Port Miguelland', 'Rhode Island', 'Region IV-A', '7083', NULL, 1, NULL, 1, '2020-06-07 09:35:22', NULL),
(2, 'Cheyenne', 'Bauer', 'user2', 'user2@example.com', '$2b$12$KHAcArSw6uEUFvqHGSAhk.Q2K1Q/t1YV2O2iIFc2P7cjZqzVGDd.S', '001-142-075-0815x8772', 'Female', 35, '1989-08-02', 'Customer', '579', 'Timothy Island', 'Could', 'South Pamela', 'Nebraska', 'Region IV-A', '7375', NULL, 1, NULL, 1, '2015-11-20 10:27:52', NULL),
(3, 'Adriana', 'Hendricks', 'user3', 'user3@example.com', '$2b$12$0SAaA4hNCktLfQes9ptlZe4C6Gzgzz.wJryjcSVHqAVx4EDNgXSPO', '538-673-1901x68321', 'Male', 51, '1974-03-17', 'Customer', '373', 'Rodney Manors', 'From', 'Andrewside', 'Utah', 'Region IV-A', '4271', NULL, 1, NULL, 1, '2016-09-11 22:04:38', NULL),
(4, 'Nicole', 'Rice', 'user4', 'user4@example.com', '$2b$12$muJWEGoUbq/X/z2ZMchR5.2AsMhfX/vaEzuNB8To2599LYrDlSfF.', '001-994-824-6774x264', 'Female', 31, '1993-10-07', 'Customer', '684', 'Carolyn Isle', 'More', 'New Ericview', 'Wyoming', 'Region IV-A', '3234', NULL, 1, NULL, 1, '2015-10-02 18:37:19', NULL),
(5, 'Jennifer', 'Nguyen', 'user5', 'user5@example.com', '$2b$12$v8N/vsQQX/5pVNOIAgO/recnfCwHAcigroJKsOFUaDCMPS/Ym7l1e', '109-498-1049', 'Male', 25, '1999-09-11', 'Customer', '14', 'Conner Spur', 'Local', 'New Toniview', 'Indiana', 'Region IV-A', '5413', NULL, 1, NULL, 1, '2021-02-26 11:59:28', NULL),
(6, 'Christopher', 'Ward', 'user6', 'user6@example.com', '$2b$12$AC8G4UgeHyZ95bJSqXU6YeG1ywYUIxCihvEuo5uiltEx9PFF8exh6', '(497)021-5884x68481', 'Female', 43, '1981-06-19', 'Customer', '515', 'Crane Dale', 'Really', 'West Williamfurt', 'Texas', 'Region IV-A', '2536', NULL, 1, NULL, 1, '2019-01-13 09:54:06', NULL),
(7, 'Karen', 'Brock', 'user7', 'user7@example.com', '$2b$12$Lifs9Yk4QhwH.XwtdoNw2ek1OHF2IXMz.m0p4P/yZepptgwzVJgnK', '+1-903-298-3318x964', 'Female', 58, '1966-08-04', 'Customer', '921', 'Victor Tunnel', 'Husband', 'Clarkshire', 'South Dakota', 'Region IV-A', '7068', NULL, 1, NULL, 1, '2024-10-29 02:59:28', NULL),
(8, 'Sarah', 'Jackson', 'user8', 'user8@example.com', '$2b$12$AqbhyqXK8LyHtdqG7cEVYuelviN90erehIctYT219m9kQA0b1ceOa', '001-004-400-3730', 'Female', 60, '1965-04-09', 'Customer', '596', 'Rodriguez Ville', 'Ten', 'Torresview', 'Connecticut', 'Region IV-A', '4440', NULL, 1, NULL, 1, '2022-05-08 00:01:17', NULL),
(9, 'Ashlee', 'Moon', 'user9', 'user9@example.com', '$2b$12$NXNo/GRPrdQYZzuJlRrm..6YF4HyMxnTMj94MHMoiR/zv4ary89aS', '+1-891-795-6472x2081', 'Male', 35, '1989-10-29', 'Customer', '969', 'Vaughn Mission', 'Red', 'Parkertown', 'Kentucky', 'Region IV-A', '5522', NULL, 1, NULL, 1, '2021-04-27 07:56:49', NULL),
(10, 'Amy', 'Proctor', 'user10', 'user10@example.com', '$2b$12$j/.QnmPKkfdpYrMwaqBmXe/./crarT6wH.ZKtZr4NucmteOIsrbH2', '575.472.2716', 'Female', 26, '1999-03-17', 'Customer', '635', 'Maddox Valleys', 'Interest', 'Lake Valerie', 'Pennsylvania', 'Region IV-A', '3126', NULL, 1, NULL, 1, '2021-12-25 19:29:06', NULL),
(11, 'William', 'Gallegos', 'user11', 'user11@example.com', '$2b$12$YykAai81xVwEbbxf4FpTwO.lQ3VeW4KMEl/AnRTNAYKhTv9FbdzrG', '+1-288-970-8528', 'Female', 59, '1965-11-05', 'Customer', '172', 'Michael Point', 'Price', 'Wendyview', 'Arizona', 'Region IV-A', '3150', NULL, 1, NULL, 1, '2020-10-25 10:10:27', NULL),
(12, 'Anna', 'Jones', 'user12', 'user12@example.com', '$2b$12$SfGqMLPgZamytEtBxlgBNuJsIXPFbWIcM6Haj36xWFMI3O0P7AfMa', '001-588-805-9788', 'Male', 39, '1986-02-23', 'Customer', '53', 'Richmond Junction', 'Make', 'Daleborough', 'Oklahoma', 'Region IV-A', '8593', NULL, 1, NULL, 1, '2023-09-16 16:44:37', NULL),
(13, 'Tanya', 'Taylor', 'user13', 'user13@example.com', '$2b$12$tR7PzoPsrFInUl2U.a87ouayrIh.ZSha2Sd.CVoXyNgrj6RQZ6jUC', '8893742555', 'Male', 56, '1969-02-05', 'Employee', '975', 'Gloria Creek', 'Become', 'New Sarahaven', 'Utah', 'Region IV-A', '7349', NULL, 1, NULL, 0, '2015-07-20 09:49:36', NULL),
(14, 'Kristin', 'Mann', 'user14', 'user14@example.com', '$2b$12$WDrJGIpYNxA1dBLbW/BsJeNVxYEV48b7VQOgPGGPoovLK1xyxjeR.', '+1-090-171-2480x06211', 'Female', 25, '1999-07-12', 'Customer', '16', 'Jennifer Circle', 'Participant', 'Joelborough', 'Maryland', 'Region IV-A', '9936', NULL, 1, NULL, 1, '2018-07-30 16:35:57', NULL),
(15, 'Maurice', 'Chaney', 'user15', 'user15@example.com', '$2b$12$gCEg04zO2ueEJP3b481vAOBs2Evb0iij0QAz.Ol0eFS7ESdG/IG0q', '718-928-4979', 'Female', 32, '1992-11-18', 'Customer', '635', 'Evans Point', 'Course', 'Knoxview', 'Maine', 'Region IV-A', '5961', NULL, 1, NULL, 1, '2015-05-30 11:45:03', NULL),
(16, 'Dennis', 'Maynard', 'user16', 'user16@example.com', '$2b$12$JfDdD2hwq2edX9GKf0cQh.Zp0cvFVsWxFHesFJvb/kHKPSUFP6V3u', '985-913-9380x38925', 'Male', 49, '1976-01-14', 'Customer', '860', 'Pittman Haven', 'Measure', 'Bradleytown', 'New Jersey', 'Region IV-A', '8115', NULL, 1, NULL, 1, '2021-06-03 04:44:30', NULL),
(17, 'David', 'Fuentes', 'user17', 'user17@example.com', '$2b$12$e0TkpDimyX8lthrSQngzfOzCrR7NevUbMHNwsKtTc3Hc3YF6Uhvhm', '741-757-0246x028', 'Female', 25, '1999-06-16', 'Customer', '42', 'Moody Via', 'Or', 'Kirkhaven', 'West Virginia', 'Region IV-A', '8687', NULL, 1, NULL, 1, '2016-10-13 11:05:43', NULL),
(18, 'Kevin', 'Robinson', 'user18', 'user18@example.com', '$2b$12$Z2yraWpABHjlE1HNpz3gWuyFsMCgKQI6Csv82pPuNhipe.Z.D5Bme', '229.448.2133x1058', 'Female', 59, '1965-08-14', 'Customer', '856', 'Aaron Forges', 'Few', 'East Matthew', 'Florida', 'Region IV-A', '7069', NULL, 1, NULL, 1, '2021-05-09 09:19:47', NULL),
(19, 'David', 'Cain', 'user19', 'user19@example.com', '$2b$12$98s.xc9q/mp1Bt.wYF.qBOgtuFjj6HByN2Op1YUlEfjysuiOQRVsa', '783-742-6467', 'Female', 26, '1998-09-29', 'Customer', '140', 'King Course', 'Human', 'Chelseyville', 'Nebraska', 'Region IV-A', '3197', NULL, 1, NULL, 1, '2019-10-27 01:40:33', NULL),
(20, 'Joseph', 'Kennedy', 'user20', 'user20@example.com', '$2b$12$cM5zwCBnZBPe2fil/TR9YuRSZK8vE5.ny0kvezlO5Vzi/7M0BHnV6', '(443)088-5068x99148', 'Male', 42, '1982-06-01', 'Customer', '610', 'Sweeney Knolls', 'Discover', 'South Jack', 'Georgia', 'Region IV-A', '5504', NULL, 1, NULL, 1, '2015-06-12 05:19:42', NULL),
(21, 'Sarah', 'Nguyen', 'user21', 'user21@example.com', '$2b$12$uyUSkiAt6F2Bwgn4lP6YeeWvDoMLdiijKL2BZh.AVenP8tJyfNdte', '8809548134', 'Male', 45, '1979-05-13', 'Customer', '747', 'Kylie Avenue', 'Fund', 'Nicolemouth', 'Michigan', 'Region IV-A', '3954', NULL, 1, NULL, 1, '2020-08-11 07:48:23', NULL),
(22, 'Mark', 'Alvarez', 'user22', 'user22@example.com', '$2b$12$26G0iPEMjRHJgdar5H.HUeEgRXejYimBpZ5NSVQQFnkykF7AW51by', '795.537.1562x201', 'Male', 50, '1974-07-03', 'Customer', '977', 'Roberts Prairie', 'Store', 'West Sarahburgh', 'Louisiana', 'Region IV-A', '4500', NULL, 1, NULL, 1, '2020-07-05 20:46:50', NULL),
(23, 'Emily', 'Chambers', 'user23', 'user23@example.com', '$2b$12$TJJeAPxy5c48wz4Cp3NT9OtU.TcscLeAkaTWQcKMQ.HQJb33JY84m', '585.291.6681x846', 'Male', 30, '1995-02-04', 'Customer', '71', 'Garrett Spur', 'North', 'South Anitafurt', 'Virginia', 'Region IV-A', '5755', NULL, 1, NULL, 1, '2016-04-24 01:55:44', NULL),
(24, 'Laura', 'Hernandez', 'user24', 'user24@example.com', '$2b$12$2MVTYPd0zFJ3U.WTDSf.ievC9w.rqMayNXZk.Mu0aeICuLXSkiCe.', '045.668.0799', 'Male', 24, '2000-05-05', 'Employee', '764', 'William Ports', 'Future', 'West Alan', 'Indiana', 'Region IV-A', '1362', NULL, 1, NULL, 1, '2017-10-11 06:59:10', NULL),
(25, 'Nichole', 'Morgan', 'user25', 'user25@example.com', '$2b$12$0vKYaCKjKOCnd5wWeh4tUOEtBhgYmlioa7hOIsvcJ4EoiQ1b1McO6', '001-405-927-7766x299', 'Female', 20, '2004-12-01', 'Employee', '642', 'Estrada Lodge', 'Time', 'Thomasmouth', 'Iowa', 'Region IV-A', '5991', NULL, 1, NULL, 1, '2017-01-14 23:46:15', NULL),
(26, 'Wendy', 'Stone', 'user26', 'user26@example.com', '$2b$12$9fUc8fkhgrQP2Bp8EcKK1e1gKIP3AjZS8rQcuOLaK3zhg4cig1RuO', '001-647-597-8785x61103', 'Male', 39, '1986-05-02', 'Employee', '873', 'Elizabeth Drives', 'Continue', 'North Chelsea', 'Rhode Island', 'Region IV-A', '3617', NULL, 1, NULL, 1, '2018-12-25 01:16:51', NULL),
(27, 'Martin', 'Young', 'user27', 'user27@example.com', '$2b$12$EFkTNV91bU2uY/bFMXW2V.LWqtuoOuIsoOv/t18hY7COJRGEait42', '958-386-8351x12883', 'Female', 26, '1998-12-17', 'Customer', '169', 'Harding Extension', 'Relate', 'Lake Tylerfort', 'Kansas', 'Region IV-A', '1424', NULL, 1, NULL, 1, '2021-01-15 23:39:46', NULL),
(28, 'Christy', 'Ruiz', 'user28', 'user28@example.com', '$2b$12$Ofvic2Z8Qt.4.SmpfyBfQ.dkEAnkBC1f6sBddIjY6QB9LknBnFw5m', '+1-169-877-9772x702', 'Female', 36, '1988-05-05', 'Customer', '35', 'Bryan Creek', 'Man', 'Heatherborough', 'Ohio', 'Region IV-A', '7478', NULL, 1, NULL, 1, '2024-11-22 06:54:02', NULL),
(29, 'Melissa', 'Barker', 'user29', 'user29@example.com', '$2b$12$4glfCwtsGpK2b43H10ChX.Ne9gvJDzhXdlBgG62Mrh417jTFlWM76', '249.912.9669', 'Female', 50, '1974-08-20', 'Customer', '23', 'Francis Ways', 'Weight', 'Nancymouth', 'Rhode Island', 'Region IV-A', '3999', NULL, 1, NULL, 1, '2019-09-12 21:22:56', NULL),
(30, 'Nicholas', 'Franco', 'user30', 'user30@example.com', '$2b$12$8GgNO/HlgeuzmCI2JaRa2OUqVcPtVI7dgfgcFX4k2rjnbxXWgCKVq', '+1-712-857-4195x92035', 'Female', 30, '1994-10-31', 'Customer', '874', 'Navarro Island', 'If', 'West Corey', 'Hawaii', 'Region IV-A', '8419', NULL, 1, NULL, 1, '2022-03-11 04:49:52', NULL),
(31, 'Jerome', 'Meyers', 'user31', 'user31@example.com', '$2b$12$1BQsc0V339PC18wgyfqy8uMJIwsCG3n09hzNGj8JpcSHcGW3pZEx6', '046.552.9005x0400', 'Male', 32, '1992-12-21', 'Customer', '778', 'Jessica Squares', 'Ball', 'North Robertstad', 'Wyoming', 'Region IV-A', '5277', NULL, 1, NULL, 1, '2015-06-20 19:26:06', NULL),
(32, 'Roberto', 'Gray', 'user32', 'user32@example.com', '$2b$12$YSD5cq7UrdVLSBR.6EygZOpw6OtFOkZBQg.F6X4rM1nuphc4X8Bmi', '+1-680-257-0079x593', 'Male', 18, '2006-11-10', 'Customer', '512', 'Toni Spur', 'Effort', 'Clarkborough', 'Wisconsin', 'Region IV-A', '5410', NULL, 1, NULL, 1, '2019-09-01 12:06:28', NULL),
(33, 'Miguel', 'Hatfield', 'user33', 'user33@example.com', '$2b$12$UkXW5zD96365ClDYNq8O8ebfqrJ5sqTgf3Pko9HIDq3WSsbQmliW.', '794.712.1059', 'Male', 37, '1988-01-31', 'Customer', '493', 'Juan Plains', 'Parent', 'Mcdanielside', 'New Jersey', 'Region IV-A', '8916', NULL, 1, NULL, 1, '2023-03-25 18:18:53', NULL),
(34, 'Antonio', 'Riley', 'user34', 'user34@example.com', '$2b$12$p/rhx26LyIaCmuiaqlfuoOUfd24t1h7Hc79Ni8r3GZidAvWVq37am', '795-876-5806x022', 'Male', 47, '1977-07-11', 'Customer', '886', 'Deborah Lodge', 'Find', 'Matthewmouth', 'Kentucky', 'Region IV-A', '7191', NULL, 1, NULL, 1, '2019-07-10 15:43:30', NULL),
(35, 'Julie', 'Parker', 'user35', 'user35@example.com', '$2b$12$VQiPwmaqVAmCyHlN.vKkseNkTqJ4krCCxCVr3muJYlzGbrDrdEfH2', '001-764-691-2755x07271', 'Female', 38, '1986-11-15', 'Employee', '323', 'Wilson Causeway', 'List', 'Ernestmouth', 'Wyoming', 'Region IV-A', '2197', NULL, 1, NULL, 1, '2024-02-12 21:06:27', NULL),
(36, 'Arthur', 'White', 'user36', 'user36@example.com', '$2b$12$E8wpmspiw7ODHiL8BFq8guwPta91EqsdZDJMFbwVZXan6wG4fv9pS', '9057522994', 'Female', 59, '1965-09-10', 'Customer', '541', 'Garrett Terrace', 'Bed', 'East Perry', 'Louisiana', 'Region IV-A', '5780', NULL, 1, NULL, 1, '2022-02-10 03:55:46', NULL),
(37, 'Kristen', 'Woods', 'user37', 'user37@example.com', '$2b$12$vnaWcvSH3j8ACov2wR3ZYeuLG19K/zwsGNHOeEw/ie0oCS7Z1QBgi', '001-045-824-8325x697', 'Male', 32, '1993-01-03', 'Customer', '188', 'Ryan Grove', 'During', 'East Rodney', 'Missouri', 'Region IV-A', '7945', NULL, 1, NULL, 1, '2020-07-13 17:16:34', NULL),
(38, 'Andre', 'Brown', 'user38', 'user38@example.com', '$2b$12$ueKloiH.gk94n09IosWcge8Mz3cvyyVGbbJvXMEvR/7qU9DxoTjtm', '(054)901-0416', 'Male', 27, '1997-09-07', 'Customer', '964', 'Grimes Ford', 'Building', 'Michaelville', 'Louisiana', 'Region IV-A', '9940', NULL, 1, NULL, 1, '2016-10-08 14:29:26', NULL),
(39, 'Leslie', 'Holmes', 'user39', 'user39@example.com', '$2b$12$NbVF/dqt2G4aXLccrsypIe8Y1c.RjhSTCRsU.z2m2FtnR46gE1DRa', '777-219-0349x329', 'Male', 32, '1993-01-11', 'Customer', '477', 'Ricky Turnpike', 'Decade', 'Port Baileyview', 'Louisiana', 'Region IV-A', '6602', NULL, 1, NULL, 1, '2022-11-09 12:59:29', NULL),
(40, 'Cynthia', 'Johnson', 'user40', 'user40@example.com', '$2b$12$IjMcMRHxN63x2zmwYu/N0Oyt5w8iMODaR2WF8W5YizZBMOjaoE.Mm', '777-184-3567x1705', 'Male', 31, '1993-10-27', 'Customer', '280', 'Amanda Port', 'Decide', 'Port Markborough', 'Nebraska', 'Region IV-A', '2052', NULL, 1, NULL, 1, '2021-01-27 23:56:24', NULL),
(41, 'Andrew', 'Murray', 'user41', 'user41@example.com', '$2b$12$r.D1zFQmDyZs1P21gBF3kOCfOVvP3CtO8qItRT.2vc.1EpFAjQJTK', '362-192-2440x25464', 'Male', 26, '1999-04-28', 'Customer', '329', 'Torres Camp', 'Nearly', 'South Tammy', 'Louisiana', 'Region IV-A', '6582', NULL, 1, NULL, 1, '2017-02-04 18:24:12', NULL),
(42, 'Michael', 'Hendricks', 'user42', 'user42@example.com', '$2b$12$dw/WFs5o6/BsFoBv0PDp6eq0XSrAviwV.GnFOaFAg3O7zeQ5QrywO', '396-726-5949x6388', 'Female', 25, '1999-10-14', 'Customer', '859', 'Jennifer Pine', 'Gas', 'West James', 'Michigan', 'Region IV-A', '1907', NULL, 1, NULL, 1, '2022-08-31 01:55:37', NULL),
(43, 'Charles', 'Schwartz', 'user43', 'user43@example.com', '$2b$12$7Ma0mpWh20WmgOl01ut14.jvxjUbrxZL/xggeYS9nqg/6d.xe7OOG', '+1-715-368-9404x680', 'Male', 43, '1981-05-26', 'Customer', '969', 'Jose Turnpike', 'Compare', 'Sarahville', 'Texas', 'Region IV-A', '8474', NULL, 1, NULL, 1, '2019-05-11 00:00:24', NULL),
(44, 'Lyann', 'Brown', 'user44', 'user44@example.com', '$2b$12$YxkZ7Ye3nPhxR7vmm6KdF.eybpVgdB5dNWKrRHDrkW/1NI.C7kh.K', '+1-628-843-0059x094', 'Female', 20, '2004-05-31', 'Customer', '64', 'Berg Tunnel', 'Gun', 'Jonesshire', 'New Jersey', 'Region IV-A', '9775', NULL, 1, NULL, 1, '2023-03-04 20:23:33', NULL),
(45, 'Rachel', 'Moore', 'user45', 'user45@example.com', '$2b$12$BLCw4oKrS4Me10LgbMOi9.4mzrmHtyPJ1miNWykixLaoIy.9w4JQC', '856.624.8094x40876', 'Female', 43, '1981-06-08', 'Customer', '647', 'Keith Coves', 'Last', 'Campbellmouth', 'Illinois', 'Region IV-A', '4664', NULL, 1, NULL, 1, '2022-02-09 08:53:26', NULL),
(46, 'Nathan', 'Ryan', 'user46', 'user46@example.com', '$2b$12$qXaAibLQYS8HgBzoeCD3cuLQ.bcHPai2VMxGwfiqv2FmeZmTjjPA.', '411.086.6177x4078', 'Male', 18, '2006-10-03', 'Customer', '875', 'Sherman Canyon', 'Red', 'Silvaport', 'Georgia', 'Region IV-A', '8931', NULL, 1, NULL, 1, '2019-03-21 13:47:51', NULL),
(47, 'Lisa', 'Lopez', 'user47', 'user47@example.com', '$2b$12$OEgJ2f.BqO8UttFLTVqk6./aVt991JGoo4crylie9PypTxhoD8le2', '(593)468-4271x925', 'Male', 25, '1999-06-11', 'Customer', '214', 'Sherri Island', 'Hand', 'Cynthiamouth', 'Washington', 'Region IV-A', '8345', NULL, 1, NULL, 1, '2023-05-20 05:35:35', NULL),
(48, 'Brenta', 'Moody', 'user48', 'user48@example.com', '$2b$12$bEQC9fNUvteGHiBvLDCsjudeZtlGPXjKirsZ/eiV6kVOCxEYYy51y', '001-044-284-1598x3272', 'Male', 57, '1967-10-04', 'Customer', '131', 'Jeanette Passage', 'Food', 'Hayeston', 'Arkansas', 'Region IV-A', '2989', NULL, 1, NULL, 1, '2015-12-07 17:14:52', NULL),
(49, 'Timothy', 'Greer', 'user49', 'user49@example.com', '$2b$12$AzmhwVDqXtPC4nfoKHGOyu/tOnXS3Mrnx9NeTqqiUMRwFaqJL.Sem', '001-928-507-7252', 'Male', 36, '1989-03-08', 'Customer', '577', 'Adam Drive', 'New', 'Schneiderfurt', 'North Dakota', 'Region IV-A', '1516', NULL, 1, NULL, 1, '2022-12-16 02:14:17', NULL),
(50, 'Jesus', 'Dixon', 'user50', 'user50@example.com', '$2b$12$51ndTdAijXwlQaFqfuztne/2z8QwaIBRiZrpWTdXmcPak/5XQ7rDu', '001-825-465-5519x2292', 'Male', 50, '1974-06-28', 'Customer', '609', 'Charles Island', 'Than', 'Lake Karenchester', 'Pennsylvania', 'Region IV-A', '1218', NULL, 1, NULL, 1, '2023-10-05 17:19:59', NULL),
(101, 'Christine', 'Meyers', 'user101', 'user101@example.com', '$2b$12$1BQsc0V339PC18wgyfqy8uMJIwsCG3n09hzNJpcSHcGW3pZEx6', '046.552.9008x0400', 'Male', 32, '1992-12-21', 'Rider', '778', 'Jessica Squares', 'Ball', 'North Robertstad', 'Wyoming', 'Region IV-A', '5277', 0, 1, NULL, 0, '2015-06-20 19:26:06', NULL),
(102, 'Lynn', 'Brown', 'user102', 'user102@example.com', '$2b$12$YxkZ7Ye3nPhxR7vmm6KdF.eybpVgdB5dNWKrRHDrkWI.C7kh.K', '+1-628-843-0059x594', 'Female', 20, '2004-05-31', 'Rider', '64', 'Berg Tunnel', 'Gun', 'Jonesshire', 'New Jersey', 'Region IV-A', '9775', 0, 1, NULL, 1, '2023-03-04 20:23:33', NULL),
(103, 'Brent', 'Moody', 'use1038', 'user103@example.com', '$2b$12$bEQC9fNUvteGHiBvLDCsjudeZtlGPXsZ/eiV6kVOCxEYYy51y', '001-044-284-1598x3272', 'Male', 57, '1967-10-04', 'Rider', '131', 'Jeanette Passage', 'Food', 'Hayeston', 'Arkansas', 'Region IV-A', '2989', 0, 1, NULL, 1, '2015-12-07 17:14:52', NULL),
(104, 'Jennifer', 'Toche', 'Jennifer', 'jen@gmail.com', '$2y$10$ocusM9enpQsuA9ClG5HKqOjeTX8/4VBdWpn42LgYdxxAjw9baPW0m', '09452234677', 'Female', 32, '1990-10-09', 'Admin', 'Blk J2', 'Fatima Rd', 'San Simon', 'Dasmariñas', 'Cavite', '4A', '4114', NULL, 1, NULL, 1, '2025-05-11 08:07:58', NULL),
(105, 'Sheree', 'Maquirang', 'Sheree', 'sheree@gmail.com', '$2y$10$5lyAy9nhKunU.ETAL2NfjeP/6ZhpFXqSl/9.dfkHUHxD3vV.d2nRu', '09876765333', 'Female', 20, '2005-01-23', 'Employee', 'Blk K3', NULL, 'San KanaBa', 'Dasmariñas', 'Cavite', '4A', '4114', NULL, 1, NULL, 1, '2025-05-11 09:12:38', NULL),
(106, 'Nino Marco', 'Tampol', 'Tampol', 'tampol@gmail.com', '$2y$10$/NZFfYDGpGVpyvyhWry7BuZVrZBQg0MjhSPpqFAmBipLOnwLMDcUC', '09507373644', 'Male', 20, '2005-01-01', 'Customer', 'Blk J1 Lot 14', 'Fatima Rd', 'San Francisco 2', 'Dasmariñas', 'Cavite', '4A', '4114', NULL, 1, NULL, 1, '2025-05-15 13:18:17', '2025-05-15 13:19:52'),
(107, 'Jonas Vince', 'Macawile', 'Honas', 'jonasemperor@gmail.com', '$2y$10$IyPgcvjs0JlhSGaXd70b6uOOOcm3XcmuF8ULsFy1MDrNF0f2gmBku', '09206649331', 'Male', 20, '2005-01-01', 'Rider', 'Blk K2', 'Fatima Rd', 'San Simon', 'Dasmariñas', 'Cavite', '4A', '4114', 0, 1, NULL, 1, '2025-05-15 13:52:41', NULL),
(108, 'Jonas', 'Macawile', 'Jonas Vince', 'macawile.jonasvincep.kld@gmail.com', '$2y$10$WC5xa5S15bRhe/VwlsihEeD6kb6C4SuxK/8T.K99O6IcEgYs9zPLK', '09125789911', 'Male', 19, '2005-08-24', 'Customer', 'Blk J1 Lot 14', NULL, 'San Francisco 2', 'Dasmariñas', 'Cavite', '4A', '4114', NULL, 1, '../../storage/backend/img/profiling/15 Cool Braid Hairstyles for Men to Try in 2024 - Fashion Tips Tricks.jfif', 1, '2025-05-27 12:53:22', '2025-05-27 12:58:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`add_on_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_item_id` (`menu_item_id`),
  ADD KEY `menu_item_size_id` (`menu_item_size_id`),
  ADD KEY `add_ons_id` (`add_ons_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`menu_item_id`);

--
-- Indexes for table `menu_item_sizes`
--
ALTER TABLE `menu_item_sizes`
  ADD PRIMARY KEY (`menu_item_size_id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  ADD PRIMARY KEY (`password_reset_request_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rider_id` (`rider_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `add_on_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `menu_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `menu_item_sizes`
--
ALTER TABLE `menu_item_sizes`
  MODIFY `menu_item_size_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  MODIFY `password_reset_request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`menu_item_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`menu_item_size_id`) REFERENCES `menu_item_sizes` (`menu_item_size_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_4` FOREIGN KEY (`add_ons_id`) REFERENCES `add_ons` (`add_on_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `menu_item_sizes`
--
ALTER TABLE `menu_item_sizes`
  ADD CONSTRAINT `menu_item_sizes_ibfk_1` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`menu_item_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`rider_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`discount_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
