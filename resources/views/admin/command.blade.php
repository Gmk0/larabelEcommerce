@extends('Layout.appAdmin')
@section('title')
    commande
@endsection

@section('contenu')
  {{Form::hidden('',$increment =1)}}

       @if (Session::has('error'))
                      <div class="alert alert-danger" role="alert" >
                             <button type="button" class="close primary" data-dismiss="alert" aria-label="close">
                              <span aria-label="true">&times;</span>
                      </button>
                              <p> {{Session::get('error')}}</p>
                           {{---Session::put('message',null)---}}
                       </div>
                    
                      
                  @endif
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Nom du client</th>
                            <th>Adresse</th>
                            <th>Panier</th>
                            <th>Payement id</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                         <tr>
                            <td>{{$increment}}</td>
                            <td>{{$order->nom }}</td>
                            <td>{{$order->adresse }}</td>
                            <td>
                              @foreach ($order->panier->items as $item)
                                   {{$item['product_name'].', ' }}
                              @endforeach
                             </td>
                            <td>{{$order->payement_id }}</td>
                            <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                              <a href="{{url('/voir_pdf/'.$order->id)}}" target="_blank" class="btn btn-outline-primary">views</button>
                            </td>
                        </tr>
                            
                        @endforeach
                       
                       {{Form::hidden('',$increment =$increment+1)}}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    @endsection
    @section('script')
    <script src="backend/js/data-table.js"></script>
     @endsection