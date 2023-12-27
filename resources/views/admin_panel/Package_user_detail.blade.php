@extends('admin_panel.layout.app');
@section('content')

<style>
   .mcard 
   {
        margin-bottom: 32px;
        position: relative;
        padding: 30px;
    }
    .mcard img 
    {
        width: 100px;
        display: block;
        margin: auto;
    }
    .garbage 
    {
        position: absolute;
        bottom: 16px;
        right: 14px;
    }
    .garbage i
    {
        font-size: 20px;
    }

</style>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>User Detail</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>


            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url('package_user') }}" class="btn btn-outline-primary cbtn">
                                <span class="d-inline-block"> Back</span> 
                                <i class="simple-icon-arrow-right"></i> 
                            </a>
                        </div>
                        <h5 class="mb-4"><b>Pacakges Detail</b></h5>
                        <div class="row">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th><b>Package Type</b></th>
                                    <th><b>Package Name</b></th>
                                    <th><b>Package discription</b></th>
                                    <th><b>Package Full discription</b></th>
                                    <th><b>Package Price</b></th>
                                </tr>
                                <tr>
                                    <td class="p-5">{{ $PackagePerchaser->Package->package_type }}</td>
                                    <td class="p-5">{{ $PackagePerchaser->Package->name }}</td>
                                    <td class="p-5">{{ $PackagePerchaser->Package->discription }}</td>
                                    <td class="p-5">{!! $PackagePerchaser->Package->Package_list !!}</td>
                                    <td class="p-5">{{ $PackagePerchaser->yearly_monthly == "yearly" ?  $PackagesPrices->country_actual_yearly_price : $PackagesPrices->country_actual_price }}</td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <h5 class="mb-4"><b>User Detail</b></h5>
                        <div class="row">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Service</th>
                                    <th>Time Zone</th>
                                    <th>Country Name</th>
                                    <th>Zip Code</th>
                                </tr>
                                <tr>
                                    <td style="width: 12%">{{ $PackagePerchaser->name }}</td>
                                    <td style="width: 12%">{{ $PackagePerchaser->email }}</td>
                                    <td style="width: 12%">{{ $PackagePerchaser->phone }}</td>
                                    <td style="width: 12%">{{ $PackagePerchaser->Category->category_name }}</td>
                                    <td style="width: 12%">{{ $PackagePerchaser->timezone }}</td>
                                    <td style="width: 12%">{{ $PackagePerchaser->countryName }}</td>
                                    <td style="width: 12%">{{ $PackagePerchaser->zipCode }}</td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th style="width: 12%">Country Code</th>
                                    <th style="width: 12%">Region Code</th>
                                    <th style="width: 12%">Region Name</th>
                                    <th style="width: 12%">City Name</th>
                                    <th style="width: 12%">Longitude</th>
                                    <th style="width: 12%">Latitude</th>
                                    <th style="width: 20%">Text</th>
                                </tr>
                                <tr>
                                    <td>{{ $PackagePerchaser->countryCode }}</td>
                                    <td>{{ $PackagePerchaser->regionCode }}</td>
                                    <td>{{ $PackagePerchaser->regionName }}</td>
                                    <td>{{ $PackagePerchaser->cityName }}</td>
                                    <td>{{ $PackagePerchaser->longitude }}</td>
                                    <td>{{ $PackagePerchaser->latitude }}</td>
                                    <td>{{ $PackagePerchaser->text }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection