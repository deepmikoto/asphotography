<?php
/**
 * Created by PhpStorm.
 * User: MiKoRiza-OnE
 * Date: 10/19/2015
 * Time: 21:32
 */

namespace ASPhotography\AdminBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Routing\Router;

/**
 * Class AdminService
 * @package ASPhotography\AdminBundle\Services
 */
class AdminService
{
    private $em;
    private $container;
    private $router;

    /**
     * initialize service components
     *
     * @param Container $container
     * @param EntityManager $em
     * @param Router $router
     */
    public function __construct(Container $container, EntityManager $em, Router $router )
    {
        $this->em = $em;
        $this->container = $container;
        $this->router = $router;
    }

    /**
     * retrieve all categories
     * and return their names and overview URL
     *
     * @return array
     */
    public function getSidebarCategories()
    {
        $query = $this->em->getRepository( 'PhotographyBundle:Category' )->createQueryBuilder( 'c' );
        $query
            ->select( 'c.id, c.name', 'c.slug' )
            ->orderBy( 'c.name', 'ASC' )
        ;
        $categories = $query->getQuery()->getResult();

        return $categories;
    }
}