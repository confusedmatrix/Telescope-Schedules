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

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`session_id`, `session_data`, `session_ip`, `session_timestamp`)
VALUES
  ('af74ovr6041qadttpi97la6191','','::1',1366387821),
  ('jkb4e2dqk78hvusf6n6256l663','','::1',1366383357),
  ('4n312gehjhnivd5oh5m3oofhh5','','::1',1366383365),
  ('dvuviul2160nailhvaotcdj894','','::1',1366383415),
  ('0fjq23a363tdkslm28vqrgq4r4','','::1',1366383418),
  ('ouk6r4lopl6foa16rhjhdtjpf1','','::1',1366383421),
  ('v19dov6t1gd1go9c6i14omkkt1','','::1',1366383455),
  ('55jdm3pgi6piqtmahpv9kqr955','','::1',1366383495),
  ('040q4ba5pm0g1p9ooq4l95ogh1','','::1',1366383510),
  ('6uosik54ajr4m1cscodjdo8kg1','','::1',1366383542),
  ('a616kmvg63dgagmbh8lo3dbkn6','','::1',1366383565),
  ('77k9hsq97nu94m3je2bpoobhh1','','::1',1366383572),
  ('bf4a1kmqq33hklaspr1o5fvdh3','','::1',1366383612),
  ('t426m112ljbb7pktm6pgn8tj51','','::1',1366383659),
  ('cvnb9dnp962qunldg74t8tclq0','','::1',1366383806),
  ('0q4n7c6g3tu5gt6i8r0hkg9jo3','','::1',1366383935),
  ('su09mj398e17jnk827f2dg4st7','','::1',1366383977),
  ('k0g9dllmrm4sl6tj15f9tmto17','','::1',1366384091),
  ('nqmhe63hni3eah7fa41j0uf1d0','','::1',1366384111),
  ('ut2to5kqbf91730hgao5e2g004','','::1',1366384204),
  ('tg6jac1ncv24qsgp27iae1mos6','','::1',1366384212),
  ('v69n2caj6kikuhf4qrcb3u8l61','','::1',1366384241),
  ('kitf04g6bd80q7qffr8i9ck8s6','','::1',1366384866),
  ('0au0c99e87fq5c5g8seia0lg84','','::1',1366385479),
  ('j7f2frrm3q71gl5r7fdq4sqh71','','::1',1366386109),
  ('qndl3u3faep3e1gpge7m0kmh71','','::1',1366386357),
  ('kknbskupuahb3ounpenbc4qba3','','::1',1366386414),
  ('tufvmf0s3p9tsqpaqtkvgc80v1','','::1',1366386563),
  ('lf27pq16r12aesva1baf0m8pd6','','::1',1366386631),
  ('bkbf8fr2n0trhhre49gs7lvic3','','::1',1366387562),
  ('1lgb8vovsf02965vfpf4io6ki2','','::1',1366387656),
  ('o6u8f3d9d83n3k5ggiddmtnsn2','','::1',1366387806),
  ('iquttncrgkbf5769k77avr5cf5','','::1',1366387822);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table telescope_events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `telescope_events`;

CREATE TABLE `telescope_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `telescope_id` int(11) DEFAULT NULL,
  `batch` varchar(16) DEFAULT NULL,
  `obs_id` varchar(16) DEFAULT NULL,
  `obs_target` int(11) DEFAULT NULL,
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
  (4,'Chandra','NASA','space','x-ray','http://chandra.harvard.edu/','ChandraTelescope',NULL,1,0),
  (5,'NuStar','NASA','space','x-ray','http://www.nustar.caltech.edu/','NuStarTelescope',NULL,1,0),
  (6,'Suzaku','JAXA/NASA','space','x-ray','http://www.astro.isas.jaxa.jp/suzaku/','SuzukuTelescope',NULL,1,0),
  (7,'XMM-Newton','ESA','space','x-ray','http://xmm.esac.esa.int/','XMMNewtonTelescope',NULL,1,0),
  (8,'Hubble','NASA/ESA','space','uv,visible','http://www.spacetelescope.org/','HubbleTelescope',NULL,1,0),
  (9,'Herschel','NASA/ESA','space','infrared','http://herschel.esac.esa.int/','HerschelTelescope',NULL,1,0),
  (10,'Spitzer','NASA','space','infrared','http://www.spitzer.caltech.edu/','SpitzerTelescope',NULL,1,0);

/*!40000 ALTER TABLE `telescopes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
