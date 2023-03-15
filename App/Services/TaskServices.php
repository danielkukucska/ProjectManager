<?php
class TaskService
{
    private TaskRepository $taskRepository;
    private UserTaskRepository $userTaskRepository;
    private UserRepository $userRepository;

    public function __construct(TaskRepository $taskRepository, UserTaskRepository $userTaskRepository, UserRepository $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userTaskRepository = $userTaskRepository;
        $this->userRepository = $userRepository;
    }

    public function getById(int $id)
    {
        $task = $this->taskRepository->getById($id);

        if (!$task) {
            return null;
        }

        $userTasks = $this->userTaskRepository->getAllByTaskId($task->getId());

        $assignees = [];
        foreach ($userTasks as $userTask) {
            $assignee = $this->userRepository->getById($userTask->getId());

            if (!$assignee) {
                //ERROR?
                return null;
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
                    //ERROR?
                    return null;
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
                $assignee = $this->userRepository->getById($userTask->getId());

                if (!$assignee) {
                    //ERROR?
                    return null;
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
}
