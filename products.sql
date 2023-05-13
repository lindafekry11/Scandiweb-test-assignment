--
-- Database: `scandiweb_testtask`
--

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `properties` varchar(255) NOT NULL
);

--
-- Insert data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `type`, `properties`) VALUES
(1, 'JVC200123', 'Acme DISC', '1.00', 'Dvd', 'Size: 700 MB'),
(2, 'GGWP0007', 'War and Peace', '20.00', 'Book', 'Weight: 2 KG'),
(3, 'TR120555', 'Chair', '40.00', 'Furniture', 'Dimension: 24x45x15');


--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- AUTO_INCREMENT for table `products` 
--

--
-- The "id" column will automatically increment by 1, sets the starting value for the "id" column to be 4
--

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;


