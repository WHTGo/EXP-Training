<?php

    function input_post($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : false;
    }
    
    function input_get($key) 
    {
        return isset($_GET[$key]) ? $_GET[$key] : false;
    }

    function paging($all_page, $limit, $cr_page, $link) 
    {
        $page = array(
            'all_page' => intval($all_page),
            'limit' => intval($limit),
            'cr_page' => intval($cr_page),
            'num_page' => 0,
            'start' => 0,
            'html' => ''
        );
    
        $page['num_page'] = ceil($page['all_page'] / $page['limit']);
    
        if ($page['cr_page'] < 1) {
            $page['cr_page'] = 1;
        } elseif ($page['cr_page'] > $page['num_page']) {
    
            $page['cr_page'] = $page['num_page'];
        }
    
        if ($page['num_page'] > 1) {
            $page['html'] .= '<div class="row"><div class="col-sm-6 text-left">';
            $page['html'].='<ul class="pagination">';
    
    
    
            for ($i = 1; $i <= $page['num_page']; $i++) {
                if ($page['cr_page'] == $i) {
                    $page['html'] .= ' <li class="active"><a href = "' . str_replace('{page}', $i, $link) . '"><span>' . $i . '</span></a></li> ';
                } else {
                    $page['html'] .= ' <li><a href = "' . str_replace('{page}', $i, $link) . '"><span>' . $i . '</span></a></li> ';
                }
            }
            if ($page['cr_page'] == 1) {
                $page['html'] .= '<li><a href =""><strong>|< </strong></a></li> ';
            } else {
                $page['html'] .= '<li><a href="' . str_replace('{page}', $page['cr_page'] - 1, $link) . '">|< </a></li> ';
            }
    
    
            if ($page['cr_page'] == $page['num_page']) {
                $page['html'] .= '<li><a href = "' . str_replace('{page}', $page['cr_page'] + 1, $link) . '"><strong>&gt;| </strong></a></li> ';
            } else {
                $page['html'] .= '<li><a href="' . str_replace('{page}', $page['cr_page'] + 1, $link) . '">&gt;|</a></li>';
            }
            $page['html'] .= '</ul>';
            $page['html'].='</div>  </div>';
        }
        $page['start'] = ($page['cr_page'] - 1) * $page['limit'];
        return $page;
    }
    
    function validate_empty($string) 
    {
        return empty($string);
    }
    
    function validate_slug($string) 
    {
        $patern ='/^([a-zA-Z])$/';
        return preg_match($patern, $string);
    }
    
    function show_error($error,$string)
    {
        if(isset($error[$string])){echo '<span style="color:red">'.$error[$string].'</span>';}
    }

?>
