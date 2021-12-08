<?php

namespace App\Controller\Admin;

use App\Entity\Vente;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vente::class;
    }

    public function configureFields(string $pageName): iterable 
    {
        return [
            IdField::new('id')->hideOnForm(), 
            
            FormField::addPanel('Clients Details')->renderCollapsed(),
            AssociationField::new('clients'),

            FormField::addPanel('Produits Listes'),
            AssociationField::new('produits')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
           

            FormField::addPanel('Ventes a effectuer')->collapsible()
            ->setIcon('vente')->addCssClass('optional')
            ->setHelp('ventes des produits'),
            NumberField::new('quantitevente'),
            NumberField::new('prix')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            IntegerField::new('total'),

           

           
        ];
    }
}
