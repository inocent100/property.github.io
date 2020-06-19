
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard Template · Bootstrap</title>

    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>


    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/toggle-switchy.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/dropzone.css')}}"> --}}

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>

    <!-- Bootstrap core CSS -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    


    <style>
    
    </style>
    <!-- Custom styles for this template -->
    {{-- <link href="dashboard.css" rel="stylesheet"> --}}
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Property</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Sign out</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
              <span data-feather="file"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('posts.index')}}">
              <span data-feather="shopping-cart"></span>
              Posts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('roles.index')}}">
              <span data-feather="users"></span>
              Roles
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('pages.index')}}">
              <span data-feather="bar-chart-2"></span>
              Pages
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('catagories.index')}}">
              <span data-feather="layers"></span>
              Catagories
            </a>
          </li>
        </ul>

       
       
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      
      {{-- @if(session('status'))
  <div class="alert alert-success">
        <p>{{session('status')}}</p>

  </div>

  @endif --}}

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

@if (session('status-delete'))
<div class="alert alert-danger" role="alert">
    {{ session('status-delete') }}
</div>
@endif
@yield('content')

</main>
</div>
</div>
{{-- <script src="{{asset('js/dropzone.js')}}"></script> --}}
{{-- <script src="{{asset('js/custom.js')}}"></script> --}}
{{-- <script>
 
  $(document).ready(function(){
   $('#file-input').on('change', function(){ //on file input change
   alert();
     if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        
        var data = $(this)[0].files; //this file data
        
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                    $('#thumb-output').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
        
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
   });
  });
   
  </script> --}}
  {{-- <script src="http://malsup.github.com/jquery.form.js"></script>  --}}

  <script>
  
 
 $(document).ready(function(){

  $("#uploadFile").change(function(){
    // alert();

// $('#image_preview').html("");

var total_file=document.getElementById("uploadFile").files.length;

for(var i=0;i<total_file;i++)

{

 $('#image_preview').append("<img width='40' height='40' src='"+URL.createObjectURL(event.target.files[i])+"'>");

}

});
  
$("#files").on("change", function(e) {


        
      var maxCount = 15;
      var uploadedImages =$("#imageUploaded img").length;
      var leftImages = maxCount - uploadedImages;

      // alert($("#imageUploaded img").length);
      var $fileUpload = $(this);
      if (parseInt($fileUpload.get(0).files.length) > leftImages){
                  alert("You are only allowed to upload a maximum of 15 Images");
                  clearInputFiles();
                  countImages();
                  return
               }
      if (window.File && window.FileList && window.FileReader) {
      var files = e.target.files,
        filesLength = files.length;
        // kk=[];
      for (var i = 0; i < filesLength; i++) {
        var f = files[i];

        var fileNameCheck = f.name;
        var idxDot = fileNameCheck.lastIndexOf(".") + 1;
        var extFile = fileNameCheck.substr(idxDot, fileNameCheck.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Oops! Please Only Allow jpg/jpeg,png files");
            clearInputFiles();
            countImages();
            return;
        }   


       
       

        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;

          // alert(file.name);
          $('#imageUploaded').append($("<span class=\"pip\">" +
            "<img name='userImages[]' class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
            "<br/><span class=\"remove\">Remove</span>" +
            "</span>"));
          
        
          // $("<span class=\"pip\">" +
          //   "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
          //   "<br/><span class=\"remove\">Remove image</span>" +
          //   "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
            clearInputFiles();
            countImages();          
              // alert();
          
            });
            
             
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
        
      }
      
        } else {
        alert("Your browser doesn't support to File API")
      }

      setTimeout(function(){
        countImages();
        clearInputFiles();
        },300);

     
      
    });

    // $('form').ajaxForm(function() 
    //   {
    //     alert("Uploaded SuccessFully");
    //   }); 

    $('#changeMe').on('click', function(e) {
      // alert();
     var kk = 0;
      $('img[name^="userImages[]"]').each(function() {
          // alert(kk + " = " + $(this).attr('src'));
          // kk.push($(this).attr('src'));
          $('.upImage').eq(kk).val($(this).attr('src'));
          // $('#upImage').eq(kk).val('hello');
          kk++;
      });
      // var kk = 0;
      // $('source[name^="userVideos[]"]').each(function() {
      //     // alert(kk + " = " + $(this).attr('src'));
      //     $('.upVideo').eq(kk).val($(this).attr('src'));
      //     // kk++;
      // });
    //prevent the default submithandling
    // e.preventDefault();
    //send the data of 'this' (the matched form) to yourURL
    // $.post("route('posts.store')", $(this).serialize());
});


$("#videos").on("change", function(e) {

var maxCount = 1;
var uploadedImages =$("#VideoUploaded video").length;
var leftImages = maxCount - uploadedImages;

// alert($("#imageUploaded img").length);
var $fileUpload = $(this);
if (parseInt($fileUpload.get(0).files.length) > leftImages){
            alert("You are only allowed to upload a maximum of 1 Video Please Remove this Video and Try Again to Upload Thanks");
            clearInputVideo();
            countVideos();
            return
         }
if (window.File && window.FileList && window.FileReader) {
var files = e.target.files,
  filesLength = files.length;
  // kk=[];
for (var i = 0; i < filesLength; i++) {
  var f = files[i]

        var fileNameCheck = f.name;
        var idxDot = fileNameCheck.lastIndexOf(".") + 1;
        var extFile = fileNameCheck.substr(idxDot, fileNameCheck.length).toLowerCase();
        // .webm,.mpg,.mp2,.mpeg,.3gp,.mpe,.mpv,.ogg,.mp4,.m4p,.m4v,.avi,.wmv,.mov,.qt,.flv,.swf,.avchd
        if (extFile=="mp4" || extFile=="avi" || extFile=="asf" || extFile=="mov" || extFile=="qt" || extFile=="avchd" || extFile=="flv" || extFile=="swf" || extFile=="mpg" || extFile=="mpeg" || extFile=="wmv" || extFile=="mpeg-4"){
            //TO DO
        }else{
            alert("Oops! The "+ extFile +" Format Extension is not Supported");
            clearInputVideo();
            countVideos();
            return;
        }   

 

  var fileReader = new FileReader();
  fileReader.onload = (function(e) {
    var file = e.target;
    // id="my-video"
    // class="video-js"
    // controls
    // preload="auto"
    // width="640"
    // height="264"
    // poster="MY_VIDEO_POSTER.jpg"
    // data-setup="{}"
   
    $('#VideoUploaded').append($("<span class=\"pip1\">" +
      "<video   id='my-video' class='video-js' preload='auto'  data-setup='{}' width='320' height='240'  controls  class=\"videoThumb\" ><source name='userVideos[]' src=\"" + e.target.result + "\" title=\"" + f.name + "\"/></source></video>" +
      "<br/><span class=\"remove\">Remove</span>" +
      "</span>"));
    
    $(".remove").click(function(){
      $(this).parent(".pip1").remove();
      clearInputVideo();
      countVideos();
    });
    
    
    
  });
  fileReader.readAsDataURL(f);
}
} else {
alert("Your browser doesn't support to File API")
}
setTimeout(function(){
  // clearInputVideo();
  countVideos();
        },300);

       
});








      
    }); 

 
//get the data for edit page in post
    var id = $('#post_id').val();
  // alert(id);
  // fetchRecords(id);
  // function fetchRecords(id){
    // alert(id);
    // $.when( $.ajax({
    //             url:'getAjaxData/'+id,
    //             type:'get',
    //         })).done(function( response ) {
    //           alert(response);
 
    //                 // if(a1=="ok"){

                
    //                 //    // if(cpage=="SC" || cpage=="SD"){
    //                 //           window.location.href="report_manageSundry.php";

    //                 //     // }else{
    //                 //     // window.location.href="managePI.php";

    //                 //   //  }
    //                 // }

    //             });
        
//  alert(id);
      //  $.ajax({
      //    url: '/getRequestFolder/8',
      //    type: 'get',
      //   //  dataType: 'json',
      //    success: function(response){
      //      alert(response);
      //    }
      //  });

     

  // }

  // $.get('/getRequest/',function(data){
  //       alert(data);
  //     });



  ///////       DROP ZONE ////////////////

  // Dropzone.autoDiscover = false;

// Dropzone class:
// var myDropzone = new Dropzone("div#mydropzone", { 
//   url: "{{route('posts.store')}}",
//   autoProcessQueue : false,
//     addRemoveLinks: true,
//     maxFilesize: 2,//max file size in MB,
//     maxFiles: 5,
//     acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg,.mp4",
   
//     init: function () {
 
//       this.on("error", function (file, message) {
//                         alert(message);
//                         this.removeFile(file);
//                     });

//           this.on("maxfilesexceeded", function (file) {
//               // this.removeAllFiles();
//               // this.addFile(file);
//               this.removeFile(this.files[5]);
//               alert("Oops! Not Allowed more than 5 Images");
//            });
            

//             this.on("addedfile", function(file) {
//               //  alert("Added file."); 
//                var kk=myDropzone.files.length;
//               //  var kk=myDropzone.getAcceptedFiles().length;
//                var max = 5;
//                if(kk==max){
//                   $('#showNumbers').html('Reached the Maximum Limit '+kk);
//                 }else{
//                   $('#showNumbers').html('Uploead '+kk+ ' of 5');

//                 }
              

               


            
//             });

//             this.on("removedfile", function(file) {
//               //  alert("Added file."); 
//               //  var kk=myDropzone.files.length;
//                var kk=myDropzone.files.length;;
//                var max = 5;

//                $('#showNumbers').html('Uploead '+kk+ ' of 5');

            
//             });

//           },

         





    
  
//   });

  // $('#changeMe').on('click', function () {
  //       myDropZone.options.autoProcessQueue = true;
  //       myDropZone.processQueue();
  //  });

// If you use jQuery, you can use the jQuery plugin Dropzone ships with:
// $("div#myDrop").dropzone({ url: "/file/post" });



// Dropzone.autoDiscover = false;
// // Dropzone.options.demoform = false;	
// // let token = $('meta[name="csrf-token"]').attr('content');
// $(function() {
// var myDropzone = new Dropzone("div#dropzoneDragArea", { 
// 	paramName: "file",
// 	url: "{{ url('/storeimgae') }}",
// 	previewsContainer: 'div.dropzone-previews',
// 	addRemoveLinks: true,
// 	autoProcessQueue: false,
// 	// uploadMultiple: false,
//   maxFilesize: 2,//max file size in MB,
// 	// parallelUploads: 5,
// 	maxFiles: 5,
// 	// params: {
//   //       _token: token
//   //   },
// 	 // The setting up of the dropzone
// 	init: function() {
// 	    var myDropzone = this;
// 	    //form submission code goes here
// 	    $("form[name='demoform']").submit(function(event) {
// 	    	//Make sure that the form isn't actully being sent.
// 	    	event.preventDefault();
// 	    	URL = $("#demoform").attr('action');
// 	    	formData = $('#demoform').serialize();
//         // alert(URL);
// 	    	$.ajax({
// 	    		type: 'POST',
// 	    		url: URL,
// 	    		data: formData,
// 	    		success: function(result){
// 	    			if(result.status == "success"){
// 	    				// fetch the useid 
// 	    				var postid = result.post_id;
// 						$("#postid").val(postid); // inseting userid into hidden input field
// 	    				//process the queue
// 	    				myDropzone.processQueue();
// 	    			}else{
// 	    				console.log("error");
// 	    			}
// 	    		}
// 	    	});
// 	    });
// 	    //Gets triggered when we submit the image.
// 	    this.on('sending', function(file, xhr, formData){
// 	    //fetch the user id from hidden input field and send that userid with our image
// 	      let userid = document.getElementById('postid').value;
// 		   formData.append('postid', postid);
// 		});
		
// 	    this.on("success", function (file, response) {
//             //reset the form
//             $('#demoform')[0].reset();
//             //reset dropzone
//             $('.dropzone-previews').empty();
//         });
//         this.on("queuecomplete", function () {
		
//         });
		
//         // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
// 	    // of the sending event because uploadMultiple is set to true.
// 	    this.on("sendingmultiple", function() {
// 	      // Gets triggered when the form is actually being sent.
// 	      // Hide the success button or the complete form.
// 	    });
		
// 	    this.on("successmultiple", function(files, response) {
// 	      // Gets triggered when the files have successfully been sent.
// 	      // Redirect user or notify of success.
// 	    });
		
// 	    this.on("errormultiple", function(files, response) {
// 	      // Gets triggered when there was an error sending the files.
// 	      // Maybe show form again, and notify user of error
// 	    });
// 	}
// 	});
// });

function countImages(){
  var count =$("#imageUploaded img").length;
      // var leftImages = maxCount - uploadedImages;

  // var count = $("#imageUploaded img").length;
  // alert(count);
  if(count==15){
    $('#countImages').html('Maximum Number Reaches to 15 Images');
  }else{
    $('#countImages').html('Images '+count+' of 15');


  }
  
}
function countVideos(){
  var count =$("#VideoUploaded video").length;
      // var leftImages = maxCount - uploadedImages;

  // var count = $("#imageUploaded img").length;
  // alert(count);
  if(count==15){
    $('#countVideos').html('Maximum Number Reaches to 15 Images');
  }else{
    $('#countVideos').html('Video '+count+' of 1');


  }
  
}

function clearInputVideo(){
  document.getElementById('videos').value= null;
}

function clearInputFiles(){
  document.getElementById('files').value= null;
}


$( "#datepicker" ).datepicker({
  // background:#FFFFFF !important,
    // display:block,     
    numberOfMonths:1,
    changeYear:true,
    changeMonth:true,
    showOtherMonths:true,
    showWeek:true,
    dateFormat:'dd-mm-yy'

});

// (function($) {
//         $.fn.currencyFormat = function() {
//             this.each( function( i ) {
//                 $(this).change( function( e ){
//                     if( isNaN( parseFloat( this.value ) ) ) return;
//                     this.value = parseFloat(this.value).toFixed(2);
//                 });
//             });
//             return this; //for chaining
//         }
//     })( jQuery );

function isNumberKey(evt, element){
var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        var index = $(element).val().indexOf('.');
        if (index > 0 && event.keyCode == 46){
            return false;

        }else{
            return true;

        }

    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
    	return true;
    }
  }



    // $('#inputPostRent').currencyFormat();


</script>

</body>
</html>
