<?php
namespace App\Controllers;
use App\Models\StudentModel;
use App\Views\Display;

class StudentController extends Controller {

    public function __construct()
    {
        $student = new StudentModel();
        parent::__construct($student);
    }

    public function index(): void
    {
        $student = $this->model->all(['order_by' => ['firstName, lastName'], 'direction' => ['ASC']]);
        $this->render('students/index', ['students' => $student]);
    }

    public function create(): void
    {
        $this->render('students/create');
    }
    public function edit(int $id): void
    {
        $student = $this->model->find($id);
        if (!$student) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "Tanuló a megadott azonosítóval: $id nem található.";
            $this->redirect('/students');
        }
        $this->render('students/edit', ['students' => $student]);
    }

    public function save(array $data): void
    {
        if (empty($data['firstName']) || empty($data['lastName']) || empty($data['gender'])) {
            $_SESSION['warning_message'] = "Mezők nincsenek helyesen kitöltve!";
            $this->redirect('/students/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->firstName = $data['firstName'];
        $this->model->lastName = $data['lastName'];
        $this->model->gender = $data['gender'];
        $this->model->classID = $data['classID'];
        $this->model->create();
        $this->redirect('/students');
    }

    public function update(int $id, array $data): void
    {
        $student = $this->model->find($id);
        if (!$student || empty($data['firstName']) || empty($data['lastName']) || empty($data['gender'])) {
            // Handle invalid ID or data
            $this->redirect('/students');
        }

        $student->firstName = $data['firstName'];
        $student->lastName = $data['lastName'];
        $student->gender = $data['gender'];
        $student->classID = $data['classID'];
        $student->update();
        $this->redirect('/students');
    }

    function show(int $id): void
    {
        $student = $this->model->find($id);
        if (!$student) {
            $_SESSION['warning_message'] = "Tanuló a megadott azonosítóval: $id nem található.";
            $this->redirect('/students'); // Handle invalid ID
        }
        $this->render('students/show', ['students' => $student]);
    }

    function delete(int $id): void
    {
        $student = $this->model->find($id);
        if ($student) {
            $result = $student->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/students'); // Redirect regardless of success
    }

}
