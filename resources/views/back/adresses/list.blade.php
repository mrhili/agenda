@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')



@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')

    <h4>Pour bien comprendre le tableau</h4>
    <a class="btn btn-info btn-xs" id="btn-add">Ajouter un nouveau numero</a>
    <br />
    <br />

<div class="table-responsive no-padding">

    <table class="table table-bordered table-striped" id="adresses-table">
        <thead>
            <tr>
                <th>nomcomplet</th>
                <th>Numero de telephone</th>
                <th>Editer</th>
                <th>Suprimer</th>

            </tr>
        </thead>
    </table>

</div>

        <div class="modal fade" id="modalpayment">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <form id="form">
              <div class="modal-body">


                  <div class="form-group col-xs-12">
                  {{ csrf_field() }}
                  </div>
                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'namefield', 'type' => 'text', 'text' => 'Prénom', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'namefield'] ])
                  </div>
                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'last_name', 'type' => 'text', 'text' => 'Nom', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'lastnamefield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'phone', 'type' => 'tel', 'text' => 'Téléphone', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'phonefield'] ])
                  </div>
                 

                  <div class="clearfix"></div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button id="add-form" type="button" class="btn btn-primary">Ajouter</button>
                <button id="update-form" type="button" class="btn btn-primary">Modifier</button>

              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
















  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')


<!-- DataTables -->
<script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>


<!-- SlimScroll -->
<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>


<!-- FastClick -->
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script type="text/javascript">

window.index = '{{ route("index") }}';

    
          var id, idOf, ad, statu_value, payment, month, comment, hoofield, users, user, exteriorinfo, exteriorname, exteriornamefield, exteriorinfos;






$(function() {
    window.t = $('#adresses-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('adresses.data' ) !!}",
        columns: [
            { data: 'nomcomplet', name: '' },
            { data: 'phone', name: 'phone' },
            { data: 'modifier', name: '' },
            { data: 'suprimer', name: '' }
        ]
    });
});

</script>

<script type="text/javascript">
  
$( document ).ready(function() {

var addform = $('#add-form');
var updateform = $('#update-form');
var id;

   addform.hide();
   updateform.hide();

$("#btn-add").on("click", function(){
   // your code goes here

   addform.show();
   updateform.hide();

   $('#modalpayment').modal('show');

});



addform.on("click", function(e){





if( $('#form').valid() ){

              addform.attr('disabled', true);
              
              namefield = $('#namefield').val();

              lastnamefield = $('#lastnamefield').val();

              phonefield = $('#phonefield').val();

              axios.get('/store-adress/',{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                namefield: namefield,
                last_name: lastnamefield,
                phone: phonefield

              })
                .then(function (response) {
                  addform.attr('disabled', false);
                  var returnedArray = response.data;
                  $('#modalpayment').modal('hide');

                  swal(
                    'Hamdullah!',
                    returnedArray['name']+' '+returnedArray['last_name']+' '+'a été ajouté avec succes',
                    'success'
                  );
                  
                  
                  console.log(returnedArray);
/*        ->editColumn('modifier', function($model){
            return link_to('#', 'modifier', ['class' => 'btn btn-info btn-circle btn-update', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ], null);
        })

        ->editColumn('suprimer', function($model){
            return link_to('#', 'modifier', ['class' => 'btn btn-info btn-circle btn-update', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ], null);
        })*/
        var nomcomplet = returnedArray['name']+' '+returnedArray['last_name'];
                  window.t.row.add( {
                    nomcomplet: nomcomplet,
            phone: returnedArray['phone'],
            modifier: '<a href="#" class="btn btn-info btn-circle btn-update" data-toggle="modal" data-target="#modal-default" data-id="'+returnedArray['id']+'">suprimer</a>',
            suprimer: '<a href="#" class="btn btn-info btn-circle btn-delete" data-toggle="modal" data-target="#modal-default" data-id="'+returnedArray['id']+'">modifier</a>'

                  }
            

        ).draw( false );

                })
                .catch(function (error) {
                  addform.attr('disabled', false);
                  swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Quelque chose est prevenu',
                    footer: 'Regle ta conexion internet et réssey',
                  });
                  alert(error);
                  console.log( error );
                });

}else{

}

  }); 




    
$("#adresses-table").on("click", ".btn-update", function(){
   // your code goes here

            id = $(this).attr('data-id');
            window.realid = $(this).attr('id');

               addform.hide();
   updateform.show();


              axios.get('/show-adress/'+id,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

              })
                .then(function (response) {
                  var returnedArray = response.data;
                  console.log(returnedArray);

                  $('#namefield').val( returnedArray['name']);

                  $('#lastnamefield').val( returnedArray['last_name']);

                  $('#phonefield').val( returnedArray['phone'] );

                  $('#modalpayment').modal('show');

                })
                .catch(function (error) {
                  updateform.attr('disabled', false);


                  alert(error);
                  console.log( error );
                });







   



});

$("#adresses-table").on("click", ".btn-delete", function(){
   // your code goes here

            id = $(this).attr('data-id');
            realid = $(this).attr('id');
            $button = $('#'+realid);
            $button.attr('disabled', true);


axios.get('/delete-adress/'+id,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

              })
                .then(function (response) {
                  
                  var returnedArray = response.data;
                  console.log(returnedArray);
                  swal(
                    'Hamdullah!',
                    'il etait suprimé ajouté avec succes',
                    'success'
                  );
                  $button.parent().parent().remove()

                })
                .catch(function (error) {

                  swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Quelque chose est prevenu',
                    footer: 'Regle ta conexion internet et réssey',
                  });
                  $button.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });


});



updateform.on("click", function(e){





if( $('#form').valid() ){

              updateform.attr('disabled', true);
              
              namefield = $('#namefield').val();

              lastnamefield = $('#lastnamefield').val();

              phonefield = $('#phonefield').val();

              axios.get('/update-adress/'+id,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                namefield: namefield,
                last_name: lastnamefield,
                phone: phonefield

              })
                .then(function (response) {
                  updateform.attr('disabled', false);
                  $('#modalpayment').modal('hide');
                  var returnedArray = response.data;
                  swal(
                    'Hamdullah!',
                    returnedArray['name']+' '+returnedArray['last_name']+' '+'a été modifié avec succes',
                    'success'
                  );
                  
                  
                  $button = $('#'+window.realid);
                  $phone = $button.parent().prev();
                  $nomcomplet = $button.parent().prev().prev();

                  $phone.text(returnedArray['phone']);
                  $nomcomplet.text(returnedArray['name']+' '+returnedArray['last_name']);
 
                  console.log(returnedArray);

                })
                .catch(function (error) {
                  updateform.attr('disabled', false);
                  swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Quelque chose est prevenu',
                    footer: 'Regle ta conexion internet et réssey',
                  });
                  alert(error);
                  console.log( error );
                });

}else{

}

  }); 
























});



</script>
@endsection