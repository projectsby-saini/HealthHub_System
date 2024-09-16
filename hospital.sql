-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 07:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(0, 'divyansh', 'a123'),
(1, 'divyansh', 'a123'),
(0, 'admin', 'a123');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `department`, `doctor_name`, `date`, `time`) VALUES
(1, 5, 'General Surgery', 'Dr. Marie Durocher', '2024-06-15', '13:00:00'),
(2, 6, 'Orthopedics', 'Dr. Russel', '2024-06-15', '09:00:00'),
(3, 7, 'General Surgery', 'Dr. Marie Durocher', '2024-06-12', '12:00:00'),
(4, 8, 'Psychiatry', 'Dr. Maria Francisca', '2024-06-16', '15:00:00'),
(5, 9, 'Pediatrics', 'Dr. Will Griever', '2024-05-29', '14:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `insurance` varchar(100) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `consultant_fees` decimal(10,2) NOT NULL,
  `treatment_fees` decimal(10,2) NOT NULL,
  `room_charge` decimal(10,2) NOT NULL,
  `payment_method` enum('Cash','NetBanking','Paytm','Gpay') NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `bill_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `patient_id`, `name`, `dob`, `gender`, `blood_group`, `email`, `mobile`, `address`, `insurance`, `doctor_name`, `consultant_fees`, `treatment_fees`, `room_charge`, `payment_method`, `total_amount`, `bill_date`) VALUES
(1, 5, 'Anshu', '2002-05-16', 'Male', 'AB-', 'singh@gmail.com', '8498742475', 'Chauhan nivas house no. 872A Nehru marg lane no. 8 subhashnagar, Dehradun (Uttarakhand))', 'Private', 'Dr. Marie Durocher', 500.00, 40000.00, 5500.00, 'Cash', 46000.00, '2024-05-26 15:34:28'),
(2, 8, 'Riya Saini', '2002-06-15', 'Female', 'O-', 'asaini@gmail.com', '7586485925', 'Lane no 10 , Modinagar , India', 'Private', 'Dr. Maria Francisca', 500.00, 2000.00, 200.00, 'Cash', 2700.00, '2024-05-26 20:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `uname`, `pass`) VALUES
(1, 'divyansh', 'doc123');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `contact`, `email`, `address`, `dob`, `gender`) VALUES
(1, 'Naman Verma ', 'Lab Technician', '855328596', 'vnaman@gmail.com', 'Dehradun , UK', '2004-05-16', 'Male'),
(2, 'Anjali Sharma', 'Nurse', '854728596', 'anjali.sharma@gmail.com', 'Delhi, DL', '1985-03-25', 'Female'),
(3, 'Ravi Kumar', 'Pharmacist', '874738596', 'ravi.kumar@gmail.com', 'Mumbai, MH', '1990-07-11', 'Male'),
(4, 'Suman Gupta', 'Receptionist', '847528596', 'suman.gupta@gmail.com', 'Chennai, TN', '1992-12-01', 'Female'),
(5, 'Karan Mehta', 'Surgeon', '875528596', 'karan.mehta@gmail.com', 'Bangalore, KA', '1988-09-17', 'Male'),
(6, 'Priya Singh', 'Radiologist', '857528596', 'priya.singh@gmail.com', 'Kolkata, WB', '1987-11-23', 'Female'),
(7, 'Amit Patel', 'Cardiologist', '859528596', 'amit.patel@gmail.com', 'Ahmedabad, GJ', '1984-01-15', 'Male'),
(8, 'Meena Joshi', 'Gynaecologist', '853328596', 'meena.joshi@gmail.com', 'Pune, MH', '1989-04-19', 'Female'),
(9, 'Rahul Desai', 'Orthopaedic', '852328596', 'rahul.desai@gmail.com', 'Surat, GJ', '1986-06-10', 'Male'),
(10, 'Sneha Kapoor', 'Neurologist', '851328596', 'sneha.kapoor@gmail.com', 'Jaipur, RJ', '1991-02-20', 'Female'),
(11, 'Vikas Rai', 'Paediatrician', '850328596', 'vikas.rai@gmail.com', 'Lucknow, UP', '1983-05-30', 'Male'),
(12, 'Neha Agarwal', 'Dentist', '849328596', 'neha.agarwal@gmail.com', 'Patna, BR', '1993-07-21', 'Female'),
(13, 'Ajay Gupta', 'ENT Specialist', '848328596', 'ajay.gupta@gmail.com', 'Bhopal, MP', '1982-09-14', 'Male'),
(14, 'Pooja Sharma', 'Physiotherapist', '847328596', 'pooja.sharma@gmail.com', 'Indore, MP', '1994-10-05', 'Female'),
(15, 'Arjun Reddy', 'Dermatologist', '846328596', 'arjun.reddy@gmail.com', 'Hyderabad, TS', '1985-12-25', 'Male'),
(16, 'Ram Singh', 'Lab Technician', '7584569545', 'ram@gmail.com', 'Sector 24, Ghaziabad India', '1996-04-10', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL,
  `languages_spoken` varchar(255) NOT NULL,
  `contact_details` varchar(255) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `consultant_fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `name`, `age`, `gender`, `department`, `experience`, `languages_spoken`, `contact_details`, `mobile_no`, `email`, `schedule`, `consultant_fee`) VALUES
(1, 'Dr. Marie Durocher', 40, 'Female', 'General Surgeon', 15, 'English, French', 'Hospital XYZ, Address, City', '1234567890', 'marie@example.com', 'Mon-Fri: 9am-5pm', '500.00'),
(2, 'Dr. Charles', 45, 'Male', 'Cardiologist', 20, 'English, Spanish', 'Hospital XYZ, Address, City', '2345678901', 'charles@example.com', 'Mon-Fri: 8am-4pm', '450.00'),
(3, 'Dr. Will Griever', 38, 'Male', 'Paediatrician', 12, 'English', 'Hospital XYZ, Address, City', '3456789012', 'will@example.com', 'Mon-Fri: 10am-6pm', '400.00'),
(4, 'Dr. Joseph William', 50, 'Male', 'Dermatologist', 25, 'English', 'Hospital XYZ, Address, City', '4567890123', 'joseph@example.com', 'Mon-Fri: 9am-5pm', '600.00'),
(5, 'Dr. Emily Stove', 42, 'Female', 'Neurologist', 18, 'English', 'Hospital XYZ, Address, City', '5678901234', 'emily@example.com', 'Mon-Fri: 8am-4pm', '550.00'),
(6, 'Dr. David Anderson', 47, 'Male', 'ENT Specialist', 22, 'English', 'Hospital XYZ, Address, City', '6789012345', 'david@example.com', 'Mon-Fri: 10am-6pm', '500.00'),
(7, 'Dr. Russel', 55, 'Male', 'Orthopedic', 30, 'English', 'Hospital XYZ, Address, City', '7890123456', 'russel@example.com', 'Mon-Fri: 9am-5pm', '450.00'),
(8, 'Dr. Anita Jennings', 38, 'Female', 'Gynecologist', 10, 'English', 'Hospital XYZ, Address, City', '8901234567', 'anita@example.com', 'Mon-Fri: 8am-4pm', '400.00'),
(9, 'Dr. Maria Francisca', 41, 'Female', 'Psychiatry', 16, 'English, Portuguese', 'Hospital XYZ, Address, City', '9012345678', 'maria@example.com', 'Mon-Fri: 10am-6pm', '500.00'),
(10, 'Dr. Jessica Parker', 40, 'Female', 'Paediatrician', 14, 'English', 'Hospital XYZ, Address, City', '0123456789', 'jessica@example.com', 'Mon-Fri: 9am-5pm', '450.00'),
(11, 'Dr. Catherine Smith', 52, 'Female', 'Ophthalmologist', 28, 'English', 'Hospital XYZ, Address, City', '1234567890', 'catherine@example.com', 'Mon-Fri: 8am-4pm', '550.00'),
(12, 'Dr. Andrew Wilson', 45, 'Male', 'Endocrinologist', 20, 'English', 'Hospital XYZ, Address, City', '2345678901', 'andrew@example.com', 'Mon-Fri: 10am-6pm', '450.00'),
(14, 'Harry Singh', 40, 'Male', 'Ortho', 5, 'English, Japanese', 'Hospital ', '83628538', 'singh@gmail.com', 'Mon-Fri: 10am-6pm', '200:00'),
(15, 'Mary Smith', 39, 'Female', 'Surgeon', 8, 'English , Spanish', 'Hospital, XYZ city', '8956458964', 'smith@gmail.com', 'Mon-Fri: 10am-6pm', '450:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `category`, `product_name`, `quantity`, `expiry_date`) VALUES
(1, 'Medicines', 'Paracetamol', 100, '2024-06-30'),
(2, 'Medicines', 'Ibuprofen', 50, '2024-08-15'),
(3, 'Equipment', 'Blood Pressure Monitor', 10, '2025-01-01'),
(4, 'Equipment', 'Stethoscope', 20, '2025-02-28'),
(5, 'Medicines', 'Aspirin', 50, '2024-07-15'),
(6, 'Medicines', 'Antacid', 30, '2024-09-30'),
(7, 'Medicines', 'Antibiotic', 40, '2024-10-31'),
(8, 'Medicines', 'Cough Syrup', 25, '2024-11-15'),
(9, 'Medicines', 'Antihistamine', 35, '2024-12-31'),
(10, 'Medicines', 'Pain Relief Gel', 20, '2024-12-31'),
(11, 'Equipment', 'Thermometer', 15, '2025-03-15'),
(12, 'Equipment', 'Oxygen Cylinder', 5, '2025-04-30'),
(13, 'Equipment', 'ECG Machine', 8, '2025-05-31'),
(14, 'Equipment', 'Nebulizer', 10, '2025-06-15'),
(15, 'Equipment', 'Wheelchair', 3, '2025-07-31'),
(16, 'Equipment', 'Crutches', 5, '2025-08-31'),
(17, 'Supplies', 'Bandages', 100, '2025-09-15'),
(18, 'Supplies', 'Gloves', 200, '2025-10-31'),
(19, 'Supplies', 'Masks', 150, '2025-11-30'),
(20, 'Equipment', 'Test tubes', 10, '2030-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `doctor` varchar(255) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `treatment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `uname`, `pass`) VALUES
(1, 'divyansh', 'p123');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `insurance` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `dob`, `gender`, `blood_group`, `email`, `mobile`, `address`, `insurance`, `uname`, `pass`) VALUES
(1, 'Divyansh Saini', '2004-05-10', 'Male', 'O-', 'singh@gmail.com', '8952655959', 'Chauhan nivas house no. 872A Nehru marg lane no. 8 subhashnagar, Dehradun (Uttarakhand))', 'Private', 'divyansh', 'p123'),
(2, 'Anshu', '2003-05-10', 'Male', 'O+', 'saini@gmail.com', '958942279', 'Chauhan nivas house no. 872A Nehru marg lane no. 8 subhashnagar, Dehradun (Uttarakhand))', 'Private', 'divyansh', 'p123'),
(3, 'Ansh', '2003-05-15', 'Male', 'A+', 'singh@gmail.com', '8498742475', 'Chauhan nivas house no. 872A Nehru marg lane no. 8 subhashnagar, Dehradun (Uttarakhand))', 'Private', 'divyansh', 'p123'),
(4, 'ABC', '2002-02-05', 'Male', 'AB-', 'saini@gmail.com', '9589422795', 'Chauhan nivas house no. 872A Nehru marg lane no. 8 subhashnagar, Dehradun (Uttarakhand))', 'Private', 'ansh', 'a123'),
(5, 'Anshu', '2002-05-16', 'Male', 'AB-', 'saini@gmail.com', '8498742475', 'Chauhan nivas house no. 872A Nehru marg lane no. 8 subhashnagar, Dehradun (Uttarakhand))', 'Private', 'anshu', 'a123'),
(6, 'Divyansh Saini', '2003-05-15', 'Male', 'O-', 'sainidivyansh.569@gmail.com', '9548942279', 'Chauhan nivas house no. 872A Nehru marg lane no. 8 subhashnagar, Dehradun (Uttarakhand))', 'Private', '', ''),
(7, 'Anshika Singh', '0203-06-10', 'Female', 'AB+', 'anshika@gmail.com', '8569523651', 'Sector-62 Noida , India', 'Private', '', ''),
(8, 'Riya Saini', '2002-06-15', 'Female', 'O-', 'asaini@gmail.com', '7586485925', 'Lane no 10 , Modinagar , India', 'Private', '', ''),
(9, 'Sumit', '2024-05-29', 'Male', 'A+', 'sainidivyansh.569@gmail.com', '9548942279', 'Chauhan nivas house no. 872A Nehru marg lane no. 8 subhashnagar, Dehradun (Uttarakhand))', 'Private', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `status` enum('Available','Occupied') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `room_type`, `status`) VALUES
(1, '101', 'Standard', 'Occupied'),
(2, '102', 'Deluxe', 'Available'),
(3, '103', 'Suite', 'Available'),
(4, '104', 'Standard', 'Available'),
(5, '105', 'Deluxe', 'Occupied'),
(6, '106', 'Standard', 'Available'),
(7, '107', 'Suite', 'Available'),
(8, '108', 'Standard', 'Available'),
(9, '109', 'Deluxe', 'Available'),
(10, '110', 'Suite', 'Available'),
(11, '201', 'Standard', 'Available'),
(12, '202', 'Deluxe', 'Available'),
(13, '203', 'Suite', 'Available'),
(14, '204', 'Standard', 'Available'),
(15, '205', 'Deluxe', 'Available'),
(16, '206', 'Standard', 'Available'),
(17, '207', 'Suite', 'Available'),
(18, '208', 'Standard', 'Available'),
(19, '209', 'Deluxe', 'Available'),
(20, '210', 'Suite', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `room_allocation`
--

CREATE TABLE `room_allocation` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `allocation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_allocation`
--

INSERT INTO `room_allocation` (`id`, `patient_id`, `room_id`, `allocation_date`) VALUES
(3, 7, 5, '2024-06-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `room_id` (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_allocation`
--
ALTER TABLE `room_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD CONSTRAINT `room_allocation_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `room_allocation_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
