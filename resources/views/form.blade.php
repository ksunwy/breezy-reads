<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    {{--
    <form action="/result">
        <input name="num1">
        <input name="num2">
        <input name="num3">
        <input type="submit">
    </form>
    @if(isset($res))
    <p>Сумма: {{ $res }}</p>
    @endif

    <form action="/result" method="post">
        @csrf
        <input type="text" name="name" placeholder="Имя" required>
        <input type="number" name="age" placeholder="Возраст" required>
        <input type="number" name="salary" placeholder="Зарплата" required>
        <input type="submit" value="Submit">
    </form>

    @if(isset($city) && isset($country))
    <p>City: {{ $city }}, Country: {{ $country }}</p>
    @endif
    <form action="/form" method="post">
        @csrf
        <input type="text" name="city" placeholder="Город" required>
        <input type="text" name="country" placeholder="Страна" required>
        <input type="submit" value="Submit">
    </form>

    @foreach ($data as $i)
    <p>{{ $i }}</p>
    @endforeach
    <form action="/form" method="post">
        @csrf
        <input type="text" name="city" placeholder="Город" required>
        <input type="text" name="country" placeholder="Страна" required>
        <input type="submit" value="Submit">
    </form>

    @if(isset($data) && count($data) > 0)
    <p>Title: {{ $data['name'] }}, Text: {{ $data['login'] }}</p>
    @endif
    <form action="/form" method="post">
        @csrf
        <input type="text" name="name" placeholder="Имя" required>
        <input type="text" name="surname" placeholder="Фамилия" required>
        <input type="text" name="family_name" placeholder="Отчество">
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="submit" value="Submit">
    </form>

    @if(isset($data) && count($data) > 0)
    <ul class="list-none">
        @foreach($data as $key => $value)
        <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
        @endforeach
    </ul>
    @endif
    <form action="/form" method="post">
        @csrf
        <input type="text" name="name" placeholder="Имя" required>
        <input type="text" name="surname" placeholder="Фамилия" required>
        <input type="text" name="family_name" placeholder="Отчество">
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="submit" value="Submit">
    </form>

    --}}
    @if(isset($id) && isset($login))
    <h2>User ID: {{ $id }}, Login: {{ $login }}</h2>
    @endif

    @if(isset($formData))
    <ul>
        @foreach($formData as $key => $value)
        <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ url("/user/$id/$login") }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Имя" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="submit" value="Submit">
    </form>

</body>

</html>