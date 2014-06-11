/**
 * filter.js
 * =========
 *
 * jQuery plugin to filter a table while simultaneously getting data via AJAX. 
 *
 * Options passed must include the URL to get the data from, the table to filter the data in, and a function to build 
 * the HTML from the returned data.
 *
 * Optionally you may specify the AJAX dataType as well as the name of the query and page parameters. 'q' and 'page' are
 * assumed if not specified respectively. If a dataType is not passed, JSON will be assumed.
 *
 * The return value of the buildEntries parameter will be the new content of the specified table.
 *
 * Copyright (c) 2014 Walker Crouse <walkercrouse@hotmail.com> Licensed MIT
 *
 * @author Walker Crouse
 *
 */
(function ( $ ) {

    /**
     * Thrown when invalid arguments are passed to a function.
     *
     * @param string message
     */
    function IllegalArgumentException(msg) {
        this.msg = msg;
    }

    /**
     * Thrown when a variable that is excepted to be defined is not.
     *
     * @param string message
     */
    function UndefinedException(msg) {
        this.msg = msg;
    }

    $.fn.filter = function(options) {

        // make sure currentPage is defined
        if (typeof currentPage == 'undefined') {
            throw new UndefinedException("the variable 'currentPage' MUST be defined in the same scope of this plugin");
        }

        // build options
        var defaults = {
            url: null,          // NOT NULL -- URL to fetch and filter resources from
            dataType: "json",   // NOT NULL -- AJAX dataType
            table: null,        // NOT NULL -- Element to populate filtered resources with
            buildEntries: null, // NOT NULL -- Function to build HTML from returned data
            queryParam: 'q',    // NOT NULL -- Parameter name for query string
            pageParam: "page",  // NOT NULL -- Parameter name for page number
            before: null,       // NULLABLE -- Function to call before each AJAX request
            after: null,        // NULLABLE -- Function to call after each AJAX request, regardless of result
        };
        options = $.extend(defaults, options);

        if (options.url == null) {
            options['url'] = $(this).attr('data-url');
        }

        if (options.table == null) {
            options['table'] = $(this).attr('data-table');
        }

        // argument checking
        var notNull = {
            url: "no specified URL to filter resources from",
            dataType: "no sepcified dataType to parse resources to",
            table: "no specified element selector to populate filtered resources with",
            buildEntries: "no specified function to build HTML from returned data with",
            queryParam: "no specfied parameter name for a query string to filter resources with",
            pageParam: "no specified parameter name for a page number to paginate data with"
        };

        // check for nulls
        for (var key in notNull) {
            if (defaults[key] == null) {
                throw new IllegalArgumentException(notNull[key]);
            }
        }

        // filter data on keyup
        $(this).keyup(function() {
            currentPage = 1;

            // get the new query
            var query = $(this).val();

            // build AJAX request
            var request = {
                url: options.url,
                data: {},
                type: "GET",
                dataType: options.dataType,

                success: function(data) {
                    // invoke callback to generate HTML from returned data
                    var table = $(options.table);
                    table.html(options.buildEntries(data));
                }
            };

            if (options.before != null) {
                options.before(request);
            }

            // append data
            var data = request["data"];
            data[options.queryParam] = query;
            data[options.pageParam] = currentPage; // NOTE: This must be defined outside of this scope

            // send request
            $.ajax(request).always(function() {
                if (options.after != null) {
                    options.after();
                }
            });
        });
    };
 
}( jQuery ));
