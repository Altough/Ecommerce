<?php
/**
 * Created by PhpStorm.
 * User: traor004
 * Date: 12/02/18
 * Time: 16:50
 */

namespace App\Controller;

use App\Entity\Basket;
use App\Entity\CartItem;
use App\Entity\Product;
use App\Form\CartItemForm;
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
     * Affichage d'un produit avec option d'ajout au panier
     */
    public function show(Request $request){
        $id = $request->query->get('id');
        // On récupère le produit
        $product = $this->getDoctrine()->getManager()
            ->getRepository(Product::class)
            ->find($id);

        $form = $this->createForm(CartItemForm::class);
       // $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
               // var_dump('YES');

                //On créée au préalable un panier et la commande
                $em = $this->getDoctrine()->getManager();
                $cart = new CartItem();
                $cart->setLib('testCart');
                $cart->setQuantity($form->get("Quantity")->getData());
                $em->persist($cart);
                $em->flush();

                $product->setCartItem($cart);

                $basket = new Basket();
                $basket->setLib('testBasket');
                $basket->setCartItem($cart);

                $em->persist($basket);
                $em->flush();
                //Faut associer se produit à un CartItem

                return $this->redirectToRoute('home');
            }
        }

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

    /**
     * @param $id
     * @param $copie
     *
     */
    public function creat($id, $copie){
        $em = $this->getDoctrine()->getManager();
        $cart = new CartItem();
        $cart->setLib("cart1x")
             ->setQuantity($copie);
        $cart->setBasket(new Basket());


        $product = $this->getDoctrine()->getManager()
                        ->getRepository(Product::class)
                        ->find($id)
                        ->setCartItem($cart);
        $em->flush();
    }
}