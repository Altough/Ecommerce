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
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BasketController extends controller
{
    /**
     * @Route ("/panier", name ="panier")
     */
    public function indexAction(Request $request){
        $panier = $this->getDoctrine()
            ->getRepository(CartItem::class)
            ->findAll();

        return $this->render('Basket/show.html.twig',['panier' => $panier]);
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