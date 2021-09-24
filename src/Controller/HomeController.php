<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\AboutMeRepository;
use App\Repository\ProjetProRepository;
use App\Repository\ProjetPersoRepository;
use App\Repository\CuriculumExpRepository;
use App\Repository\CuriculumFormRepository;
use App\Repository\LinksRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{

    private CuriculumFormRepository $curiculumFormRepository;
    private CuriculumExpRepository $curiculumExpRepository;
    private ProjetProRepository $projetProRepository;
    private ProjetPersoRepository $projetPersoRepository;
    private LinksRepository $linkRepository;
    private AboutMeRepository $aboutMeRepository;


    public function __construct(
        CuriculumFormRepository $curiculumFormRepository,
        CuriculumExpRepository $curiculumExpRepository,
        ProjetProRepository $projetProRepository,
        ProjetPersoRepository $projetPersoRepository,
        LinksRepository $linksRepository,
        AboutMeRepository $aboutMeRepository
    ) {
        $this->curiculumFormRepository = $curiculumFormRepository;
        $this->curiculumExpRepository = $curiculumExpRepository;
        $this->projetProRepository = $projetProRepository;
        $this->projetPersoRepository = $projetPersoRepository;
        $this->linkRepository = $linksRepository;
        $this->aboutMeRepository = $aboutMeRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, ContactNotification $notification): Response
    {
        $curiculumForm = $this->curiculumFormRepository->findAll();
        $curiculumExp = $this->curiculumExpRepository->findAll();
        $curiculumExpCurrent = $this->curiculumExpRepository->findLastExp();
        $projetPro = $this->projetProRepository->findLastProjetPro(5);
        $projetProEntete = $this->projetProRepository->findLastProjetPro(1);
        $projetPerso = $this->projetPersoRepository->findLastProjetPerso(5);
        $projetPersoEntete = $this->projetPersoRepository->findLastProjetPerso(1);
        $links = $this->linkRepository->findAll();
        $abouteMe = $this->aboutMeRepository->findAll();

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('success', 'Votre demande de contact a bien été envoyée');
            return $this->redirectToRoute('home');
        }
        

        return $this->render('home/index.html.twig', [
            'formations' => $curiculumForm,
            'experiences' => $curiculumExp,
            // 'lastExp' => $curiculumExpCurrent,
            'lastProjetPro' => $projetPro,
            'lastProjetProEntete' => $projetProEntete,
            'lastProjetPerso' => $projetPerso,
            'lastProjetPersoEntete' => $projetPersoEntete,
            'links' => $links,
            'aboutMe' => $abouteMe,
            'form' => $form->createView(),
        ]);
    }
}
