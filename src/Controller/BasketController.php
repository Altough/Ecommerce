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
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class BasketController extends controller
{
    /**
     * @Route ("/basket", name ="basket")
     */
    public function index(Request $request){
        $basket = $this->getDoctrine()->getRepository(Basket::class)
                        ->findAll();

        return $this->render('Basket/index.html.twig',['baskets' => $basket]);
    }

    /**
     * @Route ("/basket_show", name ="basket_show")
     * Affichage d'un panier
     */
    public function show(Request $request, SessionInterface $session){
        $id = $request->query->get('id');
        // On récupère le produit
        $basket = $this->getDoctrine()->getManager()
            ->getRepository(Basket::class)
            ->find($id);

        return $this->render('Basket/show.html.twig', ['basket' => $basket]);
    }


   /* /**
     * @param Request $request
     * @Route("/panier_add", name ="panier_add)
     */
    /*public function add(Request $request){
        $basket = $request->query->get("basket");
        $product = $request->query->get("id");
        $cartItem = $this->getDoctrine()
                         ->getRepository(CartItem::class)
                         ->add($product);
        $cartItem->getEntityManager()->setBasket($basket);

    }*/
}