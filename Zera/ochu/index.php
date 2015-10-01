<?php
require_once "State.php";
/**
 * User: nguyen
 * Date: 9/19/2015
 * Time: 5:03 PM
 */
class Main
{
    public function run()
    {
        $a  = new State();

        $a->init();
        $a->render();

        echo "move left";
        $b = clone $a;
        $b = $b->moveLeft();
        if($b) {
            $b->render();
        }

        echo "move right";
        $c = clone $a;
        $c->moveRight();
        if($c) {
            $c->render();
        }
    }


}

$main = new Main();
$main->run();