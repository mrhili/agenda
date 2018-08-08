
@extends('back.layouts.app')

@section('styles')

@endsection

@section('content')



            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter une founiture à cette class</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->

              </div>
              <!-- /.box-header -->
            <div class="box-body">

              <form id="form">


                  <div class="form-group col-xs-12">
                  {{ csrf_field() }}
                  </div>
                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'fourniture', 'type' => 'select', 'selected' => null,'text' => 'Ajouter une matiére à cette class', 'class'=>'', 'required' => true, 'array' => $fournituresArray  ,'additionalInfo' => ['id' =>  'fourniturefield']])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                  </div>

                  <div class="col-xs-12">

                      <button  type="button" class="btn btn-primary" id="add-fourniture" >Enregistrer</button>
                  </div>



              </form>


            </div>
            <!-- /.box-body -->
          </div>




<div class="row" id="fournitures">


    @foreach( $fournitures as $fourniture  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $fourniture->name }}</h3>
              <h5 class="widget-user-desc">Coéfficient: {{ $fourniture->pivot->parameter }}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="">... <span class="pull-right badge bg-aqua">...</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

    @endforeach

</div>




@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')

                  
  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')



@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>

<script type="text/javascript">

var addFourniture = $('#add-fourniture');
var fournitures = $('#fournitures');

var the_class = {{ $class->id }};

var comment, hidden_note, name;



          addFourniture.on("click", function(e){

            addFourniture.attr('disabled', true);


            if( $('#form').valid() ){


              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              parameter = $('#parameterfield').val();
              fourniture = $('#fourniturefield').val();


  
///link-fourniture-class/{class}/{fourniture_id}
              axios.post('/link-fourniture-class/'+ the_class +'/'+ fourniture,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                parameter: parameter,
                comment: comment,
                hidden_note: hidden_note

              })
                .then(function (response) {
                  console.log( response );
                  addFourniture.attr('disabled', false);

                  var returnedArray = response.data;
                  fournitures.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-yellow"><div class="widget-user-image"><img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3><h5 class="widget-user-desc">Coéfficient: '+ returnedArray['parameter']+'</h5></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="">...<span class="pull-right badge bg-aqua">...</span></a></li>></ul></div></div><!--/.widget-user--></div>');

                })
                .catch(function (error) {
                  addFourniture.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

              }

            });


</script>
@endsection