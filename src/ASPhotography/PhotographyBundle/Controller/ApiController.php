<?php
/**
 * Created by PhpStorm.
 * User: MiKoRiza-OnE
 * Date: 10/15/2015
 * Time: 00:16
 */

namespace ASPhotography\PhotographyBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApiController
 * @package ASPhotography\PhotographyBundle\Controller
 */
class ApiController extends Controller
{
    /**
     * Api templates
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function templatesAction()
    {
        $response = new Response(
            $this->get('asphotography.api.templating')->compileTemplates(),
            200
        );
        /** 90 days */
        $response->setSharedMaxAge( 7776000 );
        $response->setMaxAge( 0 );
        $response->headers->set( 'Content-Type', 'application/json' );

        return $response;
    }
}