<?php
namespace TemplatePattern;

class TemplateEx1 extends TemplateAbstract
{
    function processTitle($title)
    {
        return str_replace(' ','-',$title);
    }
    function processAuthor($author)
    {
        return str_replace(' ','-',$author);
    }

}