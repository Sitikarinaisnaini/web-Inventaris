@extends('layouts/app')

@section('konten')
                        
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">SISWA</th>
                                <th scope="col">BARANG</th>
                                <th scope="col">TANGGAL PINJAM</th>
                                <th scope="col">TANGGAL KEMBALI</th>
                                <th scope="col">AKSI</th>
                                

                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($peminjaman as $index =>$peminjaman)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $peminjaman->siswa->nama }}</td>
                                    <td>{{ $peminjaman->barang->nama_barang }}</td>
                                    <td>{{ $peminjaman->tgl_pinjam }}</td>
                                    <td>{{ $peminjaman->tgl_kembali }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST"> 
                                            <div class="d-flex justify-content-start">
                                            <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-sm btn-primary mr-2">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>
@endsection