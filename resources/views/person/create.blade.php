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
                    <h4 class="m-t-0 header-title"><b>Criar nova pessoa</b></h4>
                    <p class="text-muted font-14 m-b-30">
                        Formulário para a criação de uma nova pessoa
                    </p>

                    <form id="form-create" method="POST" action="{{ route('person.store') }}" enctype="multipart/form-data">
                        @csrf

                        @component('person.form')
                        @endcomponent
                    </form>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" form="form-create" class="btn btn-success mr-2">Criar</button>
                        <a href="{{ route('person.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@endsection

@section('style')

@endsection

@section('script')

    <!-- Scripts para o funcionamento das máscaras dos inputs via jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $("#cpf").mask("000.000.000-00");
        $("#phone").mask("+00 (00) 0 0000-0000");
    </script>

    <script>

        function states() {
            const stateSelect = document.querySelector('#state')

            fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
            .then( res => res.json())
            .then( states => {
                for(state of states){
                    stateSelect.innerHTML += `<option id="${state.id}" value="${state.nome}">${state.nome}</option>`
                }
            })
        }

        states()

        function cities(event) {
            const citySelect = document.querySelector('#city')

            const indexOfSelectedState = event.target.selectedIndex
            const state = event.target.options[indexOfSelectedState].id

            const url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${state}/municipios`
        
            fetch(url)
            .then( res => res.json())
            .then( cities => {
                for(city of cities){
                    citySelect.innerHTML += `<option value="${city.nome}">${city.nome}</option>`
                }
            })
        }
        
        document.querySelector('#state').addEventListener("change", cities)
    </script>
@endsection