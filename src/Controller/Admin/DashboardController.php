<?php

namespace App\Controller\Admin;

use App\Entity\Budget;
use App\Entity\Client;
use App\Entity\Invoice;
use App\Entity\Project;
use App\Entity\Service;
use App\Entity\WorkMade;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('WebEasyAdmin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Clientes', '', Client::class);
        yield MenuItem::linkToCrud('Proyectos','', Project::class);
        yield MenuItem::linkToCrud('Facturas','', Invoice::class);
        yield MenuItem::linkToCrud('Presupuestos', '', Budget::class);
        yield MenuItem::linkToCrud('Servicios', '', Service::class);
        yield MenuItem::linkToCrud('Trabajos realizados','', WorkMade::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
