<?php
namespace Common\Model;

/**
 * seo 性状,包含title,keyword,description
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

trait Seo
{
    /**
     * @var string $seoKeyWord seo:关键词
     */
    private $seoKeyWord;
    /**
     * @var string $seoTitle seo:标题
     */
    private $seoTitle;
    /**
     * @var string $seoDescription seo:描述
     */
    private $seoDescription;

    /**
     * 设定seo:标题
     */
    public function setSeoTitle(string $seoTitle)
    {
        $this->seoTitle = $seoTitle;
    }

    public function getSeoTitle()
    {
        return $this->seoTitle;
    }

    /**
     * 设定seo:keyword
     */
    public function setSeoKeyWord(string $seoKeyWord)
    {
        $this->seoKeyWord = $seoKeyWord;
    }

    public function getSeoKeyword()
    {
        return $this->seoKeyWord;
    }

    /**
     * 设定seo:description
     */
    public function setSeoDescription(string $seoDescription)
    {
        $this->seoDescription = $seoDescription;
    }

    public function getSeoDescription()
    {
        return $this->seoDescription;
    }
}
