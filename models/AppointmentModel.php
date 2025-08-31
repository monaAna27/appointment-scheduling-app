<?php

namespace models;

use core\Model;
use data\Appointment;

class AppointmentModel extends Model
{

    public function createAppointment($title, $description, $dateTime)
    {
        $pdo = $this->db->getConnection();

        if (trim($title) != '' && trim($description) != '' && trim($dateTime) != '') {
            $appointment = new Appointment(null, $title, $description, $dateTime, null);

            $stmt = $pdo->prepare("INSERT INTO appointments (title, description, date_time, user_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$appointment->getTitle(), $appointment->getDescription(), $appointment->getDateTime(), $_SESSION['user_id']]);
        } else {
            echo 'data error';
        }
    }

    public function editAppointment($id, $title, $description, $dateTime)
    {
        $pdo = $this->db->getConnection();

        if (trim($title) != '' && trim($description) != '' && trim($dateTime) != '') {
            $appointment = new Appointment($id, $title, $description, $dateTime, null);

            $stmt = $pdo->prepare("UPDATE appointments SET title = ?, description = ?, date_time = ? WHERE id = ? AND user_id = ?");
            $stmt->execute([$appointment->getTitle(), $appointment->getDescription(), $appointment->getDateTime(), $appointment->getId(), $_SESSION['user_id']]);
        } else {
            echo 'data error';
        }
    }

    public function getAppointments() {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM appointments WHERE user_id = ? AND is_finished = 0");
        $stmt->execute([$_SESSION['user_id']]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(function ($row) {
            return new Appointment($row['id'], $row['title'], $row['description'], $row['date_time'], $row['is_finished']);
        }, $rows);
    }

    public function getAppointment($id) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $_SESSION['user_id']]);
        $appointment = $stmt->fetch();

        if(! $appointment) {
            http_response_code(404);
            echo "Appointment not found";
            exit;
        }

        return new Appointment($appointment['id'],$appointment['title'], $appointment['description'], $appointment['date_time'], $appointment['is_finished']);
    }

    public function deleteAppointment($id) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $_SESSION['user_id']]);
    }

    public function finishAppointment($id) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("UPDATE appointments SET is_finished = 1 WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $_SESSION['user_id']]);
    }

    public function searchAppointments($search) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM appointments WHERE title LIKE ? AND user_id = ?");
        $stmt->execute(['%' . $search . '%', $_SESSION['user_id']]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(function ($row) {
            return new Appointment($row['id'], $row['title'], $row['description'], $row['date_time'], $row['is_finished']);
        }, $rows);
    }
}
