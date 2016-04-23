<?php
/**
 * Created by PhpStorm.
 * User: MiKoRiza-OnE
 * Date: 10/19/2015
 * Time: 22:02
 */

namespace ASPhotography\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class CategoryController
 * @package ASPhotography\AdminBundle\Controller
 */
class CategoryController extends Controller
{
    /**
     * @param $id
     * @param $slug
     * @return \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function overviewAction( $id, $slug )
    {
        /** @var \ASPhotography\PhotographyBundle\Entity\Category $category */
        $category = $this->getDoctrine()->getRepository( 'PhotographyBundle:Category' )->findOneBy([
            'id'    => $id,
            'slug'  => $slug
        ]);
        if( $category == null ) return $this->createNotFoundException( 'Category not found!' );

        return $this->render( 'AdminBundle:Category:overview.html.twig', [
            'category' => $category,
            'photos' => $category->getPhotos()
        ]);
    }
}