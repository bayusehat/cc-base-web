<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Survey Pelanggan Indihome</title>
        <link rel="icon" type="image/x-icon" href="assets/survey/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/survey/css/styles.css') }}" rel="stylesheet" />
        <style>
            .form-group{
                margin-bottom: 20px;
            }
            label{
                font-weight: bold;
            }
            #wpaket{
                display: none;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Survey Pelanggan Indihome</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    {{--  <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#survey">Survey</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                    </ul>  --}}
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">INDIHOME SURVEY</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Survey pelayanan dan kepuasan pelanggan Indihome</h2>
                        <a class="btn btn-primary" href="#survey">Mulai Survey</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        {{--  <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Built with Bootstrap 5</h2>
                        <p class="text-white-50">
                            Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
                            <a href="https://startbootstrap.com/theme/grayscale/">the preview page.</a>
                            aaaaaaaaaaaaaaaaa
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="{{ asset('assets/survey/img/ipad.png') }}" alt="..." />
            </div>
        </section>  --}}
        <!-- Projects-->
        <section class="projects-section bg-light" id="survey">
            <div class="container px-4 px-lg-5">
                <div class="row">
                    <div class="col-md-12 col-xl-12 col-sm-12">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                            <strong>Sukses!</strong> {{ Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                            <strong>Gagal!</strong> {{ Session::get('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    </div>
                </div>
                <div class="row">
                    <h2 class="text-center">Form Survey Pelanggan Indihome</h2>
                </div>
                <form action="{{ url('/survey/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">ND Internet</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nomor Internet" name="nd_internet" id="nd_internet" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button" id="button-addon2" onclick="getData()">Search</button>
                            </div>
                        </div>
                        @error('nd_internet')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Pelanggan" id="nama_pelanggan" readonly>
                        @error('nama_pelanggan')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nomor HP</label>
                        <input type="text" class="form-control" name="nomor_hp_pelanggan" placeholder="Nomor HP Pelanggan" id="nomor_hp_pelanggan" readonly>
                        @error('nomor_hp_pelanggan')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Prosedur Pemasangan Kompetitor</label>
                        <input type="text" class="form-control" name="prosedur_pemasangan_kompetitor" id="prosedur_pemasangan_kompetitor" placeholder="Prosedur pemasangan">
                        @error('prosedur_pemasangan_kompetitor')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tarif Bulanan Kompetitor</label>
                        <input type="text" class="form-control" name="tarif_bulanan_kompetitor" id="tarif_bulanan_kompetitor" placeholder="Tarif bulanan">
                        @error('tarif_bulanan_kompetitor')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jalur Pemasangan Kompetitor</label>
                        <input type="text" class="form-control" name="jalur_psb_kompetitor" id="jalur_psb_kompetitor" placeholder="Jalur pemasangan">
                        @error('jalur_psb_kompetitor')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alasan Cabut Indihome</label>
                        <input type="text" class="form-control" name="alasan_cabut_indihome" id="alasan_cabut_indihome" placeholder="Alasan cabut Indihome">
                        @error('alasan_cabut_indihome')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jika ingin langganan Indihome, apa yang diinginkan</label>
                        <textarea name="alasan_langganan_indihome" id="alasan_langganan_indihome" class="form-control" cols="30" rows="10"></textarea>
                        @error('alasan_langganan_indihome')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <hr>
                        <label for="">Bersedia Winback : (Ya / Tidak) <span class="text-danger">*Free biaya PSB & biaya abonemen bulan pertama</span> </label>
                        <select name="bersedia_winback" id="bersedia_winback" class="form-control" onchange="showForm(this)">
                            <option value="">-- Pilih --</option>
                            <option value="YA">YA</option>
                            <option value="TIDAK">TIDAK</option>
                        </select>
                        @error('bersedia_winback')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group" id="wpaket">
                        <label for="">Paket yang diinginkan</label>
                        <input type="text" class="form-control" name="paket_winback" id="paket_winback">
                        @error('paket_winback')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Attachment / Foto</label> 
                        <input type="file" class="form-control" name="attachment" id="attachment" placeholder="Attachment">
                        @error('attachment')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-success" name="submit" id="submit" value="SUBMIT SURVEY">
                    </div>
                </form>
                {{--  <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="{{ asset('assets/survey/img/bg-masthead.jpg') }}" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Shoreline</h4>
                            <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any project - even commercial projects! Download it, customize it, and publish your website!</p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/survey/img/demo-image-01.jpg') }}" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Misty</h4>
                                    <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/survey/img/demo-image-02.jpg') }}" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Mountains</h4>
                                    <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  --}}
            </div>
        </section>
        <!-- Signup-->
        {{--  <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                                <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton" type="submit">Notify Me!</button></div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is required.</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.</div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>  --}}
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                {{--  <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">hello@yourdomain.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+1 (555) 902-8832</div>
                            </div>
                        </div>
                    </div>
                </div>  --}}
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; CC Regional 5 2021</div></footer>
        <!-- Bootstrap core JS-->
        <script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/survey/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="//cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script>
            function showForm(e){
                var p = $(e).val();
                console.log(p);
                if(p == 'YA'){
                    $("#wpaket").show();
                    $("#paket_winback").attr('disabled',false);
                }else{
                    $("#wpaket").hide();
                    $("#paket_winback").attr('disabled',true);
                }
            }

            function getData(){
                var nd = $("#nd_internet").val();
                if(nd == '')
                    return alert('Nomor Internet tidak boleh kosong')
                    
                $.ajax({
                    url : '{{ url("survey/grab") }}/'+nd,
                    method : 'GET',
                    headers : {
                        'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
                    },
                    dataType : 'JSON',
                    success:function(res){
                        $("#nama_pelanggan").val(res.nama)
                        $("#nomor_hp_pelanggan").val('0'+res.cp_num)
                    }
                })
            }
        </script>
    </body>
</html>
