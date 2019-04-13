@extends('admin.master')
@section('title','Kanban Todooooo')
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css">
<link rel="stylesheet" href="https://demo.tutorialzine.com/2017/08/converting-from-speech-to-text-with-javascript/styles.css">
@endsection
@section('content')
<div id="content">
    <div class="container">

        <h1>Voice Controlled Notes App</h1>
        <p class="page-description">A tiny app that allows you to take notes by recording your voice</p>
        <p><a class="tz-link" href="https://tutorialzine.com/2017/08/converting-from-speech-to-text-with-javascript">Read the full article on Tutorialzine »</a></p>

        <h3 class="no-browser-support">Sorry, Your Browser Doesn't Support the Web Speech API. Try Opening This Demo In Google Chrome.</h3>

        <div class="app"> 
            <h3>Add New Note</h3>
            <div class="input-single">
                <textarea id="note-textarea" placeholder="Create a new note by typing or using voice recognition." rows="6"></textarea>
            </div>         
            <button id="start-record-btn" title="Start Recording">Start Recognition</button>
            <button id="pause-record-btn" title="Pause Recording">Pause Recognition</button>
            <button id="save-note-btn" title="Save Note">Save Note</button>   
            <p id="recording-instructions">Press the <strong>Start Recognition</strong> button and allow access.</p>
            
            <h3>My Notes</h3>
            <ul id="notes">
                <li>
                    <p class="no-notes">You don't have any notes.</p>
                </li>
            </ul>

        </div>

    </div>
</div>

<div class="modal fade" id="SiriModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubCategoryLabel">Thêm mới danh mục con</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Hi Im Siri </label><br/>
                    <textarea class="form-control" id="slugSub"></textarea>
                </div>
            </div>
            <div class="modal-footer" id="submodalFooter">
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script>
    $('body').keyup(function (e) {
        if (e.keyCode == 32) {
            $('#SiriModal').modal('show');
        }
    });
</script>
<script src="{{asset('@styleadmin/js/voice.js')}}"></script> 
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('@styleadmin/js/select2.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection
