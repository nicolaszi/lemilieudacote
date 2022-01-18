<?php
$projections = json_decode(file_get_contents("liste_projections.json"));
    
$projectionsOld     = [];
$projectionsNext    = [];
$projectionsRegion  = [];


foreach ($projections as $k=>$value) {
        $sort = sortByDateAsc($value);
        $projectionsGroupOld = [];
        $projectionsGroupNext = [];
        foreach($value as $projection){
            $dateCourante   = new DateTime();
            $dateProjection = $dateCourante->createFromFormat('d/m/Y H:i', $projection->projection);  
            if($dateProjection > $dateCourante) {
                $projectionsGroupNext[$k][] = $projection;
            } else {
                $projectionsOld[] = $projection;
            }
        }
        $projectionsNext = array_merge($projectionsNext, $projectionsGroupNext);
        //$projectionsOld = array_merge($projectionsOld, $projectionsGroupOld);
               
}

foreach ($projectionsNext as $value){
    $projectionsGroupRegion = [];
    
    for($i = 0 ; $i < count($value) ; $i++) {
        if(isset($projectionsRegion[$value[$i]->region])) {
            $projectionsRegion[$value[$i]->region] = array_merge($projectionsRegion[$value[$i]->region], $value);
        } else {
            $projectionsRegion[$value[$i]->region] = $value; 
        }
    }
}

function sortByDateAsc($array)
{
    usort(
            $array,
                function ($a, $b) {
                    $dateTime = new DateTime();
                    $da = $dateTime->createFromFormat('d/m/Y H:i', $a->projection);
                    $db = $dateTime->createFromFormat('d/m/Y H:i', $b->projection);

                    #return $da <=> $db;
                    return $da->getTimeStamp() - $db->getTimeStamp();
                }
        );
    
    return $array;
}

function sortByDateDesc($array)
{
    usort(
            $array,
                function ($a, $b) {
                    $dateTime = new DateTime();
                    $da = $dateTime->createFromFormat('d/m/Y H:i', $a->projection);
                    $db = $dateTime->createFromFormat('d/m/Y H:i', $b->projection);

                    #return $da <=> $db;
                    return $db->getTimeStamp() - $da->getTimeStamp();
                }
        );
    
    return $array;
}

?>