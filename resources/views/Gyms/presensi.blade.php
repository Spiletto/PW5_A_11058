@extends('dashboard')

@section('content')
<!-- Main content -->
<style>
    .gambar {
        height: 100px;
        border-radius: 100px;
        border: 1px solid black;
        background-image: none;
    }

    .gambarKelas {
        width: 250px;
    }
    .toast-body {
        background-color: green;
        color: white;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center mt-3">
            <!-- Colom 1 -->
            <div class="col-sm-6">
                <div class="card p-0 mx-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <img class="gambar p-1 me-2"
                                    src="https://www.fitnessfirst.co.id/id/-/media/project/evolution-wellness/fitness-first/south-east-asia/indonesia/classes/bodycombat/bodycombat_fb-sharing.png"
                                    alt="">
                                <div class="text-start mt-3">
                                    <h3>Body Combat <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModall">
                                        <i class="fas fa-eye"></i></button></h3>
                                    <h4>Instruktur : Jolly Hans Frankle</h4>
                                    <h4>Ruang : Kelas A</h4>
                                    <h4>Total Member : 6</h4>
                                    <h4>Rating : 
                                    <div class="mb-0 " style="color: yellow;">
                                        <i class="fas fa-star fa-xs"></i>
                                        <i class="fas fa-star fa-xs"></i>
                                        <i class="fas fa-star fa-xs"></i>
                                        <i class="fas fa-star fa-xs"></i>
                                        <i class="fas fa-star fa-xs"></i>
                                    </div>
                                    </h4>
                                </div>
                            </div>
                            <div class="text-end">
                                <p class="m-0" id="currentDate">Tanggal: </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal" tabindex="-1" id="myModall">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header blue-bg">
                        <h5 class="modal-title">Detail Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2><p>Body Combat</p></h2>
                        <p>Nama Instruktur : Marselinus Dira Agaska</p>
                        <p>Kode Instruktur : 210711058</p>
                        <p>Hari Kelas      : Sunday</p>
                        <p class="m-0" id="currentDate">Tanggal Kelas : 11-Oct-2023</p>
                        <p>Ruang           : Kelas A</p>
                        <p>Rating          : <div class="mb-0 " style="color: black;">
                                                <i class="fas fa-star fa-xs"></i>
                                                <i class="fas fa-star fa-xs"></i>
                                                <i class="fas fa-star fa-xs"></i>
                                                <i class="fas fa-star fa-xs"></i>
                                                <i class="fas fa-star fa-xs"></i>
                                            </div></p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const myModall = document.getElementById('myModall');
            const myInput = document.getElementById('myInput');

            myModall.addEventListener('shown.bs.modal', () => {
                myInput.focus();
            });
        </script>
        <script>
            const currentDate = new Date();
            document.getElementById('currentDate').textContent += currentDate.toLocaleDateString();
        </script>
            
        <!-- row -->
        </div>
            <div class="d-flex justify-content-between align-items-center">
                <h3>Daftar Member</h3>
                <button type="button" class="btn btn-primary" id="liveToastBtn" onclick="changeButtonColor()">
                    <i class="fas fa-check"></i> Presensi
                </button>

                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            <i class="fas fa-check-circle"></i> Berhasil Mempresensi Member
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const presensiButton = document.getElementById('liveToastBtn');
                const toastLiveExample = document.getElementById('liveToast');
                
                if (presensiButton) {
                    presensiButton.addEventListener('click', () => {
                        const toastBootstrap = new bootstrap.Toast(toastLiveExample);
                        toastBootstrap.show();
                    });
                }
            </script>
            <script>
                function changeButtonColor() {
                    const presensiButton = document.getElementById('liveToastBtn');
                    presensiButton.classList.remove('btn-primary');
                    presensiButton.classList.add('btn-success');
                }
            </script>


        <table class="table table-striped border-dark text-center">
            <tr class="">
                <th>Gambar</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>Jenis</th>
                <th>Metode Pembayaran</th>
            </tr>
            @forelse ($member as $item)
            <tr>
                <td><img class="gambarKelas rounded" src="{{ $item['gambar'] }}" alt=""></td>
                <td><strong>{{ $item['nama'] }}</strong></td>
                <td>{{ $item['email']}}</td>
                <td>{{ $item['telp'] }}</td>
                <td>
                    @if ($item['jenis'] == "Gold")
                    <div class="mb-0 " style="color: gold;">
                    <span class="badge text-bg-warning">Gold</span>
                    </div>
                    @elseif ($item['jenis'] == "Silver")
                    <div class="mb-0 " style="color: silver;">
                    <span class="badge text-bg-secondary">Silver</span>
                    </div>
                    @elseif ($item['jenis'] == "Black")
                    <div class="mb-0 " style="color: black;">
                    <span class="badge text-bg-dark">Black</span>
                    </div>
                    @endif
                </td><td>
                    @if ($item['metode'] == "Deposit Kelas")
                    <div class="mb-0 " style="color: blue;">
                    <span class="badge text-bg-primary">Deposit Kelas</span>
                    </div>
                    @elseif ($item['metode'] == "Deposit Uang")
                    <div class="mb-0 " style="color: green;">
                    <span class="badge text-bg-success">Deposit Uang</span>
                    </div>
                    @endif
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                Data Kelas masi kosong
            </div>
            @endforelse
        </table>
    </div>
</div>
@endsection