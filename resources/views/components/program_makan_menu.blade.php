<ul class="nav nav-pills nav-pills-warning">

    <li @if(is_null(Request::segment(5))) class="active" @endif>
        <a href="{{ url("/program/".$id_program."/program-makan/".$atlet_id."/") }}">Persiapan Umum</a>
    </li>
    <li @if(Request::segment(5) === 'persiapan-khusus') class="active" @endif>
        <a href="{{ url("/program/".$id_program."/program-makan/".$atlet_id."/persiapan-khusus/") }}">Persiapan Khusus</a>
    </li>
    <li @if(Request::segment(5) === 'pra-kompetisi') class="active" @endif>
        <a href="{{ url("/program/".$id_program."/program-makan/".$atlet_id."/pra-kompetisi/") }}">Pra Kompetisi</a>
    </li>
    <li @if(Request::segment(5) === 'kompetisi') class="active" @endif>
        <a href="{{ url("/program/".$id_program."/program-makan/".$atlet_id."/kompetisi/") }}">Kompetisi</a>
    </li>
    <li @if(Request::segment(5) === 'transisi') class="active" @endif>
        <a href="{{ url("/program/".$id_program."/program-makan/".$atlet_id."/transisi/") }}">Transisi</a>
    </li>
</ul>