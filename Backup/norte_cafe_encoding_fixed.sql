-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2025 at 01:53 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `addOns_Seeder` ()   INSERT INTO add_ons (name, price, stocks, available) VALUES ('Booba Pearl', 10.00, 99, true), ('Nata', 10.00, 99, true), ('Whipped Cream', 15.00, 99, true), ('Cheese Cake', 20.00, 99, true), ('Caramel Drizzle', 10.00, 99, true)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuItem_Seeder` ()   INSERT INTO menu_items (id, name, description, price, available, category) VALUES
(1, 'Classic Milk Tea', 'A creamy milk tea with black tea base.', 3.99, 1, 'milktea'),
(2, 'Okinawa Milk Tea', 'Sweet and caramel-flavored milk tea delight.', 4.49, 1, 'milktea'),
(3, 'Wintermelon Milk Tea', 'Refreshing blend with wintermelon syrup.', 4.29, 1, 'milktea'),
(4, 'Taro Milk Tea', 'Creamy taro-flavored milk tea with pearls.', 4.59, 1, 'milktea'),
(5, 'Matcha Milk Tea', 'Earthy matcha mixed with creamy milk.', 4.79, 1, 'milktea'),
(6, 'Caramel Macchiato', 'Espresso, milk, and caramel drizzle.', 5.49, 1, 'coffee'),
(7, 'Café Latte', 'Rich espresso blended with steamed milk.', 4.99, 1, 'coffee'),
(8, 'Americano', 'Bold and strong black coffee experience.', 3.49, 1, 'coffee'),
(9, 'Cappuccino', 'Perfect balance of espresso and foam.', 4.79, 1, 'coffee'),
(10, 'Mocha Latte', 'Chocolate and espresso blended smoothly.', 5.29, 1, 'coffee'),
(11, 'Iced Black Coffee', 'Strong cold brew with bold flavors.', 3.99, 1, 'coffee'),
(12, 'Mango Juice', 'Fresh and sweet mango juice delight.', 3.89, 1, 'juice'),
(13, 'Lemonade', 'Refreshing lemon drink with natural sweetness.', 3.49, 1, 'juice'),
(14, 'Orange Juice', 'Freshly squeezed oranges with pulp.', 3.99, 1, 'juice'),
(15, 'Apple Juice', 'Sweet and crisp apple juice refreshment.', 3.79, 1, 'juice'),
(16, 'Grape Juice', 'Juicy and naturally sweet grape flavor.', 4.09, 1, 'juice'),
(17, 'Strawberry Milk Tea', 'Fruity strawberry blended with creamy milk.', 4.89, 1, 'milktea'),
(18, 'Thai Milk Tea', 'Spiced milk tea with a strong aroma.', 4.69, 1, 'milktea'),
(19, 'Hazelnut Coffee', 'Nutty hazelnut-flavored espresso blend.', 5.59, 1, 'coffee'),
(20, 'Avocado Shake', 'Creamy avocado blended with fresh milk.', 5.29, 1, 'juice')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuItem_Seederv2` ()   INSERT INTO menu_items (name, description, available, category) VALUES
('Americano', 'Bold espresso with hot water for strong coffee lovers.', 1, 'ESPRESSO'),
('Cafe Latte', 'Smooth espresso with steamed milk, perfect morning drink.', 1, 'ESPRESSO'),
('Spanish Latte', 'Sweetened espresso with milk for a rich flavor.', 1, 'ESPRESSO'),
('Salted Caramel Latte', 'Espresso and caramel blend with a salty twist.', 1, 'ESPRESSO'),
('Biscoff Latte', 'Espresso with creamy Biscoff spread and cookie flavors.', 1, 'ESPRESSO'),
('Tiramisu Latte', 'Coffee infused with cocoa and mascarpone cheese flavor.', 1, 'ESPRESSO'),

('White Coffee', 'Mild coffee with creamy milk, smooth and delicious.', 1, 'COFFEE'),
('Cappuccino', 'Espresso, steamed milk, and frothy foam on top.', 1, 'COFFEE'),
('Mocha', 'Chocolate and espresso mix for a delightful drink.', 1, 'COFFEE'),
('Caramel Macchiato', 'Espresso, milk, and caramel drizzle for sweetness.', 1, 'COFFEE'),
('Kape Tuerca', 'Nutty and bold Filipino coffee blend, aromatic taste.', 1, 'COFFEE'),

('Red Velvet', 'Rich red velvet tea with sweet creamy topping.', 1, 'MILKTEA'),
('Okinawa', 'Brown sugar-infused milk tea with roasted notes.', 1, 'MILKTEA'),
('Cookies & Cream', 'Milk tea blended with chocolate cookie crumbles.', 1, 'MILKTEA'),
('Dark Chocolate', 'Deep and indulgent dark chocolate milk tea.', 1, 'MILKTEA'),

('Caramel Macchiato Frappe', 'Cold caramel coffee blended with ice and milk.', 1, 'COFFEE FRAPPE'),
('Cappuccino Frappe', 'Frosty cappuccino blended for a refreshing treat.', 1, 'COFFEE FRAPPE'),
('White Coffee Frappe', 'Cold white coffee blend with smooth texture.', 1, 'COFFEE FRAPPE'),
('Mocha Frappe', 'Chilled mocha coffee with a chocolatey taste.', 1, 'COFFEE FRAPPE'),

('Strawberry Whipped Cheese', 'Sweet strawberry drink topped with whipped cheese.', 1, 'SIGNATURE DRINK'),
('Biscoff Cream', 'Smooth Biscoff-flavored drink with a creamy texture.', 1, 'SIGNATURE DRINK'),
('Ube Cream', 'Creamy and earthy ube-flavored signature beverage.', 1, 'SIGNATURE DRINK'),
('Matcha Oreo', 'Matcha tea blended with Oreo cookies for crunch.', 1, 'SIGNATURE DRINK'),
('Matcha Strawberry Foam', 'Matcha with strawberry foam, a refreshing combination.', 1, 'SIGNATURE DRINK'),

('Green Apple Juice', 'Crisp and tangy green apple fruit juice.', 1, 'FRUIT DRINK'),
('Strawberry Juice', 'Fresh strawberry fruit juice, naturally sweet.', 1, 'FRUIT DRINK'),
('Lychee Juice', 'Delicate and fragrant lychee fruit juice.', 1, 'FRUIT DRINK'),
('Mango Juice', 'Smooth and tropical mango fruit juice delight.', 1, 'FRUIT DRINK'),

('Green Apple Frappe', 'Green apple fruit blended with ice, refreshing.', 1, 'FRUIT FRAPPE'),
('Strawberry Frappe', 'Frosty strawberry fruit drink with natural sweetness.', 1, 'FRUIT FRAPPE'),
('Lychee Frappe', 'Blended lychee fruit frappe, subtly floral.', 1, 'FRUIT FRAPPE'),
('Mango Frappe', 'Chilled mango fruit blended into icy goodness.', 1, 'FRUIT FRAPPE'),

('Cheese Nachos', 'Crispy nachos drizzled with creamy cheese sauce.', 1, 'NACHOS'),
('Cheese Beef Nachos', 'Nachos topped with beef and melted cheese.', 1, 'NACHOS'),

('Ham & Cheese Pizza', 'Classic ham and cheese on a crispy crust.', 1, 'PIZZA'),
('Shawarma Pizza', 'Middle Eastern flavors on a cheesy pizza.', 1, 'PIZZA'),
('Pepperoni Pizza', 'Spicy and savory pepperoni slices on pizza.', 1, 'PIZZA'),

('Cheese Sandwich', 'Toasted bread with melted cheese inside.', 1, 'GRILLED SANDWICH'),
('Ham & Cheese Sandwich', 'Grilled sandwich with ham and cheese filling.', 1, 'GRILLED SANDWICH'),
('Nutella Sandwich', 'Sweet toasted bread with Nutella chocolate spread.', 1, 'GRILLED SANDWICH'),

('Biscoff Croffle', 'Crispy croffle topped with Biscoff cookie spread.', 1, 'CROFFLES'),
('Nutella Croffle', 'Sweet croffle topped with Nutella chocolate spread.', 1, 'CROFFLES'),
('Oreo Cream Croffle', 'Croffle with Oreo crumbles and creamy topping.', 1, 'CROFFLES'),
('Tiramisu Croffle', 'Tiramisu-flavored croffle with cocoa and cream.', 1, 'CROFFLES'),

('Chocolate Mini Donuts', 'Soft chocolate-flavored mini donuts, bite-sized delight.', 1, 'MINI DONUTS'),
('Biscoff Mini Donuts', 'Mini donuts covered with Biscoff spread.', 1, 'MINI DONUTS'),
('Nutella Mini Donuts', 'Mini donuts dipped in Nutella chocolate goodness.', 1, 'MINI DONUTS'),
('Oreo Cream Mini Donuts', 'Mini donuts with Oreo cream topping.', 1, 'MINI DONUTS')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuItem_Seederv3` ()   INSERT INTO menu_items (name, description, available, category, image_dir) VALUES
-- ESPRESSO
('Americano', 'Bold espresso with hot water for strong coffee lovers.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/americano.png'),
('Biscoff Latte', 'Espresso with creamy Biscoff spread and cookie flavors.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/biscoff-latte.png'),
('Cafe Latte', 'Smooth espresso with steamed milk, perfect morning drink.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/cafe-latte.png'),
('Salted Caramel Latte', 'Espresso and caramel blend with a salty twist.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/salted-caramel-latte.png'),
('Spanish Latte', 'Sweetened espresso with milk for a rich flavor.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/spanish-latte.png'),
('Tiramisu Latte', 'Coffee infused with cocoa and mascarpone cheese flavor.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/tiramisu-latte.png'),

-- COFFEE
('Cappuccino', 'Espresso, steamed milk, and frothy foam on top.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/cappuccino.png'),
('Caramel Macchiato', 'Espresso, milk, and caramel drizzle for sweetness.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/caramel-macchiato.png'),
('Kape Tuerca', 'Nutty and bold Filipino coffee blend, aromatic taste.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/kape-tuerca.png'),
('Mocha', 'Chocolate and espresso mix for a delightful drink.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/mocha.png'),
('White Coffee', 'Mild coffee with creamy milk, smooth and delicious.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/white-coffee.png'),

-- MILKTEA
('Cookies & Cream', 'Milk tea blended with chocolate cookie crumbles.', 1, 'MILKTEA', '/uploads/backend/img/menu/milktea/cookies-and-cream.png'),
('Dark Chocolate', 'Deep and indulgent dark chocolate milk tea.', 1, 'MILKTEA', '/uploads/backend/img/menu/milktea/dark-chocolate.png'),
('Okinawa', 'Brown sugar-infused milk tea with roasted notes.', 1, 'MILKTEA', '/uploads/backend/img/menu/milktea/okinawa.png'),
('Red Velvet', 'Rich red velvet tea with sweet creamy topping.', 1, 'MILKTEA', '/uploads/backend/img/menu/milktea/red-velvet.png'),

-- COFFEE FRAPPE
('Cappuccino Frappe', 'Frosty cappuccino blended for a refreshing treat.', 1, 'COFFEE FRAPPE', '/uploads/backend/img/menu/coffee-frappe/cappuccino.png'),
('Caramel Macchiato Frappe', 'Cold caramel coffee blended with ice and milk.', 1, 'COFFEE FRAPPE', '/uploads/backend/img/menu/coffee-frappe/caramel-macchiato.png'),
('Mocha Frappe', 'Chilled mocha coffee with a chocolatey taste.', 1, 'COFFEE FRAPPE', '/uploads/backend/img/menu/coffee-frappe/mocha.png'),
('White Coffee Frappe', 'Cold white coffee blend with smooth texture.', 1, 'COFFEE FRAPPE', '/uploads/backend/img/menu/coffee-frappe/white-coffee.png'),

-- SIGNATURE DRINKS
('Biscoff Cream', 'Smooth Biscoff-flavored drink with a creamy texture.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/biscoff-cream.png'),
('Matcha Oreo', 'Matcha tea blended with Oreo cookies for crunch.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/matcha-oreo.png'),
('Matcha Strawberry Foam', 'Matcha with strawberry foam, a refreshing combination.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/matcha-strawberry-foam.png'),
('Strawberry Whipped Cheese', 'Sweet strawberry drink topped with whipped cheese.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/strawbery-whipped-cheese.png'),
('Ube Cream', 'Creamy and earthy ube-flavored signature beverage.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/ube-cream.png'),

-- FRUIT DRINKS
('Green Apple Juice', 'Crisp and tangy green apple fruit juice.', 1, 'FRUIT DRINK', '/uploads/backend/img/menu/fruit-drink/green-apple.png'),
('Lychee Juice', 'Delicate and fragrant lychee fruit juice.', 1, 'FRUIT DRINK', '/uploads/backend/img/menu/fruit-drink/lychee.png'),
('Mango Juice', 'Smooth and tropical mango fruit juice delight.', 1, 'FRUIT DRINK', '/uploads/backend/img/menu/fruit-drink/mango.png'),
('Strawberry Juice', 'Fresh strawberry fruit juice, naturally sweet.', 1, 'FRUIT DRINK', '/uploads/backend/img/menu/fruit-drink/strawberry.png'),

-- FRUIT FRAPPE
('Green Apple Frappe', 'Green apple fruit blended with ice, refreshing.', 1, 'FRUIT FRAPPE', '/uploads/backend/img/menu/fruit-frappe/green-apple-frappe.png'),
('Lychee Frappe', 'Blended lychee fruit frappe, subtly floral.', 1, 'FRUIT FRAPPE', '/uploads/backend/img/menu/fruit-frappe/lychee-frappe.png'),
('Mango Frappe', 'Chilled mango fruit blended into icy goodness.', 1, 'FRUIT FRAPPE', '/uploads/backend/img/menu/fruit-frappe/mango-frapp.png'),
('Strawberry Frappe', 'Frosty strawberry fruit drink with natural sweetness.', 1, 'FRUIT FRAPPE', '/uploads/backend/img/menu/fruit-frappe/strawberry-frappe.png'),

-- NACHOS
('Cheese Beef Nachos', 'Nachos topped with beef and melted cheese.', 1, 'NACHOS', '/uploads/backend/img/menu/nachos/cheese-beef-nachos.png'),
('Cheese Nachos', 'Crispy nachos drizzled with creamy cheese sauce.', 1, 'NACHOS', '/uploads/backend/img/menu/nachos/cheese-nachos.png'),

-- PIZZA
('Ham & Cheese Pizza', 'Classic ham and cheese on a crispy crust.', 1, 'PIZZA', '/uploads/backend/img/menu/pizza/ham-and-cheese-pizza.png'),
('Pepperoni Pizza', 'Spicy and savory pepperoni slices on pizza.', 1, 'PIZZA', '/uploads/backend/img/menu/pizza/pepperoni-pizza.png'),
('Shawarma Pizza', 'Middle Eastern flavors on a cheesy pizza.', 1, 'PIZZA', '/uploads/backend/img/menu/pizza/shawarma-pizza.png'),

-- GRILLED SANDWICH
('Cheese Sandwich', 'Toasted bread with melted cheese inside.', 1, 'GRILLED SANDWICH', '/uploads/backend/img/menu/grilled-sandwich/cheese-grilled-sandwich.png'),
('Ham & Cheese Sandwich', 'Grilled sandwich with ham and cheese filling.', 1, 'GRILLED SANDWICH', '/uploads/backend/img/menu/grilled-sandwich/ham-and-cheese-grilled-sandwich.png'),
('Nutella Sandwich', 'Sweet toasted bread with Nutella chocolate spread.', 1, 'GRILLED SANDWICH', '/uploads/backend/img/menu/grilled-sandwich/nutella-grilled-sandwich.png'),

-- CROFFLES
('Biscoff Croffle', 'Crispy croffle topped with Biscoff cookie spread.', 1, 'CROFFLES', '/uploads/backend/img/menu/croffles/biscoff-croffle.png'),

('Nutella Croffle', 'Sweet croffle topped with Nutella chocolate spread.', 1, 'CROFFLES', '/uploads/backend/img/menu/croffles/nutella-croffles.png'),
('Oreo Cream Croffle', 'Croffle with Oreo crumbles and creamy topping.', 1, 'CROFFLES', '/uploads/backend/img/menu/croffles/oreo-cream-croffles.png'),
('Tiramisu Croffle', 'Tiramisu-flavored croffle with cocoa and cream.', 1, 'CROFFLES', '/uploads/backend/img/menu/croffles/tiramisu-croffles.png'),

-- MINI DONUTS
('Biscoff Mini Donuts', 'Mini donuts covered with Biscoff spread.', 1, 'MINI DONUT', '/uploads/backend/img/menu/mini-donut/biscoff.png'),
('Chocolate Mini Donuts', 'Soft chocolate-flavored mini donuts, bite-sized delight.', 1, 'MINI DONUT', '/uploads/backend/img/menu/mini-donut/chocolate.png'),
('Nutella Mini Donuts', 'Mini donuts dipped in Nutella chocolate goodness.', 1, 'MINI DONUT', '/uploads/backend/img/menu/mini-donut/nutella.png'),
('Oreo Cream Mini Donuts', 'Mini donuts with Oreo cream topping.', 1, 'MINI DONUT', '/uploads/backend/img/menu/mini-donut/oreocream.png')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuSizes_Seeder` ()   INSERT INTO menu_item_sizes (id, menu_item_id, size, price) VALUES
-- Milktea Prices (M = 40.00, L = 50.00)
(1, 1, 'M', 40.00), (2, 1, 'L', 50.00),
(3, 2, 'M', 40.00), (4, 2, 'L', 50.00),
(5, 3, 'M', 40.00), (6, 3, 'L', 50.00),
(7, 4, 'M', 40.00), (8, 4, 'L', 50.00),
(9, 5, 'M', 40.00), (10, 5, 'L', 50.00),
(11, 17, 'M', 40.00), (12, 17, 'L', 50.00),
(13, 18, 'M', 40.00), (14, 18, 'L', 50.00),

-- Coffee Prices (M = 40.00, L = 50.00)
(15, 6, 'M', 40.00), (16, 6, 'L', 50.00),
(17, 7, 'M', 40.00), (18, 7, 'L', 50.00),
(19, 8, 'M', 40.00), (20, 8, 'L', 50.00),
(21, 9, 'M', 40.00), (22, 9, 'L', 50.00),
(23, 10, 'M', 40.00), (24, 10, 'L', 50.00),
(25, 11, 'M', 40.00), (26, 11, 'L', 50.00),
(27, 19, 'M', 40.00), (28, 19, 'L', 50.00),

-- Juice Prices (M = 40.00, L = 50.00)
(29, 12, 'M', 40.00), (30, 12, 'L', 50.00),
(31, 13, 'M', 40.00), (32, 13, 'L', 50.00),
(33, 14, 'M', 40.00), (34, 14, 'L', 50.00),
(35, 15, 'M', 40.00), (36, 15, 'L', 50.00),
(37, 16, 'M', 40.00), (38, 16, 'L', 50.00),
(39, 20, 'M', 40.00), (40, 20, 'L', 50.00)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuSizes_Seederv2` ()   INSERT INTO menu_item_sizes (menu_item_id, size, price) VALUES
-- ESPRESSO
(1, 'M', 59.00), (1, 'L', 69.00),
(2, 'M', 79.00), (2, 'L', 89.00),
(3, 'M', 89.00), (3, 'L', 99.00),
(4, 'M', 89.00), (4, 'L', 99.00),
(5, 'M', 119.00), (5, 'L', 129.00),
(6, 'M', 109.00), (6, 'L', 119.00),

-- COFFEE
(7, 'M', 40.00), (7, 'L', 50.00),
(8, 'M', 40.00), (8, 'L', 50.00),
(9, 'M', 40.00), (9, 'L', 50.00),
(10, 'M', 40.00), (10, 'L', 50.00),
(11, 'M', 50.00), (11, 'L', 60.00),

-- MILKTEA
(12, 'M', 40.00), (12, 'L', 50.00),
(13, 'M', 40.00), (13, 'L', 50.00),
(14, 'M', 40.00), (14, 'L', 50.00),
(15, 'M', 50.00), (15, 'L', 60.00),

-- COFFEE FRAPPE
(16, 'M', 60.00), (16, 'L', 70.00),
(17, 'M', 60.00), (17, 'L', 70.00),
(18, 'M', 60.00), (18, 'L', 70.00),
(19, 'M', 60.00), (19, 'L', 70.00),

-- SIGNATURE DRINKS
(20, 'M', 80.00), (20, 'L', 90.00),
(21, 'M', 90.00), (21, 'L', 100.00),
(22, 'M', 60.00), (22, 'L', 70.00),
(23, 'M', 80.00), (23, 'L', 90.00),
(24, 'M', 80.00), (24, 'L', 90.00),

-- FRUIT DRINKS
(25, 'M', 40.00), (25, 'L', 50.00),
(26, 'M', 40.00), (26, 'L', 50.00),
(27, 'M', 40.00), (27, 'L', 50.00),
(28, 'M', 40.00), (28, 'L', 50.00),

-- FRUIT FRAPPES
(29, 'M', 65.00), (29, 'L', 75.00),
(30, 'M', 65.00), (30, 'L', 75.00),
(31, 'M', 65.00), (31, 'L', 75.00),
(32, 'M', 65.00), (32, 'L', 75.00),

-- NACHOS
(33, 'REGULAR', 80.00),
(34, 'REGULAR', 100.00),

-- PIZZA
(35, '6 INCH', 60.00),
(36, '6 INCH', 65.00),
(37, '6 INCH', 65.00),

-- GRILLED SANDWICH
(38, 'REGULAR', 79.00),
(39, 'REGULAR', 89.00),
(40, 'REGULAR', 89.00),

-- CROFFLES
(41, 'MINI', 55.00), (41, 'REGULAR', 100.00),
(42, 'MINI', 55.00), (42, 'REGULAR', 100.00),
(43, 'MINI', 65.00), (43, 'REGULAR', 120.00),
(44, 'MINI', 65.00), (44, 'REGULAR', 120.00),

-- MINI DONUTS
(45, '6 PCS', 55.00), (45, '12 PCS', 100.00),
(46, '6 PCS', 60.00), (46, '12 PCS', 110.00),
(47, '6 PCS', 65.00), (47, '12 PCS', 120.00),
(48, '6 PCS', 60.00), (48, '12 PCS', 110.00)$$

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

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `stocks` int NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`id`, `name`, `price`, `stocks`, `available`) VALUES
(1, 'Booba Pearl', 10, 99, 1),
(2, 'Nata', 10, 99, 1),
(3, 'Whipped Cream', 15, 99, 1),
(4, 'Cheese Cake', 20, 99, 1),
(5, 'Caramel Drizzle', 10, 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
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

INSERT INTO `carts` (`id`, `user_id`, `menu_item_id`, `menu_item_size_id`, `add_ons_id`, `quantity`, `order_placed`) VALUES
(1, 4, 8, 15, NULL, 1, 1),
(2, 4, 21, 41, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `available` tinyint(1) NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `image_dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `available`, `category`, `image_dir`) VALUES
(1, 'Americano', 'Bold espresso with hot water for strong coffee lovers.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/americano.png'),
(2, 'Biscoff Latte', 'Espresso with creamy Biscoff spread and cookie flavors.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/biscoff-latte.png'),
(3, 'Cafe Latte', 'Smooth espresso with steamed milk, perfect morning drink.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/cafe-latte.png'),
(4, 'Salted Caramel Latte', 'Espresso and caramel blend with a salty twist.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/salted-caramel-latte.png'),
(5, 'Spanish Latte', 'Sweetened espresso with milk for a rich flavor.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/spanish-latte.png'),
(6, 'Tiramisu Latte', 'Coffee infused with cocoa and mascarpone cheese flavor.', 1, 'ESPRESSO', '/uploads/backend/img/menu/espresso/tiramisu-latte.png'),
(7, 'Cappuccino', 'Espresso, steamed milk, and frothy foam on top.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/cappuccino.png'),
(8, 'Caramel Macchiato', 'Espresso, milk, and caramel drizzle for sweetness.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/caramel-macchiato.png'),
(9, 'Kape Tuerca', 'Nutty and bold Filipino coffee blend, aromatic taste.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/kape-tuerca.png'),
(10, 'Mocha', 'Chocolate and espresso mix for a delightful drink.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/mocha.png'),
(11, 'White Coffee', 'Mild coffee with creamy milk, smooth and delicious.', 1, 'COFFEE', '/uploads/backend/img/menu/coffee/white-coffee.png'),
(12, 'Cookies & Cream', 'Milk tea blended with chocolate cookie crumbles.', 1, 'MILKTEA', '/uploads/backend/img/menu/milktea/cookies-and-cream.png'),
(13, 'Dark Chocolate', 'Deep and indulgent dark chocolate milk tea.', 1, 'MILKTEA', '/uploads/backend/img/menu/milktea/dark-chocolate.png'),
(14, 'Okinawa', 'Brown sugar-infused milk tea with roasted notes.', 1, 'MILKTEA', '/uploads/backend/img/menu/milktea/okinawa.png'),
(15, 'Red Velvet', 'Rich red velvet tea with sweet creamy topping.', 1, 'MILKTEA', '/uploads/backend/img/menu/milktea/red-velvet.png'),
(16, 'Cappuccino Frappe', 'Frosty cappuccino blended for a refreshing treat.', 1, 'COFFEE FRAPPE', '/uploads/backend/img/menu/coffee-frappe/cappuccino.png'),
(17, 'Caramel Macchiato Frappe', 'Cold caramel coffee blended with ice and milk.', 1, 'COFFEE FRAPPE', '/uploads/backend/img/menu/coffee-frappe/caramel-macchiato.png'),
(18, 'Mocha Frappe', 'Chilled mocha coffee with a chocolatey taste.', 1, 'COFFEE FRAPPE', '/uploads/backend/img/menu/coffee-frappe/mocha.png'),
(19, 'White Coffee Frappe', 'Cold white coffee blend with smooth texture.', 1, 'COFFEE FRAPPE', '/uploads/backend/img/menu/coffee-frappe/white-coffee.png'),
(20, 'Biscoff Cream', 'Smooth Biscoff-flavored drink with a creamy texture.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/biscoff-cream.png'),
(21, 'Matcha Oreo', 'Matcha tea blended with Oreo cookies for crunch.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/matcha-oreo.png'),
(22, 'Matcha Strawberry Foam', 'Matcha with strawberry foam, a refreshing combination.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/matcha-strawberry-foam.png'),
(23, 'Strawberry Whipped Cheese', 'Sweet strawberry drink topped with whipped cheese.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/strawbery-whipped-cheese.png'),
(24, 'Ube Cream', 'Creamy and earthy ube-flavored signature beverage.', 1, 'SIGNATURE DRINK', '/uploads/backend/img/menu/signature-drink/ube-cream.png'),
(25, 'Green Apple Juice', 'Crisp and tangy green apple fruit juice.', 1, 'FRUIT DRINK', '/uploads/backend/img/menu/fruit-drink/green-apple.png'),
(26, 'Lychee Juice', 'Delicate and fragrant lychee fruit juice.', 1, 'FRUIT DRINK', '/uploads/backend/img/menu/fruit-drink/lychee.png'),
(27, 'Mango Juice', 'Smooth and tropical mango fruit juice delight.', 1, 'FRUIT DRINK', '/uploads/backend/img/menu/fruit-drink/mango.png'),
(28, 'Strawberry Juice', 'Fresh strawberry fruit juice, naturally sweet.', 1, 'FRUIT DRINK', '/uploads/backend/img/menu/fruit-drink/strawberry.png'),
(29, 'Green Apple Frappe', 'Green apple fruit blended with ice, refreshing.', 1, 'FRUIT FRAPPE', '/uploads/backend/img/menu/fruit-frappe/green-apple-frappe.png'),
(30, 'Lychee Frappe', 'Blended lychee fruit frappe, subtly floral.', 1, 'FRUIT FRAPPE', '/uploads/backend/img/menu/fruit-frappe/lychee-frappe.png'),
(31, 'Mango Frappe', 'Chilled mango fruit blended into icy goodness.', 1, 'FRUIT FRAPPE', '/uploads/backend/img/menu/fruit-frappe/mango-frappe.png'),
(32, 'Strawberry Frappe', 'Frosty strawberry fruit drink with natural sweetness.', 1, 'FRUIT FRAPPE', '/uploads/backend/img/menu/fruit-frappe/strawberry-frappe.png'),
(33, 'Cheese Beef Nachos', 'Nachos topped with beef and melted cheese.', 1, 'NACHOS', '/uploads/backend/img/menu/nachos/cheese-beef-nachos.png'),
(34, 'Cheese Nachos', 'Crispy nachos drizzled with creamy cheese sauce.', 1, 'NACHOS', '/uploads/backend/img/menu/nachos/cheese-nachos.png'),
(35, 'Ham & Cheese Pizza', 'Classic ham and cheese on a crispy crust.', 1, 'PIZZA', '/uploads/backend/img/menu/pizza/ham-and-cheese-pizza.png'),
(36, 'Pepperoni Pizza', 'Spicy and savory pepperoni slices on pizza.', 1, 'PIZZA', '/uploads/backend/img/menu/pizza/pepperoni-pizza.png'),
(37, 'Shawarma Pizza', 'Middle Eastern flavors on a cheesy pizza.', 1, 'PIZZA', '/uploads/backend/img/menu/pizza/shawarma-pizza.png'),
(38, 'Cheese Sandwich', 'Toasted bread with melted cheese inside.', 1, 'GRILLED SANDWICH', '/uploads/backend/img/menu/grilled-sandwich/cheese-grilled-sandwich.png'),
(39, 'Ham & Cheese Sandwich', 'Grilled sandwich with ham and cheese filling.', 1, 'GRILLED SANDWICH', '/uploads/backend/img/menu/grilled-sandwich/ham-and-cheese-grilled-sandwich.png'),
(40, 'Nutella Sandwich', 'Sweet toasted bread with Nutella chocolate spread.', 1, 'GRILLED SANDWICH', '/uploads/backend/img/menu/grilled-sandwich/nutella-grilled-sandwich.png'),
(41, 'Biscoff Croffle', 'Crispy croffle topped with Biscoff cookie spread.', 1, 'CROFFLES', '/uploads/backend/img/menu/croffles/biscoff-croffle.png'),
(42, 'Nutella Croffle', 'Sweet croffle topped with Nutella chocolate spread.', 1, 'CROFFLES', '/uploads/backend/img/menu/croffles/nutella-croffles.png'),
(43, 'Oreo Cream Croffle', 'Croffle with Oreo crumbles and creamy topping.', 1, 'CROFFLES', '/uploads/backend/img/menu/croffles/oreo-cream-croffles.png'),
(44, 'Tiramisu Croffle', 'Tiramisu-flavored croffle with cocoa and cream.', 1, 'CROFFLES', '/uploads/backend/img/menu/croffles/tiramisu-croffles.png'),
(45, 'Biscoff Mini Donuts', 'Mini donuts covered with Biscoff spread.', 1, 'MINI DONUT', '/uploads/backend/img/menu/mini-donut/biscoff.png'),
(46, 'Chocolate Mini Donuts', 'Soft chocolate-flavored mini donuts, bite-sized delight.', 1, 'MINI DONUT', '/uploads/backend/img/menu/mini-donut/chocolate.png'),
(47, 'Nutella Mini Donuts', 'Mini donuts dipped in Nutella chocolate goodness.', 1, 'MINI DONUT', '/uploads/backend/img/menu/mini-donut/nutella.png'),
(48, 'Oreo Cream Mini Donuts', 'Mini donuts with Oreo cream topping.', 1, 'MINI DONUT', '/uploads/backend/img/menu/mini-donut/oreocream.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_sizes`
--

CREATE TABLE `menu_item_sizes` (
  `id` int NOT NULL,
  `menu_item_id` int NOT NULL,
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_item_sizes`
--

INSERT INTO `menu_item_sizes` (`id`, `menu_item_id`, `size`, `price`) VALUES
(1, 1, 'M', 59),
(2, 1, 'L', 69),
(3, 2, 'M', 119),
(4, 2, 'L', 129),
(5, 3, 'M', 79),
(6, 3, 'L', 89),
(7, 4, 'M', 89),
(8, 4, 'L', 99),
(9, 5, 'M', 89),
(10, 5, 'L', 99),
(11, 6, 'M', 109),
(12, 6, 'L', 119),
(13, 7, 'M', 40),
(14, 7, 'L', 50),
(15, 8, 'M', 40),
(16, 8, 'L', 50),
(17, 9, 'M', 50),
(18, 9, 'L', 60),
(19, 10, 'M', 40),
(20, 10, 'L', 50),
(21, 11, 'M', 40),
(22, 11, 'L', 50),
(23, 12, 'M', 40),
(24, 12, 'L', 50),
(25, 13, 'M', 50),
(26, 13, 'L', 60),
(27, 14, 'M', 40),
(28, 14, 'L', 50),
(29, 15, 'M', 40),
(30, 15, 'L', 50),
(31, 16, 'M', 60),
(32, 16, 'L', 70),
(33, 17, 'M', 60),
(34, 17, 'L', 70),
(35, 18, 'M', 60),
(36, 18, 'L', 70),
(37, 19, 'M', 60),
(38, 19, 'L', 70),
(39, 20, 'M', 90),
(40, 20, 'L', 100),
(41, 21, 'M', 80),
(42, 21, 'L', 90),
(43, 22, 'M', 80),
(44, 22, 'L', 90),
(45, 23, 'M', 80),
(46, 23, 'L', 90),
(47, 24, 'M', 60),
(48, 24, 'L', 70),
(49, 25, 'M', 40),
(50, 25, 'L', 50),
(51, 26, 'M', 40),
(52, 26, 'L', 50),
(53, 27, 'M', 40),
(54, 27, 'L', 50),
(55, 28, 'M', 40),
(56, 28, 'L', 50),
(57, 29, 'M', 65),
(58, 29, 'L', 75),
(59, 30, 'M', 65),
(60, 30, 'L', 75),
(61, 31, 'M', 65),
(62, 31, 'L', 75),
(63, 32, 'M', 65),
(64, 32, 'L', 75),
(65, 33, 'R', 80),
(66, 34, 'R', 100),
(67, 35, '6 Inches', 60),
(68, 36, '6 Inches', 65),
(69, 37, '6 Inches', 65),
(70, 38, 'R', 35),
(71, 39, 'R', 45),
(72, 40, 'R', 40),
(73, 41, 'Mini', 55),
(74, 41, 'Regular', 100),
(75, 42, 'Mini', 55),
(76, 42, 'Regular', 100),
(77, 43, 'Mini', 65),
(78, 43, 'Regular', 120),
(79, 44, 'Mini', 65),
(80, 44, 'Regular', 120),
(81, 45, '6pcs', 55),
(82, 45, '12pcs', 100),
(83, 46, '6pcs', 60),
(84, 46, '12pcs', 110),
(85, 47, '6pcs', 65),
(86, 47, '12pcs', 120),
(87, 48, '6pcs', 60),
(88, 48, '12pcs', 110);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `transaction_id` int NOT NULL,
  `cart_id` int NOT NULL,
  `total_price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `cart_id`, `total_price`, `created_at`) VALUES
(1, 1, 1, 40, '2025-03-20 12:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_requests`
--

CREATE TABLE `password_reset_requests` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token_selector` text COLLATE utf8mb4_general_ci NOT NULL,
  `token_validate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exp_date` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `rider_id` int DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount_due` float NOT NULL,
  `amount_tendered` float DEFAULT NULL,
  `sukli` float DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `rider_id`, `payment_method`, `amount_due`, `amount_tendered`, `sukli`, `location`, `status`, `created_at`) VALUES
(1, 4, NULL, NULL, 90, NULL, NULL, NULL, 'pending', '2025-03-20 12:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profile_dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `contact_number`, `profile_dir`, `created_at`) VALUES
(1, NULL, NULL, 'Jonas', 'jonasvincemaca@gmail.com', '$2y$10$F.lpR5v2Kt23QvToHP7CzOXCkCX1cyo/hRuJAMWb46ZkBl2hK4CXy', NULL, NULL, '2025-03-14 12:49:14'),
(2, NULL, NULL, 'Marco', 'marco@gmail.com', '$2y$10$5utcX7iX7.NQCPxzT9NDPeTAS1qulrf0v1Buqdy4QKVqtvGhEr99K', NULL, NULL, '2025-03-17 14:20:05'),
(3, NULL, NULL, 'Macawile', 'macawile@gmail.com', '$2y$10$LBdTvW2fV/mub.9gGY1qGejF5PHA2.C1pR5Vp7EoGJGaxvX7uT3Gu', NULL, NULL, '2025-03-18 05:22:49'),
(4, NULL, NULL, 'Elisha', 'elisha@gmail.com', '$2y$10$ZOAQFx.mdCMs1xJfQBclJuEpY1miL0GpY0HZR9o4pUL8rJwuzGMDK', NULL, NULL, '2025-03-18 14:56:13'),
(7, NULL, NULL, 'Honas', 'jonasemperor@gmail.com', '$2y$10$kEhda1tbaUKdU0I9Ac4ZCe2he6qcmj5ZTmbFhezATrB055/PpQNgm', NULL, NULL, '2025-03-21 09:48:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_item_id` (`menu_item_id`),
  ADD KEY `menu_item_size_id` (`menu_item_size_id`),
  ADD KEY `add_ons_id` (`add_ons_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item_sizes`
--
ALTER TABLE `menu_item_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `menu_item_sizes`
--
ALTER TABLE `menu_item_sizes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`menu_item_size_id`) REFERENCES `menu_item_sizes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_4` FOREIGN KEY (`add_ons_id`) REFERENCES `add_ons` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `menu_item_sizes`
--
ALTER TABLE `menu_item_sizes`
  ADD CONSTRAINT `menu_item_sizes_ibfk_1` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`rider_id`) REFERENCES `employees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
