<?php
class ProjectService
{
    private ProjectRepository $projectRepository;
    private UserRepository $userRepository;

    public function __construct(ProjectRepository $projectRepository, UserRepository $userRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->userRepository = $userRepository;
    }

    public function getById(int $id)
    {
        $project = $this->projectRepository->getById($id);

        if (!$project) {
            throw new NotFoundException("Project not found.");
        }

        $owner = $this->userRepository->getById($project->getOwnerId());

        if (!$owner) {
            throw new NotFoundException("Owner user not found.");
        }

        $ownerDTO = new ViewUserDTO($owner);

        return new ViewProjectDTO($project, $ownerDTO);
    }

    public function getAll()
    {
        $projects = $this->projectRepository->getAll();
        $projectDTOs = [];

        foreach ($projects as $project) {
            $owner = $this->userRepository->getById($project->getOwnerId());

            if (!$owner) {
                throw new NotFoundException("Owner user not found.");
            }

            $ownerDTO = new ViewUserDTO($owner);

            $projectDTOs[] = new ViewProjectDTO($project, $ownerDTO);
        }

        return $projectDTOs;
    }

    public function getAllByOwnerId(int $ownerId)
    {
        $projects = $this->projectRepository->getAllByOwnerId($ownerId);
        $projectDTOs = [];

        foreach ($projects as $project) {
            $owner = $this->userRepository->getById($project->getOwnerId());

            if (!$owner) {
                throw new NotFoundException("Owner user not found.");
            }

            $ownerDTO = new ViewUserDTO($owner);

            $projectDTOs[] = new ViewProjectDTO($project, $ownerDTO);
        }

        return $projectDTOs;
    }

    public function create(CreateProjectDTO $createProjectDTO)
    {
        $project = new Project(
            null,
            $createProjectDTO->getName(),
            $createProjectDTO->getDescription(),
            $createProjectDTO->getStartDate(),
            $createProjectDTO->getEndDate(),
            $createProjectDTO->getOwnerId()
        );

        $this->projectRepository->save($project);

        $owner = $this->userRepository->getById($project->getOwnerId());

        if (!$owner) {
            throw new NotFoundException("Owner user not found.");
        }

        $ownerDTO = new ViewUserDTO($owner);

        return new ViewProjectDTO($project, $ownerDTO);
    }

    public function update(int $id, UpdateProjectDTO $projectDTO)
    {
        $project = $this->projectRepository->getById($id);

        if (!$project) {
            throw new NotFoundException("Project not found.");
        }

        $project->setName($projectDTO->getName());
        $project->setDescription($projectDTO->getDescription());
        $project->setStartDate($projectDTO->getStartDate());
        $project->setEndDate($projectDTO->getEndDate());
        $project->setOwnerId($projectDTO->getOwnerId());

        $this->projectRepository->save($project);

        $owner = $this->userRepository->getById($project->getOwnerId());

        if (!$owner) {
            throw new NotFoundException("Owner user not found.");
        }

        $ownerDTO = new ViewUserDTO($owner);

        return new ViewProjectDTO($project, $ownerDTO);
    }

    public function delete(int $projectId)
    {
        $project = $this->projectRepository->getById($projectId);

        if (!$project) {
            throw new NotFoundException("Project not found.");
        }

        if ($project->getOwnerId() != $_SESSION["user"]->getId()) {
            throw new UnauthorizedException("Only the owner can delete the project");
        } else {
            $this->projectRepository->delete($projectId);
        }
    }

    public function getUsers()
    {
        $users = $this->userRepository->getAll();
        $userDTOs = [];

        foreach ($users as $user) {
            $userDTO = new ViewUserDTO($user);
            $userDTOs[] = $userDTO;
        }
        return $userDTOs;
    }

    public function downloadProgress(int $projectId)
    {
        $project = $this->projectRepository->getById($projectId);

        if (!$project) {
            throw new NotFoundException("Project not found.");
        }

        $progress = $this->projectRepository->getProgress($projectId);

        $filename = $projectId . " - " . $project->getName() . " - progress" . "current date" . ".csv";
        $file = fopen($filename, "w");
        $header = ["Task ID", "Task Name", "User Name", "User Email", "Date", "Hours Worked"];
        fputcsv($file, $header, ",", " ");

        foreach ($progress as $row) {
            $data = [
                $row->getTaskId(),
                $row->getTaskName(),
                $row->getUserName(),
                $row->getUserEmail(),
                date_format($row->getDate(), "Y.m.d"),
                $row->getHoursWorked()
            ];
            fputcsv($file, $data);
        }

        fclose($file);

        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=$filename");
        readfile($filename);
        unlink($filename);
    }
}
