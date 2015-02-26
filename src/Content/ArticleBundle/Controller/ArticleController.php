<?php

namespace Content\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Content\ArticleBundle\Entity\Article;

class ArticleController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ContentArticleBundle:Article:index.html.twig', array('name' => $name));
    }
    
    public function createAction()
    {
        $newArticle = new Article();
        $createForm = $this->createFormBuilder ( $newArticle )
                ->add ( 'title', 'text' )
                ->add ( 'rate', 'number' )
                ->add ( 'tags', 'text' )
                ->add ( 'author', 'text' )
                ->add ( 'content', 'textarea' )
                ->add ( 'save', 'submit', 
                    array (
				        'label' => 'post' 
                        
                    ) 
                )->getForm ();
        $createForm->handleRequest ( $this->getRequest () );
        if($createForm->isValid()){
            $em = $this->getDoctrine()->getManager();
            $displayUrl = $this->generateUrl('content_articles_display',array('articleId'=>$newArticle->getArticleId()));
            $newArticle->setUrl($displayUrl);
            $em->persist($newArticle);
            $em->flush();
            return $this->redirect($newArticle->getUrl());
        }else{
            return $this->render('ContentArticleBundle:Article:article.create.html.twig',array(
                'form' => $createForm->createView()
            ));
        }
        
    }
    
    public function displayAction($articleId)
    {
        $repository = $this->getDoctrine()->getRepository('ContentArticleBundle:Article');
        $article = $repository->findOneBy(array(
            'articleId' => $articleId
        ));
        if(!$article){
            throw $this->createNotFoundException("Article not found ".$articleId);
        }else{
            return $this->render('ContentArticleBundle:Article:article.display.html.twig',array('article' => $article));
        }
    }
    
    public function searchAction()
    {
        $keywords = $this->getRequest()->query->get('keywords');
        $repository = $this->getDoctrine()->getRepository('ContentArticleBundle:Article');
        $query = $repository->createQueryBuilder('a')->where('a.title like :keywords')
                    ->setParameter('keywords','%'.$keywords.'%')
                    ->orderBy('a.updateDateTime','ASC')
                    ->getQuery();
        $articlesResult = $query->getResult();
        return $this->render('ContentArticleBundle:Article:article.list.html.twig',array('articles' => $articlesResult));
    }
    
    public function tagAction($tag)
    {
        $repository = $this->getDoctrine()->getRepository('ContentArticleBundle:Article');
        if(empty($tag)){
            $articlesResult = $repository->findAll();        
        }else{
            $query = $repository->createQueryBuilder('a')->where('a.tags like :tag')
                    ->setParameter('tag','%'.$tag.'%')
                    ->orderBy('a.updateDateTime','ASC')
                    ->getQuery();
            $articlesResult = $query->getResult();
        }
        return $this->render('ContentArticleBundle:Article:article.list.html.twig',array('articles' => $articlesResult));
    }
}
