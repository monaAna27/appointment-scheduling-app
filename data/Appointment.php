<?php 

namespace data;

class Appointment {
    public $id;
    public $title;
    public $description;
    public $dateTime;
    public $isFinished;

    public function __construct($id, $title, $description, $dateTime, $isFinished) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->dateTime = $dateTime;
        $this->isFinished = $isFinished;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function isFinished() {
        return $this->isFinished;
    }
}