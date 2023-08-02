<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Perhitungan Harga Jati
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row my-2 section 1">
                        <div class="col">
                            <table class="table text-center mt-3 mx-auto w-75">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Harga Terendah</th>
                                    <th scope="col">Harga Tertingi</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>$ {{$Harga_Terendah}}</td>
                                    <td>$ {{$Harga_Tertinggi}}</td>
                                    <td><button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</button></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="row my-2 section 2">
                        <div class="col mx-auto">
                          <p class="fs-3 font-semibold text-xl text-center text-gray-800 leading-tight mt-5">
                            Tabel Harga
                          </p>
                          <hr class="mt-2 mb-4 border-success border-3 opacity-100">
                            <table class="table table-striped  text-center mt-3 mx-auto w-75">
                                    <thead >
                                      <tr class="table-success">
                                        <th scope="col" class="border">#</th>
                                        <th scope="col" class="border">Tebal</th>
                                        <th scope="col" class="border">Harga</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         @for ($a = 10; $a <= 60; $a += 5)
                                            <tr>
                                                <td class="border">{{ $i = ($a / 5) - 1;}}</td>
                                                <td class="border">{{$a}}</td>
                                                <td class="border">$ {{$Harga_Tertinggi-(($Harga_Tertinggi-$Harga_Terendah)/10*($i - 1))}}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row my-2 section 3">
                      <div class="col">
                        <p class="fs-3 font-semibold text-xl text-center text-gray-800 leading-tight mt-5">
                          Tabel Detail  Harga
                        </p>
                        <hr class="mt-2 mb-4 border-success border-3 opacity-100">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide">
                          <div class="carousel-inner">
                            @for ($a = 10; $a <= 60; $a += 5) 
                              @php
                                $tbl = $Harga_Tertinggi-(($Harga_Tertinggi-$Harga_Terendah)/10*((($a / 5) - 1) - 1)); 
                              @endphp
                              <div class="carousel-item {{ $a == 10 ? 'active' : '' }} " data-bs-interval="10000">
                                  <div class="w-75 mx-auto ">
                                    <p class="fs-5 p-2 border border-2 w-25">Tebal : {{$a}} <br> Harga : $ {{$tbl}}</h1>
                                    <table class=" table table-bordered table-striped-columns text-center mt-3">
                                      <thead class="table-primary">
                                          <tr>
                                              @for ($i = 0; $i <= 20; $i++) 
                                                 <th>
                                                 {{ $i * 10}}
                                                </th>
                                              @endfor
                                          </tr>
                                      </thead>
                                      <tbody class="table-striped-columns ">
                                          @for ($i = 20; $i <= 260; $i += 20) 
                                                  <tr>
                                                   <th>{{$i * 10}}</th>
                                                    @for ($b = 1; $b <= 20; $b++)
                                                        <td>
                                                          @php
                                                            $hsl = floor((($i - 21 + $b) * 2000 / 259) + $tbl - 1000);
                                                          @endphp
                                                          {{$hsl}}
                                                        </td>
                                                    @endfor
                                                  </tr>
                                          @endfor
                                      </tbody>
                                    </table>
                                  </div>
                              </div>
                            @endfor
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                      </div>

                    <div class="row my-2 section 4">
                      <div class="col mx-auto text-center">
                        <p class="fs-3 font-semibold text-xl text-center text-gray-800 leading-tight mt-5">
                          Hitung Harga Item
                        </p>
                        <hr class="mt-2 mb-4 border-success border-3 opacity-100">
                        <button  class="btn btn-primary justify-content-center" data-bs-toggle="modal" data-bs-target="#JumlahKolom" data-bs-whatever="@mdo">Input Item</button>
                        <p class="fs-5 p-2 border border-2 w-25 mx-auto my-3">Nama Item :  {{$Item->Nama_Item}}</h1>
                        <form method="put" action="{{route('home.index') }}">
                          @csrf
                          <input type="hidden" class="form-control" id="Nama_Item" name="Nama_Item" aria-describedby="Nama_Item" value="{{$Item->Nama_Item}}">
                          <input type="hidden" class="form-control" id="Jumlah_Kolom" name="Jumlah_Kolom" aria-describedby="Jumlah_Kolom" value="{{$Item->Jumlah_Kolom}}">
                            @for ($i = 1; $i <= $Item->Jumlah_Kolom; $i++)
                              <div class="row py-2">
                                  <div class="col-1 text-center">
                                      <p>{{ $i }}. </p>
                                  </div>
                                  <div class="col-md">
                                      <div class="input-group mb-3">
                                          <span class="input-group-text" id="basic-addon1">Tebal</span>
                                          <input type="text" class="form-control" placeholder="Tebal" name="tbl2{{$i}}" value="<?= $Item->{"tbl2{$i}"} ?>" aria-label="Username" aria-describedby="basic-addon1">
                                      </div>
                                  </div>
                                  <div class="col-md">
                                      <div class="input-group mb-3">
                                          <span class="input-group-text" id="basic-addon1">Lebar</span>
                                          <input type="text" class="form-control" placeholder="Lebar" name="lbr{{$i}}" aria-label="Username" value="<?= $Item->{"lbr{$i}"} ?>" aria-describedby="basic-addon1">
                                      </div>
                                  </div>
                                  <div class="col-md">
                                      <div class="input-group mb-3">
                                          <span class="input-group-text" id="basic-addon1">Panjang</span>
                                          <input type="text" class="form-control" placeholder="Panjang" name="pjg{{$i}}" aria-label="Username" value="<?= $Item->{"pjg{$i}"} ?>" aria-describedby="basic-addon1">
                                      </div>
                                  </div>
                                  <div class="col-md">
                                      <div class="input-group mb-3">
                                          <span class="input-group-text" id="basic-addon1">Quantity</span>
                                          <input type="text" class="form-control" placeholder="Quantity" name="qty{{$i}}" aria-label="Username" value="<?= $Item->{"qty{$i}"} ?>" aria-describedby="basic-addon1">
                                      </div>
                                  </div>
                                  <div class="col-md">
                                      <select class="form-select" name="grade{{$i}}" aria-label="Default select example">
                                          <option value="0" <?= $Item->{"grade{$i}"} == 0 ? 'selected' : '' ?> >Grade</option>
                                          <option value="1" <?= $Item->{"grade{$i}"} == 1 ? 'selected' : '' ?> >A</option>
                                          <option value="0.8" <?= $Item->{"grade{$i}"} == 0.8 ? 'selected' : '' ?> >A/B</option>
                                          <option value="0.7" <?= $Item->{"grade{$i}"} == 0.7 ? 'selected' : '' ?> >B</option>
                                          <option value="0.6" <?= $Item->{"grade{$i}"} == 0.6 ? 'selected' : '' ?> >B/C</option>
                                          <option value="0.5" <?= $Item->{"grade{$i}"} == 0.5 ? 'selected' : '' ?> >C</option>
                                      </select>
                                  </div>
                              </div>
                            @endfor
                          <button class="btn btn-primary">Hitung</button>
                        </form>
                        <p class="fs-3 font-semibold text-xl text-center text-gray-800 leading-tight mt-5">
                          Rincian Biaya Item {{$Item->Nama_Item}}
                        </p>
                        <hr class="mt-2 mb-4 border-success border-3 opacity-100">
                        <table class="table table-bordered">
                          <thead class="table-primary text-center">
                              <tr>
                                  <th>No</th>
                                  <th>Tebal (Mm)</th>
                                  <th>Lebar (Mm)</th>
                                  <th>Panjang (Mm)</th>
                                  <th>Quantity</th>
                                  <th>Grade</th>
                                  <th>Volume (M<sup>3</sup>)</th>
                                  <th>Harga ($)</th>
                                  <th>Harga Grade ($)</th>
                                  <th>Total Biaya ($)</th>
                              </tr>
                          </thead>
                          <tbody>
                            @php
                              $t_hasil = 0;
                              $t_biaya = 0;
                              $hasil = 0;
                              $biaya = 0;
                              $klm = $Item->Jumlah_Kolom;
                            @endphp
                            @for ($i = 1; $i <= $klm; $i++)
                              @php
                                          $panjang = $Item->{"pjg{$i}"} / 10;
                                          if ($panjang < 20) {
                                              $p = "20";
                                          } elseif ($panjang > 260) {
                                              $p = "260";
                                          } else {
                                              $p = $panjang;
                                          }
      
                                          $lebar = $Item->{"lbr{$i}"} / 10;
                                          if ($lebar < 1) {
                                              $l = "1";
                                          } elseif ($lebar > 20) {
                                              $l = "20";
                                          } else {
                                              $l = $lebar ;
                                          }
      
                                          $tebal = $Item->{"tbl2{$i}"};
                                          if ($tebal < 10) {
                                              $t = "10";
                                          } elseif ($tebal > 60) {
                                              $t = "60";
                                          } else {
                                              $t =  $tebal ;
                                          }
      
                                          $hasil = number_format(($Item->{"tbl2{$i}"}  / 1000) * ($Item->{"lbr{$i}"}  / 1000) * ($Item->{"pjg{$i}"} / 1000) * $Item->{"qty{$i}"}, 5);
                                          $harga = floor((($p - fmod($p, 20)  - 21) + (FLOOR($l))) * 2000 / 259) + ($Harga_Terendah - 1000 + ((60 - ($t - fmod($t, 5))) / 5 * (($Harga_Tertinggi-$Harga_Terendah) / 10)));
                                          $biaya = round($hasil * floor($harga) * $Item->{"grade{$i}"}, 2);
                                          $t_hasil += $hasil;
                                          $t_biaya += $biaya;
                                          $grade = $Item->{"grade{$i}"};
                              @endphp
                              <tr>
                                  <td>{{$i}}</td>
                                  <td><?= $Item->{"tbl2{$i}"} ?></td>
                                  <td><?= $Item->{"lbr{$i}"} ?></td>
                                  <td><?= $Item->{"pjg{$i}"} ?></td>
                                  <td><?= $Item->{"qty{$i}"} ?></td>
                                  <td>
                                    @if ($grade == 1 )
                                      A
                                    @elseif ($grade == 0.8)
                                      A/B
                                    @elseif ($grade == 0.7)
                                      B
                                    @elseif ($grade == 0.6)
                                      B/C
                                    @elseif ($grade == 0.5)
                                      C
                                    @endif
                                  </td>
                                  <td><?php echo $hasil; ?></td>
                                  <td>$. <?php echo $harga; ?></td>
                                  <td>$. <?php echo $harga * $grade; ?></td>
                                  <td>$. <?php echo number_format("$biaya", 2, ",", "."); ?></td>
                              </tr>
                            @endfor
                          </tbody>
                      </table>
                      
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <p class="fs-6">
                                        Total Volume : <?php echo number_format((!empty($t_hasil) ? $t_hasil : 0), 4, ".", ""); ?> M<sup>3</sup><br>
                                        Total Biaya : $ <?php echo number_format((!empty($t_biaya) ? $t_biaya : 0), 2, ",", "."); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Harga Jati</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/home/{{$id}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                      <label for="HargaTerendah" class="form-label">Harga Terendah</label>
                      <input type="text" class="form-control" id="Harga_Terendah" name="Harga_Terendah" aria-describedby="HargaTerendah" value="{{old('Harga_Terendah',$Harga_Terendah)}}">
                      <div id="HargaTerendah" class="form-text">Harga terendah untuk kayu paling tebal</div>
                    </div>
                    <div class="mb-3">
                        <label for="HargaTertinggi" class="form-label">Harga Tertinggi</label>
                        <input type="text" class="form-control" id="Harga_Tertinggi" name="Harga_Tertinggi" aria-describedby="HargaTertinggi" value="{{old('Harga_Tertinggi',$Harga_Tertinggi)}}">
                        <div id="HargaTertinggi" class="form-text">Harga tertinggi untuk kayu paling tipis</div>
                    </div>
                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
    </div>

    {{-- Modal Form 2 --}}
    <div class="modal fade" id="JumlahKolom" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Item Yang Akan Dihitung</h1>
              </div>
              <div class="modal-body">
                  <form method="POST" action="{{route('home.index') }}">
                    @method('put')
                      @csrf
                      <div class="mb-3">
                        <label for="Nama_Item" class="form-label">Nama Item</label>
                        <input type="text" class="form-control" id="Nama_Item" name="Nama_Item" aria-describedby="Nama_Item" >
                        <div id="Nama_Item" class="form-text">Masukkan Nama Item yang akan dihitung</div>
                      </div>
                      <div class="mb-3">
                          <label for="Jumlah_Kolom" class="form-label">Jumlah Kolom</label>
                          <input type="text" class="form-control" id="Jumlah_Kolom" name="Jumlah_Kolom" aria-describedby="Jumlah_Kolom" >
                          <div id="Jumlah_Kolom" class="form-text">Masukkan Jumlah Kolom</div>
                      </div>
                      <button class="btn btn-primary">Simpan</button>
                  </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
