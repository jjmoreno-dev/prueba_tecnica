<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EndpointController extends AbstractController
{
    /**
     * @Route("/endpoint", name="app_endpoint")
     */
    public function index(): Response
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://apidemo.trackingpremium.us/publicapi/v1/search_username?username=trackingpremium");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        $output_trans = json_decode($output);
        return $this->render('endpoint/index.html.twig', [
           // 'data_mendpoint' =>$output_trans->maincompanies ,
           // 'data' => json_encode($output_trans->maincompanies),
        ]);
    }
}
