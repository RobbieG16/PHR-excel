    <?php
    error_reporting(0);
    include_once("connn.ph");
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>PHR_INFOSYS</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style1.css">
        
    </head>

    <body>
        
        <div class="example1">
            <h3>PHR-INFORMATION SYSTEM V1.0</h3>
        </div>

        <br>
        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This page is an alternative to "Add Worker". You may entry data here just like you do in MS Excel.&nbsp;&nbsp;RD status for the worker is set to Manpool by default.&nbsp; Uploading of CV is not possible here.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Click the plus sign(+) located at the right corner to add more rows. &nbsp;&nbsp; Note: &nbsp;&nbsp;All fields require entry by default, so just enter arbitrary words for successful encoding, and just update at Manpool tab later.</p>

        <br /><br />
        <div class="user-info" style="height: 40px">
            <div class="avatar-container" >
                <img id="userAvatar" src="" alt="" title="This is sample user">
            </div>
            
        </div><br /><br />
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" border="1">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Middle</th>
                    <th>Last</th>
                    <th>JObtitle</th>
                    <th>contact</th>
                    <th>contact2</th>
                    <th>address</th>
                    <th>email</th>
                    <th>passport</th>
                    <th>exp_years</th>
                    <th>eligibility</th>
                    <th>skype</th>
                    <th>recruiter</th>
                </tr>
            </table>
        </div>
        <!-- Add a button to open the modal dialog -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userDetailsModal">
            Open User Details
        </button>

        <!-- Modal dialog for user details -->
        <div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userDetailsModalLabel">Enter User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- User details form -->
                        <form id="userDetailsForm">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar:</label>
                                <div class="avatar-options">
                                    <!-- Add image options for avatar selection -->
                                    <label>
                                        <input type="radio" name="avatar" value="1">
                                        <img src="avatars/1.jpg" alt="Avatar 1" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="2">
                                        <img src="avatars/2.jpg" alt="Avatar 2" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="3">
                                        <img src="avatars/3.jpg" alt="Avatar 3"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="4">
                                        <img src="avatars/4.jpg" alt="Avatar 4"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="5">
                                        <img src="avatars/5.jpg" alt="Avatar 5" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="6">
                                        <img src="avatars/6.jpg" alt="Avatar 6" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="7">
                                        <img src="avatars/7.jpg" alt="Avatar 7"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="8">
                                        <img src="avatars/8.jpg" alt="Avatar 8"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="9">
                                        <img src="avatars/9.jpg" alt="Avatar 9" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="10">
                                        <img src="avatars/10.jpg" alt="Avatar 10" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="11">
                                        <img src="avatars/11.jpg" alt="Avatar 11"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="12">
                                        <img src="avatars/12.jpg" alt="Avatar 12"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="13">
                                        <img src="avatars/13.jpg" alt="Avatar 13" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="14">
                                        <img src="avatars/14.jpg" alt="Avatar 14" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="15">
                                        <img src="avatars/15.jpg" alt="Avatar 15"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="16">
                                        <img src="avatars/16.jpg" alt="Avatar 16"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <!-- Add more image options as needed -->
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="color">Choose Color:</label>
                                <div class="color-picker">
                                    <!-- Add 15 color options in the modal color picker -->
                                    <label>
                                        <input type="radio" name="color" value="#FF0000">
                                        <span class="color-sample" style="background-color: #FF0000;"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="#00FF00">
                                        <span class="color-sample" style="background-color: #00FF00;"></span>
                                    </label>
                                    <label>
                            <input type="radio" name="color" value="#0000FF">
                            <span class="color-sample" style="background-color: #0000FF;"></span>
                        </label>
                        <!-- Add more color options as needed -->
                        <label>
                            <input type="radio" name="color" value="#FFFF00">
                            <span class="color-sample" style="background-color: #FFFF00;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FF00FF">
                            <span class="color-sample" style="background-color: #FF00FF;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#00FFFF">
                            <span class="color-sample" style="background-color: #00FFFF;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FFA500">
                            <span class="color-sample" style="background-color: #FFA500;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#800080">
                            <span class="color-sample" style="background-color: #800080;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#008000">
                            <span class="color-sample" style="background-color: #008000;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#800000">
                            <span class="color-sample" style="background-color: #800000;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#008080">
                            <span class="color-sample" style="background-color: #008080;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#000080">
                            <span class="color-sample" style="background-color: #000080;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FFC0CB">
                            <span class="color-sample" style="background-color: #FFC0CB;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FFD700">
                            <span class="color-sample" style="background-color: #FFD700;"></span>
                        </label>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="errorBox" style="display: none;"></div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveUserDetails()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add script -->
        <script src="script1.js"></script>
    </body>
    </html>
