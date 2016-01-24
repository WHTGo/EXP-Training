<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/29/2015
 * Time: 2:15 PM
 */
namespace TemplatePattern;
abstract class TemplateAbstract
{
    //Thi?t l?p m?t thu?t toán chung cho c? l?p
    public final function showBookTileInfo($book_in)
    {
        $title = $book_in->getTitle();
        $author = $book_in->getAuthor();

        $processTitle = $this->processTitle($title);
        $processAuthor = $this->processAuthor($author);
        if($processAuthor == null)
        {
            $processInfo = $processTitle;
        }
        else
        {
            $processInfo = $processTitle.'by'.$processAuthor;
        }
        return $processInfo;
    }

    abstract function processTitle($title);

    function processAuthor($author)
    {
        return NULL;
    }

}