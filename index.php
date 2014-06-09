<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Filter.js</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/filter.js.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div id="header">
                <h1 class="title">Filter.js</h1>

                <p id="summary">Filter.js is a easy-to-use jQuery plugin that makes filtering a large amount of 
                resources a piece of cake. With Filter.js you can filter resources that are in an element while 
                simultaneously retrieving additional resources that may not be displayed in a table. filter.js allows 
                you to filter paginated data that is not loaded on the client yet.</p>
            </div>

            <div class="content">
                <h2 class="title">Demo</h2>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <input type="text" placeholder="Filter employees&hellip;" class="form-control">
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody class="restaurants">
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-default btn-lg btn-block">More</button>
                </div>
            </div>
        </div>

        <div id="map" style="display: hidden;"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>