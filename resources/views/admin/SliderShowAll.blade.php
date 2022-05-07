@extends('Layout.appAdmin')
@section('title')
    
@endsection

@section('contenu')

  {{Form::hidden('',$increment =1)}}

 <!-- partial -->
    

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">SLIDER</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>image </th>
                            <th>Description </th>
                            <th>Description </th>
                            
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($slider as $slider)
                            <tr>
                            <td>{{$increment}}</td>
                            <td> <img src="/Storage/slider_images/{{$slider->slider_image}}" alt=""></td>
                            <td>{{$slider->description_one}}</td>
                            <td>{{$slider->description_two}}</td>
                            @if ($slider->status==1)
                              <td><label class="badge badge-success">Activer</label></td>
                              @else
                                <td><label class="badge badge-warning">Desactiver</label></td>
                            @endif
                            <td>
                              <a href="{{URL::to('/edit_slider/'.$slider->id)}}" class="btn btn-outline-primary">Edit</a>
                              <a href="{{URL::to('/delete_slider/'.$slider->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
                              @if ($slider->status==1)
                                 <a href="{{URL::to('/desactiver_slider/'.$slider->id)}}" id="" class="btn btn-outline-warning">Desactiver</a> 
                                @else
                                  <a href="{{URL::to('/activer_slider/'.$slider->id)}}" id="" class="btn btn-outline-success">Activer</a> 
                              @endif
                            </td>
                        </tr>
                        {{Form::hidden('',$increment =$increment+1)}}
                        @endforeach
                        
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