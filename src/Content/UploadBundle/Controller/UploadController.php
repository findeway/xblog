<?php

namespace Content\UploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UploadController extends Controller
{
    public function uploadImageAction()
    {
        $file = $this->getRequest()->files->get('uploadedImage');
        return $this->render('ContentUploadBundle:Default:upload.html.twig', array('name' => $file));
    }
}
