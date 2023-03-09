<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'spdb');

function getMyDB()
{
    /* Attempt to connect to MySQL database */
    try {
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";port=8889;dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connection successful';
        return $pdo;
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }

}




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
foreach($data as $key=>$value)
{
    echo "$key\n";
}
$pdo = getMyDB();
//TODO: Create variables from each item in the $data array

//Here We make variables to store the values from the loot file and stored into the database
$HOSTNAME = $data['Host Name'];
$OSNAME= $data['OS Name'];
$OSVERSION = $data['OS Version'];
$OSMANUFACTURER = $data['OS Manufacturer'];
$OSCONFIG = $data['OS Configuration'];
$OSBUILDTYPE = $data['OS Build Type'];
$REGISTEREDOWNER = $data['Registered Owner'];
$REGISTEREDORG = $data['Registered Organization'];
$PRODUCTID = $data['Product ID'];
$ORIGINSTALLDATE = $data['Original Install Date'];
$SYSTEMBOOTTIME = $data['System Boot Time'];
$SYSTEMMANUFACTURER = $data['System Manufacturer'];
$SYSTEMMODEL = $data['System Model'];
$SYSTEMTYPE = $data['System Type'];
$PROCESSORS = $data['Processor(s)'];
$BIOSVERSION = $data['BIOS Version'];
$WINDOWSDIR = $data['Windows Directory'];
$SYSTEMDIR = $data['System Directory'];
$BOOTDEVICE = $data['Boot Device'];
$SYSTEMLOCALE = $data['System Locale'];
$INPUTLOCALE = $data['Input Locale'];
$TIMEZONE = $data['Time Zone'];
$TOTALPHYSMEM = $data['Total Physical Memory'];
//$AVALPHYSICALMEM = $data['Available Physical Memory'];
$AVALPHYSICALMEM = "500 potatos";
$VIRTUALMEMMAXSIZE = $data['Virtual Memory: Max Size'];
//$VIRTUALMEMAVAL = $data['VirtualMemoryAvailable'];
$VIRTUALMEMAVAL = "Potato";
$VIRTUALMEMINUSE = $data['Virtual Memory: In Use'];
$PAGEFILELOC = $data['Page File Location(s)'];
$DOMAIN = $data['Domain'];
$LOGONSERVER = $data['Logon Server'];
$HOTFIXES = $data['Hotfix(s)'];
$NETWORKCARDS = $data['Network Card(s)'];
$HYPERVREQUIREMENTS = $data['Hyper-V Requirements'];

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
