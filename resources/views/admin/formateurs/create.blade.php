@extends('admin.body')

@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('formateurs.index') }}" class="btn btn-lg btn-teal">
                <i class="ion-reply"></i> Annuler
            </a>
        </div>

        <div class="title">
            Nouveau formateur
        </div>
    </div>

{!! Form::open(['method' => 'POST', 'route' => ['formateurs.store'], 'class' => '_form' ]) !!}

    <section class="container-fluid mt-20">

        @include('errors.list')

        {{ csrf_field() }}

        <div class="block">
            <div class="block-content form">
                  <div class="row mt-20">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Prénom(s)</label>
                            <input type="text" name="firstname" class="form-control input-lg" placeholder="prénom(s)" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nom(s)</label>
                            <input type="text" name="lastname" class="form-control input-lg" placeholder="nom(s)" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="qualification" class="form-control input-lg" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Formation</label>
                            <div class="form-select grey">
                                <select name="formation_id" class="form-control input-lg" required>
                                    <option value="">Sélectionnez la formation</option>
                                    @foreach ($formations as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Date de début</label>
                            <input type="date" name="start_date" class="form-control input-lg datepicker" placeholder="Date de début" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <label>Heure</label>
                                  <select class="form-control input-lg" name="start_heure">
                                      @for($i=0; $i< 24; $i++)
                                        <?php $value = $i < 10 ? '0' . $i :$i ;?>
                                        <option value="{{ $value }}" {{ $value == '08' ? 'selected' : ''}}>{{ $value }}</option>
                                      @endfor
                                  </select>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <label>Minutes</label>
                                  <select class="form-control input-lg" name="start_minutes">
                                      @for($i=0; $i< 60; $i+=5)
                                        <?php $value = $i < 10 ? '0' . $i :$i ;?>
                                        <option value="{{ $value }}">
                                          {{ $value }}</option>
                                      @endfor
                                  </select>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Date de fin</label>
                            <input type="date" name="end_date" class="form-control input-lg datepicker" placeholder="Date de fin">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <label>Heure</label>
                                  <select class="form-control input-lg" name="end_heure">
                                      @for($i=0; $i< 24; $i++)
                                        <?php $value = $i < 10 ? '0' . $i :$i ;?>
                                        <option value="{{ $value }}" {{ $value == '19' ? 'selected' : ''}}>
                                          {{ $value }}</option>
                                      @endfor
                                  </select>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <label>Minutes</label>
                                  <select class="form-control input-lg" name="end_minutes">
                                      @for($i=0; $i< 60; $i+=5)
                                        <?php $value = $i < 10 ? '0' . $i :$i ;?>
                                        <option value="{{ $value }}">
                                          {{ $value }}</option>
                                      @endfor
                                  </select>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group text-right mt-20">
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
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('.datepicker').datepicker({
      startdate: 'd',
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHightlight: true,
    })
})
</script>
@endsection
