{!! Form::model($user,[ 'method' => 'put', 'route'=> ['users.edit', $user->id ], 'class' => 'form-horizontal' ]) !!}

    {{ csrf_field() }}


    @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Prénom', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'last_name', 'type' => 'text', 'text' => 'Nom', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'gender', 'type' => 'select', 'selected' => null , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::gender() ,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'phone', 'type' => 'text', 'text' => 'Téléphone', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'whatsapp', 'type' => 'tel', 'text' => 'Whatsapp', 'class'=>'', 'required' => false,'additionalInfo' => []])

    {{ $slot }}

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">Submit</button>
    </div>
  </div>
{!! Form::close() !!}
