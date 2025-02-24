<?php
require_once __DIR__ . '/../models/Service.php';

class ServicesController extends BaseController {
    private $serviceModel;

    public function __construct() {
        global $db; 
        $this->serviceModel = new Service($db);
    }

    public function index() {
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
        } else {
            $page = 1;  
        }

        $service = $this->serviceModel->getService($page);
        $allTitles = $this->serviceModel->getAllTitles();
        $totalServices = count($allTitles);

        $prevPage = ($page > 1) ? $page - 1 : null;
        $nextPage = ($page < $totalServices) ? $page + 1 : null;

        $tools = [];
        if ($service) {
            $tools = $this->serviceModel->getToolsForService($service['id']);
        }

        if (isset($_GET['ajax']) && $_GET['ajax'] == 'true') {
            echo json_encode([
                'content' => $this->renderContent('services', [
                    'service' => $service,
                    'currentPage' => $page,
                    'allTitles' => $allTitles,
                    'prevPage' => $prevPage,
                    'nextPage' => $nextPage,
                    'tools' => $tools,
                    'currentPath' => 'services'
                ]),
                'pagination' => $this->renderPagination($allTitles, $page, $prevPage, $nextPage)
            ]);
            exit;  
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

    private function renderContent($view, $data) {
        ob_start();
        extract($data);
        include __DIR__ . '/../views/' . $view . '.php';
        return ob_get_clean();
    }

    private function renderPagination($allTitles, $currentPage, $prevPage, $nextPage) {
        ob_start();
        ?>
        <div class="pagination">
            <div class="pagination-hidden"></div>
            <?php foreach ($allTitles as $index => $title): ?>
                <?php $pageNumber = $index + 1; ?>
                <a href="/services?page=<?= $pageNumber ?>&ajax=true"
                   class="pagination-item <?= $pageNumber === $currentPage ? 'active' : '' ?>" 
                   <?= $pageNumber === $currentPage ? 'id="active-item"' : '' ?>>
                    <?= htmlspecialchars($title['title']) ?>
                </a>
            <?php endforeach; ?>
            <div class="pagination-hidden"></div>
        </div>
        <?php
        return ob_get_clean();
    }
}
