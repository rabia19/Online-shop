

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`,`category`) VALUES
(1, 'MacBook Pro 13\"', '001', 600.00, 'product-images/l1.png', 'laptop'),
(2, 'MacBook Pro 13\"', '002', 50.00, 'product-images/l1.png', 'laptop'),
(3, 'MacBook Pro 13\"', '003', 700.00, 'product-images/l1.png', 'laptop'),
(4, 'MacBook Pro 13\"', '004', 600.00, 'product-images/l2.png', 'laptop'),
(5, 'MacBook Pro 13\"', '005', 50.00, 'product-images/l2.png', 'laptop'),
(6, 'MacBook Pro 13\"', '006', 700.00, 'product-images/l2.png', 'laptop'),
(7, 'iPhone XMax\"', '007', 600.00, 'product-images/IphoneMax.png', 'phone'),
(8, 'iPhone XMax\"', '008', 600.00, 'product-images/IphoneMax.png', 'phone'),
(9, 'iPhone XMax\"', '009', 600.00, 'product-images/IphoneMax.png', 'phone'),
(10, 'iPhone XMax\"', '010', 600.00, 'product-images/IphoneMax.png', 'phone'),
(11, 'iPhone XMax\"', '011', 600.00, 'product-images/IphoneMax.png', 'phone'),
(12, 'iPhone XMax\"', '012', 600.00, 'product-images/IphoneMax.png', 'phone');
