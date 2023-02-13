-- MySQL dump 10.13  Distrib 5.7.39, for osx11.0 (x86_64)
--
-- Host: 127.0.0.1    Database: SPDB
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
-- Table structure for table `System Loot`
--

DROP TABLE IF EXISTS `System Loot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `System Loot` (
  `id` int(3) NOT NULL,
  `Hostname` varchar(50) NOT NULL,
  `OSname` varchar(50) NOT NULL,
  `OSversion` varchar(50) NOT NULL,
  `OSmanufacturer` varchar(50) NOT NULL,
  `OSconfiguration` varchar(50) NOT NULL,
  `OSbuildtype` varchar(50) NOT NULL,
  `RegisteredOwner` varchar(50) NOT NULL,
  `RegisteredOrganization` varchar(60) NOT NULL,
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
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Host Name` (`Hostname`),
  UNIQUE KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `System Loot`
--

LOCK TABLES `System Loot` WRITE;
/*!40000 ALTER TABLE `System Loot` DISABLE KEYS */;
INSERT INTO `System Loot` VALUES (1,'GEORGESALAYD4D2','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA273','2022-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys',' WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(2,'GEORGESALAYD4D3','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA274','2023-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys','WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(3,'GEORGESALAYD4D4','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA275','2023-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys','WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(4,'GEORGESALAYD4D5','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA276','2023-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys','WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.'),(5,'GEORGESALAYD4D6','Microsoft Windows 11 Home','10.0.22000 N/A Build 22000','Microsoft Corporation','Standalone Workstation','Multiprocessor Free','George Salayka','NYIT','00326-10000-00000-AA277','2023-07-07 23:44:04','2023-07-02 20:14:20','Parallels International GmbH.',' Parallels ARM Virtual Machine',' ARM64-based PC','{\"CPUS\": [\"ARMv8 (64-bit) Family 8 Model 0 Revision 0 ~2800 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3000 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3100 Mhz\", \"ARMv8 (64-bit) Family 8 Model 0 Revision  0  ~3300 Mhz\"], \"Count\": \"4 processor(s) Installed\"}',' Parallels International GmbH. 18.1.1 (53328), 1/1/1601',' C:\\Windows','C:\\Windows\\system32','\\Device\\HarddiskVolume2','en-us;English (United States)','en-us;English (United States)','(UTC-05:00) Indiana (East)','8,187 MB','5,046 MB','9,467 MB','6,427 MB','3,040 MB','C:\\pagefile.sys','WORKGROUP',' \\\\GEORGESALAYD4D9','{\"Count\": \"5 Hotfix(s) Installed\", \"Hotfixes\": [\"KB5020875\", \"KB5012170\", \"KB5022287\", \"KB5017850\", \"KB5019385\"]}','{\"Count\": \"1 NIC(s) Installed\", \"NetworkCards\": [\"10.211.55.3\", \"fe80::ef8c:2844:a4c9:fccd\", \"fdb2:2c26:f4e4:0:d985:1334:8b7b:5e59\", \"fdb2:2c26:f4e4:0:701b:11da:a003:f09a\"]}',' A hypervisor has been detected. Features required for Hyper-V will not be displayed.');
/*!40000 ALTER TABLE `System Loot` ENABLE KEYS */;
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
  UNIQUE KEY `U_id` (`U_id`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'bfuoco','$2y$10$aTi7x0/7E..ktRiu.M76WuBCraDV2hENP0A087UlPpXxp1EwY.Ce2');
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

-- Dump completed on 2023-02-13 16:01:20
