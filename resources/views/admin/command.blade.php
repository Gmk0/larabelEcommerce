@extends('Layout.appAdmin')
@section('title')
    commande
@endsection

@section('contenu')

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
                            
                        @endforeach
                        <tr>
                            <td>{{$increment}}</td>
                            <td>{{$orders->nom }}</td>
                            <td>oshwe</td>
                            <td>legume</td>
                            <td>500fghf</td>
                            <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">Edit</button>
                              <button class="btn btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                       
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