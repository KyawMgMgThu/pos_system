@extends('layouts.admin')
@section('navtitle', 'Customer List')
@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3">{{ __('Customer List') }}</h4>
                        </div>
                        <a href="{{ route('customers.create') }}" class="btn btn-primary add-list"><i
                                class="las la-plus mr-3"></i>Add
                            Customer</a>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                        <table class="table mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>
                                        ID
                                    </th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Address</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="ligth-body">
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>
                                            {{ $customer->id }}
                                        </td>
                                        <td>{{ $product->first_name }}</td>
                                        <td>{{ $product->Last_name }}</td>
                                        <td>{{ $product->email }}</td>
                                        <td>Beauty</td>
                                        <td>{{ $product->phone }}</td>
                                        <td>{{ $product->address }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Edit"
                                                    href="{{ route('customers.edit', $customer['id']) }}"><button
                                                        type="submit" class="badge bg-success mr-2"><i
                                                            class="ri-pencil-line mr-0"></i></button></a>
                                                <a data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Delete"
                                                    href="{{ route('customer#delete', $customer['id']) }}"><button
                                                        type="submit" class="badge bg-danger mr-2 btn-delete"><i
                                                            class="ri-delete-bin-line mr-0"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
        <!-- Modal Edit -->
        <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <div class="media align-items-top justify-content-between">
                                <h3 class="mb-3">Product</h3>
                                <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                            </div>
                            <div class="content edit-notes">
                                <div class="card card-transparent card-block card-stretch event-note mb-0">
                                    <div class="card-body px-0 bukmark">
                                        <div
                                            class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                            <div class="quill-tool">
                                            </div>
                                        </div>
                                        <div id="quill-toolbar1">
                                            <p>Virtual Digital Marketing Course every week on Monday, Wednesday and
                                                Saturday.Virtual Digital Marketing Course every week on Monday</p>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0">
                                        <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                            <div class="btn btn-primary mr-3" data-dismiss="modal">Cancel</div>
                                            <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src=" {{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="module">
        $(document).ready(function() {
            $(document).on('click', '.btn-delete', function() {
                var $this = $(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: {{ __('product.sure') }},
                    text: {{ __('product.really_delete') }},
                    icon: {{ __('product.Create_Product') }} 'warning',
                    showCancelButton: true,
                    confirmButtonText: {{ __('product.yes_delete') }},
                    cancelButtonText: {{ __('product.No') }},
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        }, function(res) {
                            $this.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            })
                        })
                    }
                })
            })
        })
    </script>
@endsection