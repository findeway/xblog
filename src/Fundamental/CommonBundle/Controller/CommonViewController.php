<?php
namespace Fundamental\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommonViewController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('FundamentalCommonBundle:CommonView:index.html.twig', array(
            'name' => $name
        ));
    }
    
    public function headerAction()
    {
        return $this->render('FundamentalCommonBundle:CommonView:header.html.twig');
    }
    
    public function navAction()
    {
        $navigation = array(
            "titile" => "findeway",
            "navcolumns" => array(
               "Articles" => array(
                    array(
                        "tag" => "C++",
                        "link" => $this->generateUrl("content_articles_tag",array('tag' => 'C++'))
                    ),
                    array(
                        "tag" => "PHP",
                        "link" => $this->generateUrl("content_articles_tag",array('tag' => "PHP"))
                    ),
                    array(
                        "tag" => "Java",
                        "link" => $this->generateUrl("content_articles_tag",array('tag' => "Java"))
                    ),
                   array(
                       "tag" => "Javascript",
                       "link" => $this->generateUrl("content_articles_tag",array('tag' => "Javascript"))
                   )
               )
            ),
            "Settings" => array(
                array(
                    "tag" => "Profile",
                    "link" => $this->generateUrl("content_article_homepage")
                )
            )
        );
        return $this->render('FundamentalCommonBundle:CommonView:nav.html.twig',array("navigation" => $navigation));
    }
}
