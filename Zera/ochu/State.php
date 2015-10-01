<?php

/**
 * User: nguyen
 * Date: 9/19/2015
 * Time: 5:01 PM
 */
class State dsff
{
    var $value;

    public function init()
    {
        $array = [0,1,2,3,4,5,6,7,8];
        for($i=0;$i<3;$i++){
            for($j=0;$j<3;$j++){
                shuffle($array);
                $this->value[$i][$j] = array_shift($array);
            }
        }

        return $this;
    }

    public function estimate()
    {
        //
    }

    public function moveLeft()
    {
        $zero  = $this->findZero();
        if($zero['y']<=0 || $zero['y']>3){
            return false;
        }else{
            $this->swap($zero,['x'=>$zero['x'],'y'=>$zero['y']-1]);
            return $this;
        }

    }

    public function moveRight()
    {
        $zero  = $this->findZero();
        if($zero['y']<0 || $zero['y']>=2){
            return false;
        }else{
            $this->swap($zero,['x'=>$zero['x'],'y'=>$zero['y']+1]);
            return $this;
        }

    }

    /*
     * swap 2 positions
     * @param array[x,y] $p1
     * @param array[x,y] $p2
     */
    public  function swap($p1,$p2){
        $tmp = $this->value[$p1['x']][$p1['y']];
        $this->value[$p1['x']][$p1['y']] = $this->value[$p2['x']][$p2['y']];
        $this->value[$p2['x']][$p2['y']] = $tmp;

    }

    /*
     * Find Zero point
     * @return x,y
     */
    public function findZero()
    {
        for($i=0;$i<3;$i++){
            for($j=0;$j<3;$j++){
                if($this->value[$i][$j]==0){
                    return ['x'=>$i,'y'=>$j];
                }
            }
        }
    }

    /*
     * Render the maxtrix table
     */
    public function render()
    {
        echo "<table  border=\"1\">";
        for($i=0;$i<3;$i++){
            echo "<tr>";
            for($j=0;$j<3;$j++){
                echo "<td>";
                echo "<input type=\"text\" size=\"2\" name=\"value\" value=\"".$this->value[$i][$j]."\" />";
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }


}
