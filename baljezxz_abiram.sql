-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 07:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baljezxz_abiram`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `state_id`, `district_id`, `name`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Dumdum', 1, 0, '2024-12-24', '2024-12-24'),
(2, 1, 1, 'Naihati', 1, 0, '2024-12-26', '2024-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `whatsapp_no` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `post_office_id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `chamber_id` int(11) NOT NULL,
  `tank_id` int(11) NOT NULL,
  `pipe_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `work_date` date DEFAULT NULL,
  `work_time` time DEFAULT NULL,
  `vehicle_no` int(11) DEFAULT NULL,
  `driver` int(11) DEFAULT NULL,
  `helper1` int(11) DEFAULT NULL,
  `helper2` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>pending,2=>processing,3=>completed',
  `payment_amount` double(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_note` text DEFAULT NULL,
  `payment_receive_by` varchar(255) DEFAULT NULL,
  `payment_receive_by_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `entry_date` date NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `first_name`, `last_name`, `address`, `contact_no`, `whatsapp_no`, `state_id`, `district_id`, `area_id`, `post_office_id`, `pincode`, `chamber_id`, `tank_id`, `pipe_id`, `amount`, `work_date`, `work_time`, `vehicle_no`, `driver`, `helper1`, `helper2`, `remarks`, `status`, `payment_amount`, `payment_date`, `payment_note`, `payment_receive_by`, `payment_receive_by_id`, `created_at`, `updated_at`, `entry_date`, `is_deleted`) VALUES
(1, 1, 'Santanu', 'Dey', 'CHAK RAMNAGAR', '09062742199', '9874563210', 1, 1, 1, 2, 700010, 1, 1, 1, 6213.00, '2024-12-27', '14:41:46', NULL, NULL, NULL, NULL, 'Hello Test 2', 1, NULL, '0000-00-00', '', '', 1, '2024-12-26', '2024-12-26', '2024-12-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chambers`
--

CREATE TABLE `chambers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chambers`
--

INSERT INTO `chambers` (`id`, `name`, `amount`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'One Well Chember', 1000.00, 1, 0, '2024-12-24', '2024-12-26'),
(2, 'Two Well Chember', 2000.00, 1, 0, '2024-12-26', '2024-12-26'),
(3, 'Three Well Chember', 3000.00, 1, 0, '2024-12-26', '2024-12-26'),
(4, 'Safety Tank', 4000.00, 1, 0, '2024-12-26', '2024-12-26'),
(5, 'Drainage Cleaning', 5000.00, 1, 0, '2024-12-26', '2024-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `state_id`, `name`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'North 24 PGS', 1, 0, '2024-12-24', '2024-12-24'),
(2, 2, 'Buxar', 1, 0, '2024-12-24', '2024-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `body` text NOT NULL,
  `send_from` varchar(512) NOT NULL,
  `send_from_name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1=>transaction email,2=>promotion email',
  `created_by` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `subject`, `body`, `send_from`, `send_from_name`, `type`, `created_by`, `create_date`, `last_update_date`, `last_updated_by`, `is_deleted`) VALUES
(2, 'Registration', 'Registration', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\" style=\"background-color:#f6f6f6; border-collapse:separate; mso-table-lspace:0pt; mso-table-rspace:0pt; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">&nbsp;</td>\r\n			<td style=\"vertical-align:top; width:580px\">\r\n			<div class=\"content\" style=\"box-sizing:border-box; display:block; margin-bottom:0; margin-left:auto; margin-right:auto; margin-top:0; max-width:580px; padding:10px\"><!-- START CENTERED WHITE CONTAINER --><span style=\"color:transparent\">This is preheader text. Some clients will show this text as a preview.</span>\r\n			<table class=\"main\" style=\"background:#ffffff; border-collapse:separate; border-radius:3px; mso-table-lspace:0pt; mso-table-rspace:0pt; width:100%\"><!-- START MAIN CONTENT AREA -->\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:top\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:separate; mso-table-lspace:0pt; mso-table-rspace:0pt; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\"vertical-align:top\">\r\n									<p style=\"margin-left:0; margin-right:0\">Hi __NAME__,</p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">Email: __EMAIL__</p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">Password: __PASSWORD__</p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">We have approved your Registration. Go to the manage profile section and update your information.</p>\r\n									v\r\n\r\n									<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"btn btn-primary\" style=\"border-collapse:separate; box-sizing:border-box; mso-table-lspace:0pt; mso-table-rspace:0pt; width:100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"vertical-align:top\">\r\n												<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:separate; mso-table-lspace:0pt; mso-table-rspace:0pt; width:auto\">\r\n													<tbody>\r\n														<tr>\r\n															<td style=\"background-color:#3498db; border-radius:5px; text-align:center; vertical-align:top\"><a href=\"http://kkcarts.com/vendor\" style=\"display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;\" target=\"_blank\">Call To Action</a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">We have sent you the login credential, please keep it safe.</p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">Good luck!</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<!-- END MAIN CONTENT AREA -->\r\n				</tbody>\r\n			</table>\r\n			<!-- START FOOTER -->\r\n\r\n			<div class=\"footer\" style=\"clear:both; margin-top:10px; text-align:center; width:100%\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:separate; mso-table-lspace:0pt; mso-table-rspace:0pt; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"text-align:center; vertical-align:top\"><span style=\"color:#999999; font-size:12px\">Company Inc, 3 Abbey Road, San Francisco CA 94102</span><br />\r\n						Don&#39;t like these emails? <a href=\"http://i.imgur.com/CScmqnj.gif\" style=\"text-decoration: underline; color: #999999; font-size: 12px; text-align: center;\">Unsubscribe</a>.</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"text-align:center; vertical-align:top\">Powered by <a href=\"http://htmlemail.io\" style=\"color: #999999; font-size: 12px; text-align: center; text-decoration: none;\">HTMLemail</a>.</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</div>\r\n			<!-- END FOOTER --> <!-- END CENTERED WHITE CONTAINER --></div>\r\n			</td>\r\n			<td style=\"vertical-align:top\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'support@abc.com', 'Supports', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 'base', 'header', '<p>__MAIL_CONTENT__</p>\r\n', 'header', 'header', 1, 1, '2019-10-22 00:00:00', '2019-10-23 00:00:00', 1, 0),
(8, 'Contact Form', 'Contact Form', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td style=\"width:580px\">\r\n			<div style=\"margin-left:auto\">\r\n			<table style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<p>Name:__NAME__</p>\r\n\r\n									<p>Email: __EMAIL__</p>\r\n\r\n									<p>Mobile: __MOBILE__</p>\r\n\r\n									<p>Message: __MESSAGE__</p>\r\n\r\n									<p>&nbsp;</p>\r\n									&nbsp;\r\n\r\n									<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td>\r\n												<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:0px\">\r\n													<tbody>\r\n														<tr>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"clear:both; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n\r\n			<div style=\"clear:both\">&nbsp;</div>\r\n			</div>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'support@abc.com', 'Supports', 1, NULL, NULL, NULL, NULL, 0),
(10, 'Order Confirm', 'Order Status', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\" style=\"background-color:#f6f6f6; font-family:sans-serif; width:717px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">&nbsp;</td>\r\n			<td style=\"vertical-align:top; width:580px\">\r\n			<div class=\"content\" style=\"box-sizing:border-box; margin-bottom:0; margin-left:auto; margin-right:auto; margin-top:0; max-width:580px; padding:10px\">\r\n			<table class=\"main\" style=\"background:#ffffff; border-radius:3px; width:560px\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:top\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:516px\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\"vertical-align:top\">\r\n									<p style=\"margin-left:0; margin-right:0\"><span style=\"font-family:Times New Roman\"><span style=\"font-size:13px\">Hi __FIRSTNAME__,</span></span></p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\"><span style=\"font-family:Times New Roman\"><span style=\"font-size:13px\">Your Order has been Successfully Confirmed.</span></span></p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\"><span style=\"font-family:Times New Roman\"><span style=\"font-size:13px\">Thank You for Purchasing Product from Us.</span></span></p>\r\n									__PAYMENT_INFO__\r\n\r\n									<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"btn btn-primary\" style=\"box-sizing:border-box; width:516px\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"vertical-align:top\">\r\n												<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:auto\">\r\n													<tbody>\r\n														<tr>\r\n															<td style=\"background-color:#3498db; border-radius:5px; text-align:center; vertical-align:top\"><a href=\"http://kkcarts.com\" style=\"border: 1px solid rgb(52, 152, 219); border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; margin: 0px; padding: 12px 25px; font-size: 13px;\" target=\"_blank\"><span style=\"color:#333333; font-family:Times New Roman\">Call To Action</span></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\"><span style=\"font-family:Times New Roman\"><span style=\"font-size:13px\">Good luck! Hope You Well.</span></span></p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n\r\n			<div class=\"footer\" style=\"clear:both; margin-top:10px; text-align:center; width:560px\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:560px\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:top\"><span style=\"color:#333333; font-family:Times New Roman\"><span style=\"font-size:13px\">Company Inc, 3 XYZ Road, INDIA 94102<br />\r\n						Don&#39;t like these emails?&nbsp;<a href=\"http://i.imgur.com/CScmqnj.gif\">Unsubscribe</a>.</span></span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</div>\r\n			</div>\r\n			</td>\r\n			<td style=\"vertical-align:top\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'support@abc.com', 'Supports', 1, NULL, NULL, NULL, NULL, 0),
(13, 'Forget Password', 'Forget Password', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\" style=\"-webkit-text-stroke-width:0px; background-color:#f6f6f6; color:#333333; font-family:sans-serif; font-size:13px; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; orphans:2; text-align:start; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-transform:none; white-space:normal; widows:2; width:717px; word-spacing:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">&nbsp;</td>\r\n			<td style=\"vertical-align:top; width:580px\">\r\n			<div class=\"content\" style=\"box-sizing:border-box; margin-bottom:0; margin-left:auto; margin-right:auto; margin-top:0; max-width:580px; padding:10px\">\r\n			<table class=\"main\" style=\"background:#ffffff; border-radius:3px; width:560px\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:top\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:516px\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\"vertical-align:top\">\r\n									<p style=\"margin-left:0; margin-right:0\">Hi __EMAIL__,</p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">Please Create your New Password here.</p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">__ACTIVATIONLINK__</p>\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">&nbsp;</p>\r\n									&nbsp;\r\n\r\n									<p style=\"margin-left:0; margin-right:0\">Good luck! Hope You Well.</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n\r\n			<div class=\"footer\" style=\"clear:both; margin-top:10px; text-align:center; width:560px\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:560px\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:top\">Company Inc, 3 XYZ Road, INDIA 94102<br />\r\n						Don&#39;t like these emails?&nbsp;<a href=\"http://i.imgur.com/CScmqnj.gif\" style=\"color: rgb(153, 153, 153);\">Unsubscribe</a>.</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</div>\r\n			</div>\r\n			</td>\r\n			<td style=\"vertical-align:top\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'support@abc.com', 'Support', 1, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `caption` varchar(64) NOT NULL,
  `access_type` int(2) NOT NULL DEFAULT 0 COMMENT '0=>public,1=>vendor,2=>admin,3=>api',
  `order_by` int(4) NOT NULL,
  `icon` varchar(32) NOT NULL DEFAULT 'fa-pencil-square',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `caption`, `access_type`, `order_by`, `icon`, `is_deleted`) VALUES
(1, 'user', 'Users', 2, 22, 'fa fa-user', 0),
(2, 'role', 'Roles', 2, 23, 'fa fa-tasks', 0),
(3, 'module', 'Modules', 2, 24, 'fa fa-list-alt', 0),
(4, 'module-permission', 'Module Permission', 2, 25, 'fa fa-lock', 0),
(43, 'state', 'States', 2, 2, 'fa fa-list-alt', 0),
(44, 'district', 'Districts', 2, 3, 'fa fa-tasks', 0),
(45, 'area', 'Police Station', 2, 4, 'fa fa-tasks', 0),
(46, 'post-office', 'Gram Panchayat', 2, 5, 'fa fa-tasks', 0),
(47, 'booking', 'Booking Details', 2, 1, 'fa fa-list-alt', 0),
(48, 'vehicle', 'Vehicle Details', 2, 7, 'fa fa-list-alt', 0),
(49, 'tank', 'Safty Tank Details', 2, 8, 'fa fa-list-alt', 0),
(50, 'chamber', 'Chember Details', 2, 9, 'fa fa-list-alt', 0),
(51, 'pipe', 'Pipe Details', 2, 10, 'fa fa-list-alt', 0),
(52, 'scheduled', 'Scheduled Details', 2, 2, 'fa fa-list-alt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_permissions`
--

CREATE TABLE `module_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `perm_view` tinyint(1) NOT NULL DEFAULT 0,
  `perm_insert` tinyint(1) NOT NULL DEFAULT 0,
  `perm_update` tinyint(1) NOT NULL DEFAULT 0,
  `perm_delete` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `module_permissions`
--

INSERT INTO `module_permissions` (`id`, `role_id`, `module_id`, `perm_view`, `perm_insert`, `perm_update`, `perm_delete`, `is_deleted`) VALUES
(53, 1, 1, 1, 1, 1, 1, 0),
(54, 1, 2, 1, 1, 1, 1, 0),
(55, 1, 3, 1, 1, 1, 1, 0),
(56, 1, 4, 1, 1, 1, 1, 0),
(57, 1, 43, 1, 1, 1, 1, 0),
(58, 1, 44, 1, 1, 1, 1, 0),
(59, 1, 45, 1, 1, 1, 1, 0),
(60, 1, 46, 1, 1, 1, 1, 0),
(61, 1, 47, 1, 1, 1, 1, 0),
(62, 1, 48, 1, 1, 1, 1, 0),
(63, 1, 49, 1, 1, 1, 1, 0),
(64, 1, 50, 1, 1, 1, 1, 0),
(65, 1, 51, 1, 1, 1, 1, 0),
(66, 1, 52, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pipes`
--

CREATE TABLE `pipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pipes`
--

INSERT INTO `pipes` (`id`, `name`, `amount`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '200 Foot Pipe Length', '1000', 1, 0, '2024-12-24', '2024-12-26'),
(2, '300 Foot Pipe Length', '2000', 1, 0, '2024-12-26', '2024-12-26'),
(3, '400 Foot Pipe Length', '3000', 1, 0, '2024-12-26', '2024-12-26'),
(4, '500 Foot Pipe Length', '4000', 1, 0, '2024-12-26', '2024-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `post_offices`
--

CREATE TABLE `post_offices` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_offices`
--

INSERT INTO `post_offices` (`id`, `state_id`, `district_id`, `area_id`, `name`, `pincode`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Nager Bazar', 700009, 1, 0, '2024-12-24', '2024-12-26'),
(2, 1, 1, 1, 'Silcoloni', 700010, 1, 0, '2024-12-24', '2024-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(64) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `is_deleted`) VALUES
(1, 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `photo` text DEFAULT NULL,
  `image_link` text NOT NULL,
  `caption` text DEFAULT NULL,
  `sort_order` int(3) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `photo`, `image_link`, `caption`, `sort_order`, `is_active`, `created_by`, `create_date`, `is_deleted`) VALUES
(181, 'Unlock Your Future in Banking! Ace Your Exams with Our Proven Strategies', 'slider-1.jpg', '', 'With our Expert created MOCK TESTS!', 1, 1, 1, '2024-04-26', 0),
(182, 'Accelerate Your Insurance Career!', 'slider-2.jpg', '', 'Enroll Today for Top Scores and Fast-track Your Success!', 2, 1, 1, '2024-04-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'West Bengal', 1, 0, '2024-12-24', '2024-12-24'),
(2, 'Bihar', 1, 0, '2024-12-24', '2024-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `tanks`
--

CREATE TABLE `tanks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanks`
--

INSERT INTO `tanks` (`id`, `name`, `amount`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '3000 Liter Tank', 1000.00, 1, 0, '2024-12-24', '2024-12-26'),
(2, '4000 Liter Tank', 2000.00, 1, 0, '2024-12-26', '2024-12-26'),
(3, '4500 Liter Tank', 2500.00, 1, 0, '2024-12-26', '2024-12-26'),
(4, '5000 Liter Tank', 3000.00, 1, 0, '2024-12-26', '2024-12-26'),
(5, '6000 Liter Tank', 4000.00, 1, 0, '2024-12-26', '2024-12-26'),
(6, '7000 Liter Tank', 5000.00, 1, 0, '2024-12-26', '2024-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1=>admin,2=>branch,3=>employee',
  `phone_no` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `post_office_id` int(11) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `last_login_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `location`, `email`, `user_type`, `phone_no`, `image`, `password`, `address`, `state_id`, `district_id`, `area_id`, `post_office_id`, `pincode`, `last_login_date`, `create_date`, `is_active`, `is_deleted`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', 1, '9874563215', 'testimonial-3.jpg', '$2y$10$cBRjs2Cx5BUJOG/xiSRz5eKEtoOde3NwA8milx7.WaYoUEuQ6y3Fm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 06:16:18', '0000-00-00 00:00:00', 1, 0),
(40, 'Biswajit Manna', NULL, 'biswajit20391@gmail.com', 2, '9830406358', '', '$2y$10$cBRjs2Cx5BUJOG/xiSRz5eKEtoOde3NwA8milx7.WaYoUEuQ6y3Fm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-16 09:54:53', '2023-04-03 18:28:19', 1, 0),
(69, 'Suman Biswas', NULL, 'suman@gmail.com', 3, '9863269520', 'team-1.jpg', '$2y$10$PnIguCGuZK1kQFOImzxw2eOOf39RzBG7sb.UwoqCQAozZTtUrpwwq', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-04-27 00:00:00', 1, 0),
(70, 'supervisor', NULL, 'supervisor@gmail.com', 3, '9874563210', '12.png', '$2y$10$gPElb4eIKIhGC0bxEbI2n.jXwLuhwDBw3g9Jly2v9xt/0BIGqUZVa', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-05-04 00:00:00', 1, 0),
(71, 'supervisor1', NULL, 'supervisor1@gmail.com', 3, '9632569520', '12.jpg', '$2y$10$NL/i4BJFTPIA66zwESRutOxRhLIF/wzuqVZsvDEeEzlZ0tn7lfHLS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-05-04 00:00:00', 1, 0),
(72, 'Reviewer', NULL, 'reviewer@gmail.com', 3, '9632569652', '12.png', '$2y$10$ZGVTb2K1U09wIV65CQtmguK7u/6ALPkTRA1xiz5eD8.pNQYmBf0/C', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-05-05 00:00:00', 1, 0),
(73, 'superreviewer', NULL, 'super@gmail.com', 3, '9874563258', '12.png', '$2y$10$/pLmEw2yZgj8y/C15xLEjuUApyzad4gBMMG08Z88Df.d71L9CNxqK', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-05-05 00:00:00', 1, 0),
(74, 'Ayan Manager', NULL, 'manager@gmail.com', 3, '9632102021', '12.png', '$2y$10$8TB0c6XtmYXo/5Ck6hgJve40cXaxt5LcJ38eriU3DF03VGO82uLuO', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-05-05 00:00:00', 1, 0),
(75, 'Santanu Dey', NULL, 'san2019dey@gmail.com', 4, '9062742199', 'logo-main.jpg', '$2y$10$54oUtlZkOttn0ptyUS/AoOlTbVNLmMktpkHmoVMsisVX47HueLu7W', 'CHAK RAMNAGAR', 1, 1, 1, 1, 700104, '0000-00-00 00:00:00', '2024-12-26 00:00:00', 1, 0),
(76, 'Aloke Das', NULL, 'alokedas51@gmail.com', 3, '09874386024', 'logo_icon.png', '$2y$10$z2vhpUBHRIrjGO0Nev1zqerHjGz/C6c8RrMI9t0PRNe1ipePYdz8q', '16/56 CHAK THAKURANI KALITOLA MG ROAD\r\nPO RC THAKURANI PS HARIDEVPUR', 1, 1, 1, 1, 700104, '0000-00-00 00:00:00', '2024-12-26 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL,
  `is_login` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `last_login_date` date DEFAULT NULL,
  `last_login_time` text DEFAULT NULL,
  `last_logout_time` text DEFAULT NULL,
  `total_time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `is_login`, `user_id`, `last_login_date`, `last_login_time`, `last_logout_time`, `total_time`) VALUES
(3, 1, 1, '2024-12-27', '1735275870', '1735275863', '30017'),
(4, 1, 69, '2024-06-05', '1717579178', '1716271022', '480'),
(5, 1, 70, '2024-06-08', '1717827496', '1716517201', '888');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `is_deleted`) VALUES
(14, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `no`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'WB20Z3333', '1000', 1, 0, '2024-12-24', '2024-12-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chambers`
--
ALTER TABLE `chambers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permissions`
--
ALTER TABLE `module_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipes`
--
ALTER TABLE `pipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_offices`
--
ALTER TABLE `post_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanks`
--
ALTER TABLE `tanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chambers`
--
ALTER TABLE `chambers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `module_permissions`
--
ALTER TABLE `module_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `pipes`
--
ALTER TABLE `pipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_offices`
--
ALTER TABLE `post_offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanks`
--
ALTER TABLE `tanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
