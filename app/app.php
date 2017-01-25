<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return
        "<!DOCTYPE html>
        <html>
          <head>
            <meta charset='utf-8'>
            <title>Job Posting Board</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
          </head>

          <body>
            <div class='container'>
              <h1>Job Posting Board</h1>
              <div class='row'>
                <div class='col-md-4'>
                <form action='jobs'>
                  <div class='form-group'>
                    <label for='job'>Enter Job Title</label>
                    <input type='text' name='job' id='job' class='form-control' placeholder='Personal Slave'>
                  </div>
                  <div class='form-group'>
                    <label for='description'>Enter Job Description</label>
                    <textarea name='description' id='description' rows='6' placeholder='Involves cleaning toilets and picking p after noisy brats.' class='form-control'></textarea>
                  </div>
                  <hr>

                  <h3>Enter Contact Info</h3>
                  <div class='form-group'>
                    <label for='contact_name'>Enter Contact Name</label>
                    <input name='contact_name' id='contact_name' class='form-control' placeholder='John Doe'>
                  </div>
                  <div class='form-group'>
                    <label for='contact_phone'>Enter Contact Phone</label>
                    <input type='tel' name='contact_phone' id='contact_phone' class='form-control' placeholder='1234567890'>
                    <small class='form-text text-muted'>10 digits please, no dashes</small>
                  </div>
                  <div class='form-group'>
                    <label for='contact_email'>Enter Contact Email</label>
                    <input type='email' name='contact_email' id='contact_email' class='form-control' placeholder='john.doe@gmail.com'>
                    <small class='form-text text-muted'>We'll never share your email with anyone else.</small>
                  </div>

                  <button type='submit' class='btn btn-lg btn-danger'>Submit Job</button>

                </form>
                </div>
              </div>
            </div>
          </body>
        </html>";
    });

    return $app;
?>
