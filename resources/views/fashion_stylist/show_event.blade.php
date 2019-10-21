<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ route('cms.index') }}">Event Listing</a>
            <a href="{{ route('cms.create') }}">Event Create</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
    @endif
    <div class="content">
        <div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('msg'))
                <div class="alert alert-info">
                    <h3>{{session()->get('msg')}}</h3>
                </div>
            @endif
        </div>
        <div class="title m-b-md">
            @php
                $event_type = Request::filled('event_type') ? Request::get ('event_type') : 'All';
                $event_info = null;
                if ($event_type != 'all') {
                    $event_info = $game_info->game_requirement->where('id', $event_type)->first();
                }
            @endphp
            Events > {{$event_info ? $event_info->event_name : 'All'}}
        </div>

        <form action="{{route('cms.index')}}" method="GET">
            <div align="left">
                <label style="font-weight: bold;">Game</label><br/>
                <select name="event_type" id="event_type" required>
                    <option value="all">All</option>
                    @foreach($event_listing  as $key => $value)
                        <option value="{{$value->id}}" {{($event_type == $value->id) ? 'Selected' : ''}}>{{$value->event_name}}</option>
                    @endforeach
                </select>
                <input type="submit" name="submit" value="Filter">
            </div>
            <br>

            <br>
            <div align="left">
                <table border="1" cellpadding="10" cellspacing="10">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Dresses</th>
                        <th>Tops</th>
                        <th>Bottoms</th>
                        <th>Shoes</th>
                        <th>Bags</th>
                        <th>Jewellery</th>
                        <th>Accessories</th>
                        <th>Background</th>
                        <th>Hair</th>
                        <th>Props</th>
                    </tr>
                    @foreach($game_info->game_requirement  as $key => $value)
                        <tr>
                            <td><input type="checkbox" name="{{$value->id}}"></td>
                            <td>{{$value->event_name}}</td>
                            <td>{{ucfirst($value->event_type)}}</td>
                            <td>{{$value->dresses }}</td>
                            <td>{{$value->tops ?? '---'}}</td>
                            <td>{{$value->bottoms ?? '---'}}</td>
                            <td>{{$value->shoes ?? '---'}}</td>
                            <td>{{$value->bags ?? '---'}}</td>
                            <td>{{$value->jewellery ?? '---'}}</td>
                            <td>{{$value->accessories ?? '---'}}</td>
                            <td>{{$value->background ?? '---'}}</td>
                            <td>{{$value->hair ?? '---'}}</td>
                            <td>{{$value->props ?? '---'}}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
            <br/>

        </form>
    </div>
</div>
</body>
</html>
