<h1>Create User</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Имя" required><br>
    <input type="email" name="email" placeholder="Почта" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <button type="submit">Create</button>
</form>
<a href="{{ route('users.index') }}">Back</a>
@if ($errors->any())
<div style="color:red">
    <ul class="list-none">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif