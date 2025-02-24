<?php
require_once __DIR__ . '/../models/Service.php';

class ServicesController extends BaseController {
    private $serviceModel;

    public function __construct() {
        global $db; 
        $this->serviceModel = new Service($db);
    }

    public function index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $service = $this->serviceModel->getService($page);

        $allTitles = $this->serviceModel->getAllTitles();

        $totalServices = count($allTitles);

        $prevPage = ($page > 1) ? $page - 1 : null;
        $nextPage = ($page < $totalServices) ? $page + 1 : null;

        $tools = [];
        if ($service) {
            $tools = $this->serviceModel->getToolsForService($service['id']);
        }

        $this->render('services', [
            'service' => $service,
            'currentPage' => $page,
            'allTitles' => $allTitles,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
            'tools' => $tools,
            'currentPath' => 'services'
        ]);
    }
}