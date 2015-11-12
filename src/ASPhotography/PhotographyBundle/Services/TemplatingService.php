<?php

namespace ASPhotography\PhotographyBundle\Services;

use JMS\Serializer\Serializer;
use Symfony\Bundle\TwigBundle\TwigEngine;

/**
 * Class TemplatingService
 * @package ASPhotography\PhotographyBundle\Services
 */
class TemplatingService
{
    private $twigEngine;
    private $serializer;

    /**
     * initialize service components
     *
     * @param TwigEngine $twigEngine
     * @param Serializer $serializer
     */
    public function __construct( TwigEngine $twigEngine, Serializer $serializer )
    {
        $this->twigEngine = $twigEngine;
        $this->serializer = $serializer;
    }

    /**
     * render all app templates and serve them as json array
     *
     * @return mixed
     * @throws \Exception
     * @throws \Twig_Error
     */
    public function compileTemplates()
    {
        $twigEngine = $this->twigEngine;
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        $data = [
            'landingPage' => $twigEngine->render( 'PhotographyBundle:Templates:landing_page.html.twig' ),
            'categories' => $twigEngine->render( 'PhotographyBundle:Templates:categories.html.twig' )
        ];

        return $this->serializer->serialize( $data, 'json' );
    }
} 