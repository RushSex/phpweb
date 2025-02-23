<?php
class Service {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getService($page) {
        $page = (int)$page;
        
        $offset = ($page - 1);
        
        if ($offset < 0) {
            $offset = 0;
        }
        
        $sql = "SELECT id, title, description FROM services LIMIT 1 OFFSET :offset";
        
        return $this->db->fetchOne($sql, ['offset' => $offset]);
    }

    public function getTotalServices() {
        $sql = "SELECT COUNT(*) as total FROM services";
        $result = $this->db->fetchOne($sql);
        return $result['total'];
    }

    public function getAllTitles() {
        $sql = "SELECT id, title FROM services";
        return $this->db->fetchAll($sql);
    }

     public function getToolsForService($serviceId) {
        try {
            $sql = "
                SELECT t.id, t.name, t.description
                FROM tools t
                INNER JOIN service_tools st ON t.id = st.tool_id
                WHERE st.service_id = :service_id
            ";
            $tools = $this->db->fetchAll($sql, ['service_id' => $serviceId]);
    
            if (!$tools) {
                return []; 
            }
    
            return $tools;
        } catch (PDOException $e) {
            die("Ошибка при получении инструментов: " . $e->getMessage());
        }
    }
}
