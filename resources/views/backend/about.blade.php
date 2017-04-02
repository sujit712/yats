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
            <div class="panel-heading">About Header</div>
            <div class="panel-body">
                <form action="{{ route('about_backend.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                          <label for="image">Insert Image </label>
                          <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <div class="form-group">
                          <label for="Caption">Caption:</label>
                          <input class="form-control" type="text" name="caption" id="caption">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
<div class="col-md-12">
     <div class="panel panel-default">
        <div class="panel-heading">Portfolio Show</div>
            <div class="panel-body">         
                <table class="table">
                    <tr>
                      <th>Image</th>
                      <th>Caption</th>
                      <th>Action</th>
                    </tr>
                    @foreach($data as $val)
                    <tr>
                    <td><img src="{{$val->image}}" height="100px" width="100px" data-toggle="modal" data-target="#showimagemodel{{$val->id}}"></td>
                    <td> 
                         {{$val->caption or 'No Caption'}}
                    </td>
                    <td class="action">
                      <form action="{{route('about_backend.destroy', $val->id)}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        
                        <input type="hidden" name="image" value="{{$val->image}}">
                        <button type="submit" class="btn btn-danger delimg"><i class="fa fa-trash"></i></button>
                      </form>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#editmodel{{$val->id}}"><i class="fa fa-edit"></i></button></td></tr>
                      <div id="showimagemodel{{$val->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog model-lg">
                        <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-body">
                              <img src="{{$val->image}}" height="100%" width="100%">
                            </div>
                          </div>
                        </div>
                      </div>


                    <div id="editmodel{{$val->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog model-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Change Image</h4>
                        </div>
                        <div class="modal-body">

                          <form action="{{route('about_backend.update', $val->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                             {{ method_field('PUT') }}
                            
                            <input type="hidden" name="image_old" value="{{$val->image}}">
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <img src="{{$val->image}}" height="200px" width="200px">
                                <div class="form-group">
                                  <label for="image">Update Image </label>
                                  <input class="form-control" type="file" name="image" id="image">
                                </div>
                                <div class="form-group">
                                  <label for="Caption">Caption:</label>
                                  <input class="form-control" type="text" name="caption" id="caption" value="{{$val->caption}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>    
                          </form>

                          </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                      </div>
                    </div>
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


                                     
                                     
                                     
                                     
