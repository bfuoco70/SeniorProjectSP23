-- MySQL dump 10.13  Distrib 5.7.39, for osx11.0 (x86_64)
--
-- Host: 127.0.0.1    Database: spdb
-- ------------------------------------------------------
-- Server version	5.7.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Loot`
--

-- DROP TABLE IF EXISTS `Loot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Loot` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Hostname` varchar(50) NOT NULL,
  `OSname` varchar(50) NOT NULL,
  `OSversion` varchar(50) NOT NULL,
  `OSmanufacturer` varchar(50) NOT NULL,
  `OSconfiguration` varchar(50) NOT NULL,
  `OSbuildtype` varchar(50) NOT NULL,
  `RegisteredOwner` varchar(50) NOT NULL,
  `RegisteredOrganization` varchar(60) DEFAULT 'NONE',
  `ProductID` varchar(23) NOT NULL,
  `OriginalInstallDate` datetime NOT NULL,
  `SystemBootTime` datetime NOT NULL,
  `SystemManufacturer` varchar(50) NOT NULL,
  `SystemModel` varchar(50) NOT NULL,
  `SystemType` varchar(50) NOT NULL,
  `Processor(s)` json NOT NULL,
  `BiosVersion` varchar(100) NOT NULL,
  `WindowsDirectory` varchar(50) NOT NULL,
  `SystemDirectory` varchar(50) NOT NULL,
  `BootDevice` varchar(50) NOT NULL,
  `SystemLocale` varchar(50) NOT NULL,
  `InputLocale` varchar(50) NOT NULL,
  `TimeZone` varchar(50) NOT NULL,
  `TotalPhysicalMemory` varchar(50) NOT NULL,
  `AvailablePhysicalMemory` varchar(50) NOT NULL,
  `VirtualMemoryMaxSize` varchar(50) NOT NULL,
  `VirtualMemoryAvailable` varchar(50) NOT NULL,
  `VirtualMemoryInUse` varchar(50) NOT NULL,
  `PageFileLocation(s)` varchar(100) NOT NULL,
  `Domain` varchar(50) NOT NULL,
  `LogOnServer` varchar(50) NOT NULL,
  `Hotfix(s)` json NOT NULL,
  `NetworkCard(s)` json NOT NULL,
  `HyperVRequirements` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Loot`
--

LOCK TABLES `Loot` WRITE;
/*!40000 ALTER TABLE `Loot` DISABLE KEYS */;
INSERT INTO `Loot` VALUES (1,'GEORGESALAYD4D2','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA273','2022-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys',' WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(2,'GEORGESALAYD4D3','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA274','2023-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys','WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(3,'GEORGESALAYD4D4','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA275','2023-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys','WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(4,'GEORGESALAYD4D5','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA276','2023-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys','WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(5,'GEORGESALAYD4D6','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA277','2023-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys','WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(6,'WINTERHOME','Microsoft Windows 11 Pro','10.0.22621 N/A Build 22621','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','george.salayka@gmail.com','','00330-80000-00000-AA090','2022-10-25 14:38:11','2023-03-15 11:56:01','Default string','X670E Taichi','x64-based PC','[\"1 Processor(s) Installed.\", \"[01]: AMD64 Family 25 Model 97 Stepping 2 AuthenticAMD ~4501 Mhz\"]','American Megatrends International, LLC. 1.04, 9/6/2022','C:\\WINDOWS','C:\\WINDOWS\\system32','\\Device\\HarddiskVolume5','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Eastern Time (US & Canada)','31,865 MB','500 potatos','40,569 MB','Potato','17,425 MB','C:\\pagefile.sys','WORKGROUP','\\\\WINTERHOME','[\"5 Hotfix(s) Installed.\", \"[01]: KB5022497\", \"[02]: KB5012170\", \"[03]: KB5023706\", \"[04]: KB5022610\", \"[05]: KB5022948\"]','[\"6 NIC(s) Installed.\", \"[01]: Killer E3100G 2.5 Gigabit Ethernet Controller\", \"Connection Name: Ethernet 2\", \"DHCP Enabled:    Yes\", \"DHCP Server:     172.16.1.1\", \"IP address(es)\", \"[01]: 172.16.1.35\", \"[02]: fe80::b626:5e03:be1d:e3d0\", \"[03]: fdee:7ea6:e31a:6dd9:b507:aa33:dbcf:be58\", \"[04]: fdee:7ea6:e31a:6dd9:283e:be26:5ab8:fc36\", \"[02]: Killer(R) Wi-Fi 6E AX1675x 160MHz Wireless Network Adapter (210NGW)\", \"Connection Name: Wi-Fi 2\", \"Status:          Media disconnected\", \"[03]: VMware Virtual Ethernet Adapter for VMnet1\", \"Connection Name: VMware Network Adapter VMnet1\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.242.1\", \"[02]: fe80::4312:c817:ea78:484f\", \"[04]: VMware Virtual Ethernet Adapter for VMnet8\", \"Connection Name: VMware Network Adapter VMnet8\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.147.1\", \"[02]: fe80::c845:6547:5a9d:8225\", \"[05]: Bluetooth Device (Personal Area Network)\", \"Connection Name: Bluetooth Network Connection 2\", \"Status:          Media disconnected\", \"[06]: VirtualBox Host-Only Ethernet Adapter\", \"Connection Name: Ethernet 3\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.56.1\", \"[02]: fe80::d7bd:332e:e722:9e16\"]','A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(7,'WINTERHOME','Microsoft Windows 11 Pro','10.0.22621 N/A Build 22621','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','george.salayka@gmail.com','','00330-80000-00000-AA090','2022-10-25 14:38:11','2023-03-15 11:56:01','Default string','X670E Taichi','x64-based PC','[\"1 Processor(s) Installed.\", \"[01]: AMD64 Family 25 Model 97 Stepping 2 AuthenticAMD ~4501 Mhz\"]','American Megatrends International, LLC. 1.04, 9/6/2022','C:\\WINDOWS','C:\\WINDOWS\\system32','\\Device\\HarddiskVolume5','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Eastern Time (US & Canada)','31,865 MB','21,155 MB\n','40,569 MB','23,144 MB\n','17,425 MB','C:\\pagefile.sys','WORKGROUP','\\\\WINTERHOME','[\"5 Hotfix(s) Installed.\", \"[01]: KB5022497\", \"[02]: KB5012170\", \"[03]: KB5023706\", \"[04]: KB5022610\", \"[05]: KB5022948\"]','[\"6 NIC(s) Installed.\", \"[01]: Killer E3100G 2.5 Gigabit Ethernet Controller\", \"Connection Name: Ethernet 2\", \"DHCP Enabled:    Yes\", \"DHCP Server:     172.16.1.1\", \"IP address(es)\", \"[01]: 172.16.1.35\", \"[02]: fe80::b626:5e03:be1d:e3d0\", \"[03]: fdee:7ea6:e31a:6dd9:b507:aa33:dbcf:be58\", \"[04]: fdee:7ea6:e31a:6dd9:283e:be26:5ab8:fc36\", \"[02]: Killer(R) Wi-Fi 6E AX1675x 160MHz Wireless Network Adapter (210NGW)\", \"Connection Name: Wi-Fi 2\", \"Status:          Media disconnected\", \"[03]: VMware Virtual Ethernet Adapter for VMnet1\", \"Connection Name: VMware Network Adapter VMnet1\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.242.1\", \"[02]: fe80::4312:c817:ea78:484f\", \"[04]: VMware Virtual Ethernet Adapter for VMnet8\", \"Connection Name: VMware Network Adapter VMnet8\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.147.1\", \"[02]: fe80::c845:6547:5a9d:8225\", \"[05]: Bluetooth Device (Personal Area Network)\", \"Connection Name: Bluetooth Network Connection 2\", \"Status:          Media disconnected\", \"[06]: VirtualBox Host-Only Ethernet Adapter\", \"Connection Name: Ethernet 3\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.56.1\", \"[02]: fe80::d7bd:332e:e722:9e16\"]','A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(8,'WINTERHOME','Microsoft Windows 11 Pro','10.0.22621 N/A Build 22621','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','george.salayka@gmail.com','','00330-80000-00000-AA090','2022-10-25 14:38:11','2023-03-15 11:56:01','Default string','X670E Taichi','x64-based PC','[\"1 Processor(s) Installed.\", \"[01]: AMD64 Family 25 Model 97 Stepping 2 AuthenticAMD ~4501 Mhz\"]','American Megatrends International, LLC. 1.04, 9/6/2022','C:\\WINDOWS','C:\\WINDOWS\\system32','\\Device\\HarddiskVolume5','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Eastern Time (US & Canada)','31,865 MB','21,155 MB\n','40,569 MB','23,144 MB\n','17,425 MB','C:\\pagefile.sys','WORKGROUP','\\\\WINTERHOME','[\"5 Hotfix(s) Installed.\", \"[01]: KB5022497\", \"[02]: KB5012170\", \"[03]: KB5023706\", \"[04]: KB5022610\", \"[05]: KB5022948\"]','[\"6 NIC(s) Installed.\", \"[01]: Killer E3100G 2.5 Gigabit Ethernet Controller\", \"Connection Name: Ethernet 2\", \"DHCP Enabled:    Yes\", \"DHCP Server:     172.16.1.1\", \"IP address(es)\", \"[01]: 172.16.1.35\", \"[02]: fe80::b626:5e03:be1d:e3d0\", \"[03]: fdee:7ea6:e31a:6dd9:b507:aa33:dbcf:be58\", \"[04]: fdee:7ea6:e31a:6dd9:283e:be26:5ab8:fc36\", \"[02]: Killer(R) Wi-Fi 6E AX1675x 160MHz Wireless Network Adapter (210NGW)\", \"Connection Name: Wi-Fi 2\", \"Status:          Media disconnected\", \"[03]: VMware Virtual Ethernet Adapter for VMnet1\", \"Connection Name: VMware Network Adapter VMnet1\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.242.1\", \"[02]: fe80::4312:c817:ea78:484f\", \"[04]: VMware Virtual Ethernet Adapter for VMnet8\", \"Connection Name: VMware Network Adapter VMnet8\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.147.1\", \"[02]: fe80::c845:6547:5a9d:8225\", \"[05]: Bluetooth Device (Personal Area Network)\", \"Connection Name: Bluetooth Network Connection 2\", \"Status:          Media disconnected\", \"[06]: VirtualBox Host-Only Ethernet Adapter\", \"Connection Name: Ethernet 3\", \"DHCP Enabled:    No\", \"IP address(es)\", \"[01]: 192.168.56.1\", \"[02]: fe80::d7bd:332e:e722:9e16\"]','A hypervisor has been detected. Features required for Hyper-V will not be displayed.');
/*!40000 ALTER TABLE `Loot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `U_id` int(3) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `secret` varchar(30) DEFAULT NULL,
  `Is_admin` int(11) NOT NULL DEFAULT '0',
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `BackgroundColor` varchar(50) DEFAULT NULL,
  `Biography` varchar(300) DEFAULT NULL,
  `ProfileImg` varchar(200) DEFAULT NULL,
  `HeaderImg` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`U_id`),
  UNIQUE KEY `U_id` (`U_id`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'bfuoco@nyit.edu','$2y$10$BSrT.F7Vp9XjR6VrcugsLu8QXQj.BsKcRM6nlSi3F9PN9pG6BMwWS','SN4GN2G3QTHOBVXQ',1,'Benjamin','Fuoco','CarGuy','bf@nyit.edu','Green','Hello, My name is Benjamin Fuoco, I am a senior in computer science. My hobbies are hanging out, customizing cars and playing sports.','N/A','N/A'),(11,'madison.carney55@gmail.com','$2y$10$s1yxl8y1CMH9JBSV2r9hXOwlOGoSD16HhFyyeH4Qt4HgqTnfvxNSG','BXIE6Z7MSII66NZ5',0,'Madison','Carney','Ben\'s GF','Mads@LSU.orq',NULL,'I love horses, they just let me go out and explore the world. Engineering is cool too, I get to fix roads, one at a time!',NULL,NULL);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-27 19:59:07
