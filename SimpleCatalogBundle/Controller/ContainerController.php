<?php

namespace SimpleCatalogBundle\Controller;

use Pimcore\Model\DataObject;
use SimpleCatalogBundle\Service\Builder\ContainerBuilder;
use SimpleCatalogBundle\Service\Builder\Director;
use SimpleCatalogBundle\Service\Strategy\GenericStrategy;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;

class ContainerController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    public function __construct(
        private Director $director,
        private EventDispatcherInterface $dispatcher
    ){}

    #[Route("/simple-catalog/container/{id}",name: "simple_catalog_get_container", methods: ["GET"])]
    public function getContainerAction(int $id, HttpFoundation\Request $request) : HttpFoundation\JsonResponse {

        $object = DataObject::getById($id);
        if(!$object){
            throw new \Exception("Object with id ".$id." , not found");
        }

        $director = $this->director->setBuilder(new ContainerBuilder());
        $container = $director->buildContainer($object);

        $strategy = new GenericStrategy($this->dispatcher);
        $result = [];

        foreach ($container->getChildren() as $child) {

            if(!empty($child->getItems())) {
                foreach ($child->getItems() as $item) {
                    $result[] = $strategy->serialize($item->getObject());
                }
            }
        }

        return $this->json([$result],200);
    }
}
