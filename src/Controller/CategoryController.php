<?php
/**
 * Created by PhpStorm.
 * User: traor004
 * Date: 12/02/18
 * Time: 16:50
 */

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends controller
{
    /**
     * @Route ("/categories", name ="categories")
     */
    public function indexAction(Request $request){
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('Category/show.html.twig',['categories' => $categories]);
    }
}