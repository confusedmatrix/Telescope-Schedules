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
  ('af74ovr6041qadttpi97la6191','','::1',1366467904),
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
  ('iquttncrgkbf5769k77avr5cf5','','::1',1366387822),
  ('pgj1fmoj09nl64fq2r7ildee74','','::1',1366388132),
  ('8te57fl247t9eocseou7p2l7m6','','::1',1366388251),
  ('mnr6cloa2n9vj1l5be994gg6a1','','::1',1366388370),
  ('58jtgkjq5spm6rhcju3l67joj4','','::1',1366388370),
  ('901ot1jmi2433is19lk2u4mat0','','::1',1366388377),
  ('12maqpujmttilkpig0a9rqfbn2','','::1',1366388382),
  ('70b7a8a2if4msl4iae3coejfb3','','::1',1366388846),
  ('tfmtncmnbg1b5nvouhpd9eudp2','','::1',1366388849),
  ('00t520ut2p9rg9fd7pseprfpr5','','::1',1366388853),
  ('2ttbhkc2bnp7p9kqd3ft7kmio1','','::1',1366388855),
  ('cir4c8rube1pbme9j8ahitemm3','','::1',1366388858),
  ('fpddg5jvkqmmk058qbgf3j11o3','','::1',1366388861),
  ('m51nqah6cgfeitkht1oqcp11i4','','::1',1366388864),
  ('pqrk6cltvd88pubotbof1ilpg0','','::1',1366388866),
  ('08detcj02pa9c6ic7b4o4rnsr7','','::1',1366388869),
  ('3u69slia34d9ebd4d36907b0n2','','::1',1366389089),
  ('7nu67kcaos93kl36bpk6qapmt0','','::1',1366389105),
  ('1he0ukhbnr0mtgaf49vt8kisv4','','::1',1366408079),
  ('270138t1jvtooq2pgtjicrtmn5','','::1',1366408095),
  ('lcod9vruh7r3mo6o3kdspb2ki4','','::1',1366408254),
  ('ahmppcfnrhldtbop5i8g34q7o1','','::1',1366408803),
  ('srbnl6o9c0bkvc1s16ltfkasa6','','::1',1366408816),
  ('rjppkl4lar5rhjdv9im7lohjb5','','::1',1366408854),
  ('l9ktr15ie6gakf7jn6401i5vq2','','::1',1366408891),
  ('gkk0ea40o73asu54cdcil15oq7','','::1',1366408901),
  ('viaksbut8palccnga15bvbj223','','::1',1366408908),
  ('0igv6t26og2fbfa1knvnpa1401','','::1',1366408930),
  ('j4qbr4cfdjfcufq3c4nvdlnlo7','','::1',1366408950),
  ('rplmhim63vkkf1339cip554da4','','::1',1366408965),
  ('ah6sfusu20gnopvhl38bj6oep4','','::1',1366408990),
  ('t9il1lc5elibjfc5cp1qfo76e4','','::1',1366409011),
  ('ospvqni7096r9sbk7kck5a6vj0','','::1',1366409028),
  ('u5udcfnlga8sfhqiqiuai17rg3','','::1',1366409080),
  ('359g83csu628ip6jq0hi08q383','','::1',1366409092),
  ('j1tmonjkuuk2dqi5t8b0s5gdd7','','::1',1366409111),
  ('395rpp32co6i4auisjl8ksp080','','::1',1366409259),
  ('gii6gqh3o55k4pfm3md50s1rj1','','::1',1366409293),
  ('4b0pi69ml6bsj9mohsenmfhti5','','::1',1366409324),
  ('2vkkg5ul2q1mf756m0bmfqr4d3','','::1',1366409350),
  ('oprvt7sor2dv0n0ef790h5kq51','','::1',1366409362),
  ('jkt9gdeu107pvii2nf3e0jd9n2','','::1',1366409386),
  ('18kft8oldkg4pblhob0td76th1','','::1',1366409552),
  ('up4le606gqa1r65jorgm38afr4','','::1',1366409566),
  ('0ftipfdbrffokd5ig4lj1o9vi4','','::1',1366409584),
  ('cp2lvhupnerg81eqfsrri2v3m5','','::1',1366409612),
  ('rlnlq5m4ggv7fs63aicikhcbg5','','::1',1366409897),
  ('abd0rk4iat8rekk80ip2c8cf85','','::1',1366410237),
  ('6gmoignpdu784eoi15kfb83672','','::1',1366410319),
  ('os82nqn839kui3ojg1uks2h3f1','','::1',1366410330),
  ('b29555qnnhv2rr7j70q5bacpj3','','::1',1366410356),
  ('m7ipa57mqam4j8uicm605cf253','','::1',1366410411),
  ('gf040h07lpo5ueb5dmln3flek4','','::1',1366410422),
  ('5m2m3dtj455a1e4mjlhn9adke6','','::1',1366410583),
  ('fon37ajm10skf45ebskm30ddu2','','::1',1366410648),
  ('6hoodtnovpj8kf6viia0cdcbe4','','::1',1366410674),
  ('pelg49v2euojled4gjg3s610q5','','::1',1366410697),
  ('uc20h9nuqtud8h4ul9rueunlc3','','::1',1366410752),
  ('0rm466t9vj8uok63nifbjdqi15','','::1',1366410813),
  ('cm7g21sifvvdrud1varefuu867','','::1',1366410829),
  ('mpd9th7vorn5tjs53fn84hrle6','','::1',1366410854),
  ('chv235k73s6092q9aqvi4q02r4','','::1',1366410868),
  ('ov2osicvsq26tp59os11css1q0','','::1',1366410948),
  ('mmq7qahnoohgrieheb0tbjsdh5','','::1',1366411062),
  ('eolo73s2es5qnnv9l7jbu7p8v1','','::1',1366411121),
  ('c2shcirv2c9jlj2jet6kj6tfi6','','::1',1366411136),
  ('7k4ske1srhc6ek1le26uj4frb4','','::1',1366411385),
  ('uish3cda1e23p8atkthjb41hk6','','::1',1366411481),
  ('h63drlq9gcic03p248jcdo30l5','','::1',1366411496),
  ('cub5him5mqv86pgaa1rhl9jft1','','::1',1366411647),
  ('4mr5ctpgil51061qkbr8aevbe7','','::1',1366411665),
  ('2aj90loptftg90m4vh5stfm0u7','','::1',1366411759),
  ('g1b8hh124d9i4mh2jmi322hbi1','','::1',1366411909),
  ('01vilgnjipq9uffplld2tsfm20','','::1',1366412063),
  ('3c5j76jcuep9ugmtt48sof40r7','','::1',1366412075),
  ('6cgcpa468p3r1ju5c0aot4dh92','','::1',1366412091),
  ('lvi0pek8s673l2v89ab12ogk92','','::1',1366412311),
  ('mdnqvkl2lmoqaar8t8jmvmpug7','','::1',1366412380),
  ('d1v2j25a3rucg6f4r5vjgt9ti3','','::1',1366412427),
  ('li5kkbneup76naclug1i4vs5s5','','::1',1366412668),
  ('9685cp2f04nih9098m67tnkh14','','::1',1366412687),
  ('2r4v0guaemdves9ttgfp2r2e63','','::1',1366412702),
  ('jilbj6e7q4rj2qq07eq2f8pb80','','::1',1366412712),
  ('q7r5otl6h8nsd7ul1sfiaoj592','','::1',1366412767),
  ('27vm364olke6r34kbhfaknb872','','::1',1366412847),
  ('po88an249n9c820ks3520c9i03','','::1',1366412969),
  ('mrh9r5gcmp1o812m1ho8tbstk6','','::1',1366412996),
  ('15rjqumq05v6gkc83ko76n4a91','','::1',1366413076),
  ('9uo6j1f5j798qsf1u7gi27ts93','','::1',1366413142),
  ('foi89lroicpqm6obejjbhpu482','','::1',1366413215),
  ('16e82fpp0m3r1jp14ormd635a2','','::1',1366413324),
  ('264n10kp34qemh17udarq3nkg5','','::1',1366413367),
  ('u2mgj7sfhh293p5k0eqp86vsc5','','::1',1366413410),
  ('v19blpb0gdtdfkalo12er8pol7','','::1',1366414192),
  ('cu338qdqrnrrcfp76vt03ds0b6','','::1',1366414225),
  ('3traql5a9d1s7mughe2e0ng1n2','','::1',1366414266),
  ('ckcfu082rbqrer2r5684jiv5o6','','::1',1366414303),
  ('agcfi5ehotbkj6543dh5h4jvs2','','::1',1366414364),
  ('d8oqngo70doqk89p7tqiog6oe1','','::1',1366414410),
  ('fiffqsg6odk5ftr08jtc2mhkn7','','::1',1366414535),
  ('autoudfg0ekm64b5sagnojq1d4','','::1',1366414570),
  ('a1a01140f24sjl148efmuc2hr0','','::1',1366414635),
  ('nh3avjpmmjtpjs9j7vdkkr1p75','','::1',1366414707),
  ('msh15eujdldc9qdsiqptgmug44','','::1',1366414734),
  ('ifl8j64c71ika4a66pniebpr16','','::1',1366414879),
  ('rk3dv83pe21olb4vulflpj8j73','','::1',1366415187),
  ('c434d62vssge350b5fpp372g24','','::1',1366450882),
  ('t4cb6pdavtfeeig2m0oi1ra4u1','','::1',1366451273),
  ('1gtogjmfpaur9c76m05lvaf9q4','','::1',1366451294),
  ('8o7p0f54o7refvanicpfvdvr96','','::1',1366451721),
  ('4qj6hffgoi9olnrkda7kt99rh6','','::1',1366452427),
  ('ab8cmvgjqiigl0fpcjjps4s025','','::1',1366452475),
  ('qf1gdl80j0gphj7h7recuk2g52','','::1',1366452529),
  ('j74alm3j4ghgus8ac2209a14l6','','::1',1366452601),
  ('bgvebjqidfk99ugm1u73kia1i2','','::1',1366452611),
  ('pu8u0uoful5os804kbr31olad1','','::1',1366452668),
  ('3s4s0uvp5tfb6g4jue7cmg5jb5','','::1',1366452683),
  ('ub73v38robfl6i7e1abgibcdj7','','::1',1366452692),
  ('fjmkcq7j9n3q9eqhoa0kdip5h5','','::1',1366452762),
  ('tphq644uv60rnppkvs4pdcjv66','','::1',1366452818),
  ('npe88u3q2ief1apv3os1jsbjl2','','::1',1366452826),
  ('6vonr2cjrq9d6jmj4d4f9buum5','','::1',1366452868),
  ('4gd3jeg5q9h43strev8tkiavk3','','::1',1366452923),
  ('ja8o71nh3v5d6dh4hq56ehlo33','','::1',1366453527),
  ('jek4f1m0o0b2mnj8e77f6dht80','','::1',1366453596),
  ('pikqf2ir6pkjfmrdosc3o0rct5','','::1',1366453599),
  ('csu3gqspfptts9nb21kgdmshf6','','::1',1366453845),
  ('kcknqchhc8s07l3snt2k8jg5l6','','::1',1366453857),
  ('ovkts1lrv5sj12hr5nsi19itd4','','::1',1366453959),
  ('e1rlbv9vh0kr2ir56apccq2kl4','','::1',1366454010),
  ('80u1cf5i10116ubcl4uucoipg0','','::1',1366454150),
  ('kroml4c74kijtg1tfum2eaq822','','::1',1366454184),
  ('v4ku4urlva9p8nj246v9tsnh24','','::1',1366454843),
  ('ois6hbc309n15hg5ejukd1d720','','::1',1366454849),
  ('93tdifqds2emrk4ud3hkno0r80','','::1',1366454863),
  ('brrjqqcjvnd0s3er5ek7c8seh4','','::1',1366454897),
  ('a7jt7ac2ip2osb54941abcr8n0','','::1',1366454898),
  ('tmb3m55k2rcl5nfreet5sup965','','::1',1366454917),
  ('ivtlj2edt7htdu38th1o6pbot4','','::1',1366454936),
  ('4d9srlvbrfv0ehc7gslho8u721','','::1',1366454955),
  ('7pe56hd9uso967teo8dmvmakr7','','::1',1366454977),
  ('7t4n1pfsq6jjah74s07ifpec16','','::1',1366454981),
  ('1rupm99vm43gejpsjs2l611514','','::1',1366455026),
  ('85ebjn6venfie96iplubnutev6','','::1',1366455127),
  ('l4i9qmhiv3dnfjdptustf6p636','','::1',1366455129),
  ('2uvr71nogb0u2df1lui3vbn7q4','','::1',1366455130),
  ('4v3i6nqgsnq3kh3jg3l98b5kd3','','::1',1366455130),
  ('775353rgdrk45moebj7gs3rhf0','','::1',1366455131),
  ('tl3uiutm5frpg5uj8dabejl207','','::1',1366455146),
  ('o0i9bs2rp8gjnf1oqq3kl5p8d6','','::1',1366455196),
  ('09dp3ieg752gsdhr8j52c146m4','','::1',1366455209),
  ('8s0f8bjono28se9gp6i9i4r9l4','','::1',1366455235),
  ('1iu334n1qjgaqahpt8ouun92v3','','::1',1366455247),
  ('rnhdp3fo2p3mfo0ekglrheudd1','','::1',1366455255),
  ('brl89kdh2t5ege9553ptiu5he6','','::1',1366455338),
  ('kqffigk19neef7nbrvcbhrcta2','','::1',1366455343),
  ('ghfo4fmdo10vbsvra836vrq5c4','','::1',1366455443),
  ('5sp6u61ai2iksqn3tjj8uuhma2','','::1',1366455531),
  ('6ppcmf41bs8jlg4v8tmkecadj3','','::1',1366455533),
  ('9eu87n5u61q1oqmmppoe7q3on2','','::1',1366455533),
  ('sf1u1s51t6p61v5fublb9d6733','','::1',1366455588),
  ('79g3rs000ddteec10iu9m7j4r0','','::1',1366455625),
  ('naf4aeahddk0cn0ih2ebkvsrd2','','::1',1366455626),
  ('h352jd06ubo1c0n2e4hrc740n7','','::1',1366455641),
  ('87h1krs50mdif4ib0m1qr2ngt2','','::1',1366461585),
  ('6hnmkatb470hlh0u21vnm8pta3','','::1',1366461639),
  ('08753kk5icmmohr9pjl17944o4','','::1',1366461681),
  ('e7n1ro3bj1rpp9j03o52596hj0','','::1',1366461869),
  ('h42bcftpu2rglfvj8u7up15hv2','','::1',1366462485),
  ('9qc6ko96mvjeoningq0680gsb4','','::1',1366462581),
  ('1cke8hnpcqtlctu3ai4od095o5','','::1',1366462584),
  ('6e9kqc69kbllgvksqg561g4s44','','::1',1366462598),
  ('1m6rffbdkvv8o7gp2uspms13p7','','::1',1366463141),
  ('g4kf52jhfag4ukqrskf8vd9dn0','','::1',1366463630),
  ('5d61i5j0eguer4jcfnl542e170','','::1',1366463770),
  ('6gp29653q29hbj2uikeckvdrj6','','::1',1366463983),
  ('c9u94c3rdp1tb0qvov6h19np47','','::1',1366464377),
  ('0lrsu3c01l5e122dbemrsbrq25','','::1',1366464522),
  ('se1hhdih6vmqseng0hu1i014t7','','::1',1366464532),
  ('f4noohsmavlsklfdse1afdclu5','','::1',1366464545),
  ('brr9vrf4hho0ados9jlup5esg0','','::1',1366464576),
  ('qleiivf6m8sfi7l9o40mvqv700','','::1',1366464594),
  ('67au113gvor64gc01bncd1h7f2','','::1',1366464777),
  ('p44p7mkl4cevsebst92psg11i5','','::1',1366464818),
  ('eqv94lgrugluos6i4g1ma5ars4','','::1',1366465195),
  ('docqm36a4b8cc758auprq8lo45','','::1',1366465245),
  ('etpnb07s2nlbcse1q2sjpjk3v3','','::1',1366465286),
  ('3e38b3llgvrab7k04qom6as4t1','','::1',1366467232),
  ('k6ptg25vso974pbmju2prhcvt7','','::1',1366467282),
  ('lge3haql6binjn15pjp5sovr05','','::1',1366467297),
  ('r3mpkmfi6sd0je229s6333udi2','','::1',1366467300),
  ('69lblrs3iet64h7ej78906hs31','','::1',1366467313),
  ('janiea7h9gu0gsqo6jpjhgem46','','::1',1366467738),
  ('hdabuk5ocv4r9tpd21l6j0q4j3','','::1',1366467908);

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
