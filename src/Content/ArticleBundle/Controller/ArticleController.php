<?php

namespace Content\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ContentArticleBundle:Article:index.html.twig', array('name' => $name));
    }
    
    public function tagAction($tag)
    {
        $articleList = array();
        return $this->render('ContentArticleBundle:Article:list.html.twig',array(
                'tag' => $tag,
                'articles' => $articleList
            )
        );
    }
}
