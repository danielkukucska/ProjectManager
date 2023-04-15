<?php
class TaskService
{
    private TaskRepository $taskRepository;
    private UserTaskRepository $userTaskRepository;
    private UserRepository $userRepository;
    private ProjectRepository $projectRepository;

    public function __construct(TaskRepository $taskRepository, UserTaskRepository $userTaskRepository, UserRepository $userRepository, ProjectRepository $projectRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userTaskRepository = $userTaskRepository;
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
    }

    public function getProject(int $projectId)
    {
        $project = $this->projectRepository->getById($projectId);

        if (!$project) {
            throw new Error("Project not found.");
        }

        $owner = $this->userRepository->getById($project->getOwnerId());

        if (!$owner) {
            throw new Error("Owner not found.");
        }

        $ownerDTO = new ViewUserDTO($owner);

        return new ViewProjectDTO($project, $ownerDTO);
    }

    public function getById(int $id)
    {
        $task = $this->taskRepository->getById($id);

        if (!$task) {
            throw new Error("Task not found.");
        }

        $userTasks = $this->userTaskRepository->getAllByTaskId($task->getId());
        print_r($userTasks);
        $assignees = [];
        foreach ($userTasks as $userTask) {
            $assignee = $this->userRepository->getById($userTask->getUserId());

            if (!$assignee) {
                throw new Error("User not found.");
            } else {
                $assignees[] = new ViewUserDTO($assignee);
            }
        }

        return new ViewTaskDTO($task, $assignees);
    }

    public function getAllByUserId(int $userId)
    {
        $tasks = $this->taskRepository->getAllByUserId($userId);
        $taskDTOs = [];

        foreach ($tasks as $task) {
            $userTasks = $this->userTaskRepository->getAllByTaskId($task->getId());

            $assignees = [];
            foreach ($userTasks as $userTask) {
                $assignee = $this->userRepository->getById($userTask->getId());

                if (!$assignee) {
                    throw new Error("User not found.");
                } else {
                    $assignees[] = new ViewUserDTO($assignee);
                }
            }

            $taskDTOs[] = new ViewTaskDTO($task, $assignees);
        }

        return $taskDTOs;
    }

    public function getAllByProjectId(int $projectId)
    {
        $tasks = $this->taskRepository->getAllByProjectId($projectId);
        $taskDTOs = [];

        foreach ($tasks as $task) {
            $userTasks = $this->userTaskRepository->getAllByTaskId($task->getId());

            $assignees = [];
            foreach ($userTasks as $userTask) {
                $assignee = $this->userRepository->getById($userTask->getUserId());

                if (!$assignee) {
                    throw new Error("User not found-");
                } else {
                    $assignees[] = new ViewUserDTO($assignee);
                }
            }

            $taskDTOs[] = new ViewTaskDTO($task, $assignees);
        }

        return $taskDTOs;
    }

    public function create(CreateTaskDTO $createTaskDTO)
    {
        $task = new Task(
            null,
            $createTaskDTO->getName(),
            $createTaskDTO->getDescription(),
            $createTaskDTO->getProjectId(),
            $createTaskDTO->getStatus()
        );

        $this->taskRepository->save($task);

        return new ViewTaskDTO($task, []);
    }

    public function update(int $id, UpdateTaskDTO $updateTaskDTO)
    {
        $task = $this->taskRepository->getById($id);

        if (!$task) {
            throw new Exception("Task not found");
        }

        $task->setName($updateTaskDTO->getName());
        $task->setDescription($updateTaskDTO->getDescription());
        $task->setProjectId($updateTaskDTO->getProjectId());
        $task->setStatus($updateTaskDTO->getStatus());

        $this->taskRepository->save($task);

        return new ViewTaskDTO($task, []);
    }

    public function addAssignment(CreateUserTaskDTO $createUserTaskDTO)
    {
        $task = $this->taskRepository->getById($createUserTaskDTO->getTaskId());
        if (!$task) {
            throw new Exception("Task not found");
        }

        $user = $this->userRepository->getById($createUserTaskDTO->getUserId());
        if (!$user) {
            throw new Exception("User not found");
        }


        $userTask = new UserTask(
            null,
            $user->getId(),
            $task->getId()
        );

        $this->userTaskRepository->add($userTask);
    }

    public function removeAssignment(int $userId, int $taskId)
    {
        $userTask = $this->userTaskRepository->getByUserIdTaskId($userId, $taskId);

        if (!$userTask) {
            throw new Exception("Assignment not found");
        }

        //todo check timesheets?
        $this->userTaskRepository->remove($userTask);
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
