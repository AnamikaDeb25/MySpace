
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Space</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</head>
<body>
<style>
body {
  background-image: url('https://mir-s3-cdn-cf.behance.net/project_modules/1400/a4b33886128681.5d909dad47ded.jpg');
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height:100%
  width:100%
}
</style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    My Space
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <nav class="my-2 my-md-0 mr-md-3 top-nav">
                                <!-- <a class="p-2 text-dark {{(request()->route()->getName()=='home')?'active':''}}" href="{{route('home')}}">Home</a> -->
                                <!-- <a class="" href="">Logout</a> -->
                            </nav>
                        </ul>
                </div>
            </div>
        </nav>
    </div>
</body>  
@if(session('success'))
  <!-- toastr.success('{{session("success")}}', 'Success', {timeOut: 5000}); -->
    <div class="alert alert-success">
      <strong>Success! </strong>{{session('success')}}
    </div>
  @endif
  @if(session('error'))
  <div class="alert alert-success">
      <strong>Error! </strong>{{session('success')}}
    </div>
  @endif

  <body>
  <div class = "container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="abcd">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">Images</div>
                            <div>
                                <form class="from-inline">
                                    <select class="form-control" onchange="sort_by(this.value)">
                                    <option value="latest" {{((request()->query('sort_by') && request()->query('sort_by')=='latest' ) || !request()->query('sort_by') )?'selected':''}}>Latest</option>
                                    <option value="oldest" {{(request()->query('sort_by') =='oldest')?'selected':''}} >Oldest</option>
                                    </select>
                                </form>
                            </div>
                    </div>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p>Filter by category</p>
                            <div class="list-group">
                                <a herf="javascript:filter_image('')" onclick="filter_image('')" class="list-group-item list-group-item-action {{(!request()->query('category'))?'active':''}}">All</a>
                                <a herf="javascript:filter_image('personal')" onclick="filter_image('personal')" class="list-group-item list-group-item-action {{(request()->query('category')=='personal')?'active':''}}">Personal</a>
                                <a herf="javascript:filter_image('family')" onclick="filter_image('family')" class="list-group-item list-group-item-action {{(request()->query('category')=='family')?'active':''}}">Family</a>
                                <a herf="javascript:filter_image('friends')" onclick="filter_image('friends')" class="list-group-item list-group-item-action {{(request()->query('category')=='friends')?'active':''}}">Friends</a>
                                <a herf="javascript:filter_image('others')" onclick="filter_image('others')" class="list-group-item list-group-item-action {{(request()->query('category')=='others')?'active':''}}">Others</a>
                            </div>
                        </div>
                        <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-12">

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                    <strong>Error</strong>{{$error}}
                                    </div>
                                    
                                    
                                @endforeach
                            @endif


                            <button data-toggle="collapse" class="btn btn-success" data-target="#demo">Add pic</button>

                                <div id="demo" class="collapse">
                                    <form action="{{route('image-store')}}" method="post" id="image_upload_form" enctype="multipart/form-data"">
                                        @csrf
                                        <div class="form-group">
                                            <label for="caption">Image Caption</label>
                                            <input type="text" name="caption"class="form-control" placeholder="Enter caption" id="caption">
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Select Category:</label>
                                            <select name="category" class="form-control" id="category">
                                                <option value="personal">Personal</option>
                                                <option value="family">Family</option>
                                                <option value="friends">Friends</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Upload Image</label>
                                            <div class="preview-zone hidden">
                                                <div class="box box-solid">
                                                    <div class="box-header with-border">
                                                        <div><b>Preview</b></div>
                                                            <div class="box-tools pull-right">
                                                                <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                                    <i class="fa fa-times"></i> Reset image
                                                                </button>
                                                            </div>
                                                    </div>
                                                <div class="box-body"></div>
                                            </div>
                                        </div>


                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="glyphicon glyphicon-download-alt"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="image" class="dropzone">
                                            </div>

                                            <!-- <div id="image_error"></div> -->


                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>                                                                          
                        
                            <div class="col-md-12 mt-4">
                            <div class="row">
                                @if(count($images))
                                    @foreach($images as $image)
                                    <div class="col-md-3 mb-4">
                                        <a href="{{asset('user_images/'.$image->image)}}" class="fancybox" data-caption="{{$image->caption}}" data-id="{{$image->id}}" data-fancybox="{{$image->category}}">
                                            <img src="{{asset('user_images/thumb/'.$image->image)}}" height="110%" width="110%">
                                        </a>
                                    </div>
                                    @endforeach
                                @else
                                <div class="col-md-12 ">
                                    <p>No imag found</p>
                                </div>
                                @endif

                                @if(count($images))
                                <div class="col-md-12 ">
                                    {{$images->appends(request()->query())->links('pagination::bootstrap-4')}}
                                </div>
                                @endif


                                
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

var query={};

@if(request()->query('category'))
     Object.assign(query,{"category":"{{request()->query('category')}}"});
@endif
@if(request()->query('sort_by'))
     Object.assign(query,{"sort_by":"{{request()->query('sort_by')}}"});
@endif

function filter_image(value){
    Object.assign(query,{'category':value});
    window.location.href="{{route('dashboard')}}"+'?'+$.param(query);
}
function sort_by(value){
    Object.assign(query,{'sort_by':value});
    window.location.href="{{route('dashboard')}}"+'?'+$.param(query);
}



$.fancybox.defaults.btnTpl.delete = '<button class="fancybox-button fancybox-delete-button" title="Delete">Delete</button>';
$.fancybox.defaults.buttons = ['delete','close','download','share'];

$("#image_upload_form").validate({
  rules: {
    caption: {
      required: true,
      maxlength: 255
    },
    category: {
      required: true
    },
    image: {
      required: true,
      extension:"png|jpg|jpeg|bmp"
    }
  },
  messages: {
    caption: {
      required: "Please enter an image caption",
      maxlength: "Maximum 255 characters allowed!"
    },
    category: {
      required: "Please select an image category",
    },
    image: {
      required: "Please select an image",
      extension:"Only png,jpg,jpeg,bmp allowed"
    }
  },
//   errorPlacement:function(error,element){
//       if(element.attr('name')=="image"){
//           error.insertAfter("#image_error");
//       }
//       else{
//           error.insertAfetr(element);
//       }
//   }
});

function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {

    var validimgtype = ['image/png','image/bmp','image/jpeg','image/jpg'];

    if(!validimgtype.includes(input.files[0]['type'])){
        var htmlPreview =
        '<p>Image preview not available</p>' +
        '<p>' + input.files[0].name + '</p>';
    }else{
        var htmlPreview =
        '<img width="70%" height="300" src="' + e.target.result + '" />' +
        '<p>' + input.files[0].name + '</p>';
    }
      
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function reset(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}

$(".dropzone").change(function() {
  readFile(this);
});

$('.dropzone-wrapper').on('dragover', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function() {
  var boxZone = $(this).parents('.preview-zone').find('.box-body');
  var previewZone = $(this).parents('.preview-zone');
  var dropzone = $(this).parents('.form-group').find('.dropzone');
  boxZone.empty();
  previewZone.addClass('hidden');
  reset(dropzone);
});

</script>
           
</body>
</html>

