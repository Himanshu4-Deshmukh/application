<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="form-group row">

                        <label for="email" class="col-sm-2 form-label">
                            Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control" id="firstname" placeholder=" Name" required="required"  />
                        </div>

                        <label for="email" class="col-sm-2 form-label">
                            Assign User</label>
                        <div class="col-sm-4">
                            <!-- required libraries -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>      
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
                            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
    
                            <!-- assign user input box -->
                            <input type="text" id="search_data" placeholder="" value="xyz@c.com,abc@g.com" autocomplete="off" class="form-control input-lg" />
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-lg" id="search">Get Value</button>
                            </div>

                            <!-- display results -->
                            <span id="country_name"></span>

                            <!-- script to fetch and display results -->
                            <script>
                              $(document).ready(function(){
                                  
                                $('#search_data').tokenfield({
                                    autocomplete :{
                                        source: function(request, response)
                                        {
                                            jQuery.get('fetch.php', {
                                                query : request.term
                                            }, function(data){
                                                data = JSON.parse(data);
                                                response(data);
                                            });
                                        },
                                        delay: 100
                                    }
                                });

                                $('#search').click(function(){
                                    $('#country_name').text($('#search_data').val());
                                });

                              });
                            </script>
                        </div>
                        
                    </div>

</body>
</html>