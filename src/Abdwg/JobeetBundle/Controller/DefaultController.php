<?php

namespace Abdwg\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AbdwgJobeetBundle:Default:index.html.twig', array('name' => $name));
    }

    public function loginAction(Request $request)
    {
//        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('AbdwgJobeetBundle:Default:login.html.twig', array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            ));
    }

    public function changeLanguageAction(Request $request)
    {
        $language = $request->get('language');
        return $this->redirect($this->generateUrl('abdwg_jobeet_homepage', array('_locale' => $language)));
    }
}
