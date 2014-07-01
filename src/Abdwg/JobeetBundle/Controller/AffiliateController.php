<?php
/**
 * Created by PhpStorm.
 * User: alber
 * Date: 2014/7/1
 * Time: 下午 6:09
 */
// src\Abdwg\JobeetBundle\Controller\AffiliateController.php
namespace Abdwg\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Abdwg\JobeetBundle\Entity\Affiliate;
use Abdwg\JobeetBundle\Form\AffiliateType;
use Symfony\Component\HttpFoundation\Request;
use Abdwg\JobeetBundle\Entity\Category;

class AffiliateController extends Controller
{
    public function newAction()
    {
        $entity = new Affiliate();
        $form = $this->createForm(new AffiliateType(), $entity);

        return $this->render('AbdwgJobeetBundle:Affiliate:affiliate_new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
    }

    public function createAction(Request $request)
    {
        $affiliate = new Affiliate();
        $form = $this->createForm(new AffiliateType(), $affiliate);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {

            $formData = $request->get('affiliate');
            $affiliate->setUrl($formData['url']);
            $affiliate->setEmail($formData['email']);
            $affiliate->setIsActive(false);

            $em->persist($affiliate);
            $em->flush();

            return $this->redirect($this->generateUrl('abdwg_affiliate_wait'));
        }

        return $this->render('AbdwgJobeetBundle:Affiliate:affiliate_new.html.twig', array(
                'entity' => $affiliate,
                'form'   => $form->createView(),
            ));
    }

    public function waitAction()
    {
        return $this->render('AbdwgJobeetBundle:Affiliate:wait.html.twig');
    }
}