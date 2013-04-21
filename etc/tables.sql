/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `session_id` varchar(32) NOT NULL,
  `session_data` text,
  `session_ip` varchar(255) NOT NULL,
  `session_timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table telescope_events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `telescope_events`;

CREATE TABLE `telescope_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `telescope_id` int(11) DEFAULT NULL,
  `batch` varchar(16) DEFAULT NULL,
  `obs_id` varchar(16) DEFAULT NULL,
  `obs_target` varchar(256) DEFAULT NULL,
  `start` int(11) DEFAULT NULL,
  `end` int(11) DEFAULT NULL,
  `obs_ra` varchar(16) DEFAULT NULL,
  `obs_decl` varchar(16) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table telescopes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `telescopes`;

CREATE TABLE `telescopes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `agency` varchar(32) DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  `wavelengths` varchar(32) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `class_name` varchar(64) DEFAULT NULL,
  `last_batch` varchar(16) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `telescopes` WRITE;
/*!40000 ALTER TABLE `telescopes` DISABLE KEYS */;

INSERT INTO `telescopes` (`id`, `name`, `agency`, `type`, `wavelengths`, `url`, `class_name`, `last_batch`, `status`, `timestamp`)
VALUES
  (1,'Fermi','NASA','space','gamma','http://fermi.gsfc.nasa.gov/','FermiTelescope',NULL,1,0),
  (2,'INTEGRAL','ESA','space','gamma,x-ray','http://sci.esa.int/integral/','INTEGRALTelescope',NULL,1,0),
  (3,'Swift','NASA','space','gamma,x-ray,uv,visible','http://swift.gsfc.nasa.gov/','SwiftTelescope',NULL,1,0),
  (4,'Chandra','NASA','space','x-ray','http://chandra.harvard.edu/','ChandraTelescope',NULL,0,0),
  (5,'NuStar','NASA','space','x-ray','http://www.nustar.caltech.edu/','NuStarTelescope',NULL,1,0),
  (6,'Suzaku','JAXA/NASA','space','x-ray','http://www.astro.isas.jaxa.jp/suzaku/','SuzukuTelescope',NULL,1,0),
  (7,'XMM-Newton','ESA','space','x-ray','http://xmm.esac.esa.int/','XMMNewtonTelescope',NULL,1,0),
  (8,'Hubble','NASA/ESA','space','uv,visible','http://www.spacetelescope.org/','HubbleTelescope',NULL,0,0),
  (9,'Herschel','NASA/ESA','space','infrared','http://herschel.esac.esa.int/','HerschelTelescope',NULL,1,0),
  (10,'Spitzer','NASA','space','infrared','http://www.spitzer.caltech.edu/','SpitzerTelescope',NULL,0,0);

/*!40000 ALTER TABLE `telescopes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
