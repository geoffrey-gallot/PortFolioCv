<?php

namespace App\Controller\Admin;

use App\Entity\Links;
use App\Entity\AboutMe;
use App\Entity\ProjetPro;
use App\Entity\ProjetPerso;
use App\Entity\CuriculumExp;
use App\Entity\CuriculumForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PortFolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Formation', 'fas fa-list', CuriculumForm::class);
        yield MenuItem::linkToCrud('Experience', 'fas fa-list', CuriculumExp::class);
        yield MenuItem::linkToCrud('Projet Perso', 'fas fa-list', ProjetPerso::class);
        yield MenuItem::linkToCrud('Projet Pro', 'fas fa-list', ProjetPro::class);
        yield MenuItem::linkToCrud('Liens', 'fas fa-list', Links::class);
        yield MenuItem::linkToCrud('A propos', 'fas fa-list', AboutMe::class);
    }
}
