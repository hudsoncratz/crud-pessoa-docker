@extends('template.geral')

@section('title', 'Pessoas')

@section('content')

<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Pessoas</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Lista de Pessoas</b></h4>
                    <p class="text-muted font-14 m-b-30">
                        Tabela com lista de Pessoas e suas informações 
                    </p>

                    <div class="mb-3">
                            <a href="{{ route('person.create') }}" class="btn btn-primary mr-2">Criar Pessoa</a>   
                    </div>

                    <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($people as $person)
                                <tr>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->cpf }}</td>
                                    <td>{{ $person->email }}</td>
                                    <td>{{ $person->phone }}</td>
                                    <td>
                                        <a href="#modal-details" class="btn btn-info" data-toggle="modal" data-url="{{ route('person.show', $person->id) }}">Detalhes</a>
                                        <a href="{{ route('person.edit', $person->id) }}" class="btn btn-warning">Editar</a>
                                        <a href="#modal-delete" class="btn btn-danger" data-toggle="modal" data-url="{{ route('person.destroy', $person->id) }}">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Modal Detalhes -->
        <div id="modal-details" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalhes da Pessoa</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mt-5 mb-3">
                                <h6>Informações Pessoais</h6>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details-name">Nome</label>
                                <input type="text" id="details-name" name="details-name" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details-cpf">CPF</label>
                                <input type="text" id="details-cpf" name="details-cpf" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details-email">Email</label>
                                <input type="text" id="details-email" name="details-email" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details-phone">Telefone</label>
                                <input type="text" id="details-phone" name="details-phone" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details-birthdate">Data de Nascimento</label>
                                <input type="text" id="details-birthdate" name="details-birthdate" class="form-control" readonly>
                            </div>

                            <div class="col-12 mt-5 mb-3">
                                <h6>Endereço</h6>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details-location">Logradouro</label>
                                <input type="text" id="details-location" name="details-location" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details-state">Estado</label>
                                <input type="text" id="details-state" name="details-state" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details-city">Cidade</label>
                                <input type="text" id="details-city" name="details-city" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Excluir -->
        <div id="modal-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Excluir Pessoa</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Tem certeza de que quer excluir essa Pessoa?</div>
                    <div class="modal-footer">
                        <form id="form-delete" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <button type="submit" form="form-delete" class="btn btn-danger">Excluir</button>
                        </form>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Voltar</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@endsection

@section('style')

    <!-- DataTables -->
    <link href="{{ asset('assets/css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/css/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('script')

    <!-- Required datatable js -->
    <script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/js/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/buttons.print.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/js/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            var table = $('.datatable').DataTable({
                "language": {
                    "sProcessing": "Aguarde enquanto os dados são carregados ...",
                    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                    "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                    "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                    "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                    "sInfoFiltered": "",
                    "sSearch": "Procurar",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                }
            });

            /* js para abrir Modal de Detalhes de forma dinâmica com as informações desejadas */
            $('#modal-details').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                let modal = $(this)
                $.getJSON(button.data('url'),(resposta) => {
                    $("#details-name").val(resposta.name);
                    $("#details-cpf").val(resposta.cpf);
                    $("#details-email").val(resposta.email);
                    $("#details-phone").val(resposta.phone);
                    $("#details-birthdate").val(resposta.birthdate);
                    $("#details-location").val(resposta.location);
                    $("#details-state").val(resposta.state);
                    $("#details-city").val(resposta.city);
                });
            })

            /* js para abrir Modal de Excluir de forma dinâmica */
            $('#modal-delete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                this.querySelector("form#form-delete").action = button.data('url')
            })

        });

    </script>

@endsection