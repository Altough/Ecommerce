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
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class BasketController extends controller
{
    /**
     * @Route ("/basket", name ="basket")
     */
    public function indexAction(Request $request, SessionInterface $session){
        $form = $request->query->get('Quantity');
        //$form->get('Quantity')->getData();
        // ici je devrais avoir la quantité du produit ainsi que son id

        // Je créer en suit la quantité de produit
        // je les ajoutes au cartItem
        // J'ajoute le cartItem au panier
        //$session->set('panier',$id);
        $panier = $request->query->get("");
        /*$this->getDoctrine()
            ->getRepository(CartItem::class)
            ->findAll();*/

        return $this->render('Basket/show.html.twig',['panier' => $panier,
                                                            'form' => $form]);
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