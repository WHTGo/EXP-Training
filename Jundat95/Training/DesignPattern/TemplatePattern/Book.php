<?php
namespace TemplatePattern;

class Book
{
    public $title;
    public $author;

    public function __construct($title,$author)
    {
        $this->title = $title;
        $this->author = $author;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getAuthorTitle()
    {
        return $this->author
                    ->title;
    }

}