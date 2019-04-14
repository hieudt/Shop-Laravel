<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/css/home.css')}}">

  <!-- endinject -->
  <!-- plugin css for this page -->
  @yield('css')
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('@styleadmin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('@styleadmin/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:{{asset('@styleadmin/partials/_navbar.html')}} -->
  @include('admin.elements.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:{{asset('@styleadmin/partials/_settings-panel.html')}} -->
  @include('admin.elements.themes')
      <!-- partial -->
      <!-- partial:{{asset('@styleadmin/partials/_sidebar.html')}} -->
  @include('admin.elements.sidebar')
      <!-- partial -->
      <div class="main-panel">
        
          <div class="content-wrapper">
              <div id="app">
                  @yield('content')
              </div>
          </div>
        
        <!-- content-wrapper ends -->
        <!-- partial:{{asset('@styleadmin/partials/_footer.html')}} -->
        @include('admin.elements.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <div class="modal fade" id="SiriModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubCategoryLabel">ROG Siri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Hi Im Siri </label><br/>
                    <div class="input-single">
                        <textarea id="note-textarea" placeholder="Chào ngài ! Ngài muốn làm gì?? " rows="6"></textarea>
                    </div>  
                </div>
            </div>
            <div class="modal-footer" id="submodalFooter">
            </div>
        </div>
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('@styleadmin/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
  <script src="{{asset('@styleadmin/js/toastDemo.js')}}"></script>
  <script src="{{asset('@styleadmin/js/pusher.min.js')}}"></script>
  <script src="{{asset('@styleadmin/js/myjs.js')}}"></script>
  <script src="{{asset('@styleadmin/js/pace.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('@styleadmin/js/off-canvas.js')}}"></script>
  <script src="{{asset('@styleadmin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('@styleadmin/js/misc.js')}}"></script>
  <script src="{{asset('@styleadmin/js/settings.js')}}"></script>
  <script src="{{asset('@styleadmin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  @yield('javascript')
  <!-- End custom js for this page-->
</body>
<script>

function refreshSiri(){
  $('#SiriModal').modal('hide');
  $('#note-textarea').val('');
  recognition.stop();
  noteContent = '';
}
  $('body').keyup(function (e) {
      if (e.keyCode == 32) {
          $('#SiriModal').modal('show');
          $('#note-textarea').val('');
          if (noteContent.length) {
          noteContent += '';
          }
          recognition.start();
      }
  });

  try {
  var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  var recognition = new SpeechRecognition();
}
catch(e) {
  console.error(e);
  $('.no-browser-support').show();
  $('.app').hide();
}


var noteTextarea = $('#note-textarea');
var instructions = $('#recording-instructions');
var notesList = $('ul#notes');

var noteContent = '';





recognition.continuous = true;

// This block is called every time the Speech APi captures a line. 
recognition.onresult = function(event) {

  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);
  var array = [/hóa đơn/g,/danh mục/g,/khách hàng/g,/sản phẩm/g];
  var ArrayAction = [/xác thực/g,/đã giao hàng/g,/hủy/g,/thanh toán/g];
  var text = '';
  var ID = '';
  var action = '';

  if(!mobileRepeatBug) {
    noteContent += transcript;
    noteTextarea.val(noteContent);
    console.log(transcript);
    
    for (let index = 0; index < array.length; index++) {
      text = noteContent.match(array[index]);
      if(text) break;  
    }

    for (let index = 0; index < ArrayAction.length; index++) {
      action = noteContent.match(ArrayAction[index]);
      if(action) break;  
    }

    ID = noteContent.match(/[0-9]{1,3}/ig);
    if(Array.isArray(text)){
      switch(text[0]) {
      case "danh mục":
        window.location.href = "{{url('admin/category')}}";
        break;
      case "khách hàng":
        window.location.href = "{{url('admin/users')}}";
        break;
      case "hóa đơn":
        if(!Array.isArray(ID)){ // Không có id
          if(!Array.isArray(action)){
            window.location.href = "{{url('admin/bill/list')}}";
          }else {
            ToastError("Ngài bị thiếu ID hoặc Siri chưa nghe rõ");
            refreshSiri();
          }
        }else {
            if(!Array.isArray(action)){ // Không có action
              window.location.href = "{{url('admin/bill/details')}}/"+ID[0];
              console.log("Not : "+action);
            } else {
              console.log("Is : "+action);
              if(action[0] == "xác thực"){
                if (typeof UpdateStatus === "function") { 
                  UpdateStatus("status",ID[0],1);
                } else {
                  ToastError("Vui lòng quay lại Hóa Đơn rồi tiếp tục nha ngài");
                }
                
                refreshSiri();
              }
              else if(action[0] == "đã giao hàng"){
                if (typeof UpdateStatus === "function") { 
                  UpdateStatus("status",ID[0],2);
                } else {
                  ToastError("Vui lòng quay lại Hóa Đơn rồi tiếp tục nha ngài");
                }
                refreshSiri();
              }
              else if(action[0] == "hủy"){
                if (typeof UpdateStatus === "function") { 
                  UpdateStatus("status",ID[0],3);
                } else {
                  ToastError("Vui lòng quay lại Hóa Đơn rồi tiếp tục nha ngài");
                }
                refreshSiri();
              }
              else if(action[0] == "thanh toán"){
                if (typeof UpdateStatus === "function") { 
                  UpdateStatus("statusPay",ID[0],1);
                } else {
                  ToastError("Vui lòng quay lại Hóa Đơn rồi tiếp tục nha ngài");
                }
                refreshSiri();
              }
              else
              console.log("Module này chưa xây dựng");
            }
         }
        break;
      case "sản phẩm":
        if(!Array.isArray(ID)){
          if(!Array.isArray(action)){
            window.location.href = "{{url('admin/product/home')}}";
          } else {
            window.location.href = "{{url('admin/product/add')}}";
          }
        }else {
          window.location.href = "{{url('admin/product/edit')}}/"+ID[0];
        }
        break;
      default:
        ToastError("KHÔNG HIỂU !!");
      }
    } else {
      ToastError("KHÔNG HIỂU !");
      recognition.stop();
      noteContent = '';
      $('#SiriModal').modal('hide');
    }
    
    
    
  }
};


// Sync the text inside the text area with the noteContent variable.
noteTextarea.on('input', function() {
  noteContent = $(this).val();
})


function readOutLoud(message) {
    var speech = new SpeechSynthesisUtterance();

  // Set the text and voice attributes.
    speech.text = message;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;
    
  
    window.speechSynthesis.speak(speech);
}




</script>

</html>