<?php
/**
 * Created by PhpStorm.
 * User: MiKoRiza-OnE
 * Date: 7/23/2015
 * Time: 23:07
 */

namespace ASPhotography\PhotographyBundle\DataFixtures\ORM;


use ASPhotography\AdminBundle\Entity\UserRole;
use ASPhotography\PhotographyBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/***
 * Class LoadDefaultCategories
 * @package ASPhotography\PhotographyBundle\DataFixtures\ORM
 */
class LoadDefaultCategories extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        $initialCategories = [
            'Fashion', 'Stock', 'Family/Babies', 'Landscapes'
        ];
        foreach( $initialCategories as $name ){
            $category = new Category();
            $category->setName( $name );
            $manager->persist( $category );
            $manager->flush();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
} 