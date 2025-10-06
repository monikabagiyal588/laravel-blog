@extends('layouts.app')
@section('content')
<div class="container">
  <h1>Register</h1>
  <section class="mt-3">
    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
      @csrf
      <!-- Error message when data is not inputted -->
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card p-3">
        <label for="floatingInput">Name</label>
        <input class="form-control" type="text" name="name">
        <label for="floatingInput">Email</label>
        <input class="form-control" type="text" name="email">
        <label for="floatingInput" class="form-label">password</label>
        <input class="form-control" type="text" name="password">
      </div>
      <button class="btn btn-secondary m-3">Save</button>
    </form>
  </section>
    
</div>
@endsection