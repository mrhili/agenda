

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')


  <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $user->name }} {{ $user->last_name }}</h3>

                <p class="text-muted text-center">{{ ArrayHolder::roles( $user->role ) }}</p>


                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">About</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">

                <li><a href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
              <div class="tab-content">



                <div class="tab-pane active" id="settings">
                  @component('back.components.change_info',['user' => $user])

                  @endcomponent
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>












@endsection



@section('scripts')

<script type="text/javascript">



</script>
@endsection
