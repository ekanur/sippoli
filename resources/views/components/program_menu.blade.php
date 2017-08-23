            <ul class="nav nav-pills nav-pills-warning nav-pills-icons text-center" role="tablist"   id="menu_program">
                <li @if (Request::is('program/baru') || Request::is('program/*/deskripsi')) class="active"  @endif>
                    @if (isset($id_program)) 
                      <a href="{{ url('/program/'.$id_program.'/deskripsi') }}" role="tab">
                        <i class="material-icons">info</i>Deskripsi
                      </a>
                    @else
                    <a href="{{ url('/program/baru') }}" role="tab">
                        <i class="material-icons">info</i>Deskripsi
                    </a>
                    @endif
                </li>
                <li @if (Request::is('program/*/atlet') || Request::is('program/*/atlet/*')) class="active"  @endif>
                    @if (isset($id_program)) 
                      <a href="{{ url('/program/'.$id_program.'/atlet') }}" role="tab">
                        <i class="material-icons">search</i>Pilih Atlet
                      </a>
                    @else
                    <a href="{{ url('/program/baru') }}" role="tab">
                        <i class="material-icons">search</i>Pilih Atlet
                    </a>
                    @endif                    
                </li>
                <li @if (Request::is('program/*/mikro') || Request::is('program/*/mikro/*') || Request::is('program/*/sesi-latihan/*')) class="active"  @endif>
                    @if (isset($id_program)) 
                      <a href="{{ url('/program/'.$id_program.'/mikro') }}" role="tab">
                        <i class="material-icons">directions_run</i>Program Latihan
                      </a>
                    @else
                    <a href="{{ url('/program/baru') }}" role="tab">
                        <i class="material-icons">directions_run</i>Program Latihan
                    </a>
                    @endif                    
                </li>
                <li @if (Request::is('program/*/makanan') || Request::is('program/*/makanan/*')) class="active"  @endif>
                    @if (isset($id_program)) 
                      <a href="{{ url('/program/'.$id_program.'/makanan') }}" role="tab">
                        <i class="material-icons">restaurant</i>Program Makan
                      </a>
                    @else
                    <a href="{{ url('/program/baru') }}" role="tab">
                        <i class="material-icons">restaurant</i>Program Makan
                    </a>
                    @endif                  
                </li>
            </ul>