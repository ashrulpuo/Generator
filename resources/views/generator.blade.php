@extends('welcome')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">show table</h3>
                </div>
                <br>
                <div class="card-body table-responsive">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Success!</h5>
                        {{ Session::get('success')  }}
                      </div>
                    @endif
                    @if ($message = Session::get('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        {{ Session::get('failed') }}
                    </div>
                    @endif
                    <div id="keterangan">
                        <form action="{{ route('submitValue') }}" method="post">
                            @csrf
                            <div class="card-body" style="padding: 0.2rem">
                                <div class="callout callout-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <select class="form-control select2" style="width: 100%;" name="table">
                                                    @foreach($tables as $key => $tabl)
                                                    <option value="{{ $tabl }}">{{ $tabl }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success pull-right"
                                            href="javascript:void(0)" style="float: right;"
                                            id="bajetDetailSave">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection