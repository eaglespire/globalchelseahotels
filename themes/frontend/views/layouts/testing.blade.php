<html>
    <head>
    
    </head>

    <body>
        <select id="e9" multiple>
            <option>Jude</option>
            <option>James</option>
            <option>John</option>
            <option>Peter</option>
        </select>
        <link rel="stylesheet" href="{{ asset('select2/css/select2.css') }}" />
        <script src="{{ asset('select2/js/jquery.js') }}"></script>

        <script src="{{ asset('select2/js/select2.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#e9').select2({
                    placeholder: "Select Rooms"
                    , selectionCssClass: "bg-opacity-50 focus:border-yellow-500 focus:bg-transparent focus:ring-2 focus:ring-yellow-500 leading-8 transition-colors duration-200 ease-in-out text-base text-gray-700 rounded h-14 border-yellow-500"
                    , allowClear: true
                , })
            });

        </script>


    </body>
</html>