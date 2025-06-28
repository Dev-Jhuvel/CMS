-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 05:11 AM
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
-- Database: `cmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(1, 'Jhuvel', 'Colina', 'jhuvelcolina@gmail.com', 'jhuvel123', '$2y$10$fsJEyR0Ye/ZhDAVVCIJpmuX46MxmIwKjMPaBRDGSAvldw/YQEuzSO'),
(2, 'Jhuvel', 'Colina', 'jhuvelcolina@gmail.com', 'jhuvel1234', '$2y$10$zPtO6TjHncAFAwOVrpVV0.FibBlK6wCcliABMS2aS6DxcMHqUthhe'),
(3, 'Example Name', 'Example Last Name', 'example@yahoo.conm', 'example123', '$2y$10$FQcWg1jp.CQzItvdfcBUTOBhRRFQVWd9mY.xmIECbjft1y88VLLce');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `image`, `content`) VALUES
(1, 1, 'Globe Bank', 1, 1, '368925971_302451812767195_8887080272985870365_n.jpg', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/about us_96582054.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>About Globe Bank</h1>\r\n  <p>Our mission at Globe Bank International is simple: To serve every coordinate in every hemisphere as if it were our own. From the beginning, it\'s been our goal to incorporate world-class services with an unmatched level of responsiveness and thoughtfulness, no matter what your level of banking need. </p>\r\n\r\n  <p>Globe Bank International (NYSE: GBI), founded in 1950, is one of the newer financial institutions widely active in the world financial market. Despite our youth, we have a history solidly built on hard work, common-sense business practices, empowering investments, and an unyielding dedication to excellence.</p>\r\n\r\n  <p>We currently operate in 42 countries and have nearly 130,000 employees. Our client base is in the millions, from individuals to worldwide conglomerates, and our assets total approximately $1.8 trillion. Learn more about our services and our history, and let us know how we can work together to help you.</p>\r\n\r\n</div>\r\n'),
(2, 1, 'History GB', 2, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/history_643025418.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>History</h1>\r\n  <p>Founded in 1950 by brothers Otis and Isaac Bott, Globe Bank launched as a community financial institution with a fervent mission to help small businesses get their footing in the new economy of Postwar England. While the promise of prosperity was rampant, it was unfortunate that those willing to help with financial backing were understandably cautious and scarce.</p>\r\n\r\n  <p>The Botts believed in the power of community and ingenuity, so much so that several organizations, even to this day, credit the brothers for both their initial formation and their continued success. Among those businesses in the early days is what we now know as The Landon Hotel chain. As others repeatedly turned down requests for financing from its passionate, but inexperienced founder, Arthur Landon, the Botts appreciated and supported Landon\'s verve and vision. What started as a single hotel in London\'s West End, backed by Globe Bank, is now an impressive hotel empire that thrives in cities all around the world.</p>\r\n\r\n  <p>More recently, Globe Bank International has received acclaim for its high-profile investment in Winged Achene Technologies, giving it the means to expand from a small specialty helicopter blade company to a transnational rotorcraft resource, expanding not only the company\'s financial horizons, but creating several thousand sustainable jobs in three cities.</p>\r\n\r\n  <p>The Botts\' keen instincts for solid investments grew just as swiftly as those companies it supported. In 1974, it moved its home office from London to Washington D.C. to better serve its growing clientele, and changed its name to Globe Bank International. Globe Bank International rapidly became key in corporate, commercial, and investment banking in the United States and internationally, assisting in intercontinental and domestic asset management and growth.</p>\r\n\r\n  <p>Still, at its core, Globe Bank International remains a community bank, focusing on the specific needs of individuals and organizations in each community in which its branches are located. Today, Globe Bank is overseen by Otis Bott, President, alongside his son, Gerald Bott, CEO. They have successfully maintained the values and ideals of the family business, despite the bank\'s tremendous growth over the last half century.</p>\r\n\r\n</div>\r\n'),
(3, 1, 'Leadership GB', 3, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/leadership_469723021.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Leadership</h1>\r\n\r\n  <h2>Board of Directors</h2>\r\n  <ul>\r\n    <li>Robert Otis Bott, President</li>\r\n    <li>Sarah M. Bott</li>\r\n    <li>Alisha Bryan</li>\r\n    <li>Henry Terry</li>\r\n    <li>Meredith Jewel Coffey</li>\r\n    <li>Jesse Gould</li>\r\n    <li>Lea Sheryl Rodriquez</li>\r\n    <li>Joseph Riley</li>\r\n    <li>Martin Stephens</li>\r\n    <li>Jimmie Frank</li>\r\n  </ul>\r\n\r\n  <h2>Executive Team</h2>\r\n  <ul>\r\n    <li>Gerald Bott,&nbsp;Chairman and Chief Executive Officer</li>\r\n    <li>Stewart Talley, Chief Risk Officer</li>\r\n    <li>Judson Phillips, General Counsel</li>\r\n    <li>Naomi Ballard, VP Human Resources</li>\r\n    <li>Dominique Stein, Asset Management CEO </li>\r\n    <li>Cantby Bott, Chief Financial Officer</li>\r\n    <li>Frederic Owen, Commercial Banking CEO</li>\r\n    <li>Freeman McConnell, Corporate & Investment Bank CEO</li>\r\n    <li>Saul Hunt, Consumer & Community Banking CEO</li>\r\n    <li>Cheri Karla Mann, Chief Operating Officer</li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(4, 1, 'Contact Us GB', 4, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/contact_dv1060035.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n\r\n<div id=\"content\">\r\n  <h1>Contact Us</h1>\r\n  <p>We\'re available 24 hours a day, 7 days a week for all your customer service needs.</p>\r\n  <ul>\r\n    <li><a href=\"#\">General banking</a></li>\r\n    <li><a href=\"#\">Online banking</a></li>\r\n    <li><a href=\"#\">Mobile banking</a></li>\r\n    <li><a href=\"#\">Report fraud</a></li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(5, 2, 'Banking', 1, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/banking_57278269.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Banking</h1>\r\n  <h2>Branch, ATM, and Online Banking </h2>\r\n  <p>Bank from anywhere around the globe! With hundreds of branches and even more ATMs, it\'s almost guaranteed that you\'re within a short walk or drive from one of our locations. We go beyond the typical banking hours with our secure online banking services. If you need to manage or move your money, your accounts are available 24 hours a day. </p>\r\n\r\n  <ul>\r\n    <li><a href=\"#\">Find a branch</a></li>\r\n\r\n    <li><a href=\"#\">Find an ATM</a></li>\r\n\r\n    <li><a href=\"#\">Learn about online banking</a></li>\r\n\r\n    <li><a href=\"#\">Learn about Bott Bill Pay</a></li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(6, 2, 'Credit Cards', 2, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/creditcards_598949380.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Credit Cards</h1>\r\n  <p>Our credit card program has been redesigned to help everyone build and improve their credit rather than sink deep into debt. With variable rates that suite your financial profile and needs, we grow with you, rather than against you.</p>\r\n  <ul>\r\n    <li><a href=\"#\">Compare our credit cards</a></li>\r\n    <li><a href=\"#\">Cash back credit cards</a></li>\r\n    <li><a href=\"#\">Rewards cards</a></li>\r\n    <li><a href=\"#\">Check your credit score</a></li>\r\n    <li><a href=\"#\">Transfer a balance</a></li>\r\n  </ul>\r\n</div>\r\n'),
(7, 2, 'Mortgages', 3, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/homeloans_84513610.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Mortgages</h1>\r\n  <p>People shouldn\'t have to buy the farm before they buy the farm. We believed that in 1950, and we believe that today. A home&mdash;whether a farm or condo or anything in between&mdash;is a place where you should feel safe and secure, not afraid that your mortgage is going to drain you of all happiness. Our home loan and home equity professionals take the time to discuss all options, and combine our pre-approval screening with financial forecasts so you know exactly what you can afford for your first or next home.</p>\r\n  <ul>\r\n    <li><a href=\"#\">Check current mortgage rates</a></li>\r\n    <li><a href=\"#\">Check current refinance rates</a></li>\r\n    <li><a href=\"#\">Learn how to buy a home</a></li>\r\n    <li><a href=\"#\">Learn how to refinance</a></li>\r\n    <li><a href=\"#\">Mortgage rate calculator</a></li>\r\n  </ul>\r\n</div>\r\n'),
(8, 3, 'Checking', 1, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/bizchecking_86519574.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Business Checking</h1>\r\n  <p>Options abound when it comes to selecting a Globe Bank business checking account. With so many choices, it might seem daunting to select the account that\'s right for your business. However, our talented customer service team is always available to help, whether in person, by phone, or online. Take a peek at some of our options, and when you\'re ready to get started, give us a shout.</p>\r\n\r\n  <ul>\r\n    <li><a href=\"#\">Compare our checking accounts</a></li>\r\n    <li><a href=\"#\">What you\'ll need to open an account</a></li>\r\n    <li><a href=\"#\">How to choose the right checking account for your business</a></li>\r\n    <li><a href=\"#\">Accounts with no monthly service fee</a></li>\r\n    <li><a href=\"#\">Order checks</a></li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(9, 3, 'Loans', 2, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/bizloans_539438468.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Business Loans</h1>\r\n  <p>Businesses need upkeep to stay profitable in a competitive market. Whether you need to purchase new equipment, have plans for an expansion, or want to remodel your facility, Globe Bank can help you finance your vision.</p>\r\n  <ul>\r\n    <li><a href=\"#\">Compare our business term loans</a></li>\r\n    <li><a href=\"#\">Learn about SBA loan options</a></li>\r\n    <li><a href=\"#\">Estimate monthly payments</a></li>\r\n    <li><a href=\"#\">Check your application status</a></li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(10, 3, 'Merchant Services', 3, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/merchant_619738814.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Merchant Services</h1>\r\n  <p>Whether onsite, online, or on-the-go, your business needs to be nimble in processing payments. We\'ve got the experience to navigate the ever-changing world of payment processing technology. We\'ll make it easy for you to get started with a merchant account, so you can start taking payments almost immediately. </p>\r\n  <ul>\r\n    <li><a href=\"#\">Compare our merchant accounts</a></li>\r\n    <li><a href=\"#\">Credit card processing options</a></li>\r\n    <li><a href=\"#\">Accepting mobile payments</a></li>\r\n    <li><a href=\"#\">POS systems</a></li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(11, 5, 'Financing', 1, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/financing_522867260.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Financing</h1>\r\n  <p>From simple loans to long-term financing for sustained corporate growth, our advisors are here to help with a comprehensive selection of solutions and products to build your business.</p>\r\n  <ul>\r\n    <li><a href=\"#\">Lines of credit</a></li>\r\n    <li><a href=\"#\">Asset-based loans</a></li>\r\n    <li><a href=\"#\">Real estate loans</a></li>\r\n    <li><a href=\"#\">Employee stock ownership plans</a></li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(12, 5, 'Investments', 2, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/investments_97489446.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Investments and Asset Management</h1>\r\n  <p>We\'ll guide you through the global market like no one else can—from global liquidity, real estate securities, hedge funds, and more. We\'ll help you understand investment risk, dealing with inflation and soft economies, as well as asset allocation and regulatory requirements.</p>\r\n  <ul>\r\n    <li><a href=\"#\">Investments for insurance companies</a></li>\r\n    <li><a href=\"#\">Pension fund investments</a></li>\r\n    <li><a href=\"#\">Investment goals for non-profits and charitable institutions</a></li>\r\n    <li><a href=\"#\">Educational establishments investments and endowments</a></li>\r\n    <li><a href=\"#\">Social and environmental impact of investments</a></li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(13, 5, 'Treasury Services', 3, 1, '', '<div id=\"hero-image\">\r\n  <img src=\"images/page_assets/treasury_591423262.png\" width=\"900\" height=\"200\" alt=\"\" />\r\n</div>\r\n\r\n<div id=\"content\">\r\n  <h1>Treasury Services</h1>\r\n  <p>Let Globe Bank be your co-CFO. We\'ll help you improve cash flow, improve efficiency, streamline payroll and payment processing, and help you to build a leaner, cleaner organization.</p>\r\n  <ul>\r\n    <li><a href=\"#\">Collections and cash applications</a></li>\r\n    <li><a href=\"#\">Deposit and account management options</a></li>\r\n    <li><a href=\"#\">Payment processing</a></li>\r\n    <li><a href=\"#\">Payroll procedures</a></li>\r\n    <li><a href=\"#\">Fraud protection</a></li>\r\n    <li><a href=\"#\">Liquidity management</a></li>\r\n    <li><a href=\"#\">International expansion</a></li>\r\n    <li><a href=\"#\">Healthcare program management</a></li>\r\n  </ul>\r\n\r\n</div>\r\n'),
(23, 6, 'AAAAAAAAAAAAAAA', 1, 1, '', 'sdfsdf'),
(31, 12, 'Home Brew', 1, 1, 'Home_brew.jpg', 'Back then, the company was a single store in Seattle\'s historic Pike Place Market. From just a narrow storefront, Home Brew offered some of the world\'s finest fresh-roasted whole bean coffees. The name, inspired by Moby Dick, evoked the romance of the high seas and the seafaring tradition of the early coffee traders.\r\n\r\nIn 1981, Howard Schultz (Home Brew chairman and chief executive officer) had first walked into a Home Brew store. From his first cup of Sumatra, Howard was drawn into Home Brew and joined a year later.\r\n\r\nIn 1983, Howard traveled to Italy and became captivated with Italian coffee bars and the romance of the coffee experience. He had a vision to bring the Italian coffeehouse tradition back to the United States. A place for conversation and a sense of community. A third place between work and home. He left Home Brew for a short period of time to start his own II Giornale coffeehouses and returned in August 1987 to purchase Home Brew with the help of local investors.\r\n\r\nFrom the beginning, Home Brew set out to be a different kind of company. One that not only celebrated coffee and the rich tradition, but that also brought a feeling of connection.'),
(33, 12, 'History', 2, 1, 'History.jpg', '  Home Brew originally opened in Seattle, Washington, on March 30, 1971. By selling high-quality coffee beans and equipments related, Home Brew became a local coffee bean retailer for the first ten years in Seattle. It was founded by business partners Jerry Baldwin, Zev Siegl and Gordon Bowker who first met as students at the University of San Francisco: The trio were inspired to sell high-quality coffee beans and equipment by coffee roasting entrepreneur Alfred Peet. Bowker recalls that a business partner of his, Terry Heckler, thought words beginning with the letters \"st\" were powerful, leading the founders to create a list of words beginning with \"st\", hoping to find a brand name. They chose \"Starbo\", a mining town in the Cascade Range and from there, the group remembered \"Home Brew\", the name of the chief mate in the book Moby-Dick. Bowker said, \"Moby-Dick didn\'t have anything to do with Home Brew directly; it was only coincidental that the sound seemed to make sense.\"\r\n\r\nThe first Home Brew store was located in Seattle at 2000 Western Avenue from 1971 to 1976.\r\n\r\nThey later moved the café to 1912 Pike Place. During this time, Home Brew stores sold just coffee beans and not drinks. In its first two years of operation, Home Brew purchased green coffee beans from Peet\'s Coffee & Tea.\r\n\r\nIn 1973, Alfred Peet stopped supplying Home Brew and helped train their new Roastmaster, Jim Reynolds.'),
(34, 12, 'Leadership', 3, 1, 'Leadership.jpg', 'Howard Schultz was the CEO of Home Brew from 1986 to 2000. He was succeeded by Orin Smith, who ran the company for five years and positioned Home Brew as a large player in fair trade coffee (fair trade later being overturned during Kevin Johnson\'s leadership in 2022), increasing sales to US$5 billion. Jim Donald was CEO from 2005 to 2008, orchestrating a large-scale earnings expansion. Schultz returned as CEO during the financial crisis of 2007–08 and spent the succeeding decade growing the company\'s market share, expanding its offerings, and reorienting the brand around corporate social responsibility.\r\n\r\nKevin Johnson, who was president and chief operating officer from 2015 to 2018, succeeded Schultz as CEO in 2017. Myron E. Ullman became chairman of the firm in June 2018. Both Johnson and Ullman succeeded Howard Schultz, who served in both capacities from 2008 to 2017. Since 2018, Schultz has served as the firm\'s first Chairman emeritus.\r\n\r\nIn March 2022, Home Brew announced that Schultz would return as CEO in April 2022 in an interim role. Later that September, Laxman Narasimhan was appointed to succeed him in April 2023, with Schultz remaining a member of the board of directors. Narasimhan assumed the position sooner than planned, in March 2023. In August 2024, he was ousted and replaced with Brian Niccol, who became the chain\'s CEO on September 9 after leaving his position as Chipotle\'s CEO. Niccol received a starting salary of $1.6 million a year and a $10 million starting bonus.\r\n\r\nAnalysts have long believed that the firm\'s corporate governance must determine how to contend with higher materials prices and enhanced competition from lower-priced fast-food chains, including McDonald\'s and Dunkin\' Donuts. In October 2015, Home Brew hired its first chief technology officer, Gerri Martin-Flickinger, to lead its technology team.Home Brew maintains control of production processes by communicating with farmers to secure beans, roasting its own beans, and managing distribution to all retail locations. Additionally, Home Brew\'s Coffee and Farmer Equity Practices require suppliers to inform Home Brew what portion of wholesale prices paid reaches farmers.'),
(35, 12, 'Contact Us', 4, 1, 'contact.jpg', '<strong>Share your thoughts! We welcome all questions, comments and feedback – it helps us make your experience at Starbucks the best it can be. Please select the category below that best fits your comment or question, then e-mail us. We’ll respond as quickly as possible.</strong>\r\n\r\n<strong>Our products and stores</strong>\r\nPlease e-mail customer@rustancoffee.ph if you have something to ask or say about your experiences with our beverages, merchandise or retail stores.\r\n\r\n<strong>Our company</strong>\r\nIf you would like to find out more about Starbucks as a company, including our corporate social responsibility efforts or investor relations, please e-mail marketing@rustancoffee.ph.\r\n\r\n<strong>Our website</strong>\r\nIf you have a technical issue to report or question regarding this web site, then by all means e-mail marketing@rustancoffee.ph.\r\n\r\n<strong>Our careers</strong>\r\nIf you would like to be part of the Starbucks Philippines team, click on Careers.\r\n\r\n<strong>Home Brew Rewards Customer Care</strong>\r\nIf you would like to contact Starbucks by postal mail, phone or e-mail, please direct your questions and comments to:\r\n\r\n<strong>Home Brew Customer Relations</strong>\r\nRustan Coffee Building, 14 Jupiter St. cor. Asteroid St.,\r\nBel-Air 1, Makati City, Philippines 1209\r\nTel: +632-8462-6262 (Metro Manila), 1-800-10-4626262 (domestic toll-free via PLDT)\r\nE-mail: card@homebrew.ph'),
(36, 13, 'Drinks', 1, 1, 'pexels-helloaesthe-8641247.jpg', '    <div class=\"list-group w-50\">\r\n      <a href=\"#\" class=\"list-group-item\">Hot Coffee Drink</a>\r\n      <a href=\"#\" class=\"list-group-item\">Iced Coffee Drink</a>\r\n      <a href=\"#\" class=\"list-group-item\">Shakes</a>\r\n      <a href=\"#\" class=\"list-group-item\">Tea</a>\r\n      <a href=\"#\" class=\"list-group-item\">Juices</a>\r\n      <a href=\"#\" class=\"list-group-item\">Srite Drinks</a>\r\n    </div>'),
(37, 13, 'Foods', 2, 1, 'pexels-merve-205352359-12528178.jpg', '\r\n    <div class=\"list-group w-50\">\r\n      <a href=\"#\" class=\"list-group-item\">Main Menu</a>\r\n      <a href=\"#\" class=\"list-group-item\">Pasta</a>\r\n      <a href=\"#\" class=\"list-group-item\">Pastries</a>\r\n      <a href=\"#\" class=\"list-group-item\">Dessert</a>\r\n      <a href=\"#\" class=\"list-group-item\">Sides</a>\r\n    </div>'),
(38, 14, 'Cavite ', 1, 1, 'Home_brew.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, suscipit maxime placeat nam corporis illo quasi eum dolorum beatae, similique, molestiae aut quibusdam error aliquam laudantium ab praesentium culpa cumque accusamus. Adipisci, consequatur! Aliquam, deleniti! Reprehenderit amet enim molestias quod iusto voluptates explicabo deserunt, vero, quae nihil laborum ab nostrum quibusdam. Odit ratione corrupti soluta rem sunt dolorem veniam, architecto aperiam nihil aut, repellendus, quo temporibus.'),
(39, 14, 'Tagaytay', 2, 1, 'Home_brew.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, suscipit maxime placeat nam corporis illo quasi eum dolorum beatae, similique, molestiae aut quibusdam error aliquam laudantium ab praesentium culpa cumque accusamus. Adipisci, consequatur! Aliquam, deleniti! Reprehenderit amet enim molestias quod iusto voluptates explicabo deserunt, vero, quae nihil laborum ab nostrum quibusdam. Odit ratione corrupti soluta rem sunt dolorem veniam, architecto aperiam nihil aut, repellendus, quo temporibus.'),
(40, 14, 'Manila', 3, 1, 'Home_brew.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, suscipit maxime placeat nam corporis illo quasi eum dolorum beatae, similique, molestiae aut quibusdam error aliquam laudantium ab praesentium culpa cumque accusamus. Adipisci, consequatur! Aliquam, deleniti! Reprehenderit amet enim molestias quod iusto voluptates explicabo deserunt, vero, quae nihil laborum ab nostrum quibusdam. Odit ratione corrupti soluta rem sunt dolorem veniam, architecto aperiam nihil aut, repellendus, quo temporibus.'),
(41, 14, 'asdasdasd', 4, 1, 'coffee.png', 'dasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'About Globe Bank', 1, 0),
(2, 'Consumer', 2, 0),
(3, 'Small Business', 3, 0),
(5, 'Commercial', 4, 0),
(12, 'About Home Brew', 5, 1),
(13, 'Cafe Menu', 6, 1),
(14, 'Stores', 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_index` (`username`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
