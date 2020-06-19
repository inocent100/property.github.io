$(document).ready(function(){
	
  $(".form-group .form-control").blur(function(){
	   if($(this).val()!=""){
		   $(this).siblings("label").addClass("active");
	   }else{
		    $(this).siblings("label").removeClass("active");
	   }
  });


  //// VALIDATION OF POST FORMS//////////////////////////////////////

  $('.step1_next').click(function(){
    var er="";
    $('#err').html('');


    let postCode = $("input[name = 'postCode']").val();
    // alert(postCode);
    if(postCode==""){
     er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Enter the Post Code <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
   }

   verifyPostcode(postCode);
   
   setTimeout(function(){
       var kk =  $('#getVerify').val();
    //    alert(kk);

       if(kk!="ok"){
        er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>The Post Code Entered is not Valid<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
      }
   
 
      $('#err').html(er);

    
    if(er!=""){
    
               $('html, body').animate({
                 'scrollTop' : $("#err").position().top - 100
                 }, 2000);
                 // alert();
                 return false;
            
            }else{
                $('#smartwizard').smartWizard("next");
            }
            
        },1000);
        
        // if(er!=""){
        //     // alert();
        //     $('html, body').animate({
        // 'scrollTop' : $("#err").position().top - 100
        // }, 2000);
        // // alert();
        // return false;

        // }



  
   
   


  });

  $('.step2_next').click(function(){
    // alert();
        // e.preventDefault();
        var er="";
    
         var title = $('input[name="title"]').val();
         if(title==""){
           //  alert("error");
                er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Enter Title <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
         }
    
           
           var rent = $('input[name="rent"]').val();
           if(rent=="" && $('input[name="rent"]').is(":visible")){
    
               er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Enter Rent <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
           }
    
           var sale = $('input[name="sale"]').val();
           if(sale=="" && $('input[name="sale"]').is(':visible')){
    
               er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Enter Sale <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
           }
    
           
           var noOfBeds = $('select[name="noOfBeds"] option:selected').text();
             if(noOfBeds=="Please Select..."){
                 er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Select Bed <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
             }
    
           var noOfBaths = $('select[name="noOfBaths"] option:selected').text();
             if(noOfBaths=="Please Select..."){
                 er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Select Bath <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
             }
    
           var furnish = $('select[name="furnish"] option:selected').text();
             if(furnish=="Please Select..."){
                 er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Select Furnish Option <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
             }
    
    
             let vdate = $("input[name = 'dateAvailable']").val();
             
                // alert(vdate)
                if (vdate == "") {
                  er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Enter the Date <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
    
                    // $("#date_error").html("Please Enter the Date!");
                    // check = "false";
                    // $("#date_error").slideDown(1500);
                }else if (vdate!="") {
                //    vdate = formatDate(vdate);
           
                    if(isDate(vdate,'dd-mm-yyyy')==false){
                      // if(!isNaN(date.getTime())){
    
                      er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Invalid Date <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
                        
                    }else{
                        $("input[name = 'dateAvailable'").val(vdate);
                    }
                }
    
                let minTanLength = $("input[name = 'minTanLength']").val();
                if(minTanLength=="" && $("input[name = 'minTanLength']").is(":visible")  ){
                 er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Select Enter a Valid Months Period <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
               }
    
                let propType = $("select[name = 'propType'] option:selected").text();
                if(propType==""){
                 er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Select the Property Type <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
               }
    
             
            // alert(err);
            $('#err').html(er);
             if(er!=""){
                    $('html, body').animate({
                  'scrollTop' : $("#err").position().top - 100
                  }, 2000);
                  return false;
    
             }
             
             $('#smartwizard').smartWizard("next");
    
             
         
            // });
    
        
    
    
       });
        
    
    
       $('.step3_next').click(function(){
         //alert()
    
        var er="";
      //  $('textarea[name="description"]').val('jkk');
         // var description = $('textarea[name="description"]').val();
          var description = CKEDITOR.instances.editor.getData();
          // alert(description)
          if(description==""){
            //  alert("error");
                er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Enter Description <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
          }
    
          // alert(er);
    
          $('#err').html(er);
    
          if(er!=""){
                    $('html, body').animate({
                  'scrollTop' : $("#err").position().top - 100
                  }, 2000);
                  return false;
    
             }
         
            $('#smartwizard').smartWizard("next");
    
       });
    
       $('.step4_next').click(function(e){
         e.preventDefault();
    
        var er="";
         var email = $('input[name="email"]').val();
          // alert(description)
          if(email==""){
            //  alert("error");
                er += '<div class="alert alert-danger fade show" role="alert"><strong>Error ! </strong>Please Enter Email <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>';
          }
    
          // alert(er);
    
          $('#err').html(er);
    
          if(er!=""){
                    $('html, body').animate({
                  'scrollTop' : $("#err").position().top - 100
                  }, 2000);
                  return false;
    
             }
    
             $('#demoform').submit();
    
    
         
    
       });
    

  ///////////END OF POST FORM VALIDATION
	

//   $("#files").on("change", function(e) {


        
// 	var maxCount = 15;
// 	var uploadedImages =$("#imageUploaded img").length;
// 	var leftImages = maxCount - uploadedImages;

// 	// alert($("#imageUploaded img").length);
// 	var $fileUpload = $(this);
// 	if (parseInt($fileUpload.get(0).files.length) > leftImages){
// 				alert("You are only allowed to upload a maximum of 15 Images");
// 				clearInputFiles();
// 				countImages();
// 				return
// 			 }
// 	if (window.File && window.FileList && window.FileReader) {
// 	var files = e.target.files,
// 	  filesLength = files.length;
// 	  // kk=[];
// 	for (var i = 0; i < filesLength; i++) {
// 	  var f = files[i];

// 	  var fileNameCheck = f.name;
// 	  var idxDot = fileNameCheck.lastIndexOf(".") + 1;
// 	  var extFile = fileNameCheck.substr(idxDot, fileNameCheck.length).toLowerCase();
// 	  if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
// 		  //TO DO
// 	  }else{
// 		  alert("Oops! Please Only Allow jpg/jpeg,png files");
// 		  clearInputFiles();
// 		  countImages();
// 		  return;
// 	  }   


	 
	 

// 	  var fileReader = new FileReader();
// 	  fileReader.onload = (function(e) {
// 		var file = e.target;

// 		// alert(file.name);
// 		$('#imageUploaded').append($("<span class=\"pip\">" +
// 		  "<img name='userImages[]' class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
// 		  "<br/><span class=\"remove\">Remove</span>" +
// 		  "</span>"));
		
	  
// 		// $("<span class=\"pip\">" +
// 		//   "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
// 		//   "<br/><span class=\"remove\">Remove image</span>" +
// 		//   "</span>").insertAfter("#files");
// 		$(".remove").click(function(){
// 		  $(this).parent(".pip").remove();
// 		  clearInputFiles();
// 		  countImages();          
// 			// alert();
		
// 		  });
		  
		   
// 		// Old code here
// 		/*$("<img></img>", {
// 		  class: "imageThumb",
// 		  src: e.target.result,
// 		  title: file.name + " | Click to remove"
// 		}).insertAfter("#files").click(function(){$(this).remove();});*/
		
// 	  });
// 	  fileReader.readAsDataURL(f);
	  
// 	}
	
// 	  } else {
// 	  alert("Your browser doesn't support to File API")
// 	}

// 	setTimeout(function(){
// 	  countImages();
// 	  clearInputFiles();
// 	  },300);

   
	
//   });

//   $("#videos").on("change", function(e) {

// 	var maxCount = 1;
// 	var uploadedImages =$("#VideoUploaded video").length;
// 	var leftImages = maxCount - uploadedImages;
	
// 	// alert($("#imageUploaded img").length);
// 	var $fileUpload = $(this);
// 	if (parseInt($fileUpload.get(0).files.length) > leftImages){
// 				alert("You are only allowed to upload a maximum of 1 Video Please Remove this Video and Try Again to Upload Thanks");
// 				clearInputVideo();
// 				countVideos();
// 				return
// 			 }
// 	if (window.File && window.FileList && window.FileReader) {
// 	var files = e.target.files,
// 	  filesLength = files.length;
// 	  // kk=[];
// 	for (var i = 0; i < filesLength; i++) {
// 	  var f = files[i]
	
// 			var fileNameCheck = f.name;
// 			var idxDot = fileNameCheck.lastIndexOf(".") + 1;
// 			var extFile = fileNameCheck.substr(idxDot, fileNameCheck.length).toLowerCase();
// 			// .webm,.mpg,.mp2,.mpeg,.3gp,.mpe,.mpv,.ogg,.mp4,.m4p,.m4v,.avi,.wmv,.mov,.qt,.flv,.swf,.avchd
// 			if (extFile=="mp4" || extFile=="avi" || extFile=="asf" || extFile=="mov" || extFile=="qt" || extFile=="avchd" || extFile=="flv" || extFile=="swf" || extFile=="mpg" || extFile=="mpeg" || extFile=="wmv" || extFile=="mpeg-4"){
// 				//TO DO
// 			}else{
// 				alert("Oops! The "+ extFile +" Format Extension is not Supported");
// 				clearInputVideo();
// 				countVideos();
// 				return;
// 			}   
	
	 
	
// 	  var fileReader = new FileReader();
// 	  fileReader.onload = (function(e) {
// 		var file = e.target;
// 		// id="my-video"
// 		// class="video-js"
// 		// controls
// 		// preload="auto"
// 		// width="640"
// 		// height="264"
// 		// poster="MY_VIDEO_POSTER.jpg"
// 		// data-setup="{}"
	   
// 		$('#VideoUploaded').append($("<span class=\"pip1\">" +
// 		  "<video   id='my-video' class='video-js' preload='auto'  data-setup='{}' width='384' height='240'  controls  class=\"videoThumb\" ><source name='userVideos[]' src=\"" + e.target.result + "\" title=\"" + f.name + "\"/></source></video>" +
// 		  "<br/><span class=\"remove\">Remove</span>" +
// 		  "</span>"));
		
// 		$(".remove").click(function(){
// 		  $(this).parent(".pip1").remove();
// 		  clearInputVideo();
// 		  countVideos();
// 		});
		
		
		
// 	  });
// 	  fileReader.readAsDataURL(f);
// 	}
// 	} else {
// 	alert("Your browser doesn't support to File API")
// 	}
// 	setTimeout(function(){
// 	  // clearInputVideo();
// 	  countVideos();
// 			},300);
	
		   
// 	});

	

//   $('#changeMe').on('click', function(e) {
// 	// alert();
//    var kk = 0;
// 	$('img[name^="userImages[]"]').each(function() {
// 		// alert(kk + " = " + $(this).attr('src'));
// 		// kk.push($(this).attr('src'));
// 		$('.upImage').eq(kk).val($(this).attr('src'));
// 		// $('#upImage').eq(kk).val('hello');
// 		kk++;
// 	});
	
// });







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


	
}); /// END OF JQUERY


  
// function clearInputVideo(){
// 	document.getElementById('videos').value= null;
//   }
  
  function clearInputFiles(){
	document.getElementById('files').value= null;
  }

// function countImages(){
// 	var count =$("#imageUploaded img").length;
// 	// alert(count);
// 		// var leftImages = maxCount - uploadedImages;
  
// 	// var count = $("#imageUploaded img").length;
// 	// alert(count);
// 	if(count==15){
// 	  $('#countImages').html('Maximum Number Reaches to 15 Images');
// 	}else{
// 	  $('#countImages').html('Images '+count+' of 15');
  
  
// 	}
// }

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



	  function isNumberNotDecimal(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}

	// function validate() {

    //     var format = 'yyyy-MM-dd';

    //     if(isAfterCurrentDate(document.getElementById('start').value, format)) {
    //         alert('Date is after the current date.');
    //     } else {
    //         alert('Date is not after the current date.');
    //     }
    //     if(isBeforeCurrentDate(document.getElementById('start').value, format)) {
    //         alert('Date is before current date.');
    //     } else {
    //         alert('Date is not before current date.');
    //     }
    //     if(isCurrentDate(document.getElementById('start').value, format)) {
    //         alert('Date is current date.');
    //     } else {
    //         alert('Date is not a current date.');
    //     }
    //     if (isBefore(document.getElementById('start').value, document.getElementById('end').value, format)) {
    //         alert('Start/Effective Date cannot be greater than End/Expiration Date');
    //     } else {
    //         alert('Valid dates...');
    //     }
    //     if (isAfter(document.getElementById('start').value, document.getElementById('end').value, format)) {
    //         alert('End/Expiration Date cannot be less than Start/Effective Date');
    //     } else {
    //         alert('Valid dates...');
    //     }
    //     if (isEquals(document.getElementById('start').value, document.getElementById('end').value, format)) {
    //         alert('Dates are equals...');
    //     } else {
    //         alert('Dates are not equals...');
    //     }
    //     if (isDate(document.getElementById('start').value, format)) {
    //         alert('Is valid date...');
    //     } else {
    //         alert('Is invalid date...');
    //     }
    // }

    //    function verifyPostcode(val){
      
    //     $.when( $.ajax({
    //         url: "{{ route('verifyPostcode') }}/helo",
    //         type: 'get',
            // async:false,
            // data: {
            //     "_token": $('#token').val()
                //  "_token": "{{ csrf_token() }}"
              
                //  },
        // })).done(function( data ) {
        //     //   m=data;
        //     alert(data)
        //        $('#getVerify').val(data);
        //     // m=data;
        //     // alert(data)
        //     //   return m;

        //     });

        // return m;
        

    //   }
    /**
     * This method gets the year index from the supplied format
     * 
     * 
     */
    function getYearIndex(format) {

        var tokens = splitDateFormat(format);

        if (tokens[0] === 'YYYY'
                || tokens[0] === 'yyyy') {
            return 0;
        } else if (tokens[1]=== 'YYYY'
                || tokens[1] === 'yyyy') {
            return 1;
        } else if (tokens[2] === 'YYYY'
                || tokens[2] === 'yyyy') {
            return 2;
        }
        // Returning the default value as -1
        return -1;
    }

    /**
     * This method returns the year string located at the supplied index
     */
    function getYear(date, index) {

        var tokens = splitDateFormat(date);
        return tokens[index];
    }

    /**
     * This method gets the month index from the supplied format
     */
    function getMonthIndex(format) {

        var tokens = splitDateFormat(format);

        if (tokens[0] === 'MM'
                || tokens[0] === 'mm') {
            return 0;
        } else if (tokens[1] === 'MM'
                || tokens[1] === 'mm') {
            return 1;
        } else if (tokens[2] === 'MM'
                || tokens[2] === 'mm') {
            return 2;
        }
        // Returning the default value as -1
        return -1;
    }

    /**
     * This method returns the month string located at the supplied index
     */
    function getMonth(date, index) {

        var tokens = splitDateFormat(date);
        return tokens[index];
    }

    /**
     * This method gets the date index from the supplied format
     */
    function getDateIndex(format) {

        var tokens = splitDateFormat(format);

        if (tokens[0] === 'DD'
                || tokens[0] === 'dd') {
            return 0;
        } else if (tokens[1] === 'DD'
                || tokens[1] === 'dd') {
            return 1;
        } else if (tokens[2] === 'DD'
                || tokens[2] === 'dd') {
            return 2;
        }
        // Returning the default value as -1
        return -1;
    }

    /**
     * This method returns the date string located at the supplied index
     */
    function getDate(date, index) {

        var tokens = splitDateFormat(date);
        return tokens[index];
    }

    /**
     * This method returns true if date1 is before date2 else return false
     */
    function isBefore(date1, date2, format) {
        // Validating if date1 date is greater than the date2 date
        if (new Date(getYear(date1, getYearIndex(format)), 
                getMonth(date1, getMonthIndex(format)) - 1, 
                getDate(date1, getDateIndex(format))).getTime()
            > new Date(getYear(date2, getYearIndex(format)), 
                getMonth(date2, getMonthIndex(format)) - 1, 
                getDate(date2, getDateIndex(format))).getTime()) {
            return true;
        } 
        return false;                
    }

    /**
     * This method returns true if date1 is after date2 else return false
     */
    function isAfter(date1, date2, format) {
        // Validating if date2 date is less than the date1 date
        if (new Date(getYear(date2, getYearIndex(format)), 
                getMonth(date2, getMonthIndex(format)) - 1, 
                getDate(date2, getDateIndex(format))).getTime()
            < new Date(getYear(date1, getYearIndex(format)), 
                getMonth(date1, getMonthIndex(format)) - 1, 
                getDate(date1, getDateIndex(format))).getTime()
            ) {
            return true;
        } 
        return false;                
    }

    /**
     * This method returns true if date1 is equals to date2 else return false
     */
    function isEquals(date1, date2, format) {
        // Validating if date1 date is equals to the date2 date
        if (new Date(getYear(date1, getYearIndex(format)), 
                getMonth(date1, getMonthIndex(format)) - 1, 
                getDate(date1, getDateIndex(format))).getTime()
            === new Date(getYear(date2, getYearIndex(format)), 
                getMonth(date2, getMonthIndex(format)) - 1, 
                getDate(date2, getDateIndex(format))).getTime()) {
            return true;
        } 
        return false;
    }

    /**
     * This method validates and returns true if the supplied date is 
     * equals to the current date.
     */
    function isCurrentDate(date, format) {
        // Validating if the supplied date is the current date
        if (new Date(getYear(date, getYearIndex(format)), 
                getMonth(date, getMonthIndex(format)) - 1, 
                getDate(date, getDateIndex(format))).getTime()
            === new Date(new Date().getFullYear(), 
                    new Date().getMonth(), 
                    new Date().getDate()).getTime()) {
            return true;
        } 
        return false;                
    }

    /**
     * This method validates and returns true if the supplied date value 
     * is before the current date.
     */
    function isBeforeCurrentDate(date, format) {
        // Validating if the supplied date is before the current date
        if (new Date(getYear(date, getYearIndex(format)), 
                getMonth(date, getMonthIndex(format)) - 1, 
                getDate(date, getDateIndex(format))).getTime()
            < new Date(new Date().getFullYear(), 
                    new Date().getMonth(), 
                    new Date().getDate()).getTime()) {
            return true;
        } 
        return false;                
    }

    /**
     * This method validates and returns true if the supplied date value 
     * is after the current date.
     */
    function isAfterCurrentDate(date, format) {
        // Validating if the supplied date is before the current date
        if (new Date(getYear(date, getYearIndex(format)), 
                getMonth(date, getMonthIndex(format)) - 1, 
                getDate(date, getDateIndex(format))).getTime()
            > new Date(new Date().getFullYear(),
                    new Date().getMonth(), 
                    new Date().getDate()).getTime()) {
            return true;
        } 
        return false;                
    }

    /**
     * This method splits the supplied date OR format based 
     * on non alpha numeric characters in the supplied string.
     */
    function splitDateFormat(dateFormat) {
        // Spliting the supplied string based on non characters
        return dateFormat.split(/\W/);
    }

    /*
     * This method validates if the supplied value is a valid date.
     */
    function isDate(date, format) {                
        // Validating if the supplied date string is valid and not a NaN (Not a Number)
        if (!isNaN(new Date(getYear(date, getYearIndex(format)), 
                getMonth(date, getMonthIndex(format)) - 1, 
                getDate(date, getDateIndex(format))))) {                    
            return true;
        } 
        return false;                                      
    } 

 