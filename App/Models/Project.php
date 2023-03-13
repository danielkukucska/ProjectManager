<?php
class Project
{
    private int $id;
    private string $name;
    private string $description;
    private DateTime $start_date;
    private DateTime $end_date;

    public function __construct($name, $description, $start_date, $end_date)
    {
        $this->name = $name;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getEndDate()
    {
        return $this->end_date;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }
}
