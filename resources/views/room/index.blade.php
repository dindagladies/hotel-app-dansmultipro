@extends('layouts.app')
@section('nav')
    @include('layouts.nav-Admin')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row m-3 d-flex justify-content-between">
                        <h4 class="mt-3"><strong>Data Room</strong></h4><br>
                        <div class="row">
                            <a href="">Data Master / </a>
                            <p>&nbsp Data Room</p>
                        </div>
                    </div>
                    <div class="row m-3 d-flex justify-content-between">
                        <div class="col-md-10">
                            <form action="{{action('RoomController@search') }}" method="GET">
                                @csrf
                                <div class="form-group row">
                                    <input type="text" class="form-control col-3 mr-3" name="cari" id="" placeholder="Cari">
                                    <input class="form-group btn btn-sm btn-dark mr-2" type="submit" value="Search">
                                    <input class="form-group btn btn-sm btn-light" type="submit" value="Reset">
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('room.create')}}" data-inline="true" class="btn btn-sm btn-dark" style="padding:10px; margin:4px;"><span data-feather="plus">Add</span></a>
                        </div>
                    </div>
                    @if ($message = session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = session('error'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = session('warning'))
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <table class="table w-100">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">TIPE KAMAR</th>
                                <th scope="col">TIPE KASUR</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">DESKRIPSI</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $i = $datas->firstItem(); ?>
                            @forelse($datas as $data)
                            <tr>
                                <th>{{$i++}}</th>
                                <th>{{$data->type_room}}</th>
                                <th>{{$data->type_bed}}</th>
                                <th>{{$data->total}}</th>
                                <th>{{$data->price}}</th>
                                <th>{{$data->description}}</th>
                                <th>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <div>
                                            <a href="{{route('room.edit', ['room'=> $data->id]) }}" class="btn btn-sm btn-success">
                                                <span data-feather="edit"></span>
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{action('RoomController@destroy', ['room'=> $data->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin akan menghapus')" ><span data-feather="trash"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No data found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
