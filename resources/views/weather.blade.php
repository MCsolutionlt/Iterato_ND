<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Orai</title>

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="usr">Api key:</label>
                <input type="text" class="form-control" id="api_key" placeholder="ea12b1aee61fee4764c948bb94d1c507" value="ea12b1aee61fee4764c948bb94d1c507" id="api_key">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="input-group">
                <input type="text" id="city" class="form-control" placeholder="Vilnius" aria-label="Vilnius">
                <span class="input-group-btn">
                <button class="btn btn-secondary btn-success" type="button" id="search"><span class="glyphicon glyphicon-ok"></span></button>
                </span>
            </div>
        </div>
    </div>

    <h2>Orai</h2>
    <ul class="nav nav-tabs">
    </ul>

    <div class="tab-content">
    </div>
</div>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('#search').on('click', function (e) {
            e.preventDefault();
            var classSet = '';
            var classDiv = '';
            var api_key = $('#api_key').val();
            var city = $('#city').val();
            $.post('{{ Route('getWeather') }}', {'api_key' : api_key, 'city' : city}, function (data, status, xhr) {
                if (status) {
                    var tabNo = $('ul.nav.nav-tabs li').length;
                    if (tabNo < 1) {
                        classSet = 'class="active"';
                        classDiv = 'in active';
                    }
                    $('ul.nav.nav-tabs').append('<li ' + classSet + '><a href="#city' + tabNo + '">' + data.city + '</a></li>');
                    $('div.tab-content').append('<div id="city' + tabNo + '" class="tab-pane fade ' + classDiv + '"><h3>' + data.city + '</h3><p>Oras: ' + data.weather + '</p><p>Temperatūra: ' + data.temp + '</p></div>');
                }
            }, 'json');
        });

        $(".nav-tabs").on('click', 'a', function(e){
            e.preventDefault();
            $(this).tab('show');
        });

    });


</script>

</body>
</html>
