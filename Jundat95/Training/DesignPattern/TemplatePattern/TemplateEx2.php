<?php
namespace TemplatePattern;

class TemplateEx2 extends TemplateAbstract
{
    function processTitle($title)
    {
        return str_replace(' ','-',$title);
    }


}