<?php

namespace App\Controller;

use App\Entity\CuriculumExp;
use App\Entity\CuriculumForm;
use App\Repository\CuriculumExpRepository;
use App\Repository\CuriculumFormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private CuriculumFormRepository $curiculumFormRepository;
    private CuriculumExpRepository $curiculumExpRepository;

    public function __construct(CuriculumFormRepository $curiculumFormRepository, CuriculumExpRepository $curiculumExpRepository)
    {
        $this->curiculumFormRepository = $curiculumFormRepository;
        $this->curiculumExpRepository = $curiculumExpRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $curiculumForm = $this->curiculumFormRepository->findAll();
        $curiculumExp = $this->curiculumExpRepository->findAll();
        $curiculumExpCurrent = $this->curiculumExpRepository->findLastExp();
        // dd($curiculumExpCurrent);
        return $this->render('home/index.html.twig', [
            'formations' => $curiculumForm,
            'experiences' => $curiculumExp,
            'lastExp' => $curiculumExpCurrent,
        ]);
    }
}
