-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2024 at 12:23 AM
-- Server version: 8.0.39-cll-lve
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsdiswrduac_dbueeevr`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_logs`
--

CREATE TABLE `app_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `log_event_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `app_loggable_id` bigint UNSIGNED NOT NULL,
  `app_loggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_parent_id` bigint UNSIGNED DEFAULT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_text` text COLLATE utf8mb4_unicode_ci,
  `request_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser_family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `author_profiles`
--

CREATE TABLE `author_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author_profiles`
--

INSERT INTO `author_profiles` (`id`, `user_id`, `name`, `affiliation`, `address`, `mobile_number`, `contact_email`, `website_url`, `linkedin_url`, `image`, `created_at`, `updated_at`) VALUES
(9, 13, 'Test Na5', NULL, NULL, NULL, 'aalnoor74@gmail.com', NULL, NULL, NULL, '2024-05-29 19:51:06', '2024-05-29 19:51:06'),
(12, 16, 'Noor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 09:02:55', '2024-06-02 09:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `board_members`
--

CREATE TABLE `board_members` (
  `id` bigint UNSIGNED NOT NULL,
  `member_designation_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '	1 = Active ; 2 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board_members`
--

INSERT INTO `board_members` (`id`, `member_designation_id`, `name`, `designation`, `affiliation`, `image`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Professor Dr. Mahbuba Sultana', 'Professor', 'Associate Editor', 'uploads/board-member/image/image-1717554140-665fcbdc310e0.png', 7, 1, '2024-05-21 19:14:06', '2024-09-03 17:14:51'),
(2, NULL, 'Professor Dr. Golam Azam', 'Professor & Director', 'Editor', 'uploads/board-member/image/image-1717554001-665fcb51cf2f0.png', 1, 1, '2024-05-21 19:14:32', '2024-06-05 02:20:01'),
(3, NULL, 'Professor Dr ASM Atiqur Rahman', 'Professor', 'Members', 'uploads/board-member/image/image-1717554311-665fcc877a951.png', 3, 1, '2024-06-05 02:25:11', '2024-06-05 02:26:24'),
(4, NULL, 'Professor Dr. Md. Nurul Islam', 'Professor', 'Members', 'uploads/board-member/image/image-1717554629-665fcdc598b40.png', 4, 1, '2024-06-05 02:30:29', '2024-06-05 02:30:29'),
(5, NULL, 'Professor Tahmina Akhtar', 'Professor', 'Members', 'uploads/board-member/image/image-1717554893-665fcecd05f6b.png', 5, 1, '2024-06-05 02:34:53', '2024-06-05 02:34:53'),
(6, NULL, 'Professor Dr. Golam Rabbani', 'Professor', 'Associate Editor', 'uploads/board-member/image/image-1717555014-665fcf46055d7.png', 2, 1, '2024-06-05 02:36:54', '2024-09-03 17:15:20'),
(7, NULL, 'Professor Dr. M. Rezaul Islam', 'Professor', 'Member', 'uploads/board-member/image/image-1717555124-665fcfb4097e7.png', 7, 1, '2024-06-05 02:38:44', '2024-06-05 02:38:44'),
(8, NULL, 'Professor Dr. Fozle Khoda', 'Professor', 'Member', 'uploads/board-member/image/image-1717555235-665fd023dcd4f.png', 9, 1, '2024-06-05 02:40:35', '2024-09-03 17:23:23'),
(9, NULL, 'Professor Dr. Mohammad Shahin Khan', 'Professor', 'Member', 'uploads/board-member/image/image-1717555341-665fd08de4b33.png', 10, 1, '2024-06-05 02:42:21', '2024-09-03 17:23:44'),
(10, NULL, 'Professor Dr. Sk. Tauhidul Islam', 'Professor', 'Member', 'uploads/board-member/image/image-1717555415-665fd0d7ba99c.png', 11, 1, '2024-06-05 02:43:35', '2024-09-03 17:24:00'),
(11, NULL, 'Professor Dr. Tania Rahman', 'Members', NULL, 'uploads/board-member/image/image-1725384106-66d745aad0a8f.png', 6, 1, '2024-09-03 17:18:35', '2024-09-03 17:21:46'),
(12, NULL, 'Professor Dr. Mohammad Hafiz Uddin Bhuiyan', 'Professor', 'Members', 'uploads/board-member/image/image-1725384334-66d7468e501c6.png', 12, 1, '2024-09-03 17:25:34', '2024-09-03 17:30:52'),
(13, NULL, 'Professor Dr. Md. Rabiul Islam', 'Professor', 'Members', 'uploads/board-member/image/image-1725384514-66d747429889e.png', 13, 1, '2024-09-03 17:28:34', '2024-09-03 17:28:34'),
(14, NULL, 'Professor  Dr. Shahana Nasrin', 'Professor', 'Member', 'uploads/board-member/image/image-1725384787-66d748538da61.png', 13, 1, '2024-09-03 17:33:07', '2024-09-03 17:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '1 = active; 2 = inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_articles`
--

CREATE TABLE `journal_articles` (
  `id` bigint UNSIGNED NOT NULL,
  `journal_issue_id` bigint UNSIGNED DEFAULT NULL,
  `page_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doi_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci,
  `authors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '	1 = Active ; 2 = Inactive',
  `download_count` int DEFAULT '0',
  `view_count` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_articles`
--

INSERT INTO `journal_articles` (`id`, `journal_issue_id`, `page_no`, `title`, `doi_url`, `abstract`, `authors`, `keywords`, `pdf_file`, `order_id`, `status`, `download_count`, `view_count`, `created_at`, `updated_at`) VALUES
(3, 2, '69-98', 'Clinical Social Work Intervention for People Bereaved through Suicide', '#', 'Suicide is an unexpected and violent death that brings unlimited sufferings for deceased family. Each suicide has the deleterious, devastating and far-reaching effects on the functioning of suicide loss survivors such as families, friends and communities left behind. The suicide survivors tend to have a serious form of bereavement. Statistics shows that as a minimum six beloved ones are directly affected by each suicidal death. Another statistics illustrates that about 48 million people every year are found to have experience of suicide bereavement globally. On the other hand, 11,000 people kill themselves every year in Bangladesh. But literature within suicide bereavement and its prevention is still limited because of paucity of methodologically vigorous studies involving the people bereaved due to suicide. Hence, the present paper is an attempt to confer an indication of suicide bereavement and the prospective role of the clinical social work for supporting the individuals bereaved through suicide. In doing so, literatures related to suicide bereavement were reviewed from the secondary sources of data and findings have been presented in this paper. This paper describes the affected people’s reactions in bereavement and the needs for provision of effective post-intervention support system for the families of the deceased. However, this paper concludes with few recommendations to make stronger and potential postvention to assist the governments, policy makers and other stakeholders, and some actionable measures for countries according to their available resources and context along with mentioning necessity of effective and time-bound practical support to promote recovery of individuals affected by suicide bereavement.', 'Shahana Nasrin', 'Suicide, Bereavement, Clinical Social Work, Postvention.', 'uploads/journal/article/pdf/pdf_file-1724263178-66c62b0a9eac8.pdf', 4, 1, 19, 83, '2024-05-21 13:08:21', '2024-09-03 18:07:31'),
(4, 2, '57-68', 'Philosophical Underpinning in Social Investigation', '#', 'The aim of all investigations is knowledge building. Philosophical assumptions play significant roles in this knowledge-building process. The foundation of philosophical assumptions encompasses ontology and epistemology. Ontology refers to a philosophical postulation that informs the nature of reality of the sources from which the knowledge is produced. Epistemology, on the other hand, is the science of knowing (the knowledge), which informs how something is known that is wanted to be known. Proper ontological and epistemological knowledge guides investigators to work in the right way. In the knowledge-creating process, researchers’ familiarity with the philosophy of knowledge plays a significant role to produce trustworthy information. It also supports interested readers to decide whether they will accept or reject the results of an investigation. This article attempts first to explain the different concepts related to philosophical underpinning. Later it attempted to discuss the necessity of using philosophical aspects, including ontology and epistemology, in the knowledge-building process. This article is written based on existing available literature in the relevant field.', 'Fozle Khoda', 'social investigation, knowledge-building, philosophical assumptions, ontology, epistemology.', 'uploads/journal/article/pdf/pdf_file-1724263066-66c62a9a5187f.pdf', 3, 1, 21, 16, '2024-05-21 13:09:14', '2024-09-02 15:02:18'),
(5, 2, '29-56', 'Women Empowerment in Bangladesh: An Analysis of Present Perspectives', '#', 'Women empowerment has been a crucial policy of the government for long since they constitute half of the total population and has boundless potentiality to contribute to the development of the nation. Bangladesh is the champion of women empowerment in south-Asia. The country has made momentous progress since the last few years particularly in the area of women development. However, the concept of empowerment requires clarification since it is sometimes misunderstood. Proper socio-economic development is urgently needed to empower women. And this study also attempts to explore the present perspective of women empowerment programs are taken and run by government and various agencies for women development of Bangladesh and challenges of empowerment and later suggests few recommendations for that. After collecting data, it is found that it needs to take more effective measures for all women; especially for the mainstream women to accelerate national development.', 'Tania Rahman andTaiyeba Tabassum', 'women, women empowerment, challenges, initiatives, national development', 'uploads/journal/article/pdf/pdf_file-1724262874-66c629da0b079.pdf', 2, 1, 16, 14, '2024-05-21 13:10:06', '2024-09-02 20:30:05'),
(15, 2, '5-27', 'Attitudes, Knowledge and Treatment Management about Mental Illness among the Care-Givers: Experience in Bangladesh', '#', 'Health cannot be completed without mental health. Prevalence of mental illness is relatively high and becoming a major problem in Bangladesh. According to the National Mental Health SurveyBangladesh 2018-19, nearly 17% of adults in Bangladesh are suffering from mental health issues, where 14% of children aged between 7 to 17 years suffer from mental health issues (NIMH & WHO, 2019). The objectives of this study were: i) To identify the extent of knowledge and attitudes among the respondents regarding mental health and mental illness, its causes symptoms and awfulness; ii) To determine the knowledge about the treatment and management system of mental patients among their caregivers; iii) To know the ideas of the respondents about existing mental health services, sources of getting services and their effectiveness; and finally iv) To find-out the limitations of the services and give some recommendations about how to develop the services for mentally ill patients. To achieve the above mentioned objectives, the study was quantitative in nature and conducted based on sample survey. Considering the non-probability sampling, purposive sampling technique was adopted and data were collected from 200 respondents from the mental health providing institutions in Dhaka city and by interview schedule. Study revealed that out of 150 respondents majority of respondents (70%) have heard the name of mental illness but conception about awfulness of mental health and illness are totally unscientific. Out of the total, 25% respondents who know about the causes and its symptoms and 33% have mentioned the unscientific causes of mental illness. Most of the respondents (53%) do not know the examination process of this disease/illness. According to the study, only 20% respondents have taken treatment regularly and 43% reported they are not satisfied in treatment. Because, doctors/nurses did not give attention properly, some other issues were misbehave, very expensive services, lengthy process,insufficient facilities, distance from home, and inadequateand unskilled manpower etc.Mental health remains neglected in this country with the shortage of service facilities,manpower and logistic support and inadequate funds. To overcome these constraints, changing models of mental health care, adoption of a holistic approach, and accessible care', 'Tahmina Akhtar', 'Mental Health Illness, Awareness, Treatment and Effectiveness', 'uploads/journal/article/pdf/pdf_file-1724262362-66c627da0b824.pdf', 1, 1, 18, 15, '2024-05-24 19:33:12', '2024-08-30 07:44:36'),
(16, 1, '23', '23', '23', '23', '23', '23', 'uploads/journal/article/pdf/pdf_file-1716703150-6652cfae41af6.pdf', 23, 2, 13, 14, '2024-05-24 19:38:38', '2024-09-03 18:09:37'),
(17, 2, '99-112', 'Factors Influencing Alarming Rate of Road Accidents in Bangladesh', '#', 'In Bangladesh, road accident is a common occurrence. It is difficult to envision a day when there is no road accident. A large number of people are killed or injured in road accidents every year. Despite the fact that it has become a matter of concern, this problem receives very little attention, and the steps taken to address it are insufficient. However, identifying the factors that influence a problem is a prerequisite for solving it. This paper is an attempt to review various influencing factors and statistics connected to road accidents that happened in Bangladesh using numerous documents, reports, articles, and internet sources. Different studies have shown that there is no single cause for the growing prevalence of these accidents. Road accidents are caused by a variety of factors, but not all of them are equally responsible; certain factors are widespread, while others are unusual. Since this is a worrying and increasing problem in Bangladesh, it is important to address it through a comprehensive and holistic approach. It is expected that this paper would help in raising awareness by utilizing pertinent information about the cause of the accident and reducing it to a minimum.', 'Md. Ashraful Alam', 'road accidents, causes, fatality, vehicle, pedestrian', 'uploads/journal/article/pdf/pdf_file-1724263370-66c62bca75526.pdf', 5, 1, 0, 2, '2024-08-21 18:02:51', '2024-09-01 05:03:16'),
(18, 2, '113-129', 'Biological, Psychological and Social Perspectives of Ageing', '#', 'Ageing refers to a comprehensive, multidimensional, and continuous process of growing older. This process starts from the beginning of the birth and continues till the death of a human being. This paper considers biological, psychological and social perspectives in the ageing context. To know about the physiological, mental and social changes that occur during life, it is fundamental to understand the ageing concept in an extended way. This paper highlights the conceptual definition of ageing under gerontology by focusing on religious, academic, research, and literature based issues. Elderly people not only face different exigent and challenging changes in both their body and mind, but the social structure and cultural aspects influence the perception of ageing to the elderly and society at the same time. Biological ageing or physiological ageing occurs various changes in the body, which usually decreases with age and time. Psychological ageing sheds light on the emotional or mental or cognitional changes and social ageing refers to changes in social roles and responsibilities. WHO defines healthy ageing as a process which maintains and develops the functional ability under a physical, mental and social context that guarantees the soundness of elderly people. In order to ensure the physical and mental soundness of the elderly people in the aged-friendly socio- cultural context, it is a must to have a better understanding of this concept for gerontologists, geriatric experts, policymakers, and planners.', 'Anuradha Bardhan', NULL, 'uploads/journal/article/pdf/pdf_file-1724263573-66c62c95ad83d.pdf', 6, 1, 1, 14, '2024-08-21 18:06:15', '2024-09-03 11:19:28'),
(19, 2, '131-148', 'Social Security Programs in Ready-made Garment (RMG) Sector on Bangladesh Experience', '#', 'Social security in RMG Sector is a vital and burning issue and the present study aimed to investigate social security and welfare program’s in ready-mate garment sector in Bangladesh. The present study has been conducted on the basis of specific objectives and those are- to know the socio-demographic status, general welfare provision and facilities, health amenities and working environment, social protection and human rights provisions for female worker in RMG sector. In- depth Case Study has been applied as main method and Focus Group Discussion also applied as supportive method. Study location has been randomly chosen at Narayanganj and Bhaluka Upazila of Bangladesh where located a lots of ready-mate garment industry. The real condition of social security is quite satisfactory but not very standard. A strong monitoring team need to form where expertise members need to involve like professional social workers. Longe scale garment factoryrie’s maintain social security and physical animates better than the small and medium factories. So, compliance must be ensured for all size of factory.', 'Md. Roni Mridha', 'social security, garment sector, provisions, services, facilities etc.', 'uploads/journal/article/pdf/pdf_file-1724263682-66c62d02d333f.pdf', 7, 1, 0, 0, '2024-08-21 18:08:04', '2024-08-21 18:08:04'),
(20, 2, '149-160', 'The Plight of the Girl Juvenile Delinquents in the Child Development Center (CDC) in Bangladesh', '#', 'In the legal system of Bangladesh, there are provisions for dealing with juvenile delinquencies committed by both boys and girls. They are involved with the justice system for their different types of illegal activities. It is true that girls generally commit minor crimes but there is a growing tendency of girls’ committing violent crimes. Despite increasing instances of juvenile crimes, there exist only three Chid Development Centers (CDCs) across Bangladesh. Of them, only one Child Development Center (CDC) is for the development of girls juvenile delinquents, Because of this scarcity of CDC for girls, often girls are kept in prisons as an alternative for CDCs. Although the Children Act 2013 focuses upon the establishment of new CDCs, new guidelines for certification and operational procedures, no visible signs are observed regarding the establishment of new CDCs in general let alone exclusive CDCs for girls. Moreover, providing poor probation services and recreational activities is a common picture of Konabari CDC and no gender-specific effective program is introduced yet. It is a universal scenario that girls delinquents face more difficulties in correctional centres. In spite of this, fundamental services including legal procedures of Konabari CDC are not sufficient for girls. The objective of this paper is to focus upon the current tendency of girl juvenile delinquents and the services given to them in CDCs in Bangladesh. The study is based on secondary data mainly and case study. Another objective of the paper is to find out the way outs to make up the existing problems of girl delinquents.', 'Nahid Ferdousi', 'Girls, delinquent, correctional centers, serv', 'uploads/journal/article/pdf/pdf_file-1724263949-66c62e0d38895.pdf', 8, 1, 0, 1, '2024-08-21 18:12:30', '2024-09-02 02:26:51'),
(21, 2, '161-176', 'Social Capital of Community Organizations for Enhancing Social Protection : Experiences of Japan and Bangladesh', '#', 'Globally, the governments dedicate a significant portion of their national budgets to social protection, though a good number of vulnerable people remain excluded from the benefits of these programmes. Such types of exclusion errors are not infrequent in Bangladesh as well. However, these victims of exclusion errors somehow manage to get support from the social capital of community organizations. Drawing on the examples of the Japanese neighbourhood organizations (NHA), the paper endeavours to explore the possibility of tapping the potential of the age-old traditional community organizations of Bangladesh for more systematic protection of the poor and vulnerable people of the society. The study reveals that the community organizations could have better served the vulnerable groups of the society when these organizations would be given formal status by associating them with local government offices following the model of Neighbourhood Associations (NHA) of Japan. These organizations may also be given some lump grants during disasters to support their members, complementing the social protection of the poor at the grassroots level. Thus, the social capital of community organizations may be better employed for strengthening the overall social protection system of Bangladesh.', 'Mohammad Khaled Hasan', NULL, 'uploads/journal/article/pdf/pdf_file-1724264065-66c62e81592c9.pdf', 9, 1, 0, 1, '2024-08-21 18:14:26', '2024-08-28 19:34:24'),
(22, 2, '177-197', 'Living with Violence: Experiences of the Financially Solvent Women in Dhaka City', '#', 'The objective of this paper is to explore the reasons financially solvent women continue to live with their abusive husbands. To that end, a qualitative approach was applied and 11 cases were studied with a view to know the subjective experiences of the victims that they face in their everyday lives. Primary data was collected through face to face interviews using a semi-structured guideline. A thematic approach was applied to organize and analyse data. The findings reveal that the universality of marriage and its effect on women, social acceptance of wife- beating, concerns of a mother for her children, social stigma and shame associated with divorce, parental pressure to cope with violence at the husband’s home, lack of social and legal support, inadequate legal instruments and lack of separate and safe dwelling for women are factors that make financially solvent women continue living with violence. This paper argues that women’s financial independence cannot buy their freedom of choice to leave an abusive relationship in Bangladesh. It recommends effective enforcement of the existing laws related to the issue as well as amendment of them, ensuring safe abodes and financial security for the victims, building mass consciousness and changing patriarchal social values.', 'Mohammad Sajjad Hossain and Sharmi Ara Hossain Mishu', 'violence against women, spousal violence, intimate partner violence, domestic violence.', 'uploads/journal/article/pdf/pdf_file-1724264192-66c62f00ca3b5.pdf', 10, 1, 0, 1, '2024-08-21 18:16:34', '2024-09-01 19:46:04'),
(23, 2, '199-220', 'Attitude and influencing factors of male students towards future participation in job sector of their spouses: Bangladesh perspective', '#', 'Bangladesh is still classified as a developing country, regardless of the fact that its economic level has been increased and the government has a large and ambitious plan to transform the country into a developed one. This ambition won’t come true unless the potentials of women folk could be fully explored and utilized. However, Bangladeshi society has a strong patriarchal legacy. Males’ attitudes on working women haven’t changed despite the fact that the number of women in education and job has increased. Even educated males do not respect working women and their professions. In such a context, this study aims at exploring male university students’ attitudes and factors that shape their attitudes towards their future spouses’ participation in the work force along with gender discrimination and hindrance to women empowerment. Qualitative approach was adopted and case study method has been applied to investigate these issues. Primary data was collected through In-depth interviews. The study found both positive and negative attitudes and the reasons behind such attitudes on the issue. There are still males in society who do not want to marry working women and men rarely have a positive opinion about their wives’ engagement in the workplace. In contrast, supportive attitudes towards the engagement of the spouse in the work have been found. However, in some cases such support was conditional and in others unconditional.', 'Bushra Zaman and Miftahul Bari', 'attitude, spouse’s participation in the work, male domination, gender discrimination, female empowerment.', 'uploads/journal/article/pdf/pdf_file-1724264294-66c62f6683a38.pdf', 11, 1, 0, 1, '2024-08-21 18:18:15', '2024-09-02 07:10:30'),
(24, 2, '221-235', 'Existing Probation and Aftercare Services in Bangladesh', '#', 'Probation and aftercare services are the major correctional services all over the world, particularly in Bangladesh. Generally, convicted people or released prisoners get the facilities. This paper is based on research findings regarding probation and aftercare services. Probation and aftercare services are helpful, and probation officers are caring and dutiful towards the probationers. According to the findings most of the probationers are poor, illiterate, low-income earners, and unsure of earnings. They are the victims of extramarital affairs, convicted of theft, and charged with murder. The probationers come to life and involve income-generating activities for survival within the community or family life. The probationers are satisfied with the services, but the assigned officers are dissatisfied with inadequate facilities. They demand proper guidelines and adequate logistics for better services to the probationers. This paper is formulated based on a case study and KIIs. So, it is qualitative-based research findings through primary data. This paper deals with the guidelines for the government, policymakers, and correctional services in Bangladesh.', 'Mohammad Shiblezzaman', NULL, 'uploads/journal/article/pdf/pdf_file-1724264396-66c62fcc34567.pdf', 12, 1, 0, 1, '2024-08-21 18:19:57', '2024-08-31 18:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `journal_issues`
--

CREATE TABLE `journal_issues` (
  `id` bigint UNSIGNED NOT NULL,
  `journal_volume_id` bigint UNSIGNED DEFAULT NULL,
  `chief_editor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '	1 = Active ; 2 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_issues`
--

INSERT INTO `journal_issues` (`id`, `journal_volume_id`, `chief_editor`, `issue_no`, `page_no`, `title`, `publish_date`, `cover_image`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '1', '1', 'Volume 12, Issue 13, Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', '2024-05-24', 'uploads/issue/cover-image/cover_image-1716602404-6651462425eb8.jpg', 1, 2, '2024-05-18 13:43:11', '2024-09-03 18:08:28'),
(2, 1, NULL, '1', '5-235', 'The Journal of Social Development', '2021-01-12', 'uploads/issue/cover-image/cover_image-1725383150-66d741ee6a83c.png', 1, 1, '2024-05-18 13:47:35', '2024-09-03 17:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `journal_volumes`
--

CREATE TABLE `journal_volumes` (
  `id` bigint UNSIGNED NOT NULL,
  `journal_year_id` bigint UNSIGNED DEFAULT NULL,
  `volume_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1' COMMENT '	1 = Active ; 2 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_volumes`
--

INSERT INTO `journal_volumes` (`id`, `journal_year_id`, `volume_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '32', 1, '2024-05-18 13:14:30', '2024-08-21 16:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `journal_years`
--

CREATE TABLE `journal_years` (
  `id` bigint UNSIGNED NOT NULL,
  `language_type` tinyint DEFAULT '1' COMMENT '	1 = en ; 2 = bn	',
  `journal_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1' COMMENT '	1 = Active ; 2 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_years`
--

INSERT INTO `journal_years` (`id`, `language_type`, `journal_year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2021', 1, '2024-05-18 12:47:57', '2024-08-21 16:55:31'),
(2, 1, '2000', 1, '2024-05-18 12:49:45', '2024-05-18 12:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `log_events`
--

CREATE TABLE `log_events` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manuscripts`
--

CREATE TABLE `manuscripts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approval_status` tinyint NOT NULL COMMENT '1 =pending; 2 =approved;\n            3= rejected',
  `resubmittable` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manuscripts`
--

INSERT INTO `manuscripts` (`id`, `user_id`, `subject`, `submitted_date`, `approval_status`, `resubmittable`, `created_at`, `updated_at`) VALUES
(9, 13, 'Test', '2024-05-30 10:09:23', 1, 1, '2024-05-29 20:07:21', '2024-05-29 20:07:21'),
(10, 13, 'Test', '2024-05-30 10:09:23', 1, 1, '2024-05-29 20:14:01', '2024-05-29 20:14:01'),
(11, 13, 'A manuscript is a handwritten composition on paper, bark, cloth, metal, palm leaf or any other material dating back at', '2024-05-30 10:09:23', 1, 1, '2024-05-29 20:23:39', '2024-05-29 20:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `manuscript_mails`
--

CREATE TABLE `manuscript_mails` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `manuscript_id` bigint UNSIGNED NOT NULL,
  `manuscript_version_id` bigint UNSIGNED NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manuscript_mails`
--

INSERT INTO `manuscript_mails` (`id`, `user_id`, `manuscript_id`, `manuscript_version_id`, `sent_time`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 13, 11, 4, '2024-05-30 10:28:10', 'dsf', 'dsf', '2024-05-30 04:28:10', '2024-05-30 04:28:10'),
(2, 13, 11, 4, '2024-05-30 12:25:15', 'fds', 'fds', '2024-05-30 06:25:15', '2024-05-30 06:25:15'),
(3, 13, 11, 4, '2024-05-30 12:34:27', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.', '2024-05-30 06:34:27', '2024-05-30 06:34:27'),
(4, 13, 11, 4, '2024-05-31 03:50:51', 'Test', 'Test', '2024-05-30 21:50:51', '2024-05-30 21:50:51'),
(5, 13, 11, 4, '2024-05-31 03:56:55', 'gfds', 'fgd', '2024-05-30 21:56:55', '2024-05-30 21:56:55'),
(6, 13, 11, 4, '2024-05-31 04:14:43', 'test', 'test', '2024-05-30 22:14:43', '2024-05-30 22:14:43'),
(7, 13, 11, 4, '2024-05-31 04:16:30', 'dsf', 'fds', '2024-05-31 04:16:30', '2024-05-31 04:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `manuscript_versions`
--

CREATE TABLE `manuscript_versions` (
  `id` bigint UNSIGNED NOT NULL,
  `manuscript_id` bigint UNSIGNED NOT NULL,
  `version_no` int NOT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approval_status` tinyint NOT NULL COMMENT '1=pending; 2=approved;\n            3=resubmit; 4=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manuscript_versions`
--

INSERT INTO `manuscript_versions` (`id`, `manuscript_id`, `version_no`, `abstract`, `main_file`, `submitted_date`, `approval_status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'test', 'uploads/manuscript/main-file/main_file_11717034841-6657df5966660.docx', '2024-05-30 11:03:08', 1, '2024-05-29 20:07:21', '2024-05-29 20:07:21'),
(2, 10, 1, 'test', 'uploads/manuscript/main-file/main_file_11717035241-6657e0e9b1aff.docx', '2024-05-30 11:03:08', 1, '2024-05-29 20:14:01', '2024-05-29 20:14:01'),
(3, 11, 1, 'A manuscript is a handwritten composition on paper, bark, cloth, metal, palm leaf or any other material dating back at least seventy-five years that has significant scientific, historical or aesthetic value.', 'uploads/manuscript/main-file/main_file_11717035819-6657e32b83446.docx', '2024-05-30 11:03:08', 1, '2024-05-29 20:23:39', '2024-05-29 20:23:39'),
(4, 11, 1, 'two', 'uploads/manuscript/main-file/main_file_11717035819-6657e32b83446.docx', '2024-05-30 11:03:08', 1, '2024-05-29 20:23:39', '2024-05-29 20:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `member_designations`
--

CREATE TABLE `member_designations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '	1 = Active ; 2 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_06_154555_create_categories_table', 1),
(6, '2023_12_28_202153_create_roles_table', 1),
(7, '2023_12_28_202213_create_permissions_table', 1),
(8, '2023_12_28_202305_create_permission_role_table', 1),
(9, '2023_12_28_202337_create_user_role_table', 1),
(10, '2024_01_07_162154_create_permission_groups_table', 1),
(11, '2024_01_09_145052_create_app_logs_table', 1),
(12, '2024_01_10_120147_create_log_events_table', 1),
(13, '2024_05_18_170734_create_journal_years_table', 2),
(14, '2024_05_18_170754_create_journal_volumes_table', 2),
(15, '2024_05_18_170816_create_journal_issues_table', 2),
(16, '2024_05_18_170833_create_journal_articles_table', 2),
(17, '2024_05_22_002119_create_pages_table', 3),
(18, '2024_05_22_002227_create_member_designations_table', 3),
(19, '2024_05_22_002309_create_board_members_table', 3),
(20, '2024_05_22_003238_create_site_pages_table', 4),
(21, '2024_05_28_040034_create_author_profilees_table', 5),
(22, '2024_05_28_041052_create_author_profiles_table', 6),
(25, '2024_05_29_041404_create_manuscripts_table', 7),
(26, '2024_05_29_041429_create_manuscript_versions_table', 7),
(27, '2024_05_30_090708_create_manuscript_mails_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `permission_group_id` bigint UNSIGNED DEFAULT NULL,
  `route` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1' COMMENT '1 = active; 2 = inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1' COMMENT '1 = Active; 2 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_pages`
--

CREATE TABLE `site_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '	1 = Active ; 2 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_pages`
--

INSERT INTO `site_pages` (`id`, `name`, `slug`, `title`, `description`, `pdf_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Author Guidelines', 'author-guidelines', 'author guidelines', 'author guidelines', NULL, 1, NULL, '2024-05-21 18:48:56'),
(2, 'Guidelines for Reviewers', 'guidelines-for-reviewers', 'guidelines for reviewers', 'guidelines for reviewers', NULL, 1, NULL, '2024-05-21 18:48:56'),
(3, 'Overall', 'overall', 'overall', 'overall', NULL, 1, '2024-06-02 03:48:17', '2024-05-21 18:48:56'),
(4, 'Aim and Acope', 'aim-and-scope', 'Aim and Acope', 'Aim and Acope', NULL, 1, '2024-06-02 03:48:17', '2024-05-21 18:48:56'),
(5, 'Contact Us', 'contact-us', 'Contact Us', 'Institute of Social Welfare and Research\r\n              Dhaka University Campus, Dhaka-1000.<br>\r\n  \r\n                <strong>Phone:</strong> +88 09666 911 463 (Ext. 9661900-73/8480)<br>\r\n                <strong>Mobile:</strong> +88 02 58616662<br>\r\n                <strong>Email:</strong> support@jsd-iswr.du.ac.bd, g.azam2011@gmail.com; iswrdu.ad@gmail.com', NULL, 1, '2024-06-02 03:48:17', '2024-06-04 15:12:56'),
(6, 'account suspended', 'account-suspended', 'account suspended', 'account suspended', NULL, 1, '2024-06-02 03:48:17', '2024-05-21 18:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` tinyint NOT NULL DEFAULT '1' COMMENT '1 = Inactive ; 2 = Active; 3= suspend	',
  `account_message` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint DEFAULT NULL COMMENT '1 = admin; 2 = journal submitter , 3 = journal editor ; 4 = reviewer	',
  `can_submit_journal` tinyint NOT NULL DEFAULT '1' COMMENT '1 = no ; 2 = yes	',
  `verification_code` int DEFAULT NULL,
  `is_email_verified` tinyint DEFAULT '1' COMMENT '1 = not verified; 2 = verified	',
  `random_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `account_status`, `account_message`, `email_verified_at`, `password`, `remember_token`, `role_id`, `can_submit_journal`, `verification_code`, `is_email_verified`, `random_url`, `sent_time`, `created_at`, `updated_at`) VALUES
(1, 'LD Noor', 'superadmin@gmail.com', 'uploads/images/default/profile.png', 1, NULL, NULL, '$2y$12$D1NIQz5W7Ifw7rnxVAfpGO1IW9KMZzNusS6Hexe268GqZ6jOGVLS2', NULL, 1, 1, NULL, NULL, NULL, NULL, '2024-05-18 11:01:21', '2024-05-18 11:01:21'),
(2, 'Admin', 'admin@gmail.com', 'uploads/images/default/profile.png', 1, NULL, NULL, '$2y$12$vrmgQd3ql89dXWprJZh.KeYxBospBipTyfz33ZjDBGEBYKi5vP/SS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Test Na5', 'aalnoor741@gmail.com', NULL, 2, NULL, NULL, '$2y$12$3J1JIS1r2zq3CYKeuDNgaeG2k1QHa7DpB5jjFkq9Mhau6vXcI2dKi', '9o7Y80JQlNpgCJI3h3x5NJqGpV1Mjoz5TavWyON1cFLmSSf7xpjCvTxYxQBV', 2, 1, 7939792, 1, NULL, '0000-00-00 00:00:00', '2024-05-29 19:51:06', '2024-06-02 06:59:00'),
(16, 'Noor', 'aalnoor74@gmail.com', NULL, 2, NULL, '2024-06-02 09:52:18', '$2y$12$P/WgqcsD6ZF2FH7m7M9LR..I1eISWS3AB7QzuMaJnJeadsNfzoK5O', 'qO4bAEF6zymEuoM0Fz7M49RxQfnZLaRU3FIfOySP584Ocat0lsmGzTuMQMsY', 2, 1, 0, 2, 'duiZ2Eyif78NcokOGCnIG1q2nejVPw4MHXdxVGIdJOJP6EMnlAgDbqhZSc9QoimY5YNGYmCTjvjHyY51jPXRAIb5wD1UTkqv4XcJFjagIT9by3GfbjLAOy86', '2024-06-04 05:12:59', '2024-06-02 09:02:55', '2024-06-04 05:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_logs`
--
ALTER TABLE `app_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_profiles`
--
ALTER TABLE `author_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_members`
--
ALTER TABLE `board_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `journal_articles`
--
ALTER TABLE `journal_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_issues`
--
ALTER TABLE `journal_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_volumes`
--
ALTER TABLE `journal_volumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_years`
--
ALTER TABLE `journal_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_events`
--
ALTER TABLE `log_events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `log_events_slug_unique` (`slug`);

--
-- Indexes for table `manuscripts`
--
ALTER TABLE `manuscripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manuscript_mails`
--
ALTER TABLE `manuscript_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manuscript_versions`
--
ALTER TABLE `manuscript_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_designations`
--
ALTER TABLE `member_designations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_route_unique` (`route`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_groups_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_pages_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_logs`
--
ALTER TABLE `app_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `author_profiles`
--
ALTER TABLE `author_profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `board_members`
--
ALTER TABLE `board_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal_articles`
--
ALTER TABLE `journal_articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `journal_issues`
--
ALTER TABLE `journal_issues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journal_volumes`
--
ALTER TABLE `journal_volumes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `journal_years`
--
ALTER TABLE `journal_years`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_events`
--
ALTER TABLE `log_events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manuscripts`
--
ALTER TABLE `manuscripts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manuscript_mails`
--
ALTER TABLE `manuscript_mails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manuscript_versions`
--
ALTER TABLE `manuscript_versions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_designations`
--
ALTER TABLE `member_designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
