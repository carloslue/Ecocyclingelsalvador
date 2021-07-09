@extends('layouts.app')

@section('template_title')
    Comentario
@endsection

@section('content')
    <div class="container -fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="cad">
                    <div class="card-header bg-primary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Comentario que has enviado a Ecocycling') }}
                            </span>

                           
                        </div>
                    </div>
                   

                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion</th>

                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comentarios as $comentario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $comentario->Descripcion }}</td>

                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $comentarios->links() !!}
            </div>
        </div>
    </div>
@endsection

<style>
   .card-body{
    background: rgba(0, 0, 0, 0.514);
   } 

  th{
      color: rgb(6, 238, 6);
  }
  td{
      color: aliceblue; 
  }
   
</style>