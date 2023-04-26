<div class="form-row">
    <div class="col-12 mb-3">
        <a class="btn w-100 d-flex" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 3px;" data-toggle="collapse" href="#collapsePersonalData" role="button" aria-expanded="true" aria-controls="collapseExample">
            <strong class="my-2">Informações Pessoais</strong>
        </a>
    </div>

    <div class="collapse col-sm-12" id="collapsePersonalData">
        <div class="row ">
            <div class="form-group col-md-4 col-sm-12">
                <label for="name">Nome</label>
                <div>
                    <input type="text" id="name" name="name" value="{{ isset($person)? $person->name: old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="João da Silva" >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="cpf">CPF</label>
                <div>
                    <input type="text" id="cpf" name="cpf" value="{{ isset($person)? $person->cpf: old('cpf') }}" class="form-control @error('cpf') is-invalid @enderror" placeholder="000.000.000-00" >
                    @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="birthdate">Data de Nascimento</label>
                <div>
                    <input type="date" id="birthdate" name="birthdate" value="{{ isset($person)? $person->birthdate: old('birthdate') }}" class="form-control @error('birthdate') is-invalid @enderror" >
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="email">Email</label>
                <div>
                    <input type="text" id="email" name="email" value="{{ isset($person)? $person->email: old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="joaodasilva@gmail.com" >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="phone">Telefone</label>
                <div>
                    <input type="text" id="phone" name="phone" value="{{ isset($person)? $person->phone: old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="+00 (00) 0 0000-0000" >
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4 mb-3">
        <a class="btn w-100 d-flex" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 3px;" data-toggle="collapse" href="#collapseAddress" role="button" aria-expanded="false" aria-controls="collapseExample">
            <strong class="my-2">Endereço</strong>
        </a>
    </div>
    
    <div class="collapse col-sm-12" id="collapseAddress">
        <div class="row ">
            <div class="form-group col-md-4 col-sm-12">
                <label for="location">Logradouro</label>
                <div>
                    <input type="text" id="location" name="location" value="{{ isset($person)? $person->location: old('location') }}" class="form-control @error('location') is-invalid @enderror" placeholder="R. das castanheiras, nº 100, cep: 00000-000" >
                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="state">Estado</label>
                <div>
                    <select id="state" name="state" class="form-control @error('state') is-invalid @enderror">
                        <option value="" disabled {{ isset($person)? '': 'selected' }}> Selecione um Estado </option>
                    </select>

                    <input type="hidden" id="state">
                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="city">Cidade</label>
                <div>
                    <select id="city" name="city" class="form-control @error('city') is-invalid @enderror">
                        @if (!isset($person))
                            <option value="" disabled {{ isset($person) ? '': 'selected' }}> Selecione uma Cidade </option>
                        @else
                            <option value="" disabled {{ isset($person) ? 'selected': '' }}> {{$person->city}} </option>
                        @endif
                    </select>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> 
        </div>
    </div>
</div>
