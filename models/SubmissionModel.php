<?php
require_once '../config/db.php';

class SubmissionModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function addSubmission($userId, $title, $category, $exhibition, $desc, $imagePath) {
        $sql = "INSERT INTO submissions (user_id, title, category, exhibition_type, description, image_path) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssss", $userId, $title, $category, $exhibition, $desc, $imagePath);
        return $stmt->execute();
    }

    public function getSubmissionsByUser($userId) {
        $sql = "SELECT * FROM submissions WHERE user_id = ? ORDER BY submission_date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getStoriesByUser($userId) {
        $sql = "SELECT ps.*, GROUP_CONCAT(si.image_path) as images 
                FROM photo_stories ps 
                LEFT JOIN story_images si ON ps.id = si.story_id 
                WHERE ps.user_id = ? 
                GROUP BY ps.id 
                ORDER BY ps.created_at DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>