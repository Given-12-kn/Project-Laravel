@extends('layout.template')

@section('title', 'Home')
@section('no-header', true)

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
@section('content-sidebar')

<div class="containerAdminPage d-flex align-items-center justify-content-center min-h-screen" style="background-color: #f8f9fa;">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow" style="border-radius: 10px; overflow: hidden;">
                <div class="card-header text-center h-16 align-items-center pt-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                    <p class="text-xl">DashBoard</p>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection
<script>

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
                    <td>${row[0] || ''}</td>
                    <td>${row[1] || ''}</td>
                    <td>${row[2] || ''}</td>
                    <td>${row[3] || ''}</td>
                    <td>${row[4] || ''}</td>
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
    background-color: #2575fc;
    transform: scale(1.05);
    transition: all 0.3s ease;
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
