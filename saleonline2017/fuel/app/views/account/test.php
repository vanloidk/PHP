<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Autocomplete - Categories</title>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://resources/demos/style.css">
        <style>
            .ui-autocomplete-category {
                font-weight: bold;
                padding: .2em .4em;
                margin: .8em 0 .2em;
                line-height: 1.5;
            }
        </style>
    </head>
    <body>
        <table id="my-table" class="tablesorter">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price (in dollars)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>The CSS3 Anthology, 4th Edition</td>
                    <td>Rachel Andrew</td>
                    <td>29.00</td>
                </tr>
                <tr>
                    <td>Instant jQuery Selectors</td>
                    <td>Aurelio De Rosa</td>
                    <td>13.26</td>
                </tr>
                <tr>
                    <td>Killer UX Design</td>
                    <td>Jodie Moule</td>
                    <td>29.00</td>
                </tr>
                <tr>
                    <td>Jump Start CSS</td>
                    <td>Louis Lazaris</td>
                    <td>19.00</td>
                </tr>
            </tbody>
        </table>
        <div id="pager" class="pager">
            <img src="http://mottie.github.com/tablesorter/addons/pager/icons/first.png" class="first"/>
            <img src="http://mottie.github.com/tablesorter/addons/pager/icons/prev.png" class="prev"/>
            <span class="pagedisplay"></span>
            <img src="http://mottie.github.com/tablesorter/addons/pager/icons/next.png" class="next"/>
            <img src="http://mottie.github.com/tablesorter/addons/pager/icons/last.png" class="last"/>
            <select class="pagesize" title="Select page size">
                <option selected="selected" value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <select class="gotoPage" title="Select page number"></select>
        </div>
    </body>

    <script>

        $('table').tablesorter({
            widgets: ['zebra', 'columns'],
            usNumberFormat: false,
            sortReset: true,
            sortRestart: true
        });
        $('#my-table')
                .tablesorter({
                    theme: 'blue',
                    widget: ['zebra']
                })
                .tablesorterPager({
                    container: $('#pager'),
                    size: 2
                });

    </script>
</html>