<?php

class news
{
    public $news_id;
    public $news_author;
    public $news_category;
    public $news_title;
    public $news_date;
    public $news_intro;
    public $news_content;
    public $news_image;
    public $news_status = 0;

    public function set_news_id($news_id)
    {
        $this->news_id = $news_id;
    }

    public function set_news_author($news_author)
    {
        $this->news_author = $news_author;
    }

    public function set_news_category($news_category)
    {
        $this->news_category = $news_category;
    }

    public function set_news_title($news_title)
    {
        $this->news_title = $news_title;
    }

    public function set_news_date($news_date)
    {
        $this->news_date = $news_date;
    }

    public function set_news_intro($news_intro)
    {
        $this->news_intro = $news_intro;
    }

    public function set_news_content($news_content)
    {
        $this->news_content = $news_content;
    }

    public function set_news_image($news_image)
    {
        $this->news_image = $news_image;
    }

    public function set_news_status($news_status)
    {
        $this->news_status = $news_status;
    }

    public function get_news_id()
    {
        return $this->news_id;
    }

    public function get_news_author()
    {
        return $this->news_author;
    }

    public function get_news_category()
    {
        return $this->news_category;
    }

    public function get_news_title()
    {
        return $this->news_title;
    }

    public function get_news_date()
    {
        return $this->news_date;
    }

    public function get_news_intro()
    {
        return $this->news_intro;
    }

    public function get_news_content()
    {
        return $this->news_content;
    }

    public function get_news_image()
    {
        return $this->news_image;
    }

    public function get_news_status()
    {
        return $this->news_status;
    }

    public function __construct($news_id, $news_author, $news_category, $news_title, $news_date, $news_intro, $news_content, $news_image, $news_status)
    {
        $this->news_id = $news_id;
        $this->news_author = $news_author;
        $this->news_category = $news_category;
        $this->news_title = $news_title;
        $this->news_date = $news_date;
        $this->news_intro = $news_intro;
        $this->news_content = $news_content;
        $this->news_image = $news_image;
        $this->news_status = $news_status;
    }

    public function __destruct()
    {
    }

}