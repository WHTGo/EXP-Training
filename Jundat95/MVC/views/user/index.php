<?php
    echo '<ul>';
    foreach($data['users'] as $u)
    {
        echo "<li>$u[1]-$u[3]</li>";
    }
    echo '</ul>';
?>