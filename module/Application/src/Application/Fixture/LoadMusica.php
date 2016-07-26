<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Application\Entity\Musica;

class LoadMusica extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager) {
        $musica = new Musica();
        $musica->setNome("Musica teste");
//        $this->addReference('categoria-livros', $musica);

        $manager->persist($musica);

        $musica2 = new Musica();
        $musica2->setNome("Musica teste 2");
//        $this->addReference('categoria-computadores', $musica2);

        $manager->persist($musica2);
        $manager->flush();
    }

    public function getOrder() {
        return 10;
    }

}
