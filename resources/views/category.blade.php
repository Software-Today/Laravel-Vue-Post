@extends('welcome')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-breadcrumb">
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
    <create-category></create-category>

@endsection
