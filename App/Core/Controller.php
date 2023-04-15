<?php
class Controller
{
    protected $db;

    protected function init($repositories, $service)
    {
        $this->connectToDb();
        $loadedRepositories = $this->loadRepositories($repositories);
        return $this->loadService($service, $loadedRepositories);
    }

    private function connectToDb()
    {
        require_once "./App/Core/Database.php";
        $this->db = $db;
    }

    private function loadRepositories($repositories)
    {
        $repositoryInstances = [];

        foreach ($repositories as $repository) {
            require_once "./App/Repositories/" . $repository . ".php";
            $repositoryInstances[] = new $repository($this->db);
        }

        return $repositoryInstances;
    }

    private function loadService($service, $repositories)
    {
        require_once "./App/Services/" . $service . ".php";
        $reflector = new ReflectionClass($service);

        return $reflector->newInstanceArgs($repositories);
    }

    public function view($view, $data = [])
    {
        if (file_exists("./App/Views/" . $view . ".php")) {
            require_once "./App/Views/" . $view . ".php";
        } else {

            require_once "./App/Views/Common/404.php";
        }
    }
}
