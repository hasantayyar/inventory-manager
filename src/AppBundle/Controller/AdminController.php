<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Page controller.
 *
 * @Route("/admin")
 */
class AdminController extends Controller {

    /**
     * @Route("/", name="admin_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

}
