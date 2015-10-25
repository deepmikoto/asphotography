<?php
/**
 * Created by PhpStorm.
 * User: MiKoRiza-OnE
 * Date: 10/24/2015
 * Time: 22:29
 */

namespace ASPhotography\AdminBundle\Controller;


use ASPhotography\PhotographyBundle\Entity\Photo;
use ASPhotography\PhotographyBundle\Form\PhotoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PhotoController
 * @package ASPhotography\AdminBundle\Controller
 */
class PhotoController extends Controller
{
    /**
     * @param $categoryId
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addPhotoAction( $categoryId, Request $request )
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        /** @var \ASPhotography\PhotographyBundle\Entity\Category $category */
        $category = $em->find( 'PhotographyBundle:Category', intval( $categoryId ) );
        $photo = new Photo();
        $category != null ? $photo->setCategory( $category ) : null;
        $form = $this->createForm( new PhotoType(), $photo );
        if( $request->isMethod( 'POST' ) ){
            $form->handleRequest( $request );
            if( $form->isValid() ){
                $em->persist( $photo );
                $em->flush( $photo );
                if( $photo->getCategory() != null ){
                    $this->addFlash( 'success', '<strong>Awesome!</strong> You added a new photo to the <strong>' . $category->getName() . '</strong> category' );

                    return $this->redirectToRoute( 'asphotography_admin_category_overview', [
                        'id' => $category->getId(),
                        'slug' => $category->getSlug()
                    ]);
                } else {
                    $this->addFlash( 'success', '<strong>Awesome!</strong> You added a new photo! You have to assign it to a category so it will be visible on the site' );

                    return $this->redirectToRoute( 'asphotography_admin_photo_add' );
                }
            }
        }

        return $this->render('AdminBundle:Photo:new_photo.html.twig', [
            'form' => $form->createView(),
            'category' => $category
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function editPhotoAction( $id, Request $request )
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        /** @var \ASPhotography\PhotographyBundle\Entity\Photo $photo */
        $photo = $em->find( 'PhotographyBundle:Photo', intval( $id ) );
        if( $photo == null ) return $this->createNotFoundException( 'Photo not found!' );
        $form = $this->createForm( new PhotoType(), $photo );
        if( $request->isMethod( 'POST' ) ){
            $form->handleRequest( $request );
            if( $form->isValid() ){
                $em->persist( $photo );
                $em->flush( $photo );
                $this->addFlash( 'success', '<strong>Awesome!</strong> You successfully updated the photo!' );

                return $this->redirectToRoute( 'asphotography_admin_photo_edit', [
                    'id' => $photo->getId()
                ]);
            }
        }

        return $this->render('AdminBundle:Photo:edit_photo.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deletePhotoAction( $id, Request $request )
    {
        $this->denyAccessUnlessGranted( 'ROLE_ADMIN', null, 'Access Denied' );
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        /** @var \ASPhotography\PhotographyBundle\Entity\Photo $photo */
        $photo = $em->find( 'PhotographyBundle:Photo', intval( $id ) );
        if( $photo != null ){
            $em->remove( $photo );
            $em->flush();
            $this->addFlash( 'success', '<strong>Awesome!</strong> You successfully deleted the photo!' );
        }
        $backURL = $request->get( 'backURL', null );
        if( $backURL != null ){
            return $this->redirect( $backURL );
        } else {
            return $this->redirectToRoute( 'asphotography_admin_dashboard' );
        }
    }
}