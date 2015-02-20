<?php

namespace Content\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Assetic\Asset\StringAsset;

/**
 * Article
 *
 * @ORM\Table(name="Article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createDateTime", type="datetime")
     */
    private $createDateTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateDateTime", type="datetime")
     */
    private $updateDateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal")
     */
    private $rate;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * 
     * @var string
     * 
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    /**
     * 
     * @var string
     * 
     * @ORM\Column(name="articleId", type="string", length=255)
     */
    private $articleId;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Article
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Article
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set createDateTime
     *
     * @param \DateTime $createDateTime
     * @return Article
     */
    public function setCreateDateTime($createDateTime)
    {
        $this->createDateTime = $createDateTime;

        return $this;
    }

    /**
     * Get createDateTime
     *
     * @return \DateTime 
     */
    public function getCreateDateTime()
    {
        return $this->createDateTime;
    }

    /**
     * Set updateDateTime
     *
     * @param \DateTime $updateDateTime
     * @return Article
     */
    public function setUpdateDateTime($updateDateTime)
    {
        $this->updateDateTime = $updateDateTime;

        return $this;
    }

    /**
     * Get updateDateTime
     *
     * @return \DateTime 
     */
    public function getUpdateDateTime()
    {
        return $this->updateDateTime;
    }

    /**
     * Set rate
     *
     * @param string $rate
     * @return Article
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Article
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }
    
    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * Set articleId
     *
     * @param string $articleId
     * @return Article
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    
        return $this;
    }
    
    /**
     * Get articleId
     *
     * @return string
     */
    public function getArticleId()
    {
        return $this->articleId;
    }
    
    function __construct()
    {
        $this->setTitle("New Article");
        $datetime = new \DateTime();
        $this->setCreateDateTime($datetime);
        $this->setUpdateDateTime($datetime);
        $this->setAuthor("unknown");
        $this->setRate(0.0);
        $this->setContent("");
        $this->setTags("");
        $this->setArticleId(uniqid());
    }
}
