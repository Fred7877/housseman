@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Modifier un évènement </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('events.index') }}">
                <button class="btn btn-danger float-right">Annuler</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="col-md-6">
            <div class="card card-primary">
                <form method="post" action="{{ route('events.update', [$event->id]) }}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">

                            <label for="libelle">Titre</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                   name="title"
                                   placeholder="Entrer un titre" value="{{ $event->title }}">

                            @error('title')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="details">Détails</label>
                            <textarea id="details" class="form-control" name="details"
                                      rows="5">{{ $event->details }}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="daterange" />
                        </div>

                        <input type="hidden" name="begin" id="begin" value="{{ $event->begin }}"/>
                        <input type="hidden" name="end" id="end" value="{{ $event->end }}"/>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @parent

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

    <script>
        $(document).ready(function () {
            console.log('{{ $event->begin }}');
            console.log(moment('{{ $event->begin }}', "YYYY-MM-DD h:mm").format('DD/MM/YYYY h:mm'));

            $('input[name="daterange"]').daterangepicker({
                "timePicker": true,
                "timePicker24Hour": true,
                "startDate": moment('{{ $event->begin }}', "YYYY-MM-DD h:mm").format('DD/MM/YYYY h:mm'),
                "endDate": moment('{{ $event->end }}', "YYYY-MM-DD h:mm").format('DD/MM/YYYY h:mm'),
                "locale": {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Valider",
                    "cancelLabel": "Annuler",
                    "fromLabel": "De",
                    "toLabel": "à",
                    "customRangeLabel": "Custom",
                    "daysOfWeek": [
                        "Dim",
                        "Lun",
                        "Mar",
                        "Mer",
                        "Jeu",
                        "Ven",
                        "Sam"
                    ],
                    "monthNames": [
                        "Janvier",
                        "Février",
                        "Mars",
                        "Avril",
                        "Mai",
                        "Juin",
                        "Juillet",
                        "Août",
                        "Septembre",
                        "Octobre",
                        "Novembre",
                        "Décembre"
                    ],
                    "firstDay": 1
                }
            }, function (start, end) {
                $('#begin').val(start.format('YYYY-MM-DD hh:mm'));
                $('#end').val(end.format('YYYY-MM-DD hh:mm'));
            });
        });
    </script>
@stop
