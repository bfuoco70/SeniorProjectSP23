<?php
require_once("../Database.php");
$Filename = "../loot.txt";
$lines = file($Filename);
$data = array();
$dataArrayExperssion = "/\[[0-9][0-9]\]/i";
for($i=0;$i<count($lines);$i++)
{
//    echo "working on $lines[$i]";
    $tokens = explode(":  ", $lines[$i]);
    $key = $tokens[0];
    if($key=="Processor(s)")
    {
        $procarry = array();
        $procarry[] = trim($tokens[1]);
        $procCount = (int)$tokens[1];
        for($procs = 1 ;$procs <= $procCount; $procs++)
        {
            $nextLine = trim($lines[$i+$procs]);
            $procarry[]=$nextLine;
        }
        $data[$key] = $procarry;
        $i+=$procCount;
    }
    else if($key=="Hotfix(s)")
    {
        $hotFixArry = array();
        $hotFixArry[] = trim($tokens[1]);
        $hotFixCount = (int)$tokens[1];
        for($fixes =1;$fixes<=$hotFixCount; $fixes++)
        {
            $nextline=trim($lines[$i+$fixes]);
            $hotFixArry[] = $nextline;
        }
        $data[$key] = $hotFixArry;
        $i+=$hotFixCount;
    }
    else if($key=="Network Card(s)")
    {
//        echo "Handling Network Entries...";
        $nicArray = array();
        $nicArray[]=trim($tokens[1]);
        $nicEntryLine =1;
        $nextNicLine = trim($lines[$i+$nicEntryLine]);
//        echo "Reading First Nic Line: $nextNicLine";
        while(strpos($nextNicLine, "Hyper-V")===false)
        {
//            echo "Adding line to array.";
            $nicArray[] = $nextNicLine;
            $nicEntryLine++;
            $nextNicLine = trim($lines[$i+$nicEntryLine]);
//            echo "Next line read: $nextNicLine";
        }
        $data[$key] = $nicArray;
        $i+=$nicEntryLine-1;
    }
    else{
        if(isset($tokens[1]))
        {
            $item= trim($tokens[1]);
            $data[$key] = $item;
        }
    }
}
//foreach($data as $key=>$value)
//{
//    if(is_array($value))
//    {
//        echo "$key =>";
//        foreach($value as $item)
//        {
//            echo "$item\n";
//        }
//    }
//    else{
//        echo "$key => $value\n";
//    }
//
//}

$pdo = getDB();
//TODO: Create variables from each item in the $data array

//Here We make variables to store the values from the loot file and stored into the database
$HOSTNAME = $data['Hostname'];
$OSNAME= $data['OSname'];
$OSVERSION = $data['OSversion'];
$OSMANUFACTURER = $data['OSmanufacturer'];
$OSCONFIG = $data['OSconfiguration'];
$OSBUILDTYPE = $data['OSbuildtype'];
$REGISTEREDOWNER = $data['RegisteredOwner'];
$REGISTEREDORG = $data['RegisteredOrganization'];
$PRODUCTID = $data['ProductID'];
$ORIGINSTALLDATE = $data['OriginalInstallDate'];
$SYSTEMBOOTTIME = $data['SystemBootTime'];
$SYSTEMMANUFACTURER = $data['SystemManufacturer'];
$SYSTEMMODEL = $data['SystemModel'];
$SYSTEMTYPE = $data['SystemType'];
$PROCESSORS = $data['`Processor(s)`'];
$BIOSVERSION = $data['BiosVersion'];
$WINDOWSDIR = $data['WindowsDirectory'];
$SYSTEMDIR = $data['SystemDirectory'];
$BOOTDEVICE = $data['BootDevice'];
$SYSTEMLOCALE = $data['SystemLocale'];
$INPUTLOCALE = $data['InputLocale'];
$TIMEZONE = $data['TimeZone'];
$TOTALPHYSMEM = $data['TotalPhysicalMemory'];
$AVALPHYSICALMEM = $data['AvailablePhysicalMemory'];
$VIRTUALMEMMAXSIZE = $data['VirtualMemoryMaxSize'];
$VIRTUALMEMAVAL = $data['VirtualMemoryAvailable'];
$VIRTUALMEMINUSE = $data['VirtualMemoryInUse'];
$PAGEFILELOC = $data['`PageFileLocation(s)`'];
$DOMAIN = $data['Domain'];
$LOGONSERVER = $data['LogOnServer'];
$HOTFIXES = $data['`Hotfix(s)`'];
$NETWORKCARDS = $data['`NetworkCard(s)`'];
$HYPERVREQUIREMENTS = $data['HyperVRequirements'];

$query = "Insert into `System Loot` (Hostname, OSname, OSversion, OSmanufacturer, OSconfiguration, OSbuildtype, 
RegisteredOwner, RegisteredOrganization, ProductID, OriginalInstallDate, SystemBootTime, SystemManufacturer, 
SystemModel, SystemType, `Processor(s)`, BiosVersion, WindowsDirectory, SystemDirectory, BootDevice, 
SystemLocale, InputLocale, TimeZone, TotalPhysicalMemory, AvailablePhysicalMemory, VirtualMemoryMaxSize, 
VirtualMemoryAvailable, VirtualMemoryInUse, `PageFileLocation(s)`, Domain, 
LogOnServer, `Hotfix(s)`, `NetworkCard(s)`, HyperVRequirements)
values ($HOSTNAME, $OSNAME, $OSVERSION, $OSMANUFACTURER, $OSCONFIG, $OSBUILDTYPE, $REGISTEREDOWNER, $REGISTEREDORG, 
$PRODUCTID, $ORIGINSTALLDATE, $SYSTEMBOOTTIME, $SYSTEMMANUFACTURER, $SYSTEMMODEL, $SYSTEMTYPE, $PROCESSORS,
$BIOSVERSION, $WINDOWSDIR, $SYSTEMDIR, $BOOTDEVICE, $SYSTEMLOCALE, $INPUTLOCALE, $TIMEZONE, $TOTALPHYSMEM,
$AVALPHYSICALMEM, $VIRTUALMEMMAXSIZE, $VIRTUALMEMAVAL, $VIRTUALMEMINUSE, $PAGEFILELOC, $DOMAIN, $LOGONSERVER, 
$HOTFIXES, $NETWORKCARDS, $HYPERVREQUIREMENTS)"; //TODO: Add created variables to values statement
$stmt=$pdo->prepare($query);
$stmt->execute();
