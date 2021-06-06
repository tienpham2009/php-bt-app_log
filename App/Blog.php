<?php
namespace App;

class Blog
{
    public int $id;
    public string $title;
    public string $teaser;
    public string $content;
    public mixed $dateCreat;

    public function __construct($data)
    {
        $this->title = $data["title"];
        $this->teaser = $data["teaser"];
        $this->content = $data["content"];
        $this->dateCreat = $data["dateCreate"];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}