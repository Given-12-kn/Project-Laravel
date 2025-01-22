@extends('layout.template')

@section('title', 'Home')
@section('no-header', true)
@section('no-headerDosen', true)

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
@section('content-sidebar')

<div class="containerExcel d-flex align-items-center justify-content-center min-h-screen" style="background-color: #f8f9fa;">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow" style="border-radius: 10px; overflow: hidden;">
                <div class="card-header text-center h-16 align-items-center pt-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                    <p class="text-xl">Upload Excel File</p>
                </div>
                <div class="card-body text-center">
                    <form action="{{ url('home/admin/ImportExcel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Input File and Browse Button Inline -->
                        <div class="form-group d-flex justify-content-center align-items-center mt-4">
                            <label for="excel" class="mr-2" style="font-weight: bold;">Select Excel File:</label>
                            <input type="file" name="excel" id="excel"  accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" class="form-control" style="width: auto;">
                        </div>
                        <!-- Upload Button -->
                        <button type="submit" class="btn w-60 h-8 mt-5 bg-purple-600 text-white font-bold rounded transition duration-300 ease-in-out hover:bg-blue-500 hover:scale-105 mb-4">
                            <i class="fas fa-cloud-upload-alt"></i> Upload
                        </button>
                    </form>
                    @if (Session::has('success'))
                        <div class="alert alert-success mt-4" style="background-color: lightgreen; color: white;">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger mt-4" style="background-color: red; color: white;">
                            {{ Session::get('error') }}
                        </div>
                    @elseif($errors->any())
                        <div class="alert alert-danger mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="background-color: red; color: white;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="table-wrapper">
                        <table class="table-auto border-collapse border border-gray-300 w-full border-spacing-0 mt-4">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-2 py-1">Id</th>
                                    <th class="border border-gray-300 px-2 py-1">Email</th>
                                    <th class="border border-gray-300 px-2 py-1">Nrp</th>
                                    <th class="border border-gray-300 px-2 py-1">Role</th>
                                    <th class="border border-gray-300 px-2 py-1">Aktif</th>
                                </tr>
                            </thead>
                            <tbody id="excel-data">
                                <!-- Rows will be added dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
<script>
    function hideSidebar() {
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebarBtn');
        const content = document.getElementById('content');


        sidebar.style.transform = 'translateX(-100%)'; // Geser sidebar ke kiri
        openSidebarBtn.classList.remove('hidden'); // Tampilkan tombol buka
        content.style.marginLeft = '0'; // Hilangkan margin kiri konten
        content.style.width = '100%'; // Perluas konten sepenuhnya


    }

    function showSidebar() {
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebarBtn');
        const content = document.getElementById('content');

        sidebar.style.transform = 'translateX(0)'; // Kembalikan sidebar ke posisi awal
        openSidebarBtn.classList.add('hidden'); // Sembunyikan tombol buka
        content.style.width = 'calc(100% - 16rem)'; // Kembalikan ukuran konten semula

    }

    document.getElementById('excel').addEventListener('change', function (event) {
        clearTable();
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: 'array' });
                    const firstSheetName = workbook.SheetNames[0]; // Get the first sheet
                    const worksheet = workbook.Sheets[firstSheetName];
                    const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 }); // Convert to 2D array

                    console.log(jsonData);
                    populateTable(jsonData);
                };
                reader.readAsArrayBuffer(file);
            }
        });

        function populateTable(data) {
            const tableBody = document.getElementById('excel-data');
            tableBody.innerHTML = ''; // Clear existing data

            // Skip the header row and populate table
            for (let i = 1; i < data.length; i++) {
                const row = data[i];
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="border border-gray-300 px-2 py-1">${row[0] || ''}</td>
                    <td class="border border-gray-300 px-2 py-1">${row[1] || ''}</td>
                    <td class="border border-gray-300 px-2 py-1">${row[2] || ''}</td>
                    <td class="border border-gray-300 px-2 py-1">${row[3] || ''}</td>
                    <td class="border border-gray-300 px-2 py-1">${row[4] || ''}</td>
                `;
                tableBody.appendChild(tr);
            }
        }

        function clearTable() {
            const tableBody = document.getElementById('excel-data');
            tableBody.innerHTML = '';
        }
</script>

<style>


.btn-primary:hover, .btn-success:hover {
background-color: #9000ff;
transform: scale(1.05);
transition: all 0.3s ease;
-webkit-animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;

}

/* Browse File Button Styling */
.btn-primary {
    background-color: #6a11cb;
    border: none;
    font-size: 16px;
    transform: scale(1.05);
    transition: all 0.3s ease;
}

.btn-success {
    font-size: 16px;
}
</style>
@endsection
