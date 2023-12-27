@extends('admin_panel.layout.app')
@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .welcome-message {
        text-align: center;
        font-size: 24px;
        color: #333;
        animation: fadeInUp 1.5s ease-in-out;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        </div>
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-body p-0">
                    <div class="card-header border-0 pt-5">
                        <div class="welcome-message">
                            <p class="fw-bolder">Enjoy your stay and have a great day!</p>
                            <h3 class="card-title align-items-start flex-column">Welcome to Mini CRM Dashboard <span class="fw-bolder" style="color: #FF6145">{{ Auth::user()->name }}</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection