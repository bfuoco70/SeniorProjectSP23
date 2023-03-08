<?php
$Filename = "../resources/test/loot.txt";
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
        echo "Handling Network Entries...";
        $nicArray = array();
        $nicArray[]=trim($tokens[1]);
        $nicEntryLine =1;
        $nextNicLine = trim($lines[$i+$nicEntryLine]);
        echo "Reading First Nic Line: $nextNicLine";
        while(strpos($nextNicLine, "Hyper-V")===false)
        {
            echo "Adding line to array.";
            $nicArray[] = $nextNicLine;
            $nicEntryLine++;
            $nextNicLine = trim($lines[$i+$nicEntryLine]);
            echo "Next line read: $nextNicLine";
        }
        $data[$key] = $nicArray;
        $i+=$nicEntryLine-1;
//        break;
//        $nicArray = array();
//        $nicArray[]=$tokens[1];
//        $nicCount = (int)$tokens[1];
//        for($nics=1;$nics<$nicCount;$nics++)
//        {
//            $nicSubArry=array(
//                $lines[$i+$nics],
//                $lines[$i+$nics+1],
//                $lines[$i+$nics+2],
//                $lines[$i+$nics+3],
//                $lines[$i+$nics+4],
//                $lines[$i+$nics+5],
//            );
//
//        }
    }
    else{
        if(isset($tokens[1]))
        {
            $item= trim($tokens[1]);
            $data[$key] = $item;
        }
    }
}
var_dump($data);
