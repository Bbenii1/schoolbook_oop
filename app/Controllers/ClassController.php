<?php
namespace App\Controllers;
use App\Models\ClassModel;
use App\Views\Display;

class ClassController extends Controller {

    public function __construct()
    {
        $class = new ClassModel();
        parent::__construct($class);
    }

    public function index(): void
    {
        $classes = $this->model->all(['order_by' => ['schoolYear', 'class'], 'direction' => ['ASC']]);
        $this->render('classes\index', ['classes' => $classes]);
    }

    public function create(): void
    {
        $this->render('classes/create');
    }

    public function edit(int $id): void
    {
        $subject = $this->model->find($id);
        if (!$subject) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A tantárgy a megadott azonosítóval: $id nem található.";
            $this->redirect('/classes');
        }
        $this->render('classes/edit', ['classes' => $subject]);
    }

    public function save(array $data): void
    {
        if (empty($data['class']) || empty($data['schoolYear'])) {
            $_SESSION['warning_message'] = "A tantárgy neve kötelező mező.";
            $this->redirect('/classes/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->class = $data['class'];
        $this->model->schoolYear = $data['schoolYear'];
        $this->model->create();
        $this->redirect('/classes');
    }

    public function update(int $id, array $data): void
    {
        $class = $this->model->find($id);
        if (!$class || empty($data['class']) || empty($data['schoolYear'])) {
            // Handle invalid ID or data
            $this->redirect('/classes');
        }
        $class->class = $data['class'];
        $class->schoolYear = $data['schoolYear'];
        $class->update();
        $this->redirect('/classes');
    }

    function show(int $id): void
    {
        $subject = $this->model->find($id);
        if (!$subject) {
            $_SESSION['warning_message'] = "A tantárgy a megadott azonosítóval: $id nem található.";
            $this->redirect('/classes'); // Handle invalid ID
        }
        $this->render('classes/show', ['classes' => $subject]);
    }

    function delete(int $id): void
    {
        $subject = $this->model->find($id);
        if ($subject) {
            $result = $subject->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/classes'); // Redirect regardless of success
    }

}
