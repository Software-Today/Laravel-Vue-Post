@extends('welcome')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Post</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Post</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">

                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">

                            <div class="card-body">
                            <div class="float-right">
                                <!-- Modal body ke always  main content div r bahire rakhte hoy-->
                                <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"
                                    style="border-radius: 30px">+ Create</button>
                            </div>
                            </div>

                            <div class="card-body">
                                <view-category-component></view-category-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>

    </div>
       <!-- Modal ke always  main content div r bahire rakhte hoy-->
    

@endsection
