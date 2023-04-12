

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

$Filename = "../resources/test/loot2.txt";
$lines = file($Filename);
$data = array();
$dataArrayExperssion = "/\[[0-9][0-9]\]/i";
for($i=0;$i<count($lines);$i++)
{
    $line = $lines[$i];
//    echo "working on $line";
    #if line is available physical memory
    $availablePhysicalMemory= strpos($line, "Available Physical Memory");
    $VirtualMemoryAvail=strpos($line, "Virtual Memory: Available:");
//    echo $itemPos;
    if($availablePhysicalMemory !== false)
    {
        echo "Found Avail Phys memory\n";
        $key = "Available Physical Memory";
        $ary = explode(": ",$lines[$i]);
        $value = $ary[count($ary)-1];
        $data[$key] = $value;
        continue;
    }
    else if($VirtualMemoryAvail !== false)
    {
        echo "Found virtual mem avail\n";
        $key = "Virtual Memory: Available";
        $ary = explode(": ",$lines[$i]);
        $value = $ary[count($ary)-1];
        $data[$key] = $value;
        continue;
    }
    else {
        $tokens = explode(":  ", $lines[$i]);
        $key = $tokens[0];
    }
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
//foreach($data as $key=>$value)
//{
//    echo "$key\n";
//}
$pdo = getMyDB();

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
$timestamp1 = strtotime($data['Original Install Date']);
$ORIGINSTALLDATE = date('Y-m-d H:i:s', $timestamp1);
$timestamp2 = strtotime($data['System Boot Time']);
$SYSTEMBOOTTIME = date('Y-m-d H:i:s', $timestamp2);
$SYSTEMMANUFACTURER = $data['System Manufacturer'];
$SYSTEMMODEL = $data['System Model'];
$SYSTEMTYPE = $data['System Type'];
$PROCESSORS = json_encode($data['Processor(s)']); //JSON
$BIOSVERSION = $data['BIOS Version'];
$WINDOWSDIR = $data['Windows Directory'];
$SYSTEMDIR = $data['System Directory'];
$BOOTDEVICE = $data['Boot Device'];
$SYSTEMLOCALE = $data['System Locale'];
$INPUTLOCALE = $data['Input Locale'];
$TIMEZONE = $data['Time Zone'];
$TOTALPHYSMEM = $data['Total Physical Memory'];
$AVALPHYSICALMEM = $data['Available Physical Memory'];
//$AVALPHYSICALMEM = "500 potatos";
$VIRTUALMEMMAXSIZE = $data['Virtual Memory: Max Size'];
$VIRTUALMEMAVAL = $data['Virtual Memory: Available'];
//$VIRTUALMEMAVAL = "Potato";
$VIRTUALMEMINUSE = $data['Virtual Memory: In Use'];
$PAGEFILELOC = $data['Page File Location(s)'];
$DOMAIN = $data['Domain'];
$LOGONSERVER = $data['Logon Server'];
$HOTFIXES = json_encode($data['Hotfix(s)']);//JSON
$NETWORKCARDS = json_encode($data['Network Card(s)']); //JSON
$HYPERVREQUIREMENTS = $data['Hyper-V Requirements'];
//var_dump($data);
$query = "Insert into Loot (Hostname, OSname, OSversion, OSmanufacturer, OSconfiguration, OSbuildtype, 
RegisteredOwner, RegisteredOrganization, ProductID, OriginalInstallDate, SystemBootTime, SystemManufacturer, 
SystemModel, SystemType, `Processor(s)`, BiosVersion, WindowsDirectory, SystemDirectory, BootDevice, 
SystemLocale, InputLocale, TimeZone, TotalPhysicalMemory, AvailablePhysicalMemory, VirtualMemoryMaxSize, 
VirtualMemoryAvailable, VirtualMemoryInUse, `PageFileLocation(s)`, Domain, LogOnServer, `Hotfix(s)`, `NetworkCard(s)`, HyperVRequirements)
values (:HOSTNAME,:OSNAME,:OSVERSION,:OSMANUFACTURER,:OSCONFIG,:OSBUILDTYPE, :REGISTEREDOWNER, :REGISTEREDORG, 
:PRODUCTID, :ORIGINSTALLDATE, :SYSTEMBOOTTIME, :SYSTEMMANUFACTURER, :SYSTEMMODEL, :SYSTEMTYPE, :PROCESSORS,
:BIOSVERSION, :WINDOWSDIR, :SYSTEMDIR, :BOOTDEVICE, :SYSTEMLOCALE, :INPUTLOCALE, :TIMEZONE, :TOTALPHYSMEM,
:AVALPHYSICALMEM, :VIRTUALMEMMAXSIZE, :VIRTUALMEMAVAL, :VIRTUALMEMINUSE, :PAGEFILELOC, :DOMAIN, :LOGONSERVER, 
:HOTFIXES, :NETWORKCARDS, :HYPERVREQUIREMENTS)"; //TODO: Add created variables to values statement

$stmt=$pdo->prepare($query);
$stmt->bindParam(":HOSTNAME", $HOSTNAME,PDO::PARAM_STR);
$stmt->bindParam(":OSNAME", $OSNAME,PDO::PARAM_STR);
$stmt->bindParam(":OSVERSION", $OSVERSION,PDO::PARAM_STR);
$stmt->bindParam(":OSMANUFACTURER", $OSMANUFACTURER,PDO::PARAM_STR);
$stmt->bindParam(":OSCONFIG", $OSCONFIG,PDO::PARAM_STR);
$stmt->bindParam(":OSBUILDTYPE", $OSBUILDTYPE,PDO::PARAM_STR);
$stmt->bindParam(":REGISTEREDOWNER", $REGISTEREDOWNER,PDO::PARAM_STR);
$stmt->bindParam(":REGISTEREDORG", $REGISTEREDORG,PDO::PARAM_STR);
$stmt->bindParam(":PRODUCTID", $PRODUCTID,PDO::PARAM_STR);
$stmt->bindParam(":ORIGINSTALLDATE", $ORIGINSTALLDATE);
$stmt->bindParam(":SYSTEMBOOTTIME", $SYSTEMBOOTTIME,);
$stmt->bindParam(":SYSTEMMANUFACTURER", $SYSTEMMANUFACTURER,PDO::PARAM_STR);
$stmt->bindParam(":SYSTEMMODEL", $SYSTEMMODEL,PDO::PARAM_STR);
$stmt->bindParam(":SYSTEMTYPE", $SYSTEMTYPE,PDO::PARAM_STR);
$stmt->bindParam(":PROCESSORS", $PROCESSORS,);
$stmt->bindParam(":BIOSVERSION", $BIOSVERSION,PDO::PARAM_STR);
$stmt->bindParam(":WINDOWSDIR", $WINDOWSDIR,PDO::PARAM_STR);
$stmt->bindParam(":SYSTEMDIR", $SYSTEMDIR,PDO::PARAM_STR);
$stmt->bindParam(":BOOTDEVICE", $BOOTDEVICE,PDO::PARAM_STR);
$stmt->bindParam(":SYSTEMLOCALE", $SYSTEMLOCALE,PDO::PARAM_STR);
$stmt->bindParam(":INPUTLOCALE", $INPUTLOCALE,PDO::PARAM_STR);
$stmt->bindParam(":TIMEZONE", $TIMEZONE,PDO::PARAM_STR);
$stmt->bindParam(":TOTALPHYSMEM", $TOTALPHYSMEM,PDO::PARAM_STR);
$stmt->bindParam(":AVALPHYSICALMEM", $AVALPHYSICALMEM,PDO::PARAM_STR);
$stmt->bindParam(":VIRTUALMEMMAXSIZE", $VIRTUALMEMMAXSIZE,PDO::PARAM_STR);
$stmt->bindParam(":VIRTUALMEMAVAL", $VIRTUALMEMAVAL,PDO::PARAM_STR);
$stmt->bindParam(":VIRTUALMEMINUSE", $VIRTUALMEMINUSE);
$stmt->bindParam(":PAGEFILELOC", $PAGEFILELOC,PDO::PARAM_STR);
$stmt->bindParam(":DOMAIN", $DOMAIN,PDO::PARAM_STR);
$stmt->bindParam(":LOGONSERVER", $LOGONSERVER,PDO::PARAM_STR);
$stmt->bindParam(":HOTFIXES", $HOTFIXES);
$stmt->bindParam(":NETWORKCARDS", $NETWORKCARDS);
$stmt->bindParam(":HYPERVREQUIREMENTS", $HYPERVREQUIREMENTS,PDO::PARAM_STR);
$stmt->execute();