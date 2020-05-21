@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> CLients </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('customer.create') }}">
                <button class="btn btn-success float-right">Create</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <th>
            Nom entreprise
        </th>
        <th>
            Contact
        </th>
        <th>
            Email
        </th>
        <th>
            Actions
        </th>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('js')
    @routes

    @parent
    <script>
        $(document).ready(function () {
            let url = route('customers.list');
            var tableCustomers =  $('#myTable').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: url,
                        type: 'GET',
                    },
                    columns: [
                        {
                            data: 'name', render: function (data, type, row) {
                                return row.customerable.name;
                            }, name: 'customers.id'
                        },
                        {
                            data: 'customerable.contact_first_name', render: function (data, type, row) {
                                return row.customerable.contact_first_name + ' ' + row.customerable.contact_last_name;
                            }, name: 'customers.id'
                        },
                        {data: 'email', width: '20%'},
                        {
                            data: 'actions', render: function (data, type, row) {
                                html = "<div class='float-right'>" +
                                    "<div class='row'>" +
                                    "<div class='col-md-5 col-lg-5'>" +
                                    "<a href='" + route('customer.edit', [row.id]) + "'>" +
                                    "<button type='button' class='btn btn-primary btn-sm'>Modifier</button>" +
                                    "</a>" +
                                    "</div>" +
                                    "<div class='col-md-5 col-lg-5'>" +
                                    "<button type='button' data-idCustomer='" + row.id + "' class='btn btn-danger btn-sm customer'>Supprimer</button>" +
                                    "</div>" +
                                    "</div>" +
                                    "</div>";
                                return html;
                            }, width: "15%", "searchable": false,
                        },
                    ],
                    "drawCallback": function (settings) {
                        // Action supprimer
                        $('.customer').on('click', function (e) {
                            Swal.fire({
                                title: 'Supprimer ce client ?',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Oui'
                            }).then((result) => {
                                if (result.value !== undefined) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                        method: "post",
                                        url: route('customer.delete', [e.target.dataset.idcustomer]),
                                    }).done(function (msg) {
                                        tableCustomers.draw();
                                        if (msg === 'ok') {
                                            Swal.fire(
                                                'Supprimer !',
                                                'Le client a été supprimé',
                                                'success'
                                            )
                                        }
                                    });
                                }
                            });
                        });
                    }
                }
            );
        });
    </script>
@stop
