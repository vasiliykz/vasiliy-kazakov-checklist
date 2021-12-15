<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\This;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=127)
     */
    private $title;

    //@TODO - What type $date field should return
    /**
     * @var string
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $category_id;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $author_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }



}
