-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 02:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voltafrik_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` text NOT NULL,
  `category` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `body`, `image`, `user_id`, `category`, `type`, `price`, `created_at`, `updated_at`) VALUES
(33, 'Edge Computing', '<p>Edge computing is a paradigm shift in how data is processed in the digital landscape. Traditionally, data processing occurred in centralized cloud servers, but edge computing brings computation closer to the data source.&nbsp;</p><p>This approach is particularly beneficial in scenarios where low latency is crucial, such as in autonomous vehicles, IoT devices, and real-time analytics.&nbsp;</p><p>The decentralization of computing resources reduces the need for data to travel long distances to the cloud and back, resulting in faster response times. This is especially important in applications like augmented reality, where minimal latency is essential for a seamless user experience. However, challenges like security, standardization, and scalability need to be addressed for widespread adoption.</p>', '1704486452.jpg', 'Ohadoma Chukwuma', 'tech_news', 'Information', 'N/A', '2024-01-05 19:20:41', '2024-04-03 21:43:24'),
(34, 'Explainable Artificial Intelligence (XAI):', '<p>As artificial intelligence systems become more complex, the need for explainability becomes paramount. Explainable AI refers to the ability of AI models to provide clear and understandable reasons for their decisions. This is crucial in applications like healthcare and finance, where the consequences of AI decisions can have significant impacts.&nbsp;</p><p>Achieving explainability in AI is a multifaceted challenge. While complex neural networks often outperform simpler models, they tend to be less interpretable. Researchers are exploring methods to make black-box models more transparent without compromising their accuracy. Striking the right balance between accuracy and interpretability is crucial for the ethical and responsible deployment of AI.</p>', '1704486291.jpg', 'Ohadoma Chukwuma', 'tech_news', 'Information', 'N/A', '2024-01-05 19:24:51', '2024-04-03 22:38:51'),
(35, 'Biometric Technology and Privacy:', '<p>Biometric technologies, such as facial recognition, fingerprint scanning, and iris recognition, are becoming increasingly prevalent in various applications, from unlocking smartphones to airport security. While these technologies offer convenience and enhanced security, concerns about privacy and potential misuse have emerged.<br><br>The ethical implications of widespread biometric data collection are significant. Striking a balance between the benefits of enhanced security and protecting individuals\' privacy rights requires robust regulations and ethical considerations. Governments and organizations must establish clear guidelines on how biometric data is collected, stored, and used to prevent unauthorized access and potential misuse.</p>', '1704486537.jpg', 'Ohadoma Chukwuma', 'smart_gadgets', 'Information', 'N/A', '2024-01-05 19:28:57', '2024-04-03 22:37:32'),
(36, 'Digital Twins:', '<p>Digital twins are virtual replicas of physical objects or systems, created through the integration of IoT, sensors, and data analytics. These digital representations enable real-time monitoring, analysis, and simulation of physical entities, ranging from individual machines to entire cities.&nbsp;</p><p>In manufacturing, digital twins can optimize production processes by identifying inefficiencies and predicting maintenance needs. In urban planning, digital twins can simulate the impact of changes to infrastructure or policies. However, challenges such as data security, integration complexity, and the need for standardized frameworks must be addressed to fully unlock the potential of digital twins across various domains.</p>', '1704486665.jpg', 'Ohadoma Chukwuma', 'tech_news', 'Information', 'N/A', '2024-01-05 19:31:05', '2024-04-03 22:36:37'),
(37, 'Cybersecurity in the Quantum Era:', '<p>The advent of quantum computing poses a significant threat to traditional cryptographic methods. Quantum computers have the potential to break widely used encryption algorithms, compromising the security of sensitive data. As quantum computing progresses, there is a pressing need to develop quantum-resistant cryptographic techniques.&nbsp;</p><p>Post-quantum cryptography aims to create encryption methods that can withstand attacks from quantum computers. Standardization efforts are underway to identify and implement cryptographic algorithms that will be secure in the era of quantum computing.&nbsp;</p><p>The transition to quantum-resistant cryptography is a complex process that involves updating systems, protocols, and algorithms to ensure a secure digital environment in the future.</p>', '1704486743.jpg', 'Ohadoma Chukwuma', 'tech_news', 'Information', 'N/A', '2024-01-05 19:32:23', '2024-04-03 22:35:22'),
(38, 'Sustainable Fashion:', '<p>Sustainable fashion has gained significant traction in recent years as the fashion industry grapples with its environmental impact. This concept revolves around creating and producing clothing in an environmentally and socially responsible manner. It involves the use of eco-friendly materials, ethical labor practices, and a commitment to reducing waste.&nbsp;</p><p>Sustainable fashion aims to minimize the environmental footprint of the industry, addressing issues like water pollution, overconsumption, and the carbon footprint of clothing production. Notable initiatives include the adoption of organic fabrics, recycled materials, and innovative manufacturing processes.&nbsp;</p><p>Brands are increasingly incorporating sustainability into their business models, embracing circular economy practices such as recycling and upcycling to extend the lifespan of garments and reduce overall waste.</p>', '1704486881.jpg', 'Ohadoma Chukwuma', 'fashion', 'Information', 'N/A', '2024-01-05 19:34:41', '2024-04-03 22:34:32'),
(39, 'Virtual Fashion Shows:', '<p>In response to global events and the evolution of technology, the traditional fashion show model has undergone a significant transformation with the rise of virtual fashion shows. These digital presentations provide an alternative to physical runway shows, offering designers the opportunity to showcase their collections in immersive and innovative ways.&nbsp;</p><p>Virtual fashion shows often leverage advanced technologies such as 3D rendering, augmented reality, and virtual reality to create engaging and interactive experiences for audiences. This shift has implications for the fashion calendar, democratizing access to fashion events and challenging the conventional notions of exclusivity associated with in-person shows. The exploration of virtual fashion shows also raises questions about the future of the fashion industry\'s presentation formats and the role of technology in shaping these experiences.</p>', '1704487279.jpg', 'Ohadoma Chukwuma', 'fashion', 'Information', 'N/A', '2024-01-05 19:36:12', '2024-04-03 22:32:47'),
(40, 'Inclusivity and Diversity in Fashion:', '<p>The fashion industry has been undergoing a transformative shift towards greater inclusivity and diversity. This encompasses various aspects, including race, body type, gender, and age. Fashion brands are being called upon to showcase a more diverse range of models in their campaigns and runway shows, reflecting a broader spectrum of beauty and identity.&nbsp;</p><p>The push for inclusivity has led to a reevaluation of industry standards, challenging traditional notions of beauty and promoting a more realistic and representative portrayal of individuals. Inclusive sizing, gender-neutral fashion, and campaigns featuring models from various cultural backgrounds contribute to a more inclusive and socially responsible fashion landscape.</p>', '1704486974.jpg', 'Ohadoma Chukwuma', 'fashion', 'Information', 'N/A', '2024-01-05 19:36:14', '2024-04-03 22:31:22'),
(41, 'Fashion Tech and Wearable Technology:', '<p>The fusion of technology and fashion has given rise to the field of fashion tech. This involves the integration of electronic components, smart fabrics, and wearable devices into clothing and accessories. Wearable technology goes beyond fitness trackers; it includes garments with built-in sensors, LED lights, and even clothing that can monitor health metrics.&nbsp;</p><p>Smart fabrics, such as those embedded with conductive threads or temperature-regulating materials, are becoming more prevalent. Fashion tech also extends to augmented reality (AR) and virtual reality (VR) experiences, transforming the way consumers interact with fashion. From smartwatches to garments that can change color or pattern based on user preferences, fashion tech is reshaping the industry\'s landscape and consumer experiences.</p>', '1704487084.jpg', 'Ohadoma Chukwuma', 'fashion', 'Information', 'N/A', '2024-01-05 19:38:04', '2024-04-03 22:29:16'),
(42, 'Cultural Appropriation in Fashion:', '<p>The fashion industry has faced scrutiny over instances of cultural appropriation, where elements of a particular culture are taken and used outside of their original context without proper understanding or respect. This topic explores the nuances of cultural appropriation in fashion, discussing instances where designers have faced backlash for appropriating traditional garments, patterns, or symbols.&nbsp;</p><p>It also involves a broader conversation about the importance of cultural sensitivity, education, and collaboration between designers and communities. Fashion brands are increasingly being called upon to engage in thoughtful and respectful cross-cultural exchanges, acknowledging and celebrating the origins of the influences they incorporate into their designs.</p>', '1704487166.jpg', 'Ohadoma Chukwuma', 'fashion', 'Information', 'N/A', '2024-01-05 19:39:27', '2024-04-03 22:23:34'),
(43, 'Smartphones: iPhone 13 Pro Max (or the latest model):', '<p>The latest iPhone model, such as the iPhone 13 Pro Max, typically represents cutting-edge technology in the smartphone market. It might feature improvements in camera capabilities, processing power, display quality, and battery life.&nbsp;</p><p>Advanced features like 5G connectivity, enhanced computational photography, and augmented reality capabilities could be highlights. The smartphone landscape is highly competitive, with various manufacturers continually innovating to deliver the best user experience.</p>', '1704637803.jpg', 'Ohadoma Chukwuma', 'smart_gadgets', 'Information', 'N/A', '2024-01-07 11:22:53', '2024-04-03 22:41:37'),
(44, 'Laptops: Apple MacBook Pro with M1 Pro or M1 Max chip', '<p>Apple\'s MacBook Pro, powered by the M1 Pro or M1 Max chip, is an example of a top-tier laptop. These laptops are known for their powerful performance, high-resolution Retina displays, and the efficiency of Apple\'s custom silicon.&nbsp;</p><p>The inclusion of features like the Touch Bar (in earlier models), improved keyboard design, and extended battery life contributes to a premium user experience. Laptops from other manufacturers, featuring the latest processors and high-resolution displays, are also popular choices in this category.</p>', '1704638084.jpg', 'Ohadoma Chukwuma', 'smart_gadgets', 'Information', 'N/A', '2024-01-07 13:34:44', '2024-04-03 22:22:19'),
(45, 'Gaming Consoles: Sony PlayStation 5:', '<p>The Sony PlayStation 5 continues to be one of the most sought-after gaming consoles. Offering powerful hardware, a sleek design, and an extensive library of games, the PS5 showcases the latest in gaming technology.&nbsp;</p><p>Features such as ray-tracing, high frame rates, and a new DualSense controller for enhanced haptic feedback contribute to an immersive gaming experience. The demand for gaming consoles has remained high, with new titles pushing the boundaries of graphics and gameplay.</p>', '1704638226.jpg', 'Ohadoma Chukwuma', 'smart_gadgets', 'Information', 'N/A', '2024-01-07 13:37:06', '2024-04-03 22:21:06'),
(46, 'Smartwatches: Apple Watch Series 7:', '<p>The Apple Watch Series 7 exemplifies the latest advancements in smartwatch technology. Known for its health and fitness tracking capabilities, the Series 7 might feature a larger and more durable display, faster charging, and additional health monitoring functionalities.&nbsp;</p><p>Smartwatches from other brands, incorporating similar features and compatibility with various fitness apps, are also prevalent in the market. The wearable technology sector continues to evolve, offering consumers innovative ways to monitor and improve their health.</p>', '1704638306.jpg', 'Ohadoma Chukwuma', 'smart_gadgets', 'Information', 'N/A', '2024-01-07 13:38:26', '2024-04-03 22:20:21'),
(47, 'Smart Home Devices: Amazon Echo Show 10 (3rd Gen):', '<p>In the realm of smart home devices, the Amazon Echo Show 10 (3rd Gen) is an example of a top product. This smart display with a rotating screen is designed to follow users as they move, making video calls, watching videos, and controlling smart home devices more interactive.&nbsp;</p><p>The integration of virtual assistants like Alexa enhances the device\'s utility, allowing users to manage their smart home ecosystem effortlessly. The smart home market sees continuous growth with new devices offering enhanced connectivity, security, and automation features.</p>', '1704638380.jpg', 'Ohadoma Chukwuma', 'smart_gadgets', 'Information', 'N/A', '2024-01-07 13:39:41', '2024-04-03 22:19:51'),
(48, 'Mental Health Awareness and Support:', '<p>Mental health awareness has gained increased attention and importance in today\'s society. The stigma surrounding mental health issues is gradually diminishing as more people recognize the prevalence and impact of conditions such as anxiety, depression, and other mental health disorders.&nbsp;</p><p>Discussions around mental health have become more open and inclusive, encouraging individuals to seek help without fear of judgment. Advocacy efforts, campaigns, and educational programs aim to raise awareness, reduce stigma, and promote mental well-being.&nbsp;</p><p>It\'s crucial for society to continue supporting initiatives that prioritize mental health, including accessible mental health services, workplace well-being programs, and community resources.</p>', '1704638546.jpg', 'Ohadoma Chukwuma', 'socials', 'Information', 'N/A', '2024-01-07 13:42:26', '2024-04-03 22:18:59'),
(49, 'Social Media and its Impact on Society:', '<p>The influence of social media on society is a multifaceted topic that encompasses various aspects. On one hand, social media facilitates global connectivity, information sharing, and activism. On the other hand, concerns about the impact on mental health, the spread of misinformation, and issues related to privacy have surfaced.</p><p>Cyberbullying and the negative effects of constant connectivity are challenges that society grapples with. Striking a balance between the positive and negative aspects of social media requires ongoing discussions, ethical considerations, and potential regulatory measures to ensure a healthy digital environment.</p>', '1704638615.jpg', 'Ohadoma Chukwuma', 'socials', 'Information', 'N/A', '2024-01-07 13:43:35', '2024-04-03 22:18:13'),
(50, 'Racial Equity and Justice:', '<p>The pursuit of racial equity and justice remains a central social topic, especially in the wake of global movements advocating for equal rights and an end to systemic racism.</p><p>Conversations around racial equity involve addressing historical injustices, acknowledging privilege, and implementing policies that promote fairness and inclusivity. The importance of diverse representation in various sectors, from media and education to corporate boardrooms, is emphasized.&nbsp;</p><p>Ongoing efforts to dismantle discriminatory systems, foster dialogue, and promote understanding among diverse communities contribute to the broader goal of achieving racial equity and justice.</p>', '1704638683.jpg', 'Ohadoma Chukwuma', 'socials', 'Information', 'N/A', '2024-01-07 13:44:43', '2024-04-03 22:17:18'),
(51, 'Gender Equality and Women\'s Empowerment:', '<p>Despite progress in recent years, gender equality remains a crucial social issue. Discussions focus on closing gender gaps in various areas, including education, employment, and representation in leadership roles.&nbsp;</p><p>Advocacy for women\'s rights and empowerment has led to increased awareness of issues such as gender-based violence, workplace discrimination, and the gender pay gap. Initiatives promoting inclusivity, mentorship programs, and policies supporting work-life balance contribute to fostering a more equitable society.&nbsp;</p><p>Ongoing conversations and actions are necessary to challenge stereotypes, dismantle barriers, and create environments where individuals of all genders can thrive.</p>', '1704638754.jpg', 'Ohadoma Chukwuma', 'socials', 'Information', 'N/A', '2024-01-07 13:45:54', '2024-04-03 22:15:57'),
(52, 'Climate Change and Environmental Sustainability:', '<p>Climate change and environmental sustainability are pressing social topics that demand urgent attention. Discussions revolve around the need for collective action to mitigate the impacts of climate change and protect the environment.&nbsp;</p><p>The effects of climate change, including extreme weather events, rising sea levels, and loss of biodiversity, highlight the interconnectedness of environmental issues with social well-being.&nbsp;</p><p>Efforts to transition to renewable energy sources, reduce carbon emissions, and adopt sustainable practices are crucial for the long-term health of the planet. Public awareness, policy advocacy, and community-led initiatives play essential roles in addressing climate change and promoting environmental sustainability.</p>', '1704638846.jpg', 'Ohadoma Chukwuma', 'socials', 'Information', 'N/A', '2024-01-07 13:47:26', '2024-04-03 22:14:57'),
(53, 'Renewable Energy; The future of Science.', '<h2><strong>Solar Energy</strong></h2><h4>Overview of Solar Energy:&nbsp;</h4><p>Solar energy is a form of renewable energy derived from the sun\'s radiation. It is harnessed using solar panels, which convert sunlight into electricity through the photovoltaic effect. Solar energy is abundant, sustainable, and has the potential to meet a significant portion of global energy demand.</p><h4>Photovoltaic Technology:&nbsp;</h4><p>Photovoltaic (PV) cells are the building blocks of solar panels. These cells are typically made of silicon and generate electric current when exposed to sunlight. Advancements in PV technology have led to increased efficiency and reduced costs, making solar energy more accessible for residential, commercial, and industrial applications.&nbsp;</p><h4>Residential Solar Systems:&nbsp;</h4><p>In the residential sector, solar panels are commonly installed on rooftops to generate electricity for the home. Homeowners can benefit from reduced electricity bills, government incentives, and the ability to sell excess electricity back to the grid through net metering programs.&nbsp;</p><h4>Commercial and Industrial Applications:&nbsp;</h4><p>Solar energy is extensively used in commercial and industrial settings. Large-scale solar farms generate electricity for the grid, providing clean energy to communities. Industries increasingly integrate solar power into their operations to reduce carbon footprints and operational costs.&nbsp;</p><h4>Off-Grid Solutions:&nbsp;</h4><p>In regions with limited access to traditional power sources, off-grid solar solutions, such as solar lanterns and home systems, play a crucial role in providing electricity for lighting, communication, and powering essential appliances.&nbsp;</p><h4>Environmental Impact:&nbsp;</h4><p>Solar energy is considered environmentally friendly as it produces electricity without emitting greenhouse gases or other pollutants. The life cycle analysis of solar panels continually improves, with efforts to enhance recyclability and reduce the environmental footprint of manufacturing.&nbsp;</p><h4>Challenges and Innovations:&nbsp;</h4><p>Challenges in solar energy include intermittency (dependent on sunlight), energy storage, and initial installation costs. Ongoing innovations address these challenges, with the development of more efficient panels, improved energy storage technologies, and advancements in grid integration.&nbsp;</p><h2>Inverters:&nbsp;</h2><h4>Role of Inverters in Solar Energy Systems:&nbsp;</h4><p>Inverters are essential components in solar energy systems. They convert the direct current (DC) produced by solar panels into alternating current (AC), which is used in most household and industrial electrical systems. Inverters ensure compatibility with existing power infrastructure and enable the seamless integration of solar-generated electricity.&nbsp;</p><h4>Types of Inverters:&nbsp;</h4><p>There are various types of inverters, including string inverters, microinverters, and power optimizers. String inverters are commonly used in residential and small commercial installations, while microinverters and power optimizers are often employed in systems with complex roof layouts.&nbsp;</p><h4>Inverter Efficiency and Monitoring:&nbsp;</h4><p>Inverter efficiency is crucial for optimizing the overall performance of a solar energy system. Modern inverters incorporate advanced monitoring systems that allow users to track energy production, identify issues, and maximize the efficiency of the entire solar array.&nbsp;</p><h4>Grid-Tied and Off-Grid Systems:&nbsp;</h4><p>Inverters play a different role in grid-tied and off-grid solar systems. Grid-tied inverters synchronize with the utility grid, allowing excess electricity to be fed back into the grid. Off-grid inverters work in conjunction with battery storage systems to provide electricity when sunlight is unavailable.&nbsp;</p><h4>Technological Advancements:&nbsp;</h4><p>Technological advancements in inverter design include increased efficiency, enhanced reliability, and the integration of smart features. Some inverters now incorporate power electronics to optimize energy production, especially in environments with partial shading or varying sunlight conditions.&nbsp;</p><h4>Integration with Energy Storage:&nbsp;</h4><p>Inverters are integral to the integration of energy storage systems, such as solar batteries. This allows for the storage of excess energy during periods of sunlight for later use, addressing the issue of solar intermittency.&nbsp;</p><h4>Future Trends and Innovations:&nbsp;</h4><p>Future trends in inverter technology include the development of hybrid inverters that can manage multiple energy sources, such as solar and wind. Additionally, advancements in digitalization and connectivity enable smarter and more adaptive inverter systems.&nbsp;</p><p>In conclusion, solar energy and inverters play crucial roles in the transition towards a more sustainable and resilient energy landscape. Continued research, innovation, and widespread adoption of these technologies are essential for addressing global energy challenges and mitigating the impact of climate change.</p>', '1704639282.jpg', 'Ohadoma Chukwuma', 'tech_news', 'Information', 'N/A', '2024-01-07 13:52:08', '2024-04-03 22:11:45'),
(68, 'BMW XL2', 'Try out this baby. Prices are very considerable. It\'s worth your time and money.', '1711186609.jpg', 'Ohadoma Chukwuma', 'vehicles', 'Market', '$3000', '2024-03-23 08:36:49', '2024-03-23 08:36:49'),
(69, 'Deegee Inverters', 'We have one of the best Inverters. This is our latest stock from Germany.', '1711198975.jpg', 'Ohadoma Chukwuma', 'solar_inverter', 'Market', '$500', '2024-03-23 12:02:55', '2024-03-23 12:02:55'),
(84, 'We Give You The Best', '<p>From smart reliable energy to office and home automation to cool security gadgets, Voltafrik aims to connect you with the ever-evolving world of technology.&nbsp;</p><p>In addition, making informed decisions about tech products can be challenging in today\'s saturated market.&nbsp;</p><p>At Voltafrik, we provide unbiased reviews and expert recommendations to help you navigate through the sea of options.</p>', '1712105779.jpg', 'Ohadoma Chukwuma', 'socials', 'wall_image', 'N/A', '2024-04-02 23:56:19', '2024-04-03 21:53:45'),
(85, 'Home Video Link Post', 'https://www.youtube.com/watch?v=AFup7oO-fSY', '', 'Ohadoma Chukwuma', 'socials', 'wall_video', 'N/A', '2024-04-03 00:06:53', '2024-04-03 18:15:26'),
(86, 'Empowering E-Commerce:', '<p>Voltafrik specializes in crafting visually appealing and highly functional online stores tailored to your brand.&nbsp;</p><p>From intuitive navigation to secure payment gateways, we prioritize user satisfaction to drive engagement and maximize conversions.&nbsp;</p><p>Whether you\'re launching a new venture or revamping your existing online store, Voltafrik turns your digital vision into a thriving reality.</p>', '1712170643.jpg', 'Ohadoma Chukwuma', 'socials', 'wall_image', 'N/A', '2024-04-03 17:57:24', '2024-04-03 21:58:00'),
(87, 'Unleashing the Potential of Renewable Energy:', '<p>Join Voltafrik in our mission to build a sustainable future powered by renewable energy.&nbsp;</p><p>Our innovative solutions, including solar and wind power systems, reduce carbon emissions and minimize environmental impact.&nbsp;</p><p>Let\'s work together to harness the power of renewable resources and create a greener planet.</p>', '1712171080.jpg', 'Ohadoma Chukwuma', 'socials', 'wall_image', 'N/A', '2024-04-03 18:04:40', '2024-04-03 21:56:52'),
(88, 'Advertise here', 'https://www.nairaland.com/', '1712174931.png', 'Ohadoma Chukwuma', 'socials', 'advert', 'N/A', '2024-04-03 19:08:51', '2024-04-03 20:25:29'),
(89, 'Advertise here', 'https://www.nairaland.com/', '1712174964.jpg', 'Ohadoma Chukwuma', 'socials', 'advert', 'N/A', '2024-04-03 19:09:24', '2024-04-03 20:24:55'),
(90, 'We are the Future of Tech', '<p>We are a dynamic tech company that delves into the exciting world of technology. Our platform is designed to be a one-stop destination for tech enthusiasts, as well as anyone curious about the latest innovation shaping our world and business.&nbsp;</p><p>We strive to provide innovative technologies, consistent with the fast evolving global market.&nbsp;</p><p>We are a multi-faceted service delivery company, rendering services such as smart energy installations, smart house configurations, dynamic websites for ease of doing business as well as business tools for better productivity such as data analysis expertise.</p>', '1712180663.png', 'Ohadoma Chukwuma', 'socials', 'wall_main', 'N/A', '2024-04-03 20:44:23', '2024-04-03 22:44:23'),
(91, 'Advertise here', 'ggggggggggggggggggggg', '1712181213.png', 'Ohadoma Chukwuma', 'socials', 'advert', 'N/A', '2024-04-03 20:53:33', '2024-04-03 20:55:23'),
(92, 'Advertise here', 'ggggggggggggggggggggg', '1712181242.jpg', 'Ohadoma Chukwuma', 'socials', 'advert', 'N/A', '2024-04-03 20:54:02', '2024-04-03 20:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_17_083415_create_blog_posts_table', 1),
(6, '2023_06_17_092752_add_category_to_blog_posts_table', 1),
(7, '2023_06_17_113904_add_user_id_to_blog_posts_table', 1),
(8, '2023_06_17_121114_add_user_id_to_blog_posts_table', 1),
(9, '2023_06_22_125841_add_image_to_blog_posts_table', 1),
(10, '2023_07_02_213337_add_type_to_blog_posts_table', 2),
(11, '2024_01_07_123118_add_user_role_to_user_table', 2),
(12, '2024_03_16_200250_add_price_to_blog_posts_table', 3),
(13, '2024_03_16_200841_add_tel_to_users_table', 4),
(14, '2024_03_24_023508_rename_name_column_in_users_table', 5),
(15, '2024_03_24_024755_rename_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
