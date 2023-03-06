<?php
    $Filename = "loot.txt";
    $lines = file($Filename);
    $data = array();
    $dataArrayExperssion = "/\[[0-9][0-9]\]/i";
    for($i=0;$i<count($lines);$i++)
    {
        $tokens = explode(":  ", $lines[$i]);
        $key = $tokens[0];
        if($key=="Processor(s)")
        {
            $value = array();
            $value[] = $tokens[1];
            $procCount = (int)$tokens[1];
            for($procs = 1 ;$procs <= $procCount; $procCount++)
            {
                $nextLine = $lines[$i+$procs];
                $value[]=$nextLine;
            }
            $data[$key] = $value;
        }
        else if($key=="Hotfix(s)")
        {
//            $value = array();
//            $value[] = $tokens[1];
//            $procCount = (int)$tokens[1];
//            for($procs = 1 ;$procs <= $procCount; $procCount++)
//            {
//                $nextLine = $lines[$i+$procs];
//                $value[]=$nextLine;
//            }
//            $data[$key] = $value;
        }
        else if($key=="Network Card(s)")
        {
            //do network card stuff
        }
        else if(preg_match($dataArrayExperssion, $key)){
            //do something åΩwith array items
        }
        else{
            $value = trim($tokens[1]);
            $data[$key] = $value;
        }
    }

//    foreach ($lines as $line)
//    {
//        $tokens = explode(":  ", $line);
//        $key = $tokens[0];
//        if($key=="Processor(s)")
//        {
//            //do processor thing
//        }
//        else if($key=="Hotfix(s)")
//        {
//            //do the hotfix thing
//        }
//        else if($key=="Network Card(s)")
//        {
//            //do network card stuff
//        }
//        else if(preg_match($dataArrayExperssion, $key)){
//            //do something with array items
//        }
//        else{
//            $value = trim($tokens[1]);
//            echo $key."=>".$value."\n";
//        }
//
//        //        var_dump($tokens);
////        echo $line;
//    }
