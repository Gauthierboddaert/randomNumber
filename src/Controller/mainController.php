<?php

namespace App\Controller;

use App\Form\FormRandom;
use App\Form\FormRandomNumbers;
use App\Service\RandomizerManagerInterface;
use App\utils\ArrayUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class mainController extends AbstractController
{
    public function __construct(
        private readonly RandomizerManagerInterface $randomizerManager,
    )
    {
    }


    #[Route('/home', methods: ['GET','POST'])]
    public function index(Request $request): Response
    {
        $form = $this->createForm(FormRandom::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $randomValue = $this->randomizerManager->getRandomNumber(
                $form->get('numberMin')->getData(),
                $form->get('numberMax')->getData()
            );
        }

        return $this->render(
            'index.html.twig', [
                'form' => $form->createView(),
                'value' => $randomValue ?? null
            ]
        );
    }


    #[Route('/random', methods: ['GET','POST'])]
    public function getRandomNumbers(Request $request): Response
    {
        $form = $this->createForm(FormRandomNumbers::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $randomValue = $this->randomizerManager->getRandomsNumbers(
                $form->get('numberMin')->getData(),
                $form->get('numberMax')->getData(),
                $form->get('numberOfNumber')->getData()
            );
        }
        return $this->render(
            'random.html.twig', [
                'form' => $form->createView(),
                'values' => $randomValue ?? null,
                'duplicates' => ArrayUtils::getDuplicatesInarray($randomValue) ?? null
            ]
        );
    }
}