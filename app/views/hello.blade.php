<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Filter.js</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/filter.js.css" rel="stylesheet">
        <link href="css/prettify.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <!-- GitHub ribbon -->
        <a href="https://github.com/windy1/filter.js">
            <img style="position: absolute; top: 0; right: 0; border: 0;" 
                 src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" 
                 alt="Fork me on GitHub" 
                 data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png">
        </a>

        <div class="container">
            <!-- Header -->
            <div id="header">
                <h1 class="title">Filter.js</h1>

                <p class="summary">Filter.js is a easy-to-use jQuery plugin that makes filtering a large amount of 
                resources a piece of cake. With Filter.js you can filter resources that are in an element while 
                simultaneously retrieving additional resources that may not be displayed in a table. filter.js allows 
                you to filter paginated data that is not loaded on the client yet.</p>
            </div>

            <!-- Demo -->
            <h2 class="title" style="margin-bottom: 0px;">Demo</h2>

            <p class="summary" style="text-align: center; margin-bottom: 20px;">
                (made in conjunction with twitter bootstrap and 
                <a href="https://github.com/windy1/more.js">more.js</a>)
            </p>

            <div class="panel panel-primary" style="width: 50%; margin-left: auto; margin-right: auto;">
                <div class="panel-heading">
                    <input type="text" placeholder="Filter employees&hellip;" class="form-control filter">
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Last name</th>
                                <th>First name</th>
                                <th>Middle initial</th>
                                <th>Gender</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody class="employees">
                            <?php
                            $employees = Employee::paginate(5);
                            foreach ($employees as $employee) {
                                echo '<tr>'.PHP_EOL
                                   . '<td>'.$employee->last_name.'</td>'.PHP_EOL
                                   . '<td>'.$employee->first_name.'</td>'.PHP_EOL
                                   . '<td>'.$employee->middle_initial.'</td>'.PHP_EOL
                                   . '<td>'.$employee->gender.'</td>'.PHP_EOL
                                   . '<td>'.$employee->age.'</td>'.PHP_EOL;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <button class="more btn btn-default btn-lg btn-block" data-loading-text="Loading&hellip;">
                        More
                    </button>
                </div>
            </div>

<!-- Demo code snippet -->
<pre class="prettyprint lang-javascript" style="width: 50%; margin-left: auto; margin-right: auto;">
  var currentPage = 1;

  $(".filter").filter({
      url: "{{URL::to('employees/json')}}",
      dataType: 'json',
      table: ".employees",
      queryParam: 'last_name',

      // Function that builds the html from the returned data. 
      // Takes a data parameter.
      buildEntries: buildEntries
  });
</pre>

            <div style="text-align: center;">
                <a href="view-source:{{URL::to('/')}}" target="_blank">View full source</a>
            </div>

            <div class="divider"></div>

            <!-- Tutorial -->
            <div class="tutorial">
                <h2 class="title">Getting Started</h2>
                <p>Setup your HTML table markup</p>
            </div>

<pre class="prettyprint lang-html code">
  &lt;input type="text" id="filter" placeholder="Filter by name&hellip;"&gt;
  &lt;table&gt;
      &lt;thead&gt;
          &lt;td&gt;&lt;th&gt;#&lt;/th&gt;&lt;/td&gt;
          &lt;td&gt;&lt;th&gt;Orchard&lt;/th&gt;&lt;/td&gt;
          &lt;td&gt;&lt;th&gt;Apples&lt;/th&gt;&lt;/td&gt;
          &lt;td&gt;&lt;th&gt;Oranges&lt;/th&gt;&lt;/td&gt;
          &lt;td&gt;&lt;th&gt;Pears&lt;/th&gt;&lt;/td&gt;
      &lt;/thead&gt;
      &lt;tbody id="orchards"&gt;&lt;/tbody&gt;
  &lt;/table&gt;
</pre>

            <div class="tutorial pull-down"><p>Add jquery.filter.js and jquery(.min).js to your template</p></div>

<pre class="prettyprint lang-html code">
  &lt;script src="jquery.min.js"&gt;&lt;/script&gt;
  &lt;script src="jquery.filter.js"&gt;&lt;/script&gt;
</pre>

            <div class="tutorial pull-down">
                <p>Bind your input field using the <code class="prettyprint lang-javascript">filter(Object)</code> 
                function.</p>
            </div>

<pre class="prettyprint lang-javascript code">
var currentPage = 1; // This must be defined in the same scope as the plugin

$("#filter").filter({
  // URL to filter resources from. 
  url: "http://example.com/resources/json", 

  // AJAX dataType. Default: "json".
  dataType: "json",

  // table to populate, does not actually have to be a &lt;table&gt; element.
  table: "#orchards",

  // Parameter that determines the results of the filter. Default: "q".
  queryParam: "orchard_name",

  // Parameter that paginates the data. Default: "page".
  pageParam: "p", // defaults to 'page'

  // callback called before the AJAX request is sent.
  before: function(request) {
      ...
  },

  // callback called after AJAX request is received, regardless of the result.
  after: function() {
      ...
  },

  // callback to build HTML from the returned data.
  buildEntries: function(json) {
      var html = ...
      return html;
  }
});
</pre>

            <div class="tutorial pull-down">
                <p>Integrate with <a href="https://github.com/windy1/more.js">more.js</a> (optional)</p>
            </div>

<pre class="prettyprint lang-javascript code">
&lt;button class="btn btn-lg btn-default btn-block" id="more" 
           data-loading-text="Loading&hellip;"&gt;

$("#more").more({
    url: "http://example.com/resources/json",
    table: "#orchards",

    ...

    // Set this to false if you are not using twitter bootstrap's "loading" 
    // button plugin.
    bootstrap: true
});
</pre>

            <div class="divider"></div>

            <h2 class="title">Download</h2>

            <div style="text-align: center;">
                <div>
                    <a href="https://raw.githubusercontent.com/windy1/filter.js/master/jquery.filter.js" 
                       class="btn btn-lg btn-primary" style="width: 200px;" target="_blank">
                        Download
                    </a>
                </div>
                <div class="pull-down">
                    <a href="https://github.com/windy1/filter.js" class="btn btn-lg btn-primary" style="width: 200px"
                       target="_blank">
                        View on GitHub
                    </a>
                </div>
            </div>

            <div class="divider">&copy; {{date('Y')}} Walker Crouse</div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.filter.js"></script>
        <script src="js/jquery.more.js"></script>
        <script src="js/prettify.js"></script>

        <script>
        function buildEntries(json) {
            var employees = json.data;
            var html = "";
            for (var i = 0; i < employees.length; i++) {
                var employee = employees[i];
                html += '<tr>\n'
                      + '<td>'+employee.last_name+'</td>\n'
                      + '<td>'+employee.first_name+'</td>\n'
                      + '<td>'+employee.middle_initial+'</td>\n'
                      + '<td>'+employee.gender+'</td>\n'
                      + '<td>'+employee.age+'</td>\n'
                      + '</tr>\n';
            }
            return html;
        }

        var currentPage = 1;

        $(".filter").filter({
            url: "{{URL::to('employees/json')}}",
            dataType: 'json',
            table: ".employees",
            queryParam: 'last_name',
            buildEntries: buildEntries
        });

        $(".more").more({
            url: "{{URL::to('employees/json')}}",
            input: ".filter",
            table: ".employees",
            queryParam: "last_name",
            dataType: "json",
            bootstrap: true,
            buildEntries: buildEntries
        });

        $(function() {
            prettyPrint();
        });
        </script>
    </body>
</html>
