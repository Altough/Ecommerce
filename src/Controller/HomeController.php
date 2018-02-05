<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class HomeController extends Controller
{
    /**
     * @Route ("/", name ="home")
     */
    public function indexAction(Request $request){
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();
        return $this->render('./base.html.twig',['products' => $products,
        'categories' => $categories]);
    }

}