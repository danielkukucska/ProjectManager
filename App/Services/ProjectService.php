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
            return null;
        }

        $owner = $this->userRepository->getById($project->getOwnerId());

        if (!$owner) {
            return null;
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
                return null;
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
                return null;
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
            return null;
        }

        $ownerDTO = new ViewUserDTO($owner);

        return new ViewProjectDTO($project, $ownerDTO);
    }

    public function update(int $id, UpdateProjectDTO $projectDTO)
    {
        $project = $this->projectRepository->getById($id);

        if (!$project) {
            throw new InvalidArgumentException("Project not found.");
        }

        $project->setName($projectDTO->getName());
        $project->setDescription($projectDTO->getDescription());
        $project->setStartDate($projectDTO->getStartDate());
        $project->setEndDate($projectDTO->getEndDate());
        $project->setOwnerId($projectDTO->getOwnerId());

        $this->projectRepository->save($project);

        $owner = $this->userRepository->getById($project->getOwnerId());

        if (!$owner) {
            return null;
        }

        $ownerDTO = new ViewUserDTO($owner);

        return new ViewProjectDTO($project, $ownerDTO);
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
}
