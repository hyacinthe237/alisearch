@extends('admin.body')

@section('head')
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection

@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('stagiaires.index') }}" class="btn btn-lg btn-teal">
                <i class="ion-reply"></i> Annuler
            </a>

        </div>

        <div class="title">
            Nouveau Etudiant
        </div>
    </div>

{!! Form::open(['method' => 'POST', 'route' => ['stagiaires.store'], 'class' => '_form' ]) !!}

    <section class="container-fluid mt-20">

        @include('errors.list')
        {{ csrf_field() }}

        <div class="block">
            <div class="block-content form">

                <div class="row mt-10">
                      <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Prénom(s) *</label>
                                    <input type="text" value="{{ old('firstname') }}" name="firstname" class="form-control input-lg" placeholder="prénom(s)" required>
                                    <input type="hidden" name="phase_id" value="{{ $phase->id }}">
                                    <input type="hidden" name="etat_id" value="{{ $etat->id }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nom(s)</label>
                                    <input type="text" value="{{ old('lastname')}}" name="lastname" class="form-control input-lg" placeholder="nom(s)">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="{{ old('email')}}" name="email" class="form-control input-lg" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Téléphone *</label>
                                    <input type="text" value="{{ old('phone')}}" name="phone" class="form-control input-lg" placeholder="Téléphone" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Formation *</label>
                                    <div class="form-select grey">
                                        <select class="form-control input-lg js-example-basic-multiple" name="commune_formation_id" required>
                                            @foreach($formations as $item)
                                                <option value="{{ $item->id }}">
                                                  {{ $item->formation->title }} de {{ $item->commune->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-4">
                          <div class="form-group">
                              <label>Status</label>
                              <div class="form-select grey">
                                  <select name="is_active" class="form-control input-lg">
                                      <option value="1">Activé</option>
                                      <option value="0">Inactivé</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label>Date de naissance</label>
                              <input type="date"  value="{{ old('dob')}}" name="dob" class="form-control input-lg date" placeholder="Date de naissance">
                          </div>

                          <hr>
                          <div class="form-group text-right mb-20">
                              <button type="submit" class="btn btn-lg btn-primary">
                                  <i class="ion-checkmark"></i> Enregistrer
                              </button>
                          </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
{!! Form::close() !!}

@include('admin.modals.add', [
  'modalId' => 'addFonctionModal',
  'route' => 'fonctions.store',
  'title' => 'Ajouter une fonction',
  'label' => 'Nom de la fonction',
  'placeholder' => 'Saisissez le nom de la fonction',
])

@include('admin.modals.add', [
  'modalId' => 'addStructureModal',
  'route' => 'structures.store',
  'title' => 'Ajouter une structure',
  'label' => 'Nom de la structure',
  'placeholder' => 'Saisissez le nom de la structure',
])

@endsection

@section('js')
  @include('admin.includes.scripts')
@endsection
