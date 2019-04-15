<script>
    function refreshSiri(){
      $('#SiriModal').modal('hide');
      $('#note-textarea').val('');
      recognition.stop();
      noteContent = '';
    }
    $('body').keyup(function (e) {
        if (e.keyCode == 32 && e.ctrlKey) {
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
      var ArrayAction = [/thêm/g,/xác thực/g,/đã giao hàng/g,/hủy/g,/thanh toán/g];
      var text = '';
      var ID = '';
      var action = '';
    
      if(!mobileRepeatBug) {
        noteContent += transcript;
        noteTextarea.val(noteContent);
        
        for (let index = 0; index < array.length; index++) {
          text = noteContent.match(array[index]);
          if(text) break;  
        }
    
        for (let index = 0; index < ArrayAction.length; index++) {
          action = noteContent.match(ArrayAction[index]);
          if(action) break;  
        }

        var say = noteContent.match(/hello/gi);
        var good = noteContent.match(/good/gi);
        if(Array.isArray(say)){
          readOutLoud("Hello boss, me can help you ?");
        }
        if(Array.isArray(good)){
          readOutLoud("thanks you");
        }

        
    
        ID = noteContent.match(/[0-9]{1,3}/ig);
        if(Array.isArray(text)){
          switch(text[0]) {
          case "danh mục":
            if(!Array.isArray(action)){
              window.location.href = "{{url('admin/category')}}";
            } else {
              window.location.href = "{{url('admin/category#created')}}";
            }
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
<audio id="notify">
    <source src="{{asset('sound/notify/messenger.mp3')}}" type="audio/mpeg">
</audio>
<script>

    loadNotify();

    function loadNotify(){
        $.ajax({
            headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'GET',
            url: '{{route('notif.countall')}}',
            dataType: 'json',
            success: function(data) {
                $('#notifyBox').html(data.datamsg);
                if(data.count > 0){
                    $('.countMsg').addClass("count bg-success").text(data.count);
                } else {
                    $('.countMsg').removeClass("count bg-success").text('');
                }
            },
            error: function(request, status) {
                ToastError(request.responseText);
            }
        })
    }

    $('#messageDropdown').click(function(){
       $('.countMsg').removeClass("count bg-success").text('');
       
       $.ajax({
            headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'GET',
            url: '{{route('notif.del')}}',
        })
    });
</script>