<?php

namespace Content\UploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Content\UploadBundle\Entity\UploadImage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;

class UploadController extends Controller
{
    public function uploadImageAction(Request $request)
    {
        $file = $request->files->get('uploadedImage');
        if($file instanceof UploadedFile){
            $uploadImage = new UploadImage($file);
            $repository = $this->getDoctrine()->getRepository('ContentUploadBundle:UploadImage');
            $image = $repository->findOneByName($uploadImage->getName());
            if(!$image){
                $uploadImage->setUrl($this->generateUrl('content_show_image',array('fileName' => $uploadImage->getFilepath())));
                $em = $this->getDoctrine()->getManager();
                $em->persist($uploadImage);
                $em->flush();
                $uploadImage->upload();
                return new Response($uploadImage->getUrl());
            }else{
                return new Response($image->getUrl());
            }
        }
        return new Response("Upload Failed",500);
    }
    
    public function showImageAction($fileName)
    {
        $repository = $this->getDoctrine()->getRepository('ContentUploadBundle:UploadImage');
        $name = pathinfo($fileName,PATHINFO_FILENAME);
        $image = $repository->findOneByName($name);
        if($image){
            $fp = fopen($image->getWebPath(), "rb");
    		$filecontent = stream_get_contents($fp);
    		fclose($fp);
    		$response = new Response($filecontent);
    		$file = new File($image->getWebPath());
    		$response->headers->set('Content-Type', $file->getMimeType());
    		return $response;
        }else{
            return new Response("File Not Found",404);
        }
    }
}
