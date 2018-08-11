
@extends('back.layouts.welcome')


@section('styles')



@endsection



@section('content')



 <div class="lockscreen-logo">
    <a href="#"><b>Smar</b> Book</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Mohamed Smar</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      {!! Html::image('images/profils/profile.jpg','Smar Image', ['class' => ''] ) !!}
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
      <div class="input-group">
        <input id="email" type="email" class="form-control" name="email" placeholder="email@app.com" required autofocus>
        <hr />
        <input type="password" class="form-control" name="password" placeholder="password">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->


  <div class="lockscreen-footer text-center">
    Copyright &copy; 2018-2019 <b><a href="http://amine.bitballoon.com" class="text-black">Mohamed amine mrhili</a></b><br>
    All rights reserved
  </div>


@endsection

@section('datatableScript')



@endsection

@section('scripts')


@endsection
