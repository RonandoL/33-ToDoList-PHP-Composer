<?php
    class Task
    {
        private $description;

        function __construct($task_description)
        {
            $this->description = $task_description;
        }

        // Setter Getter
        function setDescription($new_description)
        {
            $this->description = $new_description;
        }
        function getDescription()
        {
            return $this->description;
        }

        // Save Task to array using global variable _SESSION
        function save()    // 'list_of_tasks' is a key for value of array kv pair
        {
            array_push($_SESSION['list_of_tasks'], $this);
        }

        // GET the array of all the tasks
        static function getAll()
        {
            return $_SESSION['list_of_tasks'];
        }

        // DELETE the array by emptying it
        static function deleteAll()
        {
            $_SESSION['list_of_tasks'] = array();
        }

    }
?>
