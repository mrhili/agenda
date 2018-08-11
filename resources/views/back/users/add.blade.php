

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::open(['route' => 'users.add', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau {{ $kind }}

  @endslot


  @slot('sectionPlain')

    {{ csrf_field() }}

    <div class="text-center">
      <h3 >Role</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'role', 'type' => 'select', 'selected' => $role_id , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::roles() ,'additionalInfo' => []])
    <hr />
    <div class="text-center">
      <h3 >Naicessaire information</h3>
      <p>
        ...
      </p>
    </div>

    <div class="col-xs-12 form-group">
      <div class="col-sm-2 control-label"><b>Image</b></div>
      <div class="col-sm-10">
        <input type="file" name="img" value="" class="form-control">

      </div>
    </div>



  	@include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Prénom', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'last_name', 'type' => 'text', 'text' => 'Nom', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'gender', 'type' => 'select', 'selected' => null , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::gender() ,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'phone', 'type' => 'text', 'text' => 'Téléphone', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'whatsapp', 'type' => 'tel', 'text' => 'Whatsapp', 'class'=>'', 'required' => false,'additionalInfo' => []])


    <hr />
    <div class="text-center">
      <h3 >Login information</h3>
      <p>
        ...
      </p>
    </div>


  	@include('back.partials.formG', ['name' => 'email', 'type' => 'email', 'text' => 'E-mail', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'password', 'type' => 'text', 'text' => 'Password', 'class'=>'', 'required' => true,'additionalInfo' => []])



  @endslot


  @slot('footerPlain')

	@component('back.components.button')

	  @slot('value')

	  	Enregistrer

	  @endslot

	@endcomponent

  @endslot


@endcomponent


@endsection
{!! Form::close() !!}


@section('scripts')

<script type="text/javascript">



</script>
@endsection
