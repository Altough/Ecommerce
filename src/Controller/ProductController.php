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

class ProductController extends controller
{
    /**
     * @Route ("/products", name ="products")
     */
    public function indexAction(Request $request){
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($request->query->get('id'));

        return $this->render('./Product/_product.html.twig',['product' => $product]);
    }
}