# filter.js

## Overview

filter.js is a small and simple jQuery plugin that makes resource filtering a piece of cake. With filter.js you can
filter resources that are in an element while simultaneously retrieving additional resources that may not be displayed
in a table. filter.js allows you to filter paginated data that is not loaded on the client yet.

This plugin works well with [more.js](https://github.com/windy1/more.js).

## Getting Started

filter.js is relatively easy to setup.

### What you need:

* A URL to fetch additional resources from
* Element selector to populate filtered resources with. The table is cleared every keyup.
* Element selector to get the query string from.
* Function to build HTML from returned data.

## Example

```html
<html>
    <body>
        <input name="filter" type="text" placeholder="Filter resources&hellip;" id="filter">
        <table id="resources-table">
            ...
        </table>
        <script>
        var currentPage = 1; // This MUST be defined

        $("#filter").filter({
            url: "http://example.com/resources/json",
            dataType: "xml", // defaults to json
            queryParam: "query", // defaults to 'q'
            pageParam: "p", // defaults to "page"
            table: "#resources-table",

            buildEntries: function(json) {
                currentPage = 1;
                return buildCompanyEntries(json);
            }
        });
        </script>
    </body>
</html>
```

## License

filter.js is licensed under the MIT License. The full text can be found in the [LICENSE.md](LICENSE.md)
