<?php

namespace App\Controller;

use App\Model\MyModel;

class MyController {
    private $model;

    public function __construct(MyModel $model) {
        $this->model = $model;
    }

    public function getAllRecords() {
        return $this->model->getAllRecordsModel();
    }
}