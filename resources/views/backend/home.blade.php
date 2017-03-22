@extends('layouts.app')

@section('content')
<style type="text/css">
  .action form{
    display: inline;
  }
</style>
<div class="container">
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @if (Session::has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{ Session::get('message') }}
      </div>
  @endif
  @if (Session::has('alert'))
      <div id="alert" class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{ Session::get('alert') }}
      </div>
  @endif
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Home Slider Images</h4>
              <button class="btn btn-primary"  data-toggle="modal" data-target="#addNew">Add New</button>

              <!-- Modal -->
              <div id="addNew" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Add new image</h4>
                    </div>
                    <div class="modal-body">
                      <form action="{{action('HomeController@addImageSlider')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <table class="table">
                          <tr>
                            <td>
                              <label><b>Image :</b></label>
                            </td>
                            <td>
                              <input class="form-control" type="file" name="image">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label><b>Status :</b></label>
                            </td>
                            <td>
                              <input class="form-control" type="checkbox" name="status">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <button class="form-control btn btn-primary" type="submit" name="addImage">Submit</button>
                            </td>
                          </tr>
                        </table>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="panel-body">
              <table class="table">
                <tr>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @foreach($data as $val)
                  <tr>
                    <td>
                        <a data-toggle="modal" data-target="#myImage{{$val->id}}"><img src="{{$val->image}}" height="100px" width="100px"></a>

                    </td>
                    <td>@if($val->status == 1) 
                            Active
                        @else
                            Inactive
                        @endif
                    </td>
                    <td class="action">
                      <form action="{{action('HomeController@deleteImage')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$val->id}}">
                        <input type="hidden" name="image" value="{{$val->image}}">
                        <button type="submit" class="btn btn-danger delimg"><i class="fa fa-trash"></i></button>
                      </form>
                      <!-- <a href="deleteImage/{{$val->id}}" class="btn btn-danger delrow"><i class="fa fa-trash-o "></i></a> -->
                      <!-- <button  class="btn btn-danger"><i class="fa fa-trash"></i></button> -->|<button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$val->id}}"><i class="fa fa-edit"></i></button>
                    </td>
                  </tr>

                  <!-- Modal change Image -->
                  <div id="myModal{{$val->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Change Image</h4>
                        </div>
                        <div class="modal-body">
                          <form action="{{action('HomeController@updateImageSlider')}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}

                            <input type="hidden" name="id" value="{{$val->id}}">
                            <input type="hidden" name="image_old" value="{{$val->image}}">
                            <label><b>Image :</b></label>
                            <img src="{{$val->image}}" width="150px" height="150px">
                            <br>
                            <br>
                            <input class="form-control" type="file" name="image">

                            <label><b>Status :</b></label>
                            @if($val->status == 1)
                              <input class="form-control" type="checkbox" name="status" checked>
                            @else
                              <input class="form-control" type="checkbox" name="status">
                            @endif

                            <br>
                            <button class="form-control btn btn-primary" type="submit" name="addImage">Submit</button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- End Model change image -->


                  <!-- Modal Show Image -->
                  <div id="myImage{{$val->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog model-lg">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-body">
                          <img src="{{$val->image}}" height="100%" width="100%">
                        </div>
                      </div>

                    </div>
                  </div>

                  <!-- end show image -->
                    
                @endforeach
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $('document').ready(function(){
    $('.delimg').click(function(){
      var a = confirm('Are you sure ?');
      if(a == 1){
        return true;
      }else {
        return false;
      }
    })
  });
</script>
@endsection
