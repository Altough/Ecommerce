<?php

namespace App\Form;

use App\Entity\CartItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;


class CartItemForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("Quantity", IntegerType::class)
            ->add("ajouter au panier", SubmitType::class)
            ->getForm();
    }
}