<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8' />
        <link href='css/core/main.min.css' rel='stylesheet' />
        <link href='css/daygrid/main.min.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <script src='js/core/main.min.js'></script>
        <script src='js/interaction/main.min.js'></script>
        <script src='js/daygrid/main.min.js'></script>
        <script src='js/core/locales/pt-br.js'></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/control.js"></script>
    </head>
        <body>
        <?php
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        <div id='calendar'></div>
        <!-- Event Details Modal Window -->
        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Event Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="visevent">
                            <dl class="row">
                                <dt class="col-sm-3">Event ID</dt>
                                <dd class="col-sm-9" id="id"></dd>
                                
                                <dt class="col-sm-3">Start of Event</dt>
                                <dd class="col-sm-9" id="start"></dd>
                                
                                <dt class="col-sm-3">End of Event</dt>
                                <dd class="col-sm-9" id="end"></dd>
                            </dl>
                            <div align="right">
                                <button class="btn btn-warning btn-canc-vis">Edit</button>
                                <!-- Delete Event Button -->
                                <button type="submit" class="btn btn-danger">Delete</button> 
                            </div> 
                        </div>
                        <div class="formedit">
                            <span id="msg-edit"></span>
                            <form id="edit_event" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" >
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="start" class="form-control" id="start" onkeypress="DateTime(event, this)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="end" class="form-control" id="end"  onkeypress="DateTime(event, this)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary btn-canc-edit">Cancel</button>
                                        <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Edit</button>                                    
                                    </div>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event Registration Modal Window -->
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="msg-cad"></span>
                        <!-- Event Registration Form -->
                        <form id="add_event" method="POST"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start" class="form-control" id="start" onkeypress="DateTime(event, this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="end" class="form-control" id="end"  onkeypress="DateTime(event, this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Register Event</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
