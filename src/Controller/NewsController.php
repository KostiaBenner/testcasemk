<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\News;

class NewsController extends AbstractController
{

    /**
     * Matches /news/*
     *
     * @Route("/news/{slug}", name="news_show")
     */
    public function show($slug)
    {

        $newsItem = $this->getDoctrine()
            ->getRepository(News::class)
            ->findOneBy([
                'slug' => $slug
            ]);

        if (!$newsItem) {
            throw $this->createNotFoundException(
                'No product found for slug '.$slug
            );
        }

         return $this->render('news/show.html.twig', ['item' => $newsItem]);
    }
}