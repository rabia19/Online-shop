


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `phone` (
  `id` int(10) NOT NULL COMMENT 'AUTO_INCREMENT',
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `phone` (`id`, `name`, `code`, `price`, `image`) VALUES
(1, 'iPhone XMax\"', 'phone01', 600.00, 'product-images/IphoneMax.png'),
(2, 'iPhone XMax\"', 'phone01', 600.00, 'product-images/IphoneMax.png'),
(3, 'iPhone XMax\"', 'phone01', 600.00, 'product-images/IphoneMax.png'),
(4, 'iPhone XMax\"', 'phone01', 600.00, 'product-images/IphoneMax.png'),
(5, 'iPhone XMax\"', 'phone01', 600.00, 'product-images/IphoneMax.png'),
(6, 'iPhone XMax\"', 'phone01', 600.00, 'product-images/IphoneMax.png');
COMMIT;

