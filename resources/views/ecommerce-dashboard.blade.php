@extends('layouts.app')

@section('head')
    <!-- Slick -->
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick-theme.css') }}" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{ url('vendors/datepicker/daterangepicker.css') }}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
@endsection

@section('content')

@if(\Session::has('kasir') || \Session::has('admin'))

<div class="page-header">
        <div class="page-title">
            <h3>E-commerce Dashboard</h3>
            <div>
                <!-- <div id="ecommerce-dashboard-daterangepicker" class="btn btn-outline-light">
                    <i class="ti-calendar mr-2 text-muted"></i>
                    <span></span>
                </div>
                <a href="#" class="btn btn-primary ml-2" data-toggle="dropdown">
                    <i class="ti-download"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">Download</a>
                    <a href="#" class="dropdown-item">Print</a>
                </div> -->
            </div>
        </div>
    </div>

    <div class="card">
    <div class="card-body">
        <h6 class="card-title mb-0">Recent Payments Bus</h6>
    </div>
        <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Status Pengechekan</th>
                            <th class="text-center">Pembayaran</th>
                            <!-- <th>Id Pembayaran</th> -->
                            <th class="text-center">Id Sewa Bus</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($pembayaran as $c)
                                    <!-- <tr class="table-light"> -->
                                    <td>
                                        <form class="post0" method="post" action="pembayaranupdateswitch">
                                        @csrf
                                            <input type="hidden" name="update1" value="{{$c->id}}">
                                            @if($c -> STATUS_BAYAR == 1)
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" checked id="switch{{$c->id}}">
                                                <label class="custom-control-label" for="switch{{$c->id}}">New</label>
                                            </div>
                                            @else 
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switch{{$c->id}}">
                                                <label class="custom-control-label" for="switch{{$c->id}}">Done</label>
                                            </div>
                                            @endif
                                        </form>
                                    </td>
                                    <td class="text-center">
                                    @if($c-> ID_JENIS == '1')
                                    <span class="text-danger"><h5>DP (25%)</h5></span>
                                    @endif
                                    @if($c-> ID_JENIS == '2')
                                    <span class="text-success"><h5>Lunas</h5></span>
                                    @endif
                                    </td>
                                    <!-- <td>KonfPemb00{{ $c -> id }}</td> -->
                                    <td class="text-center">{{ $c -> ID_SEWA_BUS }}</td>
                                    <td class="text-center">{{ $c -> NAMA_CUSTOMER }}</td>
                                    <td class="text-center">
                                    
                                    <a href="{{ url('detailbayarbus', ['id'=>$c -> id]) }}">
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="ti-money mr-2"></i>Detail
                                    </button>
                                    </a>
                                    
                                    <a href="{{ url('printbayarbus', ['id'=>$c -> id]) }}" target="_blank"> 
                                    <button type="button" class="btn btn-outline-warning">
                                        <i class="ti-printer mr-2"></i>Print
                                    </button>
                                    </a>

                                    </td>
                                    </tr>
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th class="text-center">Status Pengechekan</th>
                            <th class="text-center">Pembayaran</th>
                            <!-- <th>Id Pembayaran</th> -->
                            <th class="text-center">Id Sewa Bus</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </tfoot>
                    </table>
        </div>
    </div>

    <div class="card">
    <div class="card-body">
        <h6 class="card-title mb-0">Recent Payments Tour Packages</h6>
    </div>
        <div class="table-responsive">
        <table id="myTable1" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Status Pengechekan</th>
                            <th class="text-center">Pembayaran</th>
                            <!-- <th>Id Pembayaran</th> -->
                            <th class="text-center">Id Sewa Paket</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($pembayaran_paket as $c)
                                    <!-- <tr class="table-light"> -->
                                    <td>
                                        <form class="post0" method="post" action="pembayaranupdateswitch_paket">
                                        @csrf
                                            <input type="hidden" name="update1" value="{{$c->id_paket}}">
                                            @if($c -> STATUS_BAYAR == 1)
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" checked id="switch{{$c->id_paket}}">
                                                <label class="custom-control-label" for="switch{{$c->id_paket}}">New</label>
                                            </div>
                                            @else 
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switch{{$c->id_paket}}">
                                                <label class="custom-control-label" for="switch{{$c->id_paket}}">Done</label>
                                            </div>
                                            @endif
                                        </form>
                                    </td>
                                    <td class="text-center">
                                    @if($c-> JENIS_BAYAR == 'DP (25%)')
                                    <span class="text-danger"><h5>{{ $c -> JENIS_BAYAR }}</h5></span>
                                    @endif
                                    @if($c-> JENIS_BAYAR == 'Sisa Bayar')
                                    <span class="text-warning"><h5>{{ $c -> JENIS_BAYAR }}</h5></span>
                                    @endif
                                    @if($c-> JENIS_BAYAR == 'Lunas')
                                    <span class="text-success"><h5>{{ $c -> JENIS_BAYAR }}</h5></span>
                                    @endif
                                    </td>
                                    <!-- <td>KonfPemb00{{ $c -> id_paket }}</td> -->
                                    <td class="text-center">{{ $c -> ID_SEWA_PAKET }}</td>
                                    <td class="text-center">{{ $c -> NAMA_CUSTOMER }}</td>
                                    <td class="text-center">
                                    
                                    <a href="{{ url('detailbayarpaket', ['id_paket'=>$c -> id_paket]) }}">
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="ti-money mr-2"></i>Detail
                                    </button>
                                    </a>

                                    <a href="{{ url('printbayarpaket', ['id_paket'=>$c -> id_paket]) }}" target="_blank">
                                    <button type="button" class="btn btn-outline-warning">
                                        <i class="ti-printer mr-2"></i>Print
                                    </button>
                                    </a>
                                    
                                    </td>
                                    </tr>
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th class="text-center">Status Pengechekan</th>
                            <th class="text-center">Pembayaran</th>
                            <!-- <th>Id Pembayaran</th> -->
                            <th class="text-center">Id Sewa Paket</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </tfoot>
                    </table>
        </div>
    </div>


    <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-0">Pricelist Sewa Bus</h6>
                </div>
                <div class="table-responsive">
    <table id="myTable2" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <!-- <th>Id Pricelist</th> -->
                            <th>Category Bus</th>
                            <th>Tujuan Sewa</th>
                            <th>Pricelist Sewa</th>
                            <th>Jumlah Hari</th>
                            <!-- <th>Action</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($pricelist_sewa_armada as $pr)
                                    <!-- <tr class="table-light"> -->
                                    <td>{{ $loop->iteration }}</td>
                                    <!-- <td>{{ $pr   -> ID_PRICELIST }}</td> -->
                                    @if($pr -> NAMA_CATEGORY == 'Bus Besar')
                                    <td><span class="badge bg-success-bright text-secondary">{{ $pr -> NAMA_CATEGORY }}</span></td>
                                    @endif
                                    @if($pr -> NAMA_CATEGORY == 'Bus Sedang')
                                    <td><span class="badge bg-success-bright text-warning">{{ $pr -> NAMA_CATEGORY }}</span></td>
                                    @endif
                                    @if($pr -> NAMA_CATEGORY == 'Elf Bus (Mini Bus)')
                                    <td><span class="badge bg-success-bright text-success">{{ $pr -> NAMA_CATEGORY }}</span></td>
                                    @endif
                                    <td>{{ $pr   -> TUJUAN_SEWA }}</td>
                                    <td>
                                    Rp <?php echo number_format($pr->PRICELIST_SEWA,'0',',','.'); ?>
                                    </td>
                                    <td>{{ $pr   -> JUMLAH_HARI }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th>#</th>
                            <!-- <th>Id Pricelist</th> -->
                            <th>Category Bus</th>
                            <th>Tujuan Sewa</th>
                            <th>Pricelist Sewa</th>
                            <!-- <th>Action</th> -->
                        </tr>
                        </tfoot>
                    </table>
</div>
</div>


<div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-0">Table Paket Wisata</h6>
                </div>
                <div class="table-responsive">
               
                    <table id="myTablePaket" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id Paket</th>
                            <th>Nama Paket Wisata</th>
                            <!-- <th>Tipe Paket</th> -->
                            <th>Harga (1 Orang)</th>
                            <th>Harga Paket (Full)</th>
                            <!-- <th>Tempat Kunjung</th> -->
                            <th>Detail</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($paket_wisata as $pw)
                                    <!-- <tr class="table-light"> -->
                                    <td>{{ $pw -> ID_PAKET }}</td>
                                    <td>{{ $pw -> NAMA_PAKET }}</td>
                                    <!-- <td>{{ $pw -> TIPE_PAKET }}</td> -->
                                    <td>
                                    Rp <?php echo number_format($pw->HARGA_PAKET,'0',',','.'); ?>
                                    </td>
                                    <td>
                                    Rp <?php echo number_format($pw->HARGA_JUAL,'0',',','.'); ?>
                                    </td>
                                    <!-- <td>{{ $pw -> TEMPAT_KUNJUNG }}</td>
                                    <td>{{ $pw -> FASILITAS_PAKET }}</td> -->
                                    <td>
                                    <a href="{{ url('detailindexpaket', ['id'=>$pw -> ID_PAKET]) }}">
                                    <button type="button" class="btn btn-outline-secondary">
                                        <i class="ti-calendar mr-2"></i>Detail
                                    </button>
                                    </a>
                                    </td>
                                    
                                    </tr>
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th>Id Paket</th>
                            <th>Nama Paket Wisata</th>
                            <!-- <th>Tipe Paket</th> -->
                            <th>Harga (1 Orang)</th>
                            <th>Harga Paket (Full)</th>
                            <th>Detail</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                    </table>
                </div>
                
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h6 class="card-title">Revenue by Country</h6>
                        <div>
                            <a href="#" class="btn btn-outline-light btn-sm btn-floating mr-2">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown"
                                   class="btn btn-outline-light btn-sm btn-floating"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Total Revenue</p>
                    <h2 class="mb-4">$469,453</h2>
                    <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-secondary" style="width: 30%" role="progressbar"></div>
                        <div class="progress-bar bg-info" style="width: 12%" role="progressbar"></div>
                        <div class="progress-bar bg-warning" style="width: 20%" role="progressbar"></div>
                        <div class="progress-bar bg-success" style="width: 18%" role="progressbar"></div>
                        <div class="progress-bar bg-danger" style="width: 20%" role="progressbar"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-danger mr-1"></span>
                                Russia
                            </p>
                            <h5 class="mt-2 mb-0">30%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-info mr-1"></span>
                                Australia
                            </p>
                            <h5 class="mt-2 mb-0">12%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-warning mr-1"></span>
                                China
                            </p>
                            <h5 class="mt-2 mb-0">20%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-success mr-1"></span>
                                Tunisia
                            </p>
                            <h5 class="mt-2 mb-0">18%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-danger mr-1"></span>
                                Spain
                            </p>
                            <h5 class="mt-2 mb-0">20%</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card border-0 bg-info-bright">
                <div class="card-body">
                    <div class="text-center">
                        <p>Total sales this month</p>
                        <h2>$158,000</h2>
                        <p>This chart shows total sales. You can use the button below for details of this
                            month's sales.</p>
                        <div class="mt-4">
                            <a href="#" class="btn btn-info">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Reviews</h6>
                    <div class="card-scroll">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 py-4">
                                <a href="#" class="flex-shrink-0">
                                    <figure class="avatar mr-3">
                                        <img src="{{ url('assets/media/image/user/man_avatar1.jpg') }}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <h6>Valentine Maton</h6>
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">(5)</li>
                                            </ul>
                                        </a>
                                        <div class="ml-auto">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, tempora.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex px-0 py-4">
                                <a href="#" class="flex-shrink-0">
                                    <figure class="avatar mr-3">
                                        <img src="{{ url('assets/media/image/user/man_avatar2.jpg') }}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <h6>Valentine Maton</h6>
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">(3.5)</li>
                                            </ul>
                                        </a>
                                        <div class="ml-auto">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, tempora.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex px-0 py-4">
                                <a href="#" class="flex-shrink-0">
                                    <figure class="avatar mr-3">
                                        <img src="{{ url('assets/media/image/user/man_avatar3.jpg') }}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <h6>Valentine Maton</h6>
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">(4.5)</li>
                                            </ul>
                                        </a>
                                        <div class="ml-auto">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, tempora.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex px-0 py-4">
                                <a href="#" class="flex-shrink-0">
                                    <figure class="avatar mr-3">
                                        <img src="{{ url('assets/media/image/user/man_avatar4.jpg') }}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <h6>Valentine Maton</h6>
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">(4)</li>
                                            </ul>
                                        </a>
                                        <div class="ml-auto">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, tempora.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="#" class="btn btn-outline-light">
                            View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h6 class="card-title mb-0">Best Sellers of the Week</h6>
                        <a href="#">All Sales</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-right">Total Sales</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <a href="#">Flowerpot</a>
                            </td>
                            <td class="text-right">21</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Vase <span class="badge badge-danger ml-1">New</span></a>
                            </td>
                            <td class="text-right">52</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Night light</a>
                            </td>
                            <td class="text-right">74</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Desk</a>
                            </td>
                            <td class="text-right">25</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Glasses</a>
                            </td>
                            <td class="text-right">11</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Wall Clock</a>
                            </td>
                            <td class="text-right">8</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Armchair</a>
                            </td>
                            <td class="text-right">5</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Shoe</a>
                            </td>
                            <td class="text-right">5</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body text-center pt-0">
                    <a href="#" class="btn btn-outline-light">
                        View All
                    </a>
                </div>
            </div>
        </div>
    </div> -->

@endif
@endsection

@section('script')
<script>
const x = document.getElementsByClassName('post0');
            for(let i=0;i<x.length;i++){
                x[i].addEventListener('click',function(){
                    x[i].submit();
                });
            }

    $(document).ready(function (){
    $('#myTable').DataTable();
});

$(document).ready(function (){
    $('#myTable1').DataTable();
});

$(document).ready(function (){
    $('#myTable2').DataTable();
});

$(document).ready(function (){
    $('#myTablePaket').DataTable();
});

    function modal(id){
        const y=document.getElementById(id);
            $("#exampleModal12").modal();
        }
</script>
<!-- Apex chart -->
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="{{ url('/vendors/charts/apex/apexcharts.min.js') }}"></script>

<!-- Daterangepicker -->
<script src="{{ url('vendors/datepicker/daterangepicker.js') }}"></script>

<!-- DataTable -->
<script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>

<!-- Dashboard scripts -->
<script src="{{ url('assets/js/examples/pages/ecommerce-dashboard.js') }}"></script>
@endsection