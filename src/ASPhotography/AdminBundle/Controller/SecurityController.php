<?php

namespace ASPhotography\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SecurityController
 * @package ASPhotography\AdminBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * handles admin login action
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get( 'security.authentication_utils' );
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render( 'AdminBundle:Security:login.html.twig', [
                'last_username' => $lastUsername,
                'error'         => $error,
            ]
        );
    }
} 