<?php
 
$opt[1] = "--vertical-label \"Seconds\" -l0 --title \"$hostname / $servicedesc\" ";

$def[1] =  "DEF:Seconds=$rrdfile:$DS[1]:AVERAGE " ;

$def[1] .= "HRULE:$WARN[1]#FFFF00 ";
$def[1] .= "HRULE:$CRIT[1]#FF0000 ";
$def[1] .= "AREA:Seconds#00FF00:\"Seconds \\n\" " ;

$def[1] .= "GPRINT:Seconds:MAX:\" MAXIMUM\: %.0lfs\" ";
$def[1] .= "GPRINT:Seconds:AVERAGE:\" AVERAGE\: %.0lfs\" ";
$def[1] .= "GPRINT:Seconds:LAST:\" CURRENT\: %.0lfs\\n\" ";

# Draw warning and crit
if (isset($WARN[1]) && $WARN[1] != "") {
        $def[1] .= "HRULE:$WARN[1]#FFFF00:\"Warning ($NAME[1])\: " . $WARN[1] . " " . $UNIT[1] . " \\n\" ";
}

if (isset($CRIT[1]) && $CRIT[1] != "") {
        $def[1] .= "HRULE:$CRIT[1]#FF0000:\"Critical ($NAME[1])\: " . $CRIT[1] . " " . $UNIT[1] . " \\n\" ";

}
?>
