<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/tasks.php";

    session_start();
    if (empty($_SESSION['list_of_tasks'])) {
        $_SESSION['list_of_tasks'] = array();
    }

    $app = new Silex\Application();
                                        // Thought Process:
    $app->get("/", function() {         // 1. Create route
                                        // 2. Need two variabes:
      $output = "";                       // 2a. Need $output variable to build on
      $all_tasks = Task::getAll();        // 2b. Need all Tasks variable to hold all the Task objects

      if (!empty($all_tasks)) {         // 3. IF all Tasks variable has tasks, then add HTML to $output
          $output .= "
              <h1>To Do List</h1>
              <p>Here are all your tasks</p>
          ";
          foreach ($all_tasks as $task) {  // 5. Iterate through array of tasks,
            $output .= "<p>" . $task->getDescription() . "</p>";  // 6. Get task Description, add to $output & print
          }
      }
                                          // 7. If no tasks in array, then print home page content
      $output .= "
          <h1>Your To Do List</h1>
          <form action='/tasks' method='post'>
            <label for='description'>Add your task: </label>
            <input type='text' id='description' name='description'>
            <button type='submit'>Add Task</button>
          </form>
      ";
                                          // 8. Add a Form with delete button that goes to home page
      $output .= "
          <form action='/' method='post'>
            <button type='submit'>Delete All Tasks</button>
          </form>
      ";

      return $output;

    });

    $app->post("/tasks", function() {              // 9. Create Route to where new tasks go to '/tasks'
        $task = new Task($_POST['description']);   // 10. On results Route, Instantiate new Task object
        $save = $task->save();                     // 11. Save new Task in a variable to be displayed
                                                   // 12. Return task description using Getter
        return "
          <h1>Your Newly Added Task</h1>
          <p>" . $task->getDescription() . "</p>
          <p><a href='/'>View your list of things to do.</a></p>
        ";                                        // 13. Add link to home page to see full list of tasks
    });

    $app->post('/', function() {                  // 14. New Route to Delete all tasks from array
      Task::deleteAll();                          // 15. Use deleteAll() method on Class itself

      return "
          <h1>List Cleared</h1>
          <p><a href='/'>Home</a></p>
      ";                                          // 16. Add text telling user all clear, & link to home page
    });

    return $app;
?>
