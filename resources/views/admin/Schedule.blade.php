@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Создать расписание для сотрудника</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedules.Schedule') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Выберите сотрудника</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <option value="">Выберите сотрудника</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->login }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date_start" class="form-label">Дата начала</label>
            <input type="datetime-local" class="form-control" id="date_start" name="date_start" required>
        </div>
        <div class="mb-3">
            <label for="date_finish" class="form-label">Дата окончания</label>
            <input type="datetime-local" class="form-control" id="date_finish" name="date_finish" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать расписание</button>

    </form>
            
</div>


@endsection