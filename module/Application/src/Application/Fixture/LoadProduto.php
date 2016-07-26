<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Application\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface{
    
    public function load(ObjectManager $manager) {
        
        $categoriaLivros = $this->getReference('categoria-livros');
        $categoriaComputadores = $this->getReference('categoria-computadores');
        
        $produto = new Produto();
        $produto->setNome("ZF2 Pratica")
                ->setCategoria($categoriaLivros);
        
        $manager->persist($produto);
        
        $produto2 = new Produto();
        $produto2->setNome("Macbook Pro")
                 ->setCategoria($categoriaComputadores);
        
        $manager->persist($produto2);
        $manager->flush();
    }

    public function getOrder() {
        return 20;
    }

}
