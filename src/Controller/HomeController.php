<?php

namespace App\Controller;

use App\Repository\ProjetProRepository;
use App\Repository\ProjetPersoRepository;
use App\Repository\CuriculumExpRepository;
use App\Repository\CuriculumFormRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    private CuriculumFormRepository $curiculumFormRepository;
    private CuriculumExpRepository $curiculumExpRepository;
    private ProjetProRepository $projetProRepository;
    private ProjetPersoRepository $projetPersoRepository;


    public function __construct(
        CuriculumFormRepository $curiculumFormRepository,
        CuriculumExpRepository $curiculumExpRepository,
        ProjetProRepository $projetProRepository,
        ProjetPersoRepository $projetPersoRepository
    ) {
        $this->curiculumFormRepository = $curiculumFormRepository;
        $this->curiculumExpRepository = $curiculumExpRepository;
        $this->projetProRepository = $projetProRepository;
        $this->projetPersoRepository = $projetPersoRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $curiculumForm = $this->curiculumFormRepository->findAll();
        $curiculumExp = $this->curiculumExpRepository->findAll();
        $curiculumExpCurrent = $this->curiculumExpRepository->findLastExp();
        $projetPro = $this->projetProRepository->findLastProjetPro(5);
        $projetProEntete = $this->projetProRepository->findLastProjetPro(1);
        $projetPerso = $this->projetPersoRepository->findLastProjetPerso(5);
        $projetPersoEntete = $this->projetPersoRepository->findLastProjetPerso(1);

        return $this->render('home/index.html.twig', [
            'formations' => $curiculumForm,
            'experiences' => $curiculumExp,
            // 'lastExp' => $curiculumExpCurrent,
            'lastProjetPro' => $projetPro,
            'lastProjetProEntete' => $projetProEntete,
            'lastProjetPerso' => $projetPerso,
            'lastProjetPersoEntete' => $projetPersoEntete,
        ]);
    }
}
