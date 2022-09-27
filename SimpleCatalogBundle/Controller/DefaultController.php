<?php

namespace SimpleCatalogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject;
use SimpleCatalogBundle\Service\Strategy\GenericStrategy;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    public function __construct(
        private EventDispatcherInterface $dispatcher
    ){}

    /**
     * @Route("/simple_catalog")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from simple_catalog');
    }

    #[Route("/dev/test/serialize/{id}", name: "dev_test_serialize_object", methods: ["GET"])]
    public function testSerialize(int $id, Request $request) : JsonResponse {

        $object = DataObject::getById($id);

        $strategy = new GenericStrategy($this->dispatcher);
        $result = $strategy->serialize($object);

        return $this->json(["object" => $result],200);
    }
}
