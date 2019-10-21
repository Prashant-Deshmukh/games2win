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
            Create Event
        </div>

        <form action="{{route('cms.store')}}" method="POST">
            @csrf
            <div align="left">
                <label style="font-weight: bold;">Game</label><br/>
                <select name="game" id="game" required>
                    <option value="">--Select--</option>
                    @foreach($game_listing  as $key => $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div align="left">
                <label style="font-weight: bold;">Event Name</label><br/>
                <input name="event_name" id="event_name" value="" required autocomplete="off">
            </div>
            <br>
            <div align="left">
                <label style="font-weight: bold;">Event Type</label><br/>
                <select name="event_type" id="event_type" required>
                    <option value="">--Select--</option>
                    @foreach($event_type as $key => $value)
                        <option value="{{$value}}">{{ucfirst($value)}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div align="left">
                <label style="font-weight: bold;">Single, Multiplayer or Special ?</label><br/><br/>
                <label>Single Player</label>
                <input type="radio" name="player_option" value="single_player"><br/>

                <label>Multi Plyer</label>
                <input type="radio" name="player_option" value="multi_player" required><br/>

                <label>Special Event</label>
                <input type="radio" name="player_option" value="special_event" required><br/>
            </div>

            <br>
            <div align="left">
                <label style="font-weight: bold;">Items that can be used (only those with weightage will be considered)</label><br/>
                <table>
                    <tr>
                        <th>Category</th>
                        <th>Weightage</th>
                    </tr>
                    <tr>
                        <td>Dresses</td>
                        <td>
                            <input type="text" name="dresses" id="dresses">
                        </td>
                    </tr>
                    <tr>
                        <td>Tops</td>
                        <td>
                            <input type="text" name="tops" id="tops">
                        </td>
                    </tr>
                    <tr>
                        <td>Bottoms</td>
                        <td>
                            <input type="text" name="bottoms" id="bottoms">
                        </td>
                    </tr>
                    <tr>
                        <td>Shoes</td>
                        <td>
                            <input type="text" name="shoes" id="shoes">
                        </td>
                    </tr>
                    <tr>
                        <td>Bags</td>
                        <td>
                            <input type="text" name="bags" id="bags">
                        </td>
                    </tr>
                    <tr>
                        <td>Jewellery</td>
                        <td>
                            <input type="text" name="jewellery" id="jewellery">
                        </td>
                    </tr>
                    <tr>
                        <td>Accessories</td>
                        <td>
                            <input type="text" name="accessories" id="accessories">
                        </td>
                    </tr>
                    <tr>
                        <td>Background</td>
                        <td>
                            <input type="text" name="background" id="background">
                        </td>
                    </tr>

                    <tr>
                        <td>Hair</td>
                        <td>
                            <input type="text" name="hair" id="hair">
                        </td>
                    </tr>

                    <tr>
                        <td>Props</td>
                        <td>
                            <input type="text" name="prop" id="prop">
                        </td>
                    </tr>

                </table>
            </div>
            <br/>
            <div align="left">
                <input type="submit" name="submit" value="Submit">
                <input type="reset" name="cancel">
            </div>
        </form>
    </div>
</div>
</body>
</html>
