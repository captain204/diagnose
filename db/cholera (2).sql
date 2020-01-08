-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 07:46 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cholera`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(2, 'user', '$2y$10$1g7HmBWjneBtuq39fpQkMefyH4ZMiSCKjblmolya1OkH5BRUwcyp6', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diarrhorea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vomiting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dehydration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `appearance` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consistency` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mucus` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ova` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cyst` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `larva` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organism` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `diarrhorea`, `vomiting`, `dehydration`, `patient_id`, `appearance`, `consistency`, `mucus`, `ova`, `cyst`, `larva`, `organism`, `created_at`, `updated_at`) VALUES
(1, 'mild', 'mild', 'moderate', 1, '', '', '', '', '', '', '', '2019-11-27 16:56:15', '2019-11-27 16:56:15'),
(2, 'mild', 'mild', 'moderate', 5, '', '', '', '', '', '', '', NULL, NULL),
(3, 'moderate', 'moderate', 'severe', 6, '', '', '', '', '', '', '', NULL, NULL),
(4, 'moderate', 'mild', 'moderate', 7, 'yellow', 'green', 'yes', '3.5', '5.5', '5', 'bacteria', NULL, NULL),
(5, 'moderate', 'severe', 'mild', 8, 'yellow', 'green', 'yes', '3.5', '5.5', '5', 'bacteria', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_11_18_114710_create_patients_table', 1),
(21, '2019_11_18_115252_create_diagnoses_table', 1),
(22, '2019_11_19_125728_create_reports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `marital_status`, `date_birth`, `phone`, `email`, `address`, `occupation`, `doc_name`, `doc_id`) VALUES
(1, 'Eniola', 'Badmos', 'single', '1988-01-04', '08023484844', 'eni@gmail.com', 'Lekki Phase Two', 'Actress', 'admin', 1),
(5, 'Uncle', 'Nas', 'married', '2020-01-02', '07067653476', 'test@gmail.com', 'Bauchi', 'Doctor', 'Mr Doctor', 2),
(6, 'Folasade', 'Martins', 'married', '2020-01-03', '08023484844', 'john@example.com', 'Jos North', 'Actress', 'Mr Doctor', 2),
(7, 'Bolanle', 'Kudus', 'married', '1992-05-04', '07067653476', 'bolanle@gmail.com', 'Bauchi', 'Trader', 'Dr Nasiru Muhammad', 2),
(8, 'Final', 'Test', 'married', '1992-08-03', '07067653476', 'aaron@gmail.com', 'Bauchi', 'Developer', 'Dr Bala Malik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `treatment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `level`, `symptoms`, `treatment`, `created_at`, `updated_at`) VALUES
(1, 'mild', 'General symptoms of cholera ', 'Individuals can prevent or reduce the chance they may get cholera by thorough hand washing, avoiding areas and people with cholera, drinking treated water or similar safe fluids, and eating cleaned and well-cooked food. In addition, there are vaccines available that can help prevent cholera, although they are not available in the U.S., and their effectiveness ranges from 50%-90%, depending on the studies reported. The vaccines are oral cholera vaccines, because injected vaccines have not proved to be very effective. Two vaccines (Shanchol and Dukoral) are composed of killed V. cholerae bacteria and don\'t contain the enterotoxin B subunit. Unfortunately, both offer protection for only about two years, although one report suggests that Shanchol is about 65% effective over five years. Both vaccines are usually given in two doses, about one to six weeks apart. Unfortunately, the vaccines have limited availability; their recommended use is for people going to areas of known outbreaks with the likely possibility the person may be exposed to cholera. Some researchers suggest this limited oral vaccine availability should be changed and cite data that oral vaccine may help limit outbreaks, even after they have begun.\r\n', NULL, NULL),
(2, 'moderate', 'The symptoms and signs of cholera-related disease are a watery diarrhea that often contains flecks of whitish material (mucus and some gastrointestinal lining [epithelial] cells) that are about the size of pieces of rice. The diarrhea is termed \"rice-water stool\" (See figure 1) and smells \"fishy.\" Although many bacterial infections may cause diarrhea, the volume of diarrhea with cholera can be enormous; high levels of diarrheal fluid, such as 250 cc per kg or about 10 to 18 liters over 24 hours for a 154-pound adult, can occur. People may go on to develop one or more of the following symptoms and signs:\r\n\r\n    Watery diarrhea (sometimes in large volumes)\r\n    Rice-water stools (see figure 1)\r\n    Fishy odor to stools\r\n    Vomiting\r\n    Rapid heart rate\r\n    Loss of skin elasticity (washer woman hands sign; see figure 2)\r\n    Dry mucous membranes (dry mouth)\r\n    Low blood pressure\r\n    Thirst\r\n    Muscle cramps (leg cramps, for example)\r\n    Restlessness or irritability (especially in children)\r\n    Unusual sleepiness or tiredness\r\n', 'Those infected require immediate hydration to prevent these symptoms from continuing because these signs and symptoms indicate that the person is becoming or is dehydrated and may go on to develop severe cholera. People with severe cholera (about 5%-10% of previously healthy people; higher if a population is compromised by poor nutrition or has a high percentage of very young or elderly people) can develop severe dehydration, leading to acute renal failure, severe electrolyte imbalances (especially potassium and sodium), and coma. If untreated, this severe dehydration can rapidly lead to shock and death. Severe dehydration can often occur four to eight hours after the first liquid stool, ending with death in about 18 hours to a few days in undertreated or untreated people. In epidemic outbreaks in underdeveloped countries where little or no treatment is available, the mortality (death) rate can be as high as 50%-60%.\r\nThe American center for disease control CDC (and almost every medical agency) recommends rehydration with ORS (oral rehydration salts) fluids as the primary treatment for cholera. ORS fluids are available in prepackaged containers, commercially available worldwide, and contain glucose and electrolytes. The CDC follows the guidelines developed by the WHO (World Health Organization) as follows:\r\nWHO Fluid Replacement or Treatment Recommendations (as per the CDC)Patient condition	Treatment	Treatment volume guidelines; age and weight\r\nNo dehydration	Oral rehydration salts (ORS)	Children < 2 years: 50 mL-100 mL, up to 500 mL/day\r\nChildren 2-9 years: 100 mL-200 mL, up to 1,000 mL/day\r\nPatients > 9 years: As much as wanted, to 2,000 mL/day\r\nSome dehydration	Oral rehydration salts (amount in first four hours)	Infants < 4 mos (< 5 kg): 200-400 mL\r\nInfants 4 mos-11 mos (5 kg-7.9 kg): 400-600 mL\r\nChildren 1 yr-2 yrs (8 kg-10.9 kg): 600-800 mL\r\nChildren 2 yrs-4 yrs (11 kg-15.9 kg): 800-1,200 mL\r\nChildren 5 yrs-14 yrs (16 kg-29.9 kg): 1,200-2,200 mL\r\nPatients > 14 yrs (30 kg or more): 2,200-4,000 mL\r\nSevere dehydration	IV drips of Ringer Lactate or, if not available, normal saline and oral rehydration salts as outlined above	Age < 12 months: 30 mL/kg within one hour*, then 70 mL/kg over five hours\r\nAge > 1 year: 30 mL/kg within 30 min*, then 70 mL/kg over two and a half hours\r\n\r\n*Repeat once if radial pulse is still very weak or not detectable\r\n\r\n    Reassess the patient every one to two hours and continue hydrating. If hydration is not improving, give the IV drip more rapidly. 200 mL/kg or more may be needed during the first 24 hours of treatment.\r\n    After six hours (infants) or three hours (older patients), perform a full reassessment. Switch to ORS solution if hydration is improved and the patient can drink.\r\n', NULL, NULL),
(3, 'severe', 'With more severe disease, include the following:\r\n\r\n    Abdominal pain (cramps)\r\n    Rectal pain\r\n    Fever\r\n    Severe vomiting\r\n    Dehydration\r\n    Low or no urine output\r\n    Weight loss\r\n    Seizures\r\n    Shock\r\n    Death\r\n\r\n', '\r\nIn general, antibiotics are reserved for more severe cholera infections; they function to reduce fluid rehydration volumes and may speed recovery. Although good microbiological principles dictate it is best to treat a patient with antibiotics that are known to be effective against the infecting bacteria, this may take too long a time to accomplish during an initial outbreak (but it still should be attempted); meanwhile, severe infections have been effectively treated with tetracycline (Sumycin), doxycycline (Vibramycin, Oracea, Adoxa, Atridox, and others), furazolidone (Furoxone), erythromycin (E-Mycin, Eryc, Ery-Tab, PCE, Pediazole, Ilosone), or ciprofloxacin (Cipro, Cipro XR, ProQuin XR) in conjunction with the following antibiotics in conjunction with IV hydration and electrolytes:\r\n\r\n    Tetracycline (Sumycin)\r\n    Doxycycline (Vibramycin, Oracea, Adoxa, Atridox, and others)\r\n    Furazolidone (Furoxone)\r\n    Erythromycin (E-Mycin, Eryc, Ery-Tab, PCE, Pediazole, Ilosone)\r\n    Azithromycin (Zithromax)\r\n    Sulfamethoxazole/trimethoprim (Bactrim, Septra)\r\n    Ampicillin\r\n    Ciprofloxacin (Cipro, Cipro XR, ProQuin XR)\r\n    Norfloxacin (Noroxin)\r\n\r\nMany antibiotics are listed; however, because of widespread antibiotic resistance, including multi-resistant Vibrio strains, antibiotic susceptibility testing is advised so the appropriate antibiotic is chosen. In addition, quinolones (for example, ciprofloxacin, norfloxacin) should not be used in children if other antibiotics can be effective because of possible musculoskeletal adverse effects.\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$1g7HmBWjneBtuq39fpQkMefyH4ZMiSCKjblmolya1OkH5BRUwcyp6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
