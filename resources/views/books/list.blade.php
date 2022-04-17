@extends('layouts.app')
@section('content')

    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-2">
                    <div class="d-flex">
                        <h2 class="color-mid-grey">{{$title}}</h2>
                    </div>
                    @include('helper.message')
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table id="booksTable" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Tytuł">
                                    Tutuł
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Kategorie">
                                    Kategorie
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Autor">
                                    Autor
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Opis">
                                    Opis
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Przeczytano">
                                    Przeczytano
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Pożyczono">
                                    Pożyczono
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Akcje">
                                    Akcje
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        const datatablePL = {
            "processing": "Przetwarzanie...",
            "search": "Szukaj:",
            "lengthMenu": "Pokaż _MENU_ pozycji",
            "info": "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
            "infoEmpty": "Pozycji 0 z 0 dostępnych",
            "infoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
            "infoPostFix": "",
            "loadingRecords": "Wczytywanie...",
            "zeroRecords": "Nie znaleziono pasujących pozycji",
            "emptyTable": "Brak danych",
            "paginate": {
                "first": "Pierwsza",
                "previous": "Poprzednia",
                "next": "Następna",
                "last": "Ostatnia"
            },
            "aria": {
                "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
            }
        }

        let table = $('#booksTable').DataTable({
            language: datatablePL,
            select: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                type:'POST',
                url: "{{ route('books-list') }}",
                data: {
                    "_token": "{{ @csrf_token() }}"
                },
            },
            order: [[0, "desc"]],
            columns: [
                {
                    data: 'title',
                    name: 'title',
                    className: 'align-middle',
                },
                {
                    data: 'categories',
                    name: 'categories',
                    className: 'align-middle',
                },
                {
                    data: 'author',
                    name: 'author',
                    className: 'align-middle',
                },
                {
                    data: 'description',
                    name: 'description',
                    className: 'align-middle',
                },
                {
                    data: 'read',
                    name: 'read',
                    className: 'align-middle',
                },
                {
                    data: 'borrowed',
                    name: 'borrowed',
                    className: 'align-middle',
                },
                {
                    data: 'actions',
                    name: 'actions',
                    className: 'align-middle',
                },
            ]
        });


        $('#booksTable_wrapper').find('label').each(function () {
            $(this).parent().append($(this).children());
        });
        $('#booksTable_wrapper .dataTables_filter').find('input').each(function () {
            const $this = $(this);
            $this.attr("placeholder", "Szukaj");
            $this.removeClass('form-control-sm');
        });
        $('#booksTable_wrapper .dataTables_length').addClass('d-flex flex-row');
        $('#booksTable_wrapper .dataTables_filter').addClass('md-form');
        $('#booksTable_wrapper select').removeClass(
            'custom-select custom-select-sm form-control form-control-sm');
        $('#booksTable_wrapper select').addClass('mdb-select');
        $('#booksTable_wrapper .dataTables_filter').find('label').remove();

    </script>
@endsection
