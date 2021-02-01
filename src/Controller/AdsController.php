<?php


namespace App\Controller;

use App\Model\Ads;
use App\Exception\ValidationException;

class AdsController
{
    public function created_at(): string
    {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = [
                    'title' => 'Ads create',

                ];
                return view('ads.ads_create', $data);


                $errors = [];
                $data = $_POST;
                if (empty($data['adsTitle'])) {
                    $errors['adsTitle'] = 'Cannot be empty';
                }
                if (strlen($data['adsTitle']) > 100) {
                    $errors['adsTitle'] = 'Max 100 simbols';
                }
                $data['adsTitle'] = filter_var($data['adsTitle'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if (empty($data['body'])) {
                    $errors['body'] = 'Cannot be empty';
                }
                if (strlen($data['body']) > 1000) {
                    $errors['body'] = 'Max 1000 simbols';
                }
                $data['body'] = filter_var($data['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if ($errors) {
                    throw new ValidationException($errors);
                }

                $data['adsTitle'] = filter_var($data['adsTitle'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $data['body'] = filter_var($data['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $ads = new Ads(
                    $data['adsTitle'],
                    $data['body']
                );
                Ads::save($ads);
                header('Location: /ads');
                exit;
            }

        $data = [
            'title' => 'Ads create',
        ];
        return view('ads.ads_create', $data);
    }



    public function index()
    {
        $ads = Ads::findAll();

        $data = [
            'title' => 'Ads list',
            'body' => $ads
        ];
        return view('ads.ads_list', $data);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            Ads::remove($id);
        }
        header('Location: /ads');
        exit;
    }

    public function edit()
    {
        if (!isset($_GET['id'])) {
            header('Location: /ads');
            exit;
        }

        $id = (int)$_GET['id'];
        $ads = Ads::findById($id);
        if (!$ads) {
            header('Location: /ads');
            exit;
        }

        $data = [
            'title' => 'Ads ' . $ads['title'],
            'ads' => $ads
        ];

        return view('ads.ads_update', $data);
    }


}