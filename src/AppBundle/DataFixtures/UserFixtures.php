<?php

namespace AppBundle\DataFixtures;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('demo');
        $user->setPassword($this->encoder->encodePassword($user,'demo'));
        $user->setEmail('aymen.inoubli@gmail.com');
        $manager->persist($user);
        $manager->flush();

//        $user->setUsername('demo');
//        $user->setPassword('demo');
//        $user->setEmail('aymen.inoubli1@gmail.com');
//        $manager->persist($user);
//        $manager->flush();
    }
}
