@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')

  <div class="row">




          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{ $users }} User</h3>
                  <p><a href="{{ route('users.list', 0) }}">List</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-file"></i>
                </div>
                <a href="{{ route('users.add', 0) }}" class="small-box-footer">Ajouter un user <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{ $workers }} Worker</h3>
                    <p><a href="{{ route('users.list', 1) }}">List</a></p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-file"></i>
                  </div>
                  <a href="{{ route('users.add', 1) }}" class="small-box-footer">Ajouter un user <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>{{ $admins }} Admin</h3>
                      <p><a href="{{ route('users.list', 2) }}">List</a></p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-file"></i>
                    </div>
                    <a href="{{ route('users.add', 2) }}" class="small-box-footer">Ajouter un user <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>{{ $informations }} Info</h3>
                      <p><a href="{{ route('adresses.list') }}">Informations</a></p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-file"></i>
                    </div>
                    <a href="{{ route('adresses.list') }}" class="small-box-footer">Informations <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

    </div>


@endsection
