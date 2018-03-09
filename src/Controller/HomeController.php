<?php

namespace App\Controller;

use App\Entity\Post;
use App\Services\MoneyConverter;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function index(LoggerInterface $logger)
    {
        $logger->critical('this is a log');

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/convert/{price}", name="service")
     */
    public function service($price, MoneyConverter $converter)
    {
        $euro = $converter->convertUsdToEuro($price);

        return $this->render('home/convert.html.twig', [
            'euro' => $euro,
        ]);
    }

    /**
     * @Route("/posts", name="posts")
     */
    public function posts()
    {
        $em = $this->get('doctrine');
        $posts = $em->getRepository(Post::class)->findAll();

        return $this->render('home/posts.html.twig', [
            'posts' => $posts,
        ]);
    }
}
