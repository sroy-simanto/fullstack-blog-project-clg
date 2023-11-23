-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2023 at 05:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinygone_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `status`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$stymLvz/AzLDKUgkgQim9OZoYwkEiyJf4TsDDOorbjYgWrx84emLa', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(13, 'Marketing', 'marketing'),
(14, 'News', 'news'),
(15, 'Technology', 'technology'),
(16, 'Politics', 'politics'),
(17, 'Business', 'business'),
(18, 'Sports', 'sports');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint NOT NULL,
  `category_id` bigint NOT NULL,
  `admin_id` bigint NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `admin_id`, `title`, `slug`, `description`, `image`, `status`, `created_at`) VALUES
(34, 16, 1, 'Hamas says agreed four-day truce with Israel', 'hamas-says-agreed-four-day-truce-with-israel', '<p>Hamas and Israel have agreed to a four-day truce in Gaza during which Hamas will release 50 women and children held as hostages in exchange for the release of 150 Palestinian women and children held in Israeli jails, the Palestinian group said in a statement on Wednesday.</p><p>During the four-day truce, air traffic will completely stop in southern Gaza and will halt for six hours a day, from 10:00 a.m. to 04:00 p.m. (local time), in northern Gaza, the statement said.</p><p>Hamas is believed to be holding more than 200 hostages, taken when its fighters surged into Israel on Oct. 7, killing 1,200 people, according to Israeli tallies.</p><p><br></p>', 'uploads/post/655d79e18f9e31700624865.jpg', 'active', '2023-11-21 21:47:45'),
(36, 16, 1, 'The secret negotiations that led to the Gaza hostages deal', 'the-secret-negotiations-that-led-to-the-gaza-hostages-deal', '<p>Shortly after Hamas militants took hostages during their deadly assault on southern Israel on Oct. 7, the government of Qatar contacted the White House with a request: Form a small team of advisers to help work to get the captives freed.</p><p>That work, begun in the days after the hostages were taken, finally bore fruit with the announcement of a prisoner swap deal mediated by Qatar and Egypt and agreed by Israel, Hamas and the United States.</p><p>US President Joe Biden, who held a number of urgent conversations with emir of Qatar and Israeli Prime Minister Benjamin Netanyahu in the weeks leading up to the deal.</p><p><br></p>', 'uploads/post/655d7c1b3b4f91700625435.jpg', 'active', '2023-11-21 21:57:15'),
(37, 18, 1, 'Messi, Ronaldo to renew rivalry in February next year', 'messi,-ronaldo-to-renew-rivalry-in-february-next-year', '<p>Eight-time Ballon d\'Or winner Messi, who joined the US squad in July and sparked a championship run in the Leagues Cup against US and Mexican clubs, is expected to meet Ronaldo, a five-time Ballon d\'Or winner.</p><p>Google News LinkFor all latest news, follow The Daily Star\'s Google News channel.</p><p>Messi, 36, led Argentina to last year\'s World Cup crown and has long been a rival of Portugal captain Ronaldo, 38.</p><p>Inter Miami was named the guest international side and will join Saudi Pro League sides Al-Hilal and Al Nassr in next February\'s Riyadh Season Cup, but no exact dates for matches at Kingdom Arena in the round-robin competition were announced.</p>', 'uploads/post/655d7caa44b401700625578.jpg', 'active', '2023-11-21 21:59:38'),
(38, 15, 1, 'OpenAI&#039;s 3rd CEO in 4 days: Who is Emmett Shear', 'openai&#039;s-3rd-ceo-in-4-days-who-is-emmett-shear', '<p>OpenAI, the parent company of ChatGPT and DALL-E, has appointed Emmett Shear as its interim CEO, marking the third leadership change in just four days. The decision comes after the sudden removal of former CEO Sam Altman, sending shockwaves through the tech industry.</p><p>Hailing from Seattle, Emmett Shear pursued a bachelor\'s degree in computer science at Yale University. He is a seasoned tech executive who served as the CEO of Twitch, a live video streaming platform owned by Amazon. His departure from Twitch occurred in March of this year, capping off a 16-year tenure at the helm of the platform.&nbsp;</p>', 'uploads/post/655d7d27f40941700625703.jpg', 'active', '2023-11-21 22:01:43'),
(39, 15, 1, 'The enormous potential of AI cannot be dismissed', 'the-enormous-potential-of-ai-cannot-be-dismissed', '<p>In an op-ed recently in the New York Times, the Nobel-Prize winning economist Paul Krugman wrote, \"Artificial intelligence (AI) is already having a significant impact on the economy, and its influence is expected to grow significantly in the coming years… Overall, the effects of AI on the economy will depend on a variety of factors, including the rate of technological advancement, government policies and the ability of workers to adapt to new technologies.\"</p><p>A very reasonable and sound opinion, coming from Krugman, who is very well-regarded in the profession as well as in the American political establishment. Unfortunately, he then immediately goes on to disown the opening paragraph and offers a disclaimer: \"What I did was ask ChatGPT to describe the economic effects of artificial intelligence; that\'s just an excerpt.\"</p>', 'uploads/post/655d7d90b8dce1700625808.jpg', 'active', '2023-11-21 22:03:28'),
(40, 16, 1, 'How political instability affects students', 'how-political-instability-affects-students', '<p>As the election season in Bangladesh begins, the growing political instability casts a gloomy shadow over the lives of students across the country. The continual disruptions to our daily routines, particularly the transportation issues, are intolerable, jeopardising not just our education but also our safety.&nbsp;</p><p><br></p><p>During this time of year, students, whether they are in school or university, prepare for final exams and midterms. However, the exam season has aligned with the election this year. This has given a glimpse into how things will be until the election ends, as political unrest continues to persist and is expected to worsen in the coming days. The unrest has spread far beyond the political arena, penetrating the fundamental fabric of society. Many students\' academic goals are impacted, as are their psychological well-being.</p>', 'uploads/post/655d7e186ec0d1700625944.jpg', 'active', '2023-11-21 22:05:44'),
(41, 15, 1, 'Breaking Down ', 'breaking-down', '<p>his guide explains everything that you need to know about RCS, including how it works, how you\'ll use it on Apple devices, why Apple decided to adopt it now, and the benefits that you can expect to see when support is added.</p><p><br></p><p>RCS Explained</p><p><br></p><p>Rich Communication Services, or RCS, is a communication protocol developed by the GSM Association and championed by Google. As a communication protocol, RCS is used by smartphone manufacturers and carriers to deliver text-based messages, images, and videos between devices. It\'s basically what will power the text messages that you send to people with your iPhone and other Apple devices.</p><p><br></p><p>RCS is a replacement for SMS (Short Messaging Service) and MMS (Multimedia Messaging Service), both of which are used for data sharing over cellular networks. RCS combines the features of SMS and MMS, and adds additional functionality. It will be what allows you to send texts to people who don\'t have iPhones for iMessage.</p><p><br></p><p>RCS Features</p><p><br></p><p>There are a number of benefits to RCS compared to the prior MMS and SMS features. Much of the improvements will be seen in iPhone to Android chats because for conversations between Apple device owners, iMessage will continue to be the default.</p><p>Support for higher resolution photos and videos.</p><p>Support for larger file sizes and file sharing.</p><p>Audio messages.</p><p>Cross-platform emoji reactions.</p><p>Real-time typing indicators.</p><p>Read receipts.</p><p>Ability to send messages over cellular or Wi-Fi (SMS is cellular only). There is no cost to send an RCS message over Wi-Fi.</p><p>Improved group chats.</p><p>Better security. Google\'s version of RCS has end-to-end encryption, which Apple does not intend to use. Apple will instead work with the GSMA to develop a more secure form of encryption that is baked natively into RCS.</p><p>RCS vs SMS/MMS</p><p><br></p><p>SMS or Short Messaging Service is supported by almost all mobile phones, and it is designed to allow you to send text messages from device to device. It is accompanied by the Mobile Messaging Service extension that supports photos, videos, and longer text messages. Both of these standards have been around for more than two decades and have fallen behind more modern chat apps in terms of features.</p><p><br></p><p>RCS is essentially a modernized version of SMS/MMS that carriers and smart phone manufacturers started adopting right around a decade ago, but it has taken time for it to be supported and not all companies have added support (such as Apple), so the more universal (and more limited) SMS/MMS standards have stuck around too.</p><p><br></p><p>Perhaps one of the biggest changes is the way that SMS/MMS and RCS work. SMS and MMS are carrier supported and require a cellular connection to function. RCS is supported by carriers, but RCS messages can be sent over a cellular or Wi-Fi connection, similar to iMessages, so there\'s no specific cellular connection requirement.</p><p><br></p><p>RCS is in fact much more like WhatsApp, iMessage, Messenger, and similar chat apps, but baked into a smartphone\'s default text messaging app. It supports features that SMS/MMS do not, like typing indicators, high-resolution images, file transfers, and video calls.</p><p><br></p><p>RCS and iMessage</p><p><br></p><p>RCS works alongside iMessage, and it does not replace iMessage. For iPhone to iPhone conversations and texts on any Apple device to another Apple device, iMessage will be the default.</p><p><br></p><p>After RCS support is implemented, if you turn off iMessage on your iPhone, it will likely default to RCS on supported devices as that will be the text messaging standard for non-iMessage communications.</p><p><br></p><p>iMessage will continue to function exactly as it does now with no change for communications between Apple device users.</p><p><br></p><p>What RCS Means for iPhone Users</p><p><br></p><p>If you have friends or family members that have an Android device, you\'ll see an improvement in some of the frustrations that come with cross-platform messaging.</p><p><br></p><p>Group texts between Android and iPhone users will be less buggy, and there won\'t be the same limitations on photo and video size that can cause media not to send. The tapback reactions that you use on an iPhone will have an emoji reaction equivalent on Android, so tapbacks won\'t be quite as confusing to your Android using friends.</p><p><br></p><p>Read receipts and typing indicators will be available for iPhone to Android communications and won\'t just be limited to iPhone to iPhone iMessages when RCS rolls out.</p><p><br></p><p>In general, iPhone owners and those with other Apple devices don\'t need to think about RCS or worry about it. It\'s a change that\'s going to happen in the background with no user interaction required. Communication is not changing between iPhones, and between iPhone and Android users, messaging will be the same, but improved in terms of reliability.</p><p><br></p><p>RCS and Android</p><p><br></p><p>Text conversations with Android users are the primary way iPhone users will experience RCS when it comes out. RCS will only be available when all participants in the conversation have a device and a carrier that support it, but that should encompass most Android users in the United States.</p><p><br></p><p>Android devices have had RCS for some time as Google and Samsung have supported it for several years and were pushing Apple to adopt it.</p><p><br></p><p>Right now, sharing photos and videos with Android users can be tricky for an iPhone user, and sometimes photos and videos are too large or won\'t deliver. There are also often issues with group conversations between Android and iPhone users, both in terms of supported features and stability.</p><p><br></p><p>Talking to an Android user should be less of a hassle than it is now when RCS rolls out because features like emoji reactions will be supported, there will be typing indicators, and files and images should not fail to send.</p><p><br></p><p>Green Bubbles vs. Blue Bubbles</p><p><br></p><p>While it will be less frustrating to communicate with \"green bubble\" people on an Apple device, chat bubble colors are not changing.</p><p><br></p><p>iMessage conversations will continue to be denoted with blue chat bubbles, and RCS messages will continue to be green, the same as SMS/MMS messages are now. Note that SMS and MMS aren\'t going away. They\'ll continue to be available on networks that don\'t support RCS and in situations where RCS is unavailable.</p><div><br></div>', 'uploads/post/655d7e9865c7f1700626072.jpg', 'active', '2023-11-21 22:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` bigint NOT NULL,
  `tag_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(34, 85),
(34, 86),
(36, 85),
(36, 86),
(37, 87),
(38, 91),
(38, 94),
(39, 94),
(40, 89),
(41, 92),
(41, 93);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `slug`) VALUES
(85, 'World News', 'world-news'),
(86, 'Gaza', 'gaza'),
(87, 'Football', 'football'),
(88, 'Cricket', 'cricket'),
(89, 'Bangladesh', 'bangladesh'),
(90, 'Climate', 'climate'),
(91, 'Microsoft', 'microsoft'),
(92, 'Google', 'google'),
(93, 'Apple', 'apple'),
(94, 'AI', 'ai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryIndex` (`category_id`),
  ADD KEY `adminIndex` (`admin_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD KEY `postIdIndex` (`post_id`),
  ADD KEY `tagIdIndex` (`tag_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
