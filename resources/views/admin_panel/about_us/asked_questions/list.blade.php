@extends('admin_panel.layout.app');
@section('content')

<style>
    .cbtn
    {
        width:fit-content;
    }
    .mcardd
    {
        box-shadow: none;
    }
    .mcardd img 
    {
        width: 155px;
        display: block;
        position: relative;
        margin: auto;
    }
    .cth
    {
        max-width: 300px !important;
    }
</style>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Question Answer Details</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Library</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12 mb-4">
                @if(session()->has('message'))
                    <div class="alert alert-danger rounded">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success rounded">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">List Of Question Answer</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="javascript:void();" class="btn btn-primary cbtn" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <span class="d-inline-block"> Create Question Answer</span> 
                                <i class="simple-icon-arrow-right"></i> 
                            </a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-question-answer">
                            <thead>
                                <tr>
                                    <th>Question’s</th>
                                    <th>Answer</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($QuestionAnswer as $QuestionAnswers)
                                    <tr>
                                        <td>{{ $QuestionAnswers->question }}</td>
                                        <td>{{ $QuestionAnswers->answer }}</td>
                                        <td> 
                                            <a href="{{ url('delete_question_answer/'.$QuestionAnswers->id) }}" class="btn btn-danger btn-sm edit_Services_details" >Delete</a>                                       
                                            
                                            <button type="button" class="btn btn-warning btn-sm edit_Services_details" 
                                            data-id="{{ $QuestionAnswers->id }}" data-question="{{ $QuestionAnswers->question }}" data-answer="{{ $QuestionAnswers->answer }}"
                                            data-toggle="modal" data-target=".bd-example-modal-lg-edit">Edit</button>  
                                        </td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Question Answer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('add_question_asnwer') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Add Question</label>
                                <input type="text" name="question" id="question" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Add Answer</label>
                                <textarea name="answer" id="answer" class="form-control" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Question Answer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('add_question_asnwer') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Edit Question</label>
                                <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>
                                <input type="text" name="edit_question" id="edit_question" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Edit Answer</label>
                                <textarea name="edit_answer" id="edit_answer" class="form-control" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection