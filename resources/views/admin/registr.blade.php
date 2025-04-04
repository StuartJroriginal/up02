@extends('layouts.app') <!-- Расширяем базовый шаблон приложения -->

@section('content') <!-- Определяем секцию контента -->
<div class="container">
<h2>Регистрация пользователя</h2> <!-- Заголовок страницы -->

@if ($errors->any()) <!-- Если есть ошибки валидации -->
    <div class="alert alert-danger"> <!-- Выводим блок ошибки -->
        <ul>
            @foreach ($errors->all() as $error) <!-- Перебираем все ошибки -->
                <li>{{ $error }}</li> <!-- Выводим каждую ошибку в списке -->
            @endforeach
        </ul>
    </div>
@endif

@if (session('success')) <!-- Если есть успешное сообщение из сессии -->
    <div class="alert alert-success"> <!-- Выводим блок успешного сообщения -->
        {{ session('success') }} <!-- Показываем сообщение -->
    </div>
@endif

<form action="{{ route('admin.registr') }}" method="POST"> <!-- Форма для регистрации -->
    @csrf <!-- Защита от CSRF-атак -->
    <div class="mb-3">
        <label for="lastname" class="form-label">Фамилия</label> <!-- Метка для поля "Имя" -->
        <input type="text" class="form-control" name="lastname" required> <!-- Поле ввода для имени -->
    </div>

    <div class="mb-3">
        <label for="firstname" class="form-label">Имя</label> <!-- Метка для поля "Имя" -->
        <input type="text" class="form-control" name="firstname" required> <!-- Поле ввода для имени -->
    </div>

    <div class="mb-3">
        <label for="patronymic" class="form-label">Отчество</label> <!-- Метка для поля "Email" -->
        <input type="text" class="form-control" name="patronymic" required> <!-- Поле ввода для email -->
    </div>

    <div class="mb-3">
        <label for="login" class="form-label">Логин</label> <!-- Метка для поля "Email" -->
        <input type="text" class="form-control" name="login" required> <!-- Поле ввода для email -->
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Пароль</label> <!-- Метка для поля "Пароль" -->
        <input type="password" class="form-control" name="password" required> <!-- Поле ввода для пароля -->
    </div>
    
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Подтверждение пароля</label> <!-- Метка для поля "Подтверждение пароля" -->
        <input type="password" class="form-control" name="password_confirmation" required> <!-- Поле ввода для подтверждения пароля -->
    </div>

    <div class="mb-3">
        <label for="id_role" class="form-label">Роль</label> <!-- Метка для выбора роли -->
        <select name="id_role" class="form-select" required> <!-- Выпадающий список для выбора роли -->
            <option value="1">Администратор</option> <!-- Опция для администратора -->
            <option value="2">Юрист</option> <!-- Опция для юриста -->
            <option value="3">Риелтор</option> <!-- Опция для риелтора -->
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Зарегистрировать</button> <!-- Кнопка для отправки формы -->
</form>
</div>
@endsection