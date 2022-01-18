-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 jan. 2022 à 10:23
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  `enligne` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`, `enligne`) VALUES
(1, 'test/test', 1, 3, '2021-12-21 04:00:00', 0),
(2, 'Les rams/fkjlnbkjzsdfk', 2, 1, '2021-12-19 12:41:41', 0),
(3, 'ojgkerlihgioerz/erjhbgviiehbviehurzv', 1, 1, '2021-12-29 12:46:46', 0),
(4, 'Modera/sfkjbzjeblviebziv', 2, 1, '2021-12-17 12:46:46', 0),
(5, 'ofbviefbiv/erhiuperhgiuer', 3, 5, '2021-12-01 12:47:34', 0),
(6, 'klaegbierg/qegieariugiueharg', 2, 1, '2021-12-29 12:47:34', 0),
(7, 'jaejigrlkdq,/raeiguhuerighiu', 1, 1, '2022-01-03 10:15:49', 0),
(8, 'TEST/TEST2', 1, 1, '2022-01-03 10:22:38', 0),
(9, 'JOLI/JOLI', 1, 1, '2022-01-03 10:22:57', 0),
(10, 'ergnerozgi/azeoigiheruohg', 1, 1, '2022-01-04 08:03:50', 1),
(11, 'Rams-Cardinals injury report: Other than secondary issues, LA healthy for Wild Card/The Los Angeles Rams suffered significant losses in the secondary in the regular season finale, losing safety Jordan Fuller for the playoffs and putting Taylor Rapp and cornerback Darious Williams in question for Mondayâ€™s wild card game against the Arizona Cardinals. The safety depth is so worrisome that the Rams signed Eric Weddle this week, two years after he last played a game.\r\n\r\nBut other than the definite loss of Fuller, the LA Rams could be in relatively good condition heading into the wild card game.\r\n\r\nLinebacker Leonard Floyd was held out of practice on Thursday with a back injury, but Sean McVay expects him to be ready for the Cardinals. Safety Taylor Rapp is in the concussion protocol and could be held out, with additional reps going to Nick Scott, Terrell Burgess, Antoine Brooks, and/or Weddle. Darious Williams practiced in full.\r\n\r\nMeanwhile, Matthew Stafford can look around and see the returns of Cam Akers and Jake Funk to the backfield, as well as all five starting linemen that heâ€™s had all yearâ€”whether thatâ€™s a good thing or a bad thing is up for debate, but they are healthy. The defense could potentially see the return of Sebastian Joseph-Day in the postseason too.\r\n\r\nArizona is hoping to get back J.J. Watt, who went on injured reserve in late October but was recently designated for return and he practiced on Thursday.', 1, 1, '2022-01-14 09:12:09', 0),
(12, 'Rams 2022 playoffs, wild card preview/The Los Angeles Rams are 12-5 and in the playoffs as the four-seed in the NFC. They will be hosting the 11-6 Arizona Cardinals on Monday Night Football, the NFLâ€™s first chance to put SoFi Stadium on a postseason stage for the world to see, just a month before that same arena hosts the Super Bowl. Will the Rams be there too?\r\n\r\nI posted a survey for Rams fans this week and to go over early poll results, I sat down with a Turf Show Times legend.\r\n\r\nJoe McAtee, aka @3k_ on twitter, comes back to Turf Show Times to preview Rams-Cardinals wild card monday. We go over the Rams fan survey questions, including what do the Rams need to do to win vs Cardinals? Who should be the second and third-most targeted players? Who is the X factor on offense and defense? Where do the Rams stack up in the 2022 NFC playoffs? That and much more in a great interview with a great Rams expert.', 1, 5, '2022-01-14 09:46:17', 0),
(13, 'Rams in danger of losing offensive coordinator Kevin Oâ€™Connell during interview cycle/Kevin Oâ€™Connell was drafted in 2008, the same year as four quarterbacks who took snaps in 2021â€”Matt Ryan, Joe Flacco, Chad Henne, and Josh Johnsonâ€”but the 36-year-old could soon find himself as the head coach of an NFL team before some of his peers even retire. And even if Oâ€™Connell doesnâ€™t land a head coaching gig in 2022, this could still be his last season with the Los Angeles Rams.\r\n\r\nAs reported this week, the Denver Broncos have requested to interview Oâ€™Connell for their vacant head coaching position. But since Oâ€™Connell does not have play calling duties on gameday, the Broncos or any other team could also hire him to be their offensive coordinator and thereâ€™s nothing that Sean McVay could do to block him from leavingâ€”just as Shane Waldron exited for the Seattle Seahawksâ€™ OC job last year. The Broncos could be interested in Oâ€™Connell as either a head coach or an offensive coordinator for the person who they choose to hire as head coach instead of him.\r\n\r\nIf Denver passes on the former quarterback and Washington Footballâ€™s offensive coordinator in 2019, the Carolina Panthers would like a word. It was also reported this week that the Panthers like Oâ€™Connell for their vacant offensive coordinator position under Matt Rhule.', 1, 1, '2022-01-14 09:47:21', 0),
(14, 'Rams launch official auction site with proceeds to support community outreach programs/The Los Angeles Rams have launched Rams Auctions, an official auction site where fans can bid on Rams memorabilia, game-worn gear, autographed items and more. All proceeds from the auction sales and donations will benefit the Los Angeles Rams Foundation in support of the team\'s community outreach programs. Fans can submit bids for auction items as well as receive notifications and confirmations via text using their mobile device. Fans may visit www.therams.com/auctions to bid on unique items in support of the community.\r\n\r\nTo kick off bidding at Rams Auctions, fans have a chance to bid on a replica of the Knot Standard suit designed by rookie Running Back CAM AKERS that he wore to his NFL debut at SoFi Stadium before the Rams beat the Cowboys in primetime, as well as a personal fitting experience. Throughout the 2020 NFL season, several Rams players will design their own custom Knot Standard suits to wear for their arrivals to SoFi Stadium on gamedays and each replica suit will be available at Rams Auctions. Working with St Joseph Center, net proceeds from the replica suit auction sales will be used to create suits for individuals who are re-entering the workforce.\r\n\r\nFans can also purchase merchandise from Quarterback JARED GOFF\'s apparel company JG16 at the site. Proceeds from JG16 merchandise sales will be matched by Goff and directly benefit Inglewood Unified School District. \r\n\r\nThe site also features Watts Rams gear for purchase. The Watts Rams is a youth football program created by LAPD officers from the Southeast Division that was adopted by the Rams in 2019. The Rams fund all football components of the Watts Rams program, including uniforms and equipment. Throughout the year, the Rams provide engagement opportunities with current players and develop joint programs that focus on character development and community service.\r\n\r\n', 1, 4, '2022-01-14 09:48:20', 0),
(15, 'RAMS â€“ 49ERS (24-27) : SAN FRANCISCO ARRACHE LES PLAYOFFS AU BOUT DU SUSPENSE !/Quel match ! Dans une rencontre pleine de rebondissements, les 49ers Ã©taient menÃ©s de 17 points au bout de 25 minutes de jeu, puis de 7 points Ã  1 minute 30 de la fin mais ils sont toujours revenus pour sâ€™imposer finalement au bout de la prolongation.\r\n\r\nA une minute 30 de la fin de celle-ci, les 49ers menaient de 3 points grÃ¢ce Ã  un fied goal lorsque Matthew Stafford a cherchÃ© Odell Beckham Jr. loin sur sa droite. Le jeune Ambry Thomas a bien lu la trajectoire de la balle trop courte, donnant la victoire de son Ã©quipe. San Francisco inflige ainsi une sixiÃ¨me dÃ©faite dâ€™affilÃ©e aux Rams en face Ã  face et file en playoffs au nez et Ã  la barbe des Saints.\r\nRien dans la premiÃ¨re mi-temps ne laissait envisager un pareil rÃ©sultat. AprÃ¨s 5 dÃ©faites dâ€™affilÃ©e face aux 49ers, les Rams en ont assez, et les deux premiers quart-temps sont un carnage. En dÃ©fense, Jimmy Garoppolo (23:32, 316 yards, 1 TD, 2 interceptions) est assiÃ©gÃ© et le jeu de course inexistant. RÃ©sultat, il faut attendre le milieu de deuxiÃ¨me quart-temps pour que San Francisco dÃ©passe le yard effectif et le total de 1 first down obtenu.\r\n\r\nEn face, les Rams nâ€™ont pas fait de politesse, et si la dÃ©fense des Niners retient le jeu de course, Matthew Stafford  (21:32, 218 yards, 3 TD, 2 interceptions) commence par un 9 sur 9. AprÃ¨s un field goal pour ouvrir le score (3-0), Tyler Higbee a signÃ© un doublÃ©, dâ€™abord sur une play action astucieuse en en 4&1 sur les 2 yards (10-0), puis sur une passe de 16 yards sur une drive dÃ©marrÃ© sur les 20 yards adverses grÃ¢ce Ã  un retour de punt de 31 yards de Brandon Powell (17-0).\r\nAvec cet Ã©tat du match, lâ€™interception lancÃ©e par Jimmy Garoppolo sur une pression de Leonard Floyd Ã  5 minutes de la pause semblait devoir sceller le sort du match, mais les Rams nâ€™en ont rien fait, et les 49ers se sont miraculeusement rÃ©veillÃ©s. Ils signent un bon drive rapide avant la pause pour se mettre dans le match (17-3) puis au retour des vestiaires deux touchdowns coup sur coup pour dÃ©buter la mi-temps. Garoppolo est prÃ©cis, mais câ€™est Deebo Samuel (1 TD Ã  la passe, 8 courses pour 45 yards et 1 TD, 4 rÃ©ceptions pour 95 yards) qui prend les choses en main littÃ©ralement. Sur le premier, il transperce la dÃ©fense sur 16 yards (17-10), et sur le deuxiÃ¨me, câ€™est lui qui trouve Jauan Jennings pour lâ€™Ã©galisation express (17-17).\r\n\r\nLa dÃ©fense des 49ers fait aussi des siennes. AprÃ¨s avoir forcÃ© les Rams Ã  leur premier 3 and out entre les deux touchdowns, elle rÃ©alise une interception par le biais dâ€™Emmanuel Moseley sur ses 35 yards. Stafford est constamment sous pression et les Rams nâ€™obtiennent quâ€™un seul first down en deuxiÃ¨me mi-temps avant sept derniÃ¨res minutes complÃ¨tement irrÃ©elles.\r\n7 minutes Ã  jouer dans le quatriÃ¨me quart-temps, 17 partout, et les 49ers espÃ¨rent passer devant aprÃ¨s avoir remontÃ© 17 points de retard. Sous pression, Jimmy Garoppolo lance une passe risquÃ©e Ã  un endroit couvert par plusieurs dÃ©fenseurs, et notamment le All-Pro Jalen Ramsey. La passe est dÃ©tournÃ©e deux fois, mais le cornerback sâ€™en empare dans un exercice dâ€™acrobatie impressionnant.\r\n\r\nLâ€™interception relance son Ã©quipe en difficultÃ©. Cooper Kupp signe deux rÃ©ceptions, de 30 yards puis surtout de 4 yards pour le touchdown (24-17). Un sack de Von Miller plus tard, et San Francisco a un pied dehorsâ€¦.\r\n\r\nSauf que non. Les 49ers sâ€™offrent une deuxiÃ¨me chance grÃ¢ce Ã  un 3 and out, et Garropolo se rattrape. Implacable, Jimmy G remonte le terrain et peut compter sur Deebo Samuel. Une rÃ©ception de 43 yards plus tard, les 49ers frappent Ã  la porte des Rams, et Juan Jennings conclue sur 14 yards pour son deuxiÃ¨me touchdown du soir.\r\nLes 49ers obtiennent le ballon, et descendent le terrain grÃ¢ce notamment Ã  deux conversions de troisiÃ¨me tentative par Jennings. Ils bloquent en redzone, mais marquent tout de mÃªme un field goal (24-27). DerriÃ¨re, on les voit dÃ©jÃ  vainqueurs quand les Rams ne transforment pas une troisiÃ¨me tentative, mais une interfÃ©rence sur Cooper Kupp est sifflÃ©e. Câ€™est finalement Ambry Thomas qui apporte la dÃ©livrance, sur une passe trop courte de Matthew Stafford, diminuÃ© par une douleur Ã  la jambe en fin de match.\r\n\r\nLa victoire hÃ©roÃ¯que des 49ers (les Rams Ã©taient Ã  43-0 sous McVay en menant Ã  la mi-temps) leur offre le droit dâ€™aller Ã  Dallas en Wild Card. Les Rams gagnent eux la NFC Ouest grÃ¢ce Ã  la dÃ©faite des Cards, qu Â»ils recevront la semaine prochaine au premier tour des playoffs.', 1, 5, '2022-01-14 09:55:33', 0),
(16, 'hukjjjjjjjjjjjjjjjjj/yttttttttttttttttttt', 1, 2, '2022-01-14 10:03:06', 0),
(17, 'j,,,,,,,,,,,,,,,/ghhhhhhhhhhhhh', 1, 1, '2022-01-14 10:03:16', 0),
(18, 'dfdfdfdf/dfdfdfdfdfdf', 6, 2, '2022-01-18 08:17:45', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Transferts'),
(2, 'Resultat'),
(3, 'Blessures'),
(4, 'Charity'),
(5, 'Playoff');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(2, 'Le premier com/je suis un com', 1, 1, '2021-11-25 13:49:40'),
(3, 'Juste un test/gchjtyduyduty', 2, 3, '2021-12-29 12:46:46'),
(4, 'le premier event/voici mon premier com', 1, 1, '2022-01-04 09:33:50'),
(5, 'le premier event/voici mon premier com', 1, 1, '2022-01-04 09:37:02'),
(8, 'mon com/ok c\'est mon com', 9, 1, '2022-01-12 15:05:56'),
(7, 'voici un titre/un petit com pour test', 1, 1, '2022-01-04 09:45:17');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'moderateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`, `active`) VALUES
(1, 'admin', '$2y$10$aWcAsGs98SgP8b8CINdc9ejHviVBdG7xQYp9Tr/qYJvXeWcNPYiLW', 'test', 1337, 0),
(2, 'koobiak', '$2y$10$VESleANbtFrmOFH5tD9CP.GyHz6AeH8nOXJPavOazzBqfr9C2I9Je', 'yoni.darmon@gmail.com', 42, 0),
(4, 'test', '$2y$10$sDx8Mb81A.iI21AbuHO46.UhI.XtduFi7iSJzJuEwftT0BcD/IDcW', 'test', 1, 0),
(5, 'Emilie', '$2y$10$WTP2EmtzYff/VFb8wTHou.8wzwdiKYo2hbSVGwYN9l.jvKMH1ExlS', 'emilie@emilie.io', 1, 1),
(3, 'LOL', 'lol', 'lol', 42, 1),
(6, 'aaa', '$2y$10$L.YSXNm4dbW6m4ipaNCcz.AOIkxmbHT1tLEeOfIArTpMosmckWYYi', 'aaa', 1337, 0),
(7, 'ttt', '$2y$10$E2yYyGeMwrqpPyz0X3IaoOCfreQR.h0qWBxZ1zvA0ZjjUz06iSoTe', 'ttt', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
