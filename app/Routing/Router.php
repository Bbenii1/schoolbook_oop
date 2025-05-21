<?php

namespace App\Routing;

use App\Controllers\ClassController;
use App\Controllers\HomeController;
use App\Controllers\StudentController;
use App\Controllers\SubjectController;
use App\Views\Display;

class Router
{
    public function handle(): void
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $requestUri = $_SERVER['REQUEST_URI'];

        if ($method == "POST" && isset($_POST['_method']))
        {
            $method = strtoupper($_POST['_method']);
        }

        $this->dispatch($method, $requestUri);
    }

    private function dispatch(string $method, string $uri): void
    {
        switch ($method){
            case 'GET':
                $this ->handleGetRequest($uri);
                break;
            case 'POST':
                $this ->handlePostRequest($uri);
                break;
            case 'PATCH':
                $this ->handlePatchRequest($uri);
                break;
            case 'DELETE':
                $this->handleDeleteRequest($uri);
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    private function handleGetRequest(string $uri): void
    {
        switch ($uri){
            case "/":
                homeController::Index();
                return;
            case '/subjects':
                $subjectController = new SubjectController();
                $subjectController -> index();
                break;
            case '/classes':
                $classcontroller = new ClassController();
                $classcontroller -> index();
                break;
            case '/students':
                $studentcontroller = new StudentController();
                $studentcontroller->index();
            default:
                $this->notFound();
        }
    }

    private function handlePostRequest(string $uri): void
    {
        $data = $this->filterPostData($_POST);
        $id = $data['id'] ?? null;

        switch ($uri){
            case "/subjects":
                if (!empty($data)){
                    $subjectController = new SubjectController();
                    $subjectController -> save($data);
                }
                break;
            case "/subjects/create":
                $subjectController = new SubjectController();
                $subjectController -> create();
                break;
            case "/subjects/edit":
                $subjectController = new SubjectController();
                $subjectController -> edit($id);
                break;

            case "/students":
                if (!empty($data)){
                    $studentcontroller = new StudentController();
                    $studentcontroller -> save($data);
                }
                break;
            case "/students/create":
                $studentcontroller = new StudentController();
                $studentcontroller -> create();
                break;
            case "/students/edit":
                $studentcontroller = new StudentController();
                $studentcontroller -> edit($id);
                break;

            case "/classes":
                if (!empty($data)) {
                    $classController = new ClassController();
                    $classController->save($data);
                }
                break;
            case "/classes/create":
                $classController = new ClassController();
                $classController->create();
                break;
            case "/classes/edit":
                $classController = new ClassController();
                $classController->edit($id);
                break;

            default:
                $this->notFound();
        }
    }

    private function handlePatchRequest(string $requestUri): void
    {
        $data = $this->filterPostData($_POST);

        switch ($requestUri) {
            case "/subjects":
                $id = $data['id'] ?? null;
                $subjectController = new SubjectController();
                $subjectController->update($id, $data);
                break;

            case "/students":
                $id = $data['id'] ?? null;
                $studentController = new studentController();
                $studentController->update($id, $data);
                break;

            case "/classes":
                $id = $data['id'] ?? null;
                $classController = new ClassController();
                $classController->update($id, $data);
                break;

            default:
                $this->notFound();
                break;
        }
    }

    private function handleDeleteRequest(string $requestUri): void
    {
        $data = $this->filterPostData($_POST);

        switch ($requestUri) {
            case "/subjects":
                $subjectController = new SubjectController();
                $subjectController->delete((int)$data['id']);
                break;

            case "/students":
                $studentController = new StudentController();
                $studentController->delete((int)$data['id']);
                break;

            case "/classes":
                $classController = new ClassController();
                $classController->delete((int)$data['id']);
                break;

            default:
                $this->notFound();
                break;
        }
    }

    private function filterPostData(array $data): array
    {
        // Remove unnecessary keys in a clean and simple way
        $filterKeys = ['_method', 'submit', 'btn-del', 'btn-save', 'btn-edit', 'btn-plus', 'btn-update'];
        return array_diff_key($data, array_flip($filterKeys));
    }

    private function notFound(): void
    {
        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
        Display::message("404 Not Found", 'error');
    }

    private function methodNotAllowed(): void
    {
        header($_SERVER['SERVER_PROTOCOL'] . " 405 Method Not Allowed");
        Display::message("405 method not allowed", 'error');
    }
}