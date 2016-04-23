<?php
/**
 * Created by PhpStorm.
 * User: MiKoRiza-OnE
 * Date: 7/23/2015
 * Time: 23:17
 */

namespace ASPhotography\AdminBundle\DataFixtures\ORM;


use ASPhotography\AdminBundle\Entity\AdminUser;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadAdminUser
 * @package ASPhotography\AdminBundle\DataFixtures\ORM
 */
class LoadAdminUser extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer( ContainerInterface $container = null )
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        /** @var \ASPhotography\AdminBundle\Entity\UserRole $superAdminRole */
        $superAdminRole = $this->getReference( 'Super Admin' );
        $adminUser = new AdminUser();
        $adminUser
            ->setUsername( 'anca.sanduloiu' )
            ->setSalt( md5( 'asphotography' ) )
            ->setEmail( 'anca.sanduloiu@yahoo.com' )
            ->addRole( $superAdminRole )
        ;
        /** @var \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder $encoder */
        $encoder = $this->container->get( 'security.encoder_factory' )->getEncoder( $adminUser );
        $adminUser->setPassword( $encoder->encodePassword( 'anca.sanduloiu', $adminUser->getSalt() ) );
        $manager->persist( $adminUser );
        $manager->flush();
        $adminUser = new AdminUser();
        $adminUser
            ->setUsername( 'deepmikoto' )
            ->setSalt( md5( 'deepmikoto' ) )
            ->setEmail( 'deepmikoto@gmail.com' )
            ->addRole( $superAdminRole )
        ;
        /** @var \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder $encoder */
        $encoder = $this->container->get( 'security.encoder_factory' )->getEncoder( $adminUser );
        $adminUser->setPassword( $encoder->encodePassword( 'deepmikoto', $adminUser->getSalt() ) );
        $manager->persist( $adminUser );
        $manager->flush();
        /** @var \ASPhotography\AdminBundle\Entity\UserRole $adminRole */
        $adminRole = $this->getReference( 'Admin' );
        $adminUser = new AdminUser();
        $adminUser
            ->setUsername( 'andreea.sanduloiu' )
            ->setSalt( md5( 'asphotography' ) )
            ->setEmail( 'andreea.sanduloiu@yahoo.com' )
            ->addRole( $adminRole )
        ;
        /** @var \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder $encoder */
        $encoder = $this->container->get( 'security.encoder_factory' )->getEncoder( $adminUser );
        $adminUser->setPassword( $encoder->encodePassword( 'andreea.sanduloiu', $adminUser->getSalt() ) );
        $manager->persist( $adminUser );
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
} 