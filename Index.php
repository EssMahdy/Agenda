<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8' />
        <title>Event Calendar</title>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Modal Window</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="js/control.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Event Agenda</h1>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a class="btn btn-warning btn-lg btn-block" href="calendar.php" role="button">Calendar</a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <span id="msg-cad"></span>
                        <!-- Event registration form -->
                        <form id="add_event" method="POST">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="date" class="form-control" id="date" onkeypress="DateTime(event, this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start" class="form-control" id="start" onkeypress="DateTime(event, this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="end" class="form-control" id="end" onkeypress="DateTime(event, this)">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
