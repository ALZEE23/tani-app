@extends('layouts.back')
@section('content')
<div class="container">
    <br><br>
    <br><br>
    <!-- --------------------------------------------------- -->
    <!--  Form Basic Start -->
    <!-- --------------------------------------------------- -->
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Import Data Petani Exel</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted " href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Import User</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
        </div>
        <div class="card-body p-4">
            <div class="table rounded-2 mb-4">
                <form action="{{ route('importUsers') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="excel_file">
                    <button type="submit" class="btn btn-success">Import</button>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------------------------------------- -->
    <!--  Form Basic End -->
    <!-- --------------------------------------------------- -->
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'Todos']
                ]
            })
        });
    </script>
    <!-- --------------------------------------------------- -->
</div>
@endsection