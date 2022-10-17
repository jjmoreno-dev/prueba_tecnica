<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="app_api")
     */
    public function index(): Response
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://apidemo.trackingpremium.us/publicapi/v1/search_username?username=trackingpremium");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        $output_trans = json_decode($output);
        
        return new JsonResponse($output_trans->maincompanies);
    }
}
