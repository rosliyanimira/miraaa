@extends('layouts.app')
@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Peminjam</h5><br>
                <center>
                        <a href="{{ route('peminjam.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>kode</th>
                                <th>alamat</th>
                                <th>tlpn</th>
                                <th>foto</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjam as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->Peminjam_kode}}</td>
                                <td>{{$data->Peminjam_alamat}}</td>
                                <td>{{$data->Peminjam_tlpn}}</td>
                                <td>{{$data->Peminjam_foto}}</td>
                                <td><img src="{{asset('assets/img/peminjam/' .$data->foto. '')}}"
                                    style="width:250px; height:250px;" alt="Foto"></td>

								<td style="text-align: center;">
                                    <form action="{{route('peminjam.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('peminjam.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> Edit
                                    </a>
                                    <a href="{{route('peminjam.show', $data->id)}}"
										class="zmdi zmdi-eye btn btn-success btn-rounded btn-floating btn-outline"> Show
                                    </a >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="zmdi zmdi-delete  btn-rounded btn-floating btn btn-dangerbtn btn-danger btn-outline"> Delete</button>
									</form>
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</section>
 {{-- <script> --}}
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           var alamat = "http://miraaaaa.herokuapp.com/api/article";
           $.ajax({
               url: alamat,
               method:"GET",
               dataType: "json",
               success: function(berhasil){
                   console.log(berhasil)
                   $.each(berhasil.data,function (key, val){
                       $('.data-article').append(
                           `
                           <tr>
                                <td>${val.nama}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-id="${val.id}" data-nama="${val-nama}" >Edit</button>
                                    <button type="button" class="btn btn-danger" data-id="${val.id}">Hapus</button>
                                    </td>
                            </tr>
                            `
                       )
                   })
               }
           });
           $('.simpan-article').on('click', function (e){
               e.preventDefault();
               var nama = $('.nama').val();
           })
        })


      $(document).ready(function(){
          $('#select2').select2();
       });

    </script>
@endsection
