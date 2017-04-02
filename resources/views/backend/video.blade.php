@extends('layouts.app')

@section('content')
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
            <div class="panel-heading">Video Header</div>
                <div class="panel-body">
                   <form action="{{action('VideoController@video_header')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <div class="form-group">
                                <label for="image">Insert Image </label>
                                <input class="form-control" type="file" name="image" id="image">
                              </div>
                              <div class="form-group">
                                <label for="Caption">Caption:</label>
                                <textarea class="form-control" rows="5" name="caption" id="caption" ></textarea>
                              </div>
                             <button type="submit" class="btn btn-default">Submit</button>
                             </div>
                        </div>    
                    </form>
                 </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Video Header Show</div>
                <div class="panel-body">
                   
                   <table class="table">
                    <tr>
                      <th>Image</th>
                      <th>Title</th>
                    </tr>
                    <tr>
                      <td><img src="{{$image}}" height="100px" width="100px" data-toggle="modal" data-target="#showsingleimage"></td>
                      <td>{{$title}}</td>
                    </tr>
                    </table>
                </div>
                <div id="showsingleimage" class="modal fade" role="dialog">
                      <div class="modal-dialog model-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-body">
                            <img src="{{$image}}" height="100%" width="100%">
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Video</div>
                <div class="panel-body">
                   <form action="{{action('VideoController@create')}}" method="post" enctype="multipart/form-data">
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
                              <div class="form-group">
                                <label for="video_url">Video url:</label>
                                <input class="form-control" type="text" name="video_url" id="video_url" placeholder="http://www.youtube.com/embed/0ch2YPSdfFQ">
                              </div>
                                 <div class="form-group">
                                  <label for="property">Property:</label>
                                  <select class="form-control" id="property" name="property">
                                         <option value="">Default</option>
                                         <option value="wide">Wide</option>
                                         <option value="tall">Tall</option>
                                         <option value="wide tall">Wide Tall</option>
                                         
                                   
                                  </select>
                                </div>
                             <button type="submit" class="btn btn-default">Submit</button>
                             </div>
                        </div>    
                    </form>
                 </div>
        </div>
    </div>
    <div class="col-md-12">
     <div class="panel panel-default">
        <div class="panel-heading">Video Show</div>
            <div class="panel-body">         
                <table class="table">
                    <tr>
                      <th>Image</th>
                      <th>Caption</th>
                      <th>Property</th>
                      <th>Video URL</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    @foreach($data as $val)
                    <tr>
                    <td><img src="{{$val->display_image}}" height="100px" width="100px" data-toggle="modal" data-target="#showimagemodel{{$val->id}}"></td>
                    <td>
                       @if($val->caption=="")
                         Yatin Dandekar Photography
                         @else 
                         {{$val->caption}}
                      @endif
                    </td>
                    <td>
                      @if($val->property=="")
                         Default
                         @else 
                         {{$val->property}}
                      @endif
                    </td>
                    <td>
                      <a href="{{$val->video_url}}" target="_blank">{{$val->video_url}}</a>
                    </td>
                    <td>@if($val->status==1)
                         Active
                         @else 
                         Deactive
                         @endif
                     </td>
                    <td>
                    <form action="{{action('VideoController@destroy')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$val->id}}">
                        <input type="hidden" name="image" value="{{$val->display_image}}">
                        <button type="submit" class="btn btn-danger delimg"><i class="fa fa-trash"></i></button>
                      </form>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editmodel{{$val->id}}"><i class="fa fa-edit"></i></button></td></tr>
                    <div id="showimagemodel{{$val->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog model-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-body">
                            <img src="{{$val->display_image}}" height="100%" width="100%">
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

                            <form action="{{action('VideoController@edit')}}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$val->id}}">
                            <input type="hidden" name="image_old" value="{{$val->display_image}}">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                            <img src="{{$val->display_image}}" height="200px" width="200px">
                              <div class="form-group">
                                <label for="image">Update Image </label>
                                <input class="form-control" type="file" name="image" id="image">
                              </div>
                              <div class="form-group">
                                <label for="Caption">Caption:</label>
                                <input class="form-control" type="text" name="caption" id="caption" value="{{$val->caption}}">
                              </div>
                              <div class="form-group">
                                <label for="video_url">Video URL:</label>
                                <input class="form-control" type="text" name="video_url" id="video_url" value="{{$val->video_url}}">
                              </div>
                                 <div class="form-group">
                                  <label for="property">Property:</label>
                                  <select class="form-control" id="property" name="property">
                                         <option value="">Default</option>
                                         <option value="wide">Wide</option>
                                         <option value="tall">Tall</option>
                                         <option value="wide tall">Wide Tall</option>
                                         
                                   
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="property">Status:</label>
                                  <select class="form-control" id="status" name="status">
                                     @if($val->status==1)
                                     <option value="1" selected>Active</option>
                                     <option value="0" >Deactive</option>
                                     @else
                                     <option value="1" >Active</option>
                                     <option value="0" selected>Deactive</option>
                                     @endif
                                  </select>
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