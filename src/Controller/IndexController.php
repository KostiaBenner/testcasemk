<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\News;

class IndexController extends AbstractController
{
    /**
     * Matches /news exactly
     *
     * @Route("/news", name="news_list")
     */
    public function list()
    {

        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->findAll();

        return $this->render('news/index.html.twig', ['news' => $news]);
    }

}