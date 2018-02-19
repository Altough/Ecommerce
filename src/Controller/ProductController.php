<?php
/**
 * Created by PhpStorm.
 * User: traor004
 * Date: 12/02/18
 * Time: 16:50
 */

namespace App\Controller;

use App\Entity\CartItem;
use App\Entity\Product;
use App\Form\QuantityForm;
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
    public function index(Request $request){
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('Product/index.html.twig',['products' => $products]);
    }

    /**
     * @Route ("/product_show", name ="product_show")
     */
    public function show(Request $request){
        $id = $request->query->get('id');
        $product = $this->getDoctrine()->getRepository(Product::class)
                                        ->find($id);
        $form = $this->createForm(QuantityForm::class);

        $form->handleRequest($request);

        return $this->render('Product/show.html.twig', ['product' => $product,
                                                'form' => $form->createView()]);
    }

    /**
     * @param Request $request
     * récupération du produit et de sa quantité
     */
    public function addToBasket(Request $request){
        //On créer laligne de produit
        //$cartItem = new CartItem();

        $form = $this->createForm(QuantityForm::class, $product);

        $form->handleRequest($request);
        return $this->render('./Product/addAction.html.twig', ['form' => $form->createView(),]);


    }
}