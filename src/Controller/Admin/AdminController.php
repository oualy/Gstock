<?php

namespace App\Controller\Admin;

use App\Entity\Vente;
use App\Entity\Clients;
use App\Entity\Produits;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render(view:'bundles/EasyAdminBundle/welcome.html.twig');
      //  return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('⚜Sama Back Office/ gestion de stock⚜');
              
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Produits', 'fa fa-cube', Produits::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-user',Clients::class);
        yield MenuItem::linkToCrud('Ventes', 'fab fa-amazon-pay', Vente::class);
    }
}
  